<?php
	include("dbcon.php");
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	session_start();
	$tid=$_SESSION['Team_ID'];
	$qry="SELECT * FROM `player` where t_id=$tid";
	$run=mysqli_query($conn,$qry);
	//$data=mysqli_fetch_array($run);
?>




<html>
<head>
    <title>Team Player Selection </title>
    <link rel="stylesheet" type="text/css" href="homecss.css"> 
    <style>
        .box
        {
            //margin-right: 700px;
            width: 560px;
            height: 970px;
           background-image: url(i4.jpg);
           background-size:cover;
           background-position:bottom;
           margin-left: auto;
            margin-right: auto;
           margin-top: 20px;
            margin-bottom: 25px;    
           border-radius: 15px;
           color:#93F28C;
           border:3px solid #7073CE;
           border-style:outset;
		   font-size:32px;
            //line-height: 54px;
            
           
           
        }
        p
        {
            margin: 20 0 10 10;
            border: 2px solid black;
            border-radius: 5px;
            padding-left: 2px;
            width: 350px;
            font-size: 24px;
            float: left;
            height: 40px;
             background-color:coral;
            
            
        }
        .each_team
        {
            height: 88px;
            
        }
        select
        {
            width:calc( 100% - 50px);
            height: 40px;
            border: 2px solid #ff4000;
            border-radius: 5px;
            margin: 21px;
            float:left;
            font-size:20px;
			padding:5;
			text-align:center;
			color:white;
			background-image:url("i4.jpg");

        }
		option
		{
			background-color:#ff4000;
		}
        .logodiv
        {
            float: left;
            width:100px;
            height: 530px;
            margin-top: 33px;
           //border-radius: 15px;
           color:#93F28C;
           //border:3px solid #7073CE;
           //border-style:outset;
            margin-left: 280px;
            text-align: center;
            font-size: 26px;
            line-height: 88px;
            
        }
        .avatar
        {
            width: 70px;
            margin-bottom: 12px;
            
        }
		 .subbutton
        {
            width:150px;
            height: 40px;
            border: 2px solid black;
            border-radius: 15px;
            //margin: 28px;
			margin-left:200px;
            //float:left;
        }
			
        

        
    </style>
</head>
    <body>
        <div class="heading">Player Selection</div>
       <!-- <div class="logodiv">
            <img class="avatar" src="avatar.png">
            <img class="avatar" src="avatar.png">
            <img class="avatar" src="avatar.png">
            <img class="avatar" src="avatar.png">
            <img class="avatar" src="avatar.png">
            <img class="avatar" src="avatar.png">
            <img class="avatar" src="avatar.png">
            <img class="avatar" src="avatar.png">
            <img class="avatar" src="avatar.png">
            <img class="avatar" src="avatar.png">
            <img class="avatar" src="avatar.png">
            </div> -->
        <div class="box">
		<form name="team_player_selection" method="post" action="team_details.php">
		
            <div class="each_team">
            <select name="PLayer1" value="Player1">
			<option >Player1</option>
			<?php while($row=mysqli_fetch_array($run))
						{
							?>
							
							 <option name="Player1"><?php echo $row['f_name'] ?></option> 
							
							  <?php
							
						}?>
						</select>
           </div>
           
            <div class="each_team">
            <select name="PLayer2">
			<option >Player2</option>
			<?php $run=mysqli_query($conn,$qry); while($row=mysqli_fetch_array($run))
						{
							?>
							
							 <option name="Player2"><?php echo $row['f_name'] ?></option> 
							
							  <?php
							
						}?>
						</select>
           </div>
            
            
            <div class="each_team">
            <select name="PLayer3">
			<option >Player3</option>
            <?php $run=mysqli_query($conn,$qry); while($row=mysqli_fetch_array($run))
						{
							?>
							
							 <option name="Player3"><?php echo $row['f_name'] ?></option> 
							
							  <?php
							
						}?>
						</select>
           </div>
            
            <div class="each_team">
            <select name="PLayer4">
			<option >Player4</option>
            <?php $run=mysqli_query($conn,$qry); while($row=mysqli_fetch_array($run))
						{
							?>
							
							 <option name="Player4"><?php echo $row['f_name'] ?></option> 
							
							  <?php
							
						}?>
						</select>
           </div>
            
            <div class="each_team">
            <select name="PLayer5">
			<option >Player5</option>
            <?php $run=mysqli_query($conn,$qry); while($row=mysqli_fetch_array($run))
						{
							?>
							
							 <option name="Player5"><?php echo $row['f_name'] ?></option> 
							
							  <?php
							
						}?>
						</select>
           </div>
            
            <div class="each_team">
            <select name="PLayer6">
			<option >Player6</option>
            <?php $run=mysqli_query($conn,$qry); while($row=mysqli_fetch_array($run))
						{
							?>
							
							 <option name="Player6"><?php echo $row['f_name'] ?></option> 
							
							  <?php
							
						}?>
						</select>
           </div>
            
            <div class="each_team">
            <select name="PLayer7">
			<option >Player7</option>
            <?php $run=mysqli_query($conn,$qry); while($row=mysqli_fetch_array($run))
						{
							?>
							
							 <option name="Player7"><?php echo $row['f_name'] ?></option> 
							
							  <?php
							
						}?>
						</select>
           </div>
            
            <div class="each_team">
            <select name="PLayer8">
			<option >Player8</option>
           <?php $run=mysqli_query($conn,$qry); while($row=mysqli_fetch_array($run))
						{
							?>
							
							 <option name="Player8"><?php echo $row['f_name'] ?></option> 
							
							  <?php
							
						}?>
						</select>
           </div>
            
            <div class="each_team">
            <select name="PLayer9">
			<option >Player9</option>
            <?php $run=mysqli_query($conn,$qry); while($row=mysqli_fetch_array($run))
						{
							?>
							
							 <option name="Player9"><?php echo $row['f_name'] ?></option> 
							
							  <?php
							
						}?>
						</select>
           </div>
            
            <div class="each_team">
            <select name="PLayer10">
			<option >Player10</option>
            <?php $run=mysqli_query($conn,$qry); while($row=mysqli_fetch_array($run))
						{
							?>
							
							 <option name="Player10"><?php echo $row['f_name'] ?></option> 
							
							  <?php
							
						}?>
						</select>
           </div>
            
            <div class="each_team">
            <select name="PLayer11">
			<option >Player11</option>
            <?php $run=mysqli_query($conn,$qry); while($row=mysqli_fetch_array($run))
						{
							?>
							
							 <option name="Player11"><?php echo $row['f_name'] ?></option> 
							
							  <?php
							
						}?>
						</select>
           </div>
			<input class="subbutton" type="submit" name="TMsubmit" value="Submit">
			
			</form>
        </div>
                
        
        
        
    </body>
</html>    