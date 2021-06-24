<?php
    global $username,$courseID , $tea_username,$division;
    $username = $_GET['username']; 
    include 'validate.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/auditorObservation.css">
    <!-- Font Awesome  -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap css  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- js for file and bootstrap  -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <title>Aud Obs II</title>
</head>

<body>

    <?php
    include "backend/include/conn.php";
    if (isset($_POST['submit'])) {
        $username = $_GET['username'];

        $courseID = $_GET['courseID'];
        $prerequisite = file_get_contents($_FILES['file1']['tmp_name']);
        $documentsVerified = file_get_contents($_FILES['file2']['tmp_name']);
        $defaulter_list = file_get_contents($_FILES['file3']['tmp_name']);
        $LMS = file_get_contents($_FILES['file4']['tmp_name']);
        $DCF = file_get_contents($_FILES['file5']['tmp_name']);
        $e_attendance = file_get_contents($_FILES['file6']['tmp_name']);
        $syllabus_coverage = file_get_contents($_FILES['file7']['tmp_name']);
        $workshop_conduction = file_get_contents($_FILES['file8']['tmp_name']);
        $booksReferred = file_get_contents($_FILES['file9']['tmp_name']);
        $identify_students = file_get_contents($_FILES['file10']['tmp_name']);
        $evaluation_labs = file_get_contents($_FILES['file11']['tmp_name']);
        $additionalExperiments = file_get_contents($_FILES['file12']['tmp_name']);

        $extension = $_FILES['file1']['type'];


        $teaTyp = 'subTea';
        $audType = 'aud2';
        $EPI = NULL;
        $sample_copies = NULL;
        $smartBoard = NULL;
        $ict = NULL;

        $stmt = $dbh->prepare("UPDATE `audobservation` SET `prerequisite`=?,`documentsVerified`=?,`defaulterList`=?,`lms`=?,`dcf`=?,`eAttendance`=?,`syllabusCoverage`=?,`workshopConduction`=?,`booksReferred`=?,`identifyStudents`=?,`evaluationLabs`=?,`additionalExperiments`=?,`epi`=?,`sampleCopies`=?,`ict`=?,`smartBoard`=?,`extension`=? WHERE `courseID`=? AND `audType`=? AND `teaRole`=?");




        $stmt->bindParam(1, $prerequisite);
        $stmt->bindParam(2, $documentsVerified);
        $stmt->bindParam(3, $defaulter_list);
        $stmt->bindParam(4, $LMS);
        $stmt->bindParam(5, $DCF);
        $stmt->bindParam(6, $e_attendance);
        $stmt->bindParam(7, $syllabus_coverage);
        $stmt->bindParam(8, $workshop_conduction);
        $stmt->bindParam(9, $booksReferred);
        $stmt->bindParam(10, $identify_students);
        $stmt->bindParam(11, $evaluation_labs);
        $stmt->bindParam(12, $additionalExperiments);
        $stmt->bindParam(13, $EPI);
        $stmt->bindParam(14, $sample_copies);
        $stmt->bindParam(15, $ict);
        $stmt->bindParam(16, $smartBoard);
        $stmt->bindParam(17, $extension);
        $stmt->bindParam(18, $courseID);
        $stmt->bindParam(19, $audType);
        $stmt->bindParam(20, $teaTyp);
        $stmt->execute();
        include "backend/include/conn.php";

        $hodhome_updatee = "UPDATE `hodhomee` SET `teacherIntII`='submitted' WHERE courseID = '$courseID' AND teaType='subTea' AND aud2='aud2' ";
        $query = mysqli_query($conn, $hodhome_updatee);


        if ($stmt == TRUE) {
    ?>
            <script type="text/javascript">
                alert("ThankYou for Your Response");
            </script>
    <?php

            header('Location: http://localhost/FAS/subjectTeacherHome.php?username=' . $username . '');
            exit;
        }
    }
    ?>



<!-- Navbar -->
<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div id="navbarCollapse" class="collapse navbar-collapse">
 
        <div class="navbarLeft">
        <a href="http://localhost/FAS/auditorHome.php?username=<?php echo $username; ?>"><img src="dylogo.png" style="width:10rem; height:4rem" ></a>
        </div>

        <div class="navbarCenter">
            <h4 style="font-weight:1000">Upload Form</h4>
        </div>

        <div class="navbarRight">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown" >
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size:1rem; font-weight:600"><?php echo $username;?></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="http://localhost/FAS/auditorHome.php?username=<?php echo $username; ?>" class="dropdown-item" style="font-size:1rem; font-weight:600">Main Audit</a>
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
                    </tr>
                    <tr>
                        <td> 1] </td>
                        <td>Prerequisite test performance of students and thereafter action taken </td>
                        <td><input type="file" name="file1" accept="application/pdf" /></td>
                    </tr>
                    <tr>
                        <td> 2] </td>
                        <td>All documents verified and certified in course file</td>
                        <td><input type="file" name="file2" accept="application/pdf" /></td>
                    </tr>
                    <tr>
                        <td> 3] </td>
                        <td>Defaulter list justified</td>
                        <td><input type="file" name="file3" accept="application/pdf" /></td>
                    </tr>
                    <tr>
                        <td> 4] </td>
                        <td>LMS uploading status and usage by students</td>
                        <td><input type="file" name="file4" accept="application/pdf" /></td>
                    </tr>
                    <tr>
                        <td> 5] </td>
                        <td> DCF and its consistency with course file contents</td>
                        <td><input type="file" name="file5" accept="application/pdf" /></a>
                        </td>
                    </tr>
                    <tr>
                        <td> 6] </td>
                        <td>E-attendance & consistency with course coverage & other subject teachers</td>
                        <td><input type="file" name="file6" accept="application/pdf" /></a>
                        </td>

                    </tr>
                    <tr>
                        <td> 7] </td>
                        <td>Syllabus coverage and its consistency with the number of classes allocated</td>
                        <td><input type="file" name="file7" accept="application/pdf" /></a>
                        </td>
                    </tr>
                    <tr>
                        <td> 8] </td>
                        <td>Workshops/ expert lecture planning and conduction</td>
                        <td><input type="file" name="file8" accept="application/pdf" /></a></td>
                    </tr>
                    <tr>
                        <td> 9] </td>
                        <td>Books referred to teach the course</td>
                        <td><input type="file" name="file9" accept="application/pdf" /></a></td>
                    </tr>
                    <tr>
                        <td> 10] </td>
                        <td>Identifying and remembering best and weak students and action taken thereafter</td>
                        <td><input type="file" name="file10" accept="application/pdf" /></a>
                        </td>
                    </tr>
                    <tr>
                        <td> 11] </td>
                        <td>Continuous evaluation in labs</td>
                        <td><input type="file" name="file11" accept="application/pdf" /></a></td>
                    </tr>
                    <tr>
                        <td> 12] </td>
                        <td>Additional experiments/Mini Projects</td>
                        <td><input type="file" name="file12" accept="application/pdf" /></a></td>
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