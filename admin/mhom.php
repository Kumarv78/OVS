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
      width: 70%;
      margin: auto;
  }
  </style>
</head>
<body>

<?php

$user=$_SESSION['student_id'];
if(!isset($user))
	header("location:Home.php");
$q="select name from admin where id='$user'";
$res=mysqli_query($con,$q);
if(!$res)
	die(mysqli_error($con));
$res=mysqli_fetch_array($res);
$username=$res['name'];

?>


  <div class="container">
  <div class="row">
  
  <div class="col-md-8">
  <img id="img1" src='images/mhom2.png' class="img-responsive"></img>

  </div>
  <div class="col-md-2">
  
  </div>
  <div class="col-md-2">
  <img id="img1" src='images/nk.jpg' class="img-responsive"></img>
  </div>
  
  </div>
  <div class="row">
  <div class="col-md-12" >
  <nav class="navbar navbar-inverse" id="dd">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">NITUK OVS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="mhom.php">Home</a></li>
     <li><a href="adduser.php">Add a User</a></li>
      <li><a href="nominees.php">Nominees</a></li> 
	
	  <li><a href="shedule.php">Schedule</a></li> 
      <li><a href="rules.php">Rules And Regulations</a></li> 
    
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
  <div class="col-md-3">
  </br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active" >
        <img src="images/y.gif" alt="y" width="100%" height="100%">
        
      </div>

      <div class="item">
        <img src="images/w.jpg" alt="w" width="100%" height="100%">
        
      </div>
    
      <div class="item">
        <img src="images/x.jpg" alt="x" width="460" height="345">
      
      </div>

      <div class="item">
        <img src="images/vote.jpg" alt="vote" width="100%" height="100%">
      
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  </div>
  <div class="col-md-6">

  <h3 class="text-info">Welcome To National Institute of Technology  Uttarakhand Online Voting System.</h3>
  <p>
  fgbvdsfbg fshfcskjdcfhkjdf dfhdklfvnhdmvndj dxncvxncvmxnc,mx cjxmncxmcn xcxmcnxknc,xz ckndxkcj dxcdxjcdkjckdjckldnmfc dfcjdkfmcdklfd;lkjfdufietgfdrjf dfhudifiodfidjfiodfijdkfvnd jfkdfkldfkdjfiodufidnfvdnkd fijdilfjdkfndnfjdgfioufod fjdifjdi fhdiofhdif djfid fdufiodfieuiowuroiw rwerowurpowi rwirpowi ri wopriowper eprjepori ndmnfldkjifjdlkfjdofdiufd  fudif hfkjdfhbvdjkfhhhhhh dhffffiudfyuyfiuyewuryiehrf eruerueoipru nmv mdvklekpofid cx cmnchettetyeifr jsdmkfpeirpoeitiertyiuhj  fmhjiejiekjtrke fmnerieireiruioeref dfgjhdhnmgofdkojohdjfhsujhiughfhsgiufyuhdfusghfhhjkdhf dfhdkjhcdjh cdhjdfhjdhfjdhf dyufeiufisd cfdsu
  </p>
  </div>
  
  <div class="col-md-3">
  
  <a href="#" class="list-group-item active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quick Links &nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span>  </a>
   <marquee direction="up" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();"  >

  <a href="hom.php" class="list-group-item">Upcoming Elections </a>
  <a href="#" class="list-group-item">List of Nominees</a>
  <a href="#" class="list-group-item">Results of election 2015</a>
  <a href="#" class="list-group-item">Rules And Regulations</a>
  </marquee>
  </div>
  </div>
  </br>
  <div class="row">
  <div class="col-md-3">
      <div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active" >
        <img src="images/win1.jpg" alt="y" width="100%" height="100%">
        
      </div>

      <div class="item">
        <img src="images/ww.jpg" alt="w" width="100%" height="100%">
        
      </div>
    
      <div class="item">
        <img src="images/win2.jpg" alt="x" width="460" height="345">
      
      </div>

      <div class="item">
        <img src="images/wx.jpg" alt="vote" width="100%" height="100%">
      
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <h3 class="text-warning" id="hc">Last CSA Winners&nbsp;<span class="glyphicon glyphicon-hand-up"></h3>
  
  </div>
  <div class="col-md-6">
   <h3 class="text-info">Why You Should Vote</h3>
   <p>
  fgbvdsfbg fshfcskjdcfhkjdf dfhdklfvnhdmvndj dxncvxncvmxnc,mx cjxmncxmcn xcxmcnxknc,xz ckndxkcj dxcdxjcdkjckdjckldnmfc dfcjdkfmcdklfd;lkjfdufietgfdrjf dfhudifiodfidjfiodfijdkfvnd jfkdfkldfkdjfiodufidnfvdnkd fijdilfjdkfndnfjdgfioufod fjdifjdi fhdiofhdif djfid fdufiodfieuiowuroiw rwerowurpowi rwirpowi ri wopriowper eprjepori ndmnfldkjifjdlkfjdofdiufd  fudif hfkjdfhbvdjkfhhhhhh dhffffiudfyuyfiuyewuryiehrf eruerueoipru nmv mdvklekpofid cx cmnchettetyeifr jsdmkfpeirpoeitiertyiuhj  fmhjiejiekjtrke fmnerieireiruioeref dfgjhdhnmgofdkojohdjfhsujhiughfhsgiufyuhdfusghfhhjkdhf dfhdkjhcdjh cdhjdfhjdhfjdhf dyufeiufisd cfdsu
  </p>
  </div>
  
  <div class="col-md-3">
	<?php
	
		echo "<h2 class='text-warning' id='hc'>Voting is going on.&nbsp;<span class='glyphicon glyphicon-hand-down'></span> </h2><br /><a href='#'><div id='imgBox'></div><a>";
  
			?>
  </div>
  
  </div>
  
	<!--Nomination form-->
	  <div class="modal fade" id="nomform" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-plane"></span> Nomination Form</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="" method="Post">
            <div class="form-group">
              <label for="usrname"> Name of Candidate</label>
              <input type="text" name="name"class="form-control" id="usrname" placeholder="Enter your Full Name" maxlength="30" required pattern="[a-zA-z\s]+">
            </div>
			
			<div class="form-group">
              <label for="usrname"> Father's Name</label>
              <input type="text" name="fname"class="form-control" id="usrname" placeholder="Enter your Father's Name" maxlength="30" required pattern="[a-zA-z\s]+">
            </div>
            
			<div class="form-group">
              <label for="usrname"> Select your gender</label>
               <div class="radio">
              <label><input type="radio"  name="g">Male</label>
              </div>
              <div class="radio">
              <label><input type="radio" name="g">Female</label>
              </div>
            </div>
				
			<div class="form-group">
              <label for="usrname"> ID Number</label>
              <input type="text" name="idno"class="form-control" id="i4" placeholder="Enter Your ID Number"  maxlength="10" required pattern="ID20[0-9][0-9]0[0-9][0-9][0-9]">
            </div>
			
			<div class="form-group">
              <label for="usrname"> Roll Number</label>
               <input id="i4" type="text" class="form-control"  name="rollno" placeholder="Enter Your Roll Number" maxlength="10" required pattern="BT[0-9][0-9][A-Z][A-Z][A-Z]0[0-9][0-9]">
            </div>
			
			<div class="form-group">
              <label for="usrname"> Upload Your Passport size image</label>
               <input type="file" name="img" class="form-control" required>
            </div>
			
			<div class="form-group">
              <label for="usrname"> Age</label>
              <input type="number" name="age"class="form-control" id="i6" placeholder="Enter Your age" size="3" max="100" required>
            </div>
			
			<div class="form-group">
              <label for="usrname">CGPA</label>
              <input type="text" name="age"class="form-control" id="i7" placeholder="Enter Your CGPA" size="4" max="10" required>
            </div>
			
			<div class="form-group">
              <label for="usrname"> Email</label>
                   <input id="email"  class="form-control" type="email" name="email" size="35" placeholder="Enter Your College Email Address" required>
            </div>
			
			<div class="form-group">
              <label for="usrname"> Mobile Number</label>
               <input id="i7" type="number"  class="form-control" name="phone" placeholder="Enter Your Mobile Number" size="12" required>
            </div>
			
            <div class="form-group">
			  <label for="usrname"><i>Check Posts of your Choice</i></label></br>
			  <label for="usrname"><b><u>CSA Posts</u></b></label></br>
              <label><input type="checkbox" value="" name="vp">Vice President</label><br>
              <label><input type="checkbox" value="" name="as">Academic Secretary</label><br>
              <label><input type="checkbox" value="" name="ss">Sports Secretary</label><br>
              <label><input type="checkbox" value="" name="jt">Join Treasurer</label><br>
              <label><input type="checkbox" value="" name="cs">Cultural Secretary</label><br>
              <label><input type="checkbox" value="" name="hs">Hostel Secretary</label><br>
              <label><input type="checkbox" value="" name="ts">Technical Secretary</label><br>
			  <label><input type="checkbox" value="" name="br">Batch Representative</label><br>
			  <br>
			  <br>
			  <label for="usrname"><b><u>DSSA Posts</u></b></label></br>
			  <label><input type="checkbox" value="" name="gs">General Secretary</label><br>
			  <label><input type="checkbox" value="" name="dts">Technical Secretary</label><br>
			  <label><input type="checkbox" value="" name="dss">Sports Secretary</label><br>
			  <label><input type="checkbox" value="" name="dcs">Cultural Secretary</label><br>
			  <label><input type="checkbox" value="" name="djt">Join Treasurer</label><br>
			   <label><input type="checkbox" value="" name="das">Academic Secretary</label><br>
			   <label><input type="checkbox" value="" name="dbr">Branch Representative</label><br>
            </div>
              <button type="submit" class="btn btn-success btn-block" id="logbt"><span class="glyphicon glyphicon-plane"></span> Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        
          
        </div>
      </div>
      
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