<?php
    global $username,$courseID , $tea_username,$division,$audType;
    $username = $_GET['username']; 
    $courseID = $_GET['courseID'];
    $division = $_GET['division'];
    include 'validate.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="stylesheet" type="text/css" href="css/mainTeacherForm.css">
    <!-- Font Awesome  -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap css  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- js for file and bootstrap  -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <title>Faculty Audit System</title>


</head>


<body>

<!-- Navbar -->
<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div id="navbarCollapse" class="collapse navbar-collapse">
 
        <div class="navbarLeft">
        <a href="http://localhost/FAS/subjectTeacherHome.php?username=<?php echo $username; ?>"><img src="dylogo.png" style="width:10rem; height:4rem" ></a>
        </div>

        <div class="navbarCenter">
            <h4 style="font-weight:1000">HOD Response => Teacher</h4>
        </div>

        <div class="navbarRight">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown" >
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size:1rem; font-weight:600"><?php echo $username;?></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="http://localhost/FAS/subjectTeacherHome.php?username=<?php echo $username; ?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>Home Page</a>
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

    <form action="http://localhost/FAS/subjectTeacherHome.php?username=<?php echo $username; ?>" method="post">
        <main>
            <div class="div1">FEEDBACK
            </div>
            <?php
            include 'backend/include/conn.php';
            $courseID = $_GET['courseID'];

            $sql1 = "select audit1 from hodfeedback WHERE courseID='$courseID' and audit1 is not NULL and division='$division'";
            $result1 = $conn->query($sql1);
            $data1 = mysqli_query($conn, $sql1);
            $total1 = mysqli_num_rows($data1);
            $i=1;
            if ($total1 != 0) {
                echo '
                <div class="leftDisplayBox">
                <table class="table table-bordered" cellspacing="0" style="width:98%; margin:0px auto;" >
                <tr>
                    <th>Sr.No.</th>
                    <th>Audit Type</th>
                    <th>Feedback</th>
                </tr>';
                while ($result1 = mysqli_fetch_assoc($data1)) {
    
                    echo '<tr><td> '.$i.' </td><td>';
                    echo 'Audit 1';
                    echo '</td><td>';
                    echo $result1['audit1'];
                    echo '</td></tr>';

                    $i++;
                }
            }
            $sql1 = "select audit2 from hodfeedback WHERE courseID='$courseID' and audit2 is not NULL and division='$division' ";
            $result1 = $conn->query($sql1);
            $data1 = mysqli_query($conn, $sql1);
            $total1 = mysqli_num_rows($data1);
            if ($total1 != 0) {
                while ($result1 = mysqli_fetch_assoc($data1)) {
                    echo '<tr><td> '.$i.' </td><td>';
                    echo 'Audit 2';
                    echo '</td><td>';
                    echo $result1['audit2'];
                    echo '</td></tr>';
                    $i++;
                }
                echo '</table>';
                echo '</div>';
            }
            ?>
           

        </main>
            <a href="http://localhost/FAS/subjectTeacherHome.php?username=<?php echo $username; ?>"><input style="margin:2rem 44% 1rem" class="btn btn-success" type="submit" name="save" id="save" value="Back To Home Page"></a>

    </form>
<!-- js for bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>