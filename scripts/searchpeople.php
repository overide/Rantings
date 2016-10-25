<?php
	session_start();
	include("connectivity.php");
	include("essential.php");
	if(isset($_SESSION['IsLogedIn']))
	{
		if(isset($_POST['searchf']))
		{
			$selement=$_POST['searchf'];
			$inst=new essential();
			$inst->searchpeople($selement);
		}
		
	}
	else
	{
		header("../index.php");
	}
?>