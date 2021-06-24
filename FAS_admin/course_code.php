<?php


include 'valid.php';
$username = $_GET['username'];
include "include/conn.php";

if (isset($_POST['registerbtn'])) {
    $name = $_POST['name'];
    $username1 = $_POST['username'];
    $subject = $_POST['subject'];
    $division = $_POST['division'];
    $year = $_POST['year'];
    $role = $_POST['role'];


    $sql1 = "SELECT courseID FROM `course` WHERE courseName= '$subject' AND fromAcadYr='$year'";
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



    $query1 = "INSERT INTO `audit_docs`(`courseID`,`tea_username`, `sub_name`, `teaRole`, `audType`,`division`,`year`, `prerequisite`, `documentsVerified`, `defaulterList`, `lms`, `dcf`, `eAttendance`, `syllabusCoverage`, `workshopConduction`, `booksReferred`, `identifyStudents`, `evaluationLabs`, `additionalExperiments`, `epi`, `sampleCopies`, `ict`, `smartBoard`, `extension`) VALUES ('$courseID','$username1','$subject','$role','aud1','$division','$year','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL')";
    $query_run = mysqli_query($connection, $query1);

    $query2 = "INSERT INTO `audit_docs`(`courseID`,`tea_username`, `sub_name`, `teaRole`, `audType`,`division`,`year`, `prerequisite`, `documentsVerified`, `defaulterList`, `lms`, `dcf`, `eAttendance`, `syllabusCoverage`, `workshopConduction`, `booksReferred`, `identifyStudents`, `evaluationLabs`, `additionalExperiments`, `epi`, `sampleCopies`, `ict`, `smartBoard`, `extension`) VALUES ('$courseID','$username1','$subject','$role','aud2','$division','$year','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL')";
    $query_run = mysqli_query($connection, $query2);

    $query3 = "INSERT INTO `audit_res`(`courseID`,`tea_username`, `sub_name`, `teaRole`, `audType`,`division`,`year`, `prerequisite_fdbk`, `documentsVerified_fdbk`, `defaulterList_fdbk`, `lms_fdbk`, `dcf_fdbk`, `eAttendance_fdbk`, `syllabusCoverage_fdbk`, `workshopConduction_fdbk`, `booksReferred_fdbk`, `identifyStudents_fdbk`, `evaluationLabs_fdbk`, `additionalExperiments_fdbk`, `EPI_fdbk`, `sample_copies_fdbk`, `ICT_fdbk`, `smart_board_fdbk`, `finalSugg_fdbk`) VALUES ('$courseID','$username1','$subject','$role','aud1','$division','$year','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL')";
    $query_run = mysqli_query($connection, $query3);

    $query4 = "INSERT INTO `audit_res`(`courseID`,`tea_username`, `sub_name`, `teaRole`, `audType`,`division`,`year`, `prerequisite_fdbk`, `documentsVerified_fdbk`, `defaulterList_fdbk`, `lms_fdbk`, `dcf_fdbk`, `eAttendance_fdbk`, `syllabusCoverage_fdbk`, `workshopConduction_fdbk`, `booksReferred_fdbk`, `identifyStudents_fdbk`, `evaluationLabs_fdbk`, `additionalExperiments_fdbk`, `EPI_fdbk`, `sample_copies_fdbk`, `ICT_fdbk`, `smart_board_fdbk`, `finalSugg_fdbk`) VALUES ('$courseID','$username1','$subject','$role','aud2','$division','$year','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL')";
    $query_run = mysqli_query($connection, $query4);

    $query5 = "INSERT INTO `hodhomee`(`courseID`, `tea_username`, `sub_name`,`teaType`, `audType`, `division`, `year`, `teacher`, `dqa`, `intAudit`, `teacherInt`, `intAuditII`, `teacherIntII`, `extAudit`, `hod`) VALUES ('$courseID','$username1','$subject','$role','aud1','$division','$year','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL')";
    $query_run = mysqli_query($connection, $query5);

    if ($query_run) {
        $_SESSION['success'] = "Course Data Added Successfully";
        header("Location: register_user.php?username=$username");
    } else {
        $_SESSION['status'] = "Course Data NOT Added";
        header("Location: register_user.php?username=$username");
    }
    $reply = "Dear $name, <br><br> You have been assigned $subject for the academic year $year-$division<br><br>Regards<br>Admin<br>Faculty Audit System";
    include('smtp/PHPMailerAutoload.php');
    include('smtp.php');
    $mail->addAddress($username1);
    $mail->isHTML(true);
    $mail->Subject = "Reply from Admin(Faculty Audit System)";
    $mail->Body = $reply;
    $mail->SMTPOptions = array("ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
        "allow_self_signed" => false,
    ));
    if ($mail->send()) {
        echo "Email sent successfully";
    } else {
        echo $mail->ErrorInfo;
    }
    // $subject1 = "Reply from Admin(Faculty Audit System)";
    // $headers = "From: packetmathsdictionary@gmail.com";
    // $reply="Dear $name, \n \n You have been assigned $subject for the academic year $year-$division\n\n Regards\nAdmin\nFaculty Audit System ";
    // if (mail($username1, $subject1, $reply, $headers)) {
    //     echo "Email sent successfully";
    // } else {
    //     echo "Email sending failed...";
    // }     
}

