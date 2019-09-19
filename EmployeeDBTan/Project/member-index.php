<?php
	session_start();
	require("auth.php");
	require("do_html_header.php");
	require("do_menu.php");

	do_html_header();
	print"<h1>Welcome ".$_SESSION['SESS_FIRST_NAME']."</h1>";
	do_menu();
?>
<?php
		print "
		<br><br><br><br><br><br><br><br><br><br><footer>
		Robin Joshua L. Tan | 3ITSE01 | T/F 1:30-3:30/4:30 | Ms. Mia Lyn Bungay | Wallpaper by &copy;QueenBloodySky | Best Viewed in Mozilla Firefox
		</footer>";
?>