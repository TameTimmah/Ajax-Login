<?php

//Include files
require_once('../classes/class_login.php');

//Get post data
$emailAddress = $_POST['email'];
	
if ($emailAddress == ''){
	print('nemail');
}
	
else{
	forgotCredentials($emailAddress);
}
	
?>