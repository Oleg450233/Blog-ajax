<?php
session_start();

$title=trim(filter_var($_POST['title'],FILTER_SANITIZE_SPECIAL_CHARS));
$anons=trim(filter_var($_POST['anons'],FILTER_SANITIZE_SPECIAL_CHARS));
$text=trim(filter_var($_POST['text'],FILTER_SANITIZE_SPECIAL_CHARS));

$error='';

if(strlen($title)<3){
    $error='Введите название статьи';}
else if(strlen($anons)<5){
    $error='Введите анонс';}
else if(strlen($text)<10){
    $error='Введите основной текст';}
if($error!=''){
    echo $error;
    exit();
}

$host='localhost';
$user='root';
$password='';
$db='web-blog';
$port=3306;

$dsn='mysql:host='.$host.';dbname='.$db.';port='.$port;

$pdo=new PDO($dsn,$user,$password);

$sql='INSERT INTO message (title,anons,text,avtor) VALUES (?,?,?,?)';
$query=$pdo->prepare ($sql);
$query->execute(array($title,$anons,$text,$_SESSION ['auth']));
echo "Done";
