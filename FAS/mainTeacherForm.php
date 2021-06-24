<?php
    global $username;
    $username = $_GET['username']; 
    include 'validate.php';
?>
<!DOCTYPE html>
 <html>
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css  -->
    <link rel="stylesheet" type="text/css" href="css/mainTeacherForm.css"> 
    <!-- Font Awesome  -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap css  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- js for file and bootstrap  -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <title>Faculty Audit System</title>
    <script type="text/javascript">
        $(document).ready(function(){
            var html = ' <tr><td><input class="form-control" style="align-items: center; max-width: 145px;" type="text" name="Objective[]" placeholder="1" required=""></td><td><textarea class="form-control" style="align-items: center; resize:none; height:3.5rem; width: 685px;" type="text" name="Text[]" placeholder="ABCD" required=""></textarea></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="remove"></td></tr>';

            var max = 6;
            var x= 1;

            $("#add").click(function(){
                if (x<=max){
                    $("#table_field").append(html);
                    x++;
                }
            });
            $("#table_field").on('click','#remove',function(){
                $(this).closest('tr').remove();
                x--;
            });




            var htmll = ' <tr><td><input class="form-control" style="align-items: center; max-width: 80px;" type="text" name="CO_no[]" placeholder="CO2" required=""></td><td><textarea class="form-control" style="align-items: center; resize:none; height:3.5rem; width: 800px;" type="text" name="CO_name[]" placeholder="ABCD" required=""></textarea></td><td><input class="btn btn-danger" type="button" name="removee" id="removee" value="remove"></td></tr>';

            var maxx = 6;
            var xx= 1;

            $("#addd").click(function(){
                if (xx<=maxx){
                    $("#table_field_outcome").append(htmll);
                    xx++;
                }
            });
            $("#table_field_outcome").on('click','#removee',function(){
                $(this).closest('tr').remove();
                xx--;
            });

            var html_progOut = ' <tr><td><input class="form-control" style="align-items: center; max-width: 80px;" type="text" name="PO_no[]" placeholder="PO1" required=""></td><td><textarea class="form-control" style="align-items: center; resize:none; height:3.5rem; width: 150px;" type="text" name="PO_title[]" placeholder="ABCD" required=""></textarea></td><td><textarea class="form-control" style="align-items: center; resize:none; height:3.5rem; width: 600px;" type="text" name="PO_description[]" placeholder="ABCD"required=""></textarea></td><td><input class="btn btn-danger" type="button" name="remove_progOut" id="remove_progOut" value="remove"></td></tr>';

            var max_progOut = 12;
            var x_progOut= 1;

            $("#add_progOut").click(function(){
                if (x_progOut<=max_progOut){
                    $("#table_field_progOut").append(html_progOut);
                    x_progOut++;
                }
            });
            $("#table_field_progOut").on('click','#remove_progOut',function(){
                $(this).closest('tr').remove();
                x_progOut--;
            });



            var html_progSpecOut = ' <tr><td><input class="form-control" style="align-items: center; max-width: 90px;" type="text" name="PSO_no[]" placeholder="PSO1" required=""></td><td><textarea class="form-control" style="align-items: center; resize:none; height:3.5rem; width: 800px;" type="text" placeholder="ABCD" name="PSO_description[]" required=""></textarea></td><td><input class="btn btn-danger" type="button" name="remove_progSpecOut" id="remove_progSpecOut" value="remove"></td></tr>';

            var max_progSpecOut = 5;
            var x_progSpecOut= 1;

            $("#add_progSpecOut").click(function(){
                if (x_progSpecOut <= max_progSpecOut){
                    $("#table_field_progSpecOut").append(html_progSpecOut);
                    x_progSpecOut++;
                }
            });
            $("#table_field_progSpecOut").on('click','#remove_progSpecOut',function(){
                $(this).closest('tr').remove();
                x_progSpecOut--;
            });


            var html_coWeight = ' <tr><td><input class="form-control" style="align-items: center; max-width: 80px;" type="text" name="CO_noo[]" placeholder="CO1" required=""></td><td><input class="form-control" style="align-items: center; max-width: 100px;" type="text" name="noOfExp[]" placeholder="5" required=""></td><td><input class="form-control" style="align-items: center; max-width: 140px;" type="text" name="weightagePercent[]" placeholder="1"required=""></td><td><input class="btn btn-danger" type="button" name="remove_coWeight" id="remove_coWeight" value="remove"></td></tr>';

            var max_coWeight = 6;
            var x_coWeight= 1;

            $("#add_coWeight").click(function(){
                if (x_coWeight<=max_coWeight){
                    $("#table_field_coWeight").append(html_coWeight);
                    x_coWeight++;
                }
            });
            $("#table_field_coWeight").on('click','#remove_coWeight',function(){
                $(this).closest('tr').remove();
                x_coWeight--;
            });


            var html_chpPlan = ' <tr><td><input class="form-control" style="align-items: center; max-width: 120px;" type="text" name="Chp_no[]" placeholder="1" required=""></td><td><textarea class="form-control" style="align-items: center; resize:none; height:3.5rem; width: 400px;" type="text" name="topic[]" placeholder="ABCD" required=""></textarea></td><td><input class="form-control" style="align-items: center; max-width: 80px;" type="text" name="CO_nooo[]" placeholder="CO1" required=""></td><td><input class="form-control" style="align-items: center; max-width: 101px;" type="text" name="weightage[]"placeholder="10" required=""></td><td><input class="form-control" style="align-items: center; max-width: 100px;" type="text" name="duration[]" placeholder="10" required=""></td><td><input class="btn btn-danger" type="button" name="remove_chpPlan" id="remove_chpPlan" value="remove"></td></tr>';

            var max_chpPlan = 6;
            var x_chpPlan= 1;

            $("#add_chpPlan").click(function(){
                if (x_chpPlan<=max_chpPlan){
                    $("#table_field_chpPlan").append(html_chpPlan);
                    x_chpPlan++;
                }
            });
            $("#table_field_chpPlan").on('click','#remove_chpPlan',function(){
                $(this).closest('tr').remove();
                x_chpPlan--;
            });

        });

        $(document).ready(
        function(){
            $('input:file').change(
                function(){
                    if ($(this).val()) {
                        $('input:submit').attr('disabled',false);
                    } 
                }
                );
        });

    </script>
