<?php
$username = $_GET['username'];
session_start();
if (!isset($_SESSION[$username])) {
    header('location: login.php');
}
$username = $_GET['username'];