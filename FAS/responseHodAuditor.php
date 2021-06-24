<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/viewAuditorObservation.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Auditor View</title>
</head>
<body>

<?php

include 'validate.php';
$courseID = $_GET['courseID'];

?>


<h3 style="text-align: center; margin: 10px;">Auditor Form</h3>
<form method="POST" action="backend/hodAudDoc.php?courseID=<?php echo $courseID; ?>">
<div class="table1" >
    <table class="table2" cellspacing="0" style="width:98%; margin:0px auto;" >
    <tr>
        <th> Sr.No.</th>
        <th> Audit Observation Point </th>
        <th> Is Document Uploaded ? </th>
        <th> View Document </th>
    </tr>    
    <tr>
        <td> 1]  </td>
        <td>Defaulter list justified</td>
        <td> <table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        $sql = "SELECT  `defaulter_list_fdbk` FROM `audit-i_response` WHERE courseID ='".$courseId."' ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['defaulter_list_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>

        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID;?>&name=defaulterList"><input type='viewDoc' name='defaulterList' value='View Document' class="button button2" readonly='readonly'/></a></td>   

    </tr> 
    <tr>
        <td> 2]  </td>
        <td>LMS uploading status and usage by students</td>
        <td><table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        $sql ="SELECT `LMS_fdbk` FROM `audit-i_response` WHERE courseID ='".$courseId."' ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['LMS_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>

        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID;?>&name=lms"><input type="viewDoc" name="lms" value="View Document" class="button button2" style="text-align: center;"readonly='readonly'></input></a></td> 

    </tr> 
    <tr>
        <td> 3]  </td>
        <td> DCF and its consistency with course file contents</td>
        <td><table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];
                        $sql ="SELECT  `DCF_fdbk` FROM `audit-i_response` WHERE courseID ='".$courseId."' ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['DCF_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>

        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID;?>&name=dcf"><input type="viewDoc" name="dcf" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>   

    </tr> 
    <tr>
        <td> 4]  </td>
        <td>E-attendance & consistency with course coverage & other subject teachers</td>
        <td> <table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT `e-attendance_fdbk` FROM `audit-i_response` WHERE courseID ='".$courseId."' ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                               ".$result['e-attendance_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>

        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID;?>&name=eAttendance"><input type="viewDoc" name="eAttendance" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>  

    </tr> 
    <tr>
        <td> 5]  </td>
        <td>Syllabus coverage and its consistency with the number of classes allocated</td>
        <td> <table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT  `syllabus_coverage_fdbk` FROM `audit-i_response` WHERE courseID ='".$courseId."' ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['syllabus_coverage_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>

        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID;?>&name=syllabusCoverage"><input type="viewDoc" name="syllabusCoverage" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>  

    </tr> 
    <tr>
        <td> 6]  </td>
        <td>Identifying and remembering best and weak students and action taken thereafter</td>
        <td> <table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT  `identify_students_fdbk` FROM `audit-i_response` WHERE courseID ='".$courseId."' ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['identify_students_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>
        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID;?>&name=identifyStudents"><input type="viewDoc" name="identifyStudents" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>  

    </tr> 
    <tr>
        <td> 7]  </td>
        <td>Continuous evaluation in labs</td>
        <td><table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT  `evaluation_labs_fdbk`FROM `audit-i_response` WHERE courseID ='".$courseId."' ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['evaluation_labs_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>
        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID;?>&name=evaluationLabs"><input type="viewDoc" name="evaluationLabs" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>   

    </tr> 
    <tr>
        <td> 8]  </td>
        <td>Workshops/ expert lecture  conduction</td>
        <td> <table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT   `workshop_conduction_fdbk` FROM `audit-i_response` WHERE courseID ='".$courseId."' ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['workshop_conduction_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>
        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID;?>&name=workshopConduction"><input type="viewDoc" name="workshopConduction" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>  

    </tr> 
    <tr>
        <td> 9]  </td>
        <td>EPI performance of previous end sem and current semester exams with peers</td>
        <td> <table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT  `EPI_fdbk` FROM `audit-i_response` WHERE courseID ='".$courseId."' ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['EPI_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>
        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID;?>&name=epi"><input type="viewDoc" name="epi" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>  

    </tr> 
    <tr>
        <td> 10]  </td>
        <td>Sample copies of evaluation components and their marking</td>
        <td><table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT  `sample_copies_fdbk` FROM `audit-i_response` WHERE courseID ='".$courseId."' ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                               ".$result['sample_copies_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>
        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID;?>&name=sampleCopies"><input type="viewDoc" name="sampleCopies" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>   
    </tr>    
    <tr>
        <td> 11]  </td>
        <td>ICT activities in class room along with proofs</td>
        <td><table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT `ICT_fdbk` FROM `audit-i_response` WHERE courseID ='".$courseId."' ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['ICT_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>

        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID;?>&name=ict"><input type="viewDoc" name="ict" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>  

    </tr>    
    <tr>
        <td> 12]  </td>
        <td>Smart board usage and proofs</td>
        <td><table cellspacing="5"> 
               <?php     include "backend/include/conn.php";
                        $courseId=$_GET['courseID'];;
                        $sql ="SELECT  `smart_board_fdbk` FROM `audit-i_response` WHERE courseID ='".$courseId."' ";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo "
                                ".$result['smart_board_fdbk']."";
                            }
                        } else {
                            echo "0 results";
                        }
                ?>
                </table></td>

        <td><a target='_blank' href="backend/auditorViewDoc.php?courseID=<?php echo $courseID;?>&name=smartBoard"><input type="viewDoc" name="smartBoard" value="View Document" class="button button2" style="text-align: center;" readonly='readonly'></input></a></td>  

    </tr>    
    </table>
</div>
<div class="Submit">Give Feedback to Auditor
</div>
<div class="Feedback">
        <p><input type="text" name="finalSugg" id="finalSugg"  style="font-size: 1.5rem; margin-top: .8rem; width: 500px; height: 100px;" placeholder="Enter Feedback to Auditor " require ></p>
        <input type="submit" name="submit" value="Submit" class="button button2"/>
</div>
</form>


</body>
</html>