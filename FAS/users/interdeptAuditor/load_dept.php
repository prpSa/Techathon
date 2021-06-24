<?php
include "../../backend/include/conn.php";

$sql1 = "SELECT dept FROM users  username = $username";
$query1 = mysqli_query($conn, $sql1);
while ($dept = mysqli_fetch_assoc($query1)) {
    $dept = $dept['dept'];
    echo $dept;
}
