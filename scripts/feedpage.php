<?php
	session_start();
	include("style.php");
	include("essential.php");
	include("Connectivity.php");
			
			if(isset($_SESSION['IsLogedIn']))
			{
?>

				<html>
				<head>
					<title>Home</title>
					<style>
						#contentdiv
						{
							background-color:white;
							margin-left:82px;
							width:100%;

							max-width:1253px;

							margin-top:31px;
							position:absolute;
						}
						#content
						{
							max-width:1253px;
							width:100%;
							height:100%;
						}
					</style>
					<script src="../js/essential.js"></script>
				</head>
				<body>
					<div id="contentdiv">
						<div id="content">
							<?php
								$uid=$_SESSION['user_id'];
								$show=new essential();
								$show->showallv2($uid);
							?>
							
						</div>
					</div>
				</body>
				</html>

<?php
	}
	else
 	header("location:../index.php");
?>