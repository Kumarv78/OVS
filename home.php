<?php
session_start();

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
  
  .modal-header, h4, .close {
      background-color: navy;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>
	  <script language="javascript">
function login()
{
window.location.href = "Login Home.php";
}
function signup()
{
window.location.href = "Signup Home.php";
}
function validate()
{
	
	
	var email=document.f2.email.value;
	var pass=document.f2.password.value;
	var con_pass=document.f2.confirm_password.value;
	var emailerr="",con_pass_err="";
	if(email=="")
	{
		emailerr="*Fill Email":
		return false;
	}
	else
	{
		var reg=new RegExp("/([\._a-zA-Z0-9-]+@nituk.ac.in)",'i');
		if(!reg.test(email))
		{
			
			emailerr="*Email is not valid";
			return false;
		}
		return true;
			
	}
	if(pass=="")
		{
			passerr="*Fill Password";
			return false;
		}
		else
		{
			if(con_pass="")
			{
				con_pass_err="*Fill to confirm Password";
				return false
			}
			if(email.equals(con_pass))
				return true
			else
				{
					con_pass_err="*Confirm Password";
					return false;
				}
			
		}
	return true;
}
</script>
</head>
<body>

<?php


include_once 'connection.php';
$emailerr="";$aemailerr="";
if($_SERVER["REQUEST_METHOD"]=='POST')
{
	if(isset($_POST['login'])  )
	{
		if(!empty($_POST['username']) && !empty($_POST['password']))
		{	$uname=$_POST['username'];
		//echo $_POST['username'];
		//echo "<br />".$_POST['password']."<br />";
		$pass=md5($_POST['password']);
		$q="select *from sign_up where student_id=$uname and final_pass='$pass' ";
		$r=mysqli_query($con,$q);
		if(!$r)
		{
			//$emailerr="Something wrong here";
			die(mysqli_error($con));
		}
		$res=mysqli_fetch_array($r);
		if(!$res)
		{
			//$emailerr.="Something wrong here too";
			$emailerr="* You are not a valide user.";
		}
		//rand(4);
		if(empty($res['student_id']))
				$emailerr.="Id is not defined";
		if(empty($res['final_pass']))
				$emailerr.="Password not found.";
		
		if($res['student_id']==$uname && $res['final_pass']==$pass && !empty($res['branch']))
		{
			$_SESSION['student_id']=$uname;
			//$_SESSION['rollno']=$res['roll_no'];
                  //$_SESSION['rollno']=$res['roll_no'];
			$_SESSION['branch']=$res['branch'];
                  //$_SESSION['name']=$res['name'];
			header('location:mhom.php');
		}
		}
		else{
		$emailerr="Both fields are required.";
	}
	/*
	else{
		$emailerr="Both fields are required.";
	}*/
	}
	

//administrator login

	if(isset($_POST['alogin']) )
	{
                  if( !empty($_POST['username']) && !empty($_POST['password']))
                  {	$uname=$_POST['username'];
                  //echo $_POST['username'];
                  //echo "<br />".$_POST['password']."<br />";
                  $pass=md5($_POST['password']);
                  $q="select *from admin where id=$uname and final_pass='$pass' ";
                  $r=mysqli_query($con,$q);
                  if(!$r)
                  {
                        //$emailerr="Something wrong here";
                        die(mysqli_error($con));
                  }
                  $res=mysqli_fetch_array($r);
                  if(!$res)
                  {
                        //$emailerr.="Something wrong here too";
                        $aemailerr="User does not exist";
                  }
                  //rand(4);
                  if(empty($res['id']))
                              $aemailerr.="id null";
                  if(empty($res['final_pass']))
                              $aemailerr.="password null";
                  
                  if($res['id']==$uname && $res['final_pass']==$pass)
                  {
                        //echo 'Right';
                        //session_register("email");
                        //$_session['valid']=true;
                        $_SESSION['student_id']=$uname;
                        //$_SESSION['rollno']=$res['roll_no'];
                        //$_SESSION['branch']=$res['branch'];
                        header('location:admin/mhom.php');
                  }
                  }
                  else{
                  $emailerr="Both fields are required.";
            }
	}	
$semailerr="";
//$name=$email=$password=$age=$"";
//Sign UP for voter
//echo '34562345324';
       if(isset($_POST['signup']))  
       {
             $flg=0;
		$name=$_POST['name'];
		$email=$_POST['email'];
		$age=$_POST['age'];
		$student_id=$_POST['idno'];
		$rollno=$_POST['rollno'];
		$branch=$_POST['branch'];
		$password=md5($_POST['password']);
            
           
           
		$phone=$_POST['phone'];
		
		$q="select *from valide_voters where student_id='$student_id' && email='$email' ";
		$res=mysqli_query($con,$q);
		if(!$res)
		{	//echo 'first';
			$semailerr="This user does not exists.";
		}
		$res=mysqli_fetch_array($res);
		
		if(!$res)
                  
		{	//echo 'second';
			$flg=1;
                  $semailerr="* Email or ID is not correct OR user does not exists.";
			//die(mysqli_error($con));
			//die('second');			
			//header("location:Signup Home.php");
		}
		
            

              if($flg==0)
              {
                  $q="select branch,student_id,roll_no,email,mob_no from sign_up where student_id='$student_id'";
			$r=mysqli_query($con,$q);
			$res=mysqli_fetch_array($r);
			if($res!=null)
			{
				echo $semailerr="*ID or Roll NO. or Mob No. or Email already exists.";
				//die("fourth");
				//header('location:home.php');
			}
			else{
					
                              //$final_pass=rand(6,999999);
					$final_pass=$password;
                              
					/*$q="insert into users values('$pname','$pemail','$pgender','$pdob',
					'$padrs','$pcity','$pcntct','$dt','$pzip',password('$ppword'))";*/
					$q="insert into sign_up(vname,branch,age,student_id,roll_no,email,mob_no,password,final_pass,v_status,nom_status) values('$name','$branch','$age','$student_id',
					'$rollno','$email','$phone','$password','$final_pass',0,0)";
					$r=mysqli_query($con,$q);
					if(!$r)
					{
						die(mysqli_error($con));
					}
                              //$_SESSION['student_id']=$student_id;
					//$_SESSION['email']=$email;
					//$_SESSION['branch']=$branch;
                              //$_SESSION['rollno']=$rollno;
                              //$_SESSION['name']=$name;
                              
                              //Sending final password.
                              
                              /*	$to=$email;
					$subject="Your online voting system NITUK";
					$message="<b>YOur final password for Online Voding System NITUK is'$final_pass'.</b>";
					$message.="<h1>Password</h1>";
					//$header="From:abc@somedomain.com \r\n";
					//$header="Cc:afgh@somedomain.com \r\n";
					$header.="MIME-Version: 1.0\r\n";
					$header.="Content-type: text/html\r\n";
					$retval = mail ($to,$subject,$message,$header);
					if( $retval==true )
					{
						$semailerr="Message sent successfully...";
					}*/
                              $semailerr="Succesfully signed up. Now check you mail and log in to continue.";
					
		}
						function test($data)
		{
			$data=trim($data);
			$data=stripcslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
		mysqli_close($con);  
	  }
       }
	  //header('location:Signup Home');
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
      <li ><a href="#">Home</a></li>
      <li><a href="#">Nominees</a></li> 
	  <li><a href="#">Results</a></li> 
      <li><a href="#">Rules And Regulations</a></li> 
      <li><a href="#">How To Vote</a></li> 
      <li><a href="#">Help</a></li> 
      <li><a href="#">About OVS</a></li> 
	  <li><a href="#" id="adlgn" >Adminstrator Login</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> User</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
    </ul>
  </div>
  </nav>
  </div>
  </div>
  
    <div class="row">
	 <div class="col-md-3">
	 <h3 class="text-info">For Voting First Login</h3>
	  <center> <!--<h2 class="text-info">Click here for login</h2>--> <br><br></br></br>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary btn-lg" id="myBtn">Login</button> </center>
	 </div>
	 
	 <div class="col-md-6">
	 <span class="error"><?php 
                                                            if(isset($semailerr))
                                                            echo $semailerr;
                                                      if(isset($emailerr))
                                                            echo $emailerr;
                                                      ?>
                                                            </span>
	  <h3 class="text-info">Welcome To National Institute of Technology  Uttarakhand Online Voting System.</h3>
  <p>
  fgbvdsfbg fshfcskjdcfhkjdf dfhdklfvnhdmvndj dxncvxncvmxnc,mx cjxmncxmcn xcxmcnxknc,xz ckndxkcj dxcdxjcdkjckdjckldnmfc dfcjdkfmcdklfd;lkjfdufietgfdrjf dfhudifiodfidjfiodfijdkfvnd jfkdfkldfkdjfiodufidnfvdnkd fijdilfjdkfndnfjdgfioufod fjdifjdi fhdiofhdif djfid fdufiodfieuiowuroiw rwerowurpowi rwirpowi ri wopriowper eprjepori ndmnfldkjifjdlkfjdofdiufd  fudif hfkjdfhbvdjkfhhhhhh dhffffiudfyuyfiuyewuryiehrf eruerueoipru nmv mdvklekpofid cx cmnchettetyeifr jsdmkfpeirpoeitiertyiuhj  fmhjiejiekjtrke fmnerieireiruioeref dfgjhdhnmgofdkojohdjfhsujhiughfhsgiufyuhdfusghfhhjkdhf dfhdkjhcdjh cdhjdfhjdhfjdhf dyufeiufisd cfdsu
  </p>
	 
	 </div>
	 
	 <div class="col-md-3">
	 <h3 class="text-info">If you are not a voter then Signup</h3>
	  <center> <!--<h2 class="text-info">Click here for Signup</h2>--> <br><br>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary btn-lg" id="sgBtn">Signup</button> </center>
	 </div>
	 
	 </div>
  
    

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="<?php $_PHP_SELF ?>" method="Post">
										<span class="error"><?php echo $emailerr;?></span>

            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" name="username"class="form-control" id="usrname" placeholder="Enter your ID Number (Ex:20080234)"
              maxlength="10" required pattern="20[1][3-6]0[0-3][0-9][0-9]">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" name="password" class="form-control" id="psw" placeholder="Enter password" size="20" required>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" name='login' class="btn btn-success btn-block" id="logbt"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="home.php">Sign Up</a></p>
          
        </div>
      </div>
      
    </div>
  </div> 
  
  
    
  <?php

	?>
  
   <!-- Modal -->
  <div class="modal fade" id="sgModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-pencil"></span> Signup</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="<?php $_PHP_SELF?>" method="Post" >
										

            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Name</label>
              <input type="text" name="name"class="form-control" id="usrname" placeholder="Enter Your Name" maxlength="25" required pattern="[a-zA-z\s]+">
            </div>
			<div class="form-group">
              <label for="usrname">Select your Branch</label>
              <select name="branch" class="form-control">
  <option>CIV</option>
  <option>CSE</option>
  <option>ECE</option>
  <option>EEE</option>
  <option>MEC</option>
     </select>
            </div>
			
			<div class="form-group">
              <label for="usrname"> Age</label>
              <input type="number" name="age"class="form-control"  id="i6" placeholder="Enter Your age" size="3" max="100" required>
            </div>
			
			<div class="form-group">
              <label for="usrname"> ID Number</label>
              <input type="number" name="idno"class="form-control" id="i4" placeholder="Ex-20130154"  maxlength="8"  required pattern="20[1][3-6]0[0-3][0-9][0-9]">
            </div>
			
			<div class="form-group">
              <label for="usrname"> Roll Number</label>
               <input id="i4" type="text" class="form-control"  name="rollno" placeholder="Enter Your Roll Number" maxlength="10" 
               required pattern="BT[1][3-6][CEM][ISCE][VEC]0[1-6][0-9]">
            </div>
			
			<!--<div class="form-group">
              <label for="usrname"> Upload Image</label>
               <input type="file" name="img" class="form-control" >
            </div>-->
			
			<div class="form-group">
              <label for="usrname"> Email</label>
                   <input id="email"  class="form-control" type="email" name="email"  placeholder="Enter Your College Email Address" 
                   required pattern="[a-zA-Z0-9]{4,}[.][CEM][ISCE][VEC][1][3456]@nituk\.ac\.in$">
            </div>
			
			<div class="form-group">
              <label for="usrname"> Mobile Number</label>
               <input id="i7" type="number"  class="form-control" name="phone" placeholder="Enter Your Mobile Number" size="12" required>
            </div>
			
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password"  name="password" class="form-control" id="i8" placeholder="Enter Your Password" size="20" required>
            </div>
			
			<!-- <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Confirm Your Password </label>
              <input type="password"  name="cpassword" class="form-control" id="i9" placeholder="Re Enter Your Password" size="20" required>
            </div>-->
			
            <div class="checkbox">
              <label><input type="checkbox" value="" >Remember me</label>
            </div>
              <!--<button class="btn btn-success btn-block" id="logbt" name='signup' type="submit"><span class="glyphicon glyphicon-pencil"></span> &nbsp;Signup </button>-->
							<input type='submit'  name='signup' value='Signup'/>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancel</button>
          <p>Already a member? <a href="home.php">Login</a></p>
         
        </div>
      </div>
      
    </div>
  </div> 
 
    <!--  ADMIN LOGIN Modal -->
  <div class="modal fade" id="adlog" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> AdLogin</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="<?php $_PHP_SELF?>" method="Post">
					<span class="error"><?php echo $aemailerr;?></span>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" name="username"class="form-control" id="usrname"   required pattern="20[0-9][0-9]0[0-9][0-9][0-9]">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" name="password" class="form-control" id="psw" placeholder="Enter password"  required>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" name='alogin' class="btn btn-success btn-block" id="logbt"><span class="glyphicon glyphicon-off"></span> AdLogin</button>
          </form>
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
         
          <!--<input type="submit" name="suvoter" value="Signup"/>-->
          
        </div>
      </div>
      
    </div>
  </div> 
  
  
    
  
   
  
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
  <script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});

$(document).ready(function(){
    $("#sgBtn").click(function(){
        $("#sgModal").modal();
    });
});

$(document).ready(function(){
    $("#adlgn").click(function(){
        $("#adlog").modal();
    });
});
</script>

</body>
</html>