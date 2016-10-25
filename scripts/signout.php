<?php
	include 'connectivity.php';
	session_start();
	$query3="UPDATE userdata SET status=0 WHERE uid='".$_SESSION['user_id']."'";
	mysqli_query($conn,$query3);
	session_destroy();
	header("location:../index.php");
?>