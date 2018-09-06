<?= last_error() ?>
<form action="index.php?c=add" method="post">
    <label for="title">Название:</label><br>
    <input name="title" value="<?= $title ?>"><br>
    <label for="content">Контент:</label><br>
    <textarea name="content"><?= $content ?></textarea><br>
    <input type="submit" value="Добавить">
</form>
