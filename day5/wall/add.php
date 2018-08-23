<?php
include_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['user']);
    $message = trim($_POST['message']);

    if ($user == '' || $message == '') {
        $errMsg = 'Fields cannot be empty!';
    } else {

        $query = db_query("INSERT INTO messages (user, message) VALUES (:user, :message)",
            [
                'user' => $user,
                'message' => $message
            ]);

        $info = db_check_error($query);
        if ($info[0] === PDO::ERR_NONE) {
            echo 'Message added!';
        }
    }
} else {

    $user = '';
    $message = '';

}
$errMsg = $errMsg ?? '';
echo $errMsg;
?>

<br>
<form action="add.php" method="post">
    Name <br>
    <input type="text" name="user" value="<?= $user ?>"><br>
    Text <br>
    <textarea name="message" value="<?= $message ?>"></textarea><br>
    <input type="submit" value="Post">
</form>
<button><a href="index.php">Main page</a></button>