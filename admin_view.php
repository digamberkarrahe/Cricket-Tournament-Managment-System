
<?php
 
include("dbcon.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE);
 
session_start();

$to_id=$_SESSION['to_id'];
$qry="SELECT * from cricket.match as m WHERE m.to_id=$to_id and  winner is null";
$run=mysqli_query($conn,$qry);
$data=mysqli_num_rows($run);


if($data==0)
{		

		$flag=0;
		$q1="select `cricket`.`match`.`winner` AS `winner`,2 * count(`cricket`.`match`.`m_id`) AS `points` from `cricket`.`match` where `cricket`.`match`.`to_id`= $to_id and`cricket`.`match`.`winner` is not null group by `cricket`.`match`.`winner` ORDER BY `points` DESC";
		$r1=mysqli_query($conn,$q1);
		$d=mysqli_fetch_array($r1);
		//$q="SELECT * FROM v1 ORDER BY points DESC";
		//$r=mysqli_query($conn,$q);
		//$d=mysqli_fetch_array($r);
		$T1_id=$d['winner'];
		$p1=$d['points'];
		$d=mysqli_fetch_array($r1);
		$T2_id=$d['winner'];
		$p2=$d['points'];
		
		if($p1==$p2)
		{ ?>
			
			

					<?php
					//redirection in another page after successful login
					 error_reporting(E_ERROR | E_WARNING | E_PARSE);
						include("dbcon.php");
						session_start();
							$GLOBALS['flag']=1;
							$aid=$_SESSION['Admin_ID'];
							$qry="SELECT * FROM `organiser` WHERE org_id=$aid";
							$run=mysqli_query($conn,$qry);
							$data=mysqli_fetch_assoc($run);
							
							//to find name of tournament which is created by this admin
							$qry1="SELECT * FROM `tournament` where org_id=$aid";
							$run1=mysqli_query($conn,$qry1);
							$data1=mysqli_fetch_assoc($run1);
							//fetching tournament venues from venue table
							$to_ID=$data1['to_id'];
							$_SESSION['to_id']=$to_ID;
							
							$qry2="SELECT  `venue` FROM `venues` WHERE to_id=$to_ID";
							$run2=mysqli_query($conn,$qry2);
							//$data2=mysqli_fetch_array($run2)
							
							//inserting information in match table from admin_create_match.php
							if(isset($_POST['submit']))
						{
							session_start();
							
							$aid=$_SESSION['Admin_ID'];
							include("dbcon.php");
							$team1=$_POST['team1'];
							$q1="SELECT `t_id` FROM `team` WHERE t_name='$team1'";
							$r1=mysqli_query($conn,$q1);
							$d1=mysqli_fetch_assoc($r1);
							$team1_id=$d1['t_id'];
							
							$team2=$_POST['team2'];
							$q2="SELECT `t_id` FROM `team` WHERE t_name='$team2'";
							$r2=mysqli_query($conn,$q2);
							$d2=mysqli_fetch_assoc($r2);
							$team2_id=$d2['t_id'];
							
							
							$mdate=$_POST['Match_Date'];
							$venue=$_POST['Venue'];
							$qry3="SELECT `to_id` FROM `tournament`,organiser WHERE tournament.org_id=organiser.org_id AND organiser.org_id=$aid ";
							$run3=mysqli_query($conn,$qry3);
							$data3=mysqli_fetch_assoc($run3);
							$to_id=$data3['to_id'];
							
							$qry4="INSERT INTO `match`(`t1_id`, `t2_id`, `date`, `venue`,  `to_id`) VALUES ($team1_id,$team2_id,'$mdate','$venue',$to_id)";
							$run4=mysqli_query($conn,$qry4);
							//for getting no of teams
							//$qry7="SELECT t_id FROM `participation` WHERE to_id=124";
							//$run7=mysqli_query($conn,$qry7);
							//$data7=mysqli_fetch_array($run7);
							header("refresh:1");
							
						}
					?>
					<html>
					<head>

					<title>Admin datails page </title>

					<link rel="stylesheet" type="text/css" href="homecss.css"> 


					<style>

					.form1
							{
								line-height: 25px;
							}
					.box
							{
								//margin-right: 700px;
								width: 600px;
								height: 380px;
							   background-image: url(i4.jpg);
							   background-size:cover;
							   background-position:bottom;
							   margin-left:350px;
								//margin-right: 0px;
							   margin-top: 40px;
							   border-radius: 15px;
							   color:#93F28C;
							   color:white;
							   border:3px solid #7073CE;
							   border-style:outset;
							   font-size:32px;
							
							   
							   
							}

					.box2
							{
								//margin-right: 1000px;
								width: 600px;
								height: 440px;
							   background-image: url(i4.jpg);
							   background-size:cover;
							   background-position:bottom;
							   margin-left:700px;
								//margin-right: 0px;
							   margin-top: -100px;
							   border-radius: 15px;
							   color:#93F28C;
							   color:white;
							   border:3px solid #7073CE;
							   border-style:outset;
							   font-size:32px;
							
							   
							   
							}


							p.c1
							{
								text-align:center;
								font-size:1.5em;
								color:red;
							}	
							
								 button
						{
							font-size: 20px;
							width: 220px;
							height: 40px;
							color: black;
							//background-color:#93F28C;
							font-family: cursive;
							border-radius: 7px;
							margin-left:20px; 
						}
						button:hover
						{
							background-color:#93F28C;
						}
						
					.leftsplit{
						
						height:100%;
						width:30%;
						position:fixed;
						z-index:1;
						top:0;
						overflow:hidden;
						margin-left:50px;
						left:0;
					}	
						
					.profile_photo{
								width: 200px;
								height: 200px;
								//position:relative;
								//padding: 0 0 0 0;
								margin-top:2px;
								margin-left:30px;
								//left:50 ;
								border-radius: 200px;
								border:2px solid white;
								
								}
						
					</style>		
					</head>
					<body>
					<div style="color:white;font-family:cursive;font-size:2em">Note:you have already created Tournament</div>



						<div class="box">
							<form class="form1">
								<p class="c1">Admin details are:</p>
								Admin ID:<b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['org_id'];?></b><p></p>
							  First Name: <b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['org_fname']; ?></b><p></p>
							 Last Name: <b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['org_lname']; ?></b><p></p>
								E-mail id:<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['email']; ?></b><p></p>
								Phone No.:<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['phone']; ?></b><p></p>
								
							   </form>    
							</div>
							<div class="box2">
							<form class="form1">
							  <p class="c1">Created Tournament Details are:</p>
								Tournament ID:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['to_id'];  ?></b><p></p>
								Created Tournament:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['to_name'];  ?></b><p></p>
							   Tournament Type:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['to_type'] ; ?></b><p></p>
							   NO. of Teams:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['no_of_teams'] ; ?></b><p></p>
								Start Date:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['to_s_date'] ; ?></b><p></p>
							End Date:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['to_e_date'] ; ?></b><p></p>
							Venues:<b style="color:#cdf54c;font-size:1.3em"><?php   
											while($row=mysqli_fetch_array($run2))
											{
												?><?php
												
												echo $row['venue'];
												echo ",  ";
											}
											?></b><p></p>
									 
							</form>    
							</div>

					<div class="leftsplit">	
					< <br><br><br><br>
							 <img src="<?php echo "image/".$data['img']; ?>" class="profile_photo" >
							 
							 <br><br>
					<a href="admin_team_list.php"><button class="c2">Participated Teams</button></a>
					<br><br>
					<a href="admin_create_match.php"><button class="c2">Create Match</button></a>
					<br><br>
					<a href="admin_matches_view.php"><button class="c2">Matches</button></a>
					<br><br>
					<a href="points_table.php"><button class="c2">Points Table</button></a>
					<br><br>
					<a href="logged_out.php"><button class="c2">LogOut</button></a>

					</div>

					</body>


					</html>
					<?php 
						session_start();
						$_SESSION['to_id']=$data1['to_id'];
						?>
			
		<?php }
		else
		{ ?>
			

					<?php
					//redirection in another page after successful login
					 error_reporting(E_ERROR | E_WARNING | E_PARSE);
						include("dbcon.php");
						session_start();
							
							$aid=$_SESSION['Admin_ID'];
							$qry="SELECT * FROM `organiser` WHERE org_id=$aid";
							$run=mysqli_query($conn,$qry);
							$data=mysqli_fetch_assoc($run);
							
							//to find name of tournament which is created by this admin
							$qry1="SELECT * FROM `tournament` where org_id=$aid";
							$run1=mysqli_query($conn,$qry1);
							$data1=mysqli_fetch_assoc($run1);
							//fetching tournament venues from venue table
							$to_ID=$data1['to_id'];
							$_SESSION['to_id']=$to_ID;
							
							$qry2="SELECT  `venue` FROM `venues` WHERE to_id=$to_ID";
							$run2=mysqli_query($conn,$qry2);
							//$data2=mysqli_fetch_array($run2)
							
							//inserting information in match table from admin_create_match.php
							if(isset($_POST['submit']))
						{
							session_start();
							
							$aid=$_SESSION['Admin_ID'];
							include("dbcon.php");
							$team1=$_POST['team1'];
							$q1="SELECT `t_id` FROM `team` WHERE t_name='$team1'";
							$r1=mysqli_query($conn,$q1);
							$d1=mysqli_fetch_assoc($r1);
							$team1_id=$d1['t_id'];
							
							$team2=$_POST['team2'];
							$q2="SELECT `t_id` FROM `team` WHERE t_name='$team2'";
							$r2=mysqli_query($conn,$q2);
							$d2=mysqli_fetch_assoc($r2);
							$team2_id=$d2['t_id'];
							
							
							$mdate=$_POST['Match_Date'];
							$venue=$_POST['Venue'];
							$qry3="SELECT `to_id` FROM `tournament`,organiser WHERE tournament.org_id=organiser.org_id AND organiser.org_id=$aid ";
							$run3=mysqli_query($conn,$qry3);
							$data3=mysqli_fetch_assoc($run3);
							$to_id=$data3['to_id'];
							
							$qry4="INSERT INTO `match`(`t1_id`, `t2_id`, `date`, `venue`,  `to_id`) VALUES ($team1_id,$team2_id,'$mdate','$venue',$to_id)";
							$run4=mysqli_query($conn,$qry4);
							//for getting no of teams
							//$qry7="SELECT t_id FROM `participation` WHERE to_id=124";
							//$run7=mysqli_query($conn,$qry7);
							//$data7=mysqli_fetch_array($run7);
						}
					?>
					<html>
					<head>

					<title>Admin datails page </title>

					<link rel="stylesheet" type="text/css" href="homecss.css"> 


					<style>

					.form1
							{
								line-height: 25px;
							}
					.box
							{
								//margin-right: 700px;
								width: 600px;
								height: 380px;
							   background-image: url(i4.jpg);
							   background-size:cover;
							   background-position:bottom;
							   margin-left:350px;
								//margin-right: 0px;
							   margin-top: 40px;
							   border-radius: 15px;
							   color:#93F28C;
							   color:white;
							   border:3px solid #7073CE;
							   border-style:outset;
							   font-size:32px;
							
							   
							   
							}

					.box2
							{
								//margin-right: 1000px;
								width: 600px;
								height: 440px;
							   background-image: url(i4.jpg);
							   background-size:cover;
							   background-position:bottom;
							   margin-left:700px;
								//margin-right: 0px;
							   margin-top: -100px;
							   border-radius: 15px;
							   color:#93F28C;
							   color:white;
							   border:3px solid #7073CE;
							   border-style:outset;
							   font-size:32px;
							
							   
							   
							}


							p.c1
							{
								text-align:center;
								font-size:1.5em;
								color:red;
							}	
							
								 button
						{
							font-size: 20px;
							width: 220px;
							height: 40px;
							color: black;
							//background-color:#93F28C;
							font-family: cursive;
							border-radius: 7px;
							margin-left:20px; 
						}
						button:hover
						{
							background-color:#93F28C;
						}
						
					.leftsplit{
						
						height:100%;
						width:30%;
						position:fixed;
						z-index:1;
						top:0;
						overflow:hidden;
						margin-left:50px;
						left:0;
					}	
						
					.profile_photo{
								width: 200px;
								height: 200px;
								//position:relative;
								//padding: 0 0 0 0;
								margin-top:2px;
								margin-left:30px;
								//left:50 ;
								border-radius: 200px;
								border:2px solid white;
								
								}
						
					</style>	
						<?php if($flag==1){?>
						<script>
						
								alert("Tournament Has Been Finished And Winner Team Is Declaired You can see Winner Team Details by clicking Winner Team Button");
							<?php $GLOBALS['flag']=0;?>
					</script>
						<?php } ?>
					</head>
					<body>
					
					
					
					<div style="color:white;font-family:cursive;font-size:2em">Tournament has been finished</div>



						<div class="box">
							<form class="form1">
								<p class="c1">Admin details are:</p>
								Admin ID:<b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['org_id'];?></b><p></p>
							  First Name: <b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['org_fname']; ?></b><p></p>
							 Last Name: <b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['org_lname']; ?></b><p></p>
								E-mail id:<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['email']; ?></b><p></p>
								Phone No.:<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['phone']; ?></b><p></p>
								
							   </form>    
							</div>
							<div class="box2">
							<form class="form1">
							  <p class="c1">Created Tournament Details are:</p>
								Tournament ID:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['to_id'];  ?></b><p></p>
								Created Tournament:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['to_name'];  ?></b><p></p>
							   Tournament Type:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['to_type'] ; ?></b><p></p>
							   NO. of Teams:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['no_of_teams'] ; ?></b><p></p>
								Start Date:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['to_s_date'] ; ?></b><p></p>
							End Date:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['to_e_date'] ; ?></b><p></p>
							Venues:<b style="color:#cdf54c;font-size:1.3em"><?php   
											while($row=mysqli_fetch_array($run2))
											{
												?><?php
												
												echo $row['venue'];
												echo ",  ";
											}
											?></b><p></p>
									 
							</form>    
							</div>

					<div class="leftsplit">	
					< <br><br><br><br>
							 <img src="<?php echo "image/".$data['img']; ?>" class="profile_photo" >
							 
							 <br><br>
							  <a href="winner.php"><button class="c2">Winner Team</button></a>
					<br><br>
					<a href="admin_team_list.php"><button class="c2">Participated Teams</button></a>
					<br><br>
					
					<a href="admin_matches_view.php"><button class="c2">Matches</button></a>
					<br><br>
					<a href="points_table.php"><button class="c2">Points Table</button></a>
					<br><br>
					<a href="logged_out.php"><button class="c2">LogOut</button></a>

					</div>

					</body>


					</html>
					<?php 
						session_start();
						$_SESSION['to_id']=$data1['to_id'];
						?>
		<?php }
		
}
else{ ?>
	<?php 
					//redirection in another page after successful login
					 error_reporting(E_ERROR | E_WARNING | E_PARSE);
						include("dbcon.php");
						session_start();
							$GLOBALS['flag']=1;
							$aid=$_SESSION['Admin_ID'];
							$qry="SELECT * FROM `organiser` WHERE org_id=$aid";
							$run=mysqli_query($conn,$qry);
							$data=mysqli_fetch_assoc($run);
							
							//to find name of tournament which is created by this admin
							$qry1="SELECT * FROM `tournament` where org_id=$aid";
							$run1=mysqli_query($conn,$qry1);
							$data1=mysqli_fetch_assoc($run1);
							//fetching tournament venues from venue table
							$to_ID=$data1['to_id'];
							$_SESSION['to_id']=$to_ID;
							
							$qry2="SELECT  `venue` FROM `venues` WHERE to_id=$to_ID";
							$run2=mysqli_query($conn,$qry2);
							//$data2=mysqli_fetch_array($run2)
							
							//inserting information in match table from admin_create_match.php
							if(isset($_POST['submit']))
						{
							session_start();
							
							$aid=$_SESSION['Admin_ID'];
							include("dbcon.php");
							$team1=$_POST['team1'];
							$q1="SELECT `t_id` FROM `team` WHERE t_name='$team1'";
							$r1=mysqli_query($conn,$q1);
							$d1=mysqli_fetch_assoc($r1);
							$team1_id=$d1['t_id'];
							
							$team2=$_POST['team2'];
							$q2="SELECT `t_id` FROM `team` WHERE t_name='$team2'";
							$r2=mysqli_query($conn,$q2);
							$d2=mysqli_fetch_assoc($r2);
							$team2_id=$d2['t_id'];
							
							
							$mdate=$_POST['Match_Date'];
							$venue=$_POST['Venue'];
							$qry3="SELECT `to_id` FROM `tournament`,organiser WHERE tournament.org_id=organiser.org_id AND organiser.org_id=$aid ";
							$run3=mysqli_query($conn,$qry3);
							$data3=mysqli_fetch_assoc($run3);
							$to_id=$data3['to_id'];
							
							$qry4="INSERT INTO `match`(`t1_id`, `t2_id`, `date`, `venue`,  `to_id`) VALUES ($team1_id,$team2_id,'$mdate','$venue',$to_id)";
							$run4=mysqli_query($conn,$qry4);
							//for getting no of teams
							//$qry7="SELECT t_id FROM `participation` WHERE to_id=124";
							//$run7=mysqli_query($conn,$qry7);
							//$data7=mysqli_fetch_array($run7);
						}
					?>
					<html>
					<head>

					<title>Admin datails page </title>

					<link rel="stylesheet" type="text/css" href="homecss.css"> 


					<style>

					.form1
							{
								line-height: 25px;
							}
					.box
							{
								//margin-right: 700px;
								width: 600px;
								height: 380px;
							   background-image: url(i4.jpg);
							   background-size:cover;
							   background-position:bottom;
							   margin-left:350px;
								//margin-right: 0px;
							   margin-top: 40px;
							   border-radius: 15px;
							   color:#93F28C;
							   color:white;
							   border:3px solid #7073CE;
							   border-style:outset;
							   font-size:32px;
							
							   
							   
							}

					.box2
							{
								//margin-right: 1000px;
								width: 600px;
								height: 440px;
							   background-image: url(i4.jpg);
							   background-size:cover;
							   background-position:bottom;
							   margin-left:700px;
								//margin-right: 0px;
							   margin-top: -100px;
							   border-radius: 15px;
							   color:#93F28C;
							   color:white;
							   border:3px solid #7073CE;
							   border-style:outset;
							   font-size:32px;
							
							   
							   
							}


							p.c1
							{
								text-align:center;
								font-size:1.5em;
								color:red;
							}	
							
								 button
						{
							font-size: 20px;
							width: 220px;
							height: 40px;
							color: black;
							//background-color:#93F28C;
							font-family: cursive;
							border-radius: 7px;
							margin-left:20px; 
						}
						button:hover
						{
							background-color:#93F28C;
						}
						
					.leftsplit{
						
						height:100%;
						width:30%;
						position:fixed;
						z-index:1;
						top:0;
						overflow:hidden;
						margin-left:50px;
						left:0;
					}	
						
					.profile_photo{
								width: 200px;
								height: 200px;
								//position:relative;
								//padding: 0 0 0 0;
								margin-top:2px;
								margin-left:30px;
								//left:50 ;
								border-radius: 200px;
								border:2px solid white;
								
								}
						
					</style>		
					</head>
					<body>
					<div style="color:white;font-family:cursive;font-size:2em">Note:you have already created Tournament</div>



						<div class="box">
							<form class="form1">
								<p class="c1">Admin details are:</p>
								Admin ID:<b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['org_id'];?></b><p></p>
							  First Name: <b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['org_fname']; ?></b><p></p>
							 Last Name: <b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['org_lname']; ?></b><p></p>
								E-mail id:<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['email']; ?></b><p></p>
								Phone No.:<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['phone']; ?></b><p></p>
								
							   </form>    
							</div>
							<div class="box2">
							<form class="form1">
							  <p class="c1">Created Tournament Details are:</p>
								Tournament ID:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['to_id'];  ?></b><p></p>
								Created Tournament:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['to_name'];  ?></b><p></p>
							   Tournament Type:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['to_type'] ; ?></b><p></p>
							   NO. of Teams:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['no_of_teams'] ; ?></b><p></p>
								Start Date:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['to_s_date'] ; ?></b><p></p>
							End Date:<b style="color:#cdf54c;font-size:1.3em"><?php echo $data1['to_e_date'] ; ?></b><p></p>
							Venues:<b style="color:#cdf54c;font-size:1.3em"><?php   
											while($row=mysqli_fetch_array($run2))
											{
												?><?php
												
												echo $row['venue'];
												echo ",  ";
											}
											?></b><p></p>
									 
							</form>    
							</div>

					<div class="leftsplit">	
					< <br><br><br><br>
							 <img src="<?php echo "image/".$data['img']; ?>" class="profile_photo" >
							 
							 <br><br>
							
					<a href="admin_team_list.php"><button class="c2">Participated Teams</button></a>
					<br><br>
					<a href="admin_create_match.php"><button class="c2">Create Match</button></a>
					<br><br>
					<a href="admin_matches_view.php"><button class="c2">Matches</button></a>
					<br><br>
					<a href="points_table.php"><button class="c2">Points Table</button></a>
					<br><br>
					<a href="logged_out.php"><button class="c2">LogOut</button></a>

					</div>

					</body>


					</html>
					<?php 
						session_start();
						$_SESSION['to_id']=$data1['to_id'];
						?>
	
	
<?php  }

?>

