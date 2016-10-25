<?php
include("connectivity.php");
?>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="../css/header.css"/>
		<script src="../jquery/jquery-2.1.4.min.js"></script>
		<script src="../js/popup.js"></script>
</head>
<body>
	<div id="header">
		<!--<img id="logo" src="../images/love.png" width="70" height="55">-->
		<div id="searchbox">
			<form method="POST" action="searchpeople.php" name="search">
				<input id="searchfield" type="text" name="searchf" placeholder="Search">
				<input id="searchb" type="image" src="../images/icons/search.png" width=30 height=30 name="searchb">
			</form>
		</div>
		<div id="linksignout" ><a id="headerSO" href="signout.php">Signout</a></div>
	</div>

		
	<div id="navigation">
		<?php 
		$uidf=$_SESSION['user_id'];
		$querydp="SELECT profilepic FROM userdata WHERE uid=$uidf";
		$resultdp=mysqli_query($conn,$querydp);
		$rowdp=mysqli_fetch_array($resultdp,MYSQLI_BOTH);
		$dpname=$rowdp['profilepic'];
		echo "<a href='profilepage.php?id=".$_SESSION['user_id']."'><img id='ppic' src='../uploads/user".$_SESSION['user_id']."/photos/profilepic/".$dpname."' alt='profile_pic'></a>"
		;?><br><br>
		<ul id="navjump">
			<li><div><?php echo "<a href='feedpage.php'><img id='home' src='../images/icons/home2.png' width=40 height=40 title='home'/></a>";?></div></li><br>
			<li><div><?php echo "<a href='profilepage.php?id=".$_SESSION['user_id']."'><img id='profile' src='../images/icons/profile2.png' width=40 height=40 title='profile'/></a>";?></div></li><br>
			<li><div><?php echo "<a href='updateprofile.php'><img id='editprofile' src='../images/icons/editprofile2.png' width=40 height=40 title='Edit Profile'/></a>";?></div></li><br>
			<li><div><?php echo "<a href='texteditor.php'><img id='write' src='../images/icons/write2.png' width=40 height=40 title='write'/></a>";?></div></li><br>
			<li><div><?php echo "<a href='mydiary.php'><img id='diary' src='../images/icons/diary2.png' width=40 height=50 title='MyDiary'/></a>";?></div></li><br>
		</ul>

	</div>

</body>
</html>