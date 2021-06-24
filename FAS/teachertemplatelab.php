<?php
include "backend/include/conn.php";
$username = $_GET['username']; 
$sql = "select * from hodhomel where courseID ='" . $courseID . "' ";
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
            echo '<a href="http://localhost/FAS/teaReslab.php?username='.$username.'&courseID='. $courseID.'" ><button id="viewResponse">View Form</button></a>';
            if (strcmp($result['dqa'], "Napproved") === 0) {
                echo '<a href="http://localhost/FAS/dqaTeaReslab.php?username='.$username.'&courseID='. $courseID.'" ><button id="dqaOrange">DQA Team</button></a>';
            }else{
                echo '<a href="#" ><button id="dqaRed">DQA Team</button></a>';
            }

        } 
        else if(strcmp($result['teacher'], "Nsubmitted") === 0){
            echo '<a href="http://localhost/FAS/editlab.php?username='.$username.'&courseID='. $courseID.'"" ><button id="editOrange">Edit the Form</button></a>';
            echo '<a href="http://localhost/FAS/teaReslab.php?username='.$username.'&courseID='. $courseID.'" ><button id="viewResponse">View Form I</button></a>';
            if (strcmp($result['dqa'], "Napproved") === 0) {
                echo '<a href="http://localhost/FAS/dqaTeaReslab.php?username='.$username.'&courseID='. $courseID.'" ><button id="dqaOrange">DQA Team</button></a>';
            }else{
                echo '<a href="#" ><button id="dqaRed">DQA Team</button></a>';
            }
        }
        else if(strcmp($result['teacher'], "approved") === 0){
            echo '<a href="http://localhost/FAS/teaReslab.php?username='.$username.'&courseID='. $courseID.'" ><button id="editGreen">Form I Approved </button></a>';
            echo '<a href="http://localhost/FAS/dqaTeaReslab.php?username='.$username.'&courseID='. $courseID.'" ><button id="dqaGreen">DQA Team</button></a>';
        }
    
        else if(strcmp($result['teacher'], "NULL") === 0){
            echo '<a href="#" ><button id="editGrey">Edit the Form</button></a>';
        }




        // ###################################################################################################
        //                                     Hod 
        // ###################################################################################################
        $sqlll = "select teacher from hod_feedbackl where courseID ='".$courseID."' and teacher is not NULL";
        $resulttt = $conn->query($sqlll);
        $dataaa = mysqli_query($conn, $sqlll);
        $totalll = mysqli_num_rows($dataaa);
        if ($totalll != 0) {
        // output data of each row
        while ($resulttt = mysqli_fetch_assoc($dataaa)) {
        echo '<a href="http://localhost/FAS/hodTeaFeedlab.php?username='.$username.'&courseID='. $courseID.'" ><button id="hodGreen">HOD Response</button></a>';
      

    }  
} else {
    echo '<button id="hodRed">HOD Response</button>';
}}}
 

$sqll = "select * from hodhometeal where courseID ='".$courseID."' ";
$resultt = $conn->query($sqll);
$dataa = mysqli_query($conn, $sqll);
$totall = mysqli_num_rows($dataa);

if ($totall > 0) {
    while ($resultt = mysqli_fetch_assoc($dataa)) {
            echo '<a href="http://localhost/FAS/contlab.php?courseID='.$courseID.'&username='.$username.' " ><button id="viewResponsee">Continue Form</button></a>';

    }
}


?>