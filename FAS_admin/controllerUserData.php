<?php
session_start();
require "include/conn.php";
$email = "";
$name = "";
$errors = array();

//if user click login button
if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $captcha = mysqli_real_escape_string($conn, $_POST['captcha']);

    $check_email = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password' ") or die(mysqli_error(die));
    $fetch = $check_email->fetch_array();
    $row = $check_email->num_rows;
    if ($_SESSION['CODE'] == $captcha) {
        $role = $fetch['role'];
        echo $role;
        if ($row > 0) {
            session_start();
            $_SESSION['id'] = $fetch['id'];
            $_SESSION[$username]=$username;
            header("location:http://localhost/FAS_admin/index.php?username=$username");
        } else { 
            echo '<script type="text/javascript">'; 
            echo 'alert("Invalid Credentials");'; 
            echo 'window.open("http://localhost/FAS_admin/login.php","_self");';
            echo '</script>';
}
    } 
    else {
        $errors['captcha'] = "Please enter valid captcha code";
    }
}
