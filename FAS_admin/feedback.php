<?php

include 'valid.php';
include('includes/header.php'); 
include('includes/navbar.php');
$username = $_GET['username']; 
?>


<div class="modal fade" id="adduserprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Feedback Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="feedback_code.php?username=<?php echo $username;?>" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Name </label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label> Username/E-mail </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label> Subject Name </label>
                <input type="text" name="subject" class="form-control" placeholder="Enter Subject Name">
            </div>
            <div class="form-group">
                <label> Message </label>
                <input type="text" name="message" class="form-control" placeholder="Enter Message">
            </div>
            <div class="form-group">
                <label> Reply </label>
                <input type="text" name="reply" class="form-control" placeholder="Enter Reply">
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
    <h6 class="m-0 font-weight-bold text-primary">Feedback Section 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduserprofile">
              Add Teacher Feedback 
            </button>
    </h6>
  </div>

  <div class="card-body">
      
    <?php
      if(isset($_SESSION['success']) && $_SESSION['success'] !='')
      {
          echo '<h2 class="bg-primary text-white">' .$_SESSION['success'].'</h2>';
          unset($_SESSION['success']);
      }
   if(isset($_SESSION['status']) && $_SESSION['status'] !='')
      {
          echo '<h2 class="bg-danger text-white">' .$_SESSION['status'].'</h2>';
          unset($_SESSION['status']);
      }  
          
    ?>      
          
    <div class="table-responsive">

    <?php
        include "include/conn.php";
        
        $query="SELECT * FROM feedback";
        $query_run=mysqli_query($connection,$query);
    ?>
        
        
      <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username/E-mail</th>
            <th>Subject</th>
            <th>Message</th>  
            <th>Reply Given</th>  
            <th>REPLY </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     
        <?php 
        $i=0;   
          if(mysqli_num_rows($query_run)>0) 
          {
              while($row=mysqli_fetch_assoc($query_run))
              {
                $i++;
                 
        ?>
            
          <tr>
            <td> <?php echo $i;?> </td>
            <td> <?php echo $row['name']; ?></td> 
            <td> <?php echo $row['tea_username']; ?></td>  
            <td> <?php echo $row['subject_name']; ?></td>  
            <td> <?php echo $row['message']; ?></td>
            <td> <?php echo $row['reply']; ?></td>  
            <td>
                <form action="feedback_edit.php?username=<?php echo $username;?>" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> REPLY</button>
                </form>
            </td>
            <td>
                <form action="feedback_code.php?username=<?php echo $username;?>" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
        <?php
              }
          }
            else{
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
<script type="text/javascript">
  function confirmationDelete(anchor) {
    var conf = confirm("Are you sure you want to Cancel the booking?");
    if (conf) {
      window.location = anchor.attr("href");
    }
  }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#dataTable").DataTable();
  });
</script>