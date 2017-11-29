<?php
include('../config/db_connect.php');

session_start();

$name = $_POST['n_id'];
$active = 1;
$archived = 0;

// Prepare a select statement
$stmt = $conn->prepare("INSERT INTO groups(name, active, archived) VALUES(?, ?, ?)");
$stmt->execute(array($name, $active, $archived));
$count = $stmt->rowCount();