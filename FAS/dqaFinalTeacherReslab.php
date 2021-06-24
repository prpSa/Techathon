<?php
    global $username,$courseID , $tea_username,$division;
    $username = $_GET['username']; 
    $courseID = $_GET['courseID'];
    include 'validate.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="stylesheet" type="text/css" href="css/dqaFinalTeacherRes.css">
    <!-- Font Awesome  -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap css  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- js for file and bootstrap  -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <title>Faculty Audit System</title>
</head>

<body>


<!-- Navbar -->
<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div id="navbarCollapse" class="collapse navbar-collapse">
 
        <div class="navbarLeft">
        <a href="http://localhost/FAS/dqahomelab.php?username=<?php echo $username; ?>"><img src="dylogo.png" style="width:10rem; height:4rem" ></a>
        </div>

        <div class="navbarCenter">
            <h4 style="font-weight:1000">Lab Teacher Response</h4>
        </div>

        <div class="navbarRight">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown" >
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size:1rem; font-weight:600"><?php echo $username;?></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="http://localhost/FAS/dqahomelab.php?username=<?php echo $username; ?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>Home Page</a>
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

    <form action="http://localhost/FAS/dqahomelab.php?username=<?php echo $username; ?>" method="post">
        <main>


            <!-- ###########################################################################################################
                                            COURSE DETAILS
