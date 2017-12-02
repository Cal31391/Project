<?php
include('./config/db_connect.php');

session_start();

$location = $_POST['loc'];
$location_name = $_POST['address'];
$meeting_name = $_POST['meeting'];


$stmt = $conn->prepare("UPDATE meetings SET location=:loc, location_name=:address WHERE name=:meeting_name");
$stmt->bindParam(':loc', $_POST['loc'], PDO::PARAM_STR);
$stmt->bindParam(':meeting_name', $_POST['meeting'], PDO::PARAM_STR);
$stmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
$stmt->execute();
$count = $stmt->rowCount();

$_SESSION['location_name'] = $location_name;

$_SESSION['location'] = $location;