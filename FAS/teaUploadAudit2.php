<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/auditorObservation.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <title>Aud Obs II</title>
</head>

<body>
    <?php
    include 'validate.php';
    $username = $_GET['username'];
    include "backend/include/conn.php";
    $courseID = $_GET['courseID'];
    $tea_username = $_GET['username'];
    $division = $_GET['division'];
    if (isset($_POST['submit'])) {

        $username = $_GET['username'];
        $courseID = $_GET['courseID'];
        $tea_username = $_GET['username'];
        $prerequisite = file_get_contents($_FILES['file1']['tmp_name']);
        $documentsVerified = file_get_contents($_FILES['file2']['tmp_name']);
        $defaulterList = file_get_contents($_FILES['file3']['tmp_name']);
        $lms = file_get_contents($_FILES['file4']['tmp_name']);
        $dcf = file_get_contents($_FILES['file5']['tmp_name']);
        $eAttendance = file_get_contents($_FILES['file6']['tmp_name']);
        $syllabusCoverage = file_get_contents($_FILES['file7']['tmp_name']);
        $workshopConduction = file_get_contents($_FILES['file8']['tmp_name']);
        $booksReferred = file_get_contents($_FILES['file9']['tmp_name']);
        $identifyStudents = file_get_contents($_FILES['file10']['tmp_name']);
        $evaluationLabs = file_get_contents($_FILES['file11']['tmp_name']);
        $additionalExperiments = file_get_contents($_FILES['file12']['tmp_name']);
        $extension = $_FILES['file1']['type'];

        $teaTyp = 'subTea';
        $audType = 'aud2';
        $epi = NULL;
        $sampleCopies = NULL;
        $smartBoard = NULL;
        $ict = NULL;

        function query($a,$b){
            global $stmt, $dbh,$extension,$courseID,$tea_username,$audType;
            $stmt = $dbh->prepare("UPDATE `audit_docs` SET `$a`=?,`extension`=? WHERE `courseID`=? AND `tea_username`=? AND `audType`=? ");
            $stmt->bindParam(1, $b);
            $stmt->bindParam(2, $extension);
            $stmt->bindParam(3, $courseID);
            $stmt->bindParam(4, $tea_username);
            $stmt->bindParam(5, $audType);
            $stmt->execute();
        }

        if($prerequisite != NULL){ query('prerequisite', $prerequisite); }
        if($documentsVerified != NULL){ query('documentsVerified', $documentsVerified); }
        if($defaulterList != NULL){ query('defaulterList', $defaulterList); }
        if($lms != NULL){ query('lms', $lms); }
        if($dcf != NULL){ query('dcf', $dcf); }
        if($eAttendance != NULL){ query('eAttendance', $eAttendance); }
        if($syllabusCoverage != NULL){ query('syllabusCoverage', $syllabusCoverage); }
        if($workshopConduction != NULL){ query('workshopConduction', $workshopConduction); }
        if($booksReferred != NULL){ query('booksReferred', $booksReferred); }
        if($identifyStudents != NULL){ query('identifyStudents', $identifyStudents); }
        if($evaluationLabs != NULL){ query('evaluationLabs', $evaluationLabs); }
        if($additionalExperiments != NULL){ query('additionalExperiments', $additionalExperiments); }
        if($epi != NULL){ query('epi', $epi); }
        if($sampleCopies != NULL){ query('sampleCopies', $sampleCopies); }
        if($ict != NULL){ query('ict', $ict); }
        if($smartBoard != NULL){ query('smartBoard', $smartBoard); }



        // $stmt = $dbh->prepare("UPDATE `audit_docs` SET `prerequisite`=?,`documentsVerified`=?,`defaulterList`=?,`lms`=?,`dcf`=?,`eAttendance`=?,`syllabusCoverage`=?,`workshopConduction`=?,`booksReferred`=?,`identifyStudents`=?,`evaluationLabs`=?,`additionalExperiments`=?,`epi`=?,`sampleCopies`=?,`ict`=?,`smartBoard`=?,`extension`=? WHERE `courseID`=? AND `tea_username`=? AND `audType`=? ");
        // $stmt->bindParam(1, $prerequisite);
        // $stmt->bindParam(2, $documentsVerified);
        // $stmt->bindParam(3, $defaulterList);
        // $stmt->bindParam(4, $lms);
        // $stmt->bindParam(5, $dcf);
        // $stmt->bindParam(6, $eAttendance);
        // $stmt->bindParam(7, $syllabusCoverage);
        // $stmt->bindParam(8, $workshopConduction);
        // $stmt->bindParam(9, $booksReferred);
        // $stmt->bindParam(10, $identifyStudents);
        // $stmt->bindParam(11, $evaluationLabs);
        // $stmt->bindParam(12, $additionalExperiments);
        // $stmt->bindParam(13, $epi);
        // $stmt->bindParam(14, $sampleCopies);
        // $stmt->bindParam(15, $ict);
        // $stmt->bindParam(16, $smartBoard);
        // $stmt->bindParam(17, $extension);
        // $stmt->bindParam(18, $courseID);
        // $stmt->bindParam(19, $tea_username);
        // $stmt->bindParam(20, $audType);
        // $stmt->execute();
        include "backend/include/conn.php";

        $hodhome_updatee = "UPDATE `hodhomee` SET `teacherIntII`='submitted' WHERE courseID = '$courseID' AND tea_username='$tea_username' AND audType='aud1' ";
        $query = mysqli_query($conn, $hodhome_updatee);


        if ($stmt == TRUE) {
            $username = $_GET['username'];
            $division = $_GET['division'];
                echo '<script type="text/javascript">'; 
                echo 'alert("ThankYou for Your Response");';  
                echo 'window.open("http://localhost/FAS/subjectTeacherHome.php?username='.$username.'&division='.$division.'","_self");';
                echo '</script>';
                exit;
        }
    }
    ?>
