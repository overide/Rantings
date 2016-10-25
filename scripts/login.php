
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
							header("Location:index.php");//redirection to new page
							
						}
					}
					else
					{
						$em1="Invalid Username or Password";
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
			$em2="Please enter valid username and password!";
	}
}
if(!isset($_SESSION['IsLogedIn']))
{
	echo "";
}
else
{
	header("location:index.php");
}

?>
<HTML>
<head>
<title>Login</title>
<style>
*{
	box-sizing:border-box;
}
.fields
{
	padding:6px 12px ;
	width:260px;
	height:34px;
	font-size:14px;
	border-radius: 4px;
	transition:box-shadow;
}
.fields:focus
{
	box-shadow:0.1px 0.1px 2px red,0.1px 0.1px 2px red;
	z-index:2;
}
#signin
{
	padding:10px;
	width:260px;
}

</style>
</head>
<body>
	<div class="container">
		<h2 class="form-signin-heading">Please sign in</h2>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		
	        <input  class="fields"  name="username"  type="text" placeholder="Username" required autofocus>
	        <br>
	        <input  class="fields" name="password"  type="password" placeholder="Password" required>
	        <div >
	          <label>
	            <input type="checkbox" value="remember-me"> Remember me
	          </label>  
	      	</div>
	        <button  id="signin" name="submit" type="submit">Sign in</button>
			<span style="color:red;font-size:13px;"><?php echo $em1.$em2; ?></span>
		</form>
</body>
</HTML>

