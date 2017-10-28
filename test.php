<html>
<head>
	<script>
		var time_to_send = <?php echo $mili_difference; ?>;
		
		function set_time_interval() 
		{
			alert("hii");
			// setTimeout(call_push_notify, time);
		}
		
		function call_push_notify() 
		{
			window.location.href = 'http://192.168.1.102/WhereToHoop/CheckinPushNotification.php'; 
		}
	</script>
</head>
</html>
<?php


// $user_id = $_REQUEST['user_id'];
// $court_id = $_REQUEST['court_id'];

echo "<script> set_time_interval(); </script>";
/* $points = 10;

$insert_checkin = insert_checkin_by_user($user_id, $court_id, $time);

if ($insert_checkin)
{
    add_points_by_user_id($user_id, $points);
    $message = array('status'=>'1','message'=>'Checkin inserted successfully');
	send_response($message);
	
	exit;
}
else
{
    $message = array('status'=>'0','message'=>'Unable to insert checkin due to database errors,Please try again');
	send_response($message);
	exit;
} */
function explode_for_removing_pm_or_am($current_time)
{
	$explode = explode(' ', $current_time);
	$time = $explode[0];
	
	return $time;
}

function get_total_seconds($hour,$minutes)
{
	$sec = $hour*60*60 + $minutes*60;

	return $sec;
}
?>
