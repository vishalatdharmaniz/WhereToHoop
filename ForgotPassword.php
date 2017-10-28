<?php
include_once 'Files.php';
include_once 'Functions.php';

$email = $_REQUEST['email'];

//Check if empty email
if (empty($email))
{
	$message = array('status'=>'0','message'=>'Email required');
	send_response($message);
	exit;
}

$user = get_user_by_email($email);

if ($user) 
{ 
	//Set parameters for mail
	$to = $email;
    $subject = 'Forgot Password For WhereToHoop';
    $message = "Password :".$user["password"];
	
	//send mail
	$mail_response = mail($to, $subject, $message, $headers);
	
	if($mail_response) 
	{
        $message = array('status'=>'1','message'=>'Password sent on this email');
		send_response($message);
		exit;
	}
	else 
	{
        $message = array('status'=>'0','message'=>'Unable to send mail');
		send_response($message);
		exit;
    }
		
} else {
		$message = array('status'=>'0','message'=>'Email not registered');
		send_response($message);
		exit;
}
?>