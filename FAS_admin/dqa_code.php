<script src="js/sweetalert.min.js"></script>
<?php

include 'valid.php';
$username = $_GET['username'];
include "include/conn.php";

if (isset($_POST['registerbtn'])) {
    $fullname = $_POST['tea_name'];
    $username1 = $_POST['username'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $dept = $_POST['dept'];
    $role = 'dqa';

    // echo $fullname;
    // echo $username1;
    // echo $password;
    // echo $mobile;

    // if($password === $cpassword)
    // {

    //code for preventing duplicate entries
    $sql = "SELECT * FROM users WHERE name = '$fullname'&& role ='dqa'";
    $sql_run = mysqli_query($connection, $sql);
    $tuples = mysqli_num_rows($sql_run);
    if ($tuples == 0) {
        $query = "INSERT INTO users (name,username,password,role,mobile_no,dept) VALUES ('$fullname','$username1','$password','$role','$mobile','$dept')";
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            $_SESSION['success'] = "User Profile Added";
            header("Location: dqa.php?username=$username");
        } else {
            $_SESSION['status'] = "User Profile NOT Added";
            header("Location: dqa.php?username=$username");
        }
    } else {
?>
        <script>
            alert("User already added as DQA");
            window.open("dqa.php?username=<?php echo $username ;?>","_self");
        </script>
<?php
    }



    // }
    // else
    // {
    //         $_SESSION['status']="Password and Confirm Password Does Not Match";
    //         header("Location: dqa.php?username=$username");        
    // }  
}

if (isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];

    $query = "SELECT * FROM register WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
}

if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $fullname = $_POST['edit_fullname'];
    $username1 = $_POST['edit_username'];
    $password = $_POST['edit_password'];
    $mobile = $_POST['edit_mobile'];
    $dept = $_POST['edit_dept'];
    $query = "UPDATE users SET name = '$fullname' ,username = '$username1' , password='$password', mobile_no='$mobile', dept='$dept' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        $username = $_SESSION['username'];
        header("Location: dqa.php?username=$username");
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $username = $_SESSION['username'];
        header("Location: dqa.php?username=$username");
    }
}

if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM users WHERE id='$id' ";
    $query1 = "set @autoid :=0";
    $query2 = "update users set id = @autoid := (@autoid+1)";
    $query3 = "alter table users Auto_Increment = 1";
    $query_run = mysqli_query($connection, $query);
    $query1_run = mysqli_query($connection, $query1);
    $query2_run = mysqli_query($connection, $query2);
    $query3_run = mysqli_query($connection, $query3);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Deleted";
        $username = $_SESSION['username'];
        header("Location: dqa.php?username=$username");
    } else {
        $_SESSION['status'] = "Your Data is NOT Deleted";
        $username = $_SESSION['username'];
        header("Location: dqa.php?username=$username");
    }
}
