<!DOCTYPE HTML>
<head>
<title></title>
	<link href="loginmodule.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php

  function do_menu(){
    print
    "
      <center>This is a password protected area only accessible to members.</center>
      <br>


      <a href=\"member-index.php\"><img src=\"Home.png\"></img></a> &nbsp; <a href=\"logout.php\"><img src=\"Logout.png\"></img></a> &nbsp; 
      <a href=\"limits2.php\"><img src=\"Display.png\"></img></a> &nbsp; <a href=\"AddEmployee.php\"><img src=\"Add.png\"></img></a> &nbsp;
      <a href=\"UpdateEmployee.php\"><img src=\"Edit.png\"></img></a> &nbsp; <a href=\"DeleteEmployee.php\"><img src=\"Delete.png\"></img></a>
      <a href=\"mysqlinfo.php\"><img src=\"Info.png\"></img></a>
     <HR>

    ";
}

?>


</body>
</html>