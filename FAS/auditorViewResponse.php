<?php
    global $username,$courseID , $tea_username,$division;
    $courseID = $_GET['courseID'];
    $username = $_GET['username'];
    include 'validate.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/audTeaRes.css">
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
    <title>Faculty Audit System</title>
</head>

<body>

<!-- Navbar -->
<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div id="navbarCollapse" class="collapse navbar-collapse">
 
        <div class="navbarLeft">
        <a href="http://localhost/FAS/auditorHome.php?username=<?php echo $username; ?>"><img src="dylogo.png" style="width:10rem; height:4rem" ></a>
        </div>

        <div class="navbarCenter">
            <h4 style="font-weight:1000">Auditor-Response</h4>
        </div>

        <div class="navbarRight">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown" >
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size:1rem; font-weight:600"><?php echo $username;?></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="http://localhost/FAS/auditorHome.php?username=<?php echo $username; ?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>Home Page</a>
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

    <main>

        <form method="POST" style="background-color:white" action="auditorHome.php?username=<?php echo $username; ?>&courseID=<?php echo $courseID; ?>">

            <div class="ta" style="background-color:white">
                <table class="table2" cellspacing="0" style="text-align: left; margin:1rem auto; width:80%; color:black">
                    <tr>
                        <th> Sr.No.</th>
                        <th style="text-align:center"> Audit Observation Point </th>
                        <th style="text-align:center"> Is Document Uploaded ? </th>
                        <th style="text-align:center"> View Document </th>
                    </tr>
                    <tr>
                        <td> 1] </td>
                        <td>Defaulter list justified</td>
                        <td>
                            <table cellspacing="5">
                                <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];
                                $sql = "SELECT  `defaulter_list_fdbk` FROM `audit-i_response` WHERE courseID ='" . $courseId . "' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['defaulter_list_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </td>

                        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID; ?>&name=defaulterList"><input type='viewDoc' name='defaulterList' value='View' class="btn btn-success" style="padding:3px 0px; width:35%" readonly='readonly' /></a></td>

                    </tr>
                    <tr>
                        <td> 2] </td>
                        <td>LMS uploading status and usage by students</td>
                        <td>
                            <table cellspacing="5">
                                <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];
                                $sql = "SELECT `LMS_fdbk` FROM `audit-i_response` WHERE courseID ='" . $courseId . "' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['LMS_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </td>

                        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID; ?>&name=lms"><input type="viewDoc" name="lms" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly='readonly'></input></a></td>

                    </tr>
                    <tr>
                        <td> 3] </td>
                        <td> DCF and its consistency with course file contents</td>
                        <td>
                            <table cellspacing="5">
                                <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];
                                $sql = "SELECT  `DCF_fdbk` FROM `audit-i_response` WHERE courseID ='" . $courseId . "' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['DCF_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </td>

                        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID; ?>&name=dcf"><input type="viewDoc" name="dcf" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly='readonly'></input></a></td>

                    </tr>
                    <tr>
                        <td> 4] </td>
                        <td>E-attendance & consistency with course coverage & other subject teachers</td>
                        <td>
                            <table cellspacing="5">
                                <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];;
                                $sql = "SELECT `e-attendance_fdbk` FROM `audit-i_response` WHERE courseID ='" . $courseId . "' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                               " . $result['e-attendance_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </td>

                        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID; ?>&name=eAttendance"><input type="viewDoc" name="eAttendance" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly='readonly'></input></a></td>

                    </tr>
                    <tr>
                        <td> 5] </td>
                        <td>Syllabus coverage and its consistency with the number of classes allocated</td>
                        <td>
                            <table cellspacing="5">
                                <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];;
                                $sql = "SELECT  `syllabus_coverage_fdbk` FROM `audit-i_response` WHERE courseID ='" . $courseId . "' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['syllabus_coverage_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </td>

                        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID; ?>&name=syllabusCoverage"><input type="viewDoc" name="syllabusCoverage" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly='readonly'></input></a></td>

                    </tr>
                    <tr>
                        <td> 6] </td>
                        <td>Identifying and remembering best and weak students and action taken thereafter</td>
                        <td>
                            <table cellspacing="5">
                                <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];;
                                $sql = "SELECT  `identify_students_fdbk` FROM `audit-i_response` WHERE courseID ='" . $courseId . "' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['identify_students_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </td>
                        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID; ?>&name=identifyStudents"><input type="viewDoc" name="identifyStudents" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly='readonly'></input></a></td>

                    </tr>
                    <tr>
                        <td> 7] </td>
                        <td>Continuous evaluation in labs</td>
                        <td>
                            <table cellspacing="5">
                                <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];;
                                $sql = "SELECT  `evaluation_labs_fdbk`FROM `audit-i_response` WHERE courseID ='" . $courseId . "' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['evaluation_labs_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </td>
                        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID; ?>&name=evaluationLabs"><input type="viewDoc" name="evaluationLabs" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly='readonly'></input></a></td>

                    </tr>
                    <tr>
                        <td> 8] </td>
                        <td>Workshops/ expert lecture conduction</td>
                        <td>
                            <table cellspacing="5">
                                <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];;
                                $sql = "SELECT   `workshop_conduction_fdbk` FROM `audit-i_response` WHERE courseID ='" . $courseId . "' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['workshop_conduction_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </td>
                        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID; ?>&name=workshopConduction"><input type="viewDoc" name="workshopConduction" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly='readonly'></input></a></td>

                    </tr>
                    <tr>
                        <td> 9] </td>
                        <td>EPI performance of previous end sem and current semester exams with peers</td>
                        <td>
                            <table cellspacing="5">
                                <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];;
                                $sql = "SELECT  `EPI_fdbk` FROM `audit-i_response` WHERE courseID ='" . $courseId . "' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['EPI_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </td>
                        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID; ?>&name=epi"><input type="viewDoc" name="epi" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly='readonly'></input></a></td>

                    </tr>
                    <tr>
                        <td> 10] </td>
                        <td>Sample copies of evaluation components and their marking</td>
                        <td>
                            <table cellspacing="5">
                                <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];;
                                $sql = "SELECT  `sample_copies_fdbk` FROM `audit-i_response` WHERE courseID ='" . $courseId . "' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                               " . $result['sample_copies_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </td>
                        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID; ?>&name=sampleCopies"><input type="viewDoc" name="sampleCopies" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly='readonly'></input></a></td>
                    </tr>
                    <tr>
                        <td> 11] </td>
                        <td>ICT activities in class room along with proofs</td>
                        <td>
                            <table cellspacing="5">
                                <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];;
                                $sql = "SELECT `ICT_fdbk` FROM `audit-i_response` WHERE courseID ='" . $courseId . "' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['ICT_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </td>

                        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID; ?>&name=ict"><input type="viewDoc" name="ict" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly='readonly'></input></a></td>

                    </tr>
                    <tr>
                        <td> 12] </td>
                        <td>Smart board usage and proofs</td>
                        <td>
                            <table cellspacing="5">
                                <?php include "backend/include/conn.php";
                                $courseId = $_GET['courseID'];;
                                $sql = "SELECT  `smart_board_fdbk` FROM `audit-i_response` WHERE courseID ='" . $courseId . "' ";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    while ($result = mysqli_fetch_assoc($data)) {
                                        echo "
                                " . $result['smart_board_fdbk'] . "";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </td>

                        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID; ?>&name=smartBoard"><input type="viewDoc" name="smartBoard" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly='readonly'></input></a></td>

                    </tr>
                </table>
            </div>

            <div class="div1" style="text-align:center">SUGGESTION GIVEN TO TEACHER</div>

            <div class="Feedback">
                <table cellspacing="5">
                    <?php include "backend/include/conn.php";
                    $courseID = $_GET['courseID'];
                    $sql = "SELECT `finalSugg_fdbk` FROM `audit-i_response` where courseID ='" . $courseID . "' ";
                    $result = $conn->query($sql);
                    $data = mysqli_query($conn, $sql);
                    $total = mysqli_num_rows($data);
                    if ($total != 0) {
                        while ($result = mysqli_fetch_assoc($data)) {
                            echo "
                                <tr>Final Suggestion: " . $result['finalSugg_fdbk'] . "</tr>
                                <br><br>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </table>




                <input type="submit" name="submit" value="Back To Homepage" style="padding:6px 0px; margin:0px auto 1rem; width: 15%" class="btn btn-success" />
            </div>
            </div>

        </form>

    </main>
<!-- js for bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>