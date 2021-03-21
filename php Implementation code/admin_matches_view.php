<?php

 error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include("dbcon.php");
	//for updating winner t_id in match table
	if(isset($_POST['wsubmit']))
	{
		$m_id=$_POST['match_id'];
		$winner_name=$_POST['winner_submit'];
		$qry5="SELECT * FROM `team` WHERE t_name='$winner_name'";
		$run5=mysqli_query($conn,$qry5);
		$data5=mysqli_fetch_array($run5);
		$win_id=$data5['t_id'];
		$qry4="UPDATE cricket.match SET winner='$win_id' where m_id=$m_id";
		$run4=mysqli_query($conn,$qry4);
	}
	
	//for delete the match
	if(isset($_POST['delete_match']))
	{
		$m_id=$_POST['match_id'];
		
		$qry6="DELETE FROM cricket.match where m_id=$m_id";
		$run6=mysqli_query($conn,$qry6);
	}
?>	

<?php
//redirection in another page after successful login
 error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include("dbcon.php");
	session_start();
	$to_id=$_SESSION['to_id'];
		
		
	//fetching admin created matches
	$qry1="SELECT * FROM `match` WHERE to_id=$to_id";
		$run1=mysqli_query($conn,$qry1);
		//$data1=mysqli_fetch_array($run1);
	
		
?>


<html>
<head>
    <title>Admin Matches View </title>
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
		.delete_button
        {
            width:100px;
            height: 30px;
           //border-radius: 15px;
            //margin: 28px;
			//margin-left:10px;
            //float:left;
			margin-top:-55px;
			
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
                <th>Winner</th>
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
                <td>
				<?php
					//checking winner is declaired or not
					include("dbcon.php");
					$m_id=$row['m_id'];
					$q="SELECT * FROM `match` WHERE winner is null and m_id=$m_id";
					$r=mysqli_query($conn,$q);
					$d=mysqli_num_rows($r);
					if($d==1)
					{
				?>
				
				<form name="winner_submit" method="post" action="admin_matches_view.php" >
				<select name="winner_submit">
					 <option name="team1">Select Winner</option>
                    <option name="team1"><?php echo $data2['t_name'] ;?> </option>     <option name="team2"><?php echo $data3['t_name'] ;?></option>
    
                    </select>
					<input type="submit" name="wsubmit">
					<p><input type="text" name="match_id" placeholder="match ID" value=<?php echo $row['m_id'];?> size="3"></p>
                    <input type="submit" name="delete_match" class="delete_button" value="Delete Match"></input>
					
				</form>
				<?php
					}
					else
					{
						$q="SELECT * FROM `match` WHERE m_id=$m_id";
						$r=mysqli_query($conn,$q);
						$d=mysqli_fetch_array($r);
						$T_id= $d['winner'];
						$qry4="SELECT * FROM `team` WHERE t_id=$T_id";
						$run4=mysqli_query($conn,$qry4);
						$data4=mysqli_fetch_array($run4);
						echo "Winner is:"?><b style="color:#cdf54c;font-size:1.3em"><?php echo $data4['t_name'];?></b><?php
					}
				?>
                </td>
            </tr>
			<?php }?>
        </table>
		<a href="admin_view.php">	<button>Back</button> </a>
        
        </body>
</html> 

