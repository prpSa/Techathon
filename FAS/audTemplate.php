<?php
    $username = $_GET['username'];
    include "backend/include/conn.php";
    $username = $_GET['username'];


    // ###################################################################################################
    //                                     Hod 
    // ###################################################################################################
    $sql = "select auditor1 from hodfeedback where courseID ='".$courseID."' and auditor1 is not NULL and division ='$division'";
    $result = $conn->query($sql);
    $data = mysqli_query($conn, $sql);
    $total = mysqli_num_rows($data);
    $username = $_GET['username'];
    $audType ='aud1';
    if ($total != 0) {
        while ($result = mysqli_fetch_assoc($data)) {
            echo '<a href="http://localhost/FAS/hodAudFeed.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'&audType='.$audType.'" ><button id="hodAud1Green">HOD Audit 1</button></a>';
        }
    } else {
        echo '<button id="hodAud1Red">HOD Audit 1</button>';
    }
    $username = $_GET['username'];
    $sql = "select auditor2 from hodfeedback where courseID ='".$courseID."' and auditor2 is not NULL and division ='$division'";
    $result = $conn->query($sql);
    $data = mysqli_query($conn, $sql);
    $total = mysqli_num_rows($data);
    $audType ='aud2';
    if ($total != 0) {
        while ($result = mysqli_fetch_assoc($data)) {
            echo '<a href="http://localhost/FAS/hodAudFeed.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'&audType='.$audType.'"  ><button id="hodAud2Green">HOD Audit 2</button></a>';
        }
    } else {
        echo '<button id="hodAud2Red">HOD Audit 2</button>';
    }

   
    // ###################################################################################################
    //                                     AUDIT 1 AND AUDIT 2 
    // ###################################################################################################
    $username = $_GET['username'];
    $sql = "select * from hodhomee GROUP BY sub_name,division HAVING courseID ='".$courseID."' AND division='".$division."' ";
    $result = $conn->query($sql);
    $data = mysqli_query($conn,$sql);
    $total =mysqli_num_rows($data);
    if ( $total != 0) { 
        while($result=mysqli_fetch_assoc($data)) {
            $tea_username=$result['tea_username'];
            $division=$result['division'];
            if(strcmp($result['teacherInt'],"submitted")===0 && strcmp($result['audType'],"aud1")===0){
                echo '<a href="http://localhost/FAS/auditorTeamSub.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'&tea_username='.$tea_username.'" ><button id="teaOrange">Documents for Audit I</button></a>';
                echo '<a href="http://localhost/FAS/auditorViewResponseSub.php?username='.$username.'&division='.$division.'&courseID='.$courseID.' " ><button id="teaGreen">View Response I</button></a>';
            }
            else if(strcmp($result['teacherInt'], "Nsubmitted") === 0 && strcmp($result['audType'],"aud1")===0){
                echo '<a href="#" ><button id="teaGrey">Documents for Audit I</button></a>';
                echo '<a href="http://localhost/FAS/auditorViewResponseSub.php?username='.$username.'&division='.$division.'&courseID='.$courseID.' " ><button id="teaGreen">View Response I</button></a>';
            }
            else if(strcmp($result['teacherInt'], "approved") === 0 && strcmp($result['audType'],"aud1")===0){
                echo '<a href="http://localhost/FAS/auditorViewResponseSub.php?username='.$username.'&division='.$division.'&courseID='.$courseID.' " ><button id="teaGreen">Documents for Audit I</button></a>';
            }
            else if(strcmp($result['teacherInt'], "NULL") === 0 && strcmp($result['audType'],"aud1")===0){
                echo '<a href="#" ><button id="teaRed">Docs for Audit I</button></a>';
            }
    
        

        if(strcmp($result['teacherInt'], "approved") === 0 &&  strcmp($result['audType'],"aud1")===0){
            if(strcmp($result['teacherIntII'],"submitted")===0 && strcmp($result['audType'],"aud1")===0){
                echo '<a href="http://localhost/FAS/auditorTeamSub2.php?username='.$username.'&division='.$division.'&courseID='.$courseID.'&tea_username='.$tea_username.'" ><button id="teaIIOrange">Documents for Audit II</button></a>';
            }
            else if(strcmp($result['teacherIntII'], "Nsubmitted") === 0  && strcmp($result['audType'],"aud1")===0){
                echo '<a href="#" ><button id="teaIIGrey">Documents for Audit II</button></a>';
                echo '<a href="http://localhost/FAS/auditorIIViewResponseSub.php?username='.$username.'&division='.$division.'&courseID='.$courseID.' " ><button id="teaGreen">View Response</button></a>';
            }
            else if(strcmp($result['teacherIntII'], "approved") === 0 && strcmp($result['audType'],"aud1")===0){
                echo '<a href="http://localhost/FAS/auditorIIViewResponseSub.php?username='.$username.'&division='.$division.'&courseID='.$courseID.' " ><button id="teaIIGreen">Documents for Audit II</button></a>';
            }
            else if(strcmp($result['teacherIntII'], "NULL") === 0 && strcmp($result['audType'],"aud1")===0){
                echo '<a href="#" ><button id="teaIIRed">Documents for Audit II</button></a>';
                echo '<a href="#" ><button id="iAuditIIRed">Audit II</button></a>';
            }
        }

        }
    } else {
        echo "0 results";
    }




?>