<?php
//redirection in another page after successful login
session_start();
	include("dbcon.php");
	

	if(isset($_POST['submit']))
	{
		
		$username=$_POST['Player_ID'];
		$pass=$_POST['password'];
		$_SESSION['Player_ID']=$username;
		$qry="SELECT * FROM `player` WHERE p_id=$username and pswd='$pass';";
		$run=mysqli_query($conn,$qry);
		$row=mysqli_num_rows($run);
		
			if($row == 1)
			{
					$qry1="SELECT `t_id` FROM `player` WHERE p_id=$username ";
						$run1=mysqli_query($conn,$qry1);
						$row=mysqli_num_rows($run1);
						if($row == 0)
						{
								echo "login successfully";
								header('Location:player_details.php');
								exit;
						}
						else
						{
							
								header('Location:player_details.php');
								exit;
						}
						
			}
			else
			{
				
				header('Location:player_login_fail.php');
				exit;
				
			}
			
		
	}

?>  