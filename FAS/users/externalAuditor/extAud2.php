<?php
    session_start();
    global $audUsername, $year, $sem, $courseName,$courseID,$division,$teaUsername,$subjectCode,$docType,$role,$dept;
    $audUsername = $_SESSION['username'];
    $year = $_SESSION['year'];
    $sem = $_SESSION['sem'];
    $dept=$_SESSION['dept'];
    $courseName = $_SESSION['sub'];
    $courseID = $_GET['courseID'];
    $division = $_GET['division'];
    $teaUsername =$_GET['teaUsername'];
    $subjectCode= $_GET['subjectCode'];
    $docType="aud2";
    $role="extAuditor";
    // include '../../validate.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/audTeaRes.css">
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
<?php
function hodUsername($depart)
{
     include "../../backend/include/conn.php";
    $sql = "SELECT name from users where dept ='" . $depart . "' AND role ='hod' ";
    $result = $conn->query($sql);
    $data = mysqli_query($conn, $sql);
    $total = mysqli_num_rows($data);
    if ($total != 0) {
        while ($result = mysqli_fetch_assoc($data)) {
        $hodusername=$result['name'];
         return $hodusername ;
        
        }
    }
}
    // error_reporting(E_ALL ^ E_WARNING); 
   
    if (isset($_POST['submit'])) {
        $hodUsername=hodUsername($dept);
        include "../../backend/include/conn.php";
        $academicYear=$year;
        $comment=$_POST['finalSugg'];
        date_default_timezone_set('Asia/Kolkata');
        $date=date('Y-m-d h:i:s A');
        $sql = "SELECT * FROM audcomment GROUP BY academicYear,dept,sem HAVING courseName='$courseName' AND division='$division' AND docType='$docType' AND audUsername='$audUsername' ";
        $result = $conn->query($sql);
        echo $sql;
        $data = mysqli_query($conn, $sql);
        $total = mysqli_num_rows($data);
        echo $total;
        if ($total != 0) {
            $update="UPDATE `audcomment` SET `comment`='$comment',`date&time`='$date' WHERE `courseID`='$courseID' AND division='$division' AND docType='$docType' AND audUsername='$audUsername'";
            $query = mysqli_query($conn,$update);
            header("location:subCard.php");
            exit();
        }
        else{
            $insert= "INSERT INTO `audcomment`( `courseID`, `academicYear`, `dept`, `year`, `sem`, `courseName`, `subjectCode`, `division`, `teaUsername`, `hodUsername`, `role`, `audUsername`, `docType`, `comment`, `date&time`) VALUES ('$courseID','$academicYear','$dept','$year','$sem','$courseName','$subjectCode','$division','$teaUsername','$hodUsername','$role','$audUsername','$docType','$comment','$date')";
            $query = mysqli_query($conn,$insert);
            header("location:subCard.php");
            exit();
    }
    }
