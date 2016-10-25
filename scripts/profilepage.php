
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
			</head>
			<body>
				<div id="contentdiv">
					<div id="content">
						<?php
						if($userid!=$_SESSION['user_id'])
						{
							$fuid=$_SESSION['user_id'];
							$query1="SELECT follow FROM followers where uid=$userid and fuid=$fuid "; 
							$result1=mysqli_query($conn,$query1);
							$row1=mysqli_fetch_array($result1);
							if($row1['follow']==1)
								$label="Unfollow";
							else
								$label="Follow";
							echo "This is user: ".$userid;
							echo "<button type='submit' name='followbtn' id='follow".$userid."' value='".$userid."' onclick='followppl(this.value)'>".$label."</button>";
							
							$myentries=new essential;
							$myentries->showallv1($userid,$fuid);
						}
						else
						{
							$userid=$_SESSION['user_id'];
							$entries=new essential;
							$entries->showall($userid);
						}
							
						?>
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