</head>


<!-- Navbar -->
<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div id="navbarCollapse" class="collapse navbar-collapse">
 
        <div class="navbarLeft">
        <a href="http://localhost/FAS/teacherhome.php?username=<?php echo $username; ?>"><img src="dylogo.png" style="width:10rem; height:4rem" ></a>
        </div>

        <div class="navbarCenter">
            <h4 style="font-weight:1000">Teacher</h4>
        </div>

        <div class="navbarRight">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown" >
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size:1rem; font-weight:600"><?php echo $username;?></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="http://localhost/FAS/mainTeacherForm.php?username=<?php echo $username;?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-plus-square fa-sm fa-fw mr-2 text-gray-400"></i>Create New Form</a>
                        <a href="http://localhost/FAS/teacherhomelab.php?username=<?php echo $username;?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><strong class="mr-2" style="text-gray-400">&nbsp;L</strong>&nbsp;Lab Home</a>
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
   

<body>
<main>

<!-- upload data using excel -->
<?php 
    if(isset($_POST['sub'])){
        $excel = $_FILES['file1']['tmp_name'];    
    }
?>
<div class="div1">UPLOAD EXCEL FILE</div>
    <div class="leftDisplayBox" >
    <br>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file1" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"/>
        <br><br>
        <input class="btn btn-success" type="submit" name="sub" disabled/>
        <br><br>
    </form>
    </div>
</div>



<form action="backend/mainTeacherFormBack.php?username=<?php echo $username;?>" method="post">


<!-- ###########################################################################################################
                                            COURSE DETAILS
########################################################################################################### -->


