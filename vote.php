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
 //$branch=strtolower($branch);
if(!$branch)
	echo 'Branch is null';
if(!isset($user))
	header("location:Home.php");
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
$msg="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
/*if(isset($_POST['civ']))
{
	
	header('location:'$branch'.php');
}
else if(isset($_POST['cse']))
{
	header('location:$branch.php');
}
else if(isset($_POST['ece']))
{
	header('location:$branch.php');
}
else if(isset($_POST['eee']))
{
	header('location:$branch.php');
}
else
{
	header('location:$branch.php');
}*/
if(isset($_POST['branch']))
{
	$b=$_POST['branch'];
if($branch==$b && $b=="CSE")
	header('location:elect.php');
else if($branch=='CIV' && $b=='CIV')
	header('location:elect.php');
else if($branch=='ECE' && $b=='ECE')
	header('location:elect.php');
else if($branch=='EEE' && $b=='EEE')
	header('location:elect.php');
else if($branch=='MECH' && $b=='MECH')
	header('location:elect.php');
else 
	$msg='*Please choose your branch.We know what is your branch.Don\'t try to vote in other department.';
}
else
	$msg="*Plese select a branch.";
}
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
      <li ><a href="mhom.php">Home</a></li>
      <li class="active"><a href="vote.php">Vote</a></li>
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
    <div class="col-md-5">
  <h1 class="text-success">Just A One step ahead </h1>
  
  </div>
  <div class="col-md-7">
  <h1 class="text-info">Choose your branch </h1>
	<?php echo $msg;?>
  <form class="form-horizontal" name="brenchform" role="form" action="<?php $_PHP_SELF;?>" method="POST">
        <!--<div class="radio">
        <label><input type="radio" name="branch" onclick="location.href='civ.php'" value="civ">CIV</label>
        </div>
        <div class="radio">
        <label><input type="radio" name="branch" onclick="location.href='cse.php'">CSE</label>
        </div>
		<div class="radio">
        <label><input type="radio" name="branch" onclick="location.href='mech.php'">MECH</label>
        </div>
		 <div class="radio">
        <label><input type="radio"  name="branch" onclick="location.href='ece.php'">ECE</label>
        </div>
		 <div class="radio">
        <label><input type="radio" name="branch" onclick="location.href='eee.php'">EEE</label>
        </div>-->
				<div class="radio">
        <select name="branch">
				<option>CIV</option>
				<option>CSE</option>
				<option>ECE</option>
				<option>EEE</option>
				<option>MECH</option>
        </div>
       <!-- <div class="radio">
        <label><input type="radio" name="cse" >CSE</label>
        </div>
		<div class="radio">
        <label><input type="radio" name="mech" >MECH</label>
        </div>
		 <div class="radio">
        <label><input type="radio"  name="ece" >ECE</label>
        </div>
		 <div class="radio">
        <label><input type="radio" name="eee" >EEE</label>
        </div>-->
		<input type="submit" value ="Submit" name='submit' id="ipbranch" />
  </form>
  </div>
  </div>
    </div>
  
 
</body>
</html>