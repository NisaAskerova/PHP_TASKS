<?php
session_start();
$email='';
$password='';
$defaultEmail="nise@gmail.com";
$defulatPassword='123456789';
if($_SERVER['REQUEST_METHOD']='POST'){
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email=htmlspecialchars($_POST['email']);
        $password=htmlspecialchars($_POST['password']);
    if($email==$defaultEmail && $password==$defulatPassword){
        $_SESSION['email']=$email;
        $_SESSION['is_login']=true;
        echo "Welcome email $email"; 
    }
    else{
    echo "Parol ve ya sifre yanlisdir";
}
    }
}else{
    echo "zehmet olmasa melumatlari tam doldurun";
}
