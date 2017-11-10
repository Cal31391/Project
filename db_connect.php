<?php
$servername = "localhost";
$username = "c2375a03";
$password = "c2375aU!";

try {
    $conn = new PDO("mysql:host=$servername;dbname=c2375a03test", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