<div class="div1">COURSE DETAILS</div>
<div class="leftDisplayBox" >
    <div class="container" style="display:flex">

        <div class="subLeft" style="display:flex; padding:10px; margin-left:10%">
            <div class="label" style="padding:13px 5px">
                <label for= "year1">From Academic year:</label><br>
                <label for= "C name"><br>Course name:</label><br>
                <label for= "sem"><br>Semester:</label><br>
                <label for= "sub code"><br>Subject code:</label><br> 
            </div>
            <div class="Input" style="padding:5px">
                <input class='form-control' id="year1" name="year1" type="text" placeholder="2021" required=""><br>
                <select id="cname" class="cname" name="cname" placeholder="Select Subject" required="">
                <?php
                        include "backend/include/conn.php";
                        $username = $_GET['username'];
                        $sql = "SELECT * FROM `hodhomee` WHERE tea_username='$username'";
                        $result = $conn->query($sql);
                        $data = mysqli_query($conn,$sql);
                        $total =mysqli_num_rows($data);
                        if ( $total != 0) { 
                            while($result=mysqli_fetch_assoc($data)) {
                                echo '<option value="'.$result['sub_name'].'">'.$result['sub_name'].'</option>';
                            } }
                ?>
                </select>
                <input class='form-control' id="sem" name="sem" type="text" placeholder="4" required="" style="margin-top:9%"><br>
                <input class='form-control' id="subcode" name="subcode" type="text" placeholder="CSC305" required=""><br>
            </div>
        </div>

        <div class="subRight" style="display:flex; padding:10px; margin-left:10%">
            <div class="label" style="padding:13px 5px">
                <label for= "year2">To Academic year:</label><br>
                <label for= "cred"><br>Credits:</label><br>
                <label for= "lec hrs"><br>Lectures hours/week:</label><br>
                <label for= "contact hrs"><br>Total contact hours:</label><br>
            </div>

            <div class="input">
                <input class='form-control' id="year2" name="year2" type="text" placeholder="2022" required=""><br>
                <input class='form-control' id="cred" name="cred" type="text" placeholder="10" required=""><br>
                <input class='form-control' id="lec" name="lec" type="text" placeholder="22" required=""><br>
                <input class='form-control' id="contact" name="contact" type="text" placeholder="67" required=""><br>
            </div>
            
            
        </div>
    </div>

    


</div>




<!-- ###########################################################################################################
                                            COURSE OBJECTIVE
########################################################################################################### -->


<div class="div1">COURSE OBJECTIVE
</div>
<div class="leftDisplayBox">
    <div class="input-field">
        <table class="table table-bordered" cellspacing="0" style="border:none;margin:1rem auto; width:70%" id="table_field">
            <tr>
                <th>Objective NO.</th>
                <th>Objectives</th>
                <th><input class='btn btn-warning' type='button' name='add' id='add' value='Add'></th>
            </tr>
            <tr>
            <?php
                 if(isset($_POST['sub']) && !empty($_POST['sub'])){
                    ?>
                    <script src="js/sweetalert.min.js"></script>
                    <script>
                    swal("File Uploaded Successfully", "", "success");
                    </script>
                    <?php

                include "backend/include/conn.php";
                $path = $_FILES['file1']['tmp_name'];
                
                 
                require_once "Classes/PHPExcel.php";
                // $path="course.xlsx";
                $reader= PHPExcel_IOFactory::createReaderForFile($path);
                $excel_Obj = $reader->load($path);
                $worksheet=$excel_Obj->getSheet('0');

                    for($row=2;$row<=7;$row++){
                        echo "<tr>";
                        $colms =0;
                        echo "<td><input class='form-control' style='align-items: center; max-width: 145px;' type='text' name='Objective[]' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($colms).$row)->getValue()."' ></td>";
                        for($col=1;$col<2;$col++){

                            echo "<td><textarea class='form-control' style='align-items: center; resize:none; height:3.5rem; width: 685px;' type='text' name='Text[]' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."' >".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."</textarea></td>";

                        }
                        $colms++;

                        echo "<td><input class='btn btn-danger' type='button' name='remove' id='remove' value='remove'></td>";
                        echo "</tr>";
                    }	
                }
                ?>
            </tr>
        </table>
    </div>
</div>

 

<!-- ###########################################################################################################
                                            COURSE OUTCOME
########################################################################################################### -->

