<?php
include_once 'Files.php';
include_once 'Functions.php';
$timezone = date_default_timezone_set('Asia/Kolkata');
$today_date = date("Y-m-d");
$current_time = date("h:i A");
$current_time = date('h:i A', strtotime($current_time));
$checkin_array = get_all_checkins_for_today($today_date, $current_time);

foreach($checkin_array as $checkin_person)
{
    $user_id = $checkin_person['user_id'];

    $device_tokens_array = get_token_from_device_tokens_table($user_id);
    
    $court_id = $checkin_person['court_id'];
    $court = get_court_by_court_id($court_id);
    $court_name = $court['court_name'];

    $payload = json_encode([
        'aps' => [
            'alert' => 'You Have added a checkin to '.$court_name.' for now.Please try to be present there',
            'sound' => 'default',
            'badge' => 1
        ]
    ]);

    foreach($device_tokens_array as $device_token)
    {
        $result = send_ios_notification($device_token, $payload);
        
        // var_dump($result);
    }
}

function send_ios_notification($deviceToken, $payload)
{
    
    $ctx = stream_context_create();
    stream_context_set_option($ctx, 'ssl', 'local_cert','wth_dev.pem');
    // Open a connection to the APNS server
    $fp = stream_socket_client(
    'ssl://gateway.sandbox.push.apple.com:2195', $err,  // For development
    // 'ssl://gateway.push.apple.com:2195', $err, // for production
    $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
    if (!$fp)
    {
        // exit("Failed to connect: $err $errstr" . PHP_EOL);
    }
    else
    {
        // echo 'Connected to APNS' . PHP_EOL;
    }

    // Build the binary notification
    $msg = chr(0) . pack('n', 32) . pack('H*', trim($deviceToken)) . pack('n', strlen($payload)) . $payload;
    // Send it to the server
    $result = fwrite($fp, $msg);
    if (!$result)
    {
        // echo 'Message not delivered' . PHP_EOL;
    }
    else
    {
        echo 'Message successfully delivered' . PHP_EOL;
        return $result;
    }
    // Close the connection to the server
    fclose($fp);
}
?>