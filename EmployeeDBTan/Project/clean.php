<html>
<body>

<?php

	function clean($str){
		 $conn = mysqli_connect('localhost', 'peter', 'peter', 'employeedb'); 
	$str = @trim($str);
	if(get_magic_quotes_gpc()){
		$str = stripslashes($str);
	}
		return mysqli_real_escape_string($conn, $str);
}

?>
</body>
</html>