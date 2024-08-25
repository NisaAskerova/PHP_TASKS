<?php
try {
    $server = "localhost";
    $username = "root";
    $password = "";
    $dataBase = "phpform";

    $connection = new PDO("mysql:host=$server;dbname=$dataBase;charset=utf8", $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
