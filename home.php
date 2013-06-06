<?php
//Include classes
require_once('classes/class_login.php');
require_once('classes/class_config.php');

//Check if logged in
isLoggedIn();	

//For various uses
$username = $_SESSION['username'];
$password = $_SESSION['password'];

//Create session has (same as hash created for reset password, REQUIRED FOR PASSWORD RESET)
$hashed_username = saltPassword($username);
$sessionHash = $hashed_username;
?>
<html>
	
	<head>
		
		<link href="css/style_home.css" rel="stylesheet" type="text/css" />

		<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
	
	<script language="javascript" type="text/javascript" src="scripts/data_handling.js"></script>

	


</head>
	
<body>

	<div id="nav">
		<p class="title"><a href="home.php">Home - <span class="subtitle">Example.com</span></a></p>
		<ul id="navigation">
			<a href="logout.php">Logout</a>
		</ul>
	</div>
	

	<div class="container">
	
		<div class="message" style="">
			<div class="messageText"></div>
			<div class="messageImage"></div>
		</div>
					<script language="javascript">
	$('.message').hide();
	</script>
		<br>
		
		<div class="bigMessage" style="margin-top:50px; margin-left:60px;">
		
			<div class="bigMessageText" style="margin-top:50px;">Welcome <i style="color:#00bfff;">"<?php echo $username ?>"</i>! <a href="logout.php" style="color:#00bfff;">Logout</a></div>
			<div class="bigMessageImage">
				<img src="images/success.png" height="200" width="200" style="margin-top:-158px;">
			</div>
		</div
		</div>
	
	
	
		<div class="module" style="width:400px; margin-left:740px; margin-top:-160px;">
			<div class="moduleTitle">Change Password</div><hr>
				<form onsubmit="change_password();return false;" style="margin-left:auto; margin-right:auto;">
					<input type="hidden" value="<?php echo $sessionHash; ?>" id="ticket">
					<input type="text" value="" id="newPassword" class="input" placeholder="New Password">
					<input type="hidden" value="<?php echo $username; ?>" id="username">
					<input type="submit" value="Login" class="submit" id="login"/>
				</form>
			</div>
		</div>
	
	</div>

</html>