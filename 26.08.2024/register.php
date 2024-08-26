<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['email']) && !empty(trim($_POST['email']))) {
        $email = $_POST['email'];
        
        $sql = "INSERT INTO users (email) VALUES (?)";
        $insertQuery = $conn->prepare($sql);
        
        $check = $insertQuery->execute([$email]);
        
        if ($check) {
            session_start();
            $_SESSION['user_email'] = $email;
            $_SESSION['user_id'] = $_POST['id'];
            header('Location: http://localhost/praktika0822/evest.php');
            exit(); 
        } 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="email">Register</label>
        <input type="email" name="email" id="email" required>
        <button type="submit">Send</button>
    </form>
</body>
</html>
