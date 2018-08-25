<?php
echo last_error();
if (!empty($message)) { ?>
    <div>
        <em><?= $message['dt'] ?></em><br><br>
        <strong><?= $message['user'] ?></strong><br>
        <?php echo nl2br($message['message']); ?>
    </div>
<?php } ?>
<br>
<button><a href="index.php">Назад</a></button>
