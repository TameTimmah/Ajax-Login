<?php

//Include files
require_once('../classes/class_login.php');

//Get post data
$ticket = $_POST['ticket'];
$newPassword = $_POST['newPassword'];
$emailAddress = $_POST['email'];
	
	if($newPassword == ''){
		print ('npassword');
	}
	
else{
	//Call reset function
	resetPassword($ticket, $emailAddress, $newPassword);
}
?>