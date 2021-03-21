


<html>
<head>
    <title>log out msg page </title>
    <link rel="stylesheet" type="text/css" href="homecss.css"> 
    <style>
        body{
        background-image: url(back5.jpg);
            background-size: cover;
            background-position:center;
           //background-size: contain;
        }
        .login-box
        {
           margin-top: 100px;
            width: 800px;
            margin-left: 90px;
            height: 470px;
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
        <div class="login-box">
		<p></p>
		<p></p>
		<p></p>
        <div><h1> <center>Thank You!</h1></div>
		<p></p>
		<p></p>
		<p></p>
		<p><h2>Successfully LogOut</h2></p>
		<center><p><h1><a href="index.php">OK</h1></p>
		
        
        </div>    
	</body>
</head>
