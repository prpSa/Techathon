<?php
include 'valid.php';
include('includes/header.php'); 
include('includes/navbar.php'); 
$username = $_GET['username'];
$courseID = $_GET['courseID'];
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Course Section
    </h6>
  </div>
    <div class="card-body">
<?php  
        
include "include/conn.php";    
if(isset($_POST['edit_btn']))
{
    $courseID = $_GET['courseID'];
    
    $query="SELECT * FROM course WHERE courseID='$courseID'";
    $query_run=mysqli_query($connection,$query);
    
    foreach($query_run as $row)
        {
            ?>
            <div class="modal-body">
              
                <input type="hidden" name="courseID" value="<?php echo $row['courseID'] ?>">
                <div class="form-group">
                    <label> Department </label>
                    <input type="text" name="edit_name" value="<?php echo $row['dept'] ?>" class="form-control" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label> Course name </label>
                    <input type="text" name="courseName" value="<?php echo $row['courseName'] ?>" class="form-control" placeholder="Enter Subject Name">
                </div>

                <div class="form-group">
                    <label> Subject Code </label>
                    <input type="text" name="subjectCode" value="<?php echo $row['subjectCode'] ?>" class="form-control" placeholder="Enter Email">
                </div>

                <div class="form-group">
                    <label> Semester </label>
                    <input type="text" name="sem" value="<?php echo $row['sem'] ?>" class="form-control" placeholder="Enter Division">
                </div>

                <div class="form-group">
                    <label>Year</label>
                    <input type="text" name="fromAcadYr" value="<?php echo $row['fromAcadYr'] ?>" class="form-control" placeholder="Enter Year">
                </div>

                <div class="form-group">
                    <label> Class Or Lab: </label>
                <select name="edit_role" id="edit_role" class="form-control" value="<?php echo $row['classOrLab'] ?>" placeholder="<?php echo $row['classOrLab'] ?>">
                    <option value="class">Class</option>
                    <option value="lab">Lab</option>
                </select>
                </div>
                </div>
                <div class="modal-footer">
                  <a href="subjects.php?username=<?php echo $username;?>" class="btn btn-danger" > Cancel </a>
                  <button type="submit" name="updatebtn" class="btn btn-primary"> Edit </button>
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