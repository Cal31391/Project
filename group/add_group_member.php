<?php
include('../config/db_connect.php');

$name = $_POST['n'];
$group = $_POST['g'];

$stmt = $conn->prepare("SELECT id FROM users WHERE username=?");
$stmt->execute(array($name));
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

$user_id = $rows['id'];

$stmt = $conn->prepare("SELECT id FROM groups WHERE name=?");
$stmt->execute(array($group));
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

$group_id = $rows['id'];

$stmt = $conn->prepare("INSERT INTO user_group(user_id, group_id) VALUES(?, ?)");
$stmt->execute(array($user_id, $group_id));
$count = $stmt->rowCount();



