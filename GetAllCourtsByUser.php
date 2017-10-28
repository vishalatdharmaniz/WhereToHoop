<?php
include_once 'Files.php';
include_once 'Functions.php';

$user_id = $_REQUEST['user_id'];

$courts = get_all_courts_by_user_id($user_id);
if ($courts)
{
    $message = array('status'=>'1','message'=>'Courts Found', 'courts'=>$courts);
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
