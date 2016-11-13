<?php
include 'connection.php';
$semailerr="";
//$name=$email=$password=$age=$"";
if(isset($_PHP['signup']))
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
		{	//echo 'first';
			die(mysqli_error($con));
		}
		$res=mysqli_fetch_array($res);
		
		if(!$res)
		{	//echo 'second';
			$flg=1;
			die(mysqli_error($con));
			//die('second');
			
			//header("location:Signup Home.php");
		}
		
		if($res['student_id']!=$student_id || $res['email']!=$email)
		{
			$semailerr="* E mail or Roll no. is not corect";
			//header('location:Signup Home.php');
			$flg=1;
			die($semailerr);
			//die("third");
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
					header('location:mhom.php');
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