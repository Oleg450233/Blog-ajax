<!DOCTYPE html>
<html lang=ru">
<head>
<?php
    $website_title="Blog Master";
     require "blocks/head.php"
?>
</head>
<body>
<?php
require "blocks/header.php";
?>
<main>
    <?php

    require_once "lib/mysql.php";
    $sql='SELECT*FROM message ORDER BY `id` DESC';
    $query=$pdo->query ($sql);
    while($row=$query->fetch(PDO::FETCH_OBJ)) {
        echo "<div class='post'><h1>". $row->title ."</h1>
        <p>" . $row->anons . "</p>
        <p class='avtor'>Автор: <span>" . $row->avtor . "</span></p>
        <a href='http://m5/post.php?id=".$row->id."'title='".$row->title."'</a>Прочитать</a>
        </div>";
    }

    ?>
</main>
<?php
require "blocks/aside.php";
require "blocks/footer.php";
?>
</body>
</html>