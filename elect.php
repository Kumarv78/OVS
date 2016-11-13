<?php
session_start();
//require('session.php');

include_once 'connection.php';

?>
<!DOCTYPE html>

<html>
<head> 
<title>NITUK OVS</title> 
<meta name="viewport" content="width=device-width, initial-scale=1.0  "> 
<link rel="icon" type="image/png/jpg/jpeg" href="images/nk.jpg">
<!-- Bootstrap --> 
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="mhom.css"> 
 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<script src="bootstrap/js/jquery.js" type="text/javascript"></script>
 <script src="bootstrap/js/bootstrap.min.js"type="text/javascript"></script>
<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
  }
  </style>
</head>
<body>

<?php

$user=$_SESSION['student_id'];
$branch=$_SESSION['branch'];
if(!$user)
	header("location:home.php");
$q="select v_status from sign_up where student_id=$user";
	$r=mysqli_query($con,$q);
	$msg;
	if(!$r)
		die(mysqli_error($con));
	$r=mysqli_fetch_array($r);
	if(!$r)
		die(mysqli_error($con));
	if($r['v_status']==1)
		header('location:mhom.php');
$q="select vname from sign_up where student_id='$user'";
$res=mysqli_query($con,$q);
if(!$res)
	die(mysqli_error($con));
$res=mysqli_fetch_array($res);
$username=$res['vname'];