if (isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];

    $query = "SELECT * FROM course_admin WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
}

if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $username1 = $_POST['edit_username'];
    $subject = $_POST['edit_subject'];
    $division = $_POST['edit_division'];
    $year = $_POST['edit_year'];
    $role = $_POST['edit_role'];

    $query = "UPDATE hodhomee SET name = '$name' ,tea_username= '$username1' ,subject_name='$subject',division='$division',year='$year',role='$role' WHERE courseID='$id' ";
    $query_run = mysqli_query($connection, $query);
    // $query1 = "UPDATE users SET name = '$name' ,username= '$username1' WHERE id='$id' ";
    // $query_run = mysqli_query($connection,$query1);    

    if ($query_run) {
        $_SESSION['success'] = "Course Edited Successfully";
        header("Location: course.php?username=$username");
    } else {
        $_SESSION['status'] = "Course NOT edited";
        header("Location: course.php?username=$username");
    }
    $reply = "Dear $name, <br><br> You have been assigned $subject for the academic year $year-$division<br><br>Regards<br>Admin<br>Faculty Audit System";
    include('smtp/PHPMailerAutoload.php');
    include('smtp.php');
    $mail->addAddress($username1);
    $mail->isHTML(true);
    $mail->Subject = "Reply from Admin(Faculty Audit System)";
    $mail->Body = $reply;
    $mail->SMTPOptions = array("ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
        "allow_self_signed" => false,
    ));
    if ($mail->send()) {
        echo "Email sent successfully";
    } else {
        echo $mail->ErrorInfo;
    }
    // $subject1 = "Reply from Admin(Faculty Audit System)";
    // $headers = "From: packetmathsdictionary@gmail.com";
    // $reply="Dear $name, \n \n You have been assigned $subject for the academic year $year-$division\n\n Regards\nAdmin\nFaculty Audit System ";
    // if (mail($username1, $subject1, $reply, $headers)) {
    //     echo "Email sent successfully";
    // } else {
    //     echo "Email sending failed...";
    // }     

}

