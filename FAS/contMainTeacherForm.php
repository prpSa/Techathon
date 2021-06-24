<?php
    global $username,$courseID , $tea_username,$division;
    $courseID = $_GET['courseID'];
    $username = $_GET['username'];
    include 'validate.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/contTea.css">
    <!-- Font Awesome  -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap css  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- js for file and bootstrap  -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <title>Faculty Audit System</title>
    <script type="text/javascript">
        $(document).ready(function() {


            var html = ' <tr><td><input class="form-control" style="align-items: center; width: 145px;" type="text" name="Objective[]" placeholder="1" d=""></td><td><textarea class="form-control" style="align-items: center; resize:none; height:3.5rem; width: 600px;"  type="text" name="Text[]" placeholder="ABCD" d=""></textarea></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="remove"></td></tr>';

            var max = 5;
            var x = 1;

            $("#add").click(function() {
                if (x <= max) {
                    $("#table_field").append(html);
                    x++;
                }
            });
            $("#table_field").on('click', '#remove', function() {
                $(this).closest('tr').remove();
                x--;
            });




            var htmll = ' <tr><td><input class="form-control" style="align-items: center; width: 80px;" type="text" name="CO_no[]" placeholder="CO2" d=""></td><td><textarea class="form-control" style="align-items: center; resize:none; height:3.5rem; width: 600px;" type="text" name="CO_name[]" placeholder="ABCD" d=""></textarea></td><td><input class="btn btn-danger" type="button" name="removee" id="removee" value="remove"></td></tr>';

            var maxx = 5;
            var xx = 1;

            $("#addd").click(function() {
                if (xx <= maxx) {
                    $("#table_field_outcome").append(htmll);
                    xx++;
                }
            });
            $("#table_field_outcome").on('click', '#removee', function() {
                $(this).closest('tr').remove();
                xx--;
            });

            var html_progOut = ' <tr><td><input class="form-control" style="align-items: center; width: 80px;" type="text" name="PO_no[]" placeholder="PO1" d=""></td><td><textarea class="form-control" style="align-items: center; resize:none; height:3.5rem; width: 150px;"" type="text" name="PO_title[]" placeholder="ABCD" d=""></textarea></td><td><textarea class="form-control" style="align-items: center; resize:none; height:3.5rem; width: 600px;" type="text" name="PO_description[]" placeholder="ABCD"d=""></textarea></td><td><input class="btn btn-danger" type="button" name="remove_progOut" id="remove_progOut" value="remove"></td></tr>';

            var max_progOut = 11;
            var x_progOut = 1;

            $("#add_progOut").click(function() {
                if (x_progOut <= max_progOut) {
                    $("#table_field_progOut").append(html_progOut);
                    x_progOut++;
                }
            });
            $("#table_field_progOut").on('click', '#remove_progOut', function() {
                $(this).closest('tr').remove();
                x_progOut--;
            });



            var html_progSpecOut = ' <tr><td><input class="form-control" style="align-items: center; width: 90px;" type="text" name="PSO_no[]" placeholder="PSO1" d=""></td><td><textarea class="form-control" style="align-items: center; resize:none; height:3.5rem; width: 800px;" type="text" placeholder="ABCD" name="PSO_description[]" d=""></textarea></td><td><input class="btn btn-danger" type="button" name="remove_progSpecOut" id="remove_progSpecOut" value="remove"></td></tr>';

            var max_progSpecOut = 5;
            var x_progSpecOut = 1;

            $("#add_progSpecOut").click(function() {
                if (x_progSpecOut <= max_progSpecOut) {
                    $("#table_field_progSpecOut").append(html_progSpecOut);
                    x_progSpecOut++;
                }
            });
            $("#table_field_progSpecOut").on('click', '#remove_progSpecOut', function() {
                $(this).closest('tr').remove();
                x_progSpecOut--;
            });


            var html_coWeight = ' <tr><td><input class="form-control" style="align-items: center; width: 80px;" type="text" name="CO_noo[]" placeholder="CO1" d=""></td><td><input class="form-control" style="align-items: center; width: 100px;" type="text" name="noOfExp[]" placeholder="5" d=""></td><td><input class="form-control" style="align-items: center; width: 140px;" type="text" name="weightagePercent[]" placeholder="1"d=""></td><td><input class="btn btn-danger" type="button" name="remove_coWeight" id="remove_coWeight" value="remove"></td></tr>';

            var max_coWeight = 7;
            var x_coWeight = 1;

            $("#add_coWeight").click(function() {
                if (x_coWeight <= max_coWeight) {
                    $("#table_field_coWeight").append(html_coWeight);
                    x_coWeight++;
                }
            });
            $("#table_field_coWeight").on('click', '#remove_coWeight', function() {
                $(this).closest('tr').remove();
                x_coWeight--;
            });


            var html_chpPlan = ' <tr><td><input class="form-control" style="align-items: center; width: 120px;" type="text" name="Chp_no[]" placeholder="1" d=""></td><td><textarea class="form-control" style="align-items: center; resize:none; height:3.5rem; width: 400px;"" type="text" name="topic[]" placeholder="ABCD" d=""></textarea></td><td><input class="form-control" style="align-items: center; width: 80px;" type="text" name="CO_nooo[]" placeholder="CO1" d=""></td><td><input class="form-control" style="align-items: center; width: 101px;" type="text" name="weightage[]"placeholder="10" d=""></td><td><input class="form-control" style="align-items: center; width: 100px;" type="text" name="duration[]" placeholder="10" d=""></td><td><input class="btn btn-danger" type="button" name="remove_chpPlan" id="remove_chpPlan" value="remove"></td></tr>';

            var max_chpPlan = 6;
            var x_chpPlan = 1;

            $("#add_chpPlan").click(function() {
                if (x_chpPlan <= max_chpPlan) {
                    $("#table_field_chpPlan").append(html_chpPlan);
                    x_chpPlan++;
                }
            });
            $("#table_field_chpPlan").on('click', '#remove_chpPlan', function() {
                $(this).closest('tr').remove();
                x_chpPlan--;
            });

        });
    </script>
