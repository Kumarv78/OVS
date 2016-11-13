<?php 
 include('connection.php'); 
session_start(); 
 $check=$_SESSION['email']; 
 $session=mysqli_query($con,"SELECT email FROM users WHERE username='$check' "); 
 $row=mysqli_fetch_array($session);
   $login_session=$row['email'];
   if(!isset($login_session)) 
 { 
		header("Location:login.php"); 
 } 
 ?> 