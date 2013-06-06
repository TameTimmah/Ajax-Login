<?php

//Include config
require_once('class_config.php');

//Instance class
function createInstance(){
	
	//Instancing
	$obj = new declarations;
	return $obj;

}

//Execute database query
function executeDatabase($payload){
	
	//Create instance of class
	$obj = createInstance();
	
	//Make query
	$result = mysqli_query($obj->connectDB(), $payload);
	
	//Return query
	return $result;
	
}

//Clean strings for security
function secureStrings($username, $password){
	
	//Strip slashes
	$username = stripslashes($username);
	$password = stripslashes($password);
	
	//Return
	return $username;
	return $password;
}

//Check if user exists
function checkIfUserExists($username, $password){

	//Create database query
	$databaseQuery = "SELECT * FROM login WHERE username='$username' and password='$password'";
	
	//Execute query
	$result = executeDatabase($databaseQuery);
	
	
	//Count entries
	$count = mysqli_num_rows($result);
	
	
	//Return result
	if($count == 1){
	
		//True if yes
		return 'true';
		
	}
	
	else if($count == 0){
		
		//False if no
		return 'false';
		
	}
	
}

//Check if user already exists
function checkIfUserAlreadyExists($username, $password){
	
	//Encrypt Password
	$password = sha1($password);
	
	//Create database query
	$databaseQuery = "SELECT * FROM login WHERE username='$username'";
	
	//Execute query
	$result = executeDatabase($databaseQuery);
	
	
	//Count entries
	$count = mysqli_num_rows($result);
	
	//Return result
	if($count == 1){
	
		//True if yes
		return 'true';
		
	}
	
	else if($count == 0){
		
		//False if no
		return 'false';
		
	}
	
}

//Checks if email address already exists
function checkIfEmailExists($emailAddress){
	
	//Create database query
	$databaseQuery = "SELECT * FROM login WHERE emailAddress='$emailAddress'";
	
	//Execute query
	$result = executeDatabase($databaseQuery);
	
	//Count entries
	$count = mysqli_num_rows($result);
	
	//Return result
	if($count == 1){
	
		//True if yes
		return true;
		
	}
	
	else if($count ==0){
		
		//False if no
		return false;
		
	}
	
}


//Check if user  is approved
function checkIfApproved($username, $password){
	
	//Create database query
	$databaseQuery = "SELECT * FROM login WHERE username='$username' and password='$password' and confirmed='true'";
	
	//Execute query
	$result = executeDatabase($databaseQuery);
	
	//Count entries
	$count = mysqli_num_rows($result);
	
	//Return result
	if($count == 1){
	
		//True if yes
		return 'true';
		
	}
	
	else if($count == 0){
		
		//False if no
		return 'false';
		
	}	
	
}

//Checks Login
function checkLogin($username, $password){
	
	//Clean strings for security
	secureStrings($username, $password)->$username;
	secureStrings($username, $password)->$password;
	
	//Salt password
	$password = saltPassword($password);
	
	//Check if user exists
	if (checkIfUserExists($username,$password) == 'true'){
	

	//Check if approved 
	if (checkIfApproved($username, $password) == 'true'){
			//Create Session 
			createSession($username, $password);
		}
		
		else{
		
			print ('napproved');
			
		}
	
	}

	else{

		print('Incorrect');
		
	}	

}

//Salt Password
function saltPassword($password){
	
	//SHA1
	$password = sha1($password);
	
	//Return
	return $password;
	
}

//Create session
function createSession($username, $password){
	
	session_register("username");
	session_register("password"); 
	print ('Correct');
	
}
	
//Insert user
function insertUser($username, $password, $emailAddress){
	
	//Instance class
	$obj = createInstance();
	
	//Clean strings for security
	secureStrings($username, $password)->$username;
	secureStrings($username, $password)->$password;
	
	//Salt password
	$password = saltPassword($password);

	//Check if username already exists
	if (!checkIfUserAlreadyExists($username, $password)){
		
		echo "utaken";
		
	}
		
	//Check if email address is already registered
	else if (checkIfEmailExists($emailAddress)){
		
		echo "eused";
		
	}

	else {
		//Hash username
		$hash = saltPassword($username);
		
		//Get structure string
		$structure_login = $obj->structure_login();

		//Create query
		$databaseQuery = "INSERT INTO login $structure_login VALUES ('$username', '$password', '$emailAddress', '$hash', 'false')";
	
		//Execute database query
		executeDatabase($databaseQuery);
	
		//Get email address string
		$email_webmaster = $obj->email_webmaster();
	
		//Get confirmation url
		$url_confirm = $obj->confirm_url();
	
	
		//Create message
		$message = "Thank you for registering!\n\nUsername: $username\n\nEmail Address: $emailAddress\n\nConfirm User: $url_confirm".$hash."&emailAddress=".$emailAddress;
	
		$subject = "Thank you for registering!";
	
		//Send Email
		sendEmail($message, $emailAddress, $subject);
		print ('Correct');
	
	}
	
}

