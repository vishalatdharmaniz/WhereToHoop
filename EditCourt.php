<?php
include_once 'Files.php';
include_once 'Functions.php';
 
// capture all parameters in variables
$user_id            = $_REQUEST['user_id'];
$court_id           = $_REQUEST['court_id'];
$court_name         = $_REQUEST['court_name'];
$court_location     = $_REQUEST['court_location'];
$court_longitude    = $_REQUEST['court_longitude'];
$court_latitude     = $_REQUEST['court_latitude'];
$combo_box_1        = $_REQUEST['combo_box_1'];
$combo_box_2        = $_REQUEST['combo_box_2'];
$court_pic_base_64  = $_REQUEST['court_pic'];
$timing_start      	= $_REQUEST['timing_start'];
$timing_end      	= $_REQUEST['timing_end'];
$in_out				= $_REQUEST['in_out'];
$zip_code				= $_REQUEST['zip_code'];

$court_added_by = get_user_id_by_court_id($court_id);
if($court_added_by != $user_id)
{
	$message = array('status'=>'0','message'=>'This user cannot update the court as this court is added by someone else');
	send_response($message);
	exit;
}

$court_pic = get_court_pic($court_pic_base_64);

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
$already_court = get_court_by_court_name($court_name);

if($already_court && $already_court['court_name'] != $court_name)
{
		$message = array('status'=>'0','message'=>'Oops! This court name is already taken, please try something else.');
		send_response($message);
		exit;
}
 
//Update the data
$update['query'] = "UPDATE `courts` SET `court_name` = '$court_name',`court_latitude` = '$court_latitude',
					`court_latitude` = '$court_latitude',`court_longitude` = '$court_longitude',
					`court_pic` = '$court_pic',`timing_start` = '$timing_start', `timing_end` = '$timing_end', `combo_box_1` = '$combo_box_1',
					`combo_box_2` = '$combo_box_2', `court_location` = '$court_location', in_out = '$in_out', zip_code = '$zip_code'
					WHERE court_id = '$court_id'";
$update['run'] = $conn->query($update['query']);

if ($update['run']) 
{
    $court = get_court_by_court_id($court_id);

    $message = array('status'=>'1','message'=>'Court updated successfully','data'=>$court);
	send_response($message);
	exit;
}
else 
{
    $message = array('status'=>'0','message'=>'Oops! Unable to update court due to database errors,please try again');
	send_response($message);
	exit;
}
?>