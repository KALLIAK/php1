<br>
<form action="add.php" method="post">
    Name <br>
    <input type="text" name="user" value="<?= $user ?>"><br>
    Text <br>
    <textarea name="message" value="<?= $message ?>"></textarea><br>
    <input type="submit" value="Post">
</form>
<button><a href="index.php">Main page</a></button>