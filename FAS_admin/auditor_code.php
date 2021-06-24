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
    $role = $_POST['role'];
    // if($password === $cpassword)
    // {

    //code for preventing duplicate entries
    $sql = "SELECT * FROM users WHERE name = '$fullname' AND role = 'auditor' OR name = '$fullname' AND role = 'idAuditor' ";
    $sql_run = mysqli_query($connection, $sql);
    $tuples = mysqli_num_rows($sql_run);
    if ($tuples == 0) {
        if ($fullname != "") {
            $query = "INSERT INTO users (name,username,password,role,mobile_no,dept) VALUES ('$fullname','$username1','$password','$role','$mobile','$dept')";
            $query_run = mysqli_query($connection, $query);
            if ($query_run) {
                $_SESSION['success'] = "User Profile Added";
                header("Location: auditor.php?username=$username");
            } else {
                $_SESSION['status'] = "User Profile NOT Added";
                header("Location: auditor.php?username=$username");
            }
        } else {
?>
            <script>
                alert("Please Select Instructor");
                window.open("auditor.php?username=<?php echo $username; ?>", "_self");
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert("User already added as Auditor");
            window.open("auditor.php?username=<?php echo $username; ?>", "_self");
        </script>
        <?php
    }
}

if (isset($_POST['registerbtn-ext'])) {
    $fullname = $_POST['tea_name-ext'];
    $username1 = $_POST['username-ext'];
    $password = $_POST['password-ext'];
    $mobile = $_POST['mobile-ext'];
    $dept = $_POST['dept-ext'];
    $role = $_POST['role-ext'];
    // if($password === $cpassword)
    // {

    //code for preventing duplicate entries

    $sql = "SELECT * FROM users WHERE name = '$fullname' OR username = '$username1' && role ='teacher'";
    $sql_run = mysqli_query($connection, $sql);
    $tuples = mysqli_num_rows($sql_run);
    if ($tuples == 0) {
        $sql = "SELECT * FROM users WHERE name = '$fullname' && role ='extAuditor'";
        $sql_run = mysqli_query($connection, $sql);
        $tuples = mysqli_num_rows($sql_run);
        if ($tuples == 0) {
            $query = "INSERT INTO users (name,username,password,role,mobile_no,dept) VALUES ('$fullname','$username1','$password','$role','$mobile','$dept')";
            $query_run = mysqli_query($connection, $query);
            if ($query_run) {
                $_SESSION['success'] = "User Profile Added";
                header("Location: auditor.php?username=$username");
            } else {
                $_SESSION['status'] = "User Profile NOT Added";
                header("Location: auditor.php?username=$username");
            }
        } else {
        ?>
            <script>
                alert("User already added as External Auditor");
                window.open("auditor.php?username=<?php echo $username; ?>", "_self");
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert("Username/Name already present as teacher so can't add as external auditor, try with different Username/Name");
            window.open("auditor.php?username=<?php echo $username; ?>", "_self");
        </script>
<?php
    }
}
// else
// {
//         $_SESSION['status']="Password and Confirm Password Does Not Match";
//         header("Location: auditor.php?username=$username");        
// }  



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
    $role = $_POST['edit_role'];
    $query = "UPDATE users SET name = '$fullname' ,username = '$username1' , password='$password',role='$role', mobile_no='$mobile', dept='$dept' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        $username = $_SESSION['username'];
        header("Location: auditor.php?username=$username");
    } else {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $username = $_SESSION['username'];
        header("Location: auditor.php?username=$username");
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
        header("Location: auditor.php?username=$username");
    } else {
        $_SESSION['status'] = "Your Data is NOT Deleted";
        $username = $_SESSION['username'];
        header("Location: auditor.php?username=$username");
    }
}



?>