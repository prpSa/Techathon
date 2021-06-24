<?php

include 'valid.php';
include('includes/header.php');
include('includes/navbar.php');
$username = $_GET['username'];
// $username = $_SESSION['username'] ;
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT DQA Profile
            </h6>
        </div>
        <div class="card-body">
            <?php

            include "include/conn.php";
            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM users WHERE id='$id'";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
            ?>


                    <form action="dqa_code.php?username=<?php echo $username; ?>" method="post">

                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                        <div class="form-group">
                            <label> Full Name </label>
                            <input type="text" name="edit_fullname" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Enter Full Name" readonly>
                        </div>
                        <div class="form-group">
                            <label> Username </label>
                            <input type="email" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Enter Username (Email only)" readonly>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password" readonly>
                        </div>
                        <div class="form-group">
                            <label>Mobile No.</label>
                            <input type="text" name="edit_mobile" value="<?php echo $row['mobile_no'] ?>" class="form-control" pattern = ".{10}" placeholder="Enter 10 digit Mobile No.">
                        </div>
                        <div class="form-group">
                            <label>Department:</label>
                            <input type="text" name="edit_dept" value="<?php echo $row['dept'] ?>" class="form-control" id="edit_dept" placeholder="Enter Department" readonly>
                        </div>
                        <a href="dqa.php?username=<?php echo $username; ?>" class="btn btn-danger"> Cancel </a>
        <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>
        </div>
        
        </form>
<?php
                }
            }
?>



    </div>
</div>
</div>







<?php
include('includes/scripts.php');
include('includes/footer.php');
?>