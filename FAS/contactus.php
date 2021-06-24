<!DOCTYPE html>
<html>

<head>
	<title>Contact us</title>
	<link rel="shortcut icon" type="image/x-icon" href="queryicon.png" />
	<link rel="stylesheet" type="text/css" href="css/contactus.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>

<body>
	<?php
	$username = $_GET['username'];
	include "backend/include/conn.php";
    include 'validate.php';
	$username = $_GET['username'];
	$sql = "SELECT name FROM `users` WHERE `username` ='$username' ";
	$result = $conn->query($sql);
	$data = mysqli_query($conn, $sql);
	$total = mysqli_num_rows($data);
	if ($total != 0) {
		while ($result = mysqli_fetch_assoc($data)) {
			$name = $result['name'];
		}
	}
	?>



	<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<form action="connect.php?username=<?php echo $username; ?>" method="post">
				<div class="right" id="right">
					<h2>Contact Us</h2>
					<input type="text" class="field" placeholder="Your Name" id="name" name="name" value="<?php echo $name; ?>" readonly required>
					<input type="text" class="field" placeholder="Your Username" id="username" name="username" value="<?php echo $username; ?>" readonly required>
					<input type="text" class="field" placeholder="Subject Name" id="subject" name="subject" required>
					<textarea placeholder="Message" class="field" id="message" name="message" required></textarea>
					<button class="btn" onclick="Send()">Send </button>
				</div>
			</form>
		</div>
	</div>
	<script src="js/sweetalert.min.js"></script>
	<script>
		function Send() {
			swal("Thank you for your response!", "Message sent successfully!", "success");
		}
	</script>
</body>

</html>