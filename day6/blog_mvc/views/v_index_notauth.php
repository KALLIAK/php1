<?php foreach ($messages as $message): ?>
    <br><a href="post.php?id=<?= $message['id_news'] ?>"><?= $message['title'] ?></a>
<?php endforeach; ?>
<br>
