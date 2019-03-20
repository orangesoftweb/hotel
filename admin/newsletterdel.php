<?php
include ('db.php');
use \DrewM\MailChimp\MailChimp;
require '../vendor/autoload.php';

$id=$_GET['eid'];

if($id=="")
{
	echo '<script>alert("Sorry ! Wrong Entry") </script>' ;
	header("Location: messages.php");
}

else {
	$query = "SELECT email FROM `contact` WHERE id = '$id'";
	$result = mysqli_query($con,$query);
	$contact = mysqli_fetch_assoc($result);
	$email = $contact['email'];

	$view="DELETE FROM `contact` WHERE id ='$id' ";

	if($re = mysqli_query($con,$view))
	{
		//MailChimp
		$MailChimp = new MailChimp('117e9faefbd5bb32ed8c39a352361087-us20');
		$list_id = '6589d61c1c';
		
		$subscriber_hash = $MailChimp->subscriberHash($email);
		$MailChimp->delete("lists/$list_id/members/$subscriber_hash");
		
		if ($MailChimp->success()) {
		//print_r($result);
		echo '<script>alert("Subscripción eliminada éxitosamente") </script>' ;
		header("Location: messages.php");
		} else {
			echo $MailChimp->getLastError();
		}
	}
}
?>