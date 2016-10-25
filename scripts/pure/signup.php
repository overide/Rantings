<?php
include 'connectivity.php';
$ms=$ms2="";
$ms3="";

function signup()
{
	global $conn,$ms,$ms2;
	$usern=$_POST['username'];
	$pass=$_POST['password'];
	$query="SELECT username,password FROM userdata WHERE username='$usern' AND password='$pass'";
	$result=mysqli_query($conn,$query);
	if(!mysqli_num_rows($result))
	{
		$query2="INSERT INTO userdata(username,password) VALUES ('$usern','$pass')";
		$result2=mysqli_query($conn,$query2);
		if($result2)
		{
			$ms="Successfully Signed Up!";
		}
	}
	else
	{
		$ms2="User Already Exist!";
	}
}
if($_SERVER['REQUEST_METHOD']=="POST")
{
	if(isset($_POST['submit']))
	{
		if(!empty($_POST['username'])and !empty($_POST['password']))
				signup();

		else
		
			$ms3="Enter valid username or password";
	}
}
?>
<HTML>
<head>
<title>SignUp</title>
<style>
body
{
	background-color:#0078F0;
	color:white;
}
form
{
	color:black;
	position:fixed;
	top:250px;
	left:510px;
	box-shadow:2px 3px 5px #444;
	width:300px;
	height:150px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:16px;
	text-align:center;
	padding:15px 15px 15px 15px ;
	background-color:#9BCDFF;
	border:thin;
	border-radius:2em;
}
.button
{
	border:thin;
	border-radius:5em;
}
</style>
</head>
<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<br><br>Username: <input class="button" type="text" name="username"><br><br>
Password: <input class="button"type="password" name="password"><br><br>
<input class="button" type="submit" name="submit" value="SignIn"><br><br>
<span style="color:red;font-size:13px;"><?php echo $ms.$ms2.$ms3; ?></span>
</form>
</body>
</HTML>