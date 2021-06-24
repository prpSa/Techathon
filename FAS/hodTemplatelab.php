<?php
    include "backend/include/conn.php";
    $username = $_GET['username'];
    $sql = "select * from hodhomel where courseID ='".$courseID."' ";
    $result = $conn->query($sql);
    $data = mysqli_query($conn,$sql);
    $total =mysqli_num_rows($data);
    if ( $total != 0) { 
        while($result=mysqli_fetch_assoc($data)) {

        if (strcmp($result['teacher'], "submitted") === 0 || strcmp($result['teacher'], "Nsubmitted") === 0) {
            echo '<a href="http://localhost/FAS/hodTeaReslab.php?username='.$username.'&courseID='.$courseID.'" ><button id="teaOrange">Form submitted</button></a>';

            if (strcmp($result['dqa'], "Napproved") === 0) {
                echo '<a href="http://localhost/FAS/hodDqaReslab.php?username='.$username.'&courseID='.$courseID.'" ><button id="dqaOrange">DQA Team</button></a>';
            }else{
                echo '<a href="#" ><button id="dqaRed">DQA Team</button></a>';
            }

        } 
        else if(strcmp($result['teacher'], "approved") === 0){
            echo '<a href="http://localhost/FAS/hodTeaFinalReslab.php?username='.$username.'&courseID='.$courseID.'" ><button id="teaGreen">Form Approved</button></a>';
            echo '<a href="http://localhost/FAS/hodDqaFinalReslab.php?username='.$username.'&courseID='. $courseID.'" ><button id="dqaGreen">DQA Team</button></a>';
        }
        else {
            echo'<button id="buttonn1">Form not submitted</button>';
        }
    }
}


        
    //     if (strcmp($result['teacherInt'], "submitted") === 0 || strcmp($result['teacher'], "Nsubmitted") === 0) {
    //         echo '<a href="hodViewDoc.php?username='.$username.'&courseID='.$courseID.'" ><button id="teaDocOrange">Docs Uploaded</button></a>';

    //         if (strcmp($result['intAudit'], "Napproved") === 0) {
    //             echo '<a href="http://localhost/FAS/hodAudRes.php?username='.$username.'&courseID='.$courseID.'" ><button id="intAudOrange">Internal Auditor</button></a>';
    //         }else{
    //             echo '<a href="#" ><button id="intAudRed">Internal Auditor</button></a>';
    //         }

    //     } 
    //     else if(strcmp($result['teacherInt'], "approved") === 0){
    //         echo '<a href="hodViewDoc.php?username='.$username.'&courseID='.$courseID.'" ><button id="teaDocGreen">Documents Approved</button></a>';
    //         echo '<a href="#" ><button id="intAudGreen">Internal Auditor</button></a>';
        
    
    //     }
    //     else {
    //         echo '<button id="teaDocRed">Docs not submitted</button>';
    //         echo '<button id="intAudRed">Internal Auditor</button>';
    //     }








    // if(strcmp($result['teacherInt'], "approved") === 0){
    //     if (strcmp($result['teacherIntII'], "submitted") === 0 ) {
    //         echo '<a href="hodViewDocII.php?username='.$username.'&courseID='.$courseID.'" ><button id="teaDocOrange">Docs Uploaded</button></a>';

    //         if (strcmp($result['intAuditII'], "Napproved") === 0) {
    //             echo '<a href="http://localhost/FAS/hodAudResII.php?username='.$username.'&courseID='.$courseID.'" ><button id="intAudOrange">Internal Auditor II</button></a>';
    //         }else{
    //             echo '<a href="#" ><button id="intAudRed">Internal Auditor II</button></a>';
    //         }

    //     } 
    //     else if(strcmp($result['teacherIntII'], "approved") === 0){
    //         echo '<a href="hodViewDocII.php?username='.$username.'&courseID='.$courseID.'" ><button id="teaDocGreen">Documents Approved II</button></a>';
    //         echo '<a href="#" ><button id="intAudGreen">Internal Auditor II</button></a>';
        
    
    //     }
    //     else {
    //         echo '<button id="teaDocRed">Docs not submitted II</button>';
    //         echo '<button id="intAudRed">Internal Auditor II</button>';
    //     }
    // }



    
    //     if(strcmp($result['extAudit'],"approved")===0){
    //         echo '<a href="#"><button id="extAudGreen">External Auditor</button></a>';
    //     }
    //     else {
    //         echo'<button id="extAudRed">External Auditor</button>';
    //     }
    // }
    // } else {
    //     echo "0 results";
    // }
?>