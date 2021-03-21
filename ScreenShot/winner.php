<?php
//for updating participation table in database
include("dbcon.php");
		$qry1="CALL `winner`();";
		$run1=mysqli_query($conn,$qry1);
		$data1=mysqli_fetch_assoc($run1);
		$win_id= $data1['winner'];
		
?>	



<?php
//redirection in another page after successful login
 error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include("dbcon.php");
	//session_start();
	
		//$aid=$_SESSION['Team_ID'];
		$qry="SELECT * FROM `team` WHERE t_id=$win_id";
		$run=mysqli_query($conn,$qry);
		$data=mysqli_fetch_assoc($run);
?>
<html>
<head>
<title>Team datails page </title>
<link rel="stylesheet" type="text/css" href="homecss.css"> 
<style>

.form1
        {
            line-height: 47px;
        }
.box
        {
            //margin-right: 700px;
            width: 700px;
            height: 520px;
           background-image: url(i4.jpg);
           background-size:cover;
           background-position:bottom;
           margin-left: 420px;
            //margin-right: 0px;
           margin-top: 40px;
           border-radius: 15px;
           color:#93F28C;
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
        margin: 20 10 0 290;
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
            <p class="c1">Winner Team details are:</p>
			Team ID: <b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['t_id']; ?></b><p></p>
            Team Name :<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['t_name']; ?></b><p></p>
			Manager Name :<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['t_mgr_name']; ?></b><p></p>
           Coach Name:<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['t_c']; ?></b><p></p>
           E-mail id: <b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['email']; ?></b><p></p>
        Phone No.:<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['phone']; ?></b><p></p>
            
                 
        </form>    
        </div>
	
<div class="leftsplit">
 <br><br><br><br>
		 <img src="<?php echo "image/".$data['img']; ?>" class="profile_photo" ><br><br>
	
    
</div>







</body>











</html>