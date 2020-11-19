


<?php
//redirection in another page after successful login
 
	include("dbcon.php");
	session_start();
	
		$aid=$_SESSION['Admin_ID'];
		$qry="SELECT * FROM `organiser` WHERE org_id=$aid";
		$run=mysqli_query($conn,$qry);
		$data=mysqli_fetch_assoc($run);
?>
<html>
<head>
<title>Admin datails page </title>
<link rel="stylesheet" type="text/css" href="homecss.css"> 
<style>

.form1
        {
            line-height: 42px;
        }
.box
        {
            //margin-right: 700px;
            width: 600px;
            height: 450px;
           background-image: url(i4.jpg);
           background-size:cover;
           background-position:bottom;
           margin-left: 450px;
            //margin-right: 0px;
           margin-top: 40px;
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
	
	.c2
    {
        margin: 30 00 0 490;
    }
    button
    {
        font-size: 20px;
		width:220px;
        color: black;
        //background-color:#93F28C;
        font-family: cursive;
        border-radius: 7px;
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
<div style="color:white;font-family:cursive;font-size:2em">Note:you can create only one Tournament</div>

	<div class="box">
        <form class="form1">
            <p class="c1">Admin details are:</p>
			Admin ID:<b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['org_id']; ?></b><p></p>
            First Name:<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['org_fname']; ?></b><p></p>
            Last Name:<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['org_lname']; ?></b><p></p>
            E-mail id: <b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['email']; ?></b><p></p>
            Phone No.: <b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['phone']; ?></b><p></p>
            
                 
        </form>    
        </div>
		 <div class="leftsplit">
		 <br><br><br><br>
		 <img src="<?php echo "image/".$data['img']; ?>" class="profile_photo" >
		 
		 <br><br>
	<a href="admin_tournament.php"><button>Create Tournament</button></a>
<br><br>	
	<a href="logged_out.php"><button>LogOut</button></a>
	<br><br>
    </div>
	

</body>

</html>

