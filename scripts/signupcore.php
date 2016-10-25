<?php
include 'connectivity.php';
$ms1=$ms2="";
$ms3="";

function signup()
{
	global $conn,$ms1,$ms2;
    $userfn=$_POST['userfname'];
	$userln=$_POST['userlname'];
	$uemail=$_POST['useremail'];
	$upass=$_POST['userpassword'];
	$urepass=$_POST['userrepassword'];
	$query="SELECT uid FROM userdata WHERE email='".$uemail."'";
	$result=mysqli_query($conn,$query);
	if(!mysqli_num_rows($result))
	{
		$query2="INSERT INTO userdata (firstname,lastname,email,password) VALUES ('$userfn','$userln','$uemail','$upass')";
		$result2=mysqli_query($conn,$query2);
		$result3=mysqli_query($conn,$query);
		$row3=mysqli_fetch_array($result3,MYSQLI_BOTH);
		$uid=$row3['uid'];
		$query4="INSERT INTO followers (uid,fuid,follow) VALUES ('$uid','$uid',1)";
		$result4=mysqli_query($conn,$query4);
		if($result2)
		{
			if($result4)
			{
				mkdir("uploads/user".$uid);
				mkdir("uploads/user".$uid."/photos");
				mkdir("uploads/user".$uid."/photos/profilepic");
				$ms1="Successfully Signed Up!";
				echo "<script>$('#overlay2').css('display','block');</script>";

			}

		}
	}
	else
	{
		$ms2="User Already Exist!";
		echo "<script>$('#overlay2').css('display','block');</script>";
	}
}
if($_SERVER['REQUEST_METHOD']=="POST")
{
	if(isset($_POST['submit2']))
	{
		if(!empty($_POST['useremail'])and !empty($_POST['userpassword']))
		{
			signup();
		}
				

		else
		{
			$ms3="Please fill up the required fields!";
			echo "<script>$('#overlay2').css('display','block');</script>";
		}
		
			
	}
}
?>