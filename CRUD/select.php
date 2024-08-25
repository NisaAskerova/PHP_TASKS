<?php
include "connection.php";

function selectBlogs($connection){
    $sql="SELECT * FROM blogs";
    $selectQuery=$connection->prepare($sql);
    $selectQuery->execute([]);
    return $selectQuery->fetchAll(PDO::FETCH_ASSOC);
}
$blogs = selectBlogs($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        #hero {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .card {
            width: 400px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }

        .card-content {
            padding: 15px;
        }

        .card h3 {
            margin: 0 0 10px;
            font-size: 1.5em;
            color: #333;
        }

        .card p {
            margin: 0;
            font-size: 1em;
            color: #666;
        }

        .card-actions {
            padding: 15px;
            text-align: right;
            border-top: 1px solid #ddd;
        }

        .card button {
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 10px;
            padding: 10px 20px;
            color: white;
            font-size: 1em;
        }
        .card button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div id="hero">
        <?php foreach ($blogs as $blog) : ?>
        <div class="card">
            <img src="<?= htmlspecialchars($blog['image']) ?>" alt="<?= htmlspecialchars($blog['title']) ?>">
            <div class="card-content">
                <h3><?= htmlspecialchars($blog['title']) ?></h3>
                <p><?= htmlspecialchars($blog['content']) ?></p>
            </div>
            <div class="card-actions">
                <a href="edit.php?id=<?=$blog["id"]?>"><button>edit</button></a>
                <a href="delete.php?id=<?=$blog['id'] ?>"><Button>delete</Button></a>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</body>
</html>
