<?php
	//Start Session
	session_start();

	//Unset the variables stored in session
	session_unset();

	//Kill the session
	session_destroy();
?>

<?php
	/*require("config.php");
	require("closedb.php");*/
?>

<?php
	require("do_html_header.php");
	do_html_header();
	print 
		   "<body> 
	       <h1>Logout </h1>
	       <p align=\"center\"></p>
	       <h4>You have been logged out.</h4>
	       <p align=\"center\">Click here to <a href=\"login-form.php\">LOGIN</a></p>
	       <br><br><br><br><br><br><br><br><br><br><footer>
			Robin Joshua L. Tan | 3ITSE01 | T/F 1:30-3:30/4:30 | Ms. Mia Lyn Bungay | Wallpaper by &copy;QueenBloodySky | Best Viewed in Mozilla Firefox | Best Viewed in Mozilla Firefox
		   </footer>
	       </body>
	       </html>";
?>