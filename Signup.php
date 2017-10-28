<?php
include_once 'Files.php';
include_once 'Functions.php';

//Put all the requested parameters in variables 
$first_name 		= $_REQUEST['first_name'];
$last_name 			= $_REQUEST['last_name'];
$user_name 			= $_REQUEST['user_name'];
$email 				= $_REQUEST['email'];
$location			= $_REQUEST['location'];
$favourite_brand 	= $_REQUEST['favourite_brand'];
$favourite_NBA_team = $_REQUEST['favourite_NBA_team'];
$profile_pic_base_64= $_REQUEST['profile_pic'];
$device_token 		= $_REQUEST['device_token'];
$device_type 		= $_REQUEST['device_type'];

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

$profile_pic = get_profile_pic($profile_pic_base_64);
$points = 0;
if($profile_pic == 'some problem occured')
{
	$message = array('status'=>'0','message'=>'Oops! Unable to upload the profile pic to server please try again');
	send_response($message);
	exit;
} 
else
{
	$profile_pic = $base_url.$profile_pic;
}

//get a unique id for entering as user id
$userid = get_user_id();

//check if username already exists
$already_username = get_user_by_user_name($user_name);

if($already_username)
{
		$message = array('status'=>'0','message'=>'Oops! This user name is already taken, please try something else.');
		send_response($message);
		exit;
}

//check if email already exists
$already_email = get_user_by_email($email);

if($already_email)
{
		$message = array('status'=>'0','message'=>'Oops! This email is already taken, please try something else.');
		send_response($message);
		exit;
}

//insert new user
$insert_user = insert_user($userid, $first_name, $last_name, $user_name, $email, $location,$password, 
						   $favourite_brand, $favourite_NBA_team, $profile_pic, $device_token,
						   $device_type, $points);

if($insert_user)
{
	$new_user = get_user_by_user_name($user_name);
	store_device_token($new_user, $device_token);
	$message = array('status'=>'1','message'=>'User registered successfully','data'=>$new_user);
	send_response($message);
	exit;
} 
else 
{ 
		$message = array('status'=>'0','message'=>'Error while adding record in database');
		send_response($message);
		exit;
}
?>