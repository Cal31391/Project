<?php
include('config/db_connect.php');

session_start();

// Define variables and initialize with empty values
$username = $password = $email = "";
$username_err = $password_err = $email_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = ($_POST['username']);
    $password = ($_POST['pwd']);
    $email = ($_POST['email']);
    $name = "";


    // Prepare a select statement
    $stmt = $conn->prepare("INSERT INTO users(username, password, name, email) VALUES(?, ?, ?, ?)");
    $stmt->execute(array($username,$password,$name,$email));
    $count = $stmt->rowCount();

    if (empty($_POST["username"])) {
        $username_err = "Enter a username";
    }
    if (empty($_POST["password"])) {
        $password_err = "Enter a password";
    }
    if (empty($_POST["email"])) {
        $email_err = "Enter an email";
    }

    if ($count == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;

        header("location: dashboard.php");
    } else {
        header("location: failure.html");
    }

}