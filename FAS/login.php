<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>
<body >
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-4 form login-form" style="margin-left: 29.333333%;">
                <form action="login.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="username" name="username" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
					 <div class="row">
						<div class="col-lg-10">
							<label>Captcha:</label>
							<input type="text" class="form-control" id="captcha" placeholder="Enter captcha" name="captcha">
						</div>
						<div class="col-lg-2" style="margin-top:33px;">
							<img src="captcha.php"/>
						</div>
					 </div>	
                  </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="form-control button"  onclick="submit_data()" type="submit" name="login" value="Login">
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	  <script>
	  function submit_data(){
		jQuery.ajax({
			url:'controllerUserData.php',
			type:'post',
			data:jQuery('#frmCaptcha').serialize(),
			success:function(data){
				
			}
		});
	  }
	  </script>         
</body>
</html>