if (isset($_POST['delete_btn'])) {

    // Create connection
    $server = "localhost";
    $username1 = "root";
    $password = "";
    include "include/conn.php";
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST['delete_id'];
    echo $id;
    $subject_name = $_POST['subject_name'];
    $sql_courseID = "SELECT * FROM `course` WHERE courseID = $id ";
    $data_courseID = mysqli_query($conn, $sql_courseID);
    $total_courseID = mysqli_num_rows($data_courseID);
    if ($total_courseID != 0) {
        while ($result_courseID = mysqli_fetch_assoc($data_courseID)) {
            $courseID = $result_courseID['courseID'];
            echo $courseID;

            // $query1 = "set @autoid :=0";
            // $query2 = "update course_admin set id = @autoid := (@autoid+1)";
            // $query3 = "alter course_admin contact Auto_Increment = 1";
            $query4 = "DELETE FROM assessmentmethod WHERE courseID='$courseID' ";
            $query5 = "DELETE FROM audit_docs WHERE courseID='$courseID' ";
            $query6 = "DELETE FROM audit_res WHERE courseID='$courseID' ";
            $query7 = "DELETE FROM course WHERE courseID='$courseID' ";
            $query8 = "DELETE FROM coursel WHERE courseID='$courseID' ";
            $query9 = "DELETE FROM courseobjective WHERE courseID='$courseID' ";
            $query10 = "DELETE FROM courseobjectivel WHERE courseID='$courseID' ";
            $query11 = "DELETE FROM courseoutcome WHERE courseID='$courseID' ";
            $query12 = "DELETE FROM courseoutcomel WHERE courseID='$courseID' ";
            $query13 = "DELETE FROM coursetopics WHERE courseID='$courseID' ";
            $query14 = "DELETE FROM coursetopicsl WHERE courseID='$courseID' ";
            $query15 = "DELETE FROM co_po_mapping WHERE courseID='$courseID' ";
            $query16 = "DELETE FROM co_po_mappingl WHERE courseID='$courseID' ";
            $query17 = "DELETE FROM co_pso_mapping WHERE courseID='$courseID' ";
            $query18 = "DELETE FROM co_pso_mappingl WHERE courseID='$courseID' ";
            $query19 = "DELETE FROM dqa WHERE courseID='$courseID' ";
            $query20 = "DELETE FROM dqal WHERE courseID='$courseID' ";
            $query21 = "DELETE FROM dqateam WHERE courseID='$courseID' ";
            $query22 = "DELETE FROM experimentlist WHERE courseID='$courseID' ";
            $query23 = "DELETE FROM feedback WHERE courseID='$courseID' ";
            $query25 = "DELETE FROM hodhomee WHERE courseID='$courseID' ";
            $query26 = "DELETE FROM hodhomel WHERE courseID='$courseID' ";
            $query27 = "DELETE FROM hodhometea WHERE courseID='$courseID' ";
            $query28 = "DELETE FROM hodhometeal WHERE courseID='$courseID' ";
            $query29 = "DELETE FROM hod_feedback WHERE courseID='$courseID' ";
            $query30 = "DELETE FROM hod_feedbackl WHERE courseID='$courseID' ";
            $query31 = "DELETE FROM ia WHERE courseID='$courseID' ";
            $query32 = "DELETE FROM ial WHERE courseID='$courseID' ";
            $query33 = "DELETE FROM lessonplan WHERE courseID='$courseID' ";
            $query34 = "DELETE FROM lessonplanl WHERE courseID='$courseID' ";
            $query35 = "DELETE FROM progoutcomes WHERE courseID='$courseID' ";
            $query36 = "DELETE FROM progoutcomesl WHERE courseID='$courseID' ";
            $query37 = "DELETE FROM progspecificoutcome WHERE courseID='$courseID' ";
            $query38 = "DELETE FROM progspecificoutcomel WHERE courseID='$courseID' ";
            // $query_run = mysqli_query($connection,$query);
            // $query1_run = mysqli_query($connection, $query1);
            // $query2_run = mysqli_query($connection, $query2);
            // $query3_run = mysqli_query($connection, $query3);
            $query4_run = mysqli_query($connection, $query4);
            $query5_run = mysqli_query($connection, $query5);
            $query6_run = mysqli_query($connection, $query6);
            $query7_run = mysqli_query($connection, $query7);
            $query8_run = mysqli_query($connection, $query8);
            $query9_run = mysqli_query($connection, $query9);
            $query10_run = mysqli_query($connection, $query10);
            $query11_run = mysqli_query($connection, $query11);
            $query12_run = mysqli_query($connection, $query12);
            $query13_run = mysqli_query($connection, $query13);
            $query14_run = mysqli_query($connection, $query14);
            $query15_run = mysqli_query($connection, $query15);
            $query16_run = mysqli_query($connection, $query16);
            $query17_run = mysqli_query($connection, $query17);
            $query18_run = mysqli_query($connection, $query18);
            $query19_run = mysqli_query($connection, $query19);
            $query20_run = mysqli_query($connection, $query20);
            $query21_run = mysqli_query($connection, $query21);
            $query22_run = mysqli_query($connection, $query22);
            $query23_run = mysqli_query($connection, $query23);
            // $query24_run = mysqli_query($connection,$query24);
            $query25_run = mysqli_query($connection, $query25);
            $query26_run = mysqli_query($connection, $query26);
            $query27_run = mysqli_query($connection, $query27);
            $query28_run = mysqli_query($connection, $query28);
            $query29_run = mysqli_query($connection, $query29);
            $query30_run = mysqli_query($connection, $query30);
            $query31_run = mysqli_query($connection, $query31);
            $query32_run = mysqli_query($connection, $query32);
            $query33_run = mysqli_query($connection, $query33);
            $query34_run = mysqli_query($connection, $query34);
            $query35_run = mysqli_query($connection, $query35);
            $query36_run = mysqli_query($connection, $query36);
            $query37_run = mysqli_query($connection, $query37);
            $query38_run = mysqli_query($connection, $query38);
        }
    }
    if ($query38_run) {
        $_SESSION['success'] = "Course Deleted";
        header("Location: course.php?username=$username");
    } else {
        $_SESSION['status'] = "Course NOT Deleted";
        header("Location: course.php?username=$username");
    }
}
