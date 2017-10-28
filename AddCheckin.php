<?php
include_once 'Files.php';
include_once 'Functions.php';

$user_id  = $_REQUEST['user_id'];
$court_id = $_REQUEST['court_id'];
$time     = $_REQUEST['time'];
$timezone = date_default_timezone_set('Asia/Kolkata');
$today_date = date("Y-m-d");

// $user = get_user_by_user_id($user_id);
// $device_token = $user['device_token'];
/* $explode_time = explode(':', $time);
$hour_of_checkin = $explode_time[0];
$minutes_of_checkin = $explode_time[1];
$checkin_seconds = get_total_seconds($hour_of_checkin, $minutes_of_checkin);

$current_time = explode_for_removing_pm_or_am($current_time_with_timestamp);
$explode_current_time = explode(':', $current_time);
$current_hour = $explode_current_time[0];
$current_minutes = $explode_current_time[1];
$current_seconds = get_total_seconds($current_hour, $current_minutes);

$seconds_difference = abs($checkin_seconds - $current_seconds);
$mili_difference = $seconds_difference*1000;
 */
$points = 10;

$insert_checkin = insert_checkin_by_user($user_id, $court_id, $today_date, $time);

if ($insert_checkin)
{
    add_points_by_user_id($user_id, $points);
    $message = array('status'=>'1','message'=>'Added checkin successfully');
	send_response($message);
	// echo "<script> set_time_interval($mili_difference,'$device_token'); </script>";
	exit;
}
else
{
    $message = array('status'=>'0','message'=>'Unable to insert checkin due to database errors,Please try again');
	send_response($message);
	exit;
}
/* function explode_for_removing_pm_or_am($current_time)
{
	$explode = explode(' ', $current_time);
	$time = $explode[0];
	
	return $time;
}

function get_total_seconds($hour,$minutes)
{
	$sec = $hour*60*60 + $minutes*60;

	return $sec;
} */
?>