?>
  <div class="container">
  <div class="row">
  
  <div class="col-md-7">
  <img id="img1" src='images/mhom2.png' class="img-responsive"></img>

  </div>
  <div class="col-md-3	">
       
  </div>
  <div class="col-md-2">
  <img id="img1" src='images/nk.jpg' class="img-responsive"></img>
  </div>
  
  </div>
  <div class="row">
  <div class="col-md-12" >
  <nav class="navbar navbar-inverse navbar-static" id="dd">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">NITUK OVS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="mhom.php">Home</a></li>
     
      <li><a href="nominees.php">Nominees</a></li> 
	  <li><a href="shedule.php">Schedule</a></li> 
      <li><a href="rules.php">Rules And Regulations</a></li> 
      <li><a href="#">How To Vote</a></li> 
      <li><a href="#">Help</a></li> 
      <li><a href="#">About OVS</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $username;?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
    </ul>
  </div>
  </nav>
  </div>
  </div>
	
	
	<div class="row">
  <center>
  <h1 class="text-info"><u>CSA</u></h1>
  </center>
  <div class="col-md-4"></div>
  <div class="col-md-8">
  
  <form class="form-horizontal" role="form" action="voting.php" method="post">
        <h4 class="text-danger">Elect a candidate for a post and click on submit button after electing all.</h4>
        <h2 class="text-warning">Vice President</h2>
        

				<select name='vp'>
				
				<?php 
				$q="select name from CSA where post='Vice President'";
				$res=mysqli_query($con,$q) or die(mysqli_error($con));
				
				while($r=mysqli_fetch_array($res))
                        {
                              echo $r['name'];
                              echo "<option>".$r['name']."</option>";	
                        }                              
				?>
				
       
		</select>
		<h2 class="text-warning">Academic Secretary</h2>
					<select name='as'>
				<div >
				<?php 
				$q="select name from CSA where post='Academic Secretary'";
				$res=mysqli_query($con,$q) or die(mysqli_error($con));
				while($r=mysqli_fetch_array($res))
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		
		<h2 class="text-warning">Sports Secretary</h2>
					<select name='ss'>
				<div >
				<?php 
				$q="select name from CSA where post='Sports Secretary'";
				$res=mysqli_query($con,$q) or die(mysqli_error($con));
				while($r=mysqli_fetch_array($res))			
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		
		<h2 class="text-warning">Joint Treasurer</h2>
					<select name='jt'>
				<div class="radio">
				<?php 
				$q="select name from CSA where post='Joint Treasurer'";
				$res=mysqli_query($con,$q) or die(mysqli_error($con));
				while($r=mysqli_fetch_array($res))		
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		
		<h2 class="text-warning">Cultural Secretary</h2>
			<select name='cs'>
				<div >
				<?php 
				$q="select name from CSA where post='Cultural Secretary'";
				$res=mysqli_query($con,$q) or die(mysqli_error($con));
				while($r=mysqli_fetch_array($res))		
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
					<h2 class="text-warning">Hostel Secretary</h2>
		<select name='hs'>
				<div class="radio">
				<?php 
				$q="select name from CSA where post='Hostel Secretary'";
				$res=mysqli_query($con,$q) or die(mysqli_error($con));
				while($r=mysqli_fetch_array($res))	
                              echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		<h2 class="text-warning">Technical Secretary</h2>
        <select name='ts'>
				<div >
				<?php 
				$q="select name from CSA where post='Technical Secretary'";
				$res=mysqli_query($con,$q) or die(mysqli_error($con));
				while($r=mysqli_fetch_array($res))		
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		 <h2 class="text-warning">Batch Representative</h2>
        <select name='br'>
				<div >
				<?php 
				$q="select name from CSA where post='Batch Representative'";
				$res=mysqli_query($con,$q) or die(mysqli_error($con));
				while($r=mysqli_fetch_array($res))		
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
            
		 <!--<input type="submit" value ="Submit" id="votecse"></input>
  </form>-->
 
	
	
	
  <!--<div class="row">-->

  <h1 class="text-success"><u>Department Of <?php echo $branch;?></u></h1>

  <h1 class="text-info"><u>DSSA</u></h1>
 
  <!--<div class="col-md-4"></div>
  <div class="col-md-8">
  
 <!-- <form class="form-horizontal" role="form" action="cse.php" method="post">-->
          <h2 class="text-warning">General Secretary</h2>
       <select name='gs'>
				<div >
				<?php 
				$q="select name from $branch where post='General Secretary'";
				$res=mysqli_query($con,$q) or die(mysqli_error($con));
				while($r=mysqli_fetch_array($res))		
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		 <h2 class="text-warning">Technical Secretary</h2>
        <select name='ts1'>
				<div >
				<?php 
				$q="select name from $branch where post='Technical Secretary'";
				$res=mysqli_query($con,$q) or die(mysqli_error($con));
				while($r=mysqli_fetch_array($res))					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		 
		  <h2 class="text-warning">Sports Secretary</h2>
        <select name='ss1'>
				<div >
				<?php 
				$q="select name from $branch where post='Sports Secretary'";
				$res=mysqli_query($con,$q) or die(mysqli_error($con));
				while($r=mysqli_fetch_array($res))			
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		
		  <h2 class="text-warning">Cultural Secretary</h2>
        <select name='cs1'>
				<div >
				<?php 
				$q="select name from $branch where post='Cultural Secretary'";
				$res=mysqli_query($con,$q) or die(mysqli_error($con));
				while($r=mysqli_fetch_array($res))			
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		
	 	  <h2 class="text-warning">Joint Treasurer</h2>
        <select name='jt1'>
				<div >
				<?php 
				$q="select name from $branch where post='Joint Treasurer'";
				$res=mysqli_query($con,$q) or die(mysqli_error($con));
				while($r=mysqli_fetch_array($res))			
					echo "<option>".$r['name']."</option>";		
				
				?>
				
        </div>
      
		</select>
           <h2 class="text-warning">Branch Representative</h2>
            <select name='brr'>
				<div >
				<?php 
				$q="select name from $branch where post='Branch Representative'";
				$res=mysqli_query($con,$q) or die(mysqli_error($con));
				while($r=mysqli_fetch_array($res))			
					echo "<option>".$r['name']."</option>";		
				
				?>
				
        </div>
        
		</select>	
            <br /><br />
		 <input type="submit" value ="Submit" id="votecse"/>
	<br /><br /><br />
  </form>
  </div>
  
  </div>
<br /><br /><br /><br /><br />
	  <div class="row">
  <div class="col-md-12">
  
     <footer class="footer" >
      <div class="container">
	  <center><a href="" style="color:white;">Powered By: Department of Computer Science and Engineering</a></br>
			  <a href="" style="color:silver;">	               
							   &copy; All Right Reserved. National Institute of Technology, Uttarakhand </br>
				               Site Best View:  Google Chrome: 22& above, Firefox: 25 & above</a>
				</center>

      </div>
    </footer>    
  </div>
  </div> 
  </div>
</body>
</html>