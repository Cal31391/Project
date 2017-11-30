<?php
include('../config/db_connect.php');


$group_name = $_POST['n_id'];;

$stmt = $conn->prepare("SELECT m.id FROM meetings m 
INNER JOIN groups g on m.group_name=g.name WHERE g.name = '$group_name'");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$meeting_count = $stmt->rowCount();

$meeting_name = "";
$meeting_day = "";
$i = 0;
if ($meeting_count > 0) {
    foreach($rows as $row) {
        //$row = $rows[$i];
        $meeting_id = $row['id'];

        $stmt = $conn->prepare("SELECT name, day FROM meetings WHERE id = $meeting_id");
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $meeting_name = $rows['name'];
        $meeting_day = $rows['day'];

        echo "<li id='name$i'>$meeting_name, $meeting_day<a onclick='getMeetingDetailsForEditGroups($i)' class='link' style='cursor: pointer'>Info</a></li>";
        $i++;
    }
}