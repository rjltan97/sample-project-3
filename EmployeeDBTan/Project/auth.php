<?php
	//start session
	//session_start();

	//check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_FIRST_NAME']) || (trim($_SESSION['SESS_FIRST_NAME'])==''))
	{
		header('location : access-denied.php');
		exit();
	}
?>