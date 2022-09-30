<header>
    <span class="logo">Blog master</span>
    <nav>
        <a href="index.php"> Главная</a>
        <a href="contacts.php">Контакты</a>
        <?php if (isset($_SESSION['auth'])):?>
            <a href="add-mess.php">Добавить статью</a>
        <a href="login.php"class="btn">Кабинет пользователя</a>

        <?php else:?>
        <a href="login.php"class="btn"> Войти</a>
        <a href="register.php"class="btn"> Регистрация</a>
        <?php endif; ?>
    </nav>
</header>