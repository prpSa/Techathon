<?php 
    $data = $_GET['name'];
    $courseID = $_GET['courseID'];
    $division = $_GET['division'];
    $audType = 'aud2';
    include "include/conn.php"; 
    $stat = $dbh->prepare("select * from audit_docs where courseID=? and audType=? and division=?");
    $stat->bindParam(1, $courseID); 
    $stat->bindParam(2, $audType); 
    $stat->bindParam(3, $division); 
    $stat->execute();
    $row = $stat->fetch(); 
    header('Content-Type:'.$row['extension']);
    echo $row["$data"];
 ?>