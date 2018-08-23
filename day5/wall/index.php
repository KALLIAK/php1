<?php
include_once 'functions.php';

$query = db_query("SELECT * FROM messages ORDER BY dt DESC");

$info = db_check_error($query);

$messages = $query->fetchAll();
foreach ($messages as $message) { ?>
    <div>
        <em><?= $message['dt'] ?></em>
        <strong><?= $message['user'] ?></strong>
        <div><?= $message['message'] ?></div>
    </div>
<?php } ?>

<button><a href="add.php">Post new message</a></button>