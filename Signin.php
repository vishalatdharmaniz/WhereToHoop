<?php
include_once 'Files.php';
include_once 'Functions.php';

$user_name = $_REQUEST['user_name'];
$device_token = $_REQUEST['device_token'];

// Because password is empty for facebook
if (!empty($_REQUEST['password']))
{
	$password = $_REQUEST['password'];
}
else
{
	$password = 'No password for facebook';
}	

/**
*if the device token is already present in table (means some  
*user was login and uninstalled the app and then installed it
*again and tries to login with some other user) then call the 
*logout api for the previous user using curl
*/
logout_left_user($device_token);

//check existence of user in database
$user = check_user_existence($user_name, $password);

if ($user) 
{
    $previous_device_token = $user['device_token'];

    // store previous device token
    if ($previous_device_token != $device_token)
    {
        store_device_token($user, $previous_device_token);
    }
    
    // update latest device token
    $update_token = update_device_token($user, $device_token);

    if ($update_token)
    {
        $message = array('status'=>'1','message'=>'Successfully Logged in', 'data' => $user);
        send_response($message);
        exit;
    }
    else
    {
        $message = array('status'=>'0','message'=>'unable to update device token please try again');
        send_response($message);
        exit;
    }
}
else 
{
    $message = array('status'=>'0','message'=>'No user exist with this credentials');
    send_response($message);
    exit;
}

?>