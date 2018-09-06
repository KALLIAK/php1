<?php foreach ($messages as $message): ?>
    <br><a href="post.php?id=<?= $message['id_news'] ?>"><?= $message['title'] ?></a>
    <a href="edit.php?id=<?= $message['id_news'] ?>">&lt;- (edit)</a>
<?php endforeach; ?>
<br>
