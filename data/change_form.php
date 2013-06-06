<?php

//Include files
require_once('../classes/class_login.php');

//Get post data
$ticket = $_POST['ticket'];
$newPassword = $_POST['newPassword'];
$username = $_POST['username'];
	
if($newPassword == ''){
	print ('npassword');
}
	
else{

changePassword($ticket, $username, $newPassword);

}
?>