<?php


include 'valid.php';
$username = $_GET['username'];
include "include/conn.php";

if(isset($_POST['registerbtn']))
{
    $name = $_POST['name'];
    $username1 = $_POST['username'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $reply = $_POST['reply'];
    
    
        $query = "INSERT INTO feedback (name,tea_username,subject_name,message,reply) VALUES ('$name','$username1','$subject','$message','$reply')";
        $query_run = mysqli_query($connection,$query);
        
        if($query_run){
            $_SESSION['success']="Teacher Feedback Added Successfully";
            header("Location: feedback.php?username=$username");
        }
        else
        {
            $_SESSION['status']="Teacher Feedback NOT Added";
            header("Location: feedback.php?username=$username");
        }
        
}

if(isset($_POST['edit_btn']))
{
    $id=$_POST['edit_id'];
    
    $query="SELECT * FROM feedback WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);
}

if(isset($_POST['updatebtn']))
{
    $id=$_POST['edit_id'];
    $name = $_POST['edit_name'];
    $username1 = $_POST['edit_username'];
    $subject = $_POST['edit_subject'];
    $message = $_POST['edit_message'];
    $reply = $_POST['edit_reply'];
    
    $query = "UPDATE feedback SET name = '$name' ,tea_username= '$username1' ,subject_name='$subject',message='$message',reply='$reply' WHERE id='$id' ";
    $query_run = mysqli_query($connection,$query);    
    
    if($query_run)
    {
        $_SESSION['success']="Reply Sent Successfully";
        header("Location: feedback.php?username=$username");
    }
    else
    {
        $_SESSION['status']="Reply NOT sent";
        header("Location: feedback.php?username=$username");    
    }
    
    include('smtp/PHPMailerAutoload.php');
    include('smtp.php');
    $mail->addAddress($username1);
	$mail->isHTML(true);
	$mail->Subject="Reply from Admin(Faculty Audit System)";
	$mail->Body=$reply;
	$mail->SMTPOptions=array("ssl"=>array(
		"verify_peer"=>false,
		"verify_peer_name"=>false,
		"allow_self_signed"=>false,
	));
	if($mail->send()){
        echo "Email sent successfully";
	}else{
		echo $mail->ErrorInfo;
	}

}

if(isset($_POST['delete_btn']))
{
    $id=$_POST['delete_id'];
    
    $query="DELETE FROM feedback WHERE id='$id' ";
    $query1="set @autoid :=0"; 
    $query2="update feedback set id = @autoid := (@autoid+1)";
    $query3="alter feedback contact Auto_Increment = 1";
    $query_run = mysqli_query($connection,$query);
    $query1_run = mysqli_query($connection,$query1);
    $query2_run = mysqli_query($connection,$query2);
    $query3_run = mysqli_query($connection,$query3);
    if($query_run)
    {
        $_SESSION['success']="Feedback Deleted";
        header("Location: feedback.php?username=$username");
    }
    else
    {
        $_SESSION['status']="Feedback NOT Deleted";
        header("Location: feedback.php?username=$username");    
    }
}


       
  




?>