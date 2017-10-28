<?php
include_once 'Files.php';
include_once 'Functions.php';

$user_id = $_REQUEST['user_id'];
$user_latitude = $_REQUEST['user_latitude'];
$user_longitude = $_REQUEST['user_longitude'];

$all_courts_by_user = get_all_courts_by_user_id($user_id);
$nearby_courts = get_nearby_courts_by_user_id($user_id, $user_latitude, $user_longitude);

$response_courts = array_merge($all_courts_by_user, $nearby_courts);

if ($response_courts != NULL)
{
    $message = array('status'=>'1','message'=>'Nearby Courts Found', 'courts'=>$response_courts);
    send_response($message);
    exit;
}
else 
{
    $message = array('status'=>'1','message'=>'No courts Found');
    send_response($message);
    exit;
}
?>
