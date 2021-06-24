<?php 
    $data = $_GET['name'];
    $courseID = $_GET['courseID'];
    include "include/conn.php"; 
    $stat = $dbh->prepare("select * from auditorobservationii where courseID=?");
    $stat->bindParam(1, $courseID); 
    $stat->execute();
    $row = $stat->fetch(); 
    header('Content-Type:'.$row['extension']);
    echo $row["$data"];
 ?>