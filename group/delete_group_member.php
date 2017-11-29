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

$stmt = $conn->prepare("DELETE ug 
 FROM user_group ug
 inner join users u on u.id = ug.user_id
 inner join groups g on g.id = ug.group_id 
 where ug.user_id = '$user_id' and ug.group_id = '$group_id'");
$stmt->execute();
$count = $stmt->rowCount();