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
					<title>Desk</title>
                    <link rel="stylesheet" type="text/css" href="../css/desk.css" />
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
							<?php echo "<a href='signout.php'>signout</a>"; ?>
                            <?php echo "<a href='desk.php'>DESK</a>";?>
                            <br />
							<a href="text_editor/index.php"><img src="images/448.png" id="create_button"></a> <br/>
            <?php
            /*tmkc*/$query1='select title,uid from content where uid='.$_SESSION['user_id'].' order by date desc';
            $query_res=  mysqli_query($conn,$query1);
            while($r=mysqli_fetch_array($query_res))
				{
                	
                	$str="<a href='text_editor/index.php?val=".$r[1]."'>";
               	 	echo $str;
					echo "<div id='img_block'><img src='images/557.png'/ id='title_img'><br/>";
					
                    echo "$r[0].</a></div>";
            	}
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