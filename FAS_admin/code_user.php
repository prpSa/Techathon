<?php

include 'valid.php';
$username = $_GET['username'];
include "include/conn.php";

if (isset($_POST['registerbtn'])) {
    $fullname = $_POST['fullname'];
    $username1 = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $mobile = $_POST['mobile'];
    $dept = $_POST['dept'];
    $role = 'teacher';

    //code for preventing duplicate entries
    $sql = "SELECT * FROM users WHERE name = '$fullname' && role ='teacher' OR username = '$username1' && role ='teacher'";
    $sql_run = mysqli_query($connection, $sql);
    $tuples = mysqli_num_rows($sql_run);
    if ($tuples == 0) {

        if ($password === $cpassword) {
            $query = "INSERT INTO users (name,username,password,role,mobile_no,dept) VALUES ('$fullname','$username1','$password','$role','$mobile','$dept')";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                $_SESSION['success'] = "User Profile Added";
                header("Location: register_user.php?username=$username");
            } else {
                $_SESSION['status'] = "User Profile NOT Added";
                header("Location: register_user.php?username=$username");
            }
        } else {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            header("Location: register_user.php?username=$username");
        }
    } else {
?>
        <script>
            alert("Username/name not available");
            window.open("register_user.php?username=<?php echo $username; ?>", "_self");
        </script>
<?php
    }
}

if (isset($_POST['add_btn'])) {
    $id = $_POST['add_id'];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = $connection->query($sql);
    $data = mysqli_query($connection, $sql);
    $total = mysqli_num_rows($data);
    if ($total != 0) {
        // output data of each row
        while ($result = mysqli_fetch_assoc($data)) {
            $fullname = $result['name'];
            $username1 = $result['username'];
        }
    }

    $query2 = "INSERT INTO `course_admin`( `name`, `tea_username`, `subject_name`, `division`, `year`, `role`) VALUES ('$fullname','$username1','','','','')";
    $query_run2 = mysqli_query($connection, $query2);
    if ($query_run2) {
        $_SESSION['success'] = "Course Successfully Assigned";
        header("Location: register_user.php?username=$username");
    } else {
        $_SESSION['status'] = "Course NOT Added";
        header("Location: register_user.php?username=$username");
    }
}

if (isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];

    $query = "SELECT * FROM users WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
}

if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $fullname = $_POST['edit_fullname'];
    $username1 = $_POST['edit_username'];
    $password = $_POST['edit_password'];
    $mobile = $_POST['edit_mobile'];
    $dept = $_POST['edit_dept'];
    $role = 'teacher';

    //code for preventing duplicate entries
    
        $query = "UPDATE users SET name = '$fullname' ,username = '$username1' , password='$password',role='$role', mobile_no='$mobile', dept='$dept' WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);
       
        if ($query_run) {
            $_SESSION['success'] = "Your Data is Updated";
            header("Location: register_user.php?username=$username");
        } else {
            $_SESSION['status'] = "Your Data is NOT Updated";
            header("Location: register_user.php?username=$username");
        }
    
}

if (isset($_POST['delete_btn'])) {
    $username2 = $_POST['delete_username'];

    $query = "DELETE FROM users WHERE username='$username2' ";
    $query1 = "set @autoid :=0";
    $query2 = "update users set id = @autoid := (@autoid+1)";
    $query3 = "alter table users Auto_Increment = 1";
    $query_run = mysqli_query($connection, $query);
    $query1_run = mysqli_query($connection, $query1);
    $query2_run = mysqli_query($connection, $query2);
    $query3_run = mysqli_query($connection, $query3);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Deleted";
        header("Location: register_user.php?username=$username");
    } else {
        $_SESSION['status'] = "Your Data is NOT Deleted";
        header("Location: register_user.php?username=$username");
    }
}



?>