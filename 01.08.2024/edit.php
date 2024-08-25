<?php
include "connection.php";

function edit($connection) {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['id'])) {
        $sql = "SELECT blogs.* FROM blogs WHERE id=?";
        $blogQuery = $connection->prepare($sql);
        $blogQuery->execute([$_GET['id']]);
        $blog = $blogQuery->fetch(PDO::FETCH_ASSOC);

        if (empty($_POST["title"])) {
            return "Please fill the title";
        } elseif (empty($_POST["content"])) {
            return "Please fill the content";
        }

        $destination = $blog['image'];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $file = $_FILES['image'];
            $fileTmp = $file['tmp_name'];
            $fileName = $file['name'];

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (in_array($fileExtension, $allowedExtensions)) {
                $directory = 'uploads/';
                if (!file_exists($directory)) {
                    mkdir($directory, 0777, true);
                }
                $newFileName = uniqid() . time() . '.' . $fileExtension;
                $destination = $directory . $newFileName;

                if (!move_uploaded_file($fileTmp, $destination)) {
                    return "Photo can't upload";
                }
            } else {
                return "Invalid file extension.";
            }
        }

        $updateQuery = $connection->prepare("UPDATE blogs SET title=?, content=?, image=? WHERE id=?");
        $updateQuery->execute([
            $_POST["title"],
            $_POST["content"],
            $destination,
            $_GET['id'],
        ]);

        return "Blog updated successfully.";
    }
}

echo edit($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
</head>
<body>
    <?php
    if (isset($_GET['id'])) {
        $sql = "SELECT * FROM blogs WHERE id=?";
        $blogQuery = $connection->prepare($sql);
        $blogQuery->execute([$_GET['id']]);
        $blog = $blogQuery->fetch(PDO::FETCH_ASSOC);
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($blog['title']); ?>">
        <label for="content">Content</label>
        <textarea name="content" id="content"><?php echo htmlspecialchars($blog['content']); ?></textarea>
        <label for="image">Image</label>
        <input type="file" name="image" id="image">
        <?php if (!empty($blog['image'])): ?>
            <img src="<?php echo htmlspecialchars($blog['image']); ?>" alt="Blog Image">
        <?php endif; ?>
        <button type="submit">Update</button>
    </form>
    <a href="select.php">Show All Blogs</a>
</body>
</html>
