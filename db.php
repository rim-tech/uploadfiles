<?php
//connect mysql database
$host = "localhost";
$user = "username";
$pass = "password";
$db = "pdp";
$con = mysqli_connect($host, $user, $pass, $db) or die("Error " . mysqli_error($con));
?>