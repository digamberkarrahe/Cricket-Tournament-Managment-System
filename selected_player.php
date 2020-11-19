<?php
	include("dbcon.php");
	session_start();
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$tid=$_SESSION['Team_ID'];
	
	$qry="SELECT * FROM `player` WHERE t_id=$tid AND playing='yes'";
	$run=mysqli_query($conn,$qry);
	
	$qry1="SELECT * FROM `team` WHERE t_id=$tid";
	$run1=mysqli_query($conn,$qry1);
	$data=mysqli_fetch_array($run1);

	
?>
 




<html>
<head>
    <title>Admin team players list </title>
    <link rel="stylesheet" type="text/css" href="homecss.css"> 
    <style>
        .avatar
        {
            width: 200px;
            float: left;
            margin-left: 30px;
			//margin-top:70px;
            position:absolute;
            border: 4px solid white;
            border-radius: 50px;
        }
        .heading
        {
            margin-left:-500px;
			margin-top:30px;
			font-size:30px;
        }
        .avatar_cap
        {
            width:140px;
            margin-left:calc(50% - 70px);
			margin-top:-80px;
            border: 4px solid #93F28C;
            border-radius: 100px;
        }
        p.cap_name
        {
            text-align: center;
            font-size: 25px;
            color: #93F28C;
            margin-top: 10px;
        }
        .avatar_p
        {
            width: 150px;
            //float: left;
            position:absolute;
            border: 4px solid #93F28C;
            border-radius: 100px;
        }
        p.players_name
        {
            color: #93F28C;
            font-size: 25px;
            margin-left: 50px;
        }
        .abc1 {
                display: none;
            position: absolute;
            color:white;
            font-size: 25px;
}

a:hover + .abc1 {
    display: block;
}
        
    
    </style>
    
</head>
<body>
    <img class="avatar" src="<?php echo "image/".$data['img']; ?>">
    <div class="heading"><?php echo $data['t_name']; ?></div>
    <br>
	 <?php $i=1;  
	while($row=mysqli_fetch_array($run))
	{
		$flag=0;
		if($i==1){?>
    <img class="avatar_cap" src="<?php echo "image/".$row['img']; ?>">
							<p class="cap_name"><?php echo $row['f_name'].'(Captain)'; }?></p> 	
	<?php if($i==2){ ?>
    <a href=""><img class="avatar_p" style="margin-left: 100px;" src="<?php echo "image/".$row['img']; ?>"></a><p  style="margin:-50 0 0 100" class="abc1"><?php echo $row['f_name'] ?></p><?php }?>
    <?php if($i==3){ ?>
	<a href=""><img class="avatar_p" style="margin-left: 360px;" src="<?php echo "image/".$row['img']; ?>"></a><p  style="margin:-50 0 0 360" class="abc1"><?php echo $row['f_name'] ?></p><?php }?>
     <?php if($i==4){ ?>
	<a href=""><img class="avatar_p" style="margin-left: 620px;" src="<?php echo "image/".$row['img']; ?>"></a><p  style="margin:-30 0 0 620" class="abc1"><?php echo $row['f_name'] ?></p><?php }?>
     <?php if($i==5){ ?>
	<a href=""><img class="avatar_p" style="margin-left: 880px;" src="<?php echo "image/".$row['img']; ?>"></a><p  style="margin:-50 0 0 880" class="abc1"><?php echo $row['f_name'] ?></p><?php }?>
     <?php if($i==6){ $flag=1; ?>
	<a href=""><img class="avatar_p" style="margin-left: 1140px;" src="<?php echo "image/".$row['img']; ?>"></a><p  style="margin:-50 0 0 1140" class="abc1"><?php echo $row['f_name'] ?></p><?php }?>
     <?php if($flag==1){ ?><br><br><br><br><br><br><?php }?>
     <?php if($i==7){ ?>
	<a href=""><img class="avatar_p" style="margin-left: 100px;" src="<?php echo "image/".$row['img']; ?>"></a><p  style="margin:-50 0 0 100" class="abc1"><?php echo $row['f_name'] ?></p><?php }?>
     <?php if($i==8){ ?>
	<a href=""><img class="avatar_p" style="margin-left: 360px;" src="<?php echo "image/".$row['img']; ?>"></a><p  style="margin:-50 0 0 360" class="abc1"><?php echo $row['f_name'] ?></p><?php }?>
     <?php if($i==9){ ?>
	<a href=""><img class="avatar_p" style="margin-left: 620px;" src="<?php echo "image/".$row['img']; ?>"></a><p  style="margin:-50 0 0 620" class="abc1"><?php echo $row['f_name'] ?></p><?php }?>
     <?php if($i==10){ ?>
	<a href=""><img class="avatar_p" style="margin-left: 880px;" src="<?php echo "image/".$row['img']; ?>"></a><p  style="margin:-50 0 0 880" class="abc1"><?php echo $row['f_name'] ?></p><?php }?>
     <?php if($i==11){ ?>
	<a href=""><img class="avatar_p" style="margin-left: 1140px;" src="<?php echo "image/".$row['img']; ?>"></a><p  style="margin:-50 0 0 1140" class="abc1"><?php echo $row['f_name'] ?></p><?php }?>    
   
					
						<?php $i++;} ?>
    
    
    </body>
</html>