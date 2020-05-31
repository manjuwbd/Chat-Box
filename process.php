<?php
include 'database.php';

if(isset($_POST['submit'])){
	$user = mysqli_real_escape_string($con, 
		$_POST['user']);
	$message = mysqli_real_escape_string($con, 
		$_POST['message']);
	date_default_timezone_set('America/New_York');
	$time = date('h:i:s a',time());
	if(!isset($user) || $user == '' || !isset($message) || $message == ''){
		$error ="please fill corrrectly";
		header("Location: index.php?error=".urlencode($error));
		exit();



	}else {
		$query = "INSERT INTO shouts (User,Message, time) VALUES ('$user','$message','$time')";
		if(!mysqli_query($con,$query)){
			die('Error: '.mysql_error($con));
		} else {
			header("Location: index.php");
			exit();
		}

	}
}