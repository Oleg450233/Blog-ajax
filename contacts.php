
<!DOCTYPE html>
<html lang=ru">
<head>
    <?php
    $website_title="Контакты";
    require "blocks/head.php"
    ?>
</head>
<body>
<?php
require "blocks/header.php";
?>
<main>
    <h1> Контакты</h1><br>
    <form>
        <input type="username" name="username" id="username" placeholder="Ваше имя" ><br><br>
        <input type="email" name="email" id="email" placeholder="Email"><br><br>
        <textarea type="mess" name="mess" id="mess" placeholder="Сообщение"></textarea><br><br>
        <div class="error-mess" id="error-block"> </div>
        <button type="button" id="mess_send">Отправить</button>
    </form>
</main>
<?php
require "blocks/aside.php";
require "blocks/footer.php";
?>
<script>
    $('#mess_send').click (function() {
        let username = $('#username').val();
        let email = $('#email').val();
        let mess = $('#mess').val();
                $.ajax({
            url: 'ajax/mail.php',
            type: 'POST',
            cache: false,
            data: {'username': username, 'email': email, 'mess': mess},
            dataType: 'html',
            success: function (data) {
                if (data === 'Done') {
                    $("#mess_send").text("Все готово");
                    $("#error-block").hide();
                    $('#username').val("");
                    $('#email').val("");
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
</html>