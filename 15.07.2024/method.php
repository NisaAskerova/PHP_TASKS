<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        session_destroy();
        header('Location: index.php'); 
        exit();
    }

    if (isset($_POST['username']) && isset($_POST['email'])) {
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['email'] = $_POST['email'];
    }
}

if (isset($_SESSION['name'])) {
    $username = $_SESSION['name'];
    $email = $_SESSION['email'];

    echo "Xos gelmisiniz, $username. Email adresiniz: $email";
}
?>
