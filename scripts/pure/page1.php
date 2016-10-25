<?php
session_start();
if(!isset($_SESSION['IsLogedIn']))
{
	echo"Please login to access this page!";
}
else
{
	echo "hello ".$_SESSION['USERNAME']."!:)";
}
?>
