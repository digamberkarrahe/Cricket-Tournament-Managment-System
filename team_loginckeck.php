<?php
//redirection in another page after successful login
session_start();
	include("dbcon.php");
	

	if(isset($_POST['submit']))
	{
		
		$username=$_POST['Team_ID'];
		$pass=$_POST['password'];
		$_SESSION['Team_ID']=$username;
		$qry="SELECT * FROM `team` WHERE t_id=$username and pasd='$pass' ";
		$run=mysqli_query($conn,$qry);
		$row=mysqli_num_rows($run);
		
			if($row == 1)
			{
				echo "login successfully";
				header('Location:team_details.php');
				exit;
			}
			else
			{
				
				header('Location:team_login_fail.php');
				exit;
				
			}
			
		
	}

?>  