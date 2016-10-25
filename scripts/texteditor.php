<?php
session_start();
include ("style.php");
include("essential.php");
include("Connectivity.php");
if(!isset($_SESSION['IsLogedIn']))
{
	header("location:../index.php");
}
else
{
?>
	<html>
				<head>
					<title>Write</title>
				</head>
				<body>
					<div id="contentdiv">
						<div id="content">
							<br>
							<form method="POST" method="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
								<table align='center' style="background-color:#333;">
									<tr>
										<td colspan=2><input style="width:100%;height:100%;text-align:center;font-size:20px" type="text" name="title" placeholder="Title"></td>
									</tr>
									<tr>
										<td style="color:white">Public:<input type="radio" name="privacy" value="0"></td>
										<td style="color:white">Private:<input type="radio" name="privacy" value="1"></td>
									</tr>
									<tr>
										<td colspan=2><textarea name="content" style="width:100%" rows=20 cols=50></textarea></td>
									</tr>
									<tr>
										<td colspan=2 align="center"><input type="submit"  value="Post"name="done"></td>
									</tr>
								</table>
							<form>
						</div>
					</div>
				<body>
				</html>
<?php
if(isset($_POST['done']))
{
	$mydata="<pre>".$_POST['content']."</pre>";
	$title="<h3>".$_POST['title']."</h3>";
	$privacy=$_POST['privacy'];
	$inst=new essential();
	$inst->insertcont($mydata,$title,$privacy);	

}
}
?>
