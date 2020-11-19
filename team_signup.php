<html>
<head>
    <title>Team Sign-Up </title>
    <link rel="stylesheet" type="text/css" href="homecss.css"> 
    <style>
        .login-box
        {
            margin-top: 10;
            width: 400px;
            margin-left: 461px;
            height: 530px;
        }
        .form1
        {
            line-height: 20px;
        }
        .login-box input[type="submit"]
        {
            margin: 10 50 10 120;
        }
		.home_logo
		{
			height:50px;
			width:50px;
			margin-left:1200px;
		}
    </style>
	<script>
		function checkpass()
		{
			var p=loginform.password.value;
			var c=loginform.Confirm_Password.value;
			if(p!=c)
			{
				alert("mismatch in password");
			}
		}
	</script>
	
</head>
    <body>
	<a href="index.php"><img class="home_logo" src="image/home.png"></a>
        <div style="text-align: center;margin-top:-40px; font-size: 40px;color:#93F28C ">Enter Team Details: </div>
        <div class="login-box">
        <form  name="loginform" class="form1" method="post" enctype="multipart/form-data" action="team_login.php">
            Team Name
            <input type="text" name="Team_Name" placeholder="Enter Team Name" required>
            Manager Name
            <input type="text" name="Manager_Name" placeholder="Enter Manager Name">
            Coach Name
            <input type="text" name="Coach_Name" placeholder="Enter Coach Name">
            Email-id
            <input type="email" name="Email_id" placeholder="Enter Email-id">
            Phone No.
            <input type="number" name="Phone_No" placeholder="Enter Phone No.">
            Password
            <input type="password" name="password" placeholder="Enter Password">
            Confirm Password
            <input type="password" name="Confirm_Password" placeholder="Enter Password Again">
			Team Logo
			<input type="file" name="image" required>
			
            <input type="submit" name="submit" value="Sign Up" onclick="checkpass()">     
        </form>    
        </div> 




