<?php
//create a connection using mysqli object oriented approach
$conn = new mysqli("localhost","dharmani_WhereToHoop","dharmaniz@123","dharmani_WhereToHoop");
if (mysqli_connect_error()) 
{
    die("Connection failed: " . mysqli_connect_error());
}
?>