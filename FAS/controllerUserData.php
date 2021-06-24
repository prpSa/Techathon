<?php 
session_start();
require "backend/include/conn.php";
$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($conn, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO usertable (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($conn, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: shahiprem7890@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($conn, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        
        $email = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $captcha=mysqli_real_escape_string($conn,$_POST['captcha']);
       
        
     
        $check_email = $conn->query("SELECT * FROM `users` WHERE `username` = '$email' AND `password` = '$password' ") or die(mysqli_error(die));
        $fetch = $check_email->fetch_array();
	    $row = $check_email->num_rows;
        if($_SESSION['CODE']==$captcha){
            $role = $fetch['role'];
            echo $role;
        if($row > 0){
            session_start();
            $_SESSION['id'] = $fetch['id'];
            $id = $fetch['id'];
        $conn->query("UPDATE `users` SET  `last_login` = now()  WHERE `id` = '$id' ") or die(mysqli_error($conn));
  
                

		switch ($role) {
			case 'hod':
                $_SESSION[$email]=$email;
				include('validate.php');
				header("location:http://localhost/FAS/hodhome.php?username=$email");
				exit();
			case 'teacher':
                $_SESSION[$email]=$email;
				include('validate.php');
				header("location:http://localhost/FAS/subjectTeacherHome.php?username=$email");
				exit();
			case 'dqa':
                $_SESSION[$email]=$email;
				include('validate.php');
				header("location:http://localhost/FAS/dqaHome.php?username=$email");
				exit();
			case 'auditor':
                $_SESSION[$email]=$email;
				include('validate.php');
				header("location:http://localhost/FAS/audHome.php?username=$email");
				exit();
            case 'extAuditor':
                    $_SESSION[$email]=$email;
                    include('validate.php');
                    header("location:http://localhost/FAS/Users/externalAuditor/extAudHome.php?username=$email");
                    exit();
			default:
			echo '<script type="text/javascript">'; 
			echo 'alert("Invalid Credentials");'; 
			echo 'window.open("http://localhost/FAS/login.php","_self");';
			echo '</script>';
		}
	
            
        }else{
            $errors['email'] = "Incorrect email or password!";
        }
    }else{
       $errors['captcha']="Please enter valid captcha code";
    }
}

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $check_email = "SELECT * FROM users WHERE username='$email'";
        $run_sql = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE users SET code = $code WHERE username = '$email'";
            $run_query =  mysqli_query($conn, $insert_code);
            if($run_query){
                include('smtp/PHPMailerAutoload.php');
                include('smtp.php');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject="Password Reset Code";
                $mail->Body="Your password reset code is $code";
                $mail->addAttachment($file_path_pdf);
                $mail->SMTPOptions=array("ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                    "allow_self_signed"=>false,
                ));
                if($mail->send()){
                    $info = "We've sent a password reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
                // $subject = "Password Reset Code";
                // $message = "Your password reset code is $code";
                // $sender = "From: shahiprem7890@gmail.com";
                // if(mail($email, $subject, $message, $sender)){
                //     $info = "We've sent a passwrod reset otp to your email - $email";
                //     $_SESSION['info'] = $info;
                //     $_SESSION['email'] = $email;
                //     header('location: reset-code.php');
                //     exit();
                // }else{
                //     $errors['otp-error'] = "Failed while sending code!";
                // }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        echo '0';
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['username'];
            $_SESSION['username'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $update_pass = "UPDATE users SET code = $code, password = '$password' WHERE username = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login.php');
    }

    //if user click change password button in change password page
    if(isset($_POST['change-password-new'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $username = $_SESSION['username']; //getting this email using session
            $update_pass = "UPDATE users SET password = '$password' WHERE username = '$username'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
?>