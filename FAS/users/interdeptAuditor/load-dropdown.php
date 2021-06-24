<?php
include "../../backend/include/conn.php";

//semester
// if ($_POST['type'] == 'sem') {
//     $sql = "SELECT DISTINCT sem FROM course WHERE fromAcadYr = {$_POST['id1']}";
//     $query = mysqli_query($conn, $sql) or die("Query Unsuccessful");
//     $str = "<option value=''>Select Semester</option>";

//     while ($row = mysqli_fetch_assoc($query)) {
//         $str .= "<option value='{$row['sem']}'>{$row['sem']}</option>";
//     }
//     echo $str;
// }

//Instructors
if ($_POST['type'] == 'sub') {
    // $sql = "SELECT DISTINCT tea_username FROM hodhomee WHERE year = {$_POST['id1']} && tea_username in (SELECT username FROM users WHERE dept = '{$_POST['id2']}')";

    $sql = "SELECT DISTINCT name,username FROM users WHERE dept = '{$_POST['id2']}' && username in (SELECT tea_username FROM hodhomee WHERE year = {$_POST['id1']})";
    // echo $sql;
    
    $query = mysqli_query($conn, $sql) or die("Query Unsuccessful");
    $str = "<option value=''>Select Instructor</option>";

    while ($row = mysqli_fetch_assoc($query)) {
        $str .= "<option value='{$row['username']}'>{$row['name']}</option>";
    }
    echo $str;
}