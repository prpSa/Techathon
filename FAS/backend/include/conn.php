<?php
    // Create connection
    $server = "localhost";
    $uname = "root";
    $password = "";
    $conn = mysqli_connect($server, $uname, $password,"fasdbnew");
    $dbh = new PDO("mysql:host=localhost;dbname=fasdbnew","root",""); 
    // Check connection
    if ($conn->connect_error)  {
        die("Connection failed: " . $conn->connect_error);
    } 
?>