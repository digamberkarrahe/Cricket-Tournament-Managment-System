<?php 
	include("dbcon.php");
	session_start();
	$org_id=$_SESSION['Admin_ID'];
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$qry="SELECT p.t_id FROM organiser AS o ,tournament as tor ,participation as p where o.org_id=tor.org_id and tor.to_id=p.to_id and o.org_id=$org_id";
	$run=mysqli_query($conn,$qry);
	
?>



<html>
<head>
    <title>Admin team list </title>
    <link rel="stylesheet" type="text/css" href="homecss.css"> 
    <style>
        .box
        {
            //margin-right: 700px;
            width: 560px;
            height: 830px;
           background-image: url(i4.jpg);
           background-size:cover;
           background-position:bottom;
           margin-left: auto;
            margin-right: auto;
           margin-top: 20px;
           border-radius: 15px;
           color:#93F28C;
		   color:white;
           border:3px solid #7073CE;
           border-style:outset;
		   font-size:32px;
            //line-height: 54px;
            
           
           
        }
        p
        {
            margin: 20 0 10 35;
            border: 2px solid black;
            border-radius: 20px;
            width: 450px;
            font-size: 24px;
            float: left;
            height: 35px;
			    background-color:coral;
            
        }
        .each_team
        {
            height: 68px;
            
        }
        button
        {
            width:150px;
            height: 40px;
            border: 2px solid black;
            border-radius: 15px;
            margin: 28px;
			margin-left:200px;
            //float:left;
        }
        .logodiv
        {
            float: left;
            width:100px;
            height: 530px;
            margin-top: 40px;
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
            width: 75px;
            margin-bottom: 15px;
            
        }
        .right_symbol
		 {
			 margin-top:30px;
			 height:33px;
			 margin-left:30px;
            width: 30px;
           // margin-bottom: 15px;
            
        }
        
    </style>
</head>
    <body>
        <div class="heading">Participated Team's List</div>
		 <div class="logodiv">
		<?php 
		 //for right symbol
				  
			 while($prow=mysqli_fetch_array($run))
			 {
				
				 
				 
				 include("dbcon.php");
				 $team=$prow['t_id'];
				 $q1="SELECT `t_name`, `t_mgr_name`, `img` FROM `team` where t_id= $team";
				 $r1=mysqli_query($conn,$q1);
				  while($trow=mysqli_fetch_array($r1))
					{ ?>
						
					<img class="avatar" src="<?php echo "image/".$trow['img']; ?>">
					
					
				
				<?php
						
					}
			 }
		?>
       </div>
	  
         <div class="box">
		  <?php include("dbcon.php");
		  $qr="SELECT * FROM `participation`";
		  $rr=mysqli_query($conn,$qr);
		  $run=mysqli_query($conn,$qry);
			 while($prow=mysqli_fetch_array($run))
			 {
				 
				 
				 $team=$prow['t_id'];
				 $q1="SELECT `t_name`, `t_mgr_name`, `img` FROM `team` where t_id= $team";
				 $r1=mysqli_query($conn,$q1);
				  while($trow=mysqli_fetch_array($r1))
					{ ?>
						
					<div class="each_team"><center><p><?php echo $trow['t_name'];  ?> </p></center>
					<!--	<button>View Players</button></div> -->
					
					
				
				<?php
						
					}
			 }
		?>
						
					<?php while($tr=mysqli_fetch_array($rr))
					{ 
						$win=$tr['match_win'];  ?>
						
					
					<?php if($win=='yes'){?><img class="right_symbol" src="image/right.png"><?php } ?>
					
				
				<?php
						
					}
			 
		?>		  
	</div> 
<a href="admin_view.php">	<button>Back</button> </a>
            
                
        
        
        
    </body>
</html>    