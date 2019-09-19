<?php
    session_start();
    require("config.php");
    require('auth.php');
    require("do_html_header.php");
    require("do_menu.php");
    require("clean.php");
    do_html_header();
    print "<body><h1>Welcome ". $_SESSION['SESS_FIRST_NAME']."</h1>";
    do_menu();


  // how many rows to show per page
  $rowsPerPage = 5;

  // by default we show first page
  $pageNum = 1;

   print "<H2>Display Employees</H2>";

  // if $_GET['page'] defined, use it as page number
  if(isset($_GET['page'])) 
  {
    $pageNum = clean($_GET['page']);    
  }

  // counting the offset
  $offset = ($pageNum - 1) * $rowsPerPage;
  print "Page No: $pageNum";
  echo "<BR>Offset: $offset <BR>Rows Per Page: $rowsPerPage";
  $query = " SELECT SSN, LNAME, FNAME FROM EMPLOYEE ORDER BY LNAME, FNAME LIMIT $offset, $rowsPerPage";
  $result = mysqli_query($conn,$query) or die('Error, query failed');
  print "<H4>This is page $pageNum of the list of employees!</H4>";
  print "<CENTER><TABLE BORDER=1 CELLPADDING=5 CELLSPACING=5><TR BGCOLOR='yellow'><TD>SSN</TD><TD>LastName</TD><TD>FirstName</TD></TR>";
?>


<?php
while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
  {
    print"<tr>";
    print "<td><a href = \"DisplayThisEmployee.php?SSN=$row[SSN]\">$row[SSN]<a></td>";
    print "<td>{$row['LNAME']}</td>";
    print "<td>{$row['FNAME']}</td>";
    print "<tr>";
  }
  print "</TABLE></CENTER>";
  // how many rows we have in database
  $query = "SELECT COUNT(*) AS numrows FROM EMPLOYEE";
  $result = mysqli_query($conn,$query) or die('Error, query failed');
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $numrows = $row['numrows'];
  print "<HR><BR>There are a total of $numrows employee records";
  print "<BR>I am now in page #$pageNum</CENTER>";

  // how many pages we have when using paging?
  $maxPage = ceil($numrows/$rowsPerPage);

  // print the link to access each page
  echo "<br><CENTER>Go to page : ";
  for($page = 1; $page <= $maxPage; $page++) {
    echo "<a href='limits2.php?page=$page'>$page</a> ";
  }
  $page=$page-1;
?>
    <BR>Click <A HREF='DisplayEmployeewLink.php'>here</A> to view all employees.<BR></CENTER>

<?php
  include "close_db.php";
 ?>

<?php
  print
  "<br><br><footer>
Robin Joshua L. Tan | 3ITSE01 | T/F 1:30-3:30/4:30 | Ms. Mia Lyn Bungay | Wallpaper by &copy;QueenBloodySky | Best Viewed in Mozilla Firefox
</footer>";
?>

