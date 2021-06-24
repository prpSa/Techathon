<?php

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    include "include/conn.php";
    $username = $_GET['username'];
    $courseID = $_GET['courseID'];
    $courseDetails = $_POST['cd'];
    $courseDetailsSugg = $_POST['cdSugg'];
    $courseObj = $_POST['courseObj'];
    $courseObjSugg = $_POST['courseObjSugg'];
    $courseOut = $_POST['courseOut'];
    $courseOutSugg = $_POST['courseOutSugg'];
    $progOut = $_POST['progOut'];
    $progOutSugg = $_POST['progOutSugg'];
    $m_copo = $_POST['m_copo'];
    $m_copoSugg = $_POST['m_copoSugg'];
    $pso = $_POST['pso'];
    $psoSugg = $_POST['psoSugg'];
    $m_copso = $_POST['m_copso'];
    $m_copsoSugg = $_POST['m_copsoSugg'];
    $courseWeig = $_POST['courseWeig'];
    $courseWeigSugg = $_POST['courseWeigSugg'];
    $chpPlan = $_POST['chpPlan'];
    $chpPlanSugg = $_POST['chpPlanSugg'];
    $lesPlan = $_POST['lesPlan'];
    $lesPlanSugg = $_POST['lesPlanSugg'];
    $ia = $_POST['ia'];
    $iaSugg = $_POST['iaSugg'];
    $btLevel = $_POST['btLevel'];
    $grammar = $_POST['grammar'];
    $finalSugg = $_POST['finalSugg'];
    $dqaStatus = $_POST['dqaStatus'];

    $sql = "UPDATE `dqa` SET `courseDetails` = '$courseDetails', `courseDetailsSugg` = '$courseDetailsSugg', `courseObj` = '$courseObj', `courseObjSugg` = '$courseObjSugg', `courseOut` = '$courseOut', `courseOutSugg` = '$courseOutSugg', `progOut` = '$progOut', `progOutSugg` ='$progOutSugg' , `m_copo` = '$m_copo', `m_copoSugg` = '$m_copoSugg', `pso` = '$pso', `psoSugg` ='$psoSugg' , `m_copso` = '$m_copso', `m_copsoSugg` = '$m_copsoSugg', `courseWeig` = '$courseWeig', `courseWeigSugg` = '$courseWeigSugg', `chpPlan` = '$chpPlan', `chpPlanSugg` ='$chpPlanSugg' ,`lesPlan` = '$lesPlan', `lesPlanSugg` ='$lesPlanSugg', `ia` = '$ia', `iaSugg` = '$iaSugg', `btLevel` = '$btLevel', `grammar` = '$grammar', `finalSugg` ='$finalSugg' WHERE `courseID` ='$courseID' ";

    // $sql ="INSERT INTO `dqa`(`courseID`, `courseDetails`, `courseDetailsSugg`, `courseObj`, `courseObjSugg`, `courseOut`, `courseOutSugg`, `progOut`, `progOutSugg`, `m_copo`, `m_copoSugg`, `pso`, `psoSugg`, `m_copso`, `m_copsoSugg`, `courseWeig`, `courseWeigSugg`, `expList`, `expListSugg`, `assesment`, `assesmentSugg`, `btLevel`, `grammar`, `finalSugg`) VALUES ('$courseID','$courseDetails','$courseDetailsSugg','$courseObj', '$courseObjSugg','$courseOut', '$courseOutSugg','$progOut','$progOutSugg' ,'$m_copo','$m_copoSugg','$pso','$psoSugg' ,'$m_copso','$m_copsoSugg','$courseWeig','$courseWeigSugg','$expList','$expListSugg' , '$assesment',  '$assesmentSugg', '$btLevel', '$grammar','$finalSugg')";



    if ($conn->query($sql) == true) {
        $sql_update = "UPDATE `hodhomee` SET `teacher`='" . $dqaStatus . "' ,`dqa`='Napproved'  WHERE `courseID`='$courseID' ";
        $queryy = mysqli_query($conn, $sql_update);

        include('../smtp/PHPMailerAutoload.php');
        include('../smtp.php');
        $mail->addAddress($username);
        $mail->isHTML(true);
        $mail->Subject="Form has been Submitted for correction to DQA Team";
        $mail->Body="Response for the below mentioned Course hash been submitted.<br> Course Details: CourseID:$courseID <br> Status: $dqaStatus <br><br>Regards<br>Admin<br>Faculty Audit System";
        $mail->SMTPOptions=array("ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            "allow_self_signed"=>false,
        ));

        if($mail->send()){
            echo '<script type="text/javascript">'; 
            echo 'alert("ThankYou for Your Response");'; 
            echo 'window.open("http://localhost/FAS/dqaHome.php?username='.$username.'","_self");';
            echo '</script>';
            exit();
        }else{
            echo '<script type="text/javascript">'; 
            echo 'alert("ThankYou for Your Response");'; 
            echo 'window.open("http://localhost/FAS/dqaHome.php?username='.$username.'","_self");';
            echo '</script>';
            exit();
        }
    } else {
        echo "Error";
    }
    $conn->close();
} else {
    echo "Submit Button Not Pressed";
}

?>