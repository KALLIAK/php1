<?= last_error() ?>
<form method="post">
    <label for="name">Логин:</label><br>
    <input id="name" name="login"> <br>
    <label for="pass">Пароль:</label><br>
    <input type="password" id="pass" name="password"><br>
    <input type="checkbox" id="remember" name="remember">Запомнить<br>
    <input type="submit" value="Авторизоваться">
    <button><a href="index.php">На главную</a></button>
</form>
