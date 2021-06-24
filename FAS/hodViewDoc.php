<?php
    global $username,$courseID , $tea_username,$division,$audType;
    $username = $_GET['username']; 
    $courseID = $_GET['courseID'];
    $division = $_GET['division'];
    include 'validate.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/hodViewDoc.css">
    <!-- Font Awesome  -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap css  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- js for file and bootstrap  -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <title>HOD View DocI</title>
</head>

<body>
<!-- Navbar -->
<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div id="navbarCollapse" class="collapse navbar-collapse">
 
        <div class="navbarLeft">
        <a href="http://localhost/FAS/hodhome.php?username=<?php echo $username; ?>"><img src="dylogo.png" style="width:10rem; height:4rem" ></a>
        </div>

        <div class="navbarCenter">
            <h4 style="font-weight:1000">HOD View Documents</h4>
        </div>

        <div class="navbarRight">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown" >
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size:1rem; font-weight:600"><?php echo $username;?></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="http://localhost/FAS/hodhome.php?username=<?php echo $username; ?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>Home Page</a>
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


    <form method="POST" action="backend/hodAudR.php?courseID=<?php echo $courseID; ?>&division=<?php echo $division; ?>&username=<?php echo $username; ?> ">
        <div class="leftDisplayBox" style="margin:0px auto; text-align: left;">
            <table class="table table-bordered" style="text-align: left; margin:1rem auto; width:80%">
                <tr>
                    <th style="text-align:center"> Sr.No.</th>
                    <th style="text-align:center"> Audit Observation Point </th>
                    <th style="text-align:center"> View </th>
                </tr>
                <tr>
                    <td style="text-align:left"> 1] </td>
                    <td style="text-align:left">Defaulter list justified</td>

                    <td><a target='_blank' href="backend/auditorViewDocSub.php?courseID=<?php echo $courseID; ?>&division=<?php echo $division; ?>&name=defaulterList"><input type='viewDoc' name='defaulterList' value='View' class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" /></a></td>

                </tr>
                <tr>
                    <td style="text-align:left"> 2] </td>
                    <td style="text-align:left">LMS uploading status and usage by students</td>

                    <td><a target='_blank' href="backend/auditorViewDocSub.php?courseID=<?php echo $courseID; ?>&division=<?php echo $division; ?>&name=lms"><input type="viewDoc" name="lms" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>

                </tr>
                <tr>
                    <td style="text-align:left"> 3] </td>
                    <td style="text-align:left"> DCF and its consistency with course file contents</td>

                    <td><a target='_blank' href="backend/auditorViewDocSub.php?courseID=<?php echo $courseID; ?>&division=<?php echo $division; ?>&name=dcf"><input type="viewDoc" name="dcf" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>

                </tr>
                <tr>
                    <td style="text-align:left"> 4] </td>
                    <td style="text-align:left">E-attendance & consistency with course coverage & other subject teachers</td>

                    <td><a target='_blank' href="backend/auditorViewDocSub.php?courseID=<?php echo $courseID; ?>&division=<?php echo $division; ?>&name=eAttendance"><input type="viewDoc" name="eAttendance" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>

                </tr>
                <tr>
                    <td style="text-align:left"> 5] </td>
                    <td style="text-align:left">Syllabus coverage and its consistency with the number of classes allocated</td>

                    <td><a target='_blank' href="backend/auditorViewDocSub.php?courseID=<?php echo $courseID; ?>&division=<?php echo $division; ?>&name=syllabusCoverage"><input type="viewDoc" name="syllabusCoverage" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>

                </tr>
                <tr>
                    <td style="text-align:left"> 6] </td>
                    <td style="text-align:left">Identifying and remembering best and weak students and action taken thereafter</td>

                    <td><a target='_blank' href="backend/auditorViewDocSub.php?courseID=<?php echo $courseID; ?>&division=<?php echo $division; ?>&name=identifyStudents"><input type="viewDoc" name="identifyStudents" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>

                </tr>
                <tr>
                    <td style="text-align:left"> 7] </td>
                    <td style="text-align:left">Continuous evaluation in labs</td>

                    <td><a target='_blank' href="backend/auditorViewDocSub.php?courseID=<?php echo $courseID; ?>&division=<?php echo $division; ?>&name=evaluationLabs"><input type="viewDoc" name="evaluationLabs" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>

                </tr>
                <tr>
                    <td style="text-align:left"> 8] </td>
                    <td style="text-align:left">Workshops/ expert lecture conduction</td>

                    <td><a target='_blank' href="backend/auditorViewDocSub.php?courseID=<?php echo $courseID; ?>&division=<?php echo $division; ?>&name=workshopConduction"><input type="viewDoc" name="workshopConduction" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>

                </tr>
                <tr>
                    <td style="text-align:left"> 9] </td>
                    <td style="text-align:left">EPI performance of previous end sem and current semester exams with peers</td>

                    <td><a target='_blank' href="backend/auditorViewDocSub.php?courseID=<?php echo $courseID; ?>&division=<?php echo $division; ?>&name=epi"><input type="viewDoc" name="epi" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>

                </tr>
                <tr>
                    <td style="text-align:left"> 10] </td>
                    <td style="text-align:left">Sample copies of evaluation components and their marking</td>

                    <td><a target='_blank' href="backend/auditorViewDocSub.php?courseID=<?php echo $courseID; ?>&division=<?php echo $division; ?>&name=sampleCopies"><input type="viewDoc" name="sampleCopies" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>
                </tr>
                <tr>
                    <td style="text-align:left"> 11] </td>
                    <td style="text-align:left">ICT activities in class room along with proofs</td>

                    <td><a target='_blank' href="backend/auditorViewDocSub.php?courseID=<?php echo $courseID; ?>&division=<?php echo $division; ?>&name=ict"><input type="viewDoc" name="ict" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>

                </tr>
                <tr>
                    <td style="text-align:left"> 12] </td>
                    <td style="text-align:left">Smart board usage and proofs</td>

                    <td><a target='_blank' href="backend/auditorViewDocSub.php?courseID=<?php echo $courseID; ?>&division=<?php echo $division; ?>&name=smartBoard"><input type="viewDoc" name="smartBoard" value="View" class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>

                </tr>
            </table>
        </div>
        <!-- ###########################################################################################################
                               PREVIOUS RESPONSE GIVEN TO TEACHER:
