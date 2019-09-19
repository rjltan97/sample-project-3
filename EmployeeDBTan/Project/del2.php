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
	print "<body><h1>Welcome ".$_SESSION['SESS_FIRST_NAME']."</h1>";
	do_menu();
?>

<?php
	print "<h2> Delete Employee </h2>";
	if(isset($_POST['SUBMIT']))
	{
		$SSN = clean($_POST['SSN']);
		$_SESSION['SSN'] = $SSN;
		$result = mysqli_query($conn,"SELECT * FROM EMPLOYEE WHERE SSN = '$SSN'");
		if(!mysqli_num_rows($result))
		{
			print "<BR><BR>There is no such employee with an Employee number of $SSN <BR><A HREF ='DeleteEmployee.php'>Go Back</A>";
			exit();
		}
		else{
			$row_array = mysqli_fetch_array($result, MYSQLI_ASSOC);
		}
	}
?>

<form action = "del3.php" method = "post" name = "deleteform">
<div class="del2">
	<Table Border = 0 Cellpadding = 5 Cellspacing = 5>
	<tr>
		<td>Employee No</td>
		<td><input type ="TEXT" name ="SSN" value ="<?php print "{$row_array['SSN']}" ?>" READONLY>
		</td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td><input type = "TEXT" name = "LNAME" value ="<?php print "{$row_array['LNAME']}"?>" READONLY>
		</td>
	</tr>
		<tr>
		<td>First Name</td>
		<td><input type = "TEXT" name = "FNAME" value ="<?php print "{$row_array['FNAME']}"?>" READONLY>
		</td>
	</tr>
		<tr>
		<td>Birthday</td>
		<td><input type = "TEXT" name = "BDATE" value ="<?php print "{$row_array['BDATE']}"?>" READONLY>
		</td>
	</tr>
		<tr>
		<td>Salary</td>
		<td><input type = "TEXT" name = "SALARY" value ="<?php print "{$row_array['SALARY']}"?>" READONLY>
		</td>
	</tr>
	</Table>
		<p><INPUT TYPE = "SUBMIT" name ="DELETE" value = "DELETE"></p>
		</form>


</div>
<br><br><footer>
Robin Joshua L. Tan | 3ITSE01 | T/F 1:30-3:30/4:30 | Ms. Mia Lyn Bungay | Wallpaper by &copy;QueenBloodySky | Best Viewed in Mozilla Firefox
</footer>
</body>
</html>