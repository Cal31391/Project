<?php
include('../config/db_connect.php');

session_start();

$name = $_POST['n'];


$stmt = $conn->prepare("SELECT id FROM groups WHERE name = :old_name");
$stmt->bindParam(':old_name', $_POST['old'], PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

$group_id = $rows['id'];

// Prepare a select statement
$stmt = $conn->prepare("UPDATE groups SET name = :new_name WHERE id=$group_id ");
$stmt->bindParam(':new_name', $_POST['n'], PDO::PARAM_STR);
$stmt->execute();
$count = $stmt->rowCount();

