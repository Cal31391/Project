<?php
include('../config/db_connect.php');

session_start();


$oldusername = $_SESSION['username'];


// Define variables and initialize with empty values
$username_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = ($_POST['username']);

    // Prepare a select statement
    $stmt1 = $conn->prepare("SELECT id FROM users WHERE username=?");
    $stmt1->execute(array($oldusername));
    $rows = $stmt1->fetch(PDO::FETCH_ASSOC);
    $id = $rows['id'];

    $stmt = $conn->prepare("UPDATE users SET username=? WHERE id=?");
    $stmt->execute(array($username, $id));
    $count = $stmt->rowCount();
    $_SESSION['username'] = $username;

    header("location: ../account_settings.php");
}
