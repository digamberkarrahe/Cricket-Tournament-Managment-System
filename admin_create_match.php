<?php
	include("dbcon.php");
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	
	$qry="SELECT `t_name` FROM `team`";
	$run=mysqli_query($conn,$qry);
	//$data=mysqli_fetch_array($run);
?>



<html>
<head>
    <title>Create match </title>
    <link rel="stylesheet" type="text/css" href="homecss.css"> 
    <style>
        .login-box
        {
            height: 430px;
            margin-top: 50px;
        }
        .login-box input[type="submit"]
        {
            margin-left: 70px;
        }
        
    </style>
</head>
    <body>
        <div class="heading">Create Match</div>
        <div class="login-box">
            <form class="form1" method="POST" action="admin_view.php">
          First Team Name<br> 
           <select name="team1"><?php
		   include("dbcon.php");
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	session_start();
	$to_id=$_SESSION['to_id'];
	$qry1="SELECT * FROM `participation` WHERE to_id=$to_id";
	$run1=mysqli_query($conn,$qry1);
	while($data=mysqli_fetch_array($run1))
	{
		$t_id=$data['t_id'];
		$qry="SELECT `t_name` FROM `team` where t_id=$t_id";
		$run=mysqli_query($conn,$qry);
		$row=mysqli_fetch_array($run);
		   
		   
		  ?>
							
							  <option name="team1"><?php echo $row['t_name'] ?></option><?php
							
					
	} ?>		 
			 </select>

<!--		   <input type="text" name="First_Team_Name" placeholder="Enter First Team Name"> -->
           <br> Second Team Name
          <br> 
          <select name="team2"><?php $run1=mysqli_query($conn,$qry1);
	while($data=mysqli_fetch_array($run1))
	{
		$t_id=$data['t_id'];
		$qry="SELECT `t_name` FROM `team` where t_id=$t_id";
		$run=mysqli_query($conn,$qry);
		$row=mysqli_fetch_array($run);
		   
		  ?> 
		  
							
							  <option name="team2"><?php echo $row['t_name'] ?></option><?php
							
					
	} ?>		 
			 
			 </select>
            <br>Match Date
            <input type="date" name="Match_Date" placeholder="Enter Match Date">
            Venue    
            <input type="text" name="Venue" placeholder="Enter Venue">
            <input type="submit" name="submit" value="Create Match">   
            </form>
        </div>
        
		
		 <select name="tournament">
         <?php   
						while($row=mysqli_fetch_array($run))
						{
							?>
							
							  <option name="tournament"><?php echo $row['to_name'] ?></option><?php
							
						}
						?>
          
			
		   
		    
                </select>
        
        
        
    </body>
</html>    