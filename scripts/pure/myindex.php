<?php
session_start();
if(isset($_SESSION['IsLogedIn']))
{
	echo "Welcome ".$_SESSION['USERNAME']."<br>";
	echo "<a href='signout.php'>Signout</a>"."<br>";
	echo "<a href='page1.php'>page1</a>";

}
else
 	echo "<a href='signin.php'>Signin</a>";
?>

