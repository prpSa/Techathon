<?php

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    include "include/conn.php";
    $username = $_GET['username'];
    $tea_username = $_GET['username'];
    $courseID = $_GET['courseID'];
    $prerequisite = $_POST['prerequisitee'];
    $documentsVerified = $_POST['documentsVerifiede'];
    $defaulter_list = $_POST['defaulter'];
    $LMS = $_POST['lmse'];
    $DCF = $_POST['dcfe'];
    $e_attendance = $_POST['eAttendancee'];
    $syllabus_coverage = $_POST['syllabus'];
    $workshop_conduction = $_POST['lecture'];
    $booksReferred = $_POST['booksReferred'];
    $identify_students = $_POST['bestWeakStudent'];
    $evaluation_labs = $_POST['lab'];
    $additionalExperiments = $_POST['additionalExperiment'];
    $finalSugg = $_POST['finalSugg'];
    $audStatus = $_POST['audStatus'];


    $sql = "UPDATE `audit_res` SET `prerequisite_fdbk`='$prerequisite',`documentsVerified_fdbk`='$documentsVerified',`defaulterList_fdbk`='$defaulter_list',`lms_fdbk`='$LMS',`dcf_fdbk`='$DCF',`eAttendance_fdbk`='$e_attendance',`syllabusCoverage_fdbk`='$syllabus_coverage',`workshopConduction_fdbk`='$workshop_conduction',`booksReferred_fdbk`='$booksReferred',`identifyStudents_fdbk`='$identify_students',`evaluationLabs_fdbk`='$evaluation_labs',`additionalExperiments_fdbk`='$additionalExperiments',`EPI_fdbk`='NULL',`sample_copies_fdbk`='NULL',`ICT_fdbk`='NULL',`smart_board_fdbk`='NULL',`finalSugg_fdbk`='$finalSugg' WHERE `courseID`='$courseID' AND `tea_username`='$tea_username' AND `audType`='aud2' ";
    $query = mysqli_query($conn, $sql);




    if ($query == TRUE) {
        $sql_updateh = "UPDATE `hodhomee` SET `teacherIntII`='" . $audStatus . "' ,`intAuditII`='Napproved' WHERE `courseID`='$courseID' AND `audType`='aud1' AND `tea_username`='$tea_username' ";
        $queryy = mysqli_query($conn, $sql_updateh);


        include('../smtp/PHPMailerAutoload.php');
        include('../smtp.php');
        $mail->addAddress($username);
        $mail->isHTML(true);
        $mail->Subject="Form has been Submitted for correction toDQA Team";
        $mail->Body="Response for Documents uploaded for Audit 2 of courseID: $courseID has been updated as $audStatus. <br><br>Regards<br>Admin<br>Faculty Audit System";
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