</head>

<body>



<!-- Navbar -->
<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div id="navbarCollapse" class="collapse navbar-collapse">
 
        <div class="navbarLeft">
        <a href="http://localhost/FAS/teacherhome.php?username=<?php echo $username; ?>"><img src="dylogo.png" style="width:10rem; height:4rem" ></a>
        </div>

        <div class="navbarCenter">
            <h4 style="font-weight:1000">Continue Teacher Form</h4>
        </div>

        <div class="navbarRight">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown" >
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size:1rem; font-weight:600"><?php echo $username;?></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="http://localhost/FAS/mainTeacherForm.php?username=<?php echo $username; ?>" class="dropdown-item" style="font-size:1rem; font-weight:600">Create New Form</a>
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



    <form action="backend/contTea.php?courseID=<?php echo $courseID; ?>&username=<?php echo $username; ?>" method="POST">
        <main style="padding-bottom: 20px;">


<!-- ###########################################################################################################
                                            COURSE DETAILS
########################################################################################################### -->


            <div class="div1">COURSE DETAILS</div>
            <div class="leftDisplayBox" style="margin:0px auto">

                <table class="table table-bordered" style="text-align: left; margin:1rem auto; width:28%">
                    <?php
                    include "backend/include/conn.php";
                    $courseID = $_GET['courseID'];
                    $sql = "select fromAcadYr,toAcadYr ,sem,subjectCode,courseName,credits,lectHr,totLectHr from course where courseID ='" . $courseID . "' ";
                    $result = $conn->query($sql);
                    $data = mysqli_query($conn, $sql);
                    $total = mysqli_num_rows($data);
                    if ($total != 0) {
                        // output data of each row
                        while ($result = mysqli_fetch_assoc($data)) {
                            echo "
                                <tr><td>fromAcadYr</td><td><input class='form-control' id='year1' name='year1' type='text' placeholder='2021' value='" . $result['fromAcadYr'] . "' required=''></td></tr>
                                <tr><td>toAcadYr</td><td><input class='form-control' id='year2' name='year2' type='text' placeholder='2022' value='" . $result['toAcadYr'] . "' required=''></td></tr>
                                <tr><td>sem</td><td><input class='form-control' id='sem' name='sem' type='text' placeholder='4' value='" . $result['sem'] . "' required=''></td></tr>
                                <tr><td>subjectCode</td><td><input class='form-control' id='subcode' name='subcode' type='text' placeholder='CSC305' value='" . $result['subjectCode'] . "' required=''></td></tr>
                                
                                <tr><td>courseName</td><td><input class='form-control' id='cname' name='cname' type='text' placeholder='New course name' value='" . $result['courseName'] . "' readonly required=''></td></tr>


                                <tr><td>credits</td><td><input class='form-control' id='cred' name='cred' type='text' placeholder='10' value='" . $result['credits'] . "' required=''></td></tr>
                                <tr><td>lectHr</td><td><input class='form-control' id='lec' name='lec' type='text' placeholder='22' value='" . $result['lectHr'] . "' required=''></td></tr>
                                <tr><td>totLectHr</td><td><input class='form-control' id='contact' name='contact' type='text' placeholder='67' value='" . $result['totLectHr'] . "' required=''></td></tr>";
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

            <div class="div1">COURSE OBJECTIVE
            </div>
            <div class="leftDisplayBox">
                <div class="input-field">
                    <table class="table table-bordered" style="margin:1rem auto; width:70%" id="table_field">
                        <?php
                        include "backend/include/conn.php";
                        $sqlObj = "select objNo,objName from courseobjective where courseID ='" . $courseID . "' ";
                        $resultObj = $conn->query($sqlObj);
                        $dataObj = mysqli_query($conn, $sqlObj);
                        $totalObj = mysqli_num_rows($dataObj);
                        if ($totalObj > 0) {
                            // output data of each row

                            echo "<tr><th> objNo </th><th> objName </th><th><input class='btn btn-warning' type='button' name='add' id='add' value='Add'></th></tr>";
                            while ($resultObj = mysqli_fetch_assoc($dataObj)) {

                                echo "<tr> <td><input class='form-control' style='align-items: center; width: 145px;' type='text' name='Objective[]' value='" . $resultObj['objNo'] . "' ></td><td><textarea class='form-control'style='align-items: center; resize:none; height:3.5rem; width: 685px;' type='text' name='Text[]' value='" . $resultObj['objName'] . "' >" . $resultObj['objName'] . "</textarea></td><td><input class='btn btn-danger' type='button' name='remove' id='remove' value='remove'></td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>


                        </tr>
                    </table>
                </div>
            </div>


            <!-- ###########################################################################################################
                                            COURSE OUTCOME
########################################################################################################### -->


            <div class="div1">COURSE OUTCOME</div>
            <div class="leftDisplayBox" style="overflow-x:auto">
                <div class="input-field-outcome">
                    <table class="table table-bordered" style="margin:1rem auto; width:70%" id="table_field_outcome">
                        <?php
                        include "backend/include/conn.php";
                        $sqlC_out = "select CO_no ,CO_name  from courseoutcome where courseID ='" . $courseID . "' ";
                        $resultC_out = $conn->query($sqlC_out);
                        $dataC_out = mysqli_query($conn, $sqlC_out);
                        $totalC_out = mysqli_num_rows($dataC_out);
                        echo "<tr><th> CO_no </th><th> CO_name </th><th><input class='btn btn-warning' type='button' name='addd' id='addd' value='Add'></th></tr>";
                        if ($totalC_out != 0) {
                            // output data of each row
                            while ($resultC_out = mysqli_fetch_assoc($dataC_out)) {
                                echo "<tr><td><input class='form-control' style='align-items: center; width: 80px;' type='text' name='CO_no[]' value='" . $resultC_out['CO_no'] . "' ></td><td><textarea class='form-control' style='align-items: center; resize:none; height:3.5rem; width: 800px;' type='text' name='CO_name[]' value='" . $resultC_out['CO_name'] . "' >" . $resultC_out['CO_name'] . "</textarea></td><td><input class='btn btn-danger' type='button' name='removee' id='removee' value='remove'></td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </table>
                </div>
            </div>




            <!-- ###########################################################################################################
                                            PROGRAM OUTCOME
########################################################################################################### -->


            <div class="div1">PROGRAM OUTCOME</div>
            <div class="leftDisplayBox">
                <div class="input-field_progOut">
                    <table class="table table-bordered" style="margin:1rem auto; width:70%" id="table_field_progOut">
                        <?php
                        include "backend/include/conn.php";
                        $sqlP_out = "select PO_no ,PO_title, PO_description from progoutcomes where courseID ='" . $courseID . "' ";
                        $resultP_out = $conn->query($sqlP_out);
                        $dataP_out = mysqli_query($conn, $sqlP_out);
                        $totalP_out = mysqli_num_rows($dataP_out);
                        echo "<tr><th> PO_no </th><th> PO_title </th><th> PO_description </th><th><input class='btn btn-warning' type='button' name='add_progOut' id='add_progOut' value='Add'></th></tr>";
                        if ($totalP_out != 0) {
                            // output data of each row
                            while ($resultP_out = mysqli_fetch_assoc($dataP_out)) {
                                echo "<tr><td><input class='form-control' style='align-items: center; width: 80px;' type='text' name='PO_no[]'  value='" . $resultP_out['PO_no'] . "' ></td>
                        <td><textarea class='form-control' style='align-items: center; resize:none; height:3.5rem; width: 150px;' type='text' name='PO_title[]' value='" . $resultP_out['PO_title'] . "' >" . $resultP_out['PO_title'] . "</textarea></td><td><textarea class='form-control' style='align-items: center; resize:none; height:3.5rem; width: 600px;' type='text' name='PO_description[]'  value='" . $resultP_out['PO_description'] . "'>" . $resultP_out['PO_description'] . "</textarea></td><td><input class='btn btn-danger' type='button' name='remove_progOut' id='remove_progOut' value='remove'></td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </table>

                </div>
            </div>

            <!-- ###########################################################################################################
                                            CO PO MAPPING
########################################################################################################### -->


            <div class="div1">CO PO MAPPING</div>
            <div class="leftDisplayBox" style="padding:20px; overflow-x:auto">
                <table class="table table-bordered" cellspacing="0" style="border:none;margin:1rem auto; width:85%" id="table_field_progOut">
                    <?php
                    include "backend/include/conn.php";
                    $totalCo = 0;
                    $totalPo = 0;

                    $sqlm_copo = "SELECT COUNT(PO_no) AS 'counter', PO_no FROM co_po_mapping GROUP BY PO_no,courseID HAVING courseID='" . $courseID . "' ";
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
                    $sqlm_copo2 = "SELECT COUNT(CO_no) AS 'counter', CO_no FROM co_po_mapping GROUP BY CO_no,courseID HAVING courseID='" . $courseID . "' ";
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
                        echo "<tr><th>CO$i</th>";
                        for ($j = 1; $j <= $totalPo; $j++) {
                            $sqlm_copo4 = "SELECT rating FROM co_po_mapping where CO_no = 'CO" . $i . "' AND PO_no = 'PO" . $j . "' AND courseID='" . $courseID . "' ";
                            $resultm_copo4 = $conn->query($sqlm_copo4);
                            $datam_copo4 = mysqli_query($conn, $sqlm_copo4);
                            $totalm_copo4 = mysqli_num_rows($datam_copo4);
                            // echo "CO".$i."";
                            if ($totalm_copo4 != 0) {

                                while ($resultm_copo4 = mysqli_fetch_assoc($datam_copo4)) {
                                    echo "<th><input class='form-control' style='align-items: center; width: 50px;'' name='rco" . $i . "cpo" . $j . "' id='rco" . $i . "cpo" . $j . "' type='text' value='" . $resultm_copo4['rating'] . "'></th>";
                                }
                            } else {
                                echo "0 results";
                            }
                        }
                        echo "</tr>";
                    }
                    $conn->close();
                    ?>

                </table>
                <script src="alert.js"></script>
                <input class="btn btn-success" type="text" name="mapcopo" id="mapcopo" value="Map" onclick="checkcopo()" readonly="readonly" style="margin:1rem 28rem" required>
            </div>

            <!-- ###########################################################################################################
                                        PROGRAM SPECIFIC OUTCOMES
########################################################################################################### -->


            <div class="div1">PROGRAM SPECIFIC OUTCOMES</div>
            <div class="leftDisplayBox">
                <div class="input-field_progOut">
                    <table class="table table-bordered" cellspacing="0" style="border:none;margin:1rem auto; width:70%" id="table_field_progSpecOut">
                        <tr>
                            <th>PSO_no</th>
                            <th>PSO_description</th>
                            <th><input class='btn btn-warning' type='button' name='add_progSpecOut' id='add_progSpecOut' value='Add'></th>
                        </tr>
                        <?php
                        include "backend/include/conn.php";
                        $sqlpsout = "select PSO_no,PSO_description from progspecificoutcome where courseID ='" . $courseID . "' ";
                        $resultpsout = $conn->query($sqlpsout);
                        $datapsout = mysqli_query($conn, $sqlpsout);
                        $totalpsout = mysqli_num_rows($datapsout);
                        if ($totalpsout != 0) {
                            // output data of each row
                            while ($resultpsout = mysqli_fetch_assoc($datapsout)) {
                                echo "<tr><td><input class='form-control' style='align-items: center; width: 90px;' type='text' name='PSO_no[]' value='" . $resultpsout['PSO_no'] . "' ></td><td><textarea class='form-control' style='align-items: center; resize:none; height:3.5rem; width: 800px;' type='text' value='" . $resultpsout['PSO_description'] . "' name='PSO_description[]' >" . $resultpsout['PSO_description'] . "</textarea></td><td><input class='btn btn-danger' type='button' name='remove_progSpecOut' id='remove_progSpecOut' value='remove'></td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </table>
                </div>
            </div>


            <!-- ###########################################################################################################
                                            CO PSO MAPPING
########################################################################################################### -->

            <div class="div1">CO PSO MAPPING</div>
            <div class="leftDisplayBox" style="overflow-x:auto">
                <table class="table table-bordered" cellspacing="0" style="border:none;margin:1rem auto; width:32%" id="table_field_progOut">
                    <?php
                    include "backend/include/conn.php";
                    $totalCos = 0;
                    $totalPso = 0;

                    $sqlm_copso = "SELECT COUNT(PSO_no) AS 'counter', PSO_no FROM co_pso_mapping GROUP BY PSO_no ";
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


                    $sqlm_copso2 = "SELECT COUNT(CO_no) AS 'counter', CO_no FROM co_pso_mapping GROUP BY CO_no,courseID HAVING courseID='" . $courseID . "' ";
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
                        echo "<tr><th>CO$i</th>";
                        for ($j = 1; $j <= 3; $j++) {
                            $sqlm_copso4 = "SELECT rating FROM co_pso_mapping where CO_no = 'CO" . $i . "' AND courseID='" . $courseID . "' AND PSO_no = 'PSO" . $j . "' ";
                            $resultm_copso4 = $conn->query($sqlm_copso4);
                            $datam_copso4 = mysqli_query($conn, $sqlm_copso4);
                            $totalm_copso4 = mysqli_num_rows($datam_copso4);

                            if ($totalm_copso4 != 0) {

                                while ($resultm_copso4 = mysqli_fetch_assoc($datam_copso4)) {
                                    echo "<td><input type='text' class='form-control' id='rcoo" . $i . "cpoo" . $j . "' name='rcoo" . $i . "cpoo" . $j . "' style='align-items: center; width: 50px;'value='" . $resultm_copso4['rating'] . "'</input></td>";
                                }
                            } else {
                                echo "0 results";
                            }
                        }
                        echo "</tr>";
                    }
                    $conn->close();
                    ?>

                </table>
                <script src="copsomap.js"></script>
                <input class="btn btn-success" type="text" name="copsomap" id="copsomap" value="Map" onclick="check()" readonly="readonly" style="margin:1rem 28rem">
            </div>

            <!-- ###########################################################################################################
                                            CO WEIGHTAGE
########################################################################################################### -->


            <div class="div1">CO WEIGHTAGE</div>
            <div class="leftDisplayBox">
                <div class="input-field_coWeight">
                    <table class="table table-bordered" style="text-align: center; margin:1rem auto; width:40%" id="table_field_coWeight">
                        <?php
                        include "backend/include/conn.php";
                        $sqlpsout = "select CO_no, noOfExp, weightagePercent from courseoutcome where courseID ='" . $courseID . "' ";
                        $resultpsout = $conn->query($sqlpsout);
                        $datapsout = mysqli_query($conn, $sqlpsout);
                        $totalpsout = mysqli_num_rows($datapsout);
                        if ($totalpsout != 0) {
                            // output data of each row
                            echo "<tr><th> CO_no </th><th> noOfExp  </th><th> weightagePercent </th><th><input class='btn btn-warning' type='button' name='add_coWeight' id='add_coWeight' value='Add'></th></tr>";
                            while ($resultpsout = mysqli_fetch_assoc($datapsout)) {
                                echo "<tr><td><input class='form-control' style='align-items: center; width: 80px;' type='text' name='CO_noo[]' value='" . $resultpsout['CO_no'] . "'></td><td><input class='form-control' style='align-items: center; width: 100px;' type='text' name='noOfExp[]' value='" . $resultpsout['noOfExp'] .  "'></td><td><input class='form-control' style='align-items: center; width: 140px;' type='text' name='weightagePercent[]' value='" . $resultpsout['weightagePercent'] . "'></td><td><input class='btn btn-danger' type='button' name='remove_coWeight' id='remove_coWeight' value='remove'></td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </table>
                </div>
            </div>





            <!-- ###########################################################################################################
                                           CHAPTER PLAN:
########################################################################################################### -->


            <div class="div1">CHAPTER PLAN</div>
            <div class="leftDisplayBox" style="overflow-x:auto">
                <div class="input-field_chpPlan">
                    <table class="table table-bordered" style="margin:1rem auto; width:70%" id="table_field_chpPlan">
                        <?php
                        include "backend/include/conn.php";
                        $sql_chpPlan = "select * from coursetopics where courseID ='" . $courseID . "' ";
                        $result_chpPlan = $conn->query($sql_chpPlan);
                        $data_chpPlan = mysqli_query($conn, $sql_chpPlan);
                        $total_chpPlan = mysqli_num_rows($data_chpPlan);
                        echo "<tr><th>chp_expNo</th>
                <th>chp_expTopic</th>
                <th>CO_meet</th>
                <th>weightage</th>
                <th>duration</th><th><input class='btn btn-warning' type='button' name='add_chpPlan' id='add_chpPlan' value='Add'></th></tr>";
                        if ($total_chpPlan != 0) {
                            // output data of each row
                            while ($result_chpPlan = mysqli_fetch_assoc($data_chpPlan)) {
                                echo "<tr> <td><input class='form-control' style='align-items: center; width: 120px;' type='text' name='Chp_no[]' value='" . $result_chpPlan['chp_expNo'] . "' ></td><td><textarea class='form-control' style='align-items: center; resize:none; height:3.5rem; width: 400px;' type='text' name='topic[]' value='" . $result_chpPlan['chp_expTopic'] . "' >" . $result_chpPlan['chp_expTopic'] . "</textarea></td><td><input class='form-control' style='align-items: center; width: 80px;' type='text' name='CO_nooo[]' value='" . $result_chpPlan['CO_meet'] . "' ></td><td><input class='form-control' style='align-items: center; width: 101px;' type='text' name='weightage[]' value='" . $result_chpPlan['chp_exp_weightage'] . "' ></td><td><input class='form-control' style='align-items: center; width: 100px;' type='text' name='duration[]' value='" . $result_chpPlan['duration'] . "' ></td><td><input class='btn btn-danger' type='button' name='remove_chpPlan' id='remove_chpPlan' value='remove'></td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </table>
                </div>

            </div>





            <!-- ###########################################################################################################
                                            LESSON PLAN
########################################################################################################### -->
            <div class="div1">LESSON PLAN
            </div>
            <div class="leftDisplayBox" style="overflow-x:auto; max-height:600px; overflow-y:auto;">
                <div class="input-field_lesPlan">
                    <table class="table table-bordered" style="margin:1rem auto; width:70%" id="table_field_lesPlan">
                        <?php
                        include "backend/include/conn.php";

                        echo "<tr>
                <th>Week No</th>
                <th>Lecture No</th>
                <th>Details of Topic</th>
                <th>CO Meet</th>
                <th>Weightage</th>
                <th>Teaching Method</th>
             </tr>";
                        for ($i = 1; $i <= 13; $i++) {
                            echo '<td rowspan="5">' . $i . '</td>';
                            for ($j = 1; $j <= 4; $j++) {
                                $sql_lesPlan = "SELECT subTopics,CO_meet,weightage,teachingMethod from lessonplan where courseID ='" . $courseID . "' AND weekNo=$i AND lectNo=$j   ";
                                $result_lesPlan = $conn->query($sql_lesPlan);
                                $data_lesPlan = mysqli_query($conn, $sql_lesPlan);
                                $total_lesPlan = mysqli_num_rows($data_lesPlan);
                                if ($total_lesPlan != 0) {
                                    // output data of each row
                                    while ($result_lesPlan = mysqli_fetch_assoc($data_lesPlan)) {
                                        echo '<tr>
                <td>' . $j . '</td>
                <td><textarea class="form-control" style="align-items: center; resize:none; height:3.5rem; width: 450px;" type="text" name="Details' . $i . $j . '" placeholder="ABCD" value="' . $result_lesPlan["subTopics"] . '">' . $result_lesPlan["subTopics"] . '</textarea></td>
                <td><input class="form-control" type="text" name="COlp' . $i . $j . '" placeholder="PO1" style="align-items: center; width: 90px;" value="' . $result_lesPlan["CO_meet"] . '"></td>
                <td><input class="form-control" style="align-items: center; width: 110px;" type="text" name="Weightage' . $i . $j . '" placeholder="ABCD"  value="' . $result_lesPlan["weightage"] . '"></td>
                <td><textarea class="form-control" style="align-items: center; resize:none; height:3rem; width: 160px;" type="text" name="TeachingMethod' . $i . $j . '" placeholder="ABCD"  value="' . $result_lesPlan["teachingMethod"] . '">' . $result_lesPlan["teachingMethod"] . '</textarea></td>               
            </tr>';
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>




            <!-- ###########################################################################################################
                                           INTERNAL ASSESSMENT:
########################################################################################################### -->

            <div class="div1">INTERNAL ASSESSMENT</div>
            <div class="leftDisplayBox" style="overflow-x:auto">
                <table class="table table-bordered" style="margin:1rem auto; width:60%">
                    <?php
                    include "backend/include/conn.php";
                    $sql_ia = "select * from ia where courseID ='" . $courseID . "' ";
                    $result_ia = $conn->query($sql_ia);
                    $data_ia = mysqli_query($conn, $sql_ia);
                    $total_ia = mysqli_num_rows($data_ia);


                    $totalCo_ia = 0;


                    $sql_ia = "SELECT COUNT(CO_no) AS 'counter', CO_no FROM ia GROUP BY CO_no, courseID HAVING courseID='$courseID' ";
                    $result_ia = $conn->query($sql_ia);
                    $data_ia = mysqli_query($conn, $sql_ia);
                    $total_ia = mysqli_num_rows($data_ia);
                    if ($total_ia != 0) {
                        while ($result_ia = mysqli_fetch_assoc($data_ia)) {
                            $totalCo_ia++;
                        }
                    } else {
                        echo "0 results";
                    }


                    echo "<tr><th colspan='2'>ASSESSMENT METHOD</th>";
                    for ($i = 1; $i <= $totalCo_ia; $i++) {
                        echo "<th>CO$i" . "</th>";
                    }
                    echo "</tr>";


                    for ($k = 1; $k <= 2; $k++) {
                        echo "<tr><td rowspan='3'>TERM$k </td>";
                        for ($i = 1; $i <= 3; $i++) {
                            echo "<td>Question$i</td>";
                            for ($j = 1; $j <= 6; $j++) {
                                $sql_ia = "SELECT marks FROM ia where CO_no ='CO$j' AND qNo='Q$i' AND term='Term$k' AND courseID='$courseID' ";
                                $result_ia = $conn->query($sql_ia);
                                $data_ia = mysqli_query($conn, $sql_ia);
                                $total_ia = mysqli_num_rows($data_ia);
                                if ($total_ia != 0) {
                                    while ($result_ia = mysqli_fetch_assoc($data_ia)) {
                                        echo "<td><input class='form-control' style='align-items: center; width: 50px;'' type='text' id=t" . $k . "q" . $i . "c" . $j . " name=t" . $k . "q" . $i . "c" . $j . "  value='" . $result_ia['marks'] . "' /></td>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
                <script src="internalassessment.js"></script>
                <input class="btn btn-success" type="text" name="iamap" id="iamap" value="Map" onclick="checkvalue()" readonly="readonly" style="margin:1rem 28rem">
            </div>


            <?php echo $totalPo; ?>

            <!-- ###########################################################################################################
                                            FINAL BOX
########################################################################################################### -->


            <div class="div1">UPDATE FORM</div>
            <div class="leftDisplayBox" style="overflow-x:auto; margin:2rem auto 20px">
                <input type='hidden' id="totalPo" name='totalPo' value='<?php echo $totalPo; ?>' readonly='readonly' />
                <input type='hidden' id="totalCo" name='totalCo' value='<?php echo $totalCo; ?>' readonly='readonly' />
                <input type='hidden' id="totalPso" name='totalPso' value='<?php echo $totalPso; ?>' readonly='readonly' />
                <input type='hidden' id="totalCos" name='totalCos' value='<?php echo $totalCos; ?>' readonly='readonly' />
                <input type='hidden' id="totalAssignNo" name='totalAssignNo' value='<?php echo $totalAssignNo; ?>' readonly='readonly' />
                <input type='hidden' id="totalCoA" name='totalCoA' value='<?php echo $totalCoA; ?>' readonly='readonly' />
                <input class="btn btn-success" type="submit" style=" padding:6px 20px; margin:2rem auto 2rem" name="saveTea" id="saveTea" value="Save">&nbsp;&nbsp;
                <input class="btn btn-success" type="submit" style=" margin:2rem auto 2rem" name="save" id="save" value="Submit">
            </div>

        </main>
    </form>

<!-- js for bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>