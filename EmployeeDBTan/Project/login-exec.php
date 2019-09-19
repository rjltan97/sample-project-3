<html>
<head></head>
<title></title>
<body>
<?php
	//start session
	session_start();

	//include database connection details
	require_once("config.php");
	require("clean.php");
	//array to store validation errors
	$errmsg_arr = array();

	//validation error flag
	$errflag = false;

	//sanitize the POST values
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);

	//input validations
	if($login ==''){
		$errmsg_arr[]= 'Login ID missing';
		$errflag = true;
	}

	if($password ==''){
		$errmsg_arr[]= 'Password missing';
		$errflag = true;
	}

	//if there are input validations, redirect back to the login form
	if($errflag){
		$_SESSION['ERRMSG_APP'] = $errmsg_arr;
		session_write_close();
		header('location:login-form.php');
		exit();
	}
	
	//create query
	$qry="SELECT * FROM member WHERE login = '$login' AND passwd='$password'";
	$result=mysqli_query($conn,$qry);

	//check whether the query was successful or not
	if($result){
		if(mysqli_num_rows($result)==1){
		//login successful
		session_regenerate_id();
		$member = mysqli_fetch_assoc($result);
		$_SESSION['SESS_MEMBER_ID']=$member['member_id'];
		$_SESSION['SESS_FIRST_NAME']=$member['firstname'];
		$_SESSION['SESS_LAST_NAME']=$member['lastname'];
	
		//print "Login is a success!";
		session_write_close();
		header("location:member-index.php");

	exit();
		}
	else{
		
		//login failed
		header('location:login-failed.php');
		}
	}
	else{
		
		die("Query failed");
		}
		
	?>
		
</body>
</html>