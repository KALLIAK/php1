<?php
$data = file('log.txt');

echo '<table>';

for ($i = 0; $i < count($data); $i++) {
    $info =  explode('@-@', rtrim($data[$i]));
    echo "<tr>";
    foreach ($info as $elem) {
        echo '<td>'.$elem.'</td>';
    }
    echo "</tr>";
}

echo '</table>';
?>
<style>
    table, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }
</style>
