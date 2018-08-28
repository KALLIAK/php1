<?php
foreach ($messages as $message) { ?>
    <em><?= $message['dt'] ?></em><br>
    <strong><?= $message['user'] ?></strong><br>
    <a href="message.php?id=<?= $message['id_message'] ?>"><?= $message['message'] ?></a>
    <hr>
<?php } ?>
