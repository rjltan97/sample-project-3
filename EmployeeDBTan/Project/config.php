<html>
<head></head>
<title></title>
<body>

<?php

 $conn = mysqli_connect('localhost', 'peter', 'peter', 'employeedb') or die("Error connecting to employeedb");
 mysqli_select_db($conn, 'employeedb') or die("Error: Cannot access $dbname database");
?>

</body>
</html>