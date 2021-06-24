<?php
    include "backend/include/conn.php";

    $username = $_GET['username'];
    $sql = "SELECT * from hodhomee WHERE courseID ='".$courseID."' AND division='$division'  ";
    $result = $conn->query($sql);
    $data = mysqli_query($conn,$sql);
    $total =mysqli_num_rows($data);
    if ( $total != 0) { 
        while($result=mysqli_fetch_assoc($data)) {

        if ((strcmp($result['teacherInt'], "submitted") === 0 || strcmp($result['teacherInt'], "Nsubmitted") === 0) && strcmp($result['audType'], "aud1") === 0)  {
            echo '<a href="hodViewDoc.php?username='.$username.'&courseID='.$courseID.'&division='.$division.'" ><button id="teaDocOrange">Audit I</button></a>';

            if (strcmp($result['intAudit'], "Napproved") === 0) {
                echo '<a href="http://localhost/FAS/hodAudRes.php?username='.$username.'&courseID='.$courseID.'&division='.$division.'" ><button id="intAudOrange">Internal Audit I</button></a>';
            }else{
                echo '<a href="#" ><button id="intAudRed">Internal Audit I</button></a>';
            }

        } 
        else if(strcmp($result['teacherInt'], "approved") === 0 && strcmp($result['audType'], "aud1") === 0){
            echo '<a href="hodViewDoc.php?username='.$username.'&courseID='.$courseID.'&division='.$division.'" ><button id="teaDocGreen">Documents Approved</button></a>';
            echo '<a href="http://localhost/FAS/hodAudRes.php?username='.$username.'&courseID='.$courseID.'&division='.$division.'" ><button id="intAudGreen">Internal Audit I</button></a>';
        
    
        }
        else if(strcmp($result['teacherInt'], "NULL") === 0 && strcmp($result['audType'], "aud1") === 0){
            echo '<button id="intAudRed">Internal Audit I</button>';
        }


    if(strcmp($result['teacherInt'], "approved") === 0 && strcmp($result['audType'], "aud1") === 0) {
        if ((strcmp($result['teacherIntII'], "submitted") === 0 || strcmp($result['teacherIntII'], "Nsubmitted") === 0) && strcmp($result['audType'], "aud1") === 0) {
            echo '<a href="hodViewDocII.php?username='.$username.'&courseID='.$courseID.'&division='.$division.'" ><button id="teaDocOrange">Docs Uploaded</button></a>';

            if (strcmp($result['intAuditII'], "Napproved") === 0) {
                echo '<a href="http://localhost/FAS/hodAudResII.php?username='.$username.'&courseID='.$courseID.'&division='.$division.'" ><button id="intAud2Orange">Internal Auditor II</button></a>';
            }else{
                echo '<a href="#" ><button id="intAud2Red">Internal Auditor II</button></a>';
            }

        } 
        else if(strcmp($result['teacherIntII'], "approved") === 0 && strcmp($result['audType'], "aud1") === 0){
            echo '<a href="hodViewDocII.php?username='.$username.'&courseID='.$courseID.'&division='.$division.'" ><button id="teaDocGreen">Documents Approved II</button></a>';
            echo '<a href="#" ><button id="intAud2Green">Internal Auditor II</button></a>';
        
    
        }
        else if(strcmp($result['teacherInt'], "NULL") === 0 && strcmp($result['audType'], "aud1") === 0){
            echo '<button id="intAud2Red">Internal Auditor II</button>';
        }
    }






    }
    } else {
        echo "0 results";
    }
?>