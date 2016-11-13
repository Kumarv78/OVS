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
      <li ><a href="mhom.html">Home</a></li>
      <li class="active"><a href="#">Vote</a></li>
      <li><a href="#">Nominees</a></li> 
	  <li><a href="#">Results</a></li> 
      <li><a href="#">Rules And Regulations</a></li> 
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
        
       <!-- <label><input type="radio" name="vp" >Vijay</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="vp">Harish</label>
        </div>
		<div class="radio">
        <label><input type="radio" name="vp">Rahul</label>
        </div>
		 <div class="radio">
        <label><input type="radio" name="vp">Nitesh</label>
        </div>-->
				<select name='vp'>
				<div class="radio">
				<?php 
				$q="select name from CSA where post='Vice President'";
				$r=mysqli_query($con,$q);
				if(!$r)
					die(mysqli_error($con));
				while($r=mysqli_fetch_array($r))
					echo "<option>".$r['name']."</option>";			
				?>
				
        </div>
		</select>
		<h2 class="text-warning">Academic Secretary</h2>
	<!--	<div class="radio">
        <label><input type="radio" name="as">Vijay</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="as">Harish</label>
        </div>
		<div class="radio">
        <label><input type="radio" name="as">Rahul</label>
        </div>
		 <div class="radio">
        <label><input type="radio" name="as">Nitesh</label>
        </div>-->
					<select name='as'>
				<div class="radio">
				<?php 
				$q="select name from CSA where post='Academic Secretary'";
				$r=mysqli_query($con,$q);
				if(!$r)
					die(mysqli_error($con));
				while($r=mysqli_fetch_array($r))
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		
		<h2 class="text-warning">Sports Secretary</h2>
	<!--	<div class="radio">
        <label><input type="radio" name="ss">Vijay</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="ss">Harish</label>
        </div>
		<div class="radio">
        <label><input type="radio" name="ss">Rahul</label>
        </div>
		 <div class="radio">
        <label><input type="radio" name="ss">Nitesh</label>
        </div>-->
					<select name='ss'>
				<div class="radio">
				<?php 
				$q="select name from CSA where post='Sports Secretary'";
				$r=mysqli_query($con,$q);
				if(!$r)
					die(mysqli_error($con));
				while($r=mysqli_fetch_array($r))			
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		
		<h2 class="text-warning">Joint Treasurer</h2>
		<!--<div class="radio">
        <label><input type="radio" name="jt">Vijay</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="jt">Harish</label>
        </div>
		<div class="radio">
        <label><input type="radio" name="jt">Rahul</label>
        </div>
		 <div class="radio">
        <label><input type="radio" name="jt">Nitesh</label>
        </div>-->
					<select name='jt'>
				<div class="radio">
				<?php 
				$q="select name from CSA where post='Joint Treasurer'";
				$r=mysqli_query($con,$q);
				if(!$r)
					die(mysqli_error($con));
				while($r=mysqli_fetch_array($r))		
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		
		<h2 class="text-warning">Cultural Secretary</h2>
		<!--<div class="radio">
        <label><input type="radio" name="cs">Vijay</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="cs">Harish</label>
        </div>
		<div class="radio">
        <label><input type="radio" name="cs">Rahul</label>
        </div>
		 <div class="radio">
        <label><input type="radio" name="cs">Nitesh</label>
        </div>-->
			<select name='cs'>
				<div class="radio">
				<?php 
				$q="select name from CSA where post='Cultural Secretary'";
				$r=mysqli_query($con,$q);
				if(!$r)
					die(mysqli_error($con));
				while($r=mysqli_fetch_array($r))		
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		<!--<h2 class="text-warning">Hostel Secretary</h2>
		<div class="radio">
        <label><input type="radio" name="hs">Vijay</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="hs">Harish</label>
        </div>
		<div class="radio">
        <label><input type="radio" name="hs">Rahul</label>
        </div>
		 <div class="radio">
        <label><input type="radio" name="hs">Nitesh</label>
        </div>
	    
		<h2 class="text-warning">Technical Secretary</h2>
        <div class="radio">
        <label><input type="radio" name="ts">Vijay</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="ts">Harish</label>
        </div>
		<div class="radio">
        <label><input type="radio" name="ts">Rahul</label>
        </div>
		 <div class="radio">
        <label><input type="radio" name="ts">Nitesh</label>
        </div>
		 
		 <!--<input type="submit" value ="Submit" id="votecse"></input>
  </form>
  </div>
  
  </div>
	
	
	
  <div class="row">
  <center>
  <h1 class="text-success"><u>Department Of CSE</u></h1>
  </center>
  <center>
  <h1 class="text-info"><u>DSSA</u></h1>
  </center>
  <div class="col-md-4"></div>
  <div class="col-md-8">
  
 <!-- <form class="form-horizontal" role="form" action="cse.php" method="post">
          <h2 class="text-warning">General Secretary</h2>
        <div class="radio">
        <label><input type="radio" name="gs">Vijay</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="gs">Harish</label>
        </div>
		<div class="radio">
        <label><input type="radio" name="gs">Rahul</label>
        </div>
		 <div class="radio">
        <label><input type="radio" name="gs">Nitesh</label>
        </div>
		
		 <h2 class="text-warning">Technical Secretary</h2>
        <div class="radio">
        <label><input type="radio" name="ts1">Vijay</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="ts1">Harish</label>
        </div>
		<div class="radio">
        <label><input type="radio" name="ts">Rahul</label>
        </div>
		 <div class="radio">
        <label><input type="radio" name="ts">Nitesh</label>
        </div>
		 
		  <h2 class="text-warning">Sports Secretary</h2>
        <div class="radio">
        <label><input type="radio" name="ss1">Vijay</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="ss1">Harish</label>
        </div>
		<div class="radio">
        <label><input type="radio" name="ss1">Rahul</label>
        </div>
		 <div class="radio">
        <label><input type="radio" name="ss1">Nitesh</label>
        </div>
		
		  <h2 class="text-warning">Cultural Secretary</h2>
        <div class="radio">
        <label><input type="radio" name="cs1">Vijay</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="cs1">Harish</label>
        </div>
		<div class="radio">
        <label><input type="radio" name="cs1">Rahul</label>
        </div>
		 <div class="radio">
        <label><input type="radio" name="cs1">Nitesh</label>
        </div>
		
		  <h2 class="text-warning">Joint Treasrure</h2>
        <div class="radio">
        <label><input type="radio" name="jt1">Vijay</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="jt1">Harish</label>
        </div>
		<div class="radio">
        <label><input type="radio" name="jt1">Rahul</label>
        </div>
		 <div class="radio">
        <label><input type="radio" name="jt1">Nitesh</label>
        </div>-->
		<!--
		<h2 class="text-warning">Academic Secretary</h2>
        <div class="radio">
        <label><input type="radio" name="as">Vijay</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="as">Harish</label>
        </div>
		<div class="radio">
        <label><input type="radio" name="as">Rahul</label>
        </div>
		 <div class="radio">
        <label><input type="radio" name="as">Nitesh</label>
        </div>-->
					<h2 class="text-warning">Hostel Secretary</h2>
		<select name='hs'>
				<div class="radio">
				<?php 
				$q="select name from CSA where post='Hostel Secretary'";
				$r=mysqli_query($con,$q);
				if(!$r)
					die(mysqli_error($con));
				while($r=mysqli_fetch_array($r))					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		<h2 class="text-warning">Technical Secretary</h2>
        <select name='ts'>
				<div class="radio">
				<?php 
				$q="select name from CSA where post='Technical Secretary'";
				$r=mysqli_query($con,$q);
				if(!$r)
					die(mysqli_error($con));
				while($r=mysqli_fetch_array($r))		
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		 
		 <!--<input type="submit" value ="Submit" id="votecse"></input>
  </form>-->
  </div>
  
  </div>
	
	
	
  <div class="row">
  <center>
  <h1 class="text-success"><u>Department Of CSE</u></h1>
  </center>
  <center>
  <h1 class="text-info"><u>DSSA</u></h1>
  </center>
  <div class="col-md-4"></div>
  <div class="col-md-8">
  
 <!-- <form class="form-horizontal" role="form" action="cse.php" method="post">-->
          <h2 class="text-warning">General Secretary</h2>
       <select name='gs'>
				<div class="radio">
				<?php 
				$q="select name from CSE where post='General Secretary'";
				$r=mysqli_query($con,$q);
				if(!$r)
					die(mysqli_error($con));
				while($r=mysqli_fetch_array($r))		
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		 <h2 class="text-warning">Technical Secretary</h2>
        <select name='ts1'>
				<div class="radio">
				<?php 
				$q="select name from CSE where post='Technical Secretary'";
				$r=mysqli_query($con,$q);
				if(!$r)
					die(mysqli_error($con));
				while($r=mysqli_fetch_array($r))					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		 
		  <h2 class="text-warning">Sports Secretary</h2>
        <select name='ss1'>
				<div class="radio">
				<?php 
				$q="select name from CSE where post='Sports Secretary'";
				$r=mysqli_query($con,$q);
				if(!$r)
					die(mysqli_error($con));
				while($r=mysqli_fetch_array($r))			
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		
		  <h2 class="text-warning">Cultural Secretary</h2>
        <select name='cs1'>
				<div class="radio">
				<?php 
				$q="select name from CSE where post='Cultural Secretary'";
				$r=mysqli_query($con,$q);
				if(!$r)
					die(mysqli_error($con));
				while($r=mysqli_fetch_array($r))			
					echo "<option>".$r['name']."</option>";		
				?>
				
        </div>
		</select>
		
		  <h2 class="text-warning">Joint Treasurer</h2>
        <select name='jt1'>
				<div class="radio">
				<?php 
				$q="select name from CSE where post='Joint Treasurer'";
				$r=mysqli_query($con,$q);
				if(!$r)
					die(mysqli_error($con));
				while($r=mysqli_fetch_array($r))			
					echo "<option>".$r['name']."</option>";		
				mysqli_close($con);
				?>
				
        </div>
		</select>
		<br /><br />
		 <input type="submit" value ="Submit" id="votecse"/>
		 <br /><br />
  </form>
  </div>
  
  </div>
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