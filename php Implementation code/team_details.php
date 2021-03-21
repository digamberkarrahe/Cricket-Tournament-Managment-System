
<?php
//for updating participation table in database
include("dbcon.php");
	session_start();
	
		$aid=$_SESSION['Team_ID'];
		
	if(isset($_POST['submit'])){
		$to_name=$_POST['tournament'];
		$qry1="SELECT `to_id`FROM `tournament` WHERE to_name='$to_name'";
		$run1=mysqli_query($conn,$qry1);
		$data=mysqli_fetch_assoc($run1);
		$to_id=$data['to_id'];
		
		$qry2="INSERT INTO `participation`(`t_id`, `to_id`) VALUES ($aid,$to_id)";
		$run2=mysqli_query($conn,$qry2);
		
		
	}
	
	//from team_player_selection
	if(isset($_POST['TMsubmit'])){
		$qrytp="UPDATE `player` SET `playing`='yes' WHERE `t_id`=$aid";
		$runtp=mysqli_query($conn,$qrytp);
	}
		
		

?>



<?php
//redirection in another page after successful login
 error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include("dbcon.php");
	session_start();
	
		$aid=$_SESSION['Team_ID'];
		$qry="SELECT * FROM `team` WHERE t_id=$aid";
		$run=mysqli_query($conn,$qry);
		$data=mysqli_fetch_assoc($run);
?>
<html>
<head>
<title>Team datails page </title>
<link rel="stylesheet" type="text/css" href="homecss.css"> 
<style>

.form1
        {
            line-height: 47px;
        }
.box
        {
            //margin-right: 700px;
            width: 700px;
            height: 520px;
           background-image: url(i4.jpg);
           background-size:cover;
           background-position:bottom;
           margin-left: 420px;
            //margin-right: 0px;
           margin-top: 40px;
           border-radius: 15px;
           color:#93F28C;
           border:3px solid #7073CE;
           border-style:outset;
		   font-size:32px;
        
           
           
        }
		p.c1
		{
			text-align:center;
			font-size:1.5em;
			color:red;
		}	
		
	.c2
    {
        margin: 20 10 0 290;
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
		
		.leftsplit{
	
	height:130%;
	width:30%;
	position:fixed;
	z-index:1;
	top:0;
	margin-top:-50px;
	overflow:hidden;
	margin-left:50px;
	left:0;
}	

.profile_photo{
            width: 200px;
            height: 200px;
            //position:relative;
            //padding: 0 0 0 0;
            margin-top:2px;
            margin-left:30px;
            //left:50 ;
            border-radius: 200px;
            border:2px solid white;
            
            }
	
			
</style>		
</head>
<body>

	<div class="box">
        <form class="form1">
            <p class="c1">Team details are:</p>
			Team ID: <b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['t_id']; ?></b><p></p>
            Team Name :<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['t_name']; ?></b><p></p>
			Manager Name :<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['t_mgr_name']; ?></b><p></p>
           Coach Name:<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['t_c']; ?></b><p></p>
           E-mail id: <b style="color:#cdf54c;font-size:1.3em"><?php  echo $data['email']; ?></b><p></p>
        Phone No.:<b style="color:#cdf54c;font-size:1.3em"> <?php  echo $data['phone']; ?></b><p></p>
            
                 
        </form>    
        </div>
	
<div class="leftsplit">
 <br><br><br><br>
		 <img src="<?php echo "image/".$data['img']; ?>" class="profile_photo" ><br><br>
	<a href="team_tournament_register.php"><button>Register to tournament</button></a>
	<br><br>
	<a href="joined_tournament_list.php"><button>Joined Tournament List</button></a>
	<br><br>
	
	<a href="team_player_selection.php"><button>Select Players For Team</button></a>
	<br><br>
	<a href="selected_player.php"><button>Players In Team</button></a>
	<br><br>
	<a href="matches_of_team.php"><button>Matches schedule</button></a>
	<br><br>
	<a href="logged_out.php"><button>LogOut</button></a>
	<br><br>
    
</div>







</body>











</html>