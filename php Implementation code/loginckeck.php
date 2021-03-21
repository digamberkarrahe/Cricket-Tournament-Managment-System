<?php
//redirection in another page after successful login
session_start();
	include("dbcon.php");
	

	if(isset($_POST['submit']))
	{
		
		$username=$_POST['Admin_ID'];
		$pass=$_POST['password'];
		$_SESSION['Admin_ID']=$username;
		$qry="SELECT * FROM `organiser` WHERE org_id=$username and pswd='$pass' ";
		$run=mysqli_query($conn,$qry);
		$row=mysqli_num_rows($run);
		
			if($row == 1)
			{
								$qry1="SELECT * FROM `tournament` WHERE org_id=$username; ";
						$run1=mysqli_query($conn,$qry1);
						$row=mysqli_num_rows($run1);
						if($row>0)
						{
								header('Location:admin_view.php');
								exit;
						}
						else
						{
							echo "login successfully";
								header('Location:admin_details.php');
								exit;
							
						}
			}
			else
			{
				
				header('Location:login_failed.php');
				exit;
				
			}
			
		
	}

?>  