?>
<!-- Navbar -->
<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div id="navbarCollapse" class="collapse navbar-collapse">
 
        <div class="navbarLeft">
        <a href="http://localhost/FAS/extAudHome.php?username=<?php echo $audUsername; ?>"><img src="../../css/images/dylogo.png" style="width:10rem; height:4rem" ></a>
        </div>

        <div class="navbarCenter">
            <h4 style="font-weight:1000">External Auditor-Response II</h4>
        </div>

        <div class="navbarRight">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown" >
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size:1rem; font-weight:600"><?php echo $audUsername;?></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="http://localhost/FAS/extAudHome.php?username=<?php echo $audUsername; ?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>Home Page</a></a>
                        <a href="http://localhost/FAS/fasprofile/profile.php?username=<?php echo $audUsername; ?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i>Profile</a>
                        <a href="contactus.php?username=<?php echo $audUsername;?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-question-circle fa-sm fa-fw mr-2 text-gray-400"></i>Query</a>
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

        <form method="POST" style="background-color:white" action="extAud2.php?username=<?php echo $audUsername; ?>&courseID=<?php echo $courseID; ?>&teaUsername=<?php echo $teaUsername;?>&division=<?php echo $division; ?>&subjectCode=<?php echo $subjectCode; ?>">

            <div class="ta" style="background-color:white">
                <table class="table2" cellspacing="0" style="text-align: left; margin:1rem auto; width:80%; color:black">
                    <tr>
                        <th> Sr.No.</th>
                        <th style="text-align:center"> Audit Observation Point </th>
                        <th style="text-align:center"> Is Document Uploaded ? </th>
                        <th style="text-align:center"> View Document </th>
                    </tr>
                    <tr>
        <td> 1]  </td>
        <td>Prerequisite test performance of students and thereafter action taken</td>
        <td> <table cellspacing="5"> 
               <?php     include "../../backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        
                        $division = $_GET['division'];
                        $sql = "SELECT  `prerequisite_fdbk` FROM `audit_res` WHERE courseID ='".$courseId."' AND  division='$division' AND audType='aud2'  ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['prerequisite_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>

        <td><a target='_blank' href="../../backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division; ?>&name=prerequisite"><input type='viewDoc' name='prerequisite' value='View' class="btn btn-success" style="padding:3px 0px; width:50%" readonly='readonly'/></a></td>   

    </tr> <tr>
        <td> 2]  </td>
        <td>All documents verified and certified in course file</td>
        <td><table cellspacing="5"> 
               <?php     include "../../backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        
                        $division = $_GET['division'];
                        $sql ="SELECT `documentsVerified_fdbk` FROM `audit_res` WHERE courseID ='".$courseId."' AND  division='$division' AND audType='aud2'  ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['documentsVerified_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>

        <td><a target='_blank' href="../../backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division; ?>&name=documentsVerified"><input type='viewDoc' name='documentsVerified'style="padding:3px 0px; width:50%" value='View' class="btn btn-success" readonly='readonly'/></a></td>   

    </tr>  
    <tr>
        <td> 3]  </td>
        <td>Defaulter list justified</td>
        <td><table cellspacing="5"> 
               <?php     include "../../backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        
                        $division = $_GET['division'];
                        $sql ="SELECT  `defaulterList_fdbk` FROM `audit_res` WHERE courseID ='".$courseId."' AND  division='$division' AND audType='aud2'  ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['defaulterList_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>

        <td><a target='_blank' href="../../backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division; ?>&name=defaulterList"><input type='viewDoc' name='defaulterList' value='View' class="btn btn-success" style="padding:3px 0px; width:50%" readonly='readonly'/></a></td>   

    </tr> 
    <tr>
        <td> 4]  </td>
        <td>LMS uploading status and usage by students</td>
        <td> <table cellspacing="5"> 
               <?php     include "../../backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        
                        $division = $_GET['division'];
                        $sql ="SELECT `lms_fdbk` FROM `audit_res` WHERE courseID ='".$courseId."' AND  division='$division' AND audType='aud2'  ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                               ".$result['lms_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>

        <td><a target='_blank' href="../../backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division; ?>&name=lms"><input type="viewDoc" name="lms" value="View" class="btn btn-success" style="padding:3px 0px; width:50%" readonly='readonly'></input></a></td> 

    </tr> 
    <tr>
        <td> 5]  </td>
        <td> DCF and its consistency with course file contents</td>
        <td> <table cellspacing="5"> 
               <?php     include "../../backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        
                        $division = $_GET['division'];
                        $sql ="SELECT  `dcf_fdbk`  FROM `audit_res` WHERE courseID ='".$courseId."' AND  division='$division' AND audType='aud2'  ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['dcf_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>

        <td><a target='_blank' href="../../backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division; ?>&name=dcf"><input type="viewDoc" name="dcf" value="View" class="btn btn-success"  style="padding:3px 0px; width:50%" readonly='readonly'></input></a></td>   

    </tr> 
    <tr>
        <td> 6]  </td>
        <td>E-attendance & consistency with course coverage & other subject teachers</td>
        <td> <table cellspacing="5"> 
               <?php     include "../../backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        
                        $division = $_GET['division'];
                        $sql ="SELECT  `eAttendance_fdbk`  FROM `audit_res` WHERE courseID ='".$courseId."' AND  division='$division' AND audType='aud2'  ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['eAttendance_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>

        <td><a target='_blank' href="../../backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division; ?>&name=eAttendance"><input type="viewDoc" name="eAttendance" value="View" class="btn btn-success" style="padding:3px 0px; width:50%" readonly='readonly'></input></a></td>  

    </tr> 
    <tr>
        <td> 7]  </td>
        <td>Syllabus coverage and its consistency with the number of classes allocated</td>
        <td><table cellspacing="5"> 
               <?php     include "../../backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        
                        $division = $_GET['division'];
                        $sql ="SELECT  `syllabusCoverage_fdbk` FROM `audit_res` WHERE courseID ='".$courseId."' AND  division='$division' AND audType='aud2'  ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['syllabusCoverage_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>

        <td><a target='_blank' href="../../backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division; ?>&name=syllabusCoverage"><input type="viewDoc" name="syllabusCoverage" value="View" class="btn btn-success" style="padding:3px 0px; width:50%"readonly='readonly'></input></a></td>  

    </tr> 
    <tr>
        <td> 8]  </td>
        <td>Workshops/ expert lecture  conduction</td>
        <td> <table cellspacing="5"> 
               <?php     include "../../backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        
                        $division = $_GET['division'];
                        $sql ="SELECT   `workshopConduction_fdbk`  FROM `audit_res` WHERE courseID ='".$courseId."' AND  division='$division' AND audType='aud2'  ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['workshopConduction_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>
        <td><a target='_blank' href="../../backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division; ?>&name=workshopConduction"><input type="viewDoc" name="workshopConduction" value="View" class="btn btn-success" style="padding:3px 0px; width:50%" readonly='readonly'></input></a></td>  

    </tr>
    <tr>
        <td> 9]  </td>
        <td>Books referred to teach the course</td>
        <td> <table cellspacing="5"> 
               <?php     include "../../backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        
                        $division = $_GET['division'];
                        $sql ="SELECT  `booksReferred_fdbk`  FROM `audit_res` WHERE courseID ='".$courseId."' AND  division='$division' AND audType='aud2'  ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['booksReferred_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>
        <td><a target='_blank' href="../../backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division; ?>&name=workshopConduction"><input type="viewDoc" name="workshopConduction" value="View" class="btn btn-success" style="padding:3px 0px; width:50%"  readonly='readonly'></input></a></td>  

    </tr>
    <tr>
        <td> 10]  </td>
        <td>Identifying and remembering best and weak students and action taken thereafter</td>
        <td><table cellspacing="5"> 
               <?php     include "../../backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        
                        $division = $_GET['division'];
                        $sql ="SELECT  `identifyStudents_fdbk`  FROM `audit_res` WHERE courseID ='".$courseId."' AND  division='$division' AND audType='aud2'  ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                               ".$result['identifyStudents_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>
        <td><a target='_blank' href="../../backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division; ?>&name=identifyStudents"><input type="viewDoc" name="identifyStudents" value="View" class="btn btn-success" style="padding:3px 0px; width:50%" readonly='readonly'></input></a></td>  

    </tr> 
    <tr>
        <td> 11]  </td>
        <td>Continuous evaluation in labs</td>
        <td><table cellspacing="5"> 
               <?php     include "../../backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        
                        $division = $_GET['division'];
                        $sql ="SELECT `evaluationLabs_fdbk` FROM `audit_res` WHERE courseID ='".$courseId."' AND  division='$division' AND audType='aud2'  ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['evaluationLabs_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>
        <td><a target='_blank' href="../../backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division; ?>&name=evaluationLabs"><input type="viewDoc" name="evaluationLabs" value="View" class="btn btn-success" style="padding:3px 0px; width:50%"readonly='readonly'></input></a></td>   

    </tr>  
    <tr>
        <td> 12]  </td>
        <td>Additional experiments/Mini Projects</td>
        <td><table cellspacing="5"> 
               <?php     include "../../backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        
                        $division = $_GET['division'];
                        $sql ="SELECT  `additionalExperiments_fdbk`  FROM `audit_res` WHERE courseID ='".$courseId."' AND  division='$division' AND audType='aud2'  ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['additionalExperiments_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>
        <td><a target='_blank' href="../../backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division; ?>&name=additionalExperiments"><input type="viewDoc" name="additionalExperiments" value="View" class="btn btn-success" style="padding:3px 0px; width:50%" readonly='readonly'></input></a></td>  

    </tr> 
                </table>
            </div>

            <div class="div1" style="text-align:center">SUGGESTION GIVEN BY INTERNAL AUDITOR</div>

            <div class="Feedback">
                <table cellspacing="5">
                    <?php include "../../backend/include/conn.php";
                    $courseId = $_GET['courseID'];
                    $division = $_GET['division'];
                    $sql = "SELECT `finalSugg_fdbk` FROM `audit_res` WHERE courseID ='" . $courseId . "' AND  division='$division' AND audType='aud2'  ";
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
            



               
            </div>
            <div class="div1" style="text-align:center">SUGGESTION GIVEN BY INTER-DEPARTMENTAL AUDITOR</div>

