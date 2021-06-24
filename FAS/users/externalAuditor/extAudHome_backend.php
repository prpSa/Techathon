<?php
include "../../backend/include/conn.php";

if (isset($_POST['submit'])) {
    session_start();
    $year = $_POST['year'];
    $sem = $_POST['sem'];
    $sub = $_POST['sub'];

    $_SESSION['year'] = $year;
    $_SESSION['sem'] = $sem;
    $_SESSION['sub'] = $sub;
    header("location:subCard.php");
}
?>