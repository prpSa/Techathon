<?php

include 'valid.php';
include('includes/header.php');
include('includes/navbar.php');
$username = $_GET['username'];
$_SESSION['username'] = $username;
$username = $_SESSION['username'];

// echo $_SESSION['username'];
?>


<div class="modal fade" id="adduserprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add DQA Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="dqa_code.php?username=<?php echo $username; ?>" method="POST">

        <div class="modal-body">

          <div class="form-group">
            <label> Full Name </label>
            <select name="tea_name" id="tea_name" class="select" style="width: 100%; height : 35px; " placeholder="Select Instructor">
              <option value="">Select Instructor</option>
              <?php
              include 'include/conn.php';
              $sql = "SELECT * FROM users WHERE role = 'teacher'";
              $query = mysqli_query($conn, $sql);
              $str = "";
              while ($row = mysqli_fetch_assoc($query)) {
                // echo $row;
                $str .= "<option value='{$row['name']}'>{$row['name']}</option>";
              }
              echo $str;
              ?>
            </select>
          </div>

          <div id="add_tea_form">
            <div class="form-group">
              <label> Username/E-mail </label>
              <input type="email" name="username" class="form-control" id="username" placeholder="Enter Username" readonly required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" readonly required>
            </div>
            <div class="form-group">
              <label>Mobile No.</label>
              <input type="text" name="mobile" class="form-control" id="mobno" pattern=".{10}" placeholder="Enter Mobile No." readonly required>
            </div>
            <div class="form-group">
              <label>Department:</label>
              <input type="text" name="dept" class="form-control" id="dept" placeholder="Enter Department" readonly required>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DQA Profile
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduserprofile">
          Add DQA Profile
        </button>
      </h6>
    </div>

    <div class="card-body">

      <?php
      if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
        echo '<h2 class="bg-primary text-white">' . $_SESSION['success'] . '</h2>';
        unset($_SESSION['success']);
      }
      if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '<h2 class="bg-danger text-white">' . $_SESSION['status'] . '</h2>';
        unset($_SESSION['status']);
      }

      ?>

      <div class="table-responsive">

        <?php
       include "include/conn.php";

        $query = "SELECT * FROM users WHERE role='dqa' ";
        $query_run = mysqli_query($connection, $query);
        ?>


        <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> ID </th>
              <th>Full Name </th>
              <th>Username/E-mail </th>
              <th>Password </th>
              <th>Mobile No. </th>
              <th>Department </th>
              <th>EDIT </th>
              <th>DELETE </th>
            </tr>
          </thead>
          <tbody>

            <?php
            $i = 0;
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
                $i++;

            ?>

                <tr>
                  <td> <?php echo $i; ?> </td>
                  <td> <?php echo $row['name']; ?></td>
                  <td> <?php echo $row['username']; ?></td>
                  <td> <?php echo $row['password']; ?></td>
                  <td> <?php echo $row['mobile_no']; ?></td>
                  <td> <?php echo $row['dept']; ?></td>
                  <td>
                    <?php $username = $_SESSION['username']; ?>
                    <form action="dqa_edit.php?username=<?php echo $username; ?>" method="post">
                      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                    </form>
                  </td>
                  <td>
                    <form action="dqa_code.php?username=<?php echo $username; ?>" method="post">
                      <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                    </form>
                  </td>
                </tr>
            <?php
              }
            } else {
              echo "No Record Found";
            }
            ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.bootstrap.js"></script>

<script>
  $(document).ready(function() {
    function loadData(type, category1) {
      $.ajax({
        url: "dqa-dropdown.php",
        type: "POST",
        data: {
          type: type,
          id1: category1,
        },
        success: function(data) {
          if (type == "add_tea_form" && tea_name == "") {
            $("#add_tea_form").html(data);
          } else if (type == "add_tea_form") {
            $("#add_tea_form").html(data);
          }
        }
      });
    }

    $("#tea_name").on("change", function() {
      var tea_name = $("#tea_name").val();

      console.log(tea_name);
      if (tea_name == "") {

      } else {

        loadData("add_tea_form", tea_name);
      }

    })
  })


  $(document).ready(function() {
    $("#dataTable").DataTable();
  })
</script>
<!-- <select name="dept" id="dept" placeholder="Enter Department">
    <option value="CE">CE</option>
    <option value="IT">IT</option>
    <option value="EXTC">EXTC</option>
    <option value="EE">EE</option>
    <option value="IE">IE</option>
  </select> -->