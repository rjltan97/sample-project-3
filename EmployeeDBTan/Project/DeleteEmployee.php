<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="loginmodule.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
	session_start();
	require("auth.php");
	require("do_html_header.php");
	require("do_menu.php");
	do_html_header();
	print "<body><h1>Welcome ".$_SESSION['SESS_FIRST_NAME']."</h1>";
	do_menu();
?>

<H2>Delete Employee</H2>
<form action ="del2.php" method="POST">
<div class ="delete">
<table width ="600" border ="0" cellspacing ="1" cellpadding="2">
	<tr>
		<td width="500"> Type the employee number of the employee you wish to delete: </td>
		<td><input name="SSN" type="text" id="SSN"></td>
	</tr>
	<tr>
		<td width="200">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="100">&nbsp;</td>
		<td><input name="SUBMIT" type="SUBMIT" id="DELETE" value="Search"></td>
	</tr>
</table>
</form>
</div>
<br><br><br><br><br><br><br><br><br><br><footer>
  Robin Joshua L. Tan | 3ITSE01 | T/F 1:30-3:30/4:30 | Ms. Mia Lyn Bungay | Wallpaper by &copy;QueenBloodySky | Best Viewed in Mozilla Firefox
</footer>
</body>
</html>