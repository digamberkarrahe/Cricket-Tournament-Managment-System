<?php
	session_start();
	include("dbcon.php");
	$aid=$_SESSION['Team_ID'];
	$qry="select t.to_name from tournament t,participation p WHERE t.to_id=p.to_id and t_id=$aid;";
	
	

?>
<html>
<head>
	<title>Joined Tournament List of Team</title>
	 <link rel="stylesheet" type="text/css" href="homecss.css"> 
</head>
<body style="color:white;">
		<?php 
		$run=mysqli_query($conn,$qry);
				$row1=mysqli_fetch_assoc($run);
				if($row1==0){
				echo "You have not Joined any tournament";
				?><br><a href="team_details.php">BACK</a> <?php
				return;}
				
				
				
		$run=mysqli_query($conn,$qry);
		?> <h1> <center>Joined Tournament List</h1><?php
				while($row=mysqli_fetch_array($run))
				{
				?> <br><h2 ><center><?php	echo $row['to_name'];
					
				}
				
				
		
		
		?>
		<br><br><a href="team_details.php">BACK</a>
</body>

</html>
	