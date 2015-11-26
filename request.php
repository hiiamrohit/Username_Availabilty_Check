<?php
/*
* Author: Rohit Kumar
* Website: iamrohit.in
* Version: 0.0.1
* Date: 26-11-2015
* App Name: Username Availabilty Check
* Description: Username Availabilty Check Script in PHP, MYSQL, JQUERY
*/ 
$hostname = "localhost";
$username = "root";
$password = "root";
$dbname = "user";
$uname = $_GET['uname'];
if(isset($uname) || !empty($uname)) {
	$con = mysqli_connect($hostname, $username, $password, $dbname);
    $query = "SELECT * FROM users WHERE uname = '$uname'";
    $result = mysqli_query($con, $query);
    $num = mysqli_num_rows($result);
    echo $num;
}
?>