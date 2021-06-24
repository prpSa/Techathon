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
        <h5 class="modal-title" id="exampleModalLabel">Add Course Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="course_code.php?username=<?php echo $username;?>" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Name </label>
                <input type="text" name="name" class="form-control" placeholder="Enter Teacher's Name">
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
                <label> Division </label>
                <input type="text" name="division" class="form-control" placeholder="Enter Division">
            </div>
            <div class="form-group">
                <label> Year </label>
                <input type="text" name="year" class="form-control" placeholder="Enter Year">
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
    <h6 class="m-0 font-weight-bold text-primary">Course Section 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduserprofile">
              Add Course Data 
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
        
        $query="SELECT * FROM hodhomee";
        $query_run=mysqli_query($connection,$query);
    ?>
        
        
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>CourseID</th>
            <th>Username/E-mail</th>
            <th>Subject</th>
            <th>Division</th>  
            <th>Year</th>
            <th>Role</th>  
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     
        <?php   
        $id=0; 
          if(mysqli_num_rows($query_run)>0) {
              while($row=mysqli_fetch_assoc($query_run))
              { $id++;       
        ?>
          <tr>
            <td> <?php echo $id; ?> </td>
            <td> <?php echo $row['courseID']; ?></td> 
            <td> <?php echo $row['tea_username']; ?></td>  
            <td> <?php echo $row['sub_name']; ?></td>  
            <td> <?php echo $row['division']; ?></td>
            <td> <?php echo $row['year']; ?></td>  
            <td> <?php echo $row['teaType']; ?></td>  
            <td>
                <form action="course_edit.php?username=<?php echo $username;?>" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['courseID']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="javascript:void(0);" method="post" id="myForm">
                  <input type="hidden" name="delete_id" value="<?php echo $row['courseID']; ?>">
                  <input type="hidden" name="subject_name" value="<?php echo $row['sub_name']; ?>">
                  <button type="submit" name="delete_btn" onclick="confirmationDelete();" class="btn btn-danger"> DELETE</button>
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
<script type="text/javascript">
  function confirmationDelete(anchor) {
    var conf = confirm("Are you sure you want to Delete the Record?");
    if (conf) {
      document.getElementById("myForm").action = "course_code.php?username=<?php echo $username;?>";
      document.getElementById("myForm").submit();
    }
  }
</script>