<?php
include_once 'Files.php';

/**
*GLOBAL FUNCTIONS 
*----------------
*/

/**  
*function to send response
*/
function send_response($message)
{
	echo json_encode($message);
}

/* 
*function to calculate distance based on latitudes and longitudes
*/
function get_distance_from_lat_long($lat1, $lon1, $lat2, $lon2) 
{
      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $distance_in_miles = $dist * 60 * 1.1515;
      $distance_in_Km = $distance_in_miles * 1.609344;

      return $distance_in_miles;
}

/** 
*USER RELATED FUNCTIONS 
*----------------------
*/
                                    
/*
*function to get court_id
*/
function get_court_id() 
{
    global $conn;
    $q['query'] = "SELECT MAX(court_id) FROM `courts` WHERE 1";
    $q['run'] = $conn->query($q['query']);
    if($q['run']->num_rows != '0')
    {
        $q['result'] = $q['run']->fetch_assoc();
        return $q['result']["MAX(court_id)"] + 1;
    }
    else
    {
        return 1;
    }
}

/**
*function for getting courts by userid
*/
function get_all_courts_by_user_id($user_id)
{
    global $conn;
    $all_courts_by_user = array();
    $q['query'] = "SELECT * FROM `courts` WHERE `user_id`='$user_id'";
    $q['run'] = $conn->query($q['query']);
    while($q['result'] = $q['run']->fetch_assoc())
    {
         array_push($all_courts_by_user,$q['result']);
    }

    return $all_courts_by_user;
}

/**
*function for getting court by courtname
*/
function get_court_by_court_name($court_name)
{
    global $conn;
    $q['query'] = "SELECT * FROM `courts` WHERE `court_name`='$court_name'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();

    return $q['result'];
}

/**
*function for getting court by court_id
*/
function get_court_by_court_id($court_id)
{
    global $conn;
    $q['query'] = "SELECT * FROM `courts` WHERE `court_id`='$court_id'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();

    return $q['result'];
}



/**
*function for inserting court in table 
*/
function insert_court($court_id, $user_id, $court_name, $court_location, $court_longitude,
                      $court_latitude, $combo_box_1, $combo_box_2, $court_pic, $timing_start, $timing_end, $in_out)
{
        global $conn;
        $q['query'] = "INSERT INTO `courts` 
                       (`court_id`, `user_id`, `court_name`, `court_location`, `court_longitude`,
                        `court_latitude`, `combo_box_1`, `combo_box_2`, `court_pic`, `timing_start`, `timing_end`, in_out) 
                         VALUES ( '$court_id', '$user_id', '$court_name', '$court_location', '$court_longitude',
                         '$court_latitude', '$combo_box_1', '$combo_box_2', '$court_pic', '$timing_start', '$timing_end', '$in_out')";

        $q['run'] = $conn->query($q['query']);

        return $q['run'];
}

/**
*function for getting nearby courts by userid
*/
function get_nearby_courts_by_user_id($user_id, $user_latitude, $user_longitude)
{
    global $conn;
    $nearby_courts = array();
    $all_courts = array();
    $q['query'] = "SELECT * FROM `courts` WHERE user_id != '$user_id'";
    $q['run'] = $conn->query($q['query']);
    while($q['result'] = $q['run']->fetch_assoc())
    {
         array_push($all_courts,$q['result']);
    }

    /**
    *for each court get the distance from user and if it
    *is less than nearby distance add it to nearby courts.
    */
    foreach($all_courts as $court)
    {
        $court_latitude = $court['court_latitude'];
        $court_longitude = $court['court_longitude'];
        $distance = get_distance_from_lat_long($court_latitude, $court_longitude, $user_latitude, $user_longitude);
        if($distance <= 5)
        {
            array_push($nearby_courts,$court);
        }
    }
    return $nearby_courts;
}

/** 
*This function gets the base 64 court pic, decodes it and puts it in a jpg file
*/
function get_court_pic($img)
{
	define('UPLOAD_DIR', 'CourtPics/');
	$img 	= str_replace('data:image/png;base64,', '', $img);
	$img 	= str_replace(' ', '+', $img);
	$data 	= base64_decode($img);
    $file 	= UPLOAD_DIR . uniqid() . '.jpg';
    $success = file_put_contents($file, $data);
    
	return $success ? $file : 'some problem occured';
}

