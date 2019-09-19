<!DOCTYPE HTML>
<head>
<title></title>
	<link href="loginmodule.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
	session_start();
	require("config.php");
	require("auth.php");
	require("do_html_header.php");
	require("do_menu.php");

	do_html_header();
	print"<h1>Welcome ".$_SESSION['SESS_FIRST_NAME']."</h1>";
	do_menu();
?>
<section>
<div class="mysql">
My SQLI Client Info:
<?php print(mysqli_get_client_info());?>
<br>
<br>
My SQLI Client Version: 
<?php print(mysqli_get_client_version());?>
<br>
<br>
My SQLI Host Info: 
<?php print(mysqli_get_host_info($conn));?>
<br>
<br>
My SQLI Protocol Info: 
<?php print(mysqli_get_proto_info($conn));?>
<br>
<br>
My SQLI Server Info: 
<?php print(mysqli_get_server_info($conn));?>
</div>
</section>
<br><br><br><br><br><br><br><br><br><br><footer>
		Robin Joshua L. Tan | 3ITSE01 | T/F 1:30-3:30/4:30 | Ms. Mia Lyn Bungay | Wallpaper by &copy;QueenBloodySky | Best Viewed in Mozilla Firefox
		</footer>
</body>
</html>
