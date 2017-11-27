<?php
include('../config/db_connect.php');

session_start();

$username = $_SESSION['username'];
$oldpw = $_SESSION['password'];



// Define variables and initialize with empty values
$password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    if($oldpw != $_POST['password-old']) {

        trigger_error("Password you entered is incorrect.");

        echo("<script>console.log('PHP: ".$_SESSION['password']."');</script>");
    }
    else if ($_POST['password-new'] == $_POST['password-new-re']) {
        $pw = ($_POST['password-new-re']);
    }
    else {
            $password_err = "Passwords do not match";
            trigger_error(($password_err));//temporary error report//
        }

    // Prepare a select statement
    $stmt1 = $conn->prepare("SELECT id FROM users WHERE username=?");
    $stmt1->execute(array($username));
    $rows = $stmt1->fetch(PDO::FETCH_ASSOC);
    $id = $rows['id'];

    $stmt = $conn->prepare("UPDATE users SET password=? WHERE id=?");
    $stmt->execute(array($pw, $id));
    $count = $stmt->rowCount();
    $_SESSION['password'] = $pw;

    header("location: ../account_settings.php");
}