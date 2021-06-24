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
    <link rel="stylesheet" type="text/css" href="css/dqaTeam.css">
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
        <a href="http://localhost/FAS/dqahome.php?username=<?php echo $username; ?>"><img src="dylogo.png" style="width:10rem; height:4rem" ></a>
        </div>

        <div class="navbarCenter">
            <h4 style="font-weight:1000">DQA Lab FORM</h4>
        </div>

        <div class="navbarRight">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown" >
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size:1rem; font-weight:600"><?php echo $username;?></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="http://localhost/FAS/dqaHomelab.php?username=<?php echo $username; ?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>Home Page</a>
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


    <form action="backend/dqal.php?username=<?php echo $username; ?>&courseID=<?php echo $courseID; ?>" method="POST">
        <main>


<!-- ###########################################################################################################
                                            LAB DETAILS
########################################################################################################### -->


            <div class="div1">LAB DETAILS:</div>
            <div class="outerBox" style="display:flex; flex-direction: row;">
                <div class="leftDisplayBox" style="overflow:auto; max-height:550px;  width:70%">
                    <table class="table table-bordered" style="text-align: left; margin:2rem auto; width:28%">
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

                <div class="rightInputBox" style="width:25%">
                    <p style=" margin:.5rem; padding: 5px;">Suggestion Required?</p>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="cd" name="cd" value="yes">
                    <label for="cd">Yes</label>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="cd" name="cd" value="no">
                    <label for="cd">No</label><br>
                    <p><textarea type="text" name="cdSugg" id="cdSugg" style="font-size: 1.5rem; margin-top: .8rem; resize:none;" placeholder="Enter Suggestion if any"></textarea></p>
                </div>
            </div>



            <!-- ###########################################################################################################
                                            COURSE OBJECTIVE
