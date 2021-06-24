<?php
  include 'valid.php';
  include('includes/header.php'); 
  include('includes/navbar.php'); 
  $username = $_GET['username'];
?>
 <script type="text/javascript">
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

<div class="modal fade" id="adduserprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Subject Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    
      </div>
      <form action="subjectBackend.php?username=<?php echo $username;?>" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Department </label>
                <select name="dept" id="dept" placeholder="Select Department">
                    <option value="CE">Computer</option>
                    <option value="IT">IT</option>
                    <option value="EXTC">EXTC</option>
                    <option value="EE">EE</option>
                    <option value="IE">IE</option>
                </select>
            </div>
            <div class="form-group">
                <label> Course Name </label>
                <input type="text" name="courseName" class="form-control" placeholder="Enter Course name" required>
            </div>
            <div class="form-group">
                <label> Subject Code </label>
                <input type="text" name="subjectCode" class="form-control" placeholder="Enter Subject Code" required>
            </div>
            <div class="form-group">
                <label> Semester </label>
                <input type="text" name="sem" class="form-control" placeholder="Enter Semester" required>
            </div>
            <div class="form-group">
                <label> Year </label>
                <input type="text" name="fromAcadYr" class="form-control" placeholder="Enter Year" required>
            </div>
            <div class="form-group">
             <label>Role:</label>
            <select name="role" id="role" placeholder="Enter Category">
                <option value="class">Class</option>
                <option value="lab">Lab</option>
            </select>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
  <?php 
    if(isset($_POST['sub'])){
        $excel = $_FILES['file1']['tmp_name'];    
    }
?>
   
    <form method="post" enctype="multipart/form-data" style="text-align:center">
        <input type="file" style="position:relative;top:2.2rem;left:3rem" name="file1" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"/>
       
        <input class="btn btn-primary" style="position:relative;top:2rem;left:6rem;"type="submit" name="sub"/>
    </form>
    <?php
        if(isset($_POST['sub']) && !empty($_POST['sub'])){

       include "include/conn.php";
       $path = $_FILES['file1']['tmp_name'];
       
        
       require_once "Classes/PHPExcel.php";
       // $path="course.xlsx";
       $reader= PHPExcel_IOFactory::createReaderForFile($path);
       $excel_Obj = $reader->load($path);
       $worksheet=$excel_Obj->getSheet('0');

           for($row=2;$row<=200;$row++){
              
               $colms =0;
               $dept = $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($colms).$row)->getValue();
               $colms++;
               $courseName=$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($colms).$row)->getValue();
               $colms++;
               $subjectcode=$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($colms).$row)->getValue();
               $colms++;
               $semester=$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($colms).$row)->getValue();
               $colms++;
               $year=$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($colms).$row)->getValue();
               $colms++;
               $class=$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($colms).$row)->getValue();
               if($dept==''){
                 break;
               }
               $sql = "INSERT INTO `course`(`dept`, `fromAcadYr`,`sem`, `subjectCode`, `courseName`,`classOrLab`) VALUES ('$dept','$year','$semester','$subjectcode','$courseName','$class')";
    
               $query = mysqli_query($conn, $sql);
             
        
           }	
          }?>
    <h6 class="m-0 font-weight-bold text-primary">Subject Section 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduserprofile">
              Add Subject Data 
            </button>
    </h6>
  </div>

  <div class="card-body">
      
    <?php
      if(isset($_SESSION['success']) && $_SESSION['success'] !='')
      {
          echo '<h2 class="bg-primary text-white">' .$_SESSION['success'].'</h2>';
          unset($_SESSION['success']);
      }
   if(isset($_SESSION['status']) && $_SESSION['status'] !='')
      {
          echo '<h2 class="bg-danger text-white">' .$_SESSION['status'].'</h2>';
          unset($_SESSION['status']);
      }  
          
    ?>  

          
    <div class="table-responsive">

    <?php
        include "include/conn.php";
        
        $query="SELECT * FROM course";
        $query_run=mysqli_query($connection,$query);
    ?>
        
        
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>CourseID</th>
            <th>Department</th>
            <th>Course Name</th>
            <th>Subject Code</th>
            <th>Semester</th>  
            <th>Year</th>
            <th>Class/Lab</th>  
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     
        <?php   
        $id=0; 
          if(mysqli_num_rows($query_run)>0) 
          {
              while($row=mysqli_fetch_assoc($query_run))
              { $id++;
                 
        ?>
            
          <tr>
            <td> <?php echo $id; ?> </td>
            <td> <?php echo $row['courseID']; ?></td> 
            <td> <?php echo $row['dept']; ?></td> 
            <td> <?php echo $row['courseName']; ?></td>  
            <td> <?php echo $row['subjectCode']; ?></td>  
            <td> <?php echo $row['sem']; ?></td>
            <td> <?php echo $row['fromAcadYr']; ?></td>  
            <td> <?php echo $row['classOrLab']; ?></td> 
            <?php $courseID=  $row['courseID']; ?>
            <td>
            <?php $username = $_GET['username']; ?>
                <form action="subject_edit.php?username=<?php echo $username;?>&&courseID=<?php echo $courseID?>" method="post">
                    <input type="hidden" name="courseID" value="<?php echo $row['courseID']; ?>">
                    <button name="edit_btn" type="submit" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="subjectBackend.php?username=<?php echo $username;?>" method="post">
                  <input type="hidden" name="courseID" value="<?php echo $row['courseID']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
        <?php
              }
          }
            else{
                echo "No Record Found";
            }
        ?>          
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>

<!-- /.container-fluid -->
<?php
  include('includes/scripts.php');
  include('includes/footer.php');
?>