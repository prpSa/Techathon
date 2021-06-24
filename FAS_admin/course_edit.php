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
    <h6 class="m-0 font-weight-bold text-primary">Course Section
    </h6>
  </div>
    <div class="card-body">
<?php  
        
include "include/conn.php";    
if(isset($_POST['edit_btn']))
{
    $id=$_POST['edit_id'];
    $username = $_POST['username'];
    
    $query="SELECT * FROM hodhomee WHERE courseID='$id' AND username='$username'";
    $query_run=mysqli_query($connection,$query);
    
    foreach($query_run as $row)
    {
        ?>
        
        
        <form action="course_code.php?username=<?php echo $username;?>" method="post">
           
            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
                <label> Name </label>
                <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label>Username/E-mail</label>
                <input type="text" name="edit_username" value="<?php echo $row['tea_username'] ?>" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="edit_subject" value="<?php echo $row['subject_name'] ?>" class="form-control" placeholder="Enter Subject Name">
            </div>
            <div class="form-group">
                <label>Division</label>
                <input type="text" name="edit_division" value="<?php echo $row['division'] ?>" class="form-control" placeholder="Enter Division">
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="text" name="edit_year" value="<?php echo $row['year'] ?>" class="form-control" placeholder="Enter Year">
            </div>
            <div class="form-group">
                <label>Role:</label>
            <select name="edit_role" id="edit_role" class="form-control" placeholder="Enter Year">
                <option value="speTea">Special Teacher</option>
                <option value="subTea">Subject Teacher</option>
            </select>
            </div>
        <a href="course.php?username=<?php echo $username;?>" class="btn btn-danger" > Cancel </a>
        <button type="submit" name="updatebtn" class="btn btn-primary"> Edit </button>
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