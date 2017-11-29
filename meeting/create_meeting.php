<?php
include('../config/db_connect.php');

session_start();

$name = $_POST['n'];
$day = $_POST['d'];
$startTime = $_POST['sT'];
$endTime = $_POST['eT'];
$notes = $_POST['notes'];
$group_name = $_POST['g_n'];



// Prepare a select statement
$stmt = $conn->prepare("INSERT INTO meetings(name, day, start_time, end_time, notes, group_name) VALUES(?, ?, ?, ?, ?, ?)");
$stmt->execute(array($name,$day,$startTime,$endTime,$notes, $group_name));
$count = $stmt->rowCount();

$stmt = $conn->prepare("SELECT id FROM meetings WHERE name=?");
$stmt->execute(array($name));
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

$meeting_id = $rows['id'];

$stmt = $conn->prepare("SELECT id FROM groups WHERE name=?");
$stmt->execute(array($group_name));
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

$group_id = $rows['id'];

$stmt = $conn->prepare("INSERT INTO group_meeting(meeting_id, group_id) VALUES(?, ?)");
$stmt->execute(array($meeting_id, $group_id));
$count = $stmt->rowCount();



