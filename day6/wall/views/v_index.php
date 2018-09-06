<?php
foreach ($messages as $message) { ?>
    <em><?= $message['dt'] ?></em><br>
    <strong><?= $message['user'] ?></strong><br>
    <a href="index.php?c=message&id=<?= $message['id_message'] ?>"><?= $message['message'] ?></a>
    <hr>
<?php } ?>
