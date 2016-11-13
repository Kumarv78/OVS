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
<?php

$user=$_SESSION['student_id'];
      //$branch=$_SESSION['branch'];
     //$name=$_SESSION['name'];
      if(!isset($user))
            header("location:home.php");
      $q="select name from admin where id='$user'";
      $res=mysqli_query($con,$q);
      if(!$res)
            die(mysqli_error($con));
      $res=mysqli_fetch_array($res);
      $username=$res['name'];
?>
  <body>
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
      <li><a href="#"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
    </ul>
  </div>
  </nav>
  </div>
  </div>
 
  
  
  <div class="row">
  <div class="col-md-12">
  <table class="table table-hover table-bordered">
  <caption><h2>Schedule of all activties</h2></caption>
  <thead>
	<tr>
		<th>S.No</th>
		<th>Programme</th>
		<th>Date</th>
		<th>Timing</th>
	</tr>
</thead>
<tbody>
	<tr>
		<td>1.</td>
		<td>Date of Nomination for Election</td>
		<td>dd/mm/yyyy</td>
		<td>FROM    AM to    PM </td>
	</tr>
	<tr>
		<td>2.</td>
		<td>List of candidates publised</td>
		<td>dd/mm/yyyy</td>
		<td>FROM    AM to    PM </td>
	</tr>
	<tr>
		<td>3.</td>
		<td>Withdrawal of Nomination</td>
		<td>dd/mm/yyyy</td>
		<td>FROM    AM to    PM </td>
	</tr>
	<tr>
		<td>4.</td>
		<td>Declaration of final list of candidates</td>
		<td>dd/mm/yyyy</td>
		<td>FROM    AM to    PM </td>
	</tr>
	<tr>
		<td>5.</td>
		<td>Voting</td>
		<td>dd/mm/yyyy</td>
		<td>FROM    AM to    PM </td>
	</tr>
	<tr>
		<td>6.</td>
		<td>counting and Declaration of Result</td>
		<td>dd/mm/yyyy</td>
		<td>FROM    AM to    PM </td>
	</tr>
     </tbody>
 </div>
 </div>

  <!--<div class="row">
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
  </div> -->

</div>

 </body>
</html>
