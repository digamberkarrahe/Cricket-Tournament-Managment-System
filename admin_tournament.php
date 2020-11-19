<html>
<head>
    <title>admin create tournament page </title>
    <link rel="stylesheet" type="text/css" href="homecss.css"> 
    <style>
       
        .login-box
        {
           margin-top: 0px;
            width: 400px;
            margin-left: 450px;
            height: 670px;
            margin-right: 00px;
            
        }
        .form1
        {
            line-height: 35px;
        }
        .login-box input[type="submit"]
        {
            margin: 10 50 10 120;
        }
        .box
        {
            //margin-right: 700px;
            width: 300px;
            height: 350px;
           background-image: url(i4.jpg);
           background-size:cover;
           background-position:bottom;
           margin-left: 800px;
            margin-right: 0px;
           margin-top: -400px;
           border-radius: 15px;
           color:#93F28C;
           border:3px solid #7073CE;
           border-style:outset;
        
           
           
        }
		
		  button
    {
        font-size: 25px;
        width: 120px;
        height: 40px;
        color: black;
        //background-color:#93F28C;
        font-family: cursive;
        border-radius: 7px;
        margin-left:590px; 
    }
    button:hover
    {
        background-color:#93F28C;
    }
    </style>
</head>
    <body>
	<a href="admin_details.php"><button>Back</button></a>	
        <div style="text-align: center; width: 400px;margin:40 00 30 450; font-size: 30px;color:#93F28C;color:#cdf54c ">Enter Tournament Details: </div>
        <div class="login-box">
        <form class="form1" method="POST">
            Tournament Name
            <input type="text" name="Tournament_Name" placeholder="Enter Tournament Name" required>
            Tournament Type
            <input type="text" name="Tournament_Type" placeholder="Enter Tournament Type">
            Tournament Start Date
            <input type="date" name="Tournament_Start_Date" placeholder="Enter Tournament Start Date">
            Tournament End Date
            <input type="date" name="Tournament_End_Date" placeholder="Enter Tournament End Date">
            Venues1
            <input type=text name="Venues1" placeholder="Enter Venues">
			Venues2
            <input type=text name="Venues2" placeholder="Enter Venues">
			Venues3
            <input type=text name="Venues3" placeholder="Enter Venues">
			Venues4
            <input type=text name="Venues4" placeholder="Enter Venues">
			
            <input type="submit" name="submit" value="Submit"> 
			
			
        </form>    
        </div> 
		
    </body>
</html>
 

<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
	session_start();
	include("dbcon.php");
	session_start();
	
	
		$to_name=$_POST['Tournament_Name'];
		$to_type=$_POST['Tournament_Type'];
		$to_sdate=$_POST['Tournament_Start_Date'];
		$to_edate=$_POST['Tournament_End_Date'];
		$venue1=$_POST['Venues1'];
		$venue2=$_POST['Venues2'];
		$venue3=$_POST['Venues3'];
		$venue4=$_POST['Venues4'];
		$aid=$_SESSION['Admin_ID'];
		if(isset($_POST['submit']))
		{
			
			$qry="INSERT INTO `tournament`( `to_name`, `to_type`, `to_s_date`, `to_e_date`, `org_id`) VALUES ('$to_name','$to_type','$to_sdate','$to_edate',$aid)";
			$run=mysqli_query($conn,$qry);
			$get_to_id="select to_id from tournament where org_id=$aid";
			$run1=mysqli_query($conn,$get_to_id);
			$data=mysqli_fetch_assoc($run1);
			$to_ID=$data['to_id'];
			$v1="INSERT INTO `venues`(`to_id`, `venue`) VALUES ($to_ID,'$venue1')";
			$run2=mysqli_query($conn,$v1);
			$v2="INSERT INTO `venues`(`to_id`, `venue`) VALUES ($to_ID,'$venue2')";
			$run2=mysqli_query($conn,$v2);
			$v3="INSERT INTO `venues`(`to_id`, `venue`) VALUES ($to_ID,'$venue3')";
			$run2=mysqli_query($conn,$v3);
			$v4="INSERT INTO `venues`(`to_id`, `venue`) VALUES ($to_ID,'$venue4')";
			$run2=mysqli_query($conn,$v4);
			header('Location:admin_view.php');
								exit;
		}
		
?>	