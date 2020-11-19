<?php

include("dbcon.php");
	session_start();
	
		$pid=$_SESSION['Player_ID'];
		$qry="SELECT  `t_id` FROM `player` WHERE p_id=$pid";
		$run=mysqli_query($conn,$qry);
		$data=mysqli_fetch_assoc($run);
		$t_id=$data['t_id'];
		//accessing info of team using $t_id
		$qry1="SELECT * FROM `team` WHERE t_id=$t_id";
		$run1=mysqli_query($conn,$qry1);
		$data1=mysqli_fetch_assoc($run1);
?>

<html>
<head>
<title>Team datails page </title>
<link rel="stylesheet" type="text/css" href="homecss.css"> 
<style>

.form1
        {
            line-height: 37px;
			color:white;
        }
		
p.c1
{
			text-align:center;
			font-size:1.5em;
			color:red;
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
		
}	

.profile_photo{
            width: 200px;
            height: 200px;
            //position:relative;
            //padding: 0 0 0 0;
            margin-top:20px;
            margin-left:300px;
            //left:50 ;
            border-radius: 200px;
            border:2px solid white;
            
            }
	
			
</style>		
</head>
<body>

	
        <div class="form1"><center>
            <p class="c1">Team details are:</p>
			 <img src="<?php echo "image/".$data1['img']; ?>" class="profile_photo" ><br>
			Team ID: <b style="color:#cdf54c;font-size:1.3em"><?php  echo $data1['t_id']; ?></b><p></p>
            Team Name :<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data1['t_name']; ?></b><p></p>
			Manager Name :<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data1['t_mgr_name']; ?></b><p></p>
           Coach Name:<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data1['t_c']; ?></b><p></p>
           E-mail id: <b style="color:#cdf54c;font-size:1.3em"><?php  echo $data1['email']; ?></b><p></p>
        Phone No.:<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data1['phone']; ?></b><p></p>
            
                 
          
        
	

 
	<a href="player_details.php"><button>Back</button></a>
	 </div> 
	<br><br>
    
</div>

</body>

</html>
		