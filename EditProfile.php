<?php
include_once 'Files.php';
include_once 'Functions.php';

//Firstly, capture all the parameters
$user_id            = $_REQUEST['user_id'];
$first_name         = $_REQUEST['first_name'];
$last_name          = $_REQUEST['last_name'];
$location 			= $_REQUEST['location'];
$favourite_brand    = $_REQUEST['favourite_brand'];
$favourite_NBA_team = $_REQUEST['favourite_NBA_team'];
$profile_pic_base_64= $_REQUEST['profile_pic'];

$profile_pic = get_profile_pic($profile_pic_base_64);

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
 
//Update the data
$update['query'] = "UPDATE `user_master` SET `first_name` = '$first_name',
					`last_name` = '$last_name', `location` = '$location', 
					`favourite_brand` = '$favourite_brand',
					`favourite_NBA_team` = '$favourite_NBA_team', `profile_pic` = '$profile_pic' 
					WHERE user_id = '$user_id'";
					
$update['run'] = $conn->query($update['query']);
if ($update['run']) 
{
    $user = get_user_by_user_id($user_id);

    $message = array('status'=>'1','message'=>'Profile updated successfully','data'=>$user);
	send_response($message);
	exit;
}
else 
{
    $message = array('status'=>'0','message'=>'Oops! Unable to update profile due to database errors,please try again');
	send_response($message);
	exit;
}
?>