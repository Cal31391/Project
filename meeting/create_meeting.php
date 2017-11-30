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



// Prepare a select statement
$stmt = $conn->prepare("INSERT INTO meetings(name, day, start_time, end_time, notes, group_name) VALUES(?, ?, ?, ?, ?, ?)");
$stmt->execute(array($name,$day,$startTime,$endTime,$notes, $group_name));
$count = $stmt->rowCount();

$stmt = $conn->prepare("SELECT id FROM meetings WHERE name=:name");
$stmt->bindParam(':name', $_POST['n'], PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

$meeting_id = $rows['id'];

$stmt = $conn->prepare("SELECT id FROM users WHERE username=:username");
$stmt->bindParam(':username', $_POST['u'], PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

$user_id = $rows['id'];

$stmt = $conn->prepare("INSERT INTO user_meeting(meeting_id, user_id) VALUES(?, ?)");
$stmt->execute(array($meeting_id, $user_id));
$count = $stmt->rowCount();



