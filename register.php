
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
    <h1> Регистрация</h1><br>
    <form>
          <input type="text" name="username" id="username" placeholder="Введите имя" ><br><br>
          <input type="text" name="email" id="email" placeholder="Введите email"><br><br>
          <input type="text" name="login" id="login" placeholder="Введите login"><br><br>
          <input type="text" name="password" id="password" placeholder="Введите пароль"><br><br>
          <div class="error-mess" id="error-block"> </div>
          <button type="button" id="reg_user">Зарегистрироваться</button>
    </form>
</main>
<?php
require "blocks/aside.php";
require "blocks/footer.php";
?>
<script>
    $('#reg_user').click (function() {
        let name = $('#username').val();
        let email = $('#email').val();
        let login = $('#login').val();
        let password = $('#password').val();
        $.ajax({
            url: 'ajax/reg.php',
            type: 'POST',
            cache: false,
            data: {'username': name, 'email': email, 'login': login, 'password': password},
            dataType: 'html',
            success: function (data) {
                if (data === 'Done') {
                    $("#reg_user").text("Все готово");
                     $("#error-block").hide();

                }
                else {
                    $("#error-block").show();
                    $("#error-block").text(data);}
            }
        })
    })
</script>

</body>
</html>