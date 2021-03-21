<?php
	include("dbcon.php");

?>

<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
	if(isset($_POST['submit']))
	{
		include("dbcon.php");
		$tname=$_POST['Team_Name'];
		$mgrname=$_POST['Manager_Name'];
		$cname=$_POST['Coach_Name'];
		$email=$_POST['Email_id'];
		$phone=$_POST['Phone_No'];
		$psw=$_POST['password'];
		$cpsw=$_POST['Confirm_Password'];
		
		//for image upload
		
		$target="image/".basename($_FILES['image']['name']);
		$image_name=$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'],$target);
		
		if($psw==$cpsw){
		$qry="INSERT INTO `team`(`t_name`, `t_c`, `t_mgr_name`, `email`, `phone`, `pasd`,`img`) VALUES ('$tname','$cname','$mgrname','$email','$phone','$psw','$image_name')";
		$run=mysqli_query($conn,$qry);
		
		$qry1="SELECT `t_id` FROM `team` WHERE `t_name`='$tname'";
		$run1=mysqli_query($conn,$qry1);
		$data=mysqli_fetch_assoc($run1);
		
		?>
		<script>alert("TEAM ID :"+<?php echo $data['t_id'] ?> )
		
		</script>
		
		<?php
		
		}
		
		
		
	}
?>		


<html>
<head>
    <title>Team Login </title>
    <link rel="stylesheet" type="text/css" href="homecss.css"> 
	<style>
	
    </style>
</head>
    <body>
	
        <div class="heading">CRICKET </div>
        <div class="login-box">
            <img src="team.jfif" id="avatar">
            <div class="head">Team Login</div>
            <form class="form1" method="POST" action="team_loginckeck.php">
            Team ID
            <input type="text" name="Team_ID" placeholder="Enter Team ID"> 
			
            Password
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">
            <a href="team_signup.php"> <input type="button" value="Sign Up"></a>  
            </form>
        </div>
        
        
        
        
    </body>
</html>  


<?php 
	session_start();
	$_SESSION['Team_ID']=$_POST['Team_ID'];
?>  