<div class="div1">COURSE OUTCOME
</div>
<div class="leftDisplayBox">
    <div class="input-field-outcome">
        <table class="table table-bordered" cellspacing="0" style="border:none;margin:1rem auto; width:70%" id="table_field_outcome">
            <tr>
                <th>CO_no</th>
                <th>CO_name</th>
                <th><input class="btn btn-warning" type="button" name="addd" id="addd" value="Add"></th>
            </tr>
            <tr>
            <?php
             if(isset($_POST['sub']) && !empty($_POST['sub'])){
                include "backend/include/conn.php";
            $path = $_FILES['file1']['tmp_name'];
                require_once "Classes/PHPExcel.php";
                // $path="course.xlsx";
                $reader= PHPExcel_IOFactory::createReaderForFile($path);
                $excel_Obj = $reader->load($path);
                $worksheet=$excel_Obj->getSheet('0');
                $lastRow = $worksheet->getHighestRow();
                $colomncount = $worksheet->getHighestDataColumn();
                $colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);

                    for($row=21;$row<=26;$row++){
                        echo "<tr>";
                        $colms =0;
                        echo "<td><input class='form-control' style='align-items: center; width: 80px;' type='text' name='CO_no[]' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($colms).$row)->getValue()."' ></td>";
                        for($col=1;$col<2;$col++){

                            echo "<td><textarea class='form-control' style='align-items: center; resize:none; height:3.5rem; width: 800px;' type='text' name='CO_name[]'  value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."' >".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."</textarea></td>";

                        }
                        $colms++;

                        echo "<td><input class='btn btn-danger' type='button' name='removee' id='removee' value='remove'></td>";
                        echo "</tr>";
                    }	
             }
                ?>


                
            </tr>
        </table>
    </div>
</div>



<!-- ###########################################################################################################
                                            PROGRAM OUTCOME
########################################################################################################### -->

<div class="div1">PROGRAM OUTCOME
</div>
<div class="leftDisplayBox">
    <div class="input-field_progOut">
        <table class="table table-bordered" style="margin:1rem auto; width:70%" id="table_field_progOut">
            <tr>
                <th>PO_no</th>
                <th>PO_title</th>
                <th>PO_description</th>
                <th><input class="btn btn-warning" type="button" name="add_progOut" id="add_progOut" value="Add"></th>
            </tr>
            <tr>
            <?php
                 if(isset($_POST['sub']) && !empty($_POST['sub'])){
                    include "backend/include/conn.php";
                $path = $_FILES['file1']['tmp_name'];
                require_once "Classes/PHPExcel.php";
                // $path="course.xlsx";
                $reader= PHPExcel_IOFactory::createReaderForFile($path);
                $excel_Obj = $reader->load($path);
                $worksheet=$excel_Obj->getSheet('0');
                $lastRow = $worksheet->getHighestRow();
                $colomncount = $worksheet->getHighestDataColumn();
                $colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);

                    for($row=41;$row<=52;$row++){
                        echo "<tr>";
                        $colms =0;
                        echo "<td><input class='form-control' style='align-items: center; width: 80px;' type='text' name='PO_no[]' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($colms).$row)->getValue()."' ></td>";
                        for($col=1;$col<2;$col++){
                            echo "<td><textarea class='form-control' style='align-items: center; resize:none; height:3.5rem; width: 150px;' type='text' name='PO_title[]' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."' >".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."</textarea></td>";
                        }
                        for($col=2;$col<3;$col++){
                            echo "<td><textarea class='form-control' style='align-items: center; resize:none; height:3.5rem; width: 600px;' type='text' name='PO_description[]' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."' >".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."</textarea></td>";
                        }
                        $colms++;

                        echo "<td><input class='btn btn-danger' type='button' name='remove_progOut' id='remove_progOut' value='remove'></td>";
                        echo "</tr>";
                    }	
                }
                ?>
            </tr>
        </table>
    </div>
</div>


<!-- ###########################################################################################################
                                            CO PO MAPPING
########################################################################################################### -->


