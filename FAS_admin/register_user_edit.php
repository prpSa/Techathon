<?php

include 'valid.php';
include('includes/header.php');
include('includes/navbar.php');
$username = $_GET['username'];
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT Teacher and Course Profile
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


                    <form action="code_user.php?username=<?php echo $username; ?>" method="post">

                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                        <div class="form-group">
                            <label> Full Name </label>
                            <input type="text" name="edit_fullname" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Enter Full Name">
                        </div>
                        <div class="form-group">
                            <label> Username </label>
                            <input type="email" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Enter Username (Email only)" readonly>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label>Mobile No.</label>
                            <input type="text" name="edit_mobile" value="<?php echo $row['mobile_no'] ?>" pattern=".{10}" class="form-control" placeholder="Enter 10 digit Mobile No.">
                        </div>
                        <div class="form-group">
                            <label>Department:</label>
                            <select name="edit_dept" id="edit_dept" placeholder="Enter Department">
                                <option value="CE">CE</option>
                                <option value="IT">IT</option>
                                <option value="EXTC">EXTC</option>
                                <option value="EE">EE</option>
                                <option value="IE">IE</option>
                            </select>
                        </div>
                        <a href="register_user.php?username=<?php echo $username; ?>" class="btn btn-danger"> Cancel </a>
                        <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>
                    </form>
            <?php

                    $dept = $row['dept'];
                }
            }
            ?>
            <?php
            if (isset($_POST['add_btn'])) {
                $id = $_POST['add_id'];

                $query = "SELECT * FROM users WHERE id='$id'";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
            ?>


                    <form action="course_code.php?username=<?php echo $username; ?>" method="POST">

                        <div class="modal-body">

                            <div class="form-group">
                                <label> Name </label>
                                <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>" placeholder="Enter Teacher's Name" readonly>
                            </div>
                            <div class="form-group">
                                <label> Username/E-mail </label>
                                <input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>" placeholder="Enter Username" readonly>
                            </div>
                            <div id="sub-fetch">
                                <div class="form-group">
                                    <label> Subject Name </label>
                                    <input type="text" name="subject" class="form-control" placeholder="Enter Subject Name">
                                </div>
                                <div class="form-group">
                                    <label> Year </label>
                                    <input type="text" name="year" class="form-control" placeholder="Enter Year">
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Division </label>
                                <input type="text" name="division" class="form-control" placeholder="Enter Division">
                            </div>
                            <div class="form-group">
                                <label>Role:</label>
                                <select name="role" id="role" placeholder="Enter Category">
                                    <option value="speTea">Special Teacher</option>
                                    <option value="subTea">Subject Teacher</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <a href="register_user.php?username=<?php echo $username; ?>"><button type="button" class="btn btn-secondary">Close</button></a>
                            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    </form>
            <?php
                    $dept = $row['dept'];
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

<script>
    $(document).ready(function() {
        function loadData(type, category1) {
            $.ajax({
                url: "sub-fetch.php",
                type: "POST",
                data: {
                    type: type,
                    id1: category1,
                },
                success: function(data) {
                    if (type == "sub-fetch") {
                        $("#sub-fetch").html(data);
                    }
                }
            });
        }
        dept = '<?php echo $dept; ?>';
        console.log(dept);
        loadData("sub-fetch", dept);
    })
</script>