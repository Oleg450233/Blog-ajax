<?php

//$message=trim(filter_var($_POST['message'],FILTER_SANITIZE_SPECIAL_CHARS));
$message=$_POST['message'];

//$error='';
//
//if(strlen($message)<1){
//    $error='Введите сообщение';}
//if($error!=''){
//    echo $error;
//    exit();
//}

require_once "../lib/mysql.php";


$sql='INSERT INTO chat (message)VALUES (?)';
$query=$pdo->prepare ($sql);
$query->execute([$message]);
//echo "Done";
