<!DOCTYPE html>
<html lang=ru">
<head>
    <?php
    session_start();
    require_once "lib/mysql.php";
    $sql='SELECT*FROM message WHERE `id`=?';
    $query=$pdo->prepare($sql);
    $query->execute([$_GET['id']]);
    $article=$query->fetch(PDO::FETCH_OBJ);

    $website_title=$article->title;
    require "blocks/head.php"
    ?>
</head>
<body>
<?php
require "blocks/header.php";
?>
<main>
    <?php

        echo "<div class='post'><h1>". $article->title ."</h1>
        <p>" . $article->text . "</p>
        <p class='avtor'>Автор: <span>" . $article->avtor . "</span></p>
        </div>";
    ?>
    <h3> Комментарии</h3><br>
    <form>
        <input type="text" name="username" id="username" placeholder="Введите имя" value="<?=$_SESSION['auth']?>"><br><br>
        <textarea type="text" name="mess" id="mess" placeholder="Введите сообщение"></textarea><br><br>
        <div class="error-mess" id="error-block"> </div>
        <button type="button" id="mess_send">Добавить комментарий</button>
    </form>
<div class="comments">
    <?php
    $sql='SELECT*FROM comments  WHERE `mess_id`=? ORDER BY `id` DESC';
    $query=$pdo->prepare($sql);
    $query->execute([$_GET['id']]);

    $article=$query->fetchAll(PDO::FETCH_OBJ);
    foreach ($article as $el) {
        echo "<div class='comment'><h2>".$el->name."</h2><p>".$el->mess."</p></div>";
    }

    ?>
</div>


</main>
<?php
require "blocks/aside.php";
require "blocks/footer.php";
?>
<script>
$('#mess_send').click (function() {
let name = $('#username').val();
let mess = $('#mess').val();
$.ajax({
url: 'ajax/comment_add.php',
type: 'POST',
cache: false,
data: {'username': name, 'mess': mess, 'id': '<?=$_GET['id']?>'},
dataType: 'html',
success: function (data) {
if (data === 'Done') {
    $(".comments").prepend(`<div class ='comment'><h2>${name}</h2> <p>${mess}</p></div>`);
$("#mess_send").text("Все готово");
$("#error-block").hide();
$('#mess').val("");
}
else {
$("#error-block").show();
$("#error-block").text(data);

}
}
})
})
</script>
</body>
</html