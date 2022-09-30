<?php
$name=trim(filter_var($_POST['username'],FILTER_SANITIZE_SPECIAL_CHARS));
$mess=trim(filter_var($_POST['mess'],FILTER_SANITIZE_SPECIAL_CHARS));
$id=trim(filter_var($_POST['id'],FILTER_SANITIZE_SPECIAL_CHARS));
$error='';
if(strlen($name)<2){
    $error='Введите имя';}
else if(strlen($mess)<5){
    $error='Введите коментарий';}
if($error!=''){
    echo $error;
    exit();
}

require_once "../lib/mysql.php";

$sql='INSERT INTO comments (name,mess,mess_id)VALUES (?,?,?)';
$query=$pdo->prepare ($sql);
$query->execute([$name,$mess,$id]);
echo "Done";
