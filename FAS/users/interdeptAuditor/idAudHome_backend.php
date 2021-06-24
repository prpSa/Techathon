<?php
include "../../backend/include/conn.php";

if (isset($_POST['submit'])) {
    session_start();
    $year = $_POST['year']; //year
    $teaname = $_POST['sub']; //Faculty name

    $_SESSION['year'] = $year;
    $_SESSION['sub'] = $teaname;
    //$_SESSION['dept'] already stored value of department of auditor who login

    header("location:idSubCard.php");
}
?>