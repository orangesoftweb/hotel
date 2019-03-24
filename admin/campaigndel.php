<?php
include ('db.php');
use \DrewM\MailChimp\MailChimp;
require '../vendor/autoload.php';

$id = $_GET['eid'];

if($id == "") {
	echo '<script>alert("Sorry ! Wrong Entry") </script>' ;
	header("Location: messages.php");
}

else {

	$sql="DELETE FROM `newsletterlog` WHERE mailchimp ='$id' ";
	
}
if($re = mysqli_query($con, $sql)) {
	$campaign_id = "'$id'";
	$MailChimp = new MailChimp('117e9faefbd5bb32ed8c39a352361087-us20');
	$result = $MailChimp->delete('campaigns/' . $id);
	
	if ($MailChimp->success()) {
		//print_r($result);
		echo '<script>alert("Campaña eliminada éxitosamente") </script>' ;
		header("Location: messages.php");
		} else {
			echo $MailChimp->getLastError();
		}
}
	