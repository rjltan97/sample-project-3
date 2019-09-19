<?php
	session_start();
	require("config.php");
	require('auth.php');
	require("do_html_header.php");
	require("do_menu.php");
	do_html_header();
	print "<body><h1>Welcome ".$_SESSION["SESS_FIRST_NAME"]."</h1>";
	do_menu();
?>

<?php
       print "<H2>Display Employees</H2>";
       print "<H2>This is the Complete list of all employees!</H2>";
    $query = "SELECT COUNT(*) AS numrows FROM employee";
    $result = mysqli_query($conn, $query) or die ('Error, query failed');
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $numrows = $row['numrows'];
    print "<hr><br><center>There are total of $numrows employee record</center><br>";
    
    $query="Select * FROM employee ORDER BY LNAME,FNAME";
    $result=mysqli_query($conn,$query);
    print "<CENTER><TABLE BORDER=1 CELLPADDING=5 CELLSPACING=5><TR BGCOLOR='yellow'><TD>SSN</TD><TD>Last Name</td><td>First Name</td></tr>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		print"<TR>";
		print"<TD><a href=\"DisplayThisEmployee.php?SSN=$row[SSN]\">$row[SSN]</a></td>";
		print "<TD>{$row['LNAME']}</td>";
		print "<TD>{$row['FNAME']}</td>";	
		print "</tr>";
		
	}
	
?>

</body>
</html>