<?php
include('../config/db_connect.php');

session_start();


// Prepare a select statement
$stmt = $conn->prepare("SELECT * FROM meetings WHERE name = :meeting_name");
$stmt->bindParam(':meeting_name', $_POST['n'], PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();


    $_SESSION['meeting_name'] = $rows['name'];
    //$_SESSION['location'] = $rows['location'];
    $_SESSION['notes'] = $rows['notes'];
    $_SESSION['group_name'] = $rows['group_name'];
    $_SESSION['sTime'] = $rows['start_time'];
    $_SESSION['eTime'] = $rows['end_time'];
    $_SESSION['day'] = $rows['day'];



header("location: ../meeting_info.php");

