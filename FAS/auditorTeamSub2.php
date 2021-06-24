<?php
    global $username,$courseID , $tea_username,$division;
    $username = $_GET['username']; 
    $courseID = $_GET['courseID'];
    $tea_username = $_GET['tea_username'];
    $division = $_GET['division'];
    include 'validate.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/viewAuditorObservation.css">
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
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Auditor View</title>
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
            <h4 style="font-weight:1000">AuditorII-Response</h4>
        </div>

        <div class="navbarRight">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown" >
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size:1rem; font-weight:600"><?php echo $username;?></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="http://localhost/FAS/audHome.php?username=<?php echo $username;?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>Audit</a></a>
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
<form method="POST" style="background-color:white" action="backend/auditorbackendSub2.php?username=<?php echo $username;?>&courseID=<?php echo $courseID; ?>&username=<?php echo $tea_username; ?>&tea_username=<?php echo $tea_username; ?>">
<div class="table1" style="background-color:white">
    <table class="table2" cellspacing="0" style="text-align: left; margin:1rem auto; width:80%; color:black">
    <tr>
        <th style="text-align:center"> Sr.No.</th>
        <th style="text-align:center"> Audit Observation Point </th>
        <th style="text-align:center"> Document Verified </th>
        <th style="text-align:center"> View Document </th>
    </tr>   
    <tr>
        <td> 1]  </td>
        <td>Prerequisite test performance of students and thereafter action taken</td>
        <td> <input type="radio" style="height: 1.5rem; width:1.5rem;" id="prerequisitee" name="prerequisitee" value="yes" required="required" >
        <label for="prerequisitee">Yes</label>
        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="prerequisitee" name="prerequisitee" value="no" required="required" >
        <label for="prerequisitee">No</label></td>

        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=prerequisite"><input type='viewDoc' name='prerequisite' value='View' class="btn btn-success" style="padding:3px 0px; width:50%" readonly='readonly'/></a></td>    

    </tr> <tr>
        <td> 2]  </td>
        <td>All documents verified and certified in course file</td>
        <td> <input type="radio" style="height: 1.5rem; width:1.5rem;" id="documentsVerifiede" name="documentsVerifiede" value="yes" required="required" >
        <label for="documentsVerifiede">Yes</label>
        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="documentsVerifiede" name="documentsVerifiede" value="no" required="required" >
        <label for="documentsVerifiede">No</label></td>

        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=documentsVerified"><input type='viewDoc' name='documentsVerified'style="padding:3px 0px; width:50%" value='View' class="btn btn-success" readonly='readonly'/></a></td> 

    </tr>  
    <tr>
        <td> 3]  </td>
        <td>Defaulter list justified</td>
        <td> <input type="radio" style="height: 1.5rem; width:1.5rem;" id="defaulter" name="defaulter" value="yes" required="required" >
        <label for="defaulter">Yes</label>
        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="defaulter" name="defaulter" value="no" required="required" >
        <label for="defaulter">No</label></td>

        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=defaulterList"><input type='viewDoc' name='defaulterList' value='View' class="btn btn-success" style="padding:3px 0px; width:50%" readonly='readonly'/></a></td>    

    </tr> 
    <tr>
        <td> 4]  </td>
        <td>LMS uploading status and usage by students</td>
        <td> <input type="radio" style="height: 1.5rem; width:1.5rem;" id="lmse" name="lmse" value="yes" required="required">
        <label for="lmse">Yes</label>
        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="lmse" name="lmse" value="no" required="required">
        <label for="lmse">No</label></td>

        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=lms"><input type="viewDoc" name="lms" value="View" class="btn btn-success" style="padding:3px 0px; width:50%" readonly='readonly'></input></a></td> 

    </tr> 
    <tr>
        <td> 5]  </td>
        <td> DCF and its consistency with course file contents</td>
        <td> <input type="radio" style="height: 1.5rem; width:1.5rem;" id="dcfe" name="dcfe" value="yes" required="required" >
        <label for="dcfe">Yes</label>
        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="dcfe" name="dcfe" value="no" required="required">
        <label for="dcfe">No</label></td>

        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=dcf"><input type="viewDoc" name="dcf" value="View" class="btn btn-success"  style="padding:3px 0px; width:50%" readonly='readonly'></input></a></td>   

    </tr> 
    <tr>
        <td> 6]  </td>
        <td>E-attendance & consistency with course coverage & other subject teachers</td>
        <td> <input type="radio" style="height: 1.5rem; width:1.5rem;" id="eAttendancee" name="eAttendancee" value="yes" required="required">
        <label for="eAttendancee">Yes</label>
        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="eAttendancee" name="eAttendancee" value="no" required="required">
        <label for="eAttendancee">No</label></td>

        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=eAttendance"><input type="viewDoc" name="eAttendance" value="View" class="btn btn-success" style="padding:3px 0px; width:50%" readonly='readonly'></input></a></td>   

    </tr> 
    <tr>
        <td> 7]  </td>
        <td>Syllabus coverage and its consistency with the number of classes allocated</td>
        <td> <input type="radio" style="height: 1.5rem; width:1.5rem;" id="syllabus" name="syllabus" value="yes" required="required">
        <label for="syllabus">Yes</label>
        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="syllabus" name="syllabus" value="no" required="required">
        <label for="syllabus">No</label></td>

        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=syllabusCoverage"><input type="viewDoc" name="syllabusCoverage" value="View" class="btn btn-success" style="padding:3px 0px; width:50%"readonly='readonly'></input></a></td>

    </tr> 
    <tr>
        <td> 8]  </td>
        <td>Workshops/ expert lecture  conduction</td>
        <td> <input type="radio" style="height: 1.5rem; width:1.5rem;" id="lecture" name="lecture" value="yes" required="required">
        <label for="lecture">Yes</label>
        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="lecture" name="lecture" value="no" required="required">
        <label for="lecture">No</label></td>
        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=workshopConduction"><input type="viewDoc" name="workshopConduction" value="View" class="btn btn-success" style="padding:3px 0px; width:50%" readonly='readonly'></input></a></td>  
  

    </tr>
    <tr>
        <td> 9]  </td>
        <td>Books referred to teach the course</td>
        <td> <input type="radio" style="height: 1.5rem; width:1.5rem;" id="booksReferred" name="booksReferred" value="yes" required="required">
        <label for="booksReferred">Yes</label>
        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="booksReferred" name="booksReferred" value="no" required="required">
        <label for="booksReferred">No</label></td>
        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=workshopConduction"><input type="viewDoc" name="workshopConduction" value="View" class="btn btn-success" style="padding:3px 0px; width:50%"  readonly='readonly'></input></a></td>  

    </tr>
    <tr>
        <td> 10]  </td>
        <td>Identifying and remembering best and weak students and action taken thereafter</td>
        <td> <input type="radio" style="height: 1.5rem; width:1.5rem;" id="bestWeakStudent" name="bestWeakStudent" value="yes" required="required">
        <label for="bestWeakStudent">Yes</label>
        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="bestWeakStudent" name="bestWeakStudent" value="no" required="required" >
        <label for="bestWeakStudent">No</label></td>
        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=identifyStudents"><input type="viewDoc" name="identifyStudents" value="View" class="btn btn-success" style="padding:3px 0px; width:50%" readonly='readonly'></input></a></td>   

    </tr> 
    <tr>
        <td> 11]  </td>
        <td>Continuous evaluation in labs</td>
        <td> <input type="radio" style="height: 1.5rem; width:1.5rem;" id="lab" name="lab" value="yes" required="required">
        <label for="lab">Yes</label>
        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="lab" name="lab" value="no" required="required">
        <label for="lab">No</label></td>
        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=evaluationLabs"><input type="viewDoc" name="evaluationLabs" value="View" class="btn btn-success" style="padding:3px 0px; width:50%"readonly='readonly'></input></a></td>  

    </tr>  
    <tr>
        <td> 12]  </td>
        <td>Additional experiments/Mini Projects</td>
        <td> <input type="radio" style="height: 1.5rem; width:1.5rem;" id="additionalExperiment" name="additionalExperiment" value="yes" required="required">
        <label for="additionalExperiment">Yes</label>
        <input type="radio" style="height: 1.5rem; width:1.5rem;" id="additionalExperiment" name="additionalExperiment" value="no" required="required" >
        <label for="additionalExperiment">No</label></td>
        <td><a target='_blank' href="backend/auditorViewDocIISub.php?courseID=<?php echo $courseID;?>&division=<?php echo $division;?>&tea_username=<?php echo $tea_username;?>&name=additionalExperiments"><input type="viewDoc" name="additionalExperiments" value="View" class="btn btn-success" style="padding:3px 0px; width:50%" readonly='readonly'></input></a></td>   

    </tr> 
    
    </table>
</div>
<div class="Submit" style=" margin:1rem auto; width:80%">Suggestion to Teacher Team
</div>
<div class="Feedback">
        <p><input type="text" name="finalSugg" id="finalSugg"  style="font-size: 1.5rem; margin-top: .8rem; width: 500px; height: 100px;" placeholder="Enter Response for Teacher " require ></p>
        <p style="display:inline; margin:.5rem"> Form Status:</p> 
            <input type="radio" style="height: 1.5rem; width:1.5rem;" id="audStatus" name="audStatus" value="approved" >
            <label for="audStatusYes">Approved</label>
            &emsp;
            <input type="radio" style="height: 1.5rem; width:1.5rem;" id="audStatus" name="audStatus" value="Nsubmitted" >
            <label for="audStatusNo">Changes Required</label><br><br>
        <input type="submit" name="submit" value="Submit" style="padding:6px 0px; margin:0px auto 1rem; width:10%" class="btn btn-success"/>
</div>
</form>

</main>
<!-- js for bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>