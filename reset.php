<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<!--Stylesheets-->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
<script language="javascript" type="text/javascript" src="scripts/data_handling.js"></script>
</head>
<body>

    	<div class="message">
<div class="messageText"></div>
<div class="messageImage"></div>
</div>
<?php

$ticket = $_GET['ticket'];
$emailAddress = $_GET['email'];

?>
<div id="wrapper" class="forgotWrapper">
	<!--Sliding icons-->
    <div class="pass-icon" style="margin-top:-143px;"></div>
    <!--END Sliding icons-->

<!--login form inputs-->
<div class="login-form">
	<form id="loginForm" onsubmit='reset_password();return false;'>

	<!--Header-->
    <div class="header">
    	<h1>Reset Password</h1>
    	<span>Enter your new password.</span>
    </div>
    <!--END header-->
	
	<!--Input fields-->
    <div class="content">
    	<input type="hidden" id="ticket" value="<?php echo $ticket; ?>">
		<input name="newPassword" type="password" id="newPassword" class="input emailAddress required" placeholder="New Password" />
		<input type="hidden" id="email" value="<?php echo $emailAddress; ?>">
    </div>
    <!--END Input fields-->
    
    <!--Buttons-->
    <div class="footer">
    	<input id="submit" type="submit" name="Login" value="Reset" class="button" id="login"/></form>
    	<a href="index.html" id="submit" class="register"><--Login</a>
    </div>
    <!--END Buttons-->
<!--end login form-->

<script>

$('.message').hide();

</script>
</body>
</html>