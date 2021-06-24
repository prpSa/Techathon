<?php
    // Create connection
    $server = "localhost";
    $x = "root";
    $password = "";
    $conn = mysqli_connect($server, $x, $password,"fasdbnew");
    $connection = mysqli_connect($server, $x, $password,"fasdbnew");
    // Check connection
    if ($connection->connect_error)  {
        die("Connection failed: " . $connection->connect_error);
    } 
?>