<div class="div1">CO PO MAPPING
</div>
  <div class="leftDisplayBox" >
  <table class="table table-bordered" cellspacing="0" style="border:none;margin:1rem auto; width:85%" id="table_field_progOut">
    <?php

        if(isset($_POST['sub']) && !empty($_POST['sub'])){
            include "backend/include/conn.php";
        $path = $_FILES['file1']['tmp_name'];
        require_once "Classes/PHPExcel.php";
        // $path="course.xlsx";
        $reader= PHPExcel_IOFactory::createReaderForFile($path);
        $excel_Obj = $reader->load($path);
        $worksheet=$excel_Obj->getSheet('0');
        $lastRow = $worksheet->getHighestRow();
        $colomncount = $worksheet->getHighestDataColumn();
        $colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);
        echo '<th>';
        for($i=1 ; $i<=12 ;$i++){
            echo '<th>PO'.$i.'</th>';
        }
        echo '</th>';

        $CO = 1;
        $i=1;
            for($row=61;$row<=66;$row++){
                echo '<tr><th>CO'.$CO.'</th>';
                $CO++;
                $j=1;
                for($col=1;$col<13;$col++){
                    echo "<td><input class='form-control' style='align-items: center; max-width: 50px;' type='text' id='rco".$i."cpo".$j."' name='rco".$i."cpo".$j."' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."' ></td>";
                    $j++;
                }
                $i++;
                echo "</tr>";
            }	
        }

        else{
            echo '<th>';
            for($i=1 ; $i<=12 ;$i++){
                echo '<th>PO'.$i.'</th>';
            }
            //   echo '<th>Total</th>';
            echo '</th>';
            
            for($i=1; $i<=6 ;$i++){
                echo '<tr><th>CO'.$i.'</th>';

                for($j=1; $j <=12 ;$j++){
                echo '<td><input class="form-control" type="text" id="rco'.$i.'cpo'.$j.'" name="rco'.$i.'cpo'.$j.'" style="align-items: center; max-width: 50px;" value="0"></td>';

                } 
                echo "</tr>";
            }  

        }  

    ?>
    </table>
    <script src="alert.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <input class="btn btn-success" type="text" name="mapcopo" id="mapcopo" value="Map" onclick="checkcopo()"  readonly="readonly" style="margin:1rem 28rem" required>
    </div>
 


<!-- ###########################################################################################################
                                        PROGRAM SPECIFIC OUTCOMES
########################################################################################################### -->

<div class="div1">PROGRAM SPECIFIC OUTCOMES
</div>
<div class="leftDisplayBox">
    <div class="input-field_progOut">
        <table class="table table-bordered" cellspacing="0" style="border:none;margin:1rem auto; width:70%" id="table_field_progSpecOut">
            <tr>
                <th>PSO_no</th>
                <th>PSO_description</th>
                <th><input class="btn btn-warning" type="button" name="add_progSpecOut" id="add_progSpecOut" value="Add"></th>
            </tr>
            <tr>
            <?php
                 if(isset($_POST['sub']) && !empty($_POST['sub'])){
                    include "backend/include/conn.php";
                $path = $_FILES['file1']['tmp_name'];
                require_once "Classes/PHPExcel.php";
                // $path="course.xlsx";
                $reader= PHPExcel_IOFactory::createReaderForFile($path);
                $excel_Obj = $reader->load($path);
                $worksheet=$excel_Obj->getSheet('0');
                $lastRow = $worksheet->getHighestRow();
                $colomncount = $worksheet->getHighestDataColumn();
                $colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);

                    for($row=81;$row<=83;$row++){
                        echo "<tr>";
                        $colms =0;
                        echo "<td><input class='form-control' style='align-items: center; width: 90px;' type='text' name='PSO_no[]' placeholder='PSO1' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($colms).$row)->getValue()."' ></td>";
                        for($col=1;$col<2;$col++){
                            echo "<td><textarea class='form-control' style='align-items: center; resize:none; height:3.5rem; width: 800px;' type='text' name='PSO_description[]'  value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."' >".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."</textarea></td>";
                        }
                        $colms++;

                        echo "<td><input class='btn btn-danger' type='button' name='remove_progSpecOut' id='remove_progSpecOut' value='remove'></td>";
                        echo "</tr>";
                    }	
                }
                ?>


            </tr>
        </table>
    </div>
</div>


<!-- ###########################################################################################################
                                            CO PSO MAPPING
########################################################################################################### -->


