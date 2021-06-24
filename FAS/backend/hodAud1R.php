<?php
    
    if(isset($_POST['submit']) && !empty($_POST['submit'])){
        include "include/conn.php";
        
        $username = $_GET['username'];
        $courseID = $_GET['courseID'];
        $finalSugg = $_POST['finalSugg'];
        $division = $_GET['division'];
        // $sql = "INSERT INTO `hod_feedback`(`courseID`, `intAudit`) VALUES ('$courseID', '$finalSugg') ";
        $sql = "INSERT INTO `hodfeedback`(`courseID`, `division`, `auditor1`) VALUES ('$courseID', '$division', '$finalSugg')";
        if($conn-> query($sql)==true){

            include('../smtp/PHPMailerAutoload.php');
            include('../smtp.php');
            $mail->addAddress($username);
            $mail->isHTML(true);
            $mail->Subject="Form has been Submitted for correction to DQA Team";
            $mail->Body="Response for courseID: $courseID has been updated as $finalSugg. <br><br>Regards<br>Admin<br>Faculty Audit System";
            $mail->SMTPOptions=array("ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
                "allow_self_signed"=>false,
            ));
    
            if($mail->send()){
                echo '<script type="text/javascript">'; 
                echo 'alert("ThankYou for Your Response");'; 
                echo 'window.open("http://localhost/FAS/hodhome.php?username='.$username.'","_self");';
                echo '</script>';
                exit();
            }else{
                echo '<script type="text/javascript">'; 
                echo 'alert("ThankYou for Your Response");'; 
                echo 'window.open("http://localhost/FAS/hodhome.php?username='.$username.'","_self");';
                echo '</script>';
                exit();
            }
        }
        else{
            echo "Error";
        }
        $conn -> close();
    
    }else{
        echo "Submit Button Not Pressed";
    }
     
?>