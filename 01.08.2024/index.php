<?php
include "connection.php";
$folderUpload = 'upload/';

function insertBlog($connection, $folderUpload) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['title'])) {
            echo "Please fill the title";
        } elseif (empty($_POST['content'])) {
            echo "Please fill the content";
        } else {
            $destination = '';

            if (isset($_FILES['image']) && $_FILES['image']["error"] === 0) {
                $file = $_FILES['image'];
                $name = $file['name'];
                $tmpName = $file['tmp_name'];

                $allowedExtensions = ['png', 'jpg', 'jpeg'];
                $fileExtension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                if (in_array($fileExtension, $allowedExtensions)) {
                    if (!file_exists($folderUpload)) {
                        mkdir($folderUpload, 0777, true);
                    }
                    $newFileName = uniqid() . time() . '.' . $fileExtension;
                    $destination = $folderUpload . $newFileName;
                    $upload = move_uploaded_file($tmpName, $destination);
                    if (!$upload) {
                        echo "Upload error";
                        return;
                    }
                } else {
                    echo "Invalid file extension";
                    return;
                }
            }

            $sql = "INSERT INTO blogs (title, content, image) VALUES (?, ?, ?)";
            $insertQuery = $connection->prepare($sql);
            $result = $insertQuery->execute([
                $_POST['title'],
                $_POST['content'],
                $destination
            ]);

            if ($result) {
                echo "Blog inserted successfully!";
            } else {
                echo "Error inserting blog";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Blog</title>
</head>
<style>
    label, button {
        display: block;
        margin-top: 10px;
    }
</style>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <label for="content">Content</label>
        <textarea name="content" id="content"></textarea>
        <label for="image">Image</label>
        <input type="file" name="image" id="image">
        <div>
            <button type="button"><a href="select.php">Show All Blogs</a></button>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
