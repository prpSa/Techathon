<?php 
    $data = $_GET['name'];
    $courseID = $_GET['courseID'];
    $tea_username = $_GET['username'];
    $audType = 'aud2';
    include "include/conn.php";
    $stat = $dbh->prepare("select * from audit_docs where courseID=? and audType=? and tea_username=?");
    $stat->bindParam(1, $courseID); 
    $stat->bindParam(2, $audType); 
    $stat->bindParam(3, $tea_username); 
    $stat->execute();
    $row = $stat->fetch(); 
    header('Content-Type:'.$row['extension']);
    echo $row["$data"];
?>