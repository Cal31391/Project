<?php
include('../config/db_connect.php');

session_start();

$active = 1;
$archived = 0;

// Prepare a select statement
$stmt = $conn->prepare("INSERT INTO groups(name, active, archived) VALUES(:group_name,$active,$archived)");
$stmt->bindParam(':group_name', $_POST['n'], PDO::PARAM_STR);
$stmt->execute();
$count = $stmt->rowCount();