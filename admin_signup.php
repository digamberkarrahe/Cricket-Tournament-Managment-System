

<html>
<head>
    <title>Admin Sign-Up </title>
    <link rel="stylesheet" type="text/css" href="homecss.css"> 
    <style>
       
        .login-box
        {
           margin-top: 0px;
            width: 400px;
            margin-left: 90px;
            height: 490px;
        }
        .form1
        {
            line-height: 20px;
        }
        .login-box input[type="submit"]
        {
            margin: 10 50 10 120;
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
        <div style="text-align: center; width: 400px;margin:40 00 10 80; font-size: 40px;color:#93F28C ">Enter Admin Details: </div>
        <div class="login-box">
        <form name="loginform" class="form1" method="post" enctype="multipart/form-data" action="admin_login.php">
            First Name
            <input type="text" name="First_Name" placeholder="Enter First Name" required>
            Last Name
            <input type="text" name="Last_Name" placeholder="Enter Last Name">
            Email-id
            <input type="email" name="Email_id" placeholder="Enter Email-id">
            Phone No.
            <input type="number" name="Phone_No" placeholder="Enter Phone No.">
            Password
            <input type="password" name="password" placeholder="Enter Password" required>
            Confirm Password
            <input type="password" name="Confirm_Password" placeholder="Enter Password Again">
			profile photo
			<input type="file" name="image" required>
            <input type="submit" name="submit" value="Sign Up" onclick="checkpass()">     
        </form>    
        </div>    
	</body>
</head>
