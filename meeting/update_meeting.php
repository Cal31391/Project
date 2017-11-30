<?php
include('../config/db_connect.php');

session_start();

$name = $_POST['n'];
$day = $_POST['d'];
$startTime = $_POST['sT'];
$endTime = $_POST['eT'];
$notes = $_POST['notes'];
$group_name = $_POST['g_n'];
$user = $_POST['u'];

$stmt = $conn->prepare("SELECT id FROM meetings WHERE name=:old_name");
$stmt->bindParam(':old_name', $_SESSION['meeting_name'], PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

$meeting_id = $rows['id'];

$stmt = $conn->prepare("UPDATE meetings SET name=:name, day=:day, start_time=:sTime, end_time=:eTime, notes=:notes, group_name=:gName WHERE id=$meeting_id");
$stmt->bindParam(':name', $_POST['n'], PDO::PARAM_STR);
$stmt->bindParam(':day', $_POST['d'], PDO::PARAM_STR);
$stmt->bindParam(':sTime', $_POST['sT'], PDO::PARAM_STR);
$stmt->bindParam(':eTime', $_POST['eT'], PDO::PARAM_STR);
$stmt->bindParam(':notes', $_POST['notes'], PDO::PARAM_STR);
$stmt->bindParam(':gName', $_POST['g_n'], PDO::PARAM_STR);
$stmt->execute();

$_SESSION['meeting_name'] = $name;
//$_SESSION['location'] = $rows['location'];
$_SESSION['notes'] = $notes;
$_SESSION['group_name'] = $group_name;
$_SESSION['sTime'] = $startTime;
$_SESSION['eTime'] = $endTime;
$_SESSION['day'] = $day;
