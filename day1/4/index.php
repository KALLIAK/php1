<?php

$list = scandir('data');

foreach ($list as $fname) {
    if (is_file("data/$fname")) {
        echo "<a href=\"post.php?fname=$fname\">$fname</a> <a href=\"edit.php?fname=$fname\">edit</a> <br>";
    }
}

?>
<br>
<button><a href="add.php" style="text-decoration: none">Добавить</a></button>
