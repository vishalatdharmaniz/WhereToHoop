<?php
include_once 'Files.php';
include_once 'Functions.php';

$user_id = $_REQUEST['user_id'];
$user = get_user_by_user_id($user_id);

if ($user)
{
    $message = array('status'=>'1','message'=>'user found' , 'user'=>$user);
	send_response($message);
	exit;
}
else
{
    $message = array('status'=>'0','message'=>'user not found');
	send_response($message);
	exit;
}
?>
