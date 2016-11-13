<?php
session_start();
{
include_once 'connection.php';
$emailerr="";
if($_SERVER["REQUEST_METHOD"]=='POST')
{
	//if(isset($_POST['submit']) )//&& !empty($_POST['email']) && !empty($_POST['pword']))
	
		$uname="";
		if(!empty($_POST['rollno']))
		$uname=mysqli_real_escape_string($con,$_POST['email']);
		$pass=md5($_POST['password']);
		$q="select email,password from sign_up where email='$uname' and upass='$pass'";
		$r=mysqli_query($con,$q);
		$res=mysqli_fetch_array($r);
		//rand(4);
		if($res['email']==$uname && $res['password']==$pass)
		{
			//echo 'Right';
			//session_register("email");
			//$_session['valid']=true;
			$_SESSION['email']=$uname;
			$_SESSION['rollno']=$pass;
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
