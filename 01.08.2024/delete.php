<?php
include "connection.php";
if (isset($_GET['id'])) {
    $sql = "DELETE FROM blogs WHERE id=?";
    $deleteQuery = $connection->prepare($sql);
    $deleteQuery->execute([$_GET['id']]);
    header("Location: select.php");
    exit();
}
?>