<!-- Navbar -->
<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div id="navbarCollapse" class="collapse navbar-collapse">
 
        <div class="navbarLeft">
        <a href="http://localhost/FAS/subjectTeacherHome.php?username=<?php echo $username; ?>"><img src="dylogo.png" style="width:10rem; height:4rem" ></a>
        </div>

        <div class="navbarCenter">
            <h4 style="font-weight:1000">Upload Form</h4>
        </div>

        <div class="navbarRight">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown" >
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size:1rem; font-weight:600"><?php echo $username;?></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="http://localhost/FAS/fasprofile/profile.php?username=<?php echo $username; ?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i>Profile</a>
                        <a href="contactus.php?username=<?php echo $username;?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-question-circle fa-sm fa-fw mr-2 text-gray-400"></i>Query</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="http://localhost/FAS/login.php" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                    </div>
                </li>
            </ul>
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size:30px">×</span>
                        </button>
                    </div>

                    
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a href="http://localhost/FAS/destroy.php"> <button name="logout_btn" class="btn btn-primary">Logout</button> </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </nav>
</div>

















    <main style="color:black">
        <form method="POST" enctype="multipart/form-data" style="background-color:white">
            <div class="table1" style="background-color:white">
                <table class="table2" cellspacing="0" style="text-align: left; margin:1rem auto; width:80%; color:black">
                    <tr>
                        <th style="text-align:center">Sr.No.</th>
                        <th style="text-align:center">Audit Observation Point</th>
                        <th style="text-align:center">Upload Document</th>
                        <th style="text-align:center">Verification Status</th>
                        <th style="text-align:center">View Document</th>

                    </tr>
                    <tr>
                        <td> 1] </td>
                        <td>Prerequisite test performance of students and thereafter action taken </td>
                        <td><input type="file" name="file1" id="file1" accept="application/pdf" /></td>
                        <td id="1"> <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];
                                $username = $_GET['username'];
                                $division = $_GET['division'];
                                $sql = "SELECT  `prerequisite_fdbk` FROM `audit_res` WHERE courseID ='" . $courseId . "' AND  division='$division' AND audType='aud2' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['prerequisite_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?></td>
                        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=prerequisite"><input type='viewDoc' name='prerequisite' value='View' class="btn btn-success" style="padding:3px 5px; width:60%" readonly='readonly'/></a></td> 
                    </tr>
                    <script>
                                if((document.getElementById("1").innerText)=='yes'){
                                    document.getElementById("file1").disabled = true;
                                };
                                </script>
                    <tr>
                        <td> 2] </td>
                        <td>All documents verified and certified in course file</td>
                        <td><input type="file" name="file2" id="file2" accept="application/pdf" /></td>
                        <td id="2"> <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];
                                $username = $_GET['username'];
                                $division = $_GET['division'];
                                $sql = "SELECT `documentsVerified_fdbk` FROM `audit_res` WHERE courseID ='" . $courseId . "' AND  division='$division' AND audType='aud2' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['documentsVerified_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?></td>
                                 <script>
                                if((document.getElementById("2").innerText)=='yes'){
                                    document.getElementById("file2").disabled = true;
                                };
                                </script>
                        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=documentsVerified"><input type='viewDoc' name='documentsVerified'style="padding:3px 5px; width:60%" value='View' class="btn btn-success" readonly='readonly'/></a></td> 
                    </tr>
                    <tr>
                        <td> 3] </td>
                        <td>Defaulter list justified</td>
                        <td><input type="file" name="file3" id="file3" accept="application/pdf" /></td>
                        <td id="3"><?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];
                                $username = $_GET['username'];
                                $division = $_GET['division'];
                                $sql = "SELECT  `defaulterList_fdbk` FROM `audit_res` WHERE courseID ='" . $courseId . "' AND  division='$division' AND audType='aud2' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['defaulterList_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?></td>
                                 <script>
                                if((document.getElementById("3").innerText)=='yes'){
                                    document.getElementById("file3").disabled = true;
                                };
                                </script>
                        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=defaulterList"><input type='viewDoc' name='defaulterList' value='View' class="btn btn-success" style="padding:3px 5px; width:60%" readonly='readonly'/></a></td>   
                    </tr>
                    <tr>
                        <td> 4] </td>
                        <td>LMS uploading status and usage by students</td>
                        <td><input type="file" name="file4" id="file4" accept="application/pdf" /></td>
                        <td id="4"> <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];
                                $username = $_GET['username'];
                                $division = $_GET['division'];
                                $sql = "SELECT `lms_fdbk` FROM `audit_res` WHERE courseID ='" . $courseId . "' AND  division='$division' AND audType='aud2' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                               " . $result['lms_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?></td>
                                 <script>
                                if((document.getElementById("4").innerText)=='yes'){
                                    document.getElementById("file4").disabled = true;
                                };
                                </script>
                        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=lms"><input type="viewDoc" name="lms" value="View" class="btn btn-success" style="padding:3px 5px; width:60%" readonly='readonly'></input></a></td> 
                    </tr>
                    <tr>
                        <td> 5] </td>
                        <td> DCF and its consistency with course file contents</td>
                        <td><input type="file" name="file5" id="file5" accept="application/pdf" /></a>
                        </td>
                        <td id="5"> <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];
                                $username = $_GET['username'];
                                $division = $_GET['division'];
                                $sql = "SELECT  `dcf_fdbk` FROM `audit_res` WHERE courseID ='" . $courseId . "' AND  division='$division' AND audType='aud2' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['dcf_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?></td>
                                 <script>
                                if((document.getElementById("5").innerText)=='yes'){
                                    document.getElementById("file5").disabled = true;
                                };
                                </script>
                        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=dcf"><input type="viewDoc" name="dcf" value="View" class="btn btn-success"  style="padding:3px 5px; width:60%" readonly='readonly'></input></a></td>   
                    </tr>
                    <tr>
                        <td> 6] </td>
                        <td>E-attendance & consistency with course coverage & other subject teachers</td>
                        <td><input type="file" name="file6" id="file6" accept="application/pdf" /></a>
                        </td>
                        <td id="6"> <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];
                                $username = $_GET['username'];
                                $division = $_GET['division'];
                                $sql = "SELECT  `eAttendance_fdbk` FROM `audit_res` WHERE courseID ='" . $courseId . "' AND  division='$division' AND audType='aud2' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['eAttendance_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?></td>
                                 <script>
                                if((document.getElementById("6").innerText)=='yes'){
                                    document.getElementById("file6").disabled = true;
                                };
                                </script>
                        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=eAttendance"><input type="viewDoc" name="eAttendance" value="View" class="btn btn-success" style="padding:3px 5px; width:60%" readonly='readonly'></input></a></td>   

                    </tr>
                    <tr>
                        <td> 7] </td>
                        <td>Syllabus coverage and its consistency with the number of classes allocated</td>
                        <td><input type="file" name="file7" id="file7" accept="application/pdf" /></a>
                        </td>
                        <td id="7"><?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];
                                $username = $_GET['username'];
                                $division = $_GET['division'];
                                $sql = "SELECT  `syllabusCoverage_fdbk`FROM `audit_res` WHERE courseID ='" . $courseId . "' AND  division='$division' AND audType='aud2' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['syllabusCoverage_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?></td>
                                 <script>
                                if((document.getElementById("7").innerText)=='yes'){
                                    document.getElementById("file7").disabled = true;
                                };
                                </script>
                        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=syllabusCoverage"><input type="viewDoc" name="syllabusCoverage" value="View" class="btn btn-success" style="padding:3px 5px; width:60%"readonly='readonly'></input></a></td>

                    </tr>
                    <tr>
                        <td> 8] </td>
                        <td>Workshops/ expert lecture planning and conduction</td>
                        <td><input type="file" name="file8" id="file8" accept="application/pdf" /></a></td>
                        <td id="8">  <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];
                                $username = $_GET['username'];
                                $division = $_GET['division'];
                                $sql = "SELECT   `workshopConduction_fdbk` FROM `audit_res` WHERE courseID ='" . $courseId . "' AND  division='$division' AND audType='aud2' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['workshopConduction_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?></td>
                                 <script>
                                if((document.getElementById("8").innerText)=='yes'){
                                    document.getElementById("file8").disabled = true;
                                };
                                </script>
                        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=workshopConduction"><input type="viewDoc" name="workshopConduction" value="View" class="btn btn-success" style="padding:3px 5px; width:60%" readonly='readonly'></input></a></td>  
                    </tr>
                    <tr>
                        <td> 9] </td>
                        <td>Books referred to teach the course</td>
                        <td><input type="file" name="file9" id="file9" accept="application/pdf" /></a></td>
                        <td id="9"> <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];
                                $username = $_GET['username'];
                                $division = $_GET['division'];
                                $sql = "SELECT  `booksReferred_fdbk` FROM `audit_res` WHERE courseID ='" . $courseId . "' AND  division='$division' AND audType='aud2' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['booksReferred_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?></td>
                                 <script>
                                if((document.getElementById("9").innerText)=='yes'){
                                    document.getElementById("file9").disabled = true;
                                };
                                </script>
                        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=workshopConduction"><input type="viewDoc" name="workshopConduction" value="View" class="btn btn-success" style="padding:3px 5px; width:60%"  readonly='readonly'></input></a></td>  
                    </tr>
                    <tr>
                        <td> 10] </td>
                        <td>Identifying and remembering best and weak students and action taken thereafter</td>
                        <td><input type="file" name="file10" id="file10" accept="application/pdf" /></a>
                        </td>
                        <td id="10"> <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];
                                $username = $_GET['username'];
                                $division = $_GET['division'];
                                $sql = "SELECT  `identifyStudents_fdbk` FROM `audit_res` WHERE courseID ='" . $courseId . "' AND  division='$division' AND audType='aud2' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                               " . $result['identifyStudents_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?></td>
                                 <script>
                                if((document.getElementById("10").innerText)=='yes'){
                                    document.getElementById("file10").disabled = true;
                                };
                                </script>
                        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=identifyStudents"><input type="viewDoc" name="identifyStudents" value="View" class="btn btn-success" style="padding:3px 5px; width:60%" readonly='readonly'></input></a></td>
                    </tr>
                    <tr>
                        <td> 11] </td>
                        <td>Continuous evaluation in labs</td>
                        <td><input type="file" name="file11" id="file11" accept="application/pdf" /></a></td>
                        <td id="11"> <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];
                                $username = $_GET['username'];
                                $division = $_GET['division'];
                                $sql = "SELECT `evaluationLabs_fdbk` FROM `audit_res` WHERE courseID ='" . $courseId . "' AND  division='$division' AND audType='aud2' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['evaluationLabs_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?></td>
                                 <script>
                                if((document.getElementById("11").innerText)=='yes'){
                                    document.getElementById("file11").disabled = true;
                                };
                                </script>
                        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=evaluationLabs"><input type="viewDoc" name="evaluationLabs" value="View" class="btn btn-success" style="padding:3px 3px; width:60%"readonly='readonly'></input></a></td>  
                    </tr>
                    <tr>
                        <td> 12] </td>
                        <td>Additional experiments/Mini Projects</td>
                        <td><input type="file" name="file12" id="file12" accept="application/pdf" /></a></td>
                        <td id="12"> <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];
                                $username = $_GET['username'];
                                $division = $_GET['division'];
                                $sql = "SELECT  `additionalExperiments_fdbk` FROM `audit_res` WHERE courseID ='" . $courseId . "' AND  division='$division' AND audType='aud2' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['additionalExperiments_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?></td>
                                 <script>
                                if((document.getElementById("12").innerText)=='yes'){
                                    document.getElementById("file12").disabled = true;
                                };
                                </script>
                        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=additionalExperiments"><input type="viewDoc" name="additionalExperiments" value="View" class="btn btn-success" style="padding:3px 5px; width:60%" readonly='readonly'></input></a></td>   
                    </tr>
                </table>
            </div>
            <div class="Submit" style=" margin:1rem auto; width:80%">Submit
            </div>
            <div class="Feedback">
                <button type="submit" name="submit" value="submit" class="btn btn-success">Submit Form</button>
            </div>
        </form>

    </main>

<!-- js for bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>