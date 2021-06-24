<?php 
// include 'contactus.php';
  $name=$_POST['name'];
  $username=$_POST['username'];
  $subject=$_POST['subject'];
  $message=$_POST['message'];
  
  //Database connection
  include "backend/include/conn.php";
  if($conn->connect_error){
      die('Connection Failed :'.$conn->connect_error);
  }else{
      $stmt = $conn->prepare("INSERT into feedback(`name`,`tea_username`,`subject_name`,`message`)
      values(?,?,?,?)");
      $stmt->bind_param("ssss",$name,$username,$subject,$message);
      $stmt->execute();
      // echo "Message Sent Successfully...";
      $stmt->close();
      $conn->close();
  }



$subject = "Thank you for your response";
$body = "Hi, \n\n\nThank you for writing to us.\nIt may take some time to respond to your query.\nBut we will thrive our best to reply you as soon as possible. \n\n\n\nRegards,\nFaculty Audit System";
$headers = "From: facultyauditsystem@gmail.com";

if (mail($username, $subject, $body, $headers)) {
  header('Location: http://localhost/FAS/contactus.php?username='.$username.'');
  exit;
} else {
    echo "Email sending failed...";
}
?>