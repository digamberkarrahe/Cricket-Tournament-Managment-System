<?php
//redirection in another page after successful login
 error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include("dbcon.php");
	session_start();
	$t_id=$_SESSION['Team_ID'];
		
		
	//fetching admin created matches
	$qry1="SELECT * FROM `match` WHERE t1_id=$t_id OR t2_id=$t_id";
		$run1=mysqli_query($conn,$qry1);
		//$data1=mysqli_fetch_array($run1);
	
		
?>
<html>
<head>
    <title>Matches View </title>
    <link rel="stylesheet" type="text/css" href="homecss.css"> 
    <style>
        table
        {
            width: 100%;
            color: aliceblue;
            //border: 3px solid white;
            text-align:center;
            margin-top: 20px;
        }
        th
        {
            color:yellow;
            font-size: 25px;
            border: 3px solid white;
            font-size: 30px;
            padding: 10 10 10 10;
            border-radius: 25px;
            background-image: url(i4.jpg);
        }
        td
        {
            font-size: 25px;
            border: 3px solid white;
            line-height: 25px;
            padding: 10;
            border-radius: 25px;
            background-color:darkgreen;
            font-weight:bold;
        }
        h4
        {
            line-height: 0px
        }
        select,input[type="submit"]
        {
            border: 2px solid black;
            border-radius: 5px;
            width: calc(100% - 200px);
            height: 40px;
            font-family: cursive;
            color: yellow;
            background-image: url(i4.jpg);
            font-size: 20px;
        }
        option
        {
            background-color: cornflowerblue;
        }
		 button
        {
            width:150px;
            height: 40px;
            border: 2px solid black;
            border-radius: 15px;
            margin: 28px;
			margin-left:600px;
            //float:left;
        }
        
        

        
    </style>
</head>
    <body>
        <div class="heading">Match Schedule</div>
        <table>
            <tr>
                <th style="width:32px">No.</th>
                <th>Date</th>
                <th>Match Details</th>
                <th>Venue</th>
                
            </tr>
            <tr>
<?php $i=1;  
			while($row=mysqli_fetch_array($run1))
			{ 
		
		//for getting team name via t_id
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include("dbcon.php");
		$t1=$row['t1_id'];
		$qry2="SELECT * FROM `team` WHERE t_id=$t1";
		$run2=mysqli_query($conn,$qry2);
		$data2=mysqli_fetch_array($run2);
		$t2=$row['t2_id'];
		$qry3="SELECT * FROM `team` WHERE t_id=$t2";
		$run3=mysqli_query($conn,$qry3);
		$data3=mysqli_fetch_array($run3);
		
		?>
			
                <th><?php echo $i;$i++;?></th>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $data2['t_name'] ;?> <h4>VS</h4> <?php echo $data3['t_name'];?></td>
                <td><?php echo $row['venue'];?></td>
               
            </tr>
			<?php }?>
        </table>
		<a href="team_details.php">	<button>Back</button> </a>
        
        </body>
</html> 



 