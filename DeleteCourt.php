<?php
include_once 'Files.php';
include_once 'Functions.php';
 
// capture all parameters in variables
$user_id            = $_REQUEST['user_id'];
$court_id           = $_REQUEST['court_id'];

$court_added_by = get_user_id_by_court_id($court_id);
if($court_added_by != $user_id)
{
	$message = array('status'=>'0','message'=>'This user cannot delete the court as this court is added by someone else');
	send_response($message);
	exit;
}
 
//Delete the court
$delete['query'] = "DELETE FROM `courts` WHERE court_id = '$court_id'";
$delete['run'] = $conn->query($delete['query']);

if ($delete['run']) 
{
    $message = array('status'=>'1','message'=>'Court deleted successfully');
	send_response($message);
	exit;
}
else 
{
    $message = array('status'=>'0','message'=>'Oops! Unable to delete court due to database errors,please try again');
	send_response($message);
	exit;
}
?>