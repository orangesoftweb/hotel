<?php
use \DrewM\MailChimp\MailChimp;
require '../vendor/autoload.php';
$MailChimp = new MailChimp('117e9faefbd5bb32ed8c39a352361087-us20');
$list_id = '6589d61c1c';

/*
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
*/
/*
$template_id = 24829;
$reply_to = 'orangesoft@programmer.net';
$from_name = 'OrangeSoftWeb';
$newsletter_subject_line = 'Test';
$title = 'test_campaign';
// Create or Post new Campaign
$result = $MailChimp->post("campaigns", [
    'type' => 'regular',
    'recipients' => ['list_id' => $list_id],
    'settings' => ['subject_line' => $newsletter_subject_line,
           'reply_to' => $reply_to,
           'from_name' => $from_name,
		   'title'	=> $title
          ]
    ]);
  
$response = $MailChimp->getLastResponse();
$responseObj = json_decode($response['body']);  

// Manage Campaign Content
$html = file_get_contents('test.php');
$result = $MailChimp->put('campaigns/' . $responseObj->id . '/content', [
	  'template' => ['id' => $template_id, 
		'sections' => ['body_content' => $html]
		]
	  ]);
// Send Campaign    
//$result = $MailChimp->post('campaigns/' . $responseObj->id . '/actions/send');
*/
//Delete Campaign
//$campaign_id = '15fbff75df';
//$result = $MailChimp->delete('campaigns/' . $campaign_id);

//List Campaigns
error_reporting(E_PARSE);
$result = $MailChimp->get('campaigns');
echo "<pre>";
	print_r($result['campaigns']);

echo "</pre>";

foreach($result as $id){
	foreach($id as $key){
	
	echo "<pre>";
		print_r($key['id']);
		 echo "<br>";		 
		print_r($key['settings']['subject_line']);
		echo "<br>";
		print_r($key['settings']['title']);
		echo "<br>";
		print_r($key['settings']['template_id']);
		echo "<br>";
		print_r($key['emails_sent']);
		echo "<br>";
		print_r($key['recipients']['list_id']);
		echo "<br>";
		print_r($key['recipients']['list_name']);
		echo "<br>";
		
	echo "</pre>";
}}
?>