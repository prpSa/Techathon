<?php
include "../backend/include/conn.php";
session_start();
$username = $_GET['username'];
if (!isset($_SESSION[$username])) {
    header('location: ../login.php');
}
function role(){
$sql = "SELECT  * FROM `users` WHERE username = '$username' ";
$result = $conn->query($sql);
$data = mysqli_query($conn, $sql);
$total = mysqli_num_rows($data);
$role="";
if ($total != 0) {
    while ($result = mysqli_fetch_assoc($data)) {
    }
 }
}

$sql = "SELECT  * FROM `users` WHERE username = '$username' ";
$result = $conn->query($sql);
$data = mysqli_query($conn, $sql);
$total = mysqli_num_rows($data);
if ($total != 0) {
    while ($result = mysqli_fetch_assoc($data)) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Profile</title>
            <link rel="stylesheet" href="profile.css">
        </head>

        <body>
            <div class="bs-example">
                <nav class="navbar navbar-expand-md navbar-light bg-light">
                    <div id="navbarCollapse" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">

                            <a href="http://localhost/FAS/teacherhome.php"><img src="../dylogo.png" style="width:10rem; height:4rem"></a>

                        </ul>

                        <div class="heading">
                            Profile
                        </div>
                        <div class="userprofilebox">
                            <div class="userheading">
                                <b><?php echo  $result['name'];  ?></b>
                            </div>
                            <div class="profilepicture">
                                <img src="images/mydy profile pic.svg" alt="image not loaded">
                            </div>
                            <div class="info">
                                <table class="info">
                                    <tr>
                                        <td>
                                            <img src="images/phone.png" alt="image not loaded">
                                            <span>Mobile No. :</span>
                                            <span><?php echo  $result['mobile_no'];  ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="images/mail.png" alt="image not loaded">
                                            <span>Email :</span>
                                            <span><?php echo  $result['username'];  ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="images/school.png" alt="image not loaded">
                                            <span>Department :</span>
                                            <span><?php echo  $result['dept'];  ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="images/role.png" alt="image not loaded">
                                            <span>Role :</span>
                                            <span><?php echo  $result['role'];  ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="images/last_login.png" alt="image not loaded">
                                            <span>Last Login :</span>
                                            <span><?php echo  $result['last_login'];  ?></span>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div> <?php }
                        } else {
                            echo "0 results";
                        }
                                ?>
                <?php
                include '../backend\include\footer.php';
                ?>
        </body>

        </html>