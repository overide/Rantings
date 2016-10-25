<?php
	session_start();
	include('connectivity.php');
	include('style.php');
	if($_SESSION['IsLogedIn'])
	{
		$uploadOK=0;
		$msg1=$msg2="";
		if(isset($_POST['upload']))
		{
			$targetdir="../uploads/user".$_SESSION['user_id']."/photos/profilepic/";
			$targetfile=$targetdir.basename($_FILES['mypic']['name']);
			$targetfiletype=pathinfo($targetfile,PATHINFO_EXTENSION);
			$check=getimagesize($_FILES['mypic']['tmp_name']);
			if($check!=0)
			{
				$uploadOK=1;
			}
			else
			{
				$msg1="Invalid File,not an image file!";
				$uploadOK=0;
			}
			if(file_exists($targetfile))
			{
				$msg1="File already exist!";
				$uploadOK=0;
			}
			if($_FILES['mypic']['size']>5120000)
			{
				$msg1="File size exceeded!";
				$uploadOK=0;
			}
			if($targetfiletype!="jpeg" && $targetfiletype!="jpg" && $targetfiletype!="png")
			{
				$msg1="Unsupported file type!";
				$uploadOK=0;
			}
			if($uploadOK==0)
			{
				$msg2="File upload failed!";
			}
			else
			{
				$newfilename=round(microtime(true)).".".$targetfiletype;
				if(move_uploaded_file($_FILES['mypic']['tmp_name'], $targetdir.$newfilename))
				{	
					$uid=$_SESSION['user_id'];
					$query1="UPDATE userdata SET profilepic='$newfilename' WHERE uid=$uid";
					mysqli_query($conn,$query1);
					$msg2= "Profile picture uploaded!";
				}
				else 
				{
					echo "The file was not uploaded due to certain error.";
				}
			}
		}
	}
	else
	{
		header("location:../index.php");
	}
?>

	<html>
	<head>
		<title>Update Profile</title>
	</head>
	<body>
		<div id="contentdiv">
			<div id="content">
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
					 Select profile picture to upload:
			    	<input type="file" name="mypic" id="myfile">
			   	 	<input type='submit' value='Upload' name='upload'>
			   	 	<?php echo $msg1."<br>".$msg2; ?>
				</form>
			</div>
		</div>

	</body>
	</html> 