<?php
include "../../backend/include/conn.php";

//semester
if ($_POST['type'] == 'sem') {
    $sql = "SELECT DISTINCT sem FROM course WHERE fromAcadYr = {$_POST['id1']}";
    $query = mysqli_query($conn, $sql) or die("Query Unsuccessful");
    $str = "<option value=''>Select Semester</option>";

    while ($row = mysqli_fetch_assoc($query)) {
        $str .= "<option value='{$row['sem']}'>{$row['sem']}</option>";
    }
    echo $str;
}

//subjects
if ($_POST['type'] == 'sub') {
    // $sql = "SELECT DISTINCT courseName FROM course WHERE fromAcadYr = {$_POST['id1']} && sem = {$_POST['id2']}";
    $sql = "SELECT DISTINCT courseName FROM course WHERE fromAcadYr = {$_POST['id1']} && sem = {$_POST['id2']} && courseID IN (SELECT courseID FROM hodhomee WHERE tea_username IN (SELECT username FROM users WHERE dept = '{$_POST['id3']}'))";
    $query = mysqli_query($conn, $sql) or die("Query Unsuccessful");
    $str = "<option value=''>Select Subject</option>";

    while ($row = mysqli_fetch_assoc($query)) {
        $str .= "<option value='{$row['courseName']}'>{$row['courseName']}</option>";
    }
    echo $str;
}

//SELECT DISTINCT courseName FROM course WHERE fromAcadYr = 2020 && sem = 4 && courseID IN (SELECT courseID FROM hodhomee WHERE tea_username IN (SELECT username FROM users WHERE dept = 'CE'));