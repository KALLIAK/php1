<?php
session_start();

if (count($_POST) > 0) {
    $_SESSION['name'] = $_POST['name'];
    header('Location: b.php');
    exit();
}

?>
<form method="post">
    <label for="name">Имя:</label><br>
    <input name="name" <br>
    <input type="submit" value="Добавить">
</form>
