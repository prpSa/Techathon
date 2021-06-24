<?php
global $username;
$username = $_GET['username'];
$_SESSION['username'] = $username;
include 'validate.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/subjectTeacherHome.css">
    <!-- Font Awesome  -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap css  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- js for file and bootstrap  -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <title>Subject Teacher Home</title>
</head>

<body>

    <!-- Navbar -->
    <div class="bs-example">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div id="navbarCollapse" class="collapse navbar-collapse">

                <div class="navbarLeft">
                    <a href="http://localhost/FAS/teacherhome.php?username=<?php echo $username; ?>"><img src="dylogo.png" style="width:10rem; height:4rem"></a>
                </div>

                <div class="navbarCenter">
                    <h4 style="font-weight:1000">Teacher</h4>
                </div>

                <div class="navbarRight">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size:1rem; font-weight:600"><?php echo $username; ?></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <?php
                                include "backend/include/conn.php";
                                $username = $_GET['username'];
                                $sql = "SELECT * FROM `hodhomee` WHERE `teaType`='speTea' AND 	tea_username='$username'";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    echo '<a href="teacherhome.php?username=' . $username . '" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Special Teacher Home</a>';
                                }
                                $sql = "SELECT * FROM `users` WHERE `role`='dqa' AND username='$username'";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    echo '<a href="dqahome.php?username=' . $username . '" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>DQA Home</a>';
                                }
                                $sql = "SELECT * FROM `users` WHERE `role`='auditor' AND username='$username'";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($data);
                                if ($total != 0) {
                                    echo '<a href="audHome.php?username=' . $username . '" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Internal Auditor Home</a>';
                                }
                                $sql = "SELECT * FROM `users` WHERE `role`='idAuditor' AND username='$username'";
                                $result = $conn->query($sql);
                                $data = mysqli_query($conn,$sql);
                                $total =mysqli_num_rows($data);
                                if ( $total != 0) { 
                                        echo '<a href="Users\interdeptAuditor\idAuditHome.php?username='.$username.'" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>ID Auditor Home</a>';
                                    }
                                    ?>
                                <a href="http://localhost/FAS/fasprofile/profile.php?username=<?php echo $username; ?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i>Profile</a>
                                <a href="contactus.php?username=<?php echo $username; ?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-question-circle fa-sm fa-fw mr-2 text-gray-400"></i>Query</a>
                                <a href="http://localhost/FAS/change_password.php?username=<?php echo $username; ?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i>Change Password</a>
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

        <?php

            include "backend/include/conn.php";
            $username = $_GET['username'];
            $sql1 = "SELECT courseID,sub_name from hodhomee where tea_username='$username'";
            $result1 = $conn->query($sql1);
            $data1 = mysqli_query($conn, $sql1);
            $total1 = mysqli_num_rows($data1);
            $i = 0;
            if ($total1 != 0) {
                while ($result1 = mysqli_fetch_assoc($data1)) {
                    $courseID = $result1['courseID'];
                    $courseName = $result1['sub_name'];
                    $i++;
                    echo '
        <div class="div1">' . $courseName . '<a><button class="view"  id="btn' . $i . '" onclick="toggleHide(' . $i . ')" style="position: absolute; 
        right:3rem;
        background-image: linear-gradient(to top right,rgba(255, 129, 154,1),rgba(255, 233, 233,1));
        border: none;
        color: black;
        padding: 5px 5px;
        text-align: center;
        width: 90px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 18px;
        outline:none;
        font-weight:500;
        cursor: pointer;
        -webkit-transition-duration: 0.4s;
        transition-duration: 0.4s;
        margin: -5px auto;
        "><i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>View</button></a></div>
        <div class="leftDisplayBox" id ="theory' . $i . '" style=" display:none ;">
        <p style=" margin:.5rem; padding: 5px;text-align:right;margin-right: 180px;">See Responses:</p>
        ';

                    include "subjectTeacherTemplate.php";
                    echo '</div>';
                }
            }
        
        ?>

    <script>
        function toggleHide(x) {
            console.log(x);
            let btn = document.getElementById('btn' + x);
            let theory = document.getElementById('theory' + x);
            if (theory.style.display === 'block') {
                theory.style.display = 'none';
            } else {
                theory.style.display = 'block';
            }
        }
    </script>
</main>

<?php include 'backend\include\footer.php'; ?>

<!-- js for bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>