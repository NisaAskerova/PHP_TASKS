<?php
include "connection.php";

function insertBlog($connection){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $title = $_POST['title'] ?? null;
        $content = $_POST['content'] ?? null;

        if(empty($title)){
            echo "Please fill the title<br>";
        } elseif(empty($content)){
            echo "Please fill the content<br>";
        } else {
            if(isset($_FILES['img']) && $_FILES['img']['error'] == 0){
                $file = $_FILES['img'];
                $name = $file['name'];
                $tmpName = $file['tmp_name'];

                $allowedExtensions = ['jpg', 'png', 'jpeg', 'gif'];
                $fileExtension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

                if(in_array($fileExtension, $allowedExtensions)){
                    $directory = 'uploads/';
                    if(!file_exists($directory)){
                        mkdir($directory, 0777, true);
                    }

                    $newFileName = uniqid() . '_' . time() . '.' . $fileExtension;
                    $destination = $directory . $newFileName;

                    if(move_uploaded_file($tmpName, $destination)){
                        $sql = "INSERT INTO blogs (title, content, image) VALUES (?, ?, ?)";
                        $insertQuery = $connection->prepare($sql);
                        $result = $insertQuery->execute([$title, $content, $destination]);

                        if($result){
                            echo "Successful<br>";
                        } else {
                            echo "Failed to insert blog into database<br>";
                        }
                    } else {
                        echo "Upload error<br>";
                    }
                } else {
                    echo "Invalid file extension<br>";
                }
            } else {
                echo "No file uploaded or upload error<br>";
            }
        }
    }
}

insertBlog($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Blog</title>
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
    </style>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content"></textarea>
        </div>
        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" name="img" id="img">
        </div>
        <button type="submit">Insert</button>
        <button type="button" onclick="location.href='select.php'">Show All Blogs</button>
    </form>
</body>
</html>
