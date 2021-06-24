<?php

include 'valid.php';
$username = $_GET['username'];
include "include/conn.php";

if(isset($_POST['registerbtn']))
{
    $name = $_POST['name'];
    $username1 = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    
    if($password === $cpassword)
    {
        $query = "INSERT INTO admin (name,username,password) VALUES ('$name','$username1','$password')";
        $query_run = mysqli_query($connection,$query);
        
        if($query_run)
        {
            $_SESSION['success']="Admin Profile Added";
            header("Location: register.php?username=$username");
        }
        else
        {
            $_SESSION['status']="Admin Profile NOT Added";
            header("Location: register.php?username=$username");
        }
        
    }
    else
    {
            $_SESSION['status']="Password and Confirm Password Does Not Match";
            header("Location: register.php?username=$username");        
    }  
}

if(isset($_POST['edit_btn']))
{
    $id=$_POST['edit_id'];
    
    $query="SELECT * FROM admin WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);
}

if(isset($_POST['updatebtn']))
{
    $id=$_POST['edit_id'];
    $name = $_POST['edit_name'];
    $username1 = $_POST['edit_username'];
    $password = $_POST['edit_password'];        
    
    $query = "UPDATE admin SET name = '$name', username = '$username1'  , password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection,$query);    
    
    if($query_run)
    {
        $_SESSION['success']="Your Data is Updated";
        header("Location: register.php?username=$username");
    }
    else
    {
        $_SESSION['status']="Your Data is NOT Updated";
        header("Location: register.php?username=$username");    
    }
}

if(isset($_POST['delete_btn']))
{
    $id=$_POST['delete_id'];
    
    $query="DELETE FROM admin WHERE id='$id' ";
    $query1="set @autoid :=0"; 
    $query2="update admin set id = @autoid := (@autoid+1)";
    $query3="alter table admin Auto_Increment = 1";
    $query_run = mysqli_query($connection,$query);
    $query1_run = mysqli_query($connection,$query1);
    $query2_run = mysqli_query($connection,$query2);
    $query3_run = mysqli_query($connection,$query3);
    
    if($query_run)
    {
        $_SESSION['success']="Your Data is Deleted";
        header("Location: register.php?username=$username");
    }
    else
    {
        $_SESSION['status']="Your Data is NOT Deleted";
        header("Location: register.php?username=$username");    
    }
}



?>