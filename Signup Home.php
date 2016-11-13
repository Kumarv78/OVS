<!DOCTYPE html>

<html>
<head>
<title>HOME</title>
<link rel="icon" type="image/png/jpg" href="images/Home-icon.png">
<link rel="stylesheet" href="hom.css">


<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="hom.js"></script>

</head>
<body >



<?php 
session_start();
?>

<?php

include_once 'connection.php';

$flag=0;
$nameerr=$emailerr=$passerr=$adrserr=$doberr=$cityerr=$ziperr=$cntcterr="";
//$name=$email=$password=$age=$"";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$age=$_POST['age'];
		$student_id=$_POST['idno'];
		$rollno=$_POST['rollno'];
		$branch=$_POST['branch'];
		$password=md5($_POST['password']);
		$phone=$_POST['phone'];
		$flg=0;
		$q="select *from valide_voters where student_id='$student_id' && email='$email' ";
		$res=mysqli_query($con,$q);
		if(!$res)
		{	echo 'first';
			die(mysqli_error($con));
		}
		$res=mysqli_fetch_array($res);
		
		if(!$res)
		{	//echo 'second';
	$flg=1;
			//die('second');
			
			//header("location:Signup Home.php");
		}
		
		if($res['student_id']!=$student_id || $res['email']!=$email)
		{
			$emailerr="* E mail or Roll no. is not corect";
			//header('location:Signup Home.php');
			$flg=1;
			//die("third");
		}

	  if($flg==0)
	  {
		 $q="select branch,student_id,roll_no,email,mob_no from sign_up where student_id='$student_id'";
			$r=mysqli_query($con,$q);
			$res=mysqli_fetch_array($r);
			if($res!=null)
			{
				$emailerr="*ID or Roll NO. or Mob No. or Email already exist.";
				//die("fourth");
				
			}
			else{
					
					$final_pass=$password;
					/*$q="insert into users values('$pname','$pemail','$pgender','$pdob',
					'$padrs','$pcity','$pcntct','$dt','$pzip',password('$ppword'))";*/
					$q="insert into sign_up(vname,branch,age,student_id,roll_no,email,mob_no,password,final_pass,v_status) values('$name','$branch','$age','$student_id',
					'$rollno','$email','$phone','$password','$final_pass',0)";
					$r=mysqli_query($con,$q);
					if(!$r)
					{
						die(mysqli_error($con));
					}
					$_SESSION['student_id']=$student_id;
					$_SESSION['email']=$email;
					$_SESSION['branch']=$branch;
					
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
						echo "Message sent successfully...";
					}*/
					
					header('location:OVS.php');
			/*if(!$r)
				die('not inserted successfully'.mysqli_error($con));
				//header("Loacation:inbox.html");
				echo 'inserted';*/
				//header("Loacation:inbox.php");
		}
		mysqli_close($con);  
	  }
	  
	  //header('location:Signup Home');
}
function test($data)
{
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}

?>


  <script src="hom.js"></script>
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
  <div id ='d1'>
  <img id="img1" src='images/nk.jpg'></img>
  <div id = 'dt'>
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  NATIONAL INSTITUTE OF TECHNOLOGY <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;UTTARAKHAND <br>
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;ONLINE VOTING SYSTEM

  </div>
  </div>
   <a id="a1" onclick="login()">LOGIN</a>
   
  
 <div id='d3'>
     
     <form id="f2" action="<?php $_PHP_SELF?>" method="POST" onsubmit="return validate()">
	 
	   </br><?php echo $emailerr;?></br>
	   
       &nbsp; &nbsp;&nbsp; Name
	  <input id="i4" type="text" name="name" placeholder="Enter Your Name" maxlength="25" required pattern="[a-zA-z\s]+"></br></br>
	  &nbsp;&nbsp;&nbsp;Select your Branch
	 <select name="branch">
  <option>CIV</option>
  <option>CSE</option>
  <option>ECE</option>
  <option>EEE</option>
  <option>MEC</option>
     </select>
	  &nbsp;&nbsp;&nbsp;Age
	  <input id="i6" type="number" name="age" placeholder="Enter Your age" size="3" max="100" required></br></br>
	  &nbsp;&nbsp;&nbsp;ID Number
	  <input id="i4" type="text" name="idno" placeholder="Enter Your ID Number" maxlength="8" required pattern="20[1][3-5]0[1-3][0-9][0-9]">&nbsp;&nbsp;<SPAN class="format">Ex-20120122</SPAN></br></br>
	   &nbsp;&nbsp;&nbsp;Roll Number
	  <input id="i4" type="text" name="rollno" placeholder="Enter Your Roll Number" maxlength="10" required pattern="BT[1][3-5][CEM]{1}[CSEI]{1}[MEC]{1}0[0-9][0-9]">&nbsp;&nbsp;<SPAN class="format">Ex-BT13MEC003</SPAN></br></br>
	   &nbsp;&nbsp;&nbsp;Upload Image
	   <input type="file" name="img"></br></br>
	  &nbsp;&nbsp;&nbsp;Email 
	  <input id="email" type="email" name="email" size="35" placeholder="Enter Your College Email Address" required pattern="/([\._a-zA-Z0-9-]+@nituk.ac.in)+/i">&nbsp;&nbsp;<SPAN class="format">Ex-abcdef@nituk.ac.in</SPAN></br></br>
	  &nbsp;&nbsp;&nbsp;Mobile Number 
	  <input id="i7" type="number" name="phone" placeholder="Enter Your Mobile Number" size="12" required pattern="[7-9][0-9]{8}"></br></br>
	  &nbsp;&nbsp;&nbsp;Password 
	  <input id="i8" type="password" name="password" placeholder="Enter Your Password" size="20" required></br></br>
	  &nbsp;&nbsp;&nbsp;Confirm Your Password 
	  <input id="i9" type="password" name="confirm_password" placeholder="Re Enter Your Password" size="20" required></br></br>
	  </br>
	    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
	  <input id="i10" type="submit" value="SignUp" ><br>
     </form>
	  
 </div>
<a id="a2" onclick="signup()">SIGNUP</a>  
</body>
</html>