/**
*function for getting user who added court by court_id
*/
function get_user_id_by_court_id($court_id)
{
    global $conn;
    $q['query'] = "SELECT user_id FROM `courts` WHERE `court_id`='$court_id'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();

    return $q['result']["user_id"];
}
/**
*COURT RELATED FUNCTIONS 
*-----------------------
*/

/*
*function to get user_id
*/
function get_user_id() 
{
    global $conn;
    $q['query'] = "SELECT MAX(user_id) FROM `user_master` WHERE 1";
    $q['run'] = $conn->query($q['query']);
    if($q['run']->num_rows != '0')
    {
        $q['result'] = $q['run']->fetch_assoc();
        $result = $q['result']['MAX(user_id)'] + 1;
        return $result;
    }
    else
    {
        return 1;
    }
}

/*
*function for checking user existence
*/
function check_user_existence($username, $password) 
{
    global $conn;
    $q['query'] = "SELECT * FROM `user_master` WHERE user_name = '$username' AND password = '$password'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();

    return $q['result'];
}

/**
*function for getting user by username
*/
function get_user_by_user_name($user_name)
{
    global $conn;
    $q['query'] = "SELECT * FROM `user_master` WHERE `user_name`='$user_name'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();

    return $q['result'];
}

/**
*function for getting user by email
*/
function get_user_by_email($email)
{
    global $conn;
    $q['query'] = "SELECT * FROM `user_master` WHERE `email`='$email'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();

    return $q['result'];
}

/**
*function for getting user by user_id
*/
function get_user_by_user_id($user_id)
{
    global $conn;
    $q['query'] = "SELECT * FROM `user_master` WHERE `user_id`='$user_id'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();

    return $q['result'];
}

/* 
*function to update token of given user
*/
function update_device_token($user, $device_token) 
{
    global $conn;
    $user_id = $user['user_id'];
    // var_dump($device_token);
    $q['query'] = "UPDATE `user_master` SET `device_token`='$device_token' WHERE user_id = '$user_id'";
    $q['run'] = $conn->query($q['query']);

    return $q['run'];
}

/* 
*function to update points of given user
*/
function add_points_by_user_id($user_id, $points) 
{
    global $conn;
    
    $q['query'] = "UPDATE `user_master` SET points=points + $points WHERE user_id = '$user_id'";
    $q['run'] = $conn->query($q['query']);

    return $q['run'];
}

/** 
*This function gets the base 64 profile pic, decodes it and puts it in a jpg file
*/
function get_profile_pic($img)
{
	define('UPLOAD_DIR', 'ProfilePics/');
	$img 	= str_replace('data:image/png;base64,', '', $img);
	$img 	= str_replace(' ', '+', $img);
	$data 	= base64_decode($img);
    $file 	= UPLOAD_DIR . uniqid() . '.jpg';
    $success = file_put_contents($file, $data);
    
	return $success ? $file : 'some problem occured';
}

/**
*function for inserting new user in table 
*/
function insert_user($user_id, $first_name, $last_name, $user_name, $email, $location, $password, 
                     $favourite_brand, $favourite_NBA_team, $profile_pic, $device_token, $device_type, $points)
{
    global $conn;
    $q['query'] = "INSERT INTO `user_master` 
                    (`user_id`, `first_name`, `last_name`, `user_name`, `email`, `location`,
                    `password`, `favourite_brand`, `favourite_NBA_team`, `profile_pic`,
                    `device_token`, `device_type`, `points`) 
                    VALUES ( '$user_id','$first_name',
                    '$last_name', '$user_name', '$email', '$location', '$password', '$favourite_brand',
                    '$favourite_NBA_team', '$profile_pic', '$device_token', '$device_type', '$points')";

    $q['run'] = $conn->query($q['query']);

    return $q['run'];
}

/**
*Hoopins functions
*----------------
*/

