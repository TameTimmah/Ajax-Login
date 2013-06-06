<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<!--Stylesheets-->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('.message').hide();
};
</script>
<script>
function check_login(){

   	 	$.ajax({
        	type: 'POST',
        	url: 'resetpwd.php',
        	data: "username=" + $('#username').val() + "&password=" + $('#password').val() "task=login",
        	success: function(response){
                if(response === 'Reset'){
              		$('.messageText').append('Password has been sucessfully reset to <i style="color:#0092ff;">"' + $('#password').val() + '"</i>');
	          		$(".messageImage").append('<img src="images/success.png" height="50" width="50">');

	            	$('.message').show();
               }
            	else{
	            
	          		$('.messageText').append('You have submitted a bad request.  Request new reset.');
	          		$(".messageImage").append('<img src="images/error.png" height="50" width="50">');

	            	$('.message').show();
  
	            
	            }
            
             };
         });
 

    };

</script>
</head>
<body>

<?php

include('classes/class_login.php');

$ticket = $_GET['ticket'];
$emailAddress = $_GET['emailAddress'];

?>
<div id="wrapper" class="forgotWrapper">
	<!--Sliding icons-->
    <div class="pass-icon" style="margin-top:-128px;"></div>
    <!--END Sliding icons-->

<!--login form inputs-->
<div class="login-form">
<form id="loginForm" onsubmit='check_login();return false;'>

	<!--Header-->
    <div class="header">
    <h1>Forgot Credentials</h1>
    <span>Enter your email address to retrieve your login information.</span>
    </div>
    <!--END header-->
	
	<!--Input fields-->
    <div class="content">
	
    <!--PASSWORD--><input name="password" type="password" id="password" class="input password required" placeholder="New Password" style="margin-top:-25;"/><!--END PASSWORD-->
    </div>
    <!--END Input fields-->
    
    <!--Buttons-->
    <div class="footer">
    <!--Login button--><input id="submit" type="submit" name="Login" value="Reset" class="button" id="login"/><!--END Login button-->
    <a href="index.html" id="submit" type="submit" name="Register" value="Register" class="register" ><--Login</a>
    </form>
    </div>
    <!--END Buttons-->


<!--end login form-->
</div>
</div>



</body>
</html>