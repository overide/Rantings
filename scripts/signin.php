
<?php
$em1="";
$em2="";
session_start();
include 'connectivity.php';
	function LogIn()
			{
				global $conn,$em1;
				$usern=$_POST['username'];
				$pass=$_POST['password'];
			
				$query1="SELECT * FROM userdata WHERE username='".$usern."' AND password='".$pass."'" ;
				$result1=mysqli_query($conn,$query1);
				if(mysqli_num_rows($result1))
					{
					
						$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC)or die(mysqli_error($conn));
						if(!empty($row1['username']) and !empty($row1['password']))
						{
							$_SESSION['USERNAME']= $row1['username'];
							$_SESSION['user_id']=$row1['id'];
							$_SESSION['IsLogedIn']=1;
							$query2="UPDATE userdata SET status=1 WHERE id='".$row1['id']."'";
							mysqli_query($conn,$query2);
							header("Location:myindex.php");//redirection to new page
							
						}
					}
					else
					{
						$em1="* Invalid Username or Password";
					}
				
			}
if($_SERVER['REQUEST_METHOD']=="POST")
{
	if(isset($_POST['submit']))
	{
		if(!empty($_POST['username']) and !empty($_POST['password']))
		{
			LogIn();
			
		}
		else
			$em2=" * Please enter valid username and password!";
	}
}
if(!isset($_SESSION['IsLogedIn']))
{
	echo "";
}
else
{
	header("location:myindex.php");
}

?>
<HTML>
<head>
<title>Login</title>
<link rel="stylesheet" href="../css/signin.css" type="text/css" >
</head>
<body>
		<div class="container">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<h2 class="form-signin-heading" align="center">Please sign in</h2>
		
	        <input  class="fields" id="uname" name="username"  type="username" placeholder="Username"  autofocus>
	        <br>
	        <input  class="fields" id="upass"name="password"  type="password" placeholder="Password" ><br>
	        <button  id="signin" name="submit" type="submit">Sign in</button><br>
	        <a class="lostpass" href="lostpass.php">Lost your password?</a>
			<p style="color:#1ABC9C;font-size:13px; text-align:center;display:block;"><?php echo $em1.$em2; ?></p>
		</form>
</div>
</body>
</HTML>