/* 
*function to get all hoopins of a court
*/
function get_all_hoopins_by_court($court_id)
{
    global $conn;
    $all_hoopins = array();
    $q['query'] = "SELECT user_id FROM `whos_hoopin` WHERE `court_id`='$court_id'";
    $q['run'] = $conn->query($q['query']);

    while($q['result'] = $q['run']->fetch_assoc())
    {
         array_push($all_hoopins, $q['result']['user_id']);
    }
    return $all_hoopins;
}

/**
*chekin functions
*----------------
*/

/* 
*function to add checkin for a user
*/
function insert_checkin_by_user($user_id, $court_id, $today_date, $time)
{
    global $conn;
    $q['query'] = "INSERT INTO `whos_hoopin` (`user_id`,`court_id`, today_date, `time`) 
                                      VALUES ( '$user_id','$court_id','$today_date', '$time')";

    $q['run'] = $conn->query($q['query']);

    return $q['run'];
}

/**
*Random functions
*----------------
*/

/**
*function for storing previous device token 
*/
function store_device_token($user, $device_token)
{
    global $conn;
    $user_id = $user['user_id'];
    $q['query'] = "INSERT INTO `device_tokens`(`user_id`, `device_token`) 
                   VALUES('$user_id', '$device_token')";
    $q['run'] = $conn->query($q['query']);

    return $q['run'];
}

/**
*function for deleting device_token on logout from device
*/
function delete_token_when_logout($user_id, $device_token)
{
    global $conn;
    $q['query'] = "DELETE FROM `device_tokens` WHERE `user_id`= '$user_id' AND `device_token`='$device_token'";
    $q['run'] = $conn->query($q['query']);

    return $q['run'];
}

/**
*function to get device token from device_tokens table
*/
function get_token_from_device_tokens_table($user_id)
{
    global $conn;
    $device_tokens = array(); 
    $q['query'] = "SELECT device_token FROM `device_tokens` WHERE `user_id`='$user_id'";
    $q['run'] = $conn->query($q['query']);
    while($q['result'] = $q['run']->fetch_assoc())
    {
        array_push($device_tokens, $q['result']['device_token']);
    }

    return $device_tokens;
}
/**
*function for getting user based on device token
*/
function get_user_by_device_token($device_token)
{
    global $conn;
    $q['query'] = "SELECT * FROM `user_master` WHERE `device_token`='$device_token'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = $q['run']->fetch_assoc();
    if ($q['result'])
    {
        return $q['result'];
    }
    else
    {
        $q1['query'] = "SELECT * FROM `device_tokens` WHERE `device_token`='$device_token'";
        $q1['run'] = $conn->query($q1['query']);
        $q1['result'] = $q1['run']->fetch_assoc();
    
        return $q1['result'];
    }

}

/**
*function for logging out user who uninstalled the app
*/
function logout_left_user($device_token)
{
    global $base_url;
    $left_user = get_user_by_device_token($device_token);
    if ($left_user)
    {
        $user_id = $left_user['user_id'];
        $device_token = $left_user['device_token'];
        $ch = curl_init();
        
        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $base_url.'Logout.php');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, true); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, "user_id=$user_id&device_token=$device_token");
        
        // grab URL and pass it to the browser
        curl_exec($ch);
        
        // close cURL resource, and free up system resources
        curl_close($ch);
    
    }
}
function get_checkin_time_by_user_id_court_id($user_id, $court_id)
{
    global $conn;
    $q1['query'] = "SELECT * FROM `whos_hoopin` WHERE `user_id`='$user_id' AND `court_id`='$court_id'";
    $q1['run'] = $conn->query($q1['query']);
    $q1['result'] = $q1['run']->fetch_assoc();

    return $q1['result'];
}

function get_all_checkins_for_today($today_date, $current_time)
{
    global $conn;
    $all_checkins_for_today = array();
    $current_time = strtoupper($current_time);
    $q1['query'] = "SELECT * FROM `whos_hoopin` WHERE today_date = '$today_date' AND `time`= '$current_time' ";
    $q1['run'] = $conn->query($q1['query']);
    while($q1['result'] = $q1['run']->fetch_assoc())
    {
        array_push($all_checkins_for_today,$q1['result']);
    }

    return $all_checkins_for_today;
}
?>