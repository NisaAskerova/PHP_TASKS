<?php
include "connection.php";

function selectBlog($connection) {
    $sql = "SELECT * FROM blogs";
    $blogQuery = $connection->prepare($sql);
    $blogQuery->execute();
    return $blogQuery->fetchAll(PDO::FETCH_ASSOC);
}

$blogs = selectBlog($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Blogs</title>
</head>
<body>
    <div>
        <?php foreach ($blogs as $blog): ?>
        <div>
            <img src="<?php echo htmlspecialchars($blog['image']); ?>" alt="Blog Image">
            <h3><?php echo htmlspecialchars($blog['title']); ?></h3>
            <p><?php echo htmlspecialchars($blog['content']); ?></p>
            <div>
                <a href="edit.php?id=<?php echo $blog['id']; ?>"><button>Edit</button></a>
                <a href="delete.php?id=<?php echo $blog['id']; ?>"><button>Delete</button></a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
