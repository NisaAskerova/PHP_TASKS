<?php
include "connection.php";

function edit($connection)
{
    $sql = "SELECT * FROM blogs WHERE id = ?";
    $blogQuery = $connection->prepare($sql);
    $blogQuery->execute([$_GET['id']]);
    $blog = $blogQuery->fetch(PDO::FETCH_ASSOC);

    if (!$blog) {
        return "Blog not found.";
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (post('title') == null) {
            return "Please fill the title";
        } elseif (post('content') == null) {
            return "Please fill the content";
        }

        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $file = $_FILES['image'];
            $fileTmp = $file['tmp_name'];
            $fileName = $file['name'];
            $allowedExtensions = ['png', 'jpg', 'jpeg', 'gif'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (in_array($fileExtension, $allowedExtensions)) {
                $directory = 'uploads/';
                if (!file_exists($directory)) {
                    mkdir($directory, 0777, true);
                }
                $newFileName = uniqid() . time() . '.' . $fileExtension;
                $destination = $directory . $newFileName;
                $upload = move_uploaded_file($fileTmp, $destination);
                if (!$upload) {
                    return 'No file uploaded or there was an upload error.';
                }
            } else {
                return 'Invalid file extension.';
            }
        } else {
            $destination = $blog['image'];
        }
        $updateQuery = $connection->prepare("UPDATE blogs set
         title = ?, 
         content = ?,
          image = ? 
          WHERE id = ?");
        $updateQuery->execute([
            post('title'),
            post('content'),
            $destination ?? $blog['image'],
            post('id'),
        ]);

        return "Blog updated successfully.";
    }
}

$message = edit($connection);

$sql = "SELECT * FROM blogs WHERE id = ?";
$blogQuery = $connection->prepare($sql);
$blogQuery->execute([$_GET['id']]);
$blog = $blogQuery->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($blog['title']); ?>">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content"><?php echo htmlspecialchars($blog['content']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" name="img" id="img">
        </div>
        <?php if (!empty($blog['image'])) : ?>
            <div class="form-group">
                <img src="<?php echo htmlspecialchars($blog['image']); ?>" alt="Blog image" class="img-fluid">
            </div>
        <?php endif; ?>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($blog['id']); ?>">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" onclick="location.href='select.php'">Show All Blogs</button>
        </div>
    </form>
</body>

</html>