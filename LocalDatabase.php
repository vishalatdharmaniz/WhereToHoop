<?php
//create a connection using mysqli object oriented approach
$conn = new mysqli("localhost","root","budha","dharmani_wheretohoop");
if ( mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}
?>