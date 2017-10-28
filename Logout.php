<?php
include_once 'Files.php';
include_once 'Functions.php';

$user_id      = $_REQUEST['user_id'];
$device_token = $_REQUEST['device_token'];

$user = get_user_by_user_id($user_id);

/**
* if the device from which user logs out is latest one then change 
* device token to one from device_tokens table. If no entry in device_tokens
* table then retain this latest token i.e do nothing
*/
if ($user['device_token'] == $device_token)
{
    $latest_token = get_token_from_device_tokens_table($user_id);
    if ($latest_token)
    {
        update_device_token($user, $latest_token);
    }
}

/**
* Delete the user from device tokens table when logging out
*/

delete_token_when_logout($user_id, $device_token);
?>
