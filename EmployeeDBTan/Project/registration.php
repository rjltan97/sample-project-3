<?php
$Errors=False;
$Registered=False;
$ShowNagMessage=False;
$RegistrationName="";
$RegistrationEmail="";

if ((isset($_COOKIE['RegisteredName'])) && (isset($_COOKIE['RegisteredEmail']))) 
{
	$Registered=True;
	$RegistrationName=$_COOKIE['RegisteredName'];
	$RegistrationEmail=$_COOKIE['RegisteredEmail'];

	
	//Reset expiration date for a year from now
	setcookie("RegisteredName", $RegistrationName, time() + (60));
	setcookie("RegisteredEmail", $RegistrationEmail, time() + (60));
}
else
{
	if(isset($_COOKIE['NagCounter']))
		$NagCounterValue=$_COOKIE['NagCounter']+1;
	else
		$NagCounterValue=1;
	if($NagCounterValue>4)
	{
		$ShowNagMessage=True;
		$NagCounterValue=0;
	}
	if(isset($_POST['Submit']))
	{
		if(strlen(trim($_POST['name']))>0)
			$RegistrationName=stripslashes(trim($_POST['name']));
		else
		{
			$Body .= "<p>Your name is a required field</p>";
			$Errors=True;
		}
		if(strlen(trim($_POST['email']))>0)
		{
			$RegistrationEmail=stripslashes(trim($_POST['email']));
		
		if (preg_match("/^[\w-]+(\.[\w-]+)*@"."[\w-]+(\.[\w-]+)*(\.[a-zA-Z]{2,})$/i", $RegistrationEmail == 0)) 
		{
			$Body .= "<p>The email address you entered is not valid</p>\n";
			$Errors=TRUE;
			$RegistrationEmail="";
		}
	    }
		else
		{
			$Body .= "<p>Your email address is a required field</p>\n";
			$Errors = TRUE;
		}

		if($Errors==False)//Valid Registartion
		{
			$Registered=True;
			setcookie("NagCounter","",time()-3600);
			setcookie("RegisteredName", $RegistrationName, time()+(60));
			setcookie("RegisteredEmail", $RegistrationEmail, time()+(60));
		}
	}
}
if (!$Registered) 
{
	setcookie("NagCounter", $NagCounterValue, time()+(60));
}
?>

<?php
if($Registered)
{
	echo 
	"
	<h2>Welcome $RegistrationName have a nice day!</h2>
    
	<h2>Your Registration Details<br>Name: $RegistrationName<br>
	Email: $RegistrationEmail</h2>
	<p>This account will expire in 60 seconds</p>
	";
}
else
{
	if($ShowNagMessage)
	{
		echo 
		"
		<link href=\"loginmodule.css\" rel=\"stylesheet\" type=\"text/css\">
		<section>
		<div class=\"register\">
		<p>Please remember to register!</p>
		<h3>Registration</h3>
		<form id=\"regForm\" name=\"regForm\" method=\"post\">
		<table width=\"300\" border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\">
		<tr>
		<td width=\"112\"><b>Name:</b></td>
		<td width=\"188\"><input name=\"name\" type=\"text\" class=\"textfield\"/></td>
		</tr>
		<tr>
		<td><b>Email:</b></td>
		<td><input name=\"email\" type=\"text\" class=\"textfield\"/></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		<td><input type=\"submit\" name=\"Submit\" value=\"Register\"/></td>
		</tr>
		</table>
		</form>
		</div>
		</section>";
	}
}
?>