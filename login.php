<?php
include('config/db_connect.php');

session_start();

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = ($_POST['username']);
    $password = ($_POST['password']);


    // Prepare a select statement
    $stmt = $conn->prepare("SELECT username, email FROM users WHERE username=? and password=?");
    $stmt->execute(array($username, $password));
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();

    if(empty($_POST["username"])) {
        $username_err = "Incorrect username";
    }
    if(empty($_POST["password"])) {
        $password_err = "Incorrect password";
    }

    if($count == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $rows['email'];


        header("location: dashboard.php");
    }
    else {
        header("location: failure.html");
    }

}