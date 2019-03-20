<?php
use \DrewM\MailChimp\MailChimp;
require '../vendor/autoload.php';
$MailChimp = new MailChimp('117e9faefbd5bb32ed8c39a352361087-us20');
$list_id = '6589d61c1c';

//List all the mailing lists (with a get on the lists method)
$result = $MailChimp->get('lists');

//list memmbers
$result = $MailChimp->get("lists/$list_id/members");

//id automations
$result = $MailChimp->get('automations');

//Subscribe someone to a list (with a post to the lists/{listID}/members method)
$result = $MailChimp->post("lists/$list_id/members", [
				'email_address' => 'davy@example.com',
				'status'        => 'subscribed',
			]);
//Update a list member with more information (using patch to update)
$subscriber_hash = $MailChimp->subscriberHash('davy@example.com');

$result = $MailChimp->patch("lists/$list_id/members/$subscriber_hash", [
				'merge_fields' => ['FNAME'=>'Davy', 'LNAME'=>'Jones'],
				'interests'    => ['2s3a384h' => true],
			]);

//Remove a list member using the delete method
$subscriber_hash = $MailChimp->subscriberHash('davy@example.com');

$MailChimp->delete("lists/$list_id/members/$subscriber_hash");

echo "<pre>";
	print_r($result);
echo "</pre>";






?>