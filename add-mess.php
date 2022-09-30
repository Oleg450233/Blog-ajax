<?php
session_start();
if(!isset($_SESSION['auth'])){
   header('location:register.php');
   exit();
}
?>
<!DOCTYPE html>
<html lang=ru">
<head>
    <?php
    $website_title="Добавление статьи";
    require "blocks/head.php"
    ?>
</head>
<body>
<?php
require "blocks/header.php";
?>
<main>
    <h1> Добавить статью</h1><br>
    <form>
        <input type="text" name="title" id="title" placeholder="Название статьи"><br><br>
        <textarea name="anons" id="anons" placeholder="Анонс статьи" ></textarea><br><br>
        <textarea name="text" id="text" placeholder="Основной текст"></textarea><br><br>
        <button type="button" id="add-mess">Добавить</button>
        <div class="error-mess" id="error-block"> </div>
    </form>
</main>
<?php
require "blocks/aside.php";
require "blocks/footer.php";
?>
<script>
    $('#add-mess').click (function() {
        let title = $('#title').val();
        let anons = $('#anons').val();
        let text = $('#text').val();
                $.ajax({
            url: 'ajax/add_mess.php',
            type: 'POST',
            cache: false,
            data: {'title': title, 'anons': anons, 'text': text},
            dataType: 'html',
            success: function (data) {
                if (data === 'Done') {
                    $("#add-mess").text("Все готово");
                    $('#title').val("");
                    $('#anons').val("");
                    $('#text').val("");
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
</html>