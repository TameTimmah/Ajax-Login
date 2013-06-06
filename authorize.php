<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<!--Stylesheets-->
<link href="css/style.css" rel="stylesheet" type="text/css" />

</head>
<body>

<?php

include('classes/class_login.php');

$hash = $_GET['hash'];
$emailAddress = $_GET['emailAddress'];

authorizeUser($hash, $emailAddress);

?>

<div class="bigMessage">
<div class="bigMessageText" style="margin-top:60px;">Account has been authorized! <a href="index.php">Login</a></div>
<div class="bigMessageImage">
<img src="images/success.png" height="200" width="200" style="margin-top:-130px;">
</div>

</div>

</body>
</html>