<?php
$em1="";
$em2="";
session_start();
include 'connectivity.php';
	function LogIn()
			{
				global $conn,$em1;
				$userm=$_POST['usermail'];
				$pass=$_POST['userpass'];
			
				$query1="SELECT * FROM userdata WHERE email='".$userm."' AND password='".$pass."'" ;
				$result1=mysqli_query($conn,$query1);
				if(mysqli_num_rows($result1))
					{
					
						$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC)or die(mysqli_error($conn));
						if(!empty($row1['email']) and !empty($row1['password']))
						{
							$cmp=strcmp($row1['password'],$pass);//Casesensitive checking of password.
							if($cmp==0)
							{
								$_SESSION['userfirstname']= ucfirst($row1['firstname']);
								$_SESSION['userlastname']= ucfirst($row1['lastname']);
								$_SESSION['user_id']=$row1['uid'];
								$_SESSION['IsLogedIn']=1;
								$query2="UPDATE userdata SET status=1 WHERE uid='".$row1['uid']."'";
								if(mysqli_query($conn,$query2))
									echo "run";
								echo "<script>$('#overlay1').css('display','block');</script>";
								header("Location:scripts/feedpage.php");//redirection to member area page
							}
							else
							{
								$em1="*Invalid Username and Password";
								echo "<script>$('#overlay1').css('display','block');</script>";

							}
							
							
						}
					}
					else
					{
						$em1="*Invalid Username and Password";
						echo "<script>$('#overlay1').css('display','block');</script>";
					}
				
			}
if($_SERVER['REQUEST_METHOD']=="POST")
{
	if(isset($_POST['submit1']))
	{
		if(!empty($_POST['usermail']) and !empty($_POST['userpass']))
		{
			LogIn();
			
		}
		else
			$em2=" * Please enter valid username and password!";
			echo "<script>$('#overlay1').css('display','block');</script>";
	}
}
//if user is already loged in,then if user request for signup page he/she is redirected to mypage. 
if(!isset($_SESSION['IsLogedIn']))
{
	echo "";
}
else
{
	header("location:scripts/feedpage.php");
}

?>