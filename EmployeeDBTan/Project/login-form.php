<!DOCTYPE html PUBLIC "-//w3c//dtd xhtml 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css">
</head>

<?php
require("do_html_header.php");
do_html_header();
?>



<br>
<br>
<body>
<section>
<div class="login">
<h3>Log-In</h3>
<form id="loginForm" name="loginForm" method="post" action="login-exec.php">
<table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
<tr>
<td width="112"><b>Login</b></td>
<td width="188"><input name="login" type="text" class="textfield"/></td>
</tr>
<tr>
<td><b>Password</b></td>
<td><input name="password" type="password" class="textfield"/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"/></td>
</tr>
</table>
</form>
</div>
</section>

<?php
require("registration.php");
?>





<br><br><br><br><br><br><br><br><br><br><footer>
Robin Joshua L. Tan | 3ITSE01 | T/F 1:30-3:30/4:30 | Ms. Mia Lyn Bungay | Wallpaper by &copy;QueenBloodySky | Best Viewed in Mozilla Firefox
</footer>
</body>

</html>