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
		$email=$_POST['Email_id'];
		$phone=$_POST['Phone_No'];
		$pass=$_POST['password'];
		$cpass=$_POST['Confirm_Password'];
		//for image upload
		/*$image_name=$_FILES['image_name']['name'];
		$temp_image=$_FILES['image_name']['tmp_name'];
		move_uploaded_file($temp_image,"image/$image_name");*/
		$target="image/".basename($_FILES['image']['name']);
		$image_name=$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'],$target);
		
		
		
		if($pass==$cpass)
		{
		$qry="INSERT INTO `organiser`(`org_fname`, `org_lname`, `email`, `phone`, `pswd`, `img`) VALUES ('$fname','$lname','$email',$phone,'$pass','$image_name')";
		$run=mysqli_query($conn,$qry);
		
		$qry1="SELECT `org_id` FROM `organiser` WHERE `org_fname`='$fname' and `org_lname`='$lname'";
		$run1=mysqli_query($conn,$qry1);
		$data=mysqli_fetch_assoc($run1);
		
		?>
		<script>alert("Admin ID :"+<?php echo $data['org_id'] ?> )
		
		</script>
		
		<?php
		
		}
		
		
		
		
	}
?>




<html>
<head>
    <title>Admin Login </title>
    <link rel="stylesheet" type="text/css" href="homecss.css"> 
    <style>
      
        .login-box
        {
            margin-left:460px;
        }
        .heading
        {
            margin-right: 730px;
            
        }
    </style>
</head>
    <body>
        <div class="heading">CRICKET</div>
        <div class="login-box">
            <img src="team.jfif" id="avatar">
            <div class="head">Admin Login</div>
            <form class="form1" method="POST" action="loginckeck.php">
            Admin ID
            <input type="text" name="Admin_ID" placeholder="Enter Admin ID">
            Password
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">
			
            </form>
			<a href="admin_signup.php"> <input type="button" value="Sign Up"></a>
        </div>
        
        
        
        
    </body>
	
</html>  

<?php 
	session_start();
	$_SESSION['Admin_ID']=$_POST['Admin_ID'];

?>