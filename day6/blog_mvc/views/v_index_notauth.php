<?php foreach ($messages as $message): ?>
    <br><a href="index.php?c=post&id=<?= $message['id_news'] ?>"><?= $message['title'] ?></a>
<?php endforeach; ?>
<br>
