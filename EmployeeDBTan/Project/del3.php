<?php
	session_start();
	require("config.php");
	require('auth.php');
	require("do_html_header.php");
	require("do_menu.php");
	require("clean.php");
	do_html_header();
	print "<body><h1>Welcome ".$_SESSION["SESS_FIRST_NAME"]."</h1>";
	do_menu();
?>

<?php
	print "<H2>Delete Employee</H2>";
	if(isset($_POST['DELETE'])) {
		$SSN = ($_SESSION['SSN']);
		$result = mysqli_query($conn, "DELETE FROM employee WHERE SSN='$SSN'");
		if(!$result)
		{
			print "<BR> DELETE operation unsucessful <BR><A HREF= 'DeleteEmployee.php'>Go Back</A>";
		}
		else {
		print ("<BR><BR>1 record deleted<BR>");
		print ("Click <A HREF='limits2.php'>here</A>to view the updated list of employees.");
		print "<br><br><footer>
Robin Joshua L. Tan | 3ITSE01 | T/F 1:30-3:30/4:30 | Ms. Mia Lyn Bungay | Wallpaper by &copy;QueenBloodySky | Best Viewed in Mozilla Firefox
</footer>";
	}
}

	else {
		echo "Hmm...you must have come to this script without clicking the button. <A HREF = 'DeleteEmployee.php'>Go Back</A>";
	}
?>