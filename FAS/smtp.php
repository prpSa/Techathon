    <?php
	
	$mail=new PHPMailer();
	$mail->isSMTP();
	$mail->Host='smtp.gmail.com';
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="obhaimujhemaroo@gmail.com";
	$mail->Password="OggyBhai@123";
	$mail->setFrom("obhaimujhemaroo@gmail.com");
	$mail->FromName = 'Faculty Audit System';
	?>