<?php
    global $username,$courseID , $tea_username,$division,$audType;
    $username = $_GET['username']; 
    $courseID = $_GET['courseID'];
    include 'validate.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/viewAuditorObservation.css">
    <!-- Font Awesome  -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap css  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- js for file and bootstrap  -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <title>Teacher View Doc</title>
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
            <h4 style="font-weight:1000">Teacher View Form</h4>
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

    <form method="POST" action="subjectTeacherHome.php?username=<?php echo $username;?>">
<div class="table1">
    <table class="table2" cellspacing="0" style="text-align: left; margin:1rem auto; width:80%; color:black" >
    <tr>
        <th> Sr.No.</th>
        <th> Audit Observation Point </th>
        <th> View Document </th>
    </tr>   
    <tr>
        <td> 1]  </td>
        <td>Prerequisite test performance of students and thereafter action taken</td>
       <td><a target='_blank' href="backend/teaViewDoc2.php?courseID=<?php echo $courseID;?>&username=<?php echo $username;?>&name=prerequisite"><input type='viewDoc' name='prerequisite' value='View' class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly"/></a></td>   

    </tr> <tr>
        <td> 2]  </td>
        <td>All documents verified and certified in course file</td>
       <td><a target='_blank' href="backend/teaViewDoc2.php?courseID=<?php echo $courseID;?>&username=<?php echo $username;?>&name=documentsVerified"><input type='viewDoc' name='documentsVerified' value='View' class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly"/></a></td>   

    </tr>  
    <tr>
        <td> 3]  </td>
        <td>Defaulter list justified</td>
        <td><a target='_blank' href="backend/teaViewDoc2.php?courseID=<?php echo $courseID;?>&username=<?php echo $username;?>&name=defaulterList"><input type='viewDoc' name='defaulterList' value='View' class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly"/></a></td>   

    </tr> 
    <tr>
        <td> 4]  </td>
        <td>LMS uploading status and usage by students</td>
       <td><a target='_blank' href="backend/teaViewDoc2.php?courseID=<?php echo $courseID;?>&username=<?php echo $username;?>&name=lms"><input type="viewDoc" name="lms" value='View' class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td> 

    </tr> 
    <tr>
        <td> 5]  </td>
        <td> DCF and its consistency with course file contents</td>
       <td><a target='_blank' href="backend/teaViewDoc2.php?courseID=<?php echo $courseID;?>&username=<?php echo $username;?>&name=dcf"><input type="viewDoc" name="dcf" value='View' class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>   

    </tr> 
    <tr>
        <td> 6]  </td>
        <td>E-attendance & consistency with course coverage & other subject teachers</td>
       <td><a target='_blank' href="backend/teaViewDoc2.php?courseID=<?php echo $courseID;?>&username=<?php echo $username;?>&name=eAttendance"><input type="viewDoc" name="eAttendance" value='View' class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>  

    </tr> 
    <tr>
        <td> 7]  </td>
        <td>Syllabus coverage and its consistency with the number of classes allocated</td>
       <td><a target='_blank' href="backend/teaViewDoc2.php?courseID=<?php echo $courseID;?>&username=<?php echo $username;?>&name=syllabusCoverage"><input type="viewDoc" name="syllabusCoverage" value='View' class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>  

    </tr> 
    <tr>
        <td> 8]  </td>
        <td>Workshops/ expert lecture  conduction</td>
      <td><a target='_blank' href="backend/teaViewDoc2.php?courseID=<?php echo $courseID;?>&username=<?php echo $username;?>&name=workshopConduction"><input type="viewDoc" name="workshopConduction" value='View' class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>  

    </tr>
    <tr>
        <td> 9]  </td>
        <td>Books referred to teach the course</td>
       <td><a target='_blank' href="backend/teaViewDoc2.php?courseID=<?php echo $courseID;?>&username=<?php echo $username;?>&name=workshopConduction"><input type="viewDoc" name="workshopConduction" value='View' class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>  

    </tr>
    <tr>
        <td> 10]  </td>
        <td>Identifying and remembering best and weak students and action taken thereafter</td>
       <td><a target='_blank' href="backend/teaViewDoc2.php?courseID=<?php echo $courseID;?>&username=<?php echo $username;?>&name=identifyStudents"><input type="viewDoc" name="identifyStudents" value='View' class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>  

    </tr> 
    <tr>
        <td> 11]  </td>
        <td>Continuous evaluation in labs</td>
       <td><a target='_blank' href="backend/teaViewDoc2.php?courseID=<?php echo $courseID;?>&username=<?php echo $username;?>&name=evaluationLabs"><input type="viewDoc" name="evaluationLabs" value='View' class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>   

    </tr>  
    <tr>
        <td> 12]  </td>
        <td>Additional experiments/Mini Projects</td>
       <td><a target='_blank' href="backend/teaViewDoc2.php?courseID=<?php echo $courseID;?>&username=<?php echo $username;?>&name=additionalExperiments"><input type="viewDoc" name="additionalExperiments" value='View' class="btn btn-success" style="padding:3px 0px; width:35%" readonly="readonly" style="text-align: center;"></input></a></td>  

    </tr> 
    
    </table>
</div>
<div class="div1" style="text-align:center; width:80%">Back to Homepage
</div>
<div class="Feedback">
        <input type="submit" name="submit" value="Back To Homepage" style="padding:6px 0px; margin:0px auto 1rem; width: 15%" class="btn btn-success"/>
</div>
</form>

<!-- js for bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>