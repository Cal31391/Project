<?php
include('../config/db_connect.php');

session_start();


$stmt = $conn->prepare("SELECT * FROM groups");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
echo "<option value='" . 0 . "'>" . "(Select Group)" . "</option>";


if ($count > 0) {
    for($i=0; $i<$count; $i++) {
        $row = $rows[$i];
        echo "<option value='" . $row["name"] . "'>" . $row['name'] . "</option>";
    }
}