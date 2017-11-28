<?php
include('config/db_connect.php');

session_start();

// Define variables and initialize with empty values
$username = $password = $email = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = ($_POST['username']);
    $password = ($_POST['pwd']);
    $email = ($_POST['email']);


    // Prepare a select statement
    $stmt = $conn->prepare("INSERT INTO users(username, password, email) VALUES(?, ?, ?)");
    $stmt->execute(array($username,$password,$email));
    $count = $stmt->rowCount();


    if ($count == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;

        header("location: dashboard.php");
    } else {
        header("location: failure.html");
    }

}