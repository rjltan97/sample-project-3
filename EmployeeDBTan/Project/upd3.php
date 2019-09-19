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
	print "<H2>Update Employee</H2>";
	if(isset($_POST['UPDATE'])) {
		//Array to store a validation errors
		$errmsg_arr= array();

		//Validation error flag
		$errflag = false;
		
		$SSN 	=$_SESSION['SSN'];
		$LNAME 	=clean($_POST['LNAME']);
		$FNAME 	=clean($_POST['FNAME']);
		$BDATE 	=clean($_POST['BDATE']);
		$SALARY =clean($_POST['SALARY']);
		$_SESSION["LNAME"] = $LNAME;
		$_SESSION["FNAME"] = $FNAME;
		$_SESSION["BDATE"] = $BDATE;
		$_SESSION["SALARY"] = $SALARY;

		//Input Validations
		if($LNAME == '') {
				$errmsg_arr[] = 'Last name missing';
				$errflag = true;
		}
		if($FNAME == '') {
				$errmsg_arr[] = 'First name missing';
				$errflag = true;
		}
		if($BDATE == '') {
				$errmsg_arr[] = 'Birthday missing';
				$errflag = true;
		}
		if($SALARY == '') {
				$errmsg_arr[] = 'Salary missing';
				$errflag = true;
		}

	//If there are input validations, redirect back to the UpdateEmployee form
	if($errflag){
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	    session_write_close();
	    print "You have input errors. These are:";
	    print "<BR><UL>";
	    for ($i=0; $i<sizeof($errmsg_arr); $i++) { print "<LI>$errmsg_arr[$i]";
	    }
	print "</UL>";
		print "<A HREF=\"UpdateEmployee.php\">Go back</A>";
		exit();
	}
	else {
	$result = mysqli_query($conn, "UPDATE employee SET LNAME= '$LNAME', FNAME= '$FNAME', BDATE= '$BDATE', SALARY= '$SALARY' WHERE SSN= '$SSN'");
	if(!$result)
		print "<BR>Update operation unsucessful <BR><A HREF = 'UpdateEmployee.php'>Go Back</A>";
	else {
		print ("<BR><BR>1 record updated<BR>");
		print ("Click <A HREF='limits2.php'>here</A>to view the updated list of employees.");
		print "<br><br><footer>
Robin Joshua L. Tan | 3ITSE01 | T/F 1:30-3:30/4:30 | Ms. Mia Lyn Bungay | Wallpaper by &copy;QueenBloodySky | Best Viewed in Mozilla Firefox
</footer>";
	
		}
	}
}

	else {
		echo "Hmm...you must have come to this script without clicking the button. <A HREF = 'UpdateEmployee.php'>Go Back</A>";
	}
?>