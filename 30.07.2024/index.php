<?php
$fileUpload = 'upload/';
try {
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dataBaseName = 'phpform';

    $connection = new PDO("mysql:host=$server;dbname=$dataBaseName;charset=utf8", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . htmlspecialchars($e->getMessage());
}

function post($key) {
    return htmlspecialchars($_POST[$key] ?? '');
}

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $query = "INSERT INTO blogs (title, content, image) VALUES (?, ?, ?)";
        $blogsQuery = $connection->prepare($query);

        if (!file_exists($fileUpload)) {
            mkdir($fileUpload, 0777, true);
        }

        $file = $_FILES['file'];
        $name = $_FILES['file']['name'];
        $tmpName = $_FILES['file']['tmp_name'];
        $error = $_FILES['file']['error'];

        if ($error === UPLOAD_ERR_OK) {
            $allowedExtensions = ['png', 'jpg', 'jpeg', 'webp'];
            $fileExtensions = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            if (in_array($fileExtensions, $allowedExtensions)) {
                $newFileName = uniqid('') . '_' . time() . '.' . $fileExtensions;
                if (move_uploaded_file($tmpName, $fileUpload . $newFileName)) {
                    $uploadMessage = "File successfully uploaded.";
                } else {
                    $uploadMessage = "Failed to upload file.";
                }
            } else {
                $uploadMessage = "Invalid file extension.";
                $newFileName = null;
            }
        } else {
            $uploadMessage = "File upload error: " . $error;
            $newFileName = null;
        }

        $insertCheck = $blogsQuery->execute([
            post("title"),
            post("content"),
            $newFileName 
        ]);

        if (!$insertCheck) {
            $dataMessage = "Something went wrong.";
        } else {
            $dataMessage = "Data inserted successfully!";
        }
    }

    $fetchQuery = "SELECT * FROM blogs";
    $fetchStatement = $connection->query($fetchQuery);
    $blogs = $fetchStatement->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    $dataMessage = htmlspecialchars($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label, button{
            display:block;
            margin-top:10px;
        }
        body {
            font-family: Arial, sans-serif;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 16px;
            margin: 16px 0;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
        }
        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .card h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
        <label for="content">Content</label>
        <textarea name="content" id="content" required></textarea>
        <label for="image">Image</label>
        <input type="file" name="file" id="image" accept="image/*" required>
        <button type="submit">Send</button>
    </form>

    <?php if (isset($dataMessage)) { ?>
        <p><?php echo $dataMessage; ?></p>
    <?php } ?>

    <?php if (!empty($blogs)) { ?>
        <?php foreach ($blogs as $blog) { ?>
            <div class="card">
                <?php if (!empty($blog['image'])) { ?>
                    <img src="<?php echo htmlspecialchars($fileUpload . $blog['image']); ?>" alt="Blog Image">
                <?php } ?>
                <h2><?php echo htmlspecialchars($blog['title']); ?></h2>
                <p><?php echo htmlspecialchars($blog['content']); ?></p>
            </div>
        <?php } ?>
    <?php } ?>
</body>
</html>
