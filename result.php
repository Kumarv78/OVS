<?php
session_start();
include_once 'connection.php';
?>

<!DOCTYPE html>
<html>
<head> 
<title>Nominees</title> 
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
      $branch=$_SESSION['branch'];
     //$name=$_SESSION['name'];
      if(!isset($user))
            header("location:home.php");
      $q="select vname from sign_up where student_id='$user'";
      $res=mysqli_query($con,$q);
      if(!$res)
            die(mysqli_error($con));
      $res=mysqli_fetch_array($res);
      $username=$res['vname'];
      
      $csa=array('Vice President','Academic Secretary','Sports Secretary','Cultural Secretary','Hostel Secretary',
                  'Technical Secretary','Batch Representative');
      $dssa=array('General Secretary','Sports Secretary','Cultural Secretary','Hostel Secretary',
                  'Technical Secretary','Branch Representative');            
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
      <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
    </ul>
  </div>
  </nav>
  </div>
  </div>
 
  
  
<div class="row">
  <div class="col-md-12">
  <table class="table table-hover table-bordered">
<caption><h2>CSA</h2></caption>
<thead>
	<tr>
		<th>Post</th>
		<th>S.No</th>
		<th>Name of the contestants</th>
		<th>Roll No.</th>
		<th>Total Votes</th>
            <th>Status</th>
	</tr>
</thead>
<!-- *************************************************this was for one post***********************************-->


<?php
foreach($csa as $post)
{
      $i=1;
      $q="select count(ID),max(voting_status) from csa where post='$post'";
      $r=mysqli_query($con,$q) or die(mysqli_error($con));
      $r=mysqli_fetch_array($r);
      $cnt=$r['count(ID)'];
      $max=$r['max(voting_status)'];
       $q="select *from csa where post='$post'";
	$res=mysqli_query($con,$q) or die(mysqli_error($con));	      
	while($r=mysqli_fetch_array($res))
      {   
            $q="select voting_status from csa where post='$post' and ID=$r[ID]";
            $votes=mysqli_query($con,$q) or die(mysqli_error($con));
            $votes=mysqli_fetch_array($votes);
            
            $cntvotes=$votes['voting_status'];
            
           if($i==1)
           echo "<tr><td rowspan=$cnt><em>$post</em></td>";
            else
             echo "<tr>";
		echo "<td>$i.</td><td>".$r['name']."</td>";           
		echo "<td>".$r['roll_no']."</td>";          
            echo "<td>$cntvotes</td>"; 
            if($cntvotes==$max)
                  echo "<td>Winner</td></tr>";
            else
                  echo "<td>----</td></tr>";
             
            $i=$i+1;
      }
}
      ?>

<!--******************************************************************************************************************-->

</table>
  <table class="table table-hover table-bordered"
<caption><h2>DSSA-Department of <?php echo $branch;?></h2></caption>
<thead>
	<tr>
		<th>Post</th>
		<th>S.No</th>
		<th>Name of the contestants</th>
		<th>Roll No.</th>
		<th>Total Votes</th>
            <th>Status</th>
	</tr>
</thead>
<!-- *************************************************this was for one post***********************************-->
<?php

foreach($dssa as $post)
{
      $i=1;
      $q="select count(ID),max(voting_status) from $branch where post='$post'";
      $r=mysqli_query($con,$q) or die(mysqli_error($con));
      $r=mysqli_fetch_array($r);
      $cnt=$r['count(ID)'];
      $max=$r['max(voting_status)'];
      $q="select *from $branch where post='$post'";
	$res=mysqli_query($con,$q) or die(mysqli_error($con));	      
	while($r=mysqli_fetch_array($res))
      {
           //echo "<tr><td rowspan=$cnt><em></em></td>"
          $q="select voting_status from $branch where post='$post' and ID=$r[ID]";
            $votes=mysqli_query($con,$q) or die(mysqli_error($con));
            $votes=mysqli_fetch_array($votes);
            
            $cntvotes=$votes['voting_status'];
           
           if($i==1)
           echo "<tr><td rowspan=$cnt><em>$post</em></td>";
            else
             echo "<tr>";
		echo "<td>$i.</td><td>".$r['name']."</td>";           
		echo "<td>".$r['roll_no']."</td>";             
            echo "<td>$cntvotes</td>";
             if($cntvotes==$max)
                  echo "<td>Winner</td></tr>";
            else
                  echo "<td>----</td></tr>";
            $i=$i+1;
      }
     
}


  ?>


</table>
</div>
</div>

<br /><br /><br /><br /><br /><br />
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
