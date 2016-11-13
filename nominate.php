<?php
session_start();
include_once 'connection.php';
?>
<?php
      echo $branch=$_SESSION['branch'];
      $id=$_SESSION['student_id'];
      
      $q="select vname,roll_no from sign_up where student_id='$id'";
      $res=mysqli_query($con,$q);
      if(!$res)
            die(mysqli_error($con));
      $res=mysqli_fetch_array($res);
      echo $name=$res['vname'];
      $rollno=$res['roll_no'];
if($_SERVER['REQUEST_METHOD']=='POST')
{
      
      $i=0;
      $user=array('cgpa'=>$_POST['cgpa'],'year'=>$_POST['year']);
      
     if($user['cgpa']<7.0)
           header('location:mhom.php');
      //CSA values
     if($_POST['vp'])
      {
            $csa[$i]=$_POST['vp'];
            $i=$i+1;
      }
      if($_POST['as'])
      {
            $csa[$i]=$_POST['as'];$i=$i+1;
      }
      if($_POST['ss'])
      {
            $csa[$i]=$_POST['ss'];$i=$i+1;
      }
      if($_POST['jt'])
      {
            $csa[$i]=$_POST['jt'];$i=$i+1;
      }
      if($_POST['cs'])
      {
            $csa[$i]=$_POST['cs'];$i=$i+1;
      }
      if($_POST['ts'])
      {
            $csa[$i]=$_POST['ts'];$i=$i+1;
      }
      if($_POST['br'])
      {
            $csa[$i]=$_POST['br'];$i=$i+1;
      }
      if($_POST['hs'])
      {
            $csa[$i]=$_POST['hs'];
            $i=$i+1;
      }
      //DSSA values
      $i=0;
      $v=$_POST['gs'];
      if($v)
      {
            $dssa[$i]=$v;
            $i=$i+1;
      }
      $v=$_POST['dts'];
      if($v)
      {
            $dssa[$i]=$v;
            $i=$i+1;
      }
      $v=$_POST['dss'];
      if($v)
      {
            $dssa[$i]=$v;
            $i=$i+1;
      }
      $v=$_POST['dcs'];
      if($v)
      {
            $dssa[$i]=$v;
            $i=$i+1;
      }
      $v=$_POST['djt'];
      if($v)
      {
            $dssa[$i]=$v;
            $i=$i+1;
      }
      $v=$_POST['das'];
      if($v)
      {
            
            $dssa[$i]=$v;
            $i=$i+1;
      }
      $v=$_POST['dbr'];
      if($v)
      {
            $dssa[$i]=$v;
            $i=$i+1;
      }
      foreach($csa as $v)
      {
            $q="insert into csa(ID,name,post,cgpa,year,VOTING_STATUS,roll_no) values($id,'$name','$v',$user[cgpa],$user[year],0,'$rollno')";
            $r=mysqli_query($con,$q);
		if(!$r)
		{
			//$emailerr="Something wrong here";
			die(mysqli_error($con));
		}
     }
     foreach($dssa as $v)
      {
            $q="insert into $branch(ID,name,post,cgpa,year,VOTING_STATUS,roll_no) values($id,'$name','$v',$user[cgpa],$user[year],0,'$rollno');";
            $r=mysqli_query($con,$q);
		if(!$r)
		{
			//$emailerr="Something wrong here";
			die(mysqli_error($con));
		}
     }
     $q="update sign_up set nom_status=1 where student_id=$id";
	$r=mysqli_query($con,$q);
	if(!$r)
		die(mysqli_error($con));
     header("location:mhom.php");
}
?>