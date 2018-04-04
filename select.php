<?php
include './db_open.php';

$results = $db->query('SELECT * from kids');
while ($row = $results->fetchArray()) {
    echo $row["id"] . " | " . $row["name"];
    echo "<br />";
}

include './db_close.php';
?>