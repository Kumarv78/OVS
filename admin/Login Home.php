
<?php
session_start();
?>
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


include_once 'connection.php';
$emailerr="";
if($_SERVER["REQUEST_METHOD"]=='POST')
{
	if(isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password']))
	{
		
			$uname=$_POST['username'];
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
			die("Error");
		}
		//rand(4);
		if(empty($res['student_id']))
				$emailerr.="id null";
		if(empty($res['final_pass']))
				$emailerr.="final null";
		
		if($res['student_id']==$uname && $res['final_pass']==$pass)
		{
			//echo 'Right';
			//session_register("email");
			//$_session['valid']=true;
			$_SESSION['student_id']=$uname;
			$_SESSION['rollno']=$res['roll_no'];
			header('location:mhom.php');
		}
		else
		{
			$emailerr="* Roll No. or password is wrong";
		}
	/*
	else{
		$emailerr="Both fields are required.";
	}*/
	}
}

?>

  <script src="hom.js"></script>
  <script>
function login()
{
window.location.href = "Login Home.php";
}
function signup()
{
window.location.href = "Signup Home.php";
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
   <a id="a2" onclick="signup()">SIGNUP</a> 
  
  
  <div id='d2' >
  
  <form id="f1" action="" method="post" >
  
  </br></br><span class="error"><?php echo $emailerr;?></span><br /></br> &nbsp; &nbsp; &nbsp; &nbsp;
  Enter ID: &nbsp;&nbsp;
  <input id="i1" type="number" name="username" placeholder="Enter Your Username" maxlength="15" required>
  </br></br> &nbsp; &nbsp; &nbsp; &nbsp;
  Password : &nbsp;    &nbsp;
  <input id="i2" type="password" name="password" placeholder="Enter Your Password" size="20" required></br>
  </br>
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  <input id="i3" type="submit" name="login" value="LogIn">
  </div>
  
 
</body>
</html>