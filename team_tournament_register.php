<?php
	include("dbcon.php");
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	
	$qry="SELECT `to_name` FROM `tournament`";
	$run=mysqli_query($conn,$qry);
	//$data=mysqli_fetch_array($run);
?>


<html>
<head>
    <title>Team tournament registration page </title>
    <link rel="stylesheet" type="text/css" href="homecss.css"> 
    <style>
       
        
        .box
        {
            
            width: 600px;
            height: 480px;
           background-image: url(i4.jpg);
           background-size:cover;
           background-position:bottom;
           margin-left: 350px;
           margin-top: 100px;
           border-radius: 15px;
           
		   color:red;
           border:3px solid #7073CE;
           border-style:outset;
		   font-size:32px;
        
           
           
        }
        select
        {
            width: 300px;
            height: 50px;
            background-color:#93F28C;
            margin: 10 00 10 150;
            font-family: cursive;
            font-size: 20
            
        }
        button
    {
        font-size: 50px;
        width: 120px;
        height: 40px;
        color: black;
        //background-color:#93F28C;
        font-family: cursive;
        border-radius: 7px;
        margin-left:240px; 
    }
    button:hover
    {
        background-color:#93F28C;
    }
	
	 .form1
        {
            line-height: 35px;
        }
	.r
	{
		 font-size: 20px;
        width: 120px;
        height: 40px;
        color: black;
        //background-color:#93F28C;
        font-family: cursive;
        border-radius: 7px;
        margin-left:240px; 
	}
    </style>
</head>
    <body>
       <form class="form1" method="POST" action="team_details.php"> 
        <div class="box">
            <div style="text-align: center; width: 400px;margin:40 00 40 100; font-size: 30px;color:#93F28C ">Select a tournament </div>
        <select name="tournament">
         <?php   
						while($row=mysqli_fetch_array($run))
						{
							?>
							
							  <option name="tournament"><?php echo $row['to_name'] ?></option><?php
							
						}
						?>
          
			
		   
		    
                </select><br><br>
	
	  
				
		<!--<button type="button" name="submit">Reagister</button> -->
		<div >	
         <input style="font-size: 30px;
        width: 200px;
        height: 50px;
        color: black;
        //background-color:#93F28C;
        font-family: cursive;
        border-radius: 15px;
        margin-left:200px; margin-top:150px; " type="submit" name="submit" value="Register">
         </div>   
            
        </form>
        
        
        </div>
         
    </body>
</html>	

