<?php
// global $username; 
session_start();
include "../../backend/include/conn.php";
$username = $_GET['username'];
$_SESSION['username'] = $username;

$sql1 = "SELECT dept FROM  users where username = '$username'";
$query1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful");
while ($dept = mysqli_fetch_assoc($query1)) {
    $dept = $dept['dept'];
    // echo $dept;
    $_SESSION['dept'] = $dept;
    // echo $_SESSION['dept'];
}

// $query1 = $conn->query("SELECT dept FROM  users where username = $username");
// $fetch1 = $query1->fetch_array();
// $dept = $fetch1['dept'];
// echo $dept;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/extAud.css">
    <!-- Font Awesome  -->
    <script src="../../js/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap css  -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" crossorigin="anonymous">
    <!-- js for file and bootstrap  -->
    <script src="../../js/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="../../js/popper.min.js" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/jquery.js"></script>
    <title>Inter-Departmental Auditor Home</title>
    <style>
        .selectbox {
            display: flex;
            flex-flow: column wrap;
            align-items: center;
        }

        .select {
            width: 65%;
            margin-top: 3rem;
            background-color: rgb(136, 0, 27);
            color: white;
            border-radius: 5px;
            font-size: 1.4rem;
        }

        #year {
            margin-top: 5.5rem;
        }

        .select:focus {
            outline: none;
        }

        .select option {
            background-color: rgb(166 19 48);
        }

        .submit-btn {
            display: flex;
            margin: auto;
            margin-top: 3rem;
            background-color: #14b014;
            padding: 0.4rem;
            border-radius: 0.3rem;
            font-size: 1rem !important;
            color: white;
            text-decoration: none;
        }

        .submit-btn:hover {
            display: flex;
            margin: auto;
            margin-top: 2.9rem;
            background-color: green;
            padding: 0.4rem;
            border-radius: 0.3rem;
            font-size: 1rem !important;
            text-decoration: none;
            color: grey !important;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="bs-example">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div id="navbarCollapse" class="collapse navbar-collapse">

                <div class="navbarLeft">
                    <a href="http://localhost/FAS/users/interdeptAuditor/idAuditHome.php?username=<?php echo $username; ?>"><img src="../../css/images/dylogo.png" style="width:10rem; height:4rem"></a>
                </div>

                <div class="navbarCenter">
                    <h4 style="font-weight:1000">Internal Auditor Home</h4>
                </div>

                <div class="navbarRight">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size:1rem; font-weight:600"><?php echo $username; ?></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="http://localhost/FAS/fasprofile/profile.php?username=<?php echo $username; ?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i>Profile</a>
                                <a href="contactus.php?username=<?php echo $username; ?>" class="dropdown-item" style="font-size:1rem; font-weight:600"><i class="fas fa-question-circle fa-sm fa-fw mr-2 text-gray-400"></i>Query</a>
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
        <form method="post" action="idAudHome_backend.php">
            <div class="box">
                <div class="card">
                    <div class="selectbox">
                        <select name="year" id="year" class="select">
                            <option value="">Select Year</option>
                            <option value="2019">2019-2020</option>
                            <option value="2020">2020-2021</option>
                            <option value="2021">2021-2022</option>
                        </select>
                        <!-- <select name="sem" id="sem" class="select">
                            <option value="">Select Semester</option>
                        </select> -->
                        <select name="sub" id="sub" class="select">
                            <option value="">Select Instructor</option>
                        </select>
                        <button type="submit" class="submit-btn" name='submit'>Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <?php
    include '../../backend/include/footer.php'
    ?>
    <script>
        $(document).ready(function() {
            function loadData(type, category1, category2) {
                $.ajax({
                    url: "load-dropdown.php",
                    type: "POST",
                    data: {
                        type: type,
                        id1: category1,
                        id2: category2
                    },
                    success: function(data) {
                        // if (type == "sem") {
                        //     $("#sem").html(data);

                        // } else 
                        if (type == "sub") {
                            $("#sub").html(data);
                        }
                        // else {
                        //     // $("#year").append(data);
                        // }
                    }
                });
            }

            // loadData();

            // $("#year").on("change", function() {
            //     var year = $("#year").val();

            //     loadData("sub", year);
            // })

            $("#year").on("change", function() {
                var year = $("#year").val();
                var dept = "<?php echo $_SESSION['dept']; ?>";
                console.log(dept);
                loadData("sub", year, dept)
            })
        })
    </script>
</body>
<?php include "idAudHome_backend.php"; ?>

</html>