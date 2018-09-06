<?php foreach ($messages as $message): ?>
    <br><a href="index.php?c=post&id=<?= $message['id_news'] ?>"><?= $message['title'] ?></a>
    <a href="index.php?c=edit&id=<?= $message['id_news'] ?>">&lt;- (edit)</a>
<?php endforeach; ?>
<br>
