<?php
session_start();
//require('session.php');
include_once 'connection.php';
?>
<!DOCTYPE html>
<html>
<head> 
<title>SHEDULE</title> 
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
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $username;?></a></li></li>
      <li><a href="#"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
    </ul>
  </div>
  </nav>
  </div>
  </div>
 
  
  
  <div class="row">
  <div class="col-md-12">
<caption><h1>CSA ELECTION(2016-2017) RULES:</h1></caption>  
<ol>
	<li><h3>ELIGIBILITY CRITERIA FOR CONTESTANTS:</h3></li>
		<ul>
			<li><h4>All the student admitted in the institute from 2013 onwards are eligible to contest the election subject to the following conditions:</h4></li>
				<ul>
					<li>The Contestant must be enrolled for the Spring Semester 2016l</li>
					<li>The contestant should have cleared all the due and should have paid all the previous Institute Fees.</li>
					<li><em>The contestant must have minimum of 7.0 CGPA.</em></li>
					<li>The contestant should not have any kind of pending case or conviction in UNFAIR MEANS or INDISCIPLINE against him/her.</li>
					<li>The contestant must have NEVER have secured 'L/W' grade in any course.</li>
					<li> Representative of a batch should be from the same batch. Girls representative can be a girl only.</li>
					<li>Once a student is elected for a post , he/she will not be allowed to contest for the same in the following years.</li>
					<li>A contestant can apply for one or more than one post at the  time of filing the nomination whereas he/she will ve finally allowed to contest for only one post.
						Therefore,a contestant who files his/her nomination for more than one post will ve required to withdraw his/her nomination for the post(s) which he/she finally decided
						not to contest for,within the time limit for withdrawl of candidature.In case ,a contestant fails to do so, his nomination form will be summarily rejected and
						he/she will not be permitted to contest for any post.</li>
					<li>Vice President and Secretary(Hostel) are expected to stay in the hostel and avail the mess facility throughout their tenure/academic year. Any
						deviation in this regard will result in relinquishing from the assigned post or capacity.</li>
					<em>THE PRESIDENT OF CSA (ASSOCIATE DEAN-STUDENT WELFARE) WILL DECLARE THE LIST OF ELIGIBLE CONTESTANTS AFTER THE SCRUTINY.<br>An appeal
					against the rejection of a nomination can be made within one hour from the display of list of candidates.An appeal against the rejection of a 
					withdrawl can be made within one hour from the declaration of final list of eligible contestants.</em>
				</ul>
		</ul>
	<li><h3>ELECTORATE</h4></li>
		<ul>
			<li><h4>FOR CENTRAL COUNCIL:</h4></li>
				<ul>
					<li>For the posts Vice president,Secretary(Academics),Secretary(Technical),Secretary(Cultural),Secretary(Sports),Secretary(Hostel),Treasurer,
						the students of 2012/2013/2014/2015 batches,enrolled in Spring Semester 2016 shall be the electorate.</li>
					<li>All the girl student of 2012/2013/2014/2015 batches,enrolled in Spring Semester 2016 shall be the electorate for the Girls Representative.</li>
					<li>All the student of 2013 batch enrolled in Spring Semester 2016 will be the electorate for the representative of 2013 batch.</li>
					<li>All the student of 2014 batch enrolled in Spring Semester 2016 will be the electorate for the representative of 2014 batch.</li>
					<li>All the student of 2015 batch enrolled in Spring Semester 2016 will be the electorate for the representative of 2015 batch.</li>
				</ul>
			<li><h4>FOR SOCIETY FOR DEPARTMENTAL ACTIVITIES:</h4></li>
				<ul>
					<li>For the posts General Secretary ,Coordinator(Technical),Coordinator(Cultural),Coordinator(Sports),Joint Treasurer,the students of 2012/2013/2014/2015
						batches,enrolled in Spring Semester 2016 shall be the electorate.</li>
					<li>Societies for Departmental activities shall be elected by the student of the respective department only and the contestants also shall be from the same department.</li>
					<li>Each Department will have only one society.</li>
					<li>Representative of 2013/204/2015 will be elected by the student of corresponding batch and who are enrolled in Spring Semester 2016.</li>
					<li>Girls Representative will be elected by the Girl Students of corresponding branch and 2013/2014/2015 batches and who enrolled in Spring Semester 2016.</li>
				</ul>
		</ul>
	<li><h3>GUIDELINE FOR ELECTION PROCEDURE</h3></li>
		<ul>
			<ul>
				<li>The election process will be conducted and supervised by the Associate Dean(Student Welfare).</li>
				<li>The contestant can obtain nomination form from Mr.Sunil Negi (Assistant to Dean-Acad & SW) from Room No. A 106 of ITI Campus and submit
					the same duly filled in to the Associative Dean(Student Welfare).</li>
				<li>The contestant will be allowed to deliver 10 minutes speech in front of the student to convey their message and agenda at a venue and time which will be notified
					separately by the Associate Dean(Student Welfare).The student can interact and put their queries to the contestants during the canvassing.</li>
				<li>No canvassing will be allowed in classes,corridors,library,reading rooms,hostel rooms and mess</li>
				<li>The canvassing is not allowed in  between 8:00 pm to 6:00am.</li>
				<li>No rally/procession will be permitted.</li>
				<li>One A-3 size handmade poster is allowed for canvassing and that must be displayed in the CSA notice board only. The printed posters are strictly prohibited.</li>
				<li>Leaflets and handbills are not allowed during the canvassing.</li>
				<li>Interferance/involvement of any internal/external organization/association/panel are strictly prohibited.</li>
				<li>All the student are advised <b><i><u>Not to</u></i></b> involve or allow involvement of any external individual in the election process for any reason.Any
					student found inviting /permitting /involving any external organization/individual <b><i><u>Shall Be Removed From The Institute With Immediate Effect.</u></i></b><li>
				<li>Associate Dean (Student Welfare) and all the faculty members will monitor the canvassing process and will ensure that the rules and regulations and 
					guidelines are being followed properly and ethically. Any student/faculty can conplain to the Associate Dean(Student welfare) and if any violation 
					of the rules and regulations is proved in an enquiry, the candidature of the contestant will be cancelled.</li>
				<li><em>The Institute ID card is essential for casting the Vote.</em></li>
				<li>The Associate Dean(Student Welfare) may allow a representative of the contestant during the counting process.</li>
				<li>If any contestant has any grievance about the result,he/she can appeal to the Associate Dean(Student Welfare),within one hour after the declaration		
					of Election result.The contestant has to ensure that either he/she or his/her representative is present during the counting process.</li>
				<li>Election result will be declared on the CSA notice board/website.</li>
				<li> Representative of 2016 batch shall be nominated by Dean(Student Welfare) on the basis of All India Ranks of JEE(Mains) of the students.</li>
			</ul>
	<li><h4>ELECTION PROCEDURE-2016</h4></li>
			<ul>
				<li>Nomination and withdrawal forms are available with Mr.Sunil Negi(Assistant to Dean-Acad & SW) from Room No.A106 of ITI Campus.</li>
				<li>Incomplete nomination forms will be rejected.</li>
				<li>Nomination forms will be submitted personally to the Associate Dean(SW).</li>
				<li>No application forms will be accepted after the stipulated time.</li>
				<li>Institute ID card is essential while submitting the Nomination and withdrawal forms.</li>
				<li>Successful Candidate will be declared by the Associate Dean(SW).</li>
				<li>One student can contest for only one Post.</li>
				<li>Candidate is permitted to file the nomination for more than one post but will have to withdraw from extra posts otherwise his/her candidature for 
					all posts shall be rejected.</li>
				<li>Only on declaration of final list of Eligible Candidates,withdrawal is allowed.</li>
				<li>Withdrawal is permitted only by the candidate who personally submits the same and shows his/her ID card.</li>
				<li>Withdrawal will be accepted by the Associate Dean (SW) from the CANDIDATES ONLY.</li>
				<li>Final list of candidates contesting for the election shall be declared on dd/mm/yyyy.</li>
			</ul>
		</ul>
		
</ol>

</div>
<br /><br /> <br /><br /><br /><br /> <br /><br />
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
 </body>
</html>
