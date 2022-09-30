<?php
session_start();
$login=trim(filter_var($_POST['login'],FILTER_SANITIZE_SPECIAL_CHARS));
$password=trim(filter_var($_POST['password'],FILTER_SANITIZE_SPECIAL_CHARS));
$error='';
if(strlen($login)<3){
    $error='Введите login';}
else if(strlen($password)<2){
    $error='Введите пароль';}
if($error!=''){
    echo $error;
    exit();
}

require_once "../lib/mysql.php";
$password=md5($password);

$sql='SELECT id FROM users WHERE `login`=? AND `password`=?';
$query=$pdo->prepare ($sql);
$query->execute(array($login,$password));
//header('Location:http://oleg3/register.php');
if($query->rowCount()==0)
    echo "Такого пользователя нет";
else{
//    setcookie('login',$login,time()+3600*24*30,"/");
      $_SESSION['auth']=$login;

    echo "Done";}
