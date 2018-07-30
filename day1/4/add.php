<?php
include_once 'functions.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim(htmlspecialchars($_POST['title']));
    $content = trim(htmlspecialchars($_POST['content']));
    //$list = scandir('data');
    //$isUnique = true;
    $msg = '';

    if ($title == '' || $content == '') {
        $msg = 'Заполните все поля';
    } elseif (checker($title)) {
        $msg = 'Некорректное заглавие статьи!';
    } elseif (file_exists('data/' . $title)) {
        $msg = 'Неуникальное название файла!';
    } else {
        file_put_contents('data/'.$title, $content);
        header("Location: a.php");
        exit();
    }
}
$msg = $msg ?? '';
$title = $title ?? '';
$content = $content ?? '';
?>
    <form method="post">
        <label for="title">Название:</label><br>
        <input name="title" value="<?= $title ?>"><br>
        <label for="content">Контент:</label><br>
        <textarea name="content"><?= $content ?></textarea><br>
        <input type="submit" value="Добавить">
    </form>
<?php echo $msg; ?>