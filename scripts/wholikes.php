<?php
	session_start();
	include("connectivity.php");
	include("essential.php");
	if(isset($_SESSION['IsLogedIn']))
	{
		
		$contid=$_REQUEST['conid'];
		$inst=new essential();
		$inst->wholikes($contid);

	}
	else
	{
		header("../index.php");
	}
?>
<html>
<head>
	<title>Wholikes</title>
</head>
</html>