//Send Email
function sendEmail($payload, $destination, $subject){
	
	//Create instance
	$obj = createInstance();
	
	//Get server email
	$email_from = $obj->email_from();
	
	//Send Email
	$headers = "From:" . $email_from;
	mail($destination, $subject, $payload, $headers);
	
}

//Authorize user
function authorizeUser($hash, $emailAddress){
	
	//Generate database query
	$databaseQuery = "UPDATE login SET confirmed='true' WHERE hash='$hash'";
	
	//Execute query
	executeDatabase($databaseQuery);
	
	//Create message
	$message = "Your account has been confirmed!";
	$subject = "Your account has been confirmed!";
	
	//Send Email
	sendEmail($message, $emailAddress, $subject);
	
	
}

//Sends email to user with credentials
function forgotCredentials($emailAddress){
	//Checks if email address exists
	if(!checkIfEmailExists($emailAddress)){
		print ('enot');
	}
	
	//Create database query
	$databaseQuery = "SELECT * FROM login WHERE emailAddress='$emailAddress'";
	
	//Execute query
	$result = executeDatabase($databaseQuery);
	
	//While statement... Get data from database
	while($row = mysqli_fetch_array($result))
   	{
   		$obj = createInstance();
   		//Strings
   		$username = $row['username'];
   		$password = $row['password'];
   		$hash = $row['hash'];
   		$confirmHash = $hash.$password;
   		$reset_url = $obj->reset_url().$confirmHash."&email=".$emailAddress;
   		
		//Create Email
  		$subject = 'Request Login Credentials';
  		$message = "Username:$username\nPassword:$reset_url";
		
		//Send email
		sendEmail($message, $row['emailAddress'], $subject);
		print ('Correct');
	}

}

//Logs out
function logout(){
	
	session_start();
	session_destroy();
	
}

//Get's unauthorized users
function getUnauthorizedUsers(){
	
	//Create query
	$databaseQuery = "SELECT * FROM login WHERE confirmed='false'";
	
	//Execute database query
	executeDatabase($databaseQuery);
	
}

//Delete user
function deleteUser($hash){
	
	//Create database query
	$databaseQuery = "DELETE FROM login WHERE hash='$hash'";
	
	//Execute database query
	executeDatabase($databaseQuery);
	
}

//Checks if logged in
function isLoggedIn(){
	
	session_start();
	if(!session_is_registered(username)){
			echo '<script type="text/javascript">
window.location = "index.html"
</script>';
	}

	
}

function resetPassword($ticket, $emailAddress, $newPassword){
	//Create query
	$databaseQuery = "SELECT * FROM login WHERE emailAddress='$emailAddress'";
	
	//Execute Database query
	$result = executeDatabase($databaseQuery);
	
	//Fetch array
	while($row = mysqli_fetch_array($result)){

		//Create ticket based off database
		$hash = $row['hash'];
		$password = $row['password'];
		$checkTicket = $hash.$password;
		
		if ($checkTicket == $ticket){
			$newPassword = saltPassword($newPassword);
			$databaseQuery = "UPDATE login SET password='$newPassword' WHERE emailAddress='$emailAddress'";
			executeDatabase($databaseQuery);
			print ('reset');
		}
		
		else {
			print ('brequest');
		}
				
	}
	
}

function changePassword($ticket, $username, $newPassword){
	
	//Create query
	$databaseQuery = "SELECT * FROM login WHERE username='$username'";
	
	//Execute Database query
	$result = executeDatabase($databaseQuery);
	
	//Fetch array
	while($row = mysqli_fetch_array($result)){

		//Create ticket based off database
		$hash = $row['hash'];
		$password = $row['password'];
		$checkTicket = $hash;
		
		if ($checkTicket == $ticket){
			$newPassword = saltPassword($newPassword);
			$databaseQuery = "UPDATE login SET password='$newPassword' WHERE emailAddress='$username'";
			executeDatabase($databaseQuery);
			print ('reset');
		}
		
		else {
			print ('error');
		}
				
	}
	
}

?>