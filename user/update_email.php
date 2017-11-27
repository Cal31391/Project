<?php
include('../config/db_connect.php');

session_start();


$oldemail = $_SESSION['email'];


// Define variables and initialize with empty values
$email_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = ($_POST['email']);

    // Prepare a select statement
    $stmt1 = $conn->prepare("SELECT id FROM users WHERE email=?");
    $stmt1->execute(array($oldemail));
    $rows = $stmt1->fetch(PDO::FETCH_ASSOC);
    $id = $rows['id'];

    $stmt = $conn->prepare("UPDATE users SET email=? WHERE id=?");
    $stmt->execute(array($email, $id));
    $count = $stmt->rowCount();
    $_SESSION['email'] = $email;

    header("location: ../account_settings.php");
}