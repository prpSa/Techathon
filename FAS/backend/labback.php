<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "include/conn.php";

if (isset($_POST['save'])) {
    $username = $_GET['username'];
    $fromAcademicYear = $_POST['year1'];
    $toAcademicYear = $_POST['year2'];
    $semester = $_POST['sem'];
    $subjectCode = $_POST['subcode'];
    $courseName = $_POST['cname'];
    $credits = $_POST['cred'];
    $lectureHoursPerWeek = $_POST['lec'];
    $totalContactHours = $_POST['contact'];

    $Objective = $_POST['Objective'];
    $Text = $_POST['Text'];

    $sql1 = "SELECT courseID FROM `coursel` WHERE courseName= '$courseName' AND fromAcadYr='$fromAcademicYear'";
    $result1 = $conn->query($sql1);
    $data1 = mysqli_query($conn, $sql1);
    $total1 = mysqli_num_rows($data1);
    $i = 0;
    if ($total1 != 0) {
        while ($result1 = mysqli_fetch_assoc($data1)) {
            global $courseID;
            $courseID = $result1['courseID'];
        }
    }
    
    
    $sql = "UPDATE `coursel` SET `toAcadYr`='$toAcademicYear',`credits`='$credits',`lectHr`='$lectureHoursPerWeek',`totLectHr`='$totalContactHours' WHERE `courseID`='$courseID'";
    
    $query = mysqli_query($conn, $sql);
    $sql_hod = "INSERT INTO `hodhomel`(`courseID`, `teacher`,`auditorSheet`, `dqa`, `intAudit`, `teacherInt`,`intAuditII`,`teacherIntII`,`extAudit`) VALUES ('" . $courseID . "','submitted','Nsubmitted','NULL','NULL','NULL','NULL','NULL','NULL')";
    $query_hod = mysqli_query($conn, $sql_hod);


    foreach ($Objective as $key => $value) {
        $save = "INSERT INTO courseobjectivel (courseID, objNo, objName)VALUES('" . $courseID . "','" . $value . "','" . $Text[$key] . "')";

        $query = mysqli_query($conn, $save);
    }


    $CO_no = $_POST['CO_no'];
    $CO_name = $_POST['CO_name'];
    foreach ($CO_no as $key => $value) {
        $savee = "INSERT INTO courseoutcomel (courseID, CO_no, CO_name)VALUES('" . $courseID . "','" . $value . "','" . $CO_name[$key] . "')";

        $queryy = mysqli_query($conn, $savee);
    }


    $PO_no = $_POST['PO_no'];
    $PO_title = $_POST['PO_title'];
    $PO_description = $_POST['PO_description'];

    foreach ($PO_no as $key => $value) {
        $save_progOut = "INSERT INTO progoutcomesl (courseID, PO_no,PO_title,PO_description)VALUES('" . $courseID . "','" . $value . "','" . $PO_title[$key] . "','" . $PO_description[$key] . "')";

        $queryy = mysqli_query($conn, $save_progOut);
    }


    for ($i = 1; $i <= 6; $i++) {
        for ($j = 1; $j <= 12; $j++) {
            $rating = $_POST["rco$i" . "cpo$j"];
            $CO_no = "CO$i";
            $PO_no = "PO$j";
            $sql_mCOpo = " INSERT INTO `co_po_mappingl`(courseID,CO_no,PO_no ,rating) VALUES ('$courseID','$CO_no','$PO_no','$rating');";
            $query = mysqli_query($conn, $sql_mCOpo);
        }
    }


    $PSO_no = $_POST['PSO_no'];
    $PSO_description = $_POST['PSO_description'];
    foreach ($PSO_no as $key => $value) {
        $save_pso = "INSERT INTO progspecificoutcomel (courseID, PSO_no, PSO_description)VALUES('" . $courseID . "','" . $value . "','" . $PSO_description[$key] . "')";
        $queryy = mysqli_query($conn, $save_pso);
    }


    for ($i = 1; $i <= 6; $i++) {
        for ($j = 1; $j <= 3; $j++) {
            $rating = $_POST["rcoo$i" . "cpoo$j"];
            $CO_no = "CO$i";
            $PSO_no = "PSO$j";
            $sql_mCOpso = " INSERT INTO `co_pso_mappingl`(courseID,CO_no,PSO_no ,rating) VALUES ('$courseID','$CO_no','$PSO_no','$rating');";
            $query = mysqli_query($conn, $sql_mCOpso);
        }
    }


    $CO_noo = $_POST['CO_noo'];
    $noOfExp = $_POST['noOfExp'];
    $weightagePercent = $_POST['weightagePercent'];

    foreach ($CO_noo as $key => $value) {
        $save_coWei = "UPDATE courseoutcomel SET weightagePercent='" . $weightagePercent[$key] . "',noOfExp='" . $noOfExp[$key] . "' WHERE courseID='" . $courseID . "' AND CO_no='" . $value . "' ";
        $queryy = mysqli_query($conn, $save_coWei);
    }

    $expNo = $_POST['expNo'];
    $CO_no_expLi = $_POST['CO_no_expLi'];
    $expName = $_POST['expName'];
    $weight = $_POST['weight'];

    foreach ($expNo as $key => $value) {
        $save_expLi = " INSERT INTO `experimentlist` (`courseID`, `expNo`, `CO_no`, `expName`, `weight`) VALUES ('" . $courseID . "','" . $value . "','" . $CO_no_expLi[$key] . "','" . $expName[$key] . "','" . $weight[$key] . "');";
        $queryy = mysqli_query($conn, $save_expLi);
    }


    for ($i = 1; $i <= 3; $i++) {
        for ($j = 1; $j <= 6; $j++) {
            $marks = $_POST["r$i" . "c$j"];
            $AssignNO = "Assignment$i";
            $Co_no = "CO$j";
            $sql_asMeth = " INSERT INTO `assessmentmethod`(courseID,assignNo,CO_no ,marks) VALUES ('$courseID','$AssignNO','$Co_no','$marks');";
            $query = mysqli_query($conn, $sql_asMeth);
        }
    }


    // $expNo =$_POST['expNo'];
    // $CO_no_expLi =$_POST['CO_no_expLi'];
    // $expName =$_POST['expName'];
    // $weight =$_POST['weight'];

    // foreach ($expNo as $key => $value){
    //     $save_expLi =" INSERT INTO experimentlist (courseID, expNo, CO_no, expName, weight) VALUES ('".$courseID."','".$value."','".$CO_no_expLi[$key]."','".$expName[$key]."','".$weight[$key]."');";
    //     $save_expLi ="UPDATE `experimentlist` SET `expNo`='$expNo',`CO_no`='$CO_no_expLi[$key]',`expName`='$value',`weight`='$weight[$key]' WHERE `courseID`='$courseID' ";
    //     $queryy = mysqli_query($conn, $save_expLi);
    // }



    $sqlll = "INSERT INTO `dqal`(`courseID`, `courseDetails`, `courseDetailsSugg`, `courseObj`, `courseObjSugg`, `courseOut`, `courseOutSugg`, `progOut`, `progOutSugg`, `m_copo`, `m_copoSugg`, `pso`, `psoSugg`, `m_copso`, `m_copsoSugg`, `courseWeig`, `courseWeigSugg`, `chpPlan`, `chpPlanSugg`,`lesPlan`,`lesPlanSugg`, `ia`, `iaSugg`, `btLevel`, `grammar`, `finalSugg`) VALUES ('$courseID','NULL','NULL','NULL', 'NULL','NULL', 'NULL','NULL','NULL' ,'NULL','NULL','NULL','NULL' ,'NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL' , 'NULL',  'NULL', 'NULL', 'NULL','NULL')";
    $query = mysqli_query($conn, $sqlll);



    $sql_hodd = "INSERT INTO `hod_all_feedbackl`(`courseID`, `teaType`, `audType`, `teacher`, `dqaTeam`, `intAudit`, `extAudit`, `classOrLab`) VALUES ('$courseID','NULL','NULL','NULL','NULL','NULL','NULL','NULL')";
    $query_hod = mysqli_query($conn, $sql_hodd);





    if ($sql_hodd == TRUE) {
        include('../smtp/PHPMailerAutoload.php');
        include('../smtp.php');
        $mail->addAddress($username);
        $mail->isHTML(true);
        $mail->Subject="Form has been Submitted for correction toDQA Team";
        $mail->Body="Your draft course handout has been submitted for further process.<br> Course Details: <br>Coursename: $courseName <br>Semester: $semester<br> Subject Code: $subjectCode ";
        $mail->SMTPOptions=array("ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            "allow_self_signed"=>false,
        ));

        if($mail->send()){
            echo '<script type="text/javascript">'; 
            echo 'alert("ThankYou for Your Response");'; 
            echo 'window.open("http://localhost/FAS/teacherhomelab.php?username='.$username.'","_self");';
            echo '</script>';
            exit;
        }else{
           echo 'Mail not Send';
        }


    }







} else if (isset($_POST['saveTea'])) {
    $username = $_GET['username'];
    $fromAcademicYear = $_POST['year1'];
    $toAcademicYear = $_POST['year2'];
    $semester = $_POST['sem'];
    $subjectCode = $_POST['subcode'];
    $courseName = $_POST['cname'];
    $credits = $_POST['cred'];
    $lectureHoursPerWeek = $_POST['lec'];
    $totalContactHours = $_POST['contact'];

    $Objective = $_POST['Objective'];
    $Text = $_POST['Text'];
    $sql1 = "SELECT courseID FROM `coursel` WHERE courseName= '$courseName' AND fromAcadYr='$fromAcademicYear'";
    $result1 = $conn->query($sql1);
    $data1 = mysqli_query($conn, $sql1);
    $total1 = mysqli_num_rows($data1);
    $i = 0;
    if ($total1 != 0) {
        while ($result1 = mysqli_fetch_assoc($data1)) {
            global $courseID;
            $courseID = $result1['courseID'];
        }
    }
     

    $sql = "UPDATE `coursel` SET `toAcadYr`='$toAcademicYear',`credits`='$credits',`lectHr`='$lectureHoursPerWeek',`totLectHr`='$totalContactHours' WHERE `courseID`='$courseID'";
    $query = mysqli_query($conn, $sql);


    foreach ($Objective as $key => $value) {
        $save = "INSERT INTO courseobjectivel (courseID, objNo, objName)VALUES('" . $courseID . "','" . $value . "','" . $Text[$key] . "')";

        $query = mysqli_query($conn, $save);
    }


    $CO_no = $_POST['CO_no'];
    $CO_name = $_POST['CO_name'];
    foreach ($CO_no as $key => $value) {
        $savee = "INSERT INTO courseoutcomel (courseID, CO_no, CO_name)VALUES('" . $courseID . "','" . $value . "','" . $CO_name[$key] . "')";

        $queryy = mysqli_query($conn, $savee);
    }


    $PO_no = $_POST['PO_no'];
    $PO_title = $_POST['PO_title'];
    $PO_description = $_POST['PO_description'];

    foreach ($PO_no as $key => $value) {
        $save_progOut = "INSERT INTO progoutcomesl (courseID, PO_no,PO_title,PO_description)VALUES('" . $courseID . "','" . $value . "','" . $PO_title[$key] . "','" . $PO_description[$key] . "')";
        $queryy = mysqli_query($conn, $save_progOut);
    }


    for ($i = 1; $i <= 6; $i++) {
        for ($j = 1; $j <= 12; $j++) {
            $rating = $_POST["rco$i" . "cpo$j"];
            $CO_no = "CO$i";
            $PO_no = "PO$j";
            $sql_mCOpo = " INSERT INTO `co_po_mappingl`(courseID,CO_no,PO_no ,rating) VALUES ('$courseID','$CO_no','$PO_no','$rating');";
            $query = mysqli_query($conn, $sql_mCOpo);
        }
    }


    $PSO_no = $_POST['PSO_no'];
    $PSO_description = $_POST['PSO_description'];
    foreach ($PSO_no as $key => $value) {
        $save_pso = "INSERT INTO progspecificoutcomel (courseID, PSO_no, PSO_description)VALUES('" . $courseID . "','" . $value . "','" . $PSO_description[$key] . "')";
        $queryy = mysqli_query($conn, $save_pso);
    }


    for ($i = 1; $i <= 6; $i++) {
        for ($j = 1; $j <= 3; $j++) {
            $rating = $_POST["rcoo$i" . "cpoo$j"];
            $CO_no = "CO$i";
            $PSO_no = "PSO$j";
            $sql_mCOpso = " INSERT INTO `co_pso_mappingl`(courseID,CO_no,PSO_no ,rating) VALUES ('$courseID','$CO_no','$PSO_no','$rating');";
            $query = mysqli_query($conn, $sql_mCOpso);
        }
    }


    $CO_noo = $_POST['CO_noo'];
    $noOfExp = $_POST['noOfExp'];
    $weightagePercent = $_POST['weightagePercent'];

    foreach ($CO_noo as $key => $value) {
        $save_coWei = "UPDATE courseoutcomel SET weightagePercent='" . $weightagePercent[$key] . "',noOfExp='" . $noOfExp[$key] . "' WHERE courseID='" . $courseID . "' AND CO_no='" . $value . "' ";
        $queryy = mysqli_query($conn, $save_coWei);
    }

    $expNo = $_POST['expNo'];
    $CO_no_expLi = $_POST['CO_no_expLi'];
    $expName = $_POST['expName'];
    $weight = $_POST['weight'];

    foreach ($expNo as $key => $value) {
        $save_expLi = " INSERT INTO experimentlist (`courseID`, `expNo`, `CO_no`, `expName`, `weight`) VALUES ('" . $courseID . "','" . $value . "','" . $CO_no_expLi[$key] . "','" . $expName[$key] . "','" . $weight[$key] . "');";
        $queryy = mysqli_query($conn, $save_expLi);
    }



    for ($i = 1; $i <= 3; $i++) {
        for ($j = 1; $j <= 6; $j++) {
            $marks = $_POST["r$i" . "c$j"];
            $AssignNO = "Assignment$i";
            $Co_no = "CO$j";
            $sql_asMeth = " INSERT INTO `assessmentmethod`(courseID,assignNo,CO_no ,marks) VALUES ('$courseID','$AssignNO','$Co_no','$marks');";
            $query = mysqli_query($conn, $sql_asMeth);
        }
    }




    $sql_hod = "INSERT INTO `hodhometeal`(`courseID`, `teacher`) VALUES ('" . $courseID . "','inprocess')";
    $query_hod = mysqli_query($conn, $sql_hod);


    if ($sql_hod == TRUE) {
        echo '<script type="text/javascript">'; 
        echo 'alert("ThankYou for Your Response");'; 
        echo 'window.open("http://localhost/FAS/teacherhomelab.php?username='.$username.'","_self");';
        echo '</script>';
        exit;
    }
}

















?>