<div class="Feedback">
    <table cellspacing="5">
        <?php include "../../backend/include/conn.php";
        $sql = "SELECT distinct comment FROM audcomment WHERE courseName='$courseName' AND division='$division' AND docType='$docType' AND role='idauditor' AND audUsername='$audUsername' ";
        $result = $conn->query($sql);
        $data = mysqli_query($conn, $sql);
        $total = mysqli_num_rows($data);
        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {
                echo "
                    <tr>Final Suggestion: " . $result['comment'] . "</tr>
                    <br><br>";
            }
        } else {
            echo "No comment done yet";
        }
        ?>
    </table>




   
</div>
            <div class="div1" style="text-align:center">SUGGESTION TO BE GIVEN TO TEACHER</div>
<div class="Feedback">
<?php include "../../backend/include/conn.php";
       
       $sql = "SELECT distinct comment FROM audcomment WHERE courseName='$courseName' AND division='$division' AND docType='$docType' AND role='$role' AND audUsername='$audUsername' ";
       $result = $conn->query($sql);
       $data = mysqli_query($conn, $sql);
       $total = mysqli_num_rows($data);
       if ($total != 0) {
           while ($result = mysqli_fetch_assoc($data)) {
        echo "<p><textarea type='text' name='finalSugg' id='finalSugg' style='font-size: 1.5rem; margin-top: .8rem; width: 500px; height: 100px; resize:none;' placeholder='Enter Response for Teacher ' require >" . $result['comment'] . "</textarea></p>";
    }
        } else {
            echo "<p><textarea type='text' name='finalSugg' id='finalSugg'  style='font-size: 1.5rem; margin-top: .8rem; width: 500px; height: 100px; resize:none;' placeholder='Enter Response for Teacher ' require ></textarea></p>";
            }
       ?>
       
        <input type="submit" name="submit" style="padding:6px 0px; margin:0px auto 1rem; width:10%" value="Submit" class="btn btn-success"/>
</div>
        </form>

    </main>

<!-- js for bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>