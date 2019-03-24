<?php
include ('db.php');
use \DrewM\MailChimp\MailChimp;
require '../vendor/autoload.php';

$eid = $_GET['eid'];
$approval ="subscribed";//Allowed
$napproval="unsubscribed";//Not Allowed

$MailChimp = new MailChimp('117e9faefbd5bb32ed8c39a352361087-us20');
$list_id = '6589d61c1c';


$view="SELECT * FROM `contact` WHERE id = '$eid' ";
$re = mysqli_query($con,$view);
while ($row=mysqli_fetch_array($re))
{
	$id =$row['approval'];
	$email = $row['email'];
}

if($id=="unsubscribed")//Pending
{
	$sql ="UPDATE `contact` SET `approval`= '$approval' WHERE id = '$eid' ";
	if(mysqli_query($con,$sql))
	{		
		$subscriber_hash = $MailChimp->subscriberHash($email);

		$result = $MailChimp->patch("lists/$list_id/members/$subscriber_hash", [
						'status'        => $approval
					]);
		if ($MailChimp->success()) {
			//print_r($result);			
			header("Location: messages.php");
			echo '<script>alert("Estado de subscripción cambiado éxitosamente") </script>' ;
		} else {
			echo $MailChimp->getLastError();
		}
	
	}
}
else {
	$sql ="UPDATE `contact` SET `approval`= '$napproval' WHERE id = '$eid' ";
	if(mysqli_query($con,$sql))
	{				
		$subscriber_hash = $MailChimp->subscriberHash($email);

		$result = $MailChimp->patch("lists/$list_id/members/$subscriber_hash", [
						'status'        => $napproval
					]);
		if ($MailChimp->success()) {
			//print_r($result);			
			header("Location: messages.php");
			echo '<script>alert("Estado de subscripción cambiado éxitosamente") </script>' ;
		} else {
			echo $MailChimp->getLastError();
		}

	}

	}
?>