<div class="div1">CO PSO MAPPING
</div>
<div class="leftDisplayBox">
<table class="table table-bordered" cellspacing="0" style="border:none;margin:1rem auto; width:32%" id="table_field_progOut">
<?php

        if(isset($_POST['sub']) && !empty($_POST['sub'])){
            include "backend/include/conn.php";
        $path = $_FILES['file1']['tmp_name'];
        require_once "Classes/PHPExcel.php";
        // $path="course.xlsx";
        $reader= PHPExcel_IOFactory::createReaderForFile($path);
        $excel_Obj = $reader->load($path);
        $worksheet=$excel_Obj->getSheet('0');
        $lastRow = $worksheet->getHighestRow();
        $colomncount = $worksheet->getHighestDataColumn();
        $colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);
        echo '<th>';
        for($i=1 ; $i<=3 ;$i++){
            echo '<th>PSO'.$i.'</th>';
        }
          echo '</th>';

        $CO = 1;
        $i=1;
            for($row=101;$row<=106;$row++){
                echo '<tr><th>CO'.$CO.'</th>';
                $CO++;
                $j=1;
                for($col=1;$col<4;$col++){
                    echo "<td><input class='form-control' style='align-items: center; max-width: 50px;' type='text' id='rcoo".$i."cpoo".$j."' name='rcoo".$i."cpoo".$j."' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."' ></td>";
                    $j++;
                }
                $i++;
                echo "</tr>";
            }	
        }

        else{
        echo '<th>';
        for($i=1 ; $i<=3 ;$i++){
            echo '<th>PSO'.$i.'</th>';
        }
        //   echo '<th>Total</th>';
          echo '</th>';
          
        for($i=1; $i<=6 ;$i++){
            echo '<tr><th>CO'.$i.'</th>';

            for($j=1; $j <=3 ;$j++){
            echo '<td><input class="form-control" type="text" id="rcoo'.$i.'cpoo'.$j.'" name="rcoo'.$i.'cpoo'.$j.'" style="align-items: center; max-width: 50px;" value="0"></td>';
        }
        echo "</tr>";
    }
}
    ?>
    </table>
    <script src="copsomap.js"></script>
    <input class="btn btn-success" type="text" name="copsomap" id="copsomap" value="Map" onclick="check()" readonly="readonly" style="margin:1rem 28rem" >
</div>
        


<!-- ###########################################################################################################
                                            CO WEIGHTAGE
########################################################################################################### -->

<div class="div1">CO WEIGHTAGE
</div>
<div class="leftDisplayBox">
    <div class="input-field_coWeight">
        <table class="table table-bordered" cellspacing="0" style="border:none;text-align: center; margin:1rem auto; width:40%" id="table_field_coWeight">
            <tr>
                <th>CO_no</th>
                <th>noOfExp</th>
                <th>Weightage %</th>
                <th><input class="btn btn-warning" type="button" name="add_coWeight" id="add_coWeight" value="Add"></th>
            </tr>
            <?php
                 if(isset($_POST['sub']) && !empty($_POST['sub'])){
                    include "backend/include/conn.php";
                $path = $_FILES['file1']['tmp_name'];
                require_once "Classes/PHPExcel.php";
                // $path="course.xlsx";
                $reader= PHPExcel_IOFactory::createReaderForFile($path);
                $excel_Obj = $reader->load($path);
                $worksheet=$excel_Obj->getSheet('0');
                $lastRow = $worksheet->getHighestRow();
                $colomncount = $worksheet->getHighestDataColumn();
                $colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);

                    for($row=121;$row<=126;$row++){
                        echo "<tr>";
                        $colms =0;
                        echo "<td><input class='form-control' style='align-items: center; max-width: 80px;' type='text' name='CO_noo[]' placeholder='PSO1' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($colms).$row)->getValue()."' ></td>";
                        for($col=1;$col<2;$col++){
                            echo "<td><input class='form-control' style='align-items: center; max-width: 100px;' type='text' name='noOfExp[]' placeholder='5' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."' /></td>";
                        }
                        for($col=2;$col<3;$col++){
                            echo "<td><input class='form-control' style='align-items: center; max-width: 140px;' type='text' name='weightagePercent[]' placeholder='1' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."' /></td>";
                        }
                        $colms++;

                        echo "<td><input class='btn btn-danger' type='button' name='remove_coWeight' id='remove_coWeight' value='remove'></td>";
                        echo "</tr>";
                    }	
                }
                ?>
        </table>
    </div>

</div>

<!-- ###########################################################################################################
                                          CHAPTER PLAN
########################################################################################################### -->

