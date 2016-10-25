<?php
	//This Code is written and documented by Atul Kumar,and cannnot be used for commercial or any other purpose without permission.
	class essential
	{
		public function insertcont($data,$title,$privacy)//Insert content into db
		{
			$uid=$_SESSION['user_id'];
			global $conn;
			//mysql_real_escape_string($uid);
			$query1="INSERT INTO content(diaryentry,title,privacy,uid) Values('$data','$title','$privacy','$uid')";
			mysqli_query($conn,$query1);
		}//End of function

		public function deletecont($conid)//Method to delete entries
		{	
			global $conn;

			//mysql_real_escape_string($conid);
			$query1="DELETE FROM contentstatus WHERE cid=$conid";
			$query2="DELETE FROM comments WHERE cid=$conid";
			$query3="DELETE FROM content  WHERE contentid=$conid";
			mysqli_query($conn,$query1);
			mysqli_query($conn,$query2);
			mysqli_query($conn,$query3);
		}//End of function

		public function showcont($conid)//Display entries by content id
		{	
			global $conn;
			//mysql_real_escape_string($conid);
			$query1="SELECT diaryentry FROM content WHERE  contentid=$conid";
			$result1=mysqli_query($conn,$query1);
			$row1=mysqli_fetch_array($result1,MYSQLI_BOTH);
			echo $row1[0];

		}//End of function

		public function showall($uid)//Show all entries by loggedin user
		{		
			global $conn;
			//mysql_real_escape_string($uid);
			$firstname=$_SESSION['userfirstname'];
			$lastname=$_SESSION['userlastname'];
			$query1="SELECT diaryentry,contentid,title,uid FROM content WHERE uid=$uid";
			$result1=mysqli_query($conn,$query1);
			$row1=mysqli_fetch_all($result1,MYSQLI_ASSOC);
			foreach($row1 as $column => $values)
			{
				$conid=$values['contentid'];//fetching contentid for each content
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
						$img="like1.png";
						$wholikes="<a href='wholikes.php?conid=".$conid."'>You like this</a>";
					}
					else
					{
						$img="like2.png";
						$wholikes="<a href='wholikes.php?conid=".$conid."'>".$count." person like this</a>";
					}
				}
				elseif($count>1)
				{
					if($row2['likes'])
					{
						$img="like1.png";
						$count=$count-1;
						$wholikes="<a href='wholikes.php?conid=".$conid."'>You and ".$count." other like this</a>";
					}
					else
					{	
						
						$img="like2.png";
						$wholikes="<a href='wholikes.php?conid=".$conid."'>".$count." people like this</a>";
					}
				}
				else
					{
						$img="like2.png";
						$wholikes="<a href='wholikes.php'></a>";
					}
					
				echo "<br>
					<table align='center' id='table".$conid."'>
						<tr>
						<td class='high' align='center' colspan=3><a href='profilepage.php?id=".$uid."'>".$firstname." ".$lastname."</a></td>
						</tr>
						<tr>
						<td align='center' colspan=3>".$values['title']."</td>
						</tr>
						<tr align='center'>
							<td colspan=3>".$values['diaryentry']."</td>
						</tr>
						<tr class='likes' align='center'>
							<td class='high' ><input class='likeb' type='image' src='../images/icons/".$img."' name='like' id='like".$conid."' value='".$conid."'><br><span id='l".$conid."'>".$wholikes."</span></td>
							<td class='high'><button type='submit' class='showcmtb' value='".$conid."' id='showcmt".$conid."'>comments</button></td>
							<td class='high'>"; ?>
							<?php if($uid==$values['uid']){echo "<input type='image'  class='dellb' src='../images/icons/delete.png' width=43 height=34 title='delete' name='delete' id='delete".$conid."' value='".$conid."'>";} ?>
							<?php echo"</td>
						</tr>
						<tr id='cmt_section".$conid."' style='display:none'>
						<td colspan=3 style='width:100%;'>
							<table class='tablecmt' align='center' style='box-shadow:none;width:100%;'>
							<tr align='left' id='commentbox".$conid."'>
								<td><div>
									<textarea name='cmt_txtarea".$conid."'style='width:100%;' id='cmt_box".$conid."' rows=2 cols=50></textarea>
								</div></td>
								<td><button type='submit' class='commentb' name='cmt_post".$conid."' id='cmt_post".$conid."' value='".$conid."'>Comment</button></td>
							</tr>";
							$query4="SELECT cmt_id,cmt,uid FROM comments WHERE cid=$conid ORDER BY cmt_id DESC" ;
							$result4=mysqli_query($conn,$query4);
							$row4=mysqli_fetch_all($result4,MYSQLI_BOTH);
							foreach($row4 as $key => $val)
							{
								$cmt_id=$val['cmt_id'];
								$auth_id=$val['uid'];
								$query5="SELECT firstname,lastname FROM userdata WHERE uid=$auth_id";
								$result5=mysqli_query($conn,$query5);
								$row5=mysqli_fetch_array($result5,MYSQLI_BOTH);
								$a_firstname=$row5['firstname'];
								$a_lastname=$row5['lastname'];
								echo "<tr id='cmt".$cmt_id."' align='left'>
										<td colspan=2><div class='comments' style='text-align:left;'>
											<div id='auth_name".$cmt_id."'><a style='color:black;' href='profilepage.php?id=".$auth_id."'><b>".$a_firstname." ".$a_lastname."</b></a></div>
											<div style='color:black;' id='cmts".$cmt_id."'>".$val['cmt']."</div>
											";if($auth_id==$uid){echo "<button class='editcmtb' type='submit' style='color:blue;font-size:12px;border:none;padding:0px;background-color:transparent;' id='edit_cmt".$cmt_id."' value='".$cmt_id."'>Edit</button><button class='delcmtb' type='submit' style='color:blue;font-size:12px;border:none;padding:0px;background-color:transparent;' id='del_cmt".$cmt_id."' value='".$cmt_id."'>Delete</button>";}
										echo "</div></td>
									</tr>";
							}
						echo "</table></td></tr></table> <br>";
			}//A dynamicially generated id "like" to every button followed by contentid eg. "like1".
		}//End of the function


		public function showallv1($uid,$fuid)//Show all public entries of searched user. $fuid is the id of currently logged in user 
		{		
			global $conn;
			//mysql_real_escape_string($uid);
			$query="SELECT firstname,lastname FROM userdata WHERE uid=$uid";
			$result=mysqli_query($conn,$query);
			$row=mysqli_fetch_array($result,MYSQLI_BOTH);
			$firstname=$row['firstname'];
			$lastname=$row['lastname'];
			$query1="SELECT diaryentry,contentid,title,uid FROM content WHERE uid=$uid AND privacy=0";
			$result1=mysqli_query($conn,$query1);
			$row1=mysqli_fetch_all($result1,MYSQLI_ASSOC);
			foreach($row1 as $column => $values)
			{
				$conid=$values['contentid'];
				$query2="SELECT likes FROM contentstatus WHERE cid=$conid AND uid=$fuid";
				$result2=mysqli_query($conn,$query2);
				$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);//fetching contentid for each content.
			
				$query3="SELECT uid FROM contentstatus WHERE cid=$conid AND likes=1";
				$result3=mysqli_query($conn,$query3);
				$count=mysqli_num_rows($result3);
				
				if($count==1)
				{
					if($row2['likes'] && $count==1)
					{
						$img="like1.png";
						$wholikes="<a href='wholikes.php?conid=".$conid."'>You like this</a>";
					}
					else
					{
						$img="like2.png";
						$wholikes="<a href='wholikes.php?conid=".$conid."'>".$count." person like this</a>";
					}
				}
				elseif($count>1)
				{
					if($row2['likes'])
					{
						$img="like1.png";
						$count=$count-1;
						$wholikes="<a href='wholikes.php?conid=".$conid."'>You and ".$count." other like this</a>";
					}
					else
					{	
						
						$img="like2.png";
						$wholikes="<a href='wholikes.php?conid=".$conid."'>".$count." people like this</a>";
					}
				}
				else
					{
						$img="like2.png";
						$wholikes="<a href='wholikes.php'></a>";
					}

				echo "<br>
					<table align='center' id='table".$conid."'>
						<tr>
						<td class='high' align='center' colspan=3><a href='profilepage.php?id=".$uid."'>".$firstname." ".$lastname."</a></td>
						</tr>
						<tr>
						<td align='center' colspan=3>".$values['title']."</td>
						</tr>
						<tr align='center'>
							<td colspan=3>".$values['diaryentry']."</td>
						</tr>
						<tr class='likes' align='center'>
							<td class='high' ><input class='likeb' type='image' src='../images/icons/".$img."' name='like' id='like".$conid."' value='".$conid."'><br><span id='l".$conid."'>".$wholikes."</span></td>
							<td class='high'><button type='submit' class='showcmtb' value='".$conid."' id='showcmt".$conid."'>comments</button></td>
							
						<tr>
						<tr id='cmt_section".$conid."' style='display:none'>
							<td colspan=3 style='width:100%;'>
								<table class='tablecmt' align='center' style='box-shadow:none;width:100%;'>
									<tr align='left' id='commentbox".$conid."'>
										<td><div>
											<textarea name='cmt_txtarea".$conid."'style='width:100%;' id='cmt_box".$conid."' rows=2 cols=50></textarea>
										</div></td>
										<td><button type='submit' class='commentb' name='cmt_post".$conid."' id='cmt_post".$conid."' value='".$conid."'>Comment</button></td>
									<tr>";
									$query4="SELECT cmt_id,cmt,uid FROM comments WHERE cid=$conid ORDER BY cmt_id DESC" ;
									$result4=mysqli_query($conn,$query4);
									$row4=mysqli_fetch_all($result4,MYSQLI_BOTH);
									foreach($row4 as $key => $val)
									{
										$cmt_id=$val['cmt_id'];
										$auth_id=$val['uid'];
										$query5="SELECT firstname,lastname FROM userdata WHERE uid=$auth_id";
										$result5=mysqli_query($conn,$query5);
										$row5=mysqli_fetch_array($result5,MYSQLI_BOTH);
										$a_firstname=$row5['firstname'];
										$a_lastname=$row5['lastname'];
										echo "<tr id='cmt".$cmt_id."' align='left'>
										<td colspan=2><div class='comments' style='text-align:left;'>
											<div id='auth_name".$cmt_id."'><a style='color:black;' href='profilepage.php?id=".$auth_id."'><b>".$a_firstname." ".$a_lastname."</b></a></div>
											<div style='color:black;' id='cmts".$cmt_id."'>".$val['cmt']."</div>
											";if($auth_id==$fuid){echo "<button class='editcmtb' type='submit' style='color:blue;font-size:12px;border:none;padding:0px;background-color:transparent;' id='edit_cmt".$cmt_id."' value='".$cmt_id."'>Edit</button>";}
										echo "</div></td>
									</tr>";
									}
					echo "</table></td></tr></table> <br>";
			}//A dynamicially generated id "like" to every button followed by contentid eg. "like1".
			 
		}//End of function

		public function showallv2($uid)//shows entries of logged in user and followed users
		{
			global $conn;
			$query1="SELECT uid FROM followers WHERE fuid=$uid";//here fuid stands for following user id,the one who is following others.
			$result1=mysqli_query($conn,$query1);
			$row1=mysqli_fetch_all($result1,MYSQLI_BOTH);
			foreach($row1 as $fuid)
			{
				$thisfuid=$fuid['uid'];
				$query2="SELECT firstname,lastname FROM userdata WHERE uid=$thisfuid";
				$result2=mysqli_query($conn,$query2);
				$row2=mysqli_fetch_array($result2,MYSQLI_BOTH);
				$firstname=$row2['firstname'];
				$lastname=$row2['lastname'];
				$query3="SELECT diaryentry,contentid,title,uid FROM content WHERE uid=$thisfuid AND privacy=0";
				$result3=mysqli_query($conn,$query3);
				$row3=mysqli_fetch_all($result3,MYSQLI_ASSOC);
				foreach($row3 as $column => $values)
				{
					$conid=$values['contentid'];
					$query4="SELECT likes FROM contentstatus WHERE cid=$conid AND uid=$uid";
					$result4=mysqli_query($conn,$query4);
					$row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);//fetching contentid for each content.
					$query3="SELECT uid FROM contentstatus WHERE cid=$conid AND likes=1";
					$result3=mysqli_query($conn,$query3);
					$count=mysqli_num_rows($result3);
					if($count==1)
					{
						if($row4['likes'] && $count==1)
						{
							$img="like1.png";
							$wholikes="<a href='wholikes.php?conid=".$conid."'>You like this</a>";
						}
						else
						{
							$img="like2.png";
							$wholikes="<a href='wholikes.php?conid=".$conid."'>".$count." person like this</a>";
						}
					}
				elseif($count>1)
					{
						if($row4['likes'])
						{
							$img="like1.png";
							$count=$count-1;
							$wholikes="<a href='wholikes.php?conid=".$conid."'>You and ".$count." other like this</a>";
						}
						else
						{	
							
							$img="like2.png";
							$wholikes="<a href='wholikes.php?conid=".$conid."'>".$count." people like this</a>";
						}
					}
				else
					{
						$img="like2.png";
						$wholikes="<a href='wholikes.php'></a>";
					}
					echo "<br>
					<table align='center' id='table".$conid."'>
						<tr>
						<td class='high'align='center' colspan=3><a href='profilepage.php?id=".$thisfuid."'>".$firstname." ".$lastname."</a></td>
						</tr>
						<tr>
						<td align='center' colspan=3>".$values['title']."</td>
						</tr>
						<tr align='center'>
							<td colspan=3>".$values['diaryentry']."</td>
						</tr>
						<tr class='likes' align='center'>
							<td class='high' ><input type='image' class='likeb' src='../images/icons/".$img."' name='like' id='like".$conid."' value='".$conid."'><br><span id='l".$conid."'>".$wholikes."</span></td>
							<td class='high'><button type='submit' class='showcmtb' value='".$conid."' id='showcmt".$conid."'>comments</button></td>

							<td class='high'>"; ?>
							<?php if($uid==$values['uid']){echo "<input type='image' class='dellb' src='../images/icons/delete.png' width=43 height=34 title='delete' name='delete' id='delete".$conid."' value='".$conid."'>";} ?>
							<?php echo"</td>
						<tr>
						<tr id='cmt_section".$conid."' style='display:none'>
							<td colspan=3 style='width:100%;'>
								<table class='tablecmt' align='center' style='box-shadow:none;width:100%;'>
									<tr align='left' id='commentbox".$conid."'>
										<td><div>
											<textarea name='cmt_txtarea".$conid."'style='width:100%;' id='cmt_box".$conid."' rows=2 cols=50></textarea>
										</div></td>
										<td><button type='submit' class='commentb' name='cmt_post".$conid."' id='cmt_post".$conid."' value='".$conid."'>Comment</button></td>
									<tr>";
									$query5="SELECT cmt_id,cmt,uid FROM comments WHERE cid=$conid ORDER BY cmt_id DESC" ;
									$result5=mysqli_query($conn,$query5);
									$row5=mysqli_fetch_all($result5,MYSQLI_BOTH);
									foreach($row5 as $key => $val)
									{
										$cmt_id=$val['cmt_id'];
										$auth_id=$val['uid'];
										$query6="SELECT firstname,lastname FROM userdata WHERE uid=$auth_id";
										$result6=mysqli_query($conn,$query6);
										$row6=mysqli_fetch_array($result6,MYSQLI_BOTH);
										$a_firstname=$row6['firstname'];
										$a_lastname=$row6['lastname'];
										echo "<tr id='cmt".$cmt_id."' align='left'>
										<td colspan=2><div class='comments' style='text-align:left;'>
											<div id='auth_name".$cmt_id."'><a style='color:black;' href='profilepage.php?id=".$auth_id."'><b>".$a_firstname." ".$a_lastname."</b></a></div>
											<div style='color:black;' id='cmts".$cmt_id."'>".$val['cmt']."</div>
											";if($auth_id==$uid){echo "<button class='editcmtb' type='submit' style='color:blue;font-size:12px;border:none;padding:0px;background-color:transparent;' id='edit_cmt".$cmt_id."' value='".$cmt_id."'>Edit</button>";}
										echo "</div></td>
									</tr>";
									}
					echo "</table></td></tr></table> <br>";
				}

			}


		}//End of the function

		public function like($conid,$uid)//Method to like entries 
		{	

			global $conn;
			$query1="INSERT INTO contentstatus (cid,uid) values('$conid','$uid')";
			$query2="UPDATE contentstatus SET likes=1 WHERE cid=$conid";
			mysqli_query($conn,$query1);
			mysqli_query($conn,$query2);
			/*global $conn;
			$query1="SELECT * FROM contentstatus WHERE uid=$uid AND cid=$conid";
			$result1=mysqli_query($conn,$query1);
			if(mysqli_num_rows($result1))
			{
				$query2="UPDATE contentstatus SET likes=1 WHERE cid=$conid AND uid=$uid";
				mysqli_query($conn,$query2);
			}
			else
			{
				$query2="INSERT INTO contentstatus (cid,uid) values('$conid','$uid')";
				$query3="UPDATE contentstatus SET likes=1 WHERE cid=$conid AND uid=$uid";
				mysqli_query($conn,$query2);
				mysqli_query($conn,$query3);
			}*/
		}//End of function

		public function unlike($conid,$uid)//Method to unlike entries
		{	

			global $conn;
			$query1="DELETE FROM  contentstatus WHERE cid=$conid AND uid=$uid";
			mysqli_query($conn,$query1);
			/*global $conn;
			$query1="UPDATE contentstatus SET likes=0 WHERE cid=$conid AND uid=$uid";
			mysqli_query($conn,$query1);*/
		}//End of function

		public function post_cmt($conid,$uid,$cmt)//Method to post a comment
		{
			global $conn;
			$query1="INSERT INTO comments (cid,uid,cmt) VALUES ('$conid','$uid','$cmt')";
			mysqli_query($conn,$query1);

			/*global $conn;
			$query1="SELECT * FROM contentstatus WHERE uid=$uid AND cid=$conid";
			$result1=mysqli_query($conn,$query1);
			if(mysqli_num_rows($result1))
			{
				$query2="UPDATE contentstatus SET comments=$cmt WHERE cid=$conid AND uid=$uid";
				mysqli_query($conn,$query2);
			}
			else
			{
				$query2="INSERT INTO contentstatus (cid,uid) values('$conid','$uid')";
				$query3="UPDATE contentstatus SET comments=$cmt WHERE cid=$conid AND uid=$uid";
				mysqli_query($conn,$query2);
				mysqli_query($conn,$query3);
			}*/
		}

		public function edit_cmt($cmtid,$uid,$cmt)//Method to edit comment
		{
			global $conn;
			$query1="UPDATE comments SET cmt='$cmt' WHERE cmt_id=$cmtid";
			mysqli_query($conn,$query1);
		}

		public function dell_cmt($cmtid)//Method to delete a comment
		{
			global $conn;
			$query1="DELETE FROM comments WHERE  cmt_id=$cmtid";
			mysqli_query($conn,$query1);
		}


		public function searchpeople($selement)//search Element can only be firstname or Fullname eg. Atul Kumar
		{
			global $conn;
			$selmntlen=strlen($selement);
			$sarray=explode(" ",$selement);
			$firstname=$sarray[0];
			$flen=strlen($firstname);
			if($selmntlen>$flen)
			{
				$lastname=$sarray[1];
				$query1="SELECT uid FROM userdata WHERE firstname like'%".$firstname."%' AND lastname like'%".$lastname."%'";
			}
			else
			{
				$query1="SELECT uid FROM userdata WHERE firstname like'%".$firstname."%' OR lastname like'%".$firstname."%'";
			}

			$result1=mysqli_query($conn,$query1);
			if(mysqli_num_rows($result1))
			{
				$row1=mysqli_fetch_all($result1,MYSQLI_BOTH);
				foreach($row1 as $id)
				{
					$uid=$id['uid'];
					$query2="SELECT firstname,lastname FROM userdata WHERE uid=$uid";
					$result2=mysqli_query($conn,$query2);
					$row2=mysqli_fetch_array($result2,MYSQLI_BOTH);
					echo "<a href='profilepage.php?id=".$id['uid']."'>".$row2['firstname']." ".$row2['lastname']."</a> <br>";
				}
			}
			else
			{
				echo "Sorry no result found!";
			}
		}//End of function

		public function follow($followingid)//Method to follow people
		{
			global $conn;
			$uid=$_SESSION['user_id'];
			$query1="INSERT INTO followers (uid,fuid) VALUES ('$followingid','$uid')";
			$query2="UPDATE followers SET follow=1 WHERE fuid=$uid";
			mysqli_query($conn,$query1);
			mysqli_query($conn,$query2);

		}//End of function

		public function unfollow($followingid)//Method to unfollow people
		{
			global $conn;
			$uid=$_SESSION['user_id'];
			$query1="DELETE FROM followers WHERE uid=$followingid AND fuid=$uid";
			mysqli_query($conn,$query1);

		} 
		/*public function likecount($conid)
		{

			global $conn;
			$query1="SELECT uid FROM contentstatus WHERE cid=$conid AND likes=1";
			$result1=mysqli_query($conn,$query1);
			$count=mysqli_num_rows($result1);
			return $count;
		}*/

		public function wholikes($conid)//Show who liked a particular content
		{	
			global $conn;
			$query1="SELECT uid FROM contentstatus WHERE cid=$conid AND likes=1";
			$result1=mysqli_query($conn,$query1);
			$count=mysqli_num_rows($result1);
			$row1=mysqli_fetch_all($result1,MYSQLI_BOTH);
			foreach ($row1 as $uid)
			{
				$userid=$uid['uid'];
				$query2="SELECT firstname,lastname FROM userdata WHERE uid=$userid";
				$result2=mysqli_query($conn,$query2);
				$row2=mysqli_fetch_array($result2,MYSQLI_BOTH);
				echo "<a href='profilepage.php?id=".$userid."'>".$row2['firstname']." ".$row2['lastname']."</a> <br>";
			}

		}


	}
	
?>