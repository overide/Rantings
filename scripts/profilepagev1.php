
<?php
	session_start();
	include('connectivity.php');
	include('essential.php');
	include('style.php');
	if(isset($_SESSION['IsLogedIn']))
	{
		if(isset($_REQUEST['id']))
		{
			$userid=$_REQUEST['id'];
		
	?>
			<html>
			<head>
				<title>Profile</title>
				<script type="text/javascript" src='../js/essential.js'></script>
				<link type="text/css" rel="stylesheet" href='../css/profile.css'>
			</head>
			<body>
				<div id="contentdiv">
					<div id="content">
						<div id="base">
							<div id="cover">
								<div id="dp"><img scr="" alt="Atul" width="100px" height="100px"></div>
							</div>
						</div>
					</div>
				</div>
			</body>
			</html>

	<?php

		}
	}
	else
	{
		header("Location:../index.php");
	}
	?>