<div class="div1">CHAPTER PLAN
</div>
<div class="leftDisplayBox" style="overflow-x:auto">
    <div class="input-field_chpPlan">
        <table class="table table-bordered" cellspacing="0" style="border:none;margin:1rem auto; width:70%" id="table_field_chpPlan">
            <tr>
                <th>Chapter no</th>
                <th>Topic</th>
                <th>CO_no</th>
                <th>weightage</th>
                <th>Duration</th>
                <th><input class="btn btn-warning" type="button" name="add_chpPlan" id="add_chpPlan" value="Add"></th>
            </tr>
            <?php
             if(isset($_POST['sub']) && !empty($_POST['sub'])){
                include "backend/include/conn.php";
            $path = $_FILES['file1']['tmp_name'];
                require_once "Classes/PHPExcel.php";
                // $path="course.xlsx";
                $reader= PHPExcel_IOFactory::createReaderForFile($path);
                $excel_Obj = $reader->load($path);
                $worksheet=$excel_Obj->getSheet('0');
                $lastRow = $worksheet->getHighestRow();
                $colomncount = $worksheet->getHighestDataColumn();
                $colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);

                    for($row=141;$row<=146;$row++){
                        echo "<tr>";
                        $colms =0;
                        echo "<td><input class='form-control' style='align-items: center; width: 120px;' type='text' name='Chp_no[]' placeholder='1'  value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($colms).$row)->getValue()."' ></td>";
                        for($col=1;$col<2;$col++){
                            echo "<td><textarea class='form-control' style='align-items: center; resize:none; height:3.5rem; width: 400px;' type='text' name='topic[]' placeholder='ABCD' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."'>".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."</textarea></td>";
                        }
                        for($col=2;$col<3;$col++){
                            echo "<td><input class='form-control' style='align-items: center; width: 80px;' type='text' name='CO_nooo[]' placeholder='CO1' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."' /></td>";
                        }
                        for($col=3;$col<4;$col++){
                            echo "<td><input class='form-control' style='align-items: center; width: 101px;' type='text' name='weightage[]'placeholder='10' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."' /></td>";
                        }
                        for($col=4;$col<5;$col++){
                            echo "<td><input class='form-control' style='align-items: center; width: 100px;' type='text' name='duration[]' placeholder='10' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."' /></td>";
                        }
                        $colms++;

                        echo "<td><input class='btn btn-danger' type='button' name='remove_chpPlan' id='remove_chpPlan' value='remove'></td>";
                        echo "</tr>";
                    }	
                }
                ?>
            </tr>
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
        <table class="table table-bordered" cellspacing="0" style="border:none;margin:1rem auto; width:70%" id="table_field_lesPlan">
            <tr>
                <th>Week No</th>
                <th>Lect_No</th>
                <th>Details of Topic</th>
                <th>CO Meet</th>
                <th>Weightage</th>
                <th>Teaching Method</th>
             </tr>
            <?php

            if(isset($_POST['sub']) && !empty($_POST['sub'])){
                include "backend/include/conn.php";
                $path = $_FILES['file1']['tmp_name'];
                require_once "Classes/PHPExcel.php";
                // $path="course.xlsx";
                $reader= PHPExcel_IOFactory::createReaderForFile($path);
                $excel_Obj = $reader->load($path);
                $worksheet=$excel_Obj->getSheet('0');
                $lastRow = $worksheet->getHighestRow();
                $colomncount = $worksheet->getHighestDataColumn();
                $colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);
                $col = 2;
                $row = 160;
                for($i=1;$i<=13;$i++){
                    echo '<td rowspan="5">'.$i.'</td>';
                    for($j=1;$j<=4;$j++){
                        echo"<tr>
                        <td>".$j."</td>
                        <td><textarea class='form-control' style='align-items: center; resize:none; height:3.5rem; width: 450px;' type='text' name='Details".$i.$j."' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."'>".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."</textarea></td>
                        <td><input class='form-control' style='align-items: center; width: 90px;' type='text' name='COlp".$i.$j."'   value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col+1).$row)->getValue()."'></td>
                        <td><input class='form-control' style='align-items: center; width: 110px;' type='text' name='Weightage".$i.$j."'   value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col+2).$row)->getValue()."'></td>
                        <td><textarea class='form-control' style='align-items: center; resize:none; height:3rem; width: 160px;' type='text' name='TeachingMethod".$i.$j."'  value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col+3).$row)->getValue()."'>".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col+3).$row)->getValue()."</textarea></td>        
                    </tr>";
                    $row++;
                    }
                    
                    }
                }

            else{
                for($i=1;$i<=13;$i++){
                echo '<td rowspan="5">'.$i.'</td>';
                for($j=1;$j<=4;$j++){
                    echo'<tr>
                    <td>'.$j.'</td>
                    <td><textarea class="form-control" style="align-items: center; resize:none; height:3.5rem; width: 450px;" type="text" name="Details'.$i.$j.'" placeholder="ABCD" value="Details'.$i.$j.'"></textarea></td>
                    <td><input class="form-control" style="align-items: center; width: 90px;" type="text" name="COlp'.$i.$j.'" placeholder="PO1"  value="CO'.$i.$j.'"></td>
                    <td><input class="form-control" style="align-items: center; width: 110px;" type="text" name="Weightage'.$i.$j.'" placeholder="ABCD"  value="0'.$i.$j.'"></td>
                    <td><textarea class="form-control" style="align-items: center; resize:none; height:3rem; width: 160px;" type="text" name="TeachingMethod'.$i.$j.'" placeholder="ABCD" value="TM'.$i.$j.'"></textarea></td>               
                </tr>';
                }
                
                }
            }
            ?>
        </table>
    </div>
