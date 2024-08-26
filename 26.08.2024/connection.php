<?php
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "dataschema";

    $conn = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
