<script src="js/sweetalert.min.js"></script>
<?php
include "include/conn.php";

if (isset($_POST['save'])) {
    $courseID = $_GET['courseID'];
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

    $sql = "UPDATE `coursel` SET `fromAcadYr`='$fromAcademicYear',`toAcadYr`='$toAcademicYear',`sem`='$semester',`subjectCode`='$subjectCode',`courseName`='$courseName',`credits`='$credits',`lectHr`='$lectureHoursPerWeek',`totLectHr`='$totalContactHours' WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql);


    $sql_del_couObj = "DELETE FROM `courseobjectivel` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_couObj);

    foreach ($Objective as $key => $value) {
        $save = "INSERT INTO courseobjectivel (courseID, objNo, objName)VALUES('" . $courseID . "','" . $value . "','" . $Text[$key] . "')";

        $query = mysqli_query($conn, $save);
    }

    $sql_del_couOut = "DELETE FROM `courseoutcomel` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_couOut);

    $CO_no = $_POST['CO_no'];
    $CO_name = $_POST['CO_name'];
    foreach ($CO_no as $key => $value) {
        $savee = "INSERT INTO courseoutcomel (courseID, CO_no, CO_name)VALUES('" . $courseID . "','" . $value . "','" . $CO_name[$key] . "')";

        $queryy = mysqli_query($conn, $savee);
    }

    $sql_del_proOut = "DELETE FROM `progoutcomesl` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_proOut);

    $PO_no = $_POST['PO_no'];
    $PO_title = $_POST['PO_title'];
    $PO_description = $_POST['PO_description'];

    foreach ($PO_no as $key => $value) {
        $save_progOut = "INSERT INTO progoutcomesl (courseID, PO_no,PO_title,PO_description)VALUES('" . $courseID . "','" . $value . "','" . $PO_title[$key] . "','" . $PO_description[$key] . "')";
        $queryy = mysqli_query($conn, $save_progOut);
    }

    $sql_del_COPO = "DELETE FROM `co_po_mappingl` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_COPO);

    for ($i = 1; $i <= 6; $i++) {
        for ($j = 1; $j <= 12; $j++) {
            $rating = $_POST["rco$i" . "cpo$j"];
            $CO_no = "CO$i";
            $PO_no = "PO$j";
            $sql_mCOpo = " INSERT INTO `co_po_mappingl`(courseID,CO_no,PO_no ,rating) VALUES ('$courseID','$CO_no','$PO_no','$rating');";
            $query = mysqli_query($conn, $sql_mCOpo);
        }
    }

    $sql_del_proSpeOut = "DELETE FROM `progspecificoutcomel` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_proSpeOut);

    $PSO_no = $_POST['PSO_no'];
    $PSO_description = $_POST['PSO_description'];
    foreach ($PSO_no as $key => $value) {
        $save_pso = "INSERT INTO progspecificoutcomel (courseID, PSO_no, PSO_description)VALUES('" . $courseID . "','" . $value . "','" . $PSO_description[$key] . "')";
        $queryy = mysqli_query($conn, $save_pso);
    }

    $sql_del_coPsoMap = "DELETE FROM `co_pso_mappingl` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_coPsoMap);

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

    $sql_del_couTop = "DELETE FROM `coursetopicsl` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_exptLst);

    $chp_no = $_POST['Chp_no'];
    $topic = $_POST['topic'];
    $duration = $_POST['duration'];
    $CO_nooo = $_POST['CO_nooo'];
    $weightage = $_POST['weightage'];

    foreach ($CO_nooo as $key => $value) {
        $sql_chpPlan = "INSERT INTO `coursetopicsl`(`courseID`, `chp_expNo`, `chp_expTopic`, `CO_meet`, `chp_exp_weightage`, `duration`) VALUES ('" . $courseID . "','" . $chp_no[$key] . "','" . $topic[$key] . "','" . $value . "','" . $weightage[$key] . "','" . $duration[$key] . "');";
        $queryy = mysqli_query($conn, $sql_chpPlan);
    }

    $sql_del_exptLst = "DELETE FROM `experimentlist` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_exptLst);

    $expNo = $_POST['expNo'];
    $CO_no_expLi = $_POST['CO_no_expLi'];
    $expName = $_POST['expName'];
    $weight = $_POST['weight'];

    foreach ($expNo as $key => $value) {
        $save_expLi = " INSERT INTO experimentlist (`courseID`, `expNo`, `CO_no`, `expName`, `weight`) VALUES ('" . $courseID . "','" . $value . "','" . $CO_no_expLi[$key] . "','" . $expName[$key] . "','" . $weight[$key] . "');";
        $queryy = mysqli_query($conn, $save_expLi);
    }


    $sql_del_as = "DELETE FROM `assessmentmethod` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_as);

    for ($i = 1; $i <= 3; $i++) {
        for ($j = 1; $j <= 6; $j++) {
            $marks = $_POST["r$i" . "c$j"];
            $AssignNO = "Assignment$i";
            $Co_no = "CO$j";
            $sql_asMeth = " INSERT INTO `assessmentmethod`(courseID,assignNo,CO_no ,marks) VALUES ('$courseID','$AssignNO','$Co_no','$marks');";
            $query = mysqli_query($conn, $sql_asMeth);
        }
    }



    $sqlll = "INSERT INTO `dqal`(`courseID`, `courseDetails`, `courseDetailsSugg`, `courseObj`, `courseObjSugg`, `courseOut`, `courseOutSugg`, `progOut`, `progOutSugg`, `m_copo`, `m_copoSugg`, `pso`, `psoSugg`, `m_copso`, `m_copsoSugg`, `courseWeig`, `courseWeigSugg`, `chpPlan`, `chpPlanSugg`,`lesPlan`,`lesPlanSugg`, `ia`, `iaSugg`, `btLevel`, `grammar`, `finalSugg`) VALUES ('$courseID','NULL','NULL','NULL', 'NULL','NULL', 'NULL','NULL','NULL' ,'NULL','NULL','NULL','NULL' ,'NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL' , 'NULL',  'NULL', 'NULL', 'NULL','NULL')";
    $query = mysqli_query($conn, $sqlll);


    $sql_hod = "INSERT INTO `hodhomel`(`courseID`, `teacher`,`auditorSheet`, `dqa`, `intAudit`, `teacherInt`,`intAuditII`,`teacherIntII`,`extAudit`) VALUES ('" . $courseID . "','submitted','Nsubmitted','NULL','NULL','NULL','NULL','NULL','NULL')";
    $query_hod = mysqli_query($conn, $sql_hod);

    $sql_hodd = "INSERT INTO `hod_all_feedbackl`(`courseID`, `teaType`, `audType`, `teacher`, `dqaTeam`, `intAudit`, `extAudit`, `classOrLab`) VALUES ('$courseID','NULL','NULL','NULL','NULL','NULL','NULL','NULL')";
    $query_hod = mysqli_query($conn, $sql_hodd);

    $sql_del_hod = "DELETE FROM `hodhometeal` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_hod);




    if ($sql_hod == TRUE) {
        echo '<script type="text/javascript">'; 
        echo 'alert("ThankYou for Your Response");'; 
        echo 'window.open("http://localhost/FAS/teacherhomelab.php?username='.$username.'","_self");';
        echo '</script>';
        exit;
    }
} else if (isset($_POST['saveTea'])) {
    $courseID = $_GET['courseID'];
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

    $sql = "UPDATE `coursel` SET `fromAcadYr`='$fromAcademicYear',`toAcadYr`='$toAcademicYear',`sem`='$semester',`subjectCode`='$subjectCode',`courseName`='$courseName',`credits`='$credits',`lectHr`='$lectureHoursPerWeek',`totLectHr`='$totalContactHours' WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql);


    $sql_del_couObj = "DELETE FROM `courseobjectivel` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_couObj);

    foreach ($Objective as $key => $value) {
        $save = "INSERT INTO courseobjectivel (courseID, objNo, objName)VALUES('" . $courseID . "','" . $value . "','" . $Text[$key] . "')";

        $query = mysqli_query($conn, $save);
    }

    $sql_del_couOut = "DELETE FROM `courseoutcomel` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_couOut);

    $CO_no = $_POST['CO_no'];
    $CO_name = $_POST['CO_name'];
    foreach ($CO_no as $key => $value) {
        $savee = "INSERT INTO courseoutcomel (courseID, CO_no, CO_name)VALUES('" . $courseID . "','" . $value . "','" . $CO_name[$key] . "')";

        $queryy = mysqli_query($conn, $savee);
    }

    $sql_del_proOut = "DELETE FROM `progoutcomesl` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_proOut);

    $PO_no = $_POST['PO_no'];
    $PO_title = $_POST['PO_title'];
    $PO_description = $_POST['PO_description'];

    foreach ($PO_no as $key => $value) {
        $save_progOut = "INSERT INTO progoutcomesl (courseID, PO_no,PO_title,PO_description)VALUES('" . $courseID . "','" . $value . "','" . $PO_title[$key] . "','" . $PO_description[$key] . "')";
        $queryy = mysqli_query($conn, $save_progOut);
    }

    $sql_del_COPO = "DELETE FROM `co_po_mappingl` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_COPO);

    for ($i = 1; $i <= 6; $i++) {
        for ($j = 1; $j <= 12; $j++) {
            $rating = $_POST["rco$i" . "cpo$j"];
            $CO_no = "CO$i";
            $PO_no = "PO$j";
            $sql_mCOpo = " INSERT INTO `co_po_mappingl`(courseID,CO_no,PO_no ,rating) VALUES ('$courseID','$CO_no','$PO_no','$rating');";
            $query = mysqli_query($conn, $sql_mCOpo);
        }
    }

    $sql_del_proSpeOut = "DELETE FROM `progspecificoutcomel` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_proSpeOut);

    $PSO_no = $_POST['PSO_no'];
    $PSO_description = $_POST['PSO_description'];
    foreach ($PSO_no as $key => $value) {
        $save_pso = "INSERT INTO progspecificoutcomel (courseID, PSO_no, PSO_description)VALUES('" . $courseID . "','" . $value . "','" . $PSO_description[$key] . "')";
        $queryy = mysqli_query($conn, $save_pso);
    }

    $sql_del_coPsoMap = "DELETE FROM `co_pso_mappingl` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_coPsoMap);

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



    $sql_del_couTop = "DELETE FROM `coursetopicsl` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_exptLst);

    $chp_no = $_POST['Chp_no'];
    $topic = $_POST['topic'];
    $duration = $_POST['duration'];
    $CO_nooo = $_POST['CO_nooo'];
    $weightage = $_POST['weightage'];

    foreach ($CO_nooo as $key => $value) {
        $sql_chpPlan = "INSERT INTO `coursetopicsl`(`courseID`, `chp_expNo`, `chp_expTopic`, `CO_meet`, `chp_exp_weightage`, `duration`) VALUES ('" . $courseID . "','" . $chp_no[$key] . "','" . $topic[$key] . "','" . $value . "','" . $weightage[$key] . "','" . $duration[$key] . "');";
        $queryy = mysqli_query($conn, $sql_chpPlan);
    }



    $sql_del_exptLst = "DELETE FROM `experimentlist` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_exptLst);

    $expNo = $_POST['expNo'];
    $CO_no_expLi = $_POST['CO_no_expLi'];
    $expName = $_POST['expName'];
    $weight = $_POST['weight'];

    foreach ($expNo as $key => $value) {
        $save_expLi = " INSERT INTO `experimentlist` (`courseID`, `expNo`, `CO_no`, `expName`, `weight`) VALUES ('" . $courseID . "','" . $value . "','" . $CO_no_expLi[$key] . "','" . $expName[$key] . "','" . $weight[$key] . "');";
        $queryy = mysqli_query($conn, $save_expLi);
    }


    $sql_del_as = "DELETE FROM `assessmentmethod` WHERE `courseID`='$courseID' ";
    $query = mysqli_query($conn, $sql_del_as);

    for ($i = 1; $i <= 3; $i++) {
        for ($j = 1; $j <= 6; $j++) {
            $marks = $_POST["r$i" . "c$j"];
            $AssignNO = "Assignment$i";
            $Co_no = "CO$j";
            $sql_asMeth = " INSERT INTO `assessmentmethod`(courseID,assignNo,CO_no ,marks) VALUES ('$courseID','$AssignNO','$Co_no','$marks');";
            $query = mysqli_query($conn, $sql_asMeth);
        }
    }

    $sql_hod = "UPDATE `hodhometeal` SET `teacher`='inprocess' WHERE `courseID`='" . $courseID . "' ";
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