</div>




<!-- ###########################################################################################################
                                            INTERNAL ASSESSMENT
########################################################################################################### -->

<div class="div1">INTERNAL ASSESSMENT
</div>
<div class="leftDisplayBox" style="overflow-x:auto">
<table class="table table-bordered" style="border:none; padding:0px;margin:1rem auto; width:60%" id="table_field_ia">
<?php

        if(isset($_POST['sub']) && !empty($_POST['sub'])){
            include "backend/include/conn.php";
        $path = $_FILES['file1']['tmp_name'];
        require_once "Classes/PHPExcel.php";
        $reader= PHPExcel_IOFactory::createReaderForFile($path);
        $excel_Obj = $reader->load($path);
        $worksheet=$excel_Obj->getSheet('0');
        $lastRow = $worksheet->getHighestRow();
        $colomncount = $worksheet->getHighestDataColumn();
        $colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);
        echo '<tr><th colspan="2">ASSESSMENT METHOD</th>';
        for($i=1 ; $i<=6 ;$i++){
            echo '<th>CO'.$i.'</th>';
        }
        echo "</tr>";
        $k=1;
        $q=1;
        $term =1;
        for($row=261; $row<=266 ;$row++){
            if($term==4){
                $k=2;
            }
            if($term==4 || $term==1){
            echo '<tr><th rowspan="3" style=" padding:0px">Term '.$k.'</th>';
            }
            if($q==4){
                $q=1;
            }
            echo '<th>Question '.$q.'</th>';
                $j=1;
                for($col=2;$col<8;$col++){
                    echo "<td><input class='form-control'  id='t".$k."q".$q."c".$j."' name='t".$k."q".$q."c".$j."' style='align-items: center; max-width: 50px;' value='".$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue()."' ></td>";
                    $j++;
                }
                echo "</tr>";

                $term++;
                $q++;
            }	
        }

        else{
            echo '<th colspan="2">ASSESSMENT METHOD</th>';
            for($i=1 ; $i<=6 ;$i++){
                echo '<th>CO'.$i.'</th>';
            }
            for($k=1;$k<=2;$k++){  
                echo '<tr><th rowspan="3" style=" padding:0px">Term '.$k.'</th>';
                for($i=1; $i<=3 ;$i++){
                    echo '<th>Question '.$i.'</th>';

                    for($j=1; $j <=6 ;$j++){
                    echo '<td><input class="form-control" type="text" id="t'.$k.'q'.$i.'c'.$j.'" name="t'.$k.'q'.$i.'c'.$j.'" style="align-items: center; max-width: 50px;" value="0"></td>';
                    }  
                    echo "</tr>";
                }
            }
        }
    
    ?>
    </table>
    <script src="internalassessment.js"></script>
    <input class="btn btn-success" type="text" name="iamap" id="iamap" value="Map" onclick="checkvalue()"  readonly="readonly" style="margin:1rem 28rem">
</div>


    


<!-- ###########################################################################################################
                                            FINAL BOX
########################################################################################################### -->


    <div class="div1">SAVE OR SUBMIT</div>
    <div class="leftDisplayBox" style="overflow-x:auto; margin:2rem auto 20px"> 
    <input class="btn btn-success" type="submit" style=" padding:6px 20px; margin:2rem auto 2rem" name="saveTea" id="saveTea" value="Save">
    <input class="btn btn-success" type="submit" name="save" id="save" value="Submit">
    </div>
</form>
</main>


<!-- js for bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>