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
    <h6 class="m-0 font-weight-bold text-primary">Reply Section
    </h6>
  </div>
    <div class="card-body">
<?php  
        
include "include/conn.php";       
if(isset($_POST['edit_btn']))
{
    $id=$_POST['edit_id'];
    
    $query="SELECT * FROM feedback WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);
    
    foreach($query_run as $row)
    {
        ?>
        
        
        <form action="feedback_code.php?username=<?php echo $username;?>" method="post">
           
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
                <input type="text" name="edit_subject" value="<?php echo $row['subject_name'] ?>" class="form-control" placeholder="Enter Phone Number">
            </div>
            <div class="form-group">
                <label>Message</label>
                <input type="text" name="edit_message" value="<?php echo $row['message'] ?>" class="form-control" placeholder="Enter Message">
            </div>
            <div class="form-group">
                <label>Reply</label>
                <input type="text" name="edit_reply" value="<?php echo $row['reply'] ?>" class="form-control" placeholder="Enter Reply">
            </div>
        <a href="register_user.php?username=<?php echo $username;?>" class="btn btn-danger" > Cancel </a>
        <button type="submit" name="updatebtn" class="btn btn-primary"> Reply </button>
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