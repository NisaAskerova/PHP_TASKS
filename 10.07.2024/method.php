<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['title']) && isset($_POST['content'])){
        $title=htmlspecialchars($_POST['title']);
        $content=htmlspecialchars($_POST['content']);
        $_SESSION['blogs'][]=['title'=>$title, "content"=>$content];
        header('location: home.php');
    }
}else{
    echo "error";
}