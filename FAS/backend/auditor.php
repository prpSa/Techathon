<?php
    
    if(isset($_POST['submit']) && !empty($_POST['submit'])){
        include "include/conn.php";

        $courseID = '2';
        $courseDetails = $_POST['cd'];
        $courseObj = $_POST['courseObj'];
        $courseOut = $_POST['courseOut'];
        $progOut = $_POST['progOut'];
        $m_copo = $_POST['m_copo'];
        $pso= $_POST['pso'];
        $m_copso = $_POST['m_copso'];
        $courseWeig = $_POST['courseWeig'];
        $expList = $_POST['expList'];
        $assesment = $_POST['assesment'];
        $finalSugg = $_POST['finalSugg'];

        $sql = "UPDATE `auditor` SET  `courseDetailsA` = '$courseDetails',  `courseObjA` = '$courseObj', `courseOutA` = '$courseOut', `progOutA` = '$progOut',  `m_copoA` = '$m_copo',  `psoA` = '$pso', `m_copsoA` = '$m_copso' ,  `courseWeigA` ='$courseWeig' ,  `expListA` = '$expList', `assesmentA` = '$assesment', `finalRemarksA` ='$finalSugg' WHERE courseID = '$courseID' ";
        
        if($conn-> query($sql)==true){
            echo "Success";
        }
        else{
            echo "Error";
        }
        $conn -> close();
    
    }
     
?>