########################################################################################################### -->

<div class="div1" style="max-width:80%">PREVIOUS RESPONSE GIVEN TO TEACHER</div>
            <?php
            include "backend/include/conn.php";
            $courseID = $_GET['courseID'];
            $sql1 = "select audit1 from hodfeedback WHERE courseID='$courseID' and audit1 is not NULL ";
            $result1 = $conn->query($sql1);
            $data1 = mysqli_query($conn, $sql1);
            $total1 = mysqli_num_rows($data1);
            $i=1;
            if ($total1 != 0) {
                while ($result1 = mysqli_fetch_assoc($data1)) {
                    echo '
                        <div class="leftDisplayBox"style="margin:0px auto; overflow:auto; max-height:550px">
                        <table class="table table-bordered" cellspacing="0" style="text-align: center; margin:1rem auto; width:80%" >
                        <tr>
                            <th style="width:50px;">Sr.No.</th>
                            <th>Feedback</th>
                        </tr>    
                        <tr><td> '.$i.' </td><td>';
                    echo $result1['audit1'];
                    echo '</td></tr></table>';
                    echo '</div>';
                    $i++;
                }
            }
            ?>

        <div class="div1" style="max-width:80%">Final Response
        </div>
        <div class="Feedback" style="margin:0px auto 2rem">
            <?php $teaType = "speTea";
            $audType = "aud1";
            $classOrLab = "class"; ?>
            <input type='hidden' id="teaType" name='teaType' value='<?php echo $teaType; ?>' readonly='readonly' />
            <input type='hidden' id="audType" name='audType' value='<?php echo $audType; ?>' readonly='readonly' />
            <input type='hidden' id="class" name='class' value='<?php echo $classOrLab; ?>' readonly='readonly' />



            <p><textarea type="text" name="finalSugg" id="finalSugg" style="resize:none; height:5rem; width:30rem;  margin-top: .8rem;" placeholder="Enter Response for teacher" required></textarea></p>
            <input type="submit" name="submit" value="Submit" class="btn btn-success" style="padding:6px 0px; margin:0px auto 1rem; width:10%" />
        </div>
        </div>
    </form>


<!-- js for bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>