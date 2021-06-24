<?php
include "backend/include/conn.php";
$username = $_GET['username']; 
$sql = "select * from hodhomee where courseID ='" . $courseID . "' AND audType ='aud1' AND teaType='speTea' ";
$result = $conn->query($sql);
$data = mysqli_query($conn, $sql);
$total = mysqli_num_rows($data);

if ($total > 0) {
    while ($result = mysqli_fetch_assoc($data)) {

        
        // ###################################################################################################
        //                                      Edit Form   &&   DQA  && view form
        // ###################################################################################################

                                                 

        if (strcmp($result['teacher'], "submitted") === 0) {
            echo '<a href="#" ><button id="editGrey">Edit the Form</button></a>';
            echo '<a href="http://localhost/FAS/teaRes.php?username='.$username.'&courseID='.$courseID.'" ><button id="viewResponse">View Form</button></a>';
            if (strcmp($result['dqa'], "Napproved") === 0) {
                echo '<a href="http://localhost/FAS/dqaTeaRes.php?username='.$username.'&courseID='.$courseID.'" ><button id="dqaOrange">DQA Team</button></a>';
            }else{
                echo '<a href="#" ><button id="dqaRed">DQA Team</button></a>';
            }

        } 
        else if(strcmp($result['teacher'], "Nsubmitted") === 0){
            echo '<a href="http://localhost/FAS/editMainTeacherForm.php?username='.$username.'&courseID='.$courseID.'"" ><button id="editOrange">Edit the Form</button></a>';
            echo '<a href="http://localhost/FAS/teaRes.php?username='.$username.'&courseID='.$courseID.'" ><button id="viewResponse">View Form I</button></a>';
            if (strcmp($result['dqa'], "Napproved") === 0) {
                echo '<a href="http://localhost/FAS/dqaTeaRes.php?username='.$username.'&courseID='.$courseID.'" ><button id="dqaOrange">DQA Team</button></a>';
            }else{
                echo '<a href="#" ><button id="dqaRed">DQA Team</button></a>';
            }
        }
        else if(strcmp($result['teacher'], "approved") === 0){
            echo '<a href="http://localhost/FAS/teaRes.php?username='.$username.'&courseID='.$courseID.'" ><button id="editGreen">Form I Approved </button></a>';
            echo '<a href="http://localhost/FAS/dqaTeaRes.php?username='.$username.'&courseID='.$courseID.'" ><button id="dqaGreen">DQA Team</button></a>';
        }
        else {
            echo '<button id="buttonn1">Form not Submitted</button>';
        }


        // ###################################################################################################
        //                  Edit upload Documents Form   &&   Internal Auditor I
        // ###################################################################################################


        // if (strcmp($result['teacherInt'], "submitted") === 0) {
        //     echo '<a href="#" ><button id="teacherIGrey">Edit Documents</button></a>';
        //     echo '<a href="http://localhost/FAS/teacherViewDoc.php?username='.$username.'&courseID='.$courseID.'" ><button id="viewDoc">View Doc</button></a>';
        //     if (strcmp($result['intAudit'], "Napproved") === 0) {
        //         echo '<a href="http://localhost/FAS/audTeaRes.php?username='.$username.'&courseID='.$courseID.'" ><button id="iAuditOrange">Internal Auditor</button></a>';
        //     }else{
        //         echo '<a href="#" ><button id="iAuditRed">Internal Auditor</button></a>';
        //     }

        // } 
        // else if(strcmp($result['teacherInt'], "Nsubmitted") === 0){
        //     echo '<a href="http://localhost/FAS/auditorObservation.php?username='.$username.'&courseID='.$courseID.'" " ><button id="teacherIOrange">Edit Documents</button></a>';
        //     if (strcmp($result['intAudit'], "Napproved") === 0) {
        //         echo '<a href="http://localhost/FAS/audTeaRes.php?username='.$username.'&courseID='.$courseID.'" ><button id="iAuditOrange">Internal Auditor</button></a>';
        //     }else{
        //         echo '<a href="#" ><button id="iAuditRed">Internal Auditor</button></a>';
        //     }
        // }
        // else if(strcmp($result['teacherInt'], "approved") === 0){
        //     echo '<a href="http://localhost/FAS/audTeaRes.php?username='.$username.'&courseID='.$courseID.'"><button id="teacherIGreen">Docs I Approved</button></a>';
        //     echo '<a href="http://localhost/FAS/audTeaRes.php?username='.$username.'&courseID='.$courseID.'"" ><button id="iAuditGreen">Internal Auditor</button></a>';
        // }
        // else {
        //     echo '<a href="http://localhost/FAS/auditorObservation.php?username='.$username.'&courseID='.$courseID.'" ><button id="teacherIRed">Docs not Uploaded</button>';
        //     echo '<a href="#" ><button id="iAuditRed">Internal Auditor</button></a>';
        // }


        // ###################################################################################################
        //                                     INTERNAL AUDITOR II
        // ###################################################################################################

        // if(strcmp($result['teacherInt'], "approved") === 0){
        

        // if (strcmp($result['teacherIntII'], "submitted") === 0) {
        //     echo '<a href="#" ><button id="teacherIIGrey">Edit Documents II</button></a>';
        //     echo '<a href="http://localhost/FAS/teacherViewDocII.php?username='.$username.'&courseID='.$courseID.'" ><button id="viewDocII">View Doc</button></a>';
        //     if (strcmp($result['intAuditII'], "Napproved") === 0) {
        //         echo '<a href="http://localhost/FAS/auditorIIViewResponse.php?username='.$username.'&courseID='.$courseID.'" ><button id="iAuditIIOrange">Internal Auditor II</button></a>';
        //     }else{
        //         echo '<a href="#" ><button id="iAuditIIRed">Internal Auditor II</button></a>';
        //     }

        // } 
        // else if(strcmp($result['teacherIntII'], "Nsubmitted") === 0){
        //     echo '<a href="http://localhost/FAS/auditorObservationII.php?username='.$username.'&courseID='.$courseID.'" " ><button id="teacherIIOrange">Edit Documents II</button></a>';
        //     if (strcmp($result['intAuditII'], "Napproved") === 0) {
        //         echo '<a href="http://localhost/FAS/teaAudIIRes.php?username='.$username.'&courseID='.$courseID.'" ><button id="iAuditIIOrange">Internal Auditor II</button></a>';
        //     }else{
        //         echo '<a href="#" ><button id="iAuditIIRed">Internal Auditor II</button></a>';
        //     }
        // }
        // else if(strcmp($result['teacherIntII'], "approved") === 0){
        //     echo '<a href="http://localhost/FAS/teacherViewDocII.php?username='.$username.'&courseID='.$courseID.'"><button id="teacherIIGreen">Docs II Approved</button></a>';
        //     echo '<a href="http://localhost/FAS/teaAudIIRes.php?username='.$username.'&courseID='.$courseID.'"" ><button id="iAuditIIGreen">Internal Auditor II</button></a>';
        // }
        // else if(strcmp($result['teacherIntII'], "NULL") === 0){
        //     echo '<a href="http://localhost/FAS/auditorObservationII.php?username='.$username.'&courseID='.$courseID.'" ><button id="teacherIIRed">Upload Documents</button>';
        //     echo '<a href="#" ><button id="iAuditIIRed">Internal Auditor II</button></a>';
        // }
        // }
        // else{
        //     echo '<a href="#" ><button id="iAuditIIRed">Internal Auditor II</button></a>';
        // }  
    $sqlll = "select teacher from hod_feedback where courseID ='".$courseID."' and teacher is not NULL";
    $resulttt = $conn->query($sqlll);
    $dataaa = mysqli_query($conn, $sqlll);
    $totalll = mysqli_num_rows($dataaa);
    if ($totalll != 0) {
    // output data of each row
    while ($resulttt = mysqli_fetch_assoc($dataaa)) {

        // ###################################################################################################
        //                                     Hod 
        // ###################################################################################################

        echo '<a href="http://localhost/FAS/hodTeaFeed.php?username='.$username.'&courseID='.$courseID.'" ><button id="hodGreen">HOD Response</button></a>';

    }  
} else {
    echo '<button id="hodRed">HOD Response</button>';
}
 }

 } 



$sqll = "select * from hodhometea where courseID ='" . $courseID . "' ";
$resultt = $conn->query($sqll);
$dataa = mysqli_query($conn, $sqll);
$totall = mysqli_num_rows($dataa);

if ($totall > 0) {
    while ($resultt = mysqli_fetch_assoc($dataa)) {
            echo '<a href="http://localhost/FAS/contMainTeacherForm.php?courseID='.$courseID.'&username='.$username.' " ><button id="viewResponsee">Continue Form</button></a>';


    }
}

?>