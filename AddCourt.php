<?php
include_once 'Files.php';
include_once 'Functions.php';

$court_id = get_court_id();

//Capture all parameters in variables
$user_id            = $_REQUEST['user_id'];
$court_name         = $_REQUEST['court_name'];
$court_longitude    = $_REQUEST['court_longitude'];
$court_latitude     = $_REQUEST['court_latitude'];
$court_location     = $_REQUEST['court_location'];
$combo_box_1        = $_REQUEST['combo_box_1'];
$combo_box_2        = $_REQUEST['combo_box_2'];
$court_pic_base_64  = $_REQUEST['court_pic'];
$timing_start       = $_REQUEST['timing_start'];
$timing_end         = $_REQUEST['timing_end'];
$in_out              = $_REQUEST['in_out'];

$court_pic = get_court_pic($court_pic_base_64);
$points = 20;
if($court_pic == 'some problem occured')
{
	$message = array('status'=>'0','message'=>'Oops! Unable to upload the court pic to server please try again');
	send_response($message);
	exit;
} 
else
{
	$court_pic = $base_url.$court_pic;
}

//check if courtname already exists
$already_courtname = get_court_by_court_name($court_name);

if($already_courtname)
{
		$message = array('status'=>'0','message'=>'Oops! This court name is already taken, please try something else.');
		send_response($message);
		exit;
}

//insert new court
$insert_court = insert_court($court_id, $user_id, $court_name, $court_location, $court_longitude,
                             $court_latitude, $combo_box_1, $combo_box_2, $court_pic, $timing_start, $timing_end, $in_out);
if($insert_court)
{
        $new_court = get_court_by_court_name($court_name);

        add_points_by_user_id($user_id, $points);

        $message = array('status'=>'1','message'=>'Court registered successfully','data'=>$new_court);
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