########################################################################################################### -->


            <div class="div1">Lab Details:</div>
            <div class="leftDisplayBox" style="margin:0px auto; overflow:auto; max-height:550px">
                <table class="table table-bordered" style="text-align: left; margin:1rem auto; width:28%">
                    <?php
                    include "backend/include/conn.php";
                    $courseID = $_GET['courseID'];
                    $sql = "select fromAcadYr,toAcadYr ,sem,subjectCode,courseName,credits,lectHr,totLectHr from coursel where courseID ='" . $courseID . "' ";
                    $result = $conn->query($sql);
                    $data = mysqli_query($conn, $sql);
                    $total = mysqli_num_rows($data);
                    if ($total != 0) {
                        // output data of each row
                        while ($result = mysqli_fetch_assoc($data)) {
                            echo "
                                <tr><td>fromAcadYr</td><td>" . $result['fromAcadYr'] . "</td></tr>
                                <tr><td>toAcadYr</td><td>" . $result['toAcadYr'] . "</td></tr>
                                <tr><td>sem</td><td>" . $result['sem'] . "</td></tr>
                                <tr><td>subjectCode</td><td>" . $result['subjectCode'] . "</td></tr>
                                <tr><td>courseName</td><td>" . $result['courseName'] . "</td></tr>
                                <tr><td>credits</td><td>" . $result['credits'] . "</td></tr>
                                <tr><td>lectHr</td><td>" . $result['lectHr'] . "</td></tr>
                                <tr><td>totLectHr</td><td>" . $result['totLectHr'] . "</td></tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </table>
            </div>





            <!-- ###########################################################################################################
                                            COURSE OBJECTIVE
########################################################################################################### -->


            <div class="div1">Course Objective:</div>
            <div class="leftDisplayBox" style="margin:0px auto; overflow:auto; max-height:550px">
                <table class="table table-bordered" style="text-align: left; margin:1rem auto; width:70%">
                    <?php
                    include "backend/include/conn.php";
                    $courseID = $_GET['courseID'];
                    $sqlObj = "select objNo,objName from courseobjectivel where courseID ='" . $courseID . "' ";
                    $resultObj = $conn->query($sqlObj);
                    $dataObj = mysqli_query($conn, $sqlObj);
                    $totalObj = mysqli_num_rows($dataObj);
                    if ($totalObj != 0) {
                        // output data of each row
                        echo "<tr><td> objNo </td><td> objName </td></tr>";
                        while ($resultObj = mysqli_fetch_assoc($dataObj)) {
                            echo "<tr><td>" . $resultObj['objNo'] . "</td><td>" . $resultObj['objName'] . "</td></tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </table>
            </div>


            <!-- ###########################################################################################################
                                            COURSE OUTCOME
########################################################################################################### -->


            <div class="div1">Course Outcome:</div>
            <div class="leftDisplayBox" style="margin:0px auto; overflow:auto; max-height:550px">
                <table class="table table-bordered" style="text-align: left; margin:1rem auto; width:70%">
                    <?php
                    include "backend/include/conn.php";
                    $courseID = $_GET['courseID'];
                    $sqlC_out = "select CO_no ,CO_name  from courseoutcomel where courseID ='" . $courseID . "' ";
                    $resultC_out = $conn->query($sqlC_out);
                    $dataC_out = mysqli_query($conn, $sqlC_out);
                    $totalC_out = mysqli_num_rows($dataC_out);
                    echo "<tr><td> CO_no </td><td> CO_name </td></tr>";
                    if ($totalC_out != 0) {
                        // output data of each row
                        while ($resultC_out = mysqli_fetch_assoc($dataC_out)) {
                            echo "<tr><td>" . $resultC_out['CO_no'] . "</td><td>" . $resultC_out['CO_name'] . "</td></tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </table>
            </div>



            <!-- ###########################################################################################################
                                            PROGRAM OUTCOME
########################################################################################################### -->


            <div class="div1">PROGRAM OUTCOME</div>
            <div class="leftDisplayBox" style="margin:0px auto; overflow:auto; max-height:550px">
                <table class="table table-bordered" style="text-align: left; margin:1rem auto; width:85%">
                    <?php
                    include "backend/include/conn.php";
                    $courseID = $_GET['courseID'];
                    $sqlP_out = "select PO_no ,PO_title, PO_description from progoutcomesl where courseID ='" . $courseID . "' ";
                    $resultP_out = $conn->query($sqlP_out);
                    $dataP_out = mysqli_query($conn, $sqlP_out);
                    $totalP_out = mysqli_num_rows($dataP_out);
                    echo "<tr><td> PO_no </td><td> PO_title </td><td> PO_description </td></tr>";
                    if ($totalP_out != 0) {
                        // output data of each row
                        while ($resultP_out = mysqli_fetch_assoc($dataP_out)) {
                            echo "<tr><td>" . $resultP_out['PO_no'] . "</td><td>" . $resultP_out['PO_title'] . "</td><td>" . $resultP_out['PO_description'] . "</td></tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </table>
            </div>

            <!-- ###########################################################################################################
                                            CO PO MAPPING
########################################################################################################### -->


            <div class="div1">CO PO MAPPING</div>
            <div class="leftDisplayBox" style="margin:0px auto; overflow:auto; max-height:550px">
                <table class="table table-bordered" style="text-align: left; margin:1rem auto; width:35%">
                    <?php
                    include "backend/include/conn.php";
                    $courseID = $_GET['courseID'];
                    $totalCo = 0;
                    $totalPo = 0;

                    $sqlm_copo = "SELECT COUNT(PO_no) AS 'counter', PO_no FROM co_po_mappingl GROUP BY PO_no,courseID HAVING courseID ='" . $courseID . "' ";
                    $resultm_copo = $conn->query($sqlm_copo);
                    $datam_copo = mysqli_query($conn, $sqlm_copo);
                    $totalm_copo = mysqli_num_rows($datam_copo);

                    if ($totalm_copo != 0) {
                        echo "<tr><th>X</th>";
                        while ($resultm_copo = mysqli_fetch_assoc($datam_copo)) {
                            echo "<th>" . $resultm_copo['PO_no'] . "</th>";
                            $totalPo++;
                        }
                        echo "</tr>";
                    } else {
                        echo "0 results";
                    }


                    $sqlm_copo2 = "SELECT COUNT(CO_no) AS 'counter', CO_no FROM co_po_mappingl GROUP BY CO_no,courseID HAVING courseID ='" . $courseID . "' ";
                    $resultm_copo2 = $conn->query($sqlm_copo2);
                    $datam_copo2 = mysqli_query($conn, $sqlm_copo2);
                    $totalm_copo2 = mysqli_num_rows($datam_copo2);
                    if ($totalm_copo2 != 0) {
                        while ($resultm_copo2 = mysqli_fetch_assoc($datam_copo2)) {
                            $totalCo++;
                        }
                    } else {
                        echo "0 results";
                    }


                    for ($i = 1; $i <= $totalCo; $i++) {
                        $sqlm_copo4 = "SELECT rating FROM co_po_mappingl where CO_no = 'CO" . $i . "' AND courseID ='" . $courseID . "' ";
                        $resultm_copo4 = $conn->query($sqlm_copo4);
                        $datam_copo4 = mysqli_query($conn, $sqlm_copo4);
                        $totalm_copo4 = mysqli_num_rows($datam_copo4);

                        if ($totalm_copo4 != 0) {
                            echo "<tr><th>CO$i</th>";
                            while ($resultm_copo4 = mysqli_fetch_assoc($datam_copo4)) {
                                echo "<th>" . $resultm_copo4['rating'] . "</th>";
                            }
                            echo "</tr>";
                        } else {
                            echo "0 results";
                        }
                    }
                    $conn->close();
                    ?>

                </table>
            </div>

            <!-- ###########################################################################################################
                                        PROGRAM SPECIFIC OUTCOMES
########################################################################################################### -->


            <div class="div1">PROGRAM SPECIFIC OUTCOMES:</div>
            <div class="leftDisplayBox" style="margin:0px auto; overflow:auto; max-height:550px">
                <table class="table table-bordered" style="text-align: left; margin:1rem auto; width:70%">
                    <?php
                    include "backend/include/conn.php";
                    $courseID = $_GET['courseID'];
                    $sqlpsout = "select PSO_no,PSO_description from progspecificoutcomel where courseID ='" . $courseID . "' ";
                    $resultpsout = $conn->query($sqlpsout);
                    $datapsout = mysqli_query($conn, $sqlpsout);
                    $totalpsout = mysqli_num_rows($datapsout);
                    if ($totalpsout != 0) {
                        // output data of each row
                        while ($resultpsout = mysqli_fetch_assoc($datapsout)) {
                            echo "<tr><td>" . $resultpsout['PSO_no'] . "</td><td> " . $resultpsout['PSO_description'] . "</td></tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </table>
            </div>



            <!-- ###########################################################################################################
                                            CO PSO MAPPING
########################################################################################################### -->


            <div class="div1">CO PSO MAPPING:</div>
            <div class="leftDisplayBox" style="margin:0px auto; overflow:auto; max-height:550px">
                <table class="table table-bordered" style="text-align: left; margin:1rem auto; width:28%">
                    <?php
                    include "backend/include/conn.php";
                    $courseID = $_GET['courseID'];
                    $totalCos = 0;
                    $totalPso = 0;

                    $sqlm_copso = "SELECT COUNT(PSO_no) AS 'counter', PSO_no FROM co_pso_mappingl GROUP BY PSO_no,courseID HAVING courseID ='" . $courseID . "' ";
                    $resultm_copso = $conn->query($sqlm_copso);
                    $datam_copso = mysqli_query($conn, $sqlm_copso);
                    $totalm_copso = mysqli_num_rows($datam_copso);

                    if ($totalm_copo != 0) {
                        echo "<tr><th>X</th>";
                        while ($resultm_copso = mysqli_fetch_assoc($datam_copso)) {
                            echo "<th>" . $resultm_copso['PSO_no'] . "</th>";
                            $totalPso++;
                        }
                        echo "</tr>";
                    } else {
                        echo "0 results";
                    }


                    $sqlm_copso2 = "SELECT COUNT(CO_no) AS 'counter', CO_no FROM co_pso_mappingl GROUP BY CO_no,courseID HAVING courseID ='" . $courseID . "' ";
                    $resultm_copso2 = $conn->query($sqlm_copso2);
                    $datam_copso2 = mysqli_query($conn, $sqlm_copso2);
                    $totalm_copso2 = mysqli_num_rows($datam_copso2);
                    if ($totalm_copso2 != 0) {
                        while ($resultm_copso2 = mysqli_fetch_assoc($datam_copso2)) {
                            $totalCos++;
                        }
                    } else {
                        echo "0 results";
                    }


                    for ($i = 1; $i <= $totalCos; $i++) {
                        $sqlm_copso4 = "SELECT rating FROM co_pso_mappingl where CO_no = 'CO" . $i . "' AND courseID ='" . $courseID . "' ";
                        $resultm_copso4 = $conn->query($sqlm_copso4);
                        $datam_copso4 = mysqli_query($conn, $sqlm_copso4);
                        $totalm_copso4 = mysqli_num_rows($datam_copso4);

                        if ($totalm_copso4 != 0) {
                            echo "<tr><th>CO$i</th>";
                            while ($resultm_copso4 = mysqli_fetch_assoc($datam_copso4)) {
                                echo "<th>" . $resultm_copso4['rating'] . "</th>";
                            }
                            echo "</tr>";
                        } else {
                            echo "0 results";
                        }
                    }
                    $conn->close();
                    ?>

                </table>
            </div>



            <!-- ###########################################################################################################
                                            CO WEIGHTAGE
########################################################################################################### -->


            <div class="div1">CO WEIGHTAGE</div>
            <div class="leftDisplayBox" style="margin:0px auto; overflow:auto; max-height:550px">
                <table class="table table-bordered" style="text-align: left; margin:1rem auto; width:30%">
                    <?php
                    include "backend/include/conn.php";
                    $courseID = $_GET['courseID'];
                    $sqlpsout = "select CO_no, noOfExp, weightagePercent from courseoutcomel where courseID ='" . $courseID . "' ";
                    $resultpsout = $conn->query($sqlpsout);
                    $datapsout = mysqli_query($conn, $sqlpsout);
                    $totalpsout = mysqli_num_rows($datapsout);
                    if ($totalpsout != 0) {
                        // output data of each row
                        echo "<tr><td> CO_no </td><td> noOfExp  </td><td> weightagePercent </td></tr>";
                        while ($resultpsout = mysqli_fetch_assoc($datapsout)) {
                            echo "<tr><td>" . $resultpsout['CO_no'] . "</td><td>" . $resultpsout['noOfExp'] .  "</td><td>" . $resultpsout['weightagePercent'] . "</td></tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </table>
            </div>


            <!-- ###########################################################################################################
                                            EXPERIMENT LIST
########################################################################################################### -->

            <div class="div1">EXPERIMENT LIST</div>
            <div class="leftDisplayBox" style="margin:0px auto; overflow:auto; max-height:550px">
                <table class="table table-bordered" style="text-align: left; margin:1rem auto; width:70%">
                    <?php
                    include "backend/include/conn.php";
                    $sqlpsout = "select * from experimentlist where courseID ='" . $courseID . "' ";
                    $resultpsout = $conn->query($sqlpsout);
                    $datapsout = mysqli_query($conn, $sqlpsout);
                    $totalpsout = mysqli_num_rows($datapsout);
                    echo "<tr>
                <th>expNo</th>
                <th>CO_no_expLi</th>
                <th>expNames</th>
                <th>weightage</th>
            </tr>";
                    if ($totalpsout != 0) {
                        // output data of each row
                        while ($resultpsout = mysqli_fetch_assoc($datapsout)) {
                            echo "<tr><td>" . $resultpsout['expNo'] . "</td><td>" . $resultpsout['CO_no'] . "</td><td>" . $resultpsout['expName'] . "</td><td>" . $resultpsout['weight'] . "</td></tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </table>
            </div>

            <!-- ###########################################################################################################
                                            ASSESMENT METHOD
########################################################################################################### -->

            <div class="div1">ASSESMENT METHOD</div>
            <div class="leftDisplayBox" style="margin:0px auto; overflow:auto; max-height:550px">
                <table class="table table-bordered" style="text-align: left; margin:1rem auto; width:50%">
                    <?php
                    include "backend/include/conn.php";
                    $courseID = $_GET['courseID'];
                    echo "<tr><td></td>";
                    for ($j = 1; $j <= 6; $j++) {
                        echo "<th>CO$j</th>";
                    }
                    echo "</tr>";
                    for ($i = 1; $i <= 3; $i++) {
                        echo "<th>Assignment$i</th>";
                        for ($j = 1; $j <= 6; $j++) {
                            $sqlm_am = "SELECT marks FROM assessmentmethod where `assignNo` = 'Assignment" . $i . "' AND `CO_no`= 'CO" . $j . "' AND courseID='" . $courseID . "' ";
                            $resultm_am = $conn->query($sqlm_am);
                            $datam_am = mysqli_query($conn, $sqlm_am);
                            $totalm_am = mysqli_num_rows($datam_am);
                            if ($totalm_am != 0) {
                                while ($resultm_am = mysqli_fetch_assoc($datam_am)) {
                                    echo "<td>" . $resultm_am['marks'] . "</td>";
                                }
                            }
                        }
                        echo "</tr>";
                    }
                    ?>

                </table>
            </div>



            <!-- ###########################################################################################################
                                            FINAL BOX
########################################################################################################### -->


            <!-- <div class="div1">Suggestion to DQA Team</div>
    <div class="Feedback">
            <p><input type="text" name="finalSugg" id="finalSugg"  style="font-size:1.5rem; margin-top:.8rem;" placeholder="Enter Response for Dqa Team " require ></p>
            <input type="submit" name="submit" value="Submit" class="button button2"/>
    </div> -->
    </form>
    <input type="submit" name="submit" value="Back to Homepage" style="margin:2rem 44% 1rem" class="btn btn-success"></input>

    </main>

<!-- js for bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>