<?php
session_start();
$blogs=[];
if(isset($_SESSION['blogs']) && !empty($_SESSION['blogs'])){
$blogs=$_SESSION['blogs'];
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
        }
    </style>
</head>
<body>
    <form action="method.php" method="POST">
        <label for="title">Title</label>
        <input type="text" id="title" name="title">
        <label for="content">Content</label>
        <textarea name="content" id="content"></textarea>
        <button type="submit">Gonder</button>
        
    </form>
    <a href="logout.php">
        <button>Log out</button>
        </a>
    <div>
        <?php
        if(!empty($blogs)){
            foreach($blogs as $blog){
                $title=$blog['title'];
                $content=$blog['content'];
            ?>
            <h3><?php echo $title; ?></h3>
            <p><?php echo $content; ?></p>
            <?php
            }
        }

        ?>
    </div>
</body>
</html>