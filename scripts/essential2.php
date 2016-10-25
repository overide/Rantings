<?php 
	session_start();
	include('essential.php');
	include('connectivity.php');
	function like_unlike()
	{
		global $conn;
		$conid=$_REQUEST['q'];
		$uid=$_SESSION['user_id'];
		$query="SELECT likes FROM contentstatus WHERE cid=$conid and uid=$uid";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if($row['likes'])
		{	
			//$uid=$_SESSION['user_id'];
			$show=new essential();
			$show->unlike($conid,$uid);
			$returnv['img']="../images/icons/like2.png";
			//echo "../images/icons/like2.png";
		}
		else
		{	
			$like=new essential();
			$like->like($conid,$uid);
			$returnv['img']="../images/icons/like1.png";
			//echo "../images/icons/like1.png";
		}
		$query2="SELECT likes FROM contentstatus WHERE cid=$conid AND uid=$uid";
		$result2=mysqli_query($conn,$query2);
		$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
		$query3="SELECT uid FROM contentstatus WHERE cid=$conid AND likes=1";
		$result3=mysqli_query($conn,$query3);
		$count=mysqli_num_rows($result3);				
				if($count==1)
				{
					if($row2['likes'] && $count==1)
					{
						//$wholikes="<a href='wholikes.php?conid=".$conid."'>You like this</a>";
						$returnv['wllabel']="<a href='wholikes.php?conid=".$conid."'>You like this</a>";
					}
					else
					{
						//$wholikes="<a href='wholikes.php?conid=".$conid."'>".$count." person like this</a>";
						$returnv['wllabel']="<a href='wholikes.php?conid=".$conid."'>".$count." person like this</a>";
					}
				}
				elseif($count>1)
				{
					if($row2['likes'])
					{
						$count=$count-1;
						//$wholikes="<a href='wholikes.php?conid=".$conid."'>You and ".$count." other like this</a>";
						$returnv['wllabel']="<a href='wholikes.php?conid=".$conid."'>You and ".$count." other like this</a>";
					}
					else
					{	
						
						//$wholikes="<a href='wholikes.php?conid=".$conid."'>".$count." people like this</a>";
						$returnv['wllabel']="<a href='wholikes.php?conid=".$conid."'>".$count." people like this</a>";
					}
				}
				else
					{
						//$wholikes="<a href='wholikes.php'></a>";
						$returnv['wllabel']="<a href='wholikes.php'></a>";
					}
				echo json_encode($returnv);

	}
	if(isset($_REQUEST['q']))
	{
		like_unlike();	
	}

	function dell()
	{	
		global $conn;
		$conid=$_REQUEST['p'];
		$delete=new essential();
		$delete->deletecont($conid);
	}

	if(isset($_REQUEST['p']))
	{
		dell();
	}

	function follow_unfollow()
	{
		global $conn;
		$followingid=$_REQUEST['f'];
		$fuid=$_SESSION['user_id'];
		$query="SELECT follow FROM followers WHERE uid=$followingid AND fuid=$fuid" ;
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if($row['follow']==0)
		{
			$followinst=new essential;
			$followinst->follow($followingid);
			echo "Unfollow";
		}
		else
		{
			$followinst=new essential;
			$followinst->unfollow($followingid);
			echo "Follow";
		}
		
	}
	if(isset($_REQUEST['f']))
	{
		follow_unfollow();
	}

	function comments($conid,$uid,$cmt)//function for posting comments
	{
		global $conn;
		if($cmt!="")
		{
			$cmt_p=new essential;
			$cmt_p->post_cmt($conid,$uid,$cmt);
			$query1="SELECT cmt_id,cmt FROM comments WHERE cid=$conid AND uid=$uid ORDER BY cmt_id DESC LIMIT 1";
			$result1=mysqli_query($conn,$query1);
			$row1=mysqli_fetch_array($result1,MYSQLI_BOTH);
			$query2="SELECT firstname,lastname FROM userdata WHERE uid=$uid";
			$result2=mysqli_query($conn,$query2);
			$row2=mysqli_fetch_array($result2,MYSQLI_BOTH);
			echo "<tr id='cmt".$row1['cmt_id']."' align='left'>
				<td colspan=2><div class='comments' style='text-align:left;'>
				<div id='auth_name".$row1['cmt_id']."'><a style='color:black;' href='profilepage.php?id=".$uid."'><b>".$row2['firstname']." ".$row2['lastname']."</b></a></div>
				<div  style='color:black;' id='cmts".$row1['cmt_id']."'>".$row1['cmt']."</div>
				<button class='editcmtb' type='submit' style='color:blue;font-size:12px;border:none;padding:0px;background-color:transparent;' id='edit_cmt".$row1['cmt_id']."' value='".$row1['cmt_id']."'>Edit</button><button class='delcmtb' type='submit' style='color:blue;font-size:12px;border:none;padding:0px;background-color:transparent;' id='del_cmt".$row1['cmt_id']."' value='".$row1['cmt_id']."'>Delete</button>
				</div></td>
				<tr>";
		}
		else
		{
			echo "Blank comments are not allowed!";
		}
	}
	function comments_edit($cmtid,$uid,$cmt)
	{
		global $conn;
		if($cmt!="")
		{
			$cmt_p=new essential;
			$cmt_p->edit_cmt($cmtid,$uid,$cmt);
			$query1="SELECT cmt FROM comments WHERE cmt_id=$cmtid";
			$result1=mysqli_query($conn,$query1);
			$row1=mysqli_fetch_array($result1,MYSQLI_BOTH);
			$query2="SELECT firstname,lastname FROM userdata WHERE uid=$uid";
			$result2=mysqli_query($conn,$query2);
			$row2=mysqli_fetch_array($result2,MYSQLI_BOTH);
			/*echo "<tr id='cmt'".$row1['cmt_id']."' align='left'>
				<td colspan=2><div class='comments' style='text-align:left;'>
				<div id='auth_name".$row1['cmt_id']."'><a style='color:black;' href='profilepage.php?id=".$uid."'><b>".$row2['firstname']." ".$row2['lastname']."</b></a></div>
				<div  style='color:black;' id='cmts".$row1['cmt_id']."'>".$row1['cmt']."</div>
				<button class='editcmtb' type='submit' style='color:blue;font-size:12px;border:none;padding:0px;background-color:transparent;' id='edit_cmt".$row1['cmt_id']."' value='".$row1['cmt_id']."'>Edit</button>
				</div></td>
				<tr>";*/
			echo $row1['cmt'];
		}
		else
		{
			echo "Blank comments are not allowed!";
		}

	}
	if(isset($_REQUEST['cmt']))
	{
		if($_REQUEST['status']=="i")
		{
			$conid=$_REQUEST['conid'];
			$uid=$_SESSION['user_id'];
			$cmt=$_REQUEST['cmt'];
			comments($conid,$uid,$cmt);
		}
		else
		{
			$cmtid=$_REQUEST['cmtid'];
			$uid=$_SESSION['user_id'];
			$cmt=$_REQUEST['cmt'];
			comments_edit($cmtid,$uid,$cmt);
		}
		
		
	}
	function dellcmt($cmtid)
	{
		$delcmt=new essential;
		$delcmt->dell_cmt($cmtid);
	}
	if(isset($_REQUEST['delcmtid']))
	{
		$cmtid=$_REQUEST['delcmtid'];
		dellcmt($cmtid);
	}

?>
