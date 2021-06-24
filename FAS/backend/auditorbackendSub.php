<?php

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    include "include/conn.php";
    $username = $_GET['username'];
    $tea_username = $_GET['tea_username'];
    $courseID = $_GET['courseID'];
    $defaulter = $_POST['defaulter'];
    $lms = $_POST['lmsButton'];
    $dcf = $_POST['dcfButton'];
    $eAttendance = $_POST['eAttendanceButton'];
    $syllabus = $_POST['syllabus'];
    $bestWeakStudent = $_POST['bestWeakStudent'];
    $lab = $_POST['lab'];
    $lecture = $_POST['lecture'];
    $epi = $_POST['epiButton'];
    $sampleCopies = $_POST['sampleCopiesButton'];
    $ict = $_POST['ictButton'];
    $smartBoard = $_POST['smartBoardButton'];
    $finalSugg = $_POST['finalSugg'];
    $audStatus = $_POST['audStatus'];


    $sql = "UPDATE `audit_res` SET `prerequisite_fdbk`='NULL',`documentsVerified_fdbk`='NULL',`defaulterList_fdbk`='$defaulter',`lms_fdbk`='$lms',`dcf_fdbk`='$dcf',`eAttendance_fdbk`='$eAttendance',`syllabusCoverage_fdbk`='$syllabus',`workshopConduction_fdbk`='$lecture',`booksReferred_fdbk`='NULL',`identifyStudents_fdbk`='$bestWeakStudent',`evaluationLabs_fdbk`='$lab',`additionalExperiments_fdbk`='NULL',`EPI_fdbk`='$epi',`sample_copies_fdbk`='$sampleCopies',`ICT_fdbk`='$ict',`smart_board_fdbk`='$smartBoard',`finalSugg_fdbk`='$finalSugg' WHERE `courseID`='$courseID' AND `tea_username`='$tea_username' AND `audType`='aud1' ";
    $query = mysqli_query($conn, $sql);




    if ($query == TRUE) {
        $sql_update = "UPDATE `hodhomee` SET `teacherInt`='" . $audStatus . "' ,`intAudit`='Napproved' WHERE `courseID`='$courseID' AND `audType`='aud1' AND `tea_username`='$tea_username' ";
        $queryy = mysqli_query($conn, $sql_update);


        include('../smtp/PHPMailerAutoload.php');
        include('../smtp.php');
        $mail->addAddress($username);
        $mail->isHTML(true);
        $mail->Subject="Form has been Submitted for correction to DQA Team";
        $mail->Body="Response for Documents uploaded for Audit 1 of courseID: $courseID has been updated as $audStatus. <br><br>Regards<br>Admin<br>Faculty Audit System";
        $mail->SMTPOptions=array("ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            "allow_self_signed"=>false,
        ));

        if($mail->send()){
            echo '<script type="text/javascript">'; 
            echo 'alert("ThankYou for Your Response");'; 
            echo 'window.open("http://localhost/FAS/audHome.php?username='.$username.'","_self");';
            echo '</script>';
            exit();
        }else{
            echo '<script type="text/javascript">'; 
            echo 'alert("ThankYou for Your Response");'; 
            echo 'window.open("http://localhost/FAS/audHome.php?username='.$username.'","_self");';
            echo '</script>';
            exit();
        }

    }
}

?>