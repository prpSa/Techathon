<?php 
  $fullname=$_POST['name'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  $role=$_POST['role'];

  //Database connection
  include "include/conn.php";
  if($conn->connect_error){
      die('Connection Failed :'.$conn->connect_error);
  }else{
    if($password === $cpassword)
    {
      $stmt = $conn->prepare("INSERT INTO users(name,username,password,role)
      values(?,?,?,?)");
      $stmt->bind_param("ssss",$fullname,$username,$password,$role);
      $stmt->execute();
      echo '<script type="text/javascript">'; 
        echo 'alert("Registration Successful");'; 
        echo 'window.open("http://localhost/FAS/login.php","_self");';
        echo '</script>';
      $stmt->close();
      $conn->close();
    }
    else{
        echo '<script type="text/javascript">'; 
        echo 'alert("Password and Confirm password do not match");'; 
        echo 'window.open("http://localhost/FAS/signup.php","_self");';
        echo '</script>';
    }
  }
?>