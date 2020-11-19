
<?php
	include("dbcon.php");

?>

<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
	if(isset($_POST['submit']))
	{
		include("dbcon.php");
		$fname=$_POST['First_Name'];
		$lname=$_POST['Last_Name'];
		$addr=$_POST['Address'];
		$email=$_POST['Email_id'];
		$phone=$_POST['Phone_No'];
		$dob=$_POST['Date_Of_Birth'];
		$psw=$_POST['password'];
		$cpsw=$_POST['Confirm_Password'];
				//for image upload
		
		$target="image/".basename($_FILES['image']['name']);
		$image_name=$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'],$target);
		
		if($psw==$cpsw){
		$qry="INSERT INTO `player`(`f_name`, `l_name`, `dob`, `email`, `phone`, `addr`, `pswd`,`img`) VALUES ('$fname','$lname','$dob','$email',$phone,'$addr','$psw','$image_name')";
		$run=mysqli_query($conn,$qry);
		
		$qry1="SELECT `p_id` FROM `player` WHERE `f_name`='$fname' and `l_name`='$lname'";
		$run1=mysqli_query($conn,$qry1);
		$data=mysqli_fetch_assoc($run1);
		
		?>
		<script>alert("AUTO GENERATED PLAYER ID :"+<?php echo $data['p_id'] ?> )
		
		</script>
		
		<?php
		
		}
		
		
		
	}
?>	




<html>
<head>
    <title> Player Login </title>
    <link rel="stylesheet" type="text/css" href="homecss.css"> 
    <style>
       
        .login-box
        {
            margin-left:540px;
        }
        .heading
        {
            margin-right: 700px;
        }
    </style>
</head>
    <body>
        <div class="heading">CRICKET</div>
        <div class="login-box">
            <!-- <img src="player.jfif" id="avatar"> -->
			<img src="team.jfif" id="avatar">
            <div class="head">Player Login</div>
            <form class="form1" method="POST" action="player_logincheck.php">
            Player ID
            <input type="text" name="Player_ID" placeholder="Enter Player ID">
            Password
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">
             <a href="player_signup.php"> <input type="button" value="Sign Up"></a>     
            </form>
        </div>
        
        
        
        
    </body>
</html>  

<?php
	session_start();
	$_SESSION['Player_ID']=$_POST['Player_ID'];
?>  