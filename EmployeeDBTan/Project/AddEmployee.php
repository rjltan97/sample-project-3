<!DOCTYPE html>
<html>
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
	require("clean.php");
	do_html_header();
	print "<body><h1>Welcome ".$_SESSION["SESS_FIRST_NAME"]."</h1>";
	do_menu();
?>

<?php
	if(@!$_POST['SUBMIT'])
	{   
?>
	<H2>Add Employee</H2>
	<form action="<?php print $_SERVER['PHP_SELF']; ?>" method = "POST">
	<div class = "add">
	<table width ="400" border="0" cellspacing="1" cellpadding="2">
		<tr>
			<td width="100">SSN:</td>
			<td><input name="SSN" type="TEXT" id="SSN"></td>
		</tr>
		<tr>
			<td width="100">First Name:</td>
			<td><input name="FNAME" type="TEXT" id="FNAME"></td>
		</tr>
		<tr>
			<td width="100">Last Name:</td>
			<td><input name="LNAME" type="TEXT" id="LNAME"></td>
		</tr>
		<tr>
			<td width="100">Birthday: (YYYY-MM-DD)</td>
			<td><input name="BDATE" type="TEXT" id="BDATE"></td>
		</tr>
		<tr>
			<td width="100">Salary:</td>
			<td><input name="SALARY" type="TEXT" id="SALARY"></td>
		</tr>
		<tr>
			<td width="100">&nbsp;</td>
			<td><input name="SUBMIT" type="SUBMIT" id="ADD" value="ADD"></td>
		</tr>
	</table>
	</form>
    </div>
<?php
	}
	else {

		//Array to store validation errors
		$errmsg_arr = array();

		//Validation error flag
		$errflag = false;

		//Function to sanitize values received from the form.
		//Prevents SQL injection
		$SSN 	=clean($_POST['SSN']);
		$LNAME 	=clean($_POST['LNAME']);
		$FNAME 	=clean($_POST['FNAME']);
		$BDATE 	=clean($_POST['BDATE']);
		$SALARY =clean($_POST['SALARY']);
		$_SESSION["SSN"]   = $SSN;
		$_SESSION["LNAME"] = $LNAME;
		$_SESSION["FNAME"] = $FNAME;
		$_SESSION["BDATE"] = $BDATE;
		$_SESSION["SALARY"] = $SALARY;

		//Input Validations
		if($SSN == ''){
				$errmsg_arr[] = 'SSN missing';
				$errflag = true;			
		}
		if($FNAME == '') {
				$errmsg_arr[] = 'First name missing';
				$errflag = true;
		}
		if($LNAME == '') {
				$errmsg_arr[] = 'Last name missing';
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

		//If there are input validations, redirect back to the registration form
		if($errflag)
		{
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			print "You have input errors. These are:";
			print "<BR><UL>";
	    	for ($i=0; $i<sizeof($errmsg_arr); $i++) 
	    		{ 
	    			print "<LI>$errmsg_arr[$i]";
	   			}
			print "</UL>";
			print "<A HREF=\"";
			print $_SERVER['PHP_SELF'];
			print "\">Go Back</A>";
			exit();
		}
		else
		{
			echo "<BR><BR>You entered the following information:";
			echo "<BR>SSN = $SSN";
			echo "<BR>FNAME = $FNAME";
			echo "<BR>LNAME = $LNAME";
			echo "<BR>BDATE = $BDATE";
			echo "<BR>SALARY = $SALARY";
			$result = mysqli_query($conn,"SELECT * FROM employee WHERE SSN = '$SSN'");
			if(!(mysqli_num_rows($result) == 0))
			{
				print "<BR>Employee Number $SSN is already assigned to another employee<BR><A HREF=\"".$_SERVER['PHP_SELF']."\">Go Back</A>";
				@mysqli_free_result($result);
				exit();
			}
			$result = mysqli_query($conn,"INSERT INTO employee (SSN, LNAME, FNAME, BDATE, SALARY) VALUES('$SSN', '$LNAME', '$FNAME', '$BDATE', '$SALARY')");
			print ("<BR><BR>1 record added<BR>");
			print ("Click <A HREF='limits2.php'>Here</A>to view the updated list of employees.");
		}

		}
?>
<?php
  print
  "<br><br><footer>
Robin Joshua L. Tan | 3ITSE01 | T/F 1:30-3:30/4:30 | Ms. Mia Lyn Bungay | Wallpaper by &copy;QueenBloodySky | Best Viewed in Mozilla Firefox
</footer>";
?>

</BODY>
</HTML>