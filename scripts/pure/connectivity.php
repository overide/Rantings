<?php
$servername="localhost";
$username="root";
$password="";
$database="adda";
//creating connection
$conn=mysqli_connect($servername,$username,$password,$database);
//check connection
if(!$conn)
{
	die("Connection Failed:".mysqli_connect_error());
}
else
{
	//echo "Connection established!.<br>";
}
?>