<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/auditorIIViewResponse.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>AuditorII View Response</title>
</head>
<body>

<?php

include 'validate.php';
$courseID = $_GET['courseID'];

?>


<h3 style="text-align: center; margin: 10px;">Auditor Form</h3>
<form method="POST" action="teacherhome.php">
<div class="table1">
    <table class="table2" cellspacing="0" style="width:98%; margin:0px auto;" >
    <tr>
        <th> Sr.No.</th>
        <th> Audit Observation Point </th>
        <th> Is Document Uploaded ? </th>
        <th> View Document </th>
    </tr>   
    <tr>
        <td> 1]  </td>
        <td>Prerequisite test performance of students and thereafter action taken</td>
        <td> <table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        $sql = "SELECT  `prerequisite_fdbk` FROM `audit-ii_response` WHERE courseID ='".$courseId."' ";
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

        <td><a target='_blank' href="backend/auditorViewDocII.php?courseID=<?php echo $courseID;?>&name=prerequisite"><input type='viewDoc' name='prerequisite' value='View Document' class="button button2" readonly='readonly'/></a></td>   

    </tr> <tr>
        <td> 2]  </td>
        <td>All documents verified and certified in course file</td>
        <td><table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        $sql ="SELECT `documentsVerified_fdbk` FROM `audit-ii_response` WHERE courseID ='".$courseId."' ";
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

        <td><a target='_blank' href="backend/auditorViewDocII.php?courseID=<?php echo $courseID;?>&name=documentsVerified"><input type='viewDoc' name='documentsVerified' value='View Document' class="button button2" readonly='readonly'/></a></td>   

    </tr>  
    <tr>
        <td> 3]  </td>
        <td>Defaulter list justified</td>
        <td><table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        $sql ="SELECT  `defaulterList_fdbk` FROM `audit-ii_response` WHERE courseID ='".$courseId."' ";
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

        <td><a target='_blank' href="backend/auditorViewDocII.php?courseID=<?php echo $courseID;?>&name=defaulterList"><input type='viewDoc' name='defaulterList' value='View Document' class="button button2" readonly='readonly'/></a></td>   

    </tr> 
    <tr>
        <td> 4]  </td>
        <td>LMS uploading status and usage by students</td>
        <td> <table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT `lms_fdbk` FROM `audit-ii_response` WHERE courseID ='".$courseId."' ";
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

        <td><a target='_blank' href="backend/auditorViewDocII.php?courseID=<?php echo $courseID;?>&name=lms"><input type="viewDoc" name="lms" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td> 

    </tr> 
    <tr>
        <td> 5]  </td>
        <td> DCF and its consistency with course file contents</td>
        <td> <table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT  `dcf_fdbk` FROM `audit-ii_response` WHERE courseID ='".$courseId."' ";
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

        <td><a target='_blank' href="backend/auditorViewDocII.php?courseID=<?php echo $courseID;?>&name=dcf"><input type="viewDoc" name="dcf" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>   

    </tr> 
    <tr>
        <td> 6]  </td>
        <td>E-attendance & consistency with course coverage & other subject teachers</td>
        <td> <table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT  `eAttendance_fdbk` FROM `audit-ii_response` WHERE courseID ='".$courseId."' ";
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

        <td><a target='_blank' href="backend/auditorViewDocII.php?courseID=<?php echo $courseID;?>&name=eAttendance"><input type="viewDoc" name="eAttendance" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>  

    </tr> 
    <tr>
        <td> 7]  </td>
        <td>Syllabus coverage and its consistency with the number of classes allocated</td>
        <td><table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT  `syllabusCoverage_fdbk`FROM `audit-ii_response` WHERE courseID ='".$courseId."' ";
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

        <td><a target='_blank' href="backend/auditorViewDocII.php?courseID=<?php echo $courseID;?>&name=syllabusCoverage"><input type="viewDoc" name="syllabusCoverage" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>  

    </tr> 
    <tr>
        <td> 8]  </td>
        <td>Workshops/ expert lecture  conduction</td>
        <td> <table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT   `workshopConduction_fdbk` FROM `audit-ii_response` WHERE courseID ='".$courseId."' ";
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
        <td><a target='_blank' href="backend/auditorViewDocII.php?courseID=<?php echo $courseID;?>&name=workshopConduction"><input type="viewDoc" name="workshopConduction" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>  

    </tr>
    <tr>
        <td> 9]  </td>
        <td>Books referred to teach the course</td>
        <td> <table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT  `booksReferred_fdbk` FROM `audit-ii_response` WHERE courseID ='".$courseId."' ";
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
        <td><a target='_blank' href="backend/auditorViewDocII.php?courseID=<?php echo $courseID;?>&name=workshopConduction"><input type="viewDoc" name="workshopConduction" value="View Document" class="button button2" style="text-align: center;"  readonly='readonly'></input></a></td>  

    </tr>
    <tr>
        <td> 10]  </td>
        <td>Identifying and remembering best and weak students and action taken thereafter</td>
        <td><table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT  `identifyStudents_fdbk` FROM `audit-ii_response` WHERE courseID ='".$courseId."' ";
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
        <td><a target='_blank' href="backend/auditorViewDocII.php?courseID=<?php echo $courseID;?>&name=identifyStudents"><input type="viewDoc" name="identifyStudents" value="View Document" class="button button2" style="text-align: center;"  readonly='readonly'></input></a></td>  

    </tr> 
    <tr>
        <td> 11]  </td>
        <td>Continuous evaluation in labs</td>
        <td><table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT `evaluationLabs_fdbk` FROM `audit-ii_response` WHERE courseID ='".$courseId."' ";
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
        <td><a target='_blank' href="backend/auditorViewDocII.php?courseID=<?php echo $courseID;?>&name=evaluationLabs"><input type="viewDoc" name="evaluationLabs" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>   

    </tr>  
    <tr>
        <td> 12]  </td>
        <td>Additional experiments/Mini Projects</td>
        <td><table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT  `additionalExperiments_fdbk` FROM `audit-ii_response` WHERE courseID ='".$courseId."' ";
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
        <td><a target='_blank' href="backend/auditorViewDocII.php?courseID=<?php echo $courseID;?>&name=additionalExperiments"><input type="viewDoc" name="additionalExperiments" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>  

    </tr> 
    
    </table>
</div>
<div class="Submit">Suggestion to Teacher Team
</div>
<div class="Feedback">
<table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseID=$_GET['courseID'];
                        $sql = "SELECT `finalSugg_fdbk` FROM `audit-ii_response` where courseID ='".$courseID."' ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                <tr><td>Final Suggestion: ".$result['finalSugg_fdbk']."</td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
        </table>
        <input type="submit" name="submit" value="Back To Homepage" style="padding:20px; width:auto; margin:0px auto" class="button button2"/>
</div>
</form>


</body>
</html>