<?php
include "backend/include/conn.php";
$username = $_GET['username'];
$sql = "select division from hodhomee where sub_name ='$courseName' AND tea_username='$username'";
$result = $conn->query($sql);
$data = mysqli_query($conn, $sql);
$total = mysqli_num_rows($data);
if ($total != 0) {
    while ($result = mysqli_fetch_assoc($data)) {
        $division = $result['division'];
    }}
$username = $_GET['username'];
$sql = "select * from hodhomee where courseID ='$courseID' AND tea_username='$username'";
$result = $conn->query($sql);
$data = mysqli_query($conn, $sql);
$total = mysqli_num_rows($data);
if ($total != 0) {
    while ($result = mysqli_fetch_assoc($data)) {

        
        // ###################################################################################################
        //                  Edit upload Documents Form   &&   Internal Audit I
        // ###################################################################################################


        if (strcmp($result['teacherInt'], "submitted")===0 && strcmp($result['audType'], "aud1")===0 ) {
            echo '<a href="#" ><button id="teacherIGrey">Edit Documents</button></a>';
            echo '<a href="http://localhost/FAS/teaViewAudit1.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'" ><button id="viewDoc">View Doc</button></a>';
            if (strcmp($result['intAudit'], "Napproved") === 0) {
                echo '<a href="http://localhost/FAS/audTeaRes.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'" ><button id="iAuditOrange">Internal Auditor</button></a>';
                echo '<a href="#" ><button id="iAuditIIRed">Internal Audit II</button></a>';
            }else{
                echo '<a href="#" ><button id="iAuditRed">Internal Auditor</button></a>';
                echo '<a href="#" ><button id="iAuditIIRed">Internal Audit II</button></a>';
            }
        } 
        else if(strcmp($result['teacherInt'], "approved")===0 && strcmp($result['audType'], "aud1")===0 ){
            echo '<a href="http://localhost/FAS/audTeaRes.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'"><button id="teacherIGreen">Documents Approved</button></a>';
            echo '<a href="http://localhost/FAS/audTeaRes.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'"" ><button id="iAuditGreen">Internal Auditor</button></a>';
        }
        else if(strcmp($result['teacherInt'], "Nsubmitted")===0 && strcmp($result['audType'], "aud1")===0 ){
            echo '<a href="http://localhost/FAS/teaUploadAudit1.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'"><button id="teacherIOrange">Edit Documents</button></a>';
            if (strcmp($result['intAudit'], "Napproved") === 0) {
                echo '<a href="http://localhost/FAS/audTeaRes.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'" ><button id="iAuditOrange">Internal Audit I</button></a>';
                echo '<a href="#" ><button id="iAuditIIRed">Internal Audit II</button></a>';
            }else{
                echo '<a href="#" ><button id="iAuditRed">Internal Auditor</button></a>';
                echo '<a href="#" ><button id="iAuditIIRed">Internal Audit II</button></a>';
            }
        }
        else if(strcmp($result['teacherInt'], "NULL")===0 && strcmp($result['audType'], "aud1")===0 ){
            echo '<a href="http://localhost/FAS/teaUploadAudit1.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'"><button id="teacherIRed">Upload Documents</button></a>';
            echo '<a href="#" ><button id="iAuditRed">Internal Auditor</button></a>';
            echo '<a href="#" ><button id="iAuditIIRed">Internal Audit II</button></a>';
        }



        // ###################################################################################################
        //                                     Internal Audit II
        // ###################################################################################################

   
        if (strcmp($result['teacherInt'], "approved") === 0 && strcmp($result['audType'], "aud1") === 0){
            if (strcmp($result['teacherIntII'], "submitted") === 0 && strcmp($result['audType'], "aud1") === 0) {
                echo '<a href="#" ><button id="teacherIIGrey">Edit Documents II</button></a>';
                echo '<a href="http://localhost/FAS/teaViewAudit2.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'" ><button id="viewDocII">View Doc</button></a>';
                if (strcmp($result['intAuditII'], "Napproved") === 0) {
                    echo '<a href="http://localhost/FAS/audTeaRes2.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'" ><button id="iAuditIIOrange">Internal Audit II</button></a>';
                }else{
                    echo '<a href="#" ><button id="iAuditIIRed">Internal Audit II</button></a>';
                }

            } 
            else if(strcmp($result['teacherIntII'], "Nsubmitted") === 0 && strcmp($result['audType'], "aud1") === 0){
                echo '<a href="http://localhost/FAS/teaUploadAudit2.php?username='.$username.'&division='.$division.'&courseID='.$courseID.' "><button id="teacherIIOrange">Edit Documents II</button></a>';
                if (strcmp($result['intAuditII'], "Napproved") === 0) {
                    echo '<a href="http://localhost/FAS/audTeaRes2.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'" ><button id="iAuditIIOrange">Internal Audit II</button></a>';
                }else{
                    echo '<a href="#" ><button id="iAuditIIRed">Internal Audit II</button></a>';
                }
            }
            else if(strcmp($result['teacherIntII'], "approved") === 0 && strcmp($result['audType'], "aud1")  === 0){
                echo '<a href="http://localhost/FAS/audTeaRes2.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'"><button id="teacherIIGreen">Documents Approved</button></a>';
                echo '<a href="http://localhost/FAS/audTeaRes2.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'"" ><button id="iAuditIIGreen">Internal Audit II</button></a>';
            }
            else if(strcmp($result['teacherIntII'], "NULL") === 0 && strcmp($result['audType'], "aud1")  === 0) {
                echo '<a href="http://localhost/FAS/teaUploadAudit2.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'" ><button id="teacherIIRed">Docs not Uploaded</button>';
                echo '<a href="#" ><button id="iAuditIIRed">Internal Audit II</button></a>';
            }
        }
    }
}else {
    echo "0 results";
}  


        // ###################################################################################################
        //                                     Hod 
        // ###################################################################################################

        $sql = "select audit1,audit2 from hodfeedback where courseID ='".$courseID."' and division='$division' and (audit1 is not NULL or audit2 is NOT NULL)";
        $result = $conn->query($sql);
        $data = mysqli_query($conn, $sql);
        $total = mysqli_num_rows($data);
        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {


                echo '<a href="http://localhost/FAS/hodTeaFeedAud1.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'" ><button id="hodGreen">HOD Response</button></a>';

            }  
        } else {
            echo '<button id="hodRed">HOD Response</button>';
        }

?>