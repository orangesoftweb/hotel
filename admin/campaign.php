<?php
include ('db.php');
use \DrewM\MailChimp\MailChimp;
require '../vendor/autoload.php';

$id = $_GET['eid'];

$MailChimp = new MailChimp('117e9faefbd5bb32ed8c39a352361087-us20');
  
$result = $MailChimp->post('campaigns/' . $id . '/actions/send');

if ($MailChimp->success()) {		
	header("Location: messages.php");
	echo '<script>alert("Campaña enviada éxitosamente!") </script>' ;
} else {
	echo $MailChimp->getLastError();
}
	