########################################################################################################### -->


            <div class="div1">COURSE OBJECTIVE:</div>
            <div class="outerBox" style="display:flex; flex-direction: row;">
                <div class="leftDisplayBox" style="overflow:auto; max-height:550px;  width:70%">
                    <table class="table table-bordered" style="text-align: left; margin:2rem auto; width:70%">
                        <?php
                        include "backend/include/conn.php";
                        $sqlObj = "select objNo,objName from courseobjectivel where courseID ='" . $courseID . "' ";
                        $resultObj = $conn->query($sqlObj);
                        $dataObj = mysqli_query($conn, $sqlObj);
                        $totalObj = mysqli_num_rows($dataObj);
                        if ($totalObj != 0) {
                            // output data of each row
                            echo "<tr><th> objNo </th><th> objName </th></tr>";
                            while ($resultObj = mysqli_fetch_assoc($dataObj)) {
                                echo "<tr><td>" . $resultObj['objNo'] . "</td><td>" . $resultObj['objName'] . "</td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </table>
                </div>
                <div class="rightInputBox" style="width:25%">
                    <p style=" margin:.5rem; padding: 5px;">Suggestion Required?</p>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="courseObj" name="courseObj" value="yes">
                    <label for="courseObj">Yes</label>
                    &emsp;
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="courseObj" name="courseObj" value="no">
                    <label for="courseObj">No</label><br>
                    <p><textarea type="text" name="courseObjSugg" id="courseObjSugg" style="font-size: 1.5rem; margin-top:15px; resize:none;" placeholder="Enter Suggestion if any"></textarea></p>
                </div>
            </div>

            <!-- ###########################################################################################################
                                            COURSE OUTCOME
########################################################################################################### -->


            <div class="div1">COURSE OUTCOME:</div>
            <div class="outerBox" style="display:flex; flex-direction: row;">
                <div class="leftDisplayBox" style="overflow:auto; max-height:550px;  width:70%">
                    <table class="table table-bordered" style="text-align: left; margin:2rem auto; width:70%">
                        <?php
                        include "backend/include/conn.php";
                        $sqlC_out = "select CO_no ,CO_name  from courseoutcomel where courseID ='" . $courseID . "' ";
                        $resultC_out = $conn->query($sqlC_out);
                        $dataC_out = mysqli_query($conn, $sqlC_out);
                        $totalC_out = mysqli_num_rows($dataC_out);
                        echo "<tr><th> CO_no </th><th> CO_name </th></tr>";
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
                <div class="rightInputBox" style="width:25%">
                    <p style=" margin:.5rem; padding: 5px;">Suggestion Required?</p>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="courseOut" name="courseOut" value="yes">
                    <label for="courseOut">Yes</label>
                    &emsp;
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="courseOut" name="courseOut" value="no">
                    <label for="courseOut">No</label><br>
                    <p><textarea type="text" name="courseOutSugg" id="courseOutSugg" style="font-size: 1.5rem; margin-top: .8rem; resize:none;" placeholder="Enter Suggestion if any"></textarea></p>
                </div>
            </div>


            <!-- ###########################################################################################################
                                            PROGRAM OUTCOME
########################################################################################################### -->


            <div class="div1">PROGRAM OUTCOME</div>
            <div class="outerBox" style="display:flex; flex-direction: row;">
                <div class="leftDisplayBox" style="overflow:auto; max-height:550px;  width:70%">
                    <table class="table table-bordered" style="text-align: left; margin:2rem auto; width:85%">
                        <?php
                        include "backend/include/conn.php";
                        $sqlP_out = "select PO_no ,PO_title, PO_description  from progoutcomesl where courseID ='" . $courseID . "' ";
                        $resultP_out = $conn->query($sqlP_out);
                        $dataP_out = mysqli_query($conn, $sqlP_out);
                        $totalP_out = mysqli_num_rows($dataP_out);
                        echo "<tr><th> PO_no </th><th> PO_title </th><th> PO_description </th></tr>";
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
                <div class="rightInputBox" style="width:25%">
                    <p style=" margin:.5rem; padding: 5px;">Suggestion Required?</p>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="progOut" name="progOut" value="yes">
                    <label for="progOut">Yes</label>
                    &emsp;
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="progOut" name="progOut" value="no">
                    <label for="progOut">No</label><br>
                    <p><textarea type="text" name="progOutSugg" id="progOutSugg" style="font-size: 1.5rem; margin-top: .8rem; resize:none;" placeholder="Enter Suggestion if any"></textarea></p>
                </div>
            </div>

            <!-- ###########################################################################################################
                                            CO PO MAPPING
########################################################################################################### -->


            <div class="div1">CO PO MAPPING</div>
            <div class="outerBox" style="display:flex; flex-direction: row;">
                <div class="leftDisplayBox" style="overflow:auto; max-height:550px;  width:70%">
                    <table class="table table-bordered" style="text-align: left; margin:2rem auto; width:35%">
                        <?php
                        include "backend/include/conn.php";
                        $totalCo = 0;
                        $totalPo = 0;

                        $sqlm_copo = "SELECT COUNT(PO_no) AS 'counter', PO_no FROM co_po_mappingl GROUP BY PO_no,courseID HAVING courseID='$courseID' ";
                        $resultm_copo = $conn->query($sqlm_copo);
                        $datam_copo = mysqli_query($conn, $sqlm_copo);
                        $totalm_copo = mysqli_num_rows($datam_copo);

                        if ($totalm_copo != 0) {
                            while ($resultm_copo = mysqli_fetch_assoc($datam_copo)) {
                                $totalPo++;
                            }
                        } else {
                            echo "0 results";
                        }

                        echo "<tr><th>X</th>";
                        for ($i = 1; $i <= $totalPo; $i++) {
                            echo "<th>PO" . $i . "</th>";
                        }
                        echo "</tr>";

                        $sqlm_copo2 = "SELECT COUNT(CO_no) AS 'counter', CO_no FROM co_po_mappingl GROUP BY CO_no, courseID HAVING courseID='$courseID' ";
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
                            $sqlm_copo4 = "SELECT rating FROM co_po_mappingl where CO_no = 'CO" . $i . "' AND courseID='" . $courseID . "' ";
                            $resultm_copo4 = $conn->query($sqlm_copo4);
                            $datam_copo4 = mysqli_query($conn, $sqlm_copo4);
                            $totalm_copo4 = mysqli_num_rows($datam_copo4);

                            if ($totalm_copo4 != 0) {
                                echo "<tr><th>CO$i</th>";
                                while ($resultm_copo4 = mysqli_fetch_assoc($datam_copo4)) {
                                    echo "<td>" . $resultm_copo4['rating'] . "</td>";
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
                <div class="rightInputBox" style="width:25%">
                    <p style=" margin:.5rem; padding: 5px;">Suggestion Required?</p>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="m_copo" name="m_copo" value="yes">
                    <label for="m_copo">Yes</label>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="m_copo" name="m_copo" value="no">
                    <label for="m_copo">No</label><br>
                    <p><textarea type="text" name="m_copoSugg" id="m_copoSugg" style="font-size: 1.5rem; margin-top: .8rem; resize:none;" placeholder="Enter Suggestion if any"></textarea></p>
                </div>
            </div>


            <!-- ###########################################################################################################
                                        PROGRAM SPECIFIC OUTCOMES
########################################################################################################### -->


            <div class="div1">PROGRAM SPECIFIC OUTCOMES:</div>
            <div class="outerBox" style="display:flex; flex-direction: row;">
                <div class="leftDisplayBox" style="overflow:auto; max-height:550px;  width:70%">
                    <table class="table table-bordered" style="text-align: left; margin:2rem auto; width:70%">
                        <?php
                        include "backend/include/conn.php";
                        $sqlpsout = "select PSO_no,PSO_description from progspecificoutcomel where courseID ='" . $courseID . "' ";
                        $resultpsout = $conn->query($sqlpsout);
                        $datapsout = mysqli_query($conn, $sqlpsout);
                        $totalpsout = mysqli_num_rows($datapsout);
                        echo "<tr><th>PSO_no</th><th>PSO_description</th></tr>";
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
                <div class="rightInputBox" style="width:25%">
                    <p style=" margin:.5rem; padding: 5px;">Suggestion Required?</p>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="pso" name="pso" value="yes">
                    <label for="pso">Yes</label>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="pso" name="pso" value="no">
                    <label for="pso">No</label><br>
                    <p><textarea type="text" name="psoSugg" id="psoSugg" style="font-size: 1.5rem; margin-top: .8rem; resize:none;" placeholder="Enter Suggestion if any"></textarea></p>
                </div>
            </div>


            <!-- ###########################################################################################################
                                            CO PSO MAPPING
########################################################################################################### -->


            <div class="div1">CO PSO MAPPING:</div>
            <div class="outerBox" style="display:flex; flex-direction: row;">
                <div class="leftDisplayBox" style="overflow:auto; max-height:550px;  width:70%">
                    <table class="table table-bordered" style="text-align: left; margin:2rem auto; width:28%">
                        <?php
                        include "backend/include/conn.php";
                        $totalCos = 0;
                        $totalPso = 0;

                        $sqlm_copso = "SELECT COUNT(PSO_no) AS 'counter', PSO_no FROM co_pso_mappingl GROUP BY PSO_no, courseID HAVING courseID='$courseID'  ";
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


                        $sqlm_copso2 = "SELECT COUNT(CO_no) AS 'counter', CO_no FROM co_pso_mappingl GROUP BY CO_no, courseID HAVING courseID='$courseID'  ";
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
                            $sqlm_copso4 = "SELECT rating FROM co_pso_mappingl where CO_no = 'CO" . $i . "' AND courseID='" . $courseID . "' ";
                            $resultm_copso4 = $conn->query($sqlm_copso4);
                            $datam_copso4 = mysqli_query($conn, $sqlm_copso4);
                            $totalm_copso4 = mysqli_num_rows($datam_copso4);

                            if ($totalm_copso4 != 0) {
                                echo "<tr><th>CO$i</th>";
                                while ($resultm_copso4 = mysqli_fetch_assoc($datam_copso4)) {
                                    echo "<td>" . $resultm_copso4['rating'] . "</td>";
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
                <div class="rightInputBox" style="width:25%">
                    <p style=" margin:.5rem; padding: 5px;">Suggestion Required?</p>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="m_copso" name="m_copso" value="yes">
                    <label for="m_copsoYes">Yes</label>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="m_copso" name="m_copso" value="no">
                    <label for="m_copsoNo">No</label><br>
                    <p><textarea type="text" name="m_copsoSugg" id="m_copsoSugg" style="font-size: 1.5rem; margin-top: .8rem; resize:none" placeholder="Enter Suggestion if any"></textarea></p>
                </div>
            </div>


            <!-- ###########################################################################################################
                                            CO WEIGHTAGE
########################################################################################################### -->


            <div class="div1">CO WEIGHTAGE</div>
            <div class="outerBox" style="display:flex; flex-direction: row;">
                <div class="leftDisplayBox" style="overflow:auto; max-height:550px;  width:70%">
                    <table class="table table-bordered" style="text-align: left; margin:2rem auto; width:30%">
                        <?php
                        include "backend/include/conn.php";
                        $sqlpsout = "select CO_no, noOfExp, weightagePercent from courseoutcomel where courseID ='" . $courseID . "' ";
                        $resultpsout = $conn->query($sqlpsout);
                        $datapsout = mysqli_query($conn, $sqlpsout);
                        $totalpsout = mysqli_num_rows($datapsout);
                        if ($totalpsout != 0) {
                            // output data of each row
                            echo "<tr><th> CO_no </th><th> noOfExp  </th><th> weightagePercent </th></tr>";
                            while ($resultpsout = mysqli_fetch_assoc($datapsout)) {
                                echo "<tr><th>" . $resultpsout['CO_no'] . "</th><td>" . $resultpsout['noOfExp'] .  "</td><td>" . $resultpsout['weightagePercent'] . "</td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </table>
                </div>
                <div class="rightInputBox" style="width:25%">
                    <p style=" margin:.5rem; padding: 5px;">Suggestion Required?</p>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="courseWeig" name="courseWeig" value="yes">
                    <label for="courseWeigYes">Yes</label>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="courseWeig" name="courseWeig" value="no">
                    <label for="courseWeigNo">No</label><br>
                    <p><textarea type="text" name="courseWeigSugg" id="courseWeigSugg" style="font-size: 1.5rem; margin-top: .8rem; resize:none;" placeholder="Enter Suggestion if any"></textarea></p>
                </div>
            </div>


<!-- ###########################################################################################################
                                            EXPERIMENT LIST
########################################################################################################### -->


            <div class="div1">EXPERIMENT LIST:</div>
            <div class="outerBox" style="display:flex; flex-direction: row;">
                <div class="leftDisplayBox" style="overflow:auto; max-height:550px;  width:70%">
                    <table class="table table-bordered" style="text-align: left; margin:2rem auto; width:70%">
                        <?php
                        include "backend/include/conn.php";
                        $sqlexp = "select expNo ,CO_no, expName, weight  from experimentlist where courseID ='" . $courseID . "' ";
                        $resultexp = $conn->query($sqlexp);
                        $dataexp = mysqli_query($conn, $sqlexp);
                        $totalexp = mysqli_num_rows($dataexp);
                        echo "<tr><th> expNo </th><th> CO_no </th><th> expName </th><th> weight</th></tr>";
                        if ($totalexp != 0) {
                            // output data of each row
                            while ($resultexp = mysqli_fetch_assoc($dataexp)) {
                                echo "<tr><td>" . $resultexp['expNo'] . "</td><td>" . $resultexp['CO_no'] . "</td><td>" . $resultexp['expName'] . "</td><td>" . $resultexp['weight'] . "</td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </table>
                </div>
                <div class="rightInputBox" style="width:25%">
                    <p style=" margin:.5rem; padding: 5px;">Suggestion Required?</p>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="expList" name="expList" value="yes">
                    <label for="expListYes">Yes</label>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="expList" name="expList" value="no">
                    <label for="expListNo">No</label><br>
                    <p><textarea type="text" name="expListSugg" id="expListSugg" style="font-size: 1.5rem; margin-top: .8rem; resize:none;" placeholder="Enter Suggestion if any"></textarea></p>
                </div>
            </div>


            <!-- ###########################################################################################################
                                            ASSESMENT METHOD
########################################################################################################### -->


            <div class="div1"> ASSESMENT METHOD:</div>
            <div class="outerBox" style="display:flex; flex-direction: row;">
                <div class="leftDisplayBox" style="overflow:auto; max-height:550px;  width:70%">
                    <table class="table table-bordered" style="text-align: left; margin:2rem auto; width:50%">
                        <?php
                        include "backend/include/conn.php";
                        $totalAssignNo = 0;
                        $totalCoA = 0;

                        $sqlA = "SELECT COUNT(CO_no) AS 'counter', CO_no FROM assessmentmethod GROUP BY CO_no, courseID HAVING courseID='$courseID'  ";
                        $resultA = $conn->query($sqlA);
                        $dataA = mysqli_query($conn, $sqlA);
                        $totalA = mysqli_num_rows($dataA);
                        if ($totalA != 0) {
                            echo "<tr><th>X</th>";
                            while ($resultA = mysqli_fetch_assoc($dataA)) {
                                echo "<th>" . $resultA['CO_no'] . "</th>";
                                $totalCoA++;
                            }
                            echo "</tr>";
                        } else {
                            echo "0 results";
                        }


                        $sqlB = "SELECT COUNT(assignNo) AS 'counter', assignNo FROM assessmentmethod GROUP BY assignNo, courseID HAVING courseID='$courseID'  ";
                        $resultB = $conn->query($sqlB);
                        $dataB = mysqli_query($conn, $sqlB);
                        $totalB = mysqli_num_rows($dataB);
                        if ($totalB != 0) {
                            while ($resultB = mysqli_fetch_assoc($dataB)) {
                                $totalAssignNo++;
                            }
                        } else {
                            echo "0 results";
                        }


                        for ($i = 1; $i <= $totalAssignNo; $i++) {
                            $sqlC = "SELECT marks FROM assessmentmethod where assignNo = 'Assignment$i' AND courseID='" . $courseID . "' ";
                            $resultC = $conn->query($sqlC);
                            $dataC = mysqli_query($conn, $sqlC);
                            $totalC = mysqli_num_rows($dataC);
                            if ($totalC != 0) {
                                echo "<tr><th>Assignment $i</th>";
                                while ($resultC = mysqli_fetch_assoc($dataC)) {
                                    echo "<td>" . $resultC['marks'] . "</td>";
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
                <div class="rightInputBox1" style="width:25%">
                    <p style=" margin:.5rem; padding: 5px;">Suggestion Required?</p>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="assesment" name="assesment" value="yes">
                    <label for="assesmentYes">Yes</label>
                    <input type="radio" style="height: 1.5rem; width:1.5rem;" id="assesment" name="assesment" value="no">
                    <label for="assesmentNo">No</label><br>
                    <break>

                        <p style="display:inline; margin:.5rem">BT Level:</p>

                        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="btLevel" name="btLevel" value="yes">
                        <label for="btLevelYes">Yes</label>
                        &emsp;
                        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="btLevel" name="btLevel" value="no">
                        <label for="btLevelNo">No</label><br>
                        &emsp;
                        <p style="display:inline; margin:.5rem"> Grammar:</p>
                        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="grammar" name="grammar" value="yes">
                        <label for="grammarYes">Yes</label>
                        &emsp;
                        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="grammar" name="grammar" value="no">
                        <label for="grammarNo">No</label><br>
                        <p><textarea type="text" name="assesmentSugg" id="assesmentSugg" style="font-size: 1.5rem; margin-top: .8rem; resize:none;" placeholder="Enter Suggestion if any"></textarea></p>
                </div>
            </div>


            <!-- ###########################################################################################################
                                            FINAL BOX
########################################################################################################### -->


            <div class="div1">FINAL SUGGESTION</div>
            <div class="leftDisplayBox">
                <p><textarea type="text" name="finalSugg" id="finalSugg" style="resize:none; height:5rem; width:30rem;  margin-top: .8rem;" placeholder="Enter Suggestion if any" required></textarea></p>
                <p style="display:inline; margin:.5rem"> Form Status:</p>
                <input type="radio" style="height: 1.5rem; width:1.5rem;" id="dqaStatus" name="dqaStatus" value="approved">
                <label for="dqaStatusYes">Approved</label>
                &emsp;
                <input type="radio" style="height: 1.5rem; width:1.5rem;" id="dqaStatus" name="dqaStatus" value="Nsubmitted">
                <label for="dqaStatusNo">Changes Required</label><br>

                <input class="btn btn-success" style=" margin:2rem auto 2rem" type="submit" name="submit" value="Submit" />
            </div>


        </main>
    </form>


<!-- js for bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>