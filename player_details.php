
<?php
//for updating participation table in database
include("dbcon.php");
	session_start();
	
		$pid=$_SESSION['Player_ID'];
		
	if(isset($_POST['submit'])){
		$t_name=$_POST['team'];
		$qry1="SELECT `t_id`FROM `team` WHERE t_name='$t_name'";
		$run1=mysqli_query($conn,$qry1);
		$data1=mysqli_fetch_assoc($run1);
		$t_id=$data1['t_id'];
		
		$qry2="UPDATE `player` SET `t_id`=$t_id WHERE p_id=$pid";
		$run2=mysqli_query($conn,$qry2);
		
		
	}
		




//redirection in another page after successful login
 
	include("dbcon.php");
	
	
		$aid=$_SESSION['Player_ID'];
		$qry="SELECT * FROM `player` WHERE p_id=$aid";
		$run=mysqli_query($conn,$qry);
		$data=mysqli_fetch_assoc($run);
?>
<html>
<head>
<title>player datails page </title>
<link rel="stylesheet" type="text/css" href="homecss.css"> 
<style>

.form1
        {
            line-height: 38px;
        }
.box
        {
            //margin-right: 700px;
            width: 600px;
            height: 550px;
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
		width:250px;
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

	<div class="box">
        <form class="form1">
            <p class="c1">Player details are:</p>
			Player ID  :<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['p_id']; ?></b><p></p>
          First Name :<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['f_name']; ?></b><p></p>
			Last Name <b style="color:#cdf54c;font-size:1.3em"> : <?php  echo $data['l_name']; ?></b><p></p>
			DOB     <b style="color:#cdf54c;font-size:1.3em">   : <?php  echo $data['dob']; ?></b><p></p>
            
           E-mail id <b style="color:#cdf54c;font-size:1.3em"> : <?php  echo $data['email']; ?></b><p></p>
            Phone No. <b style="color:#cdf54c;font-size:1.3em"> : <?php  echo $data['phone']; ?></b><p></p>
			Address  <b style="color:#cdf54c;font-size:1.3em">  : <?php  echo $data['addr']; ?></b><p></p>
            
                 
        </form>    
        </div>
		<div class="c2">
		<div class="leftsplit">
		<br><br><br><br>
		 <img src="<?php echo "image/".$data['img']; ?>" class="profile_photo" ><br><br>
	<a href="player_team_register.php"><button>Join The Team</button><br><br>	
	<a href="player_team_details.php"><button>Joined Team Details</button><br><br>	
	<a href="logged_out.php"><button>LogOut</button></a>
	</div>










</body>











</html>