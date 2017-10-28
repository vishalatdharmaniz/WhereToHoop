<?php
include_once 'Files.php';
include_once 'Functions.php';

//Put all the requested parameters in variables 
$court_id = $_REQUEST['court_id'];

$user_ids = get_all_hoopins_by_court($court_id);

$users_array = array();
foreach($user_ids as $user_id)
{
	$user = get_user_by_user_id($user_id);
	array_push($users_array, $user);
}

/** 
*Here will be implemented the functionality of available now or later
*/
$court = get_court_by_court_id($court_id);
$start_timing = $court['timing_start'];
$end_timing = $court['timing_end'];
foreach($user_ids as $user_id)
{
	$checkin_time = get_checkin_time_by_user_id_court_id($user_id, $court_id);
}
if ($user_ids)
{
    $message = array('status'=>'1','message'=>'hoopins found' , 'users'=>$users_array);
	send_response($message);
	exit;
}
else
{
    $message = array('status'=>'0','message'=>'No Hoopins found');
	send_response($message);
	exit;
}
?>