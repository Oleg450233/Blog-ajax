<?php
session_start();
?>
<!DOCTYPE html>
<html lang=ru">
<head>
    <?php
    $website_title="Регистрация";
    require "blocks/head.php"
    ?>
</head>
<body>
<?php
require "blocks/header.php";
?>
<main>
     <?php if (!isset($_SESSION['auth'])):?>
    <h1> Авторизация</h1><br>
    <form>
        <input type="text" name="login" id="login" placeholder="Введите login" ><br><br>
        <input type="text" name="password" id="password" placeholder="Введите пароль"><br><br>
        <div class="error-mess" id="error-block"> </div>
        <button type="button" id="login_user">Войти</button>
    </form>
     <?php else:?>
     <h2><?=$_SESSION['auth']?></h2>
     <form>
         <button type=""button" id="exit_user">Выйти</button>
     </form>
    <?php endif;?>
</main>
</main>
<?php
require "blocks/aside.php";
require "blocks/footer.php";
?>
<script>
    $('#login_user').click (function() {
        let login = $('#login').val();
        let password = $('#password').val();
        $.ajax({
            url: 'ajax/login.php',
            type: 'POST',
            cache: false,
            data: {'login': login, 'password': password},
            dataType: 'html',
            success: function (data) {
                if (data === 'Done') {
                    $("#login_user").text("Все готово");
                    $("#error-block").hide();
                    document.location.reload(true);
                }
                else {
                    $("#error-block").show();
                    $("#error-block").text(data);}
            }
        })
    })
    $('#exit_user').click (function() {
        $.ajax({
            url: 'ajax/exit.php',
            type: 'POST',
            cache: false,
            data: {},
            dataType: 'html',
            success: function (data) {
                if (data === 'Done') {
                    document.location.reload(true);}
                            }
        });
    });
</script>

</body>
</html>