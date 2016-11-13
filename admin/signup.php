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
		//$adrs=$_POST['adrs'];
		//$city=$_POST['city'];
		//$gender=$_POST['gender'];
		//$zip=$_POST['zip'];
		$student_id=$_POST['idno'];
		$rollno=$_POST['rollno'];
		$branch=$_POST['branch'];
		$password=$_POST['password'];
		$phone=$_POST['phone'];
		
		
		$q="select *from valide_voters where roll_no='$rollno' && password='$email' ";
		$res=mysqli_query($con,$q);
		if(!$res)
			die(mysqli_error($con));
		if($res['rollno']!=$email || $res['email']!=$email)
		{
			$emailerr="* E mail or Roll no. is not corect";
		}
	  
	 // $pname=$_POST[''];
	// echo "<br />".$flag."<br />";
	/*if(empty($pname))
	{
		$nameerr="<br />*Name is required.";
		$flag=1;
	}
	else
	{
		$pname=test($pname);
	}
	// echo "<br />".$flag."<br />";
	if(empty($pemail))
	{
		$emailerr="*Email is required.";$flag=1;
	}
	else
	{
		if(!preg_match("/([\._a-zA-Z0-9-]+@hmail.com)+/i",$pemail))
		{
			$emailerr="*Email address is not valid.";$flag=1;
		}
		else
		{
			$pemail=test($pemail);
		}
	}
	// echo "<br />".$flag."<br />";
	if(empty($ppword))
	{
		$passerr="*Passowrd is required.";
	}
	if(empty($pdob))
	{
		$doberr="*Date of Birth is required.";$flag=1;
	}
	/*else
	{
		$dob=test($name);
		//$dob=valid_dob($dob);
	}
	if(empty($padrs))
	{
		$padrs="*Address is required.";$flag=1;
	}
	else
	{
		$padrs=test($padrs);
	}
	// echo "<br />".$flag."<br />";
	if(empty($pcity))
	{
		$cityerr="*City and state are required.";$flag=1;
	}
	else
	{
		$pcity=test($pcity);
	}
	// echo "<br />".$flag."<br />";
	if(empty($pzip))
	{
		$ziperr="*ZIP is required.";$flag=1;
	}
	//echo "<br />".$flag."<br />";
	if(empty($pcntct))
	{
		$cntcterr="*Contact NO. is required.";$flag=1;
	}
	
	
		/*$pname=mysql_escape_string($pname);
		$pemail=mysql_escape_string($_POST['email']);
		$ppword=md5($_POST['pword']);
		$pdob=mysql_escape_string($_POST['dob']);
		$padrs=mysql_escape_string($_POST['adrs']);
		$pcity=mysql_escape_string($_POST['city']);*/
		//$pgender=mysql_real_escape_string($_POST['gender']);
		//$pzip=mysql_real_escape_string($_POST['zip']);
		//$pcntct=mysql_real_escape_string($_POST['cntct']);
		//$name=mysql_escape_string($name);
		//$email=mysql_escape_string($email);
		//$ppword=md5($_POST['pword']);
		//$pdob=mysql_escape_string($pdob);
		//$padrs=mysql_escape_string($padrs);
		//$pcity=mysql_escape_string($pcity);
		
	  
		  $q="select student_id,roll_no,email,mob_no from users where id='student_id'";
		$r=mysqli_query($con,$q);
		$res=mysqli_fetch_array($r);
		if($res!=null)
		{
			$emailerr="ID or Roll NO. or Mob No. or Email already exist.";
		}
		else{
			$dt=date("r",time());
			/*echo $pname.'<br />'.$pemail.'<br />'.$pgender.'<br />'.$pdob.'<br />'.
			$padrs.'<br />'.$pcity.'<br />'.$pcntct.'<br />'.$dt.'<br />'.$ppword.'<br />'.$pzip;
		*/
		$dt=date("Y-m-j H-i-s",time());
		$final_pass=md5(rand(14126739,99938402));
		/*$q="insert into users values('$pname','$pemail','$pgender','$pdob',
		'$padrs','$pcity','$pcntct','$dt','$pzip',password('$ppword'))";*/
		$q="insert into sign_up('vname','branch','age','student_id','roll_no','mob_no','password','dt','final_pass') values('$name','$branch','$age','$student_id',
		'$rollno','$password','$dt','$final_pass')";
		$r=mysqli_query($con,$q);
		if(!$r)
		{
			die(mysqli_error($con));
		}
			$_SESSION['email']=$email;
			$_SESSION['student_id']=$student_id;
			$to=$email;
			$subject="Your online voting system NITUK";
			$message="<b>YOur final password for Online Voding System NITUK is'$final_pass'.</b>";
			$message.="<h1>Password</h1>";
			//$header="From:abc@somedomain.com \r\n";
			//$header="Cc:afgh@somedomain.com \r\n";
			$header.="MIME-Version: 1.0\r\n";
			$header.="Content-type: text/html\r\n";
			$retval = mail ($to,$subject,$message,$header);
			if( $retval == true )
			{
				echo "Message sent successfully...";
			}
			
			header('location:.php');
		/*if(!$r)
			die('not inserted successfully'.mysqli_error($con));
			//header("Loacation:inbox.html");
			echo 'inserted';*/
			//header("Loacation:inbox.php");
		}
		mysqli_close($con);  
	  
}
function test($data)
{
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}

?>