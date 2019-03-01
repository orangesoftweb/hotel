<?php
//ini_set( 'display_errors', 1 );
//error_reporting( E_ALL );
//$from = 'herdanaces@gmail.com';
$to = 'herdanaces@gmail.com';
$subject = 'Test';
$message =  'This a test mail';
//$headers = 'From:' . $from;

$send = mail($to, $subject, $message/*, $headers*/);
if($send) {
	echo "mensaje enviado";
}else {
	echo "mensaje no enviado";
}