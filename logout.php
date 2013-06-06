<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<!--Stylesheets-->
<link href="css/style_home.css" rel="stylesheet" type="text/css" />

</head>
<body>

<?php

include('../classes/class_login.php');

logout();

?>

<div class="bigMessage" style="margin-left:auto; margin-right:auto; margin-top:200px;">
<div class="bigMessageText" style="margin-top:60px;">You've been logged out. <a href="index.html" style="color:#00a7ff;">Login</a></div>
<div class="bigMessageImage" style="margin-top:-90px;">
<img src="images/success.png" height="200" width="200" style="margin-top:-40px;">
</div>
</div>

</body>
</html>