<?php
//http://form.guide/php-form/php-login-form.html
include_once 'db_connect.php';

login();

function login() {
    /*if(empty($_POST['username'])) {
        $this->HandleError("Enter a username");
        return false;
    }
    if(empty($_POST['password'])) {
        $this->HandleError("Enter a password");
        return false;
    }*/
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(!CheckLoginInDB($username,$password)) {
        return false;
    }

    session_start();

    $_SESSION[$this->GetLoginSessionVar()] = $username;
    return true;
}

function CheckLoginInDB($user,$password) {


    $username = $user;
    $pwdmd5 = md5($password);
    $qry = "Select name, email from c2375a03test ".
        " where username='$username' and password='$pwdmd5' ";

    $result = mysql_query($qry);

    if(!$result || mysql_num_rows($result) <= 0) {
        HandleError("Error logging in. ".
        "Username or password does not match");
        return false;
    }
    return true;
}