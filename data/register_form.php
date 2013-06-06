<?php

//Include files
require_once('../classes/class_login.php');

//Get post data
$username = $_POST['username'];
$password = $_POST['password'];
$emailAddress = $_POST['email'];

if ($username == ''){
		print ('nusername');
	}

else if ($password == ''){
		print ('npassword');
	}
	
else if ($emailAddress == ''){
		print ('nemail');
	}

else {	
	//Call register function
	insertUser($username, $password, $emailAddress);
}

?>