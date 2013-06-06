<?php
//Include files
require_once('../../classes/class_login.php');

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == ''){
		print ('nusername');
	}

	else if($password == ''){
		print ('npassword');
	}
	
	else{
		//Call register function
		checkLogin($username, $password);
	}
?>