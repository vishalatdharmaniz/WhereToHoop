<?php
include_once 'Files.php';
include_once 'Functions.php';

$user_id        = $_REQUEST['user_id'];
$old_password   = $_REQUEST['old_password'];
$new_password   = $_REQUEST['new_password'];

//check if user is registered or not
$user = get_user_by_user_id($user_id);

if ($user) 
{
    //check if old password entered is correct or not
    if ($user['password'] == $old_password) 
    {
        
        // query for updating password
        
        $update['query'] = "UPDATE `user_master` SET `password`='$new_password' WHERE user_id = '$user_id'";
        $update['run'] = $conn->query($update['query']);
        if($update['run']) 
        {
            $message = array('status'=>'1','message'=>'Password updated');
            echo json_encode($message); 
            exit;    
        }
        else 
        {
            $message = array('status'=>'0','message'=>'Unable to update password due to server errors');
            send_response($message); 
            exit; 
        }
    }else 
    {
        $message = array('status'=>'0','message'=>'old password is incorrect');
        send_response($message); 
        exit;   
    }
    
}
else 
{
    $message = array('status'=>'0','message'=>'User not registered');
    send_response($message);
    exit;
}
?>