<?php
	session_start();
	require("do_html_header.php");
	require("config.php");
	require("auth.php");
	require("do_menu.php");
	require("clean.php");
	do_html_header();
	print "<body><h1>Welcome ".$_SESSION['SESS_FIRST_NAME']."</h1>";
	do_menu();
?>

<?php
	print "<h2>Display Employees</h2>";
	$SSN = clean($_GET['SSN']);
	$result = mysqli_query($conn,"SELECT * FROM employee WHERE SSN = '$SSN'");
	if(!mysqli_num_rows($result))
	{
		print"
		<p>There is no such employee with an Employee Number of $SSN.<br><br>
		<a href = 'DisplayEmployeewLink.php'>Go Back</a></p>";
		exit();
	}

		else
			$row_array = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
	<section>
	<h2>Here is the information for Employee No.<?php print "{$row_array['SSN']}"?>.</h2>
	<div class = "employee">
	<TABLE BORDER = 1 CELLPADDING = 5 CELLSPACING = 5>
	
	<TR>
		<td>Employee No.</td>
		<td><INPUT TYPE = "TEXT" NAME = "SSN" VALUE = "<?php print"{$row_array['SSN']}"?>"READONLY></td>
	</TR>
	<TR>
		<td>Last Name</td>
		<td><INPUT TYPE = "TEXT" NAME = "LNAME" VALUE ="<?php print"{$row_array['LNAME']}"?>"READONLY></td>
	</TR>
	<TR>
		<td>First Name</td>
		<td><INPUT TYPE = "TEXT" NAME = "FNAME" VALUE ="<?php print"{$row_array['FNAME']}"?>"READONLY></td>
	</TR>
	<TR>
		<td>Birthday</td>
		<td><INPUT TYPE = "TEXT" NAME = "BDATE" VALUE ="<?php print"{$row_array['BDATE']}"?>"READONLY></td>
	</tr>
	<tr>
		<td>Salary</td>
		<td><INPUT TYPE = "TEXT" NAME = "SALARY" VALUE ="<?php print"{$row_array['SALARY']}"?>"READONLY></td>
	</tr>
	</div>
	</table>
	</section>
	<p><br>Go to the <a href = "DisplayEmployeewLink.php">complete list</a> of employees.</p>
	</center>
	
<?php
	$result2 = mysqli_query($conn,"SELECT SSN FROM employee ORDER BY LNAME, FNAME");
	$i = 0;
	$SSNpage[$i] = 1;
	$test = 0;
	while ($row=mysqli_fetch_array($result2, MYSQLI_ASSOC))
	{
		$i = $i + 1;
		$SSNpage[$i] = ceil($i/5);
		if ("{$row['SSN']}"=="$SSN")
		{
			$savepageno=$SSNpage[$i];
		}
	}

?>

	<center>
	<p id="member_index_p">Go to the <a href = "limits2.php? page=<?php print "$savepageno"?>">short list</a> where this employee belongs.</p>
	</center>
	</div>
<br><br><footer>
Robin Joshua L. Tan | 3ITSE01 | T/F 1:30-3:30/4:30 | Ms. Mia Lyn Bungay | Wallpaper by &copy;QueenBloodySky | Best Viewed in Mozilla Firefox
</footer>
</body>

</html>