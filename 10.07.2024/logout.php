<?php
session_start();
$_SESSION=[];
session_destroy();

header('location: http://localhost/Hw-task/Form/home.php');