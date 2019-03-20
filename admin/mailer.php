<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

$id = $_GET['id'];
$addressee = $_GET['addressee'];
$email = $_GET['email'];
$status = $_GET['status'];

if($status == 1){

	$mail = new PHPMailer(true);
	try {
		//Server settings
		$mail->SMTPDebug = 2;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'orangewebsoft@gmail.com';
		$mail->Password = 'OrangeWebSoft';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;


		$mail->setFrom('orangewebsoft@gmail.com', 'OrangeSoftWeb');
		$mail->addAddress($email, $addressee);
		$mail->addReplyTo('noreply@example.com', 'noreply');

		//Attachments
		//$mail->addAttachment('/backup/myfile.tar.gz');

		//Content
		$mail->isHTML(true); 
		$mail->Subject = 'Reservation Hotel!';
		$mail->Body  = $addressee.' your reservation is confirmed';
		$mail->send();
		echo 'Message has been sent';
		header("Location: roombook.php?rid=$id&msj=1");
	} catch (Exception $e) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		header("Location: roombook.php?rid=$id&msj=2");
	}
}

if($status == 2){

	$mail = new PHPMailer(true);
	try {
		//Server settings
		$mail->SMTPDebug = 2;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'orangewebsoft@gmail.com';
		$mail->Password = 'OrangeWebSoft';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;


		$mail->setFrom('orangewebsoft@gmail.com', 'OrangeSoftWeb');
		$mail->addAddress($email, $addressee);
		$mail->addReplyTo('noreply@example.com', 'noreply');

		//Attachments
		//$mail->addAttachment('/backup/myfile.tar.gz');

		//Content
		$mail->isHTML(true); 
		$mail->Subject = 'Reservation Hotel!';
		$mail->Body  = $addressee.' your reservation is not confirmed';
		$mail->send();
		echo 'Message has been sent';
		header("Location: roombook.php?rid=$id&msj=1");
	} catch (Exception $e) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		header("Location: roombook.php?rid=$id&msj=2");
	}
}