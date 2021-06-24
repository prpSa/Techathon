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
    <h6 class="m-0 font-weight-bold text-primary">EDIT Admin Profile 
    </h6>
  </div>
    <div class="card-body">
<?php  
        
include "include/conn.php";       
if(isset($_POST['edit_btn']))
{
    $id=$_POST['edit_id'];
    
    $query="SELECT * FROM admin WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);
    
    foreach($query_run as $row)
    {
        ?>
        
        
        <form action="code.php?username=<?php echo $username;?>" method="post">
           
            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
                <label> Name </label>
                <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Enter Name">
             </div>
            <div class="form-group">
                <label> Username/E-mail </label>
                <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password">
            </div>
        <a href="register.php?username=<?php echo $username;?>" class="btn btn-danger" > Cancel </a>
        <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>
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