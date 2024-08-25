<?php
session_start();
$uploadDirectory = 'upload/';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email'])
    &&isset($_POST['surname']) && !empty($_POST['surname']) && isset($_POST['password']) && !empty($_POST['password'])){
$name=htmlspecialchars($_POST['name']);
$surname=htmlspecialchars($_POST['surname']);
$email=htmlspecialchars($_POST['email']);
$password=htmlspecialchars($_POST['password']);
$_SESSION['forms'][]=['name'=>$name, 'email'=>$email, 'surname'=>$surname, 'password'=>$password ];
if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory);
}

$files = $_FILES['file'];
$total = count($files['name']);
$allowedExtensions = ['png', 'jpg', 'webp', 'jpeg'];

for ($i = 0; $i < $total; $i++) {
    $name = $files['name'][$i];
    $size = $files['size'][$i];
    $type = $files['type'][$i];
    $tmpName = $files['tmp_name'][$i];

    $fileExtension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    if (in_array($fileExtension, $allowedExtensions)) {
        $newFileName = uniqid('', true) . "_" . time() . '.' . $fileExtension;

        if (move_uploaded_file($tmpName, $uploadDirectory . $newFileName)) {
            header('location: http://localhost/home-task/login.php');
            echo 'File ' . $name . ' gonderildi<br>';
        } else {
            echo 'File ' . $name . ' yeniden cehd edin<br>';
        }
    } else {
        echo 'File ' . $name . ' tipi uygun deyil<br>';
    }
}
    }
    else{
        echo" Formu doldurmaginiz xahis olunur";
    }
  
}
?>

