<?php
session_start();
include_once 'connection.php';
?>
<?php
$voter=$_SESSION['student_id'];
if(!$voter)
	header('location:home.php');

$branch=$_SESSION['branch'];
if($_SERVER['REQUEST_METHOD']=='POST')
{
	//CSA
	$vp=$_POST['vp'];
	$as=$_POST['as'];
	$ss=$_POST['ss'];
	$jt=$_POST['jt'];
	$cs=$_POST['cs'];
	$hs=$_POST['hs'];
	$ts=$_POST['ts'];
	
//DSSA
	$gs=$_POST['gs'];
	$ts1=$_POST['ts1'];
	$ss1=$_POST['ss1'];
	$cs1=$_POST['cs1'];
	$jt1=$_POST['jt1'];
	//$js1=$_POST['js1'];
	//VOTING
	$q="update CSA set voting_status=voting_status+1 where post='Vice President' and name='$vp'";
	$r=mysqli_query($con,$q);
	if(!$r)
		die(mysqli_error($con));
	$q="update CSA set voting_status=voting_status+1 where post='Academic Secretary' and name='$as'";
	$r=mysqli_query($con,$q);
	if(!$r)
		die(mysqli_error($con));
	$q="update CSA set voting_status=voting_status+1 where post='Sports Secretary' and name='$ss'";
	$r=mysqli_query($con,$q);
	if(!$r)
		die(mysqli_error($con));
	$q="update CSA set voting_status=voting_status+1 where post='Joint Treasurer' and name='$jt'";
	$r=mysqli_query($con,$q);
	if(!$r)
		die(mysqli_error($con));
	$q="update CSA set voting_status=voting_status+1 where post='Cultural Secretary' and name='$cs'";
	$r=mysqli_query($con,$q);
	if(!$r)
		die(mysqli_error($con));
	$q="update CSA set voting_status=voting_status+1 where post='Hostel Secretary' and name='$hs'";
	$r=mysqli_query($con,$q);
	if(!$r)
		die(mysqli_error($con));
	$q="update CSA set voting_status=voting_status+1 where post='Technical Secretary' and name='$ts'";
	$r=mysqli_query($con,$q);
	if(!$r)
		die(mysqli_error($con));
	 $q="update $branch set voting_status=voting_status+1 where post='General Secretary' and name='$gs'";
	$r=mysqli_query($con,$q);
	if(!$r)
		die(mysqli_error($con));
	$q="update $branch set voting_status=voting_status+1 where post='Technical Secretary' and name='$ts1'";
	$r=mysqli_query($con,$q);
	if(!$r)
		die(mysqli_error($con));
	$q="update $branch set voting_status=voting_status+1 where post='Sports Secretary' and name='$ss1'";
	$r=mysqli_query($con,$q);
	if(!$r)
		die(mysqli_error($con));
	$q="update $branch set voting_status=voting_status+1 where post='Cultural Secretary' and name='$cs1'";
	$r=mysqli_query($con,$q);
	if(!$r)
		die(mysqli_error($con));
	$q="update $branch set voting_status=voting_status+1 where post='Joint Secretary' and name='$jt1'";
	$r=mysqli_query($con,$q);
	if(!$r)
		die(mysqli_error($con));
	$q="select vname from sign_up where student_id='$voter'";
$res=mysqli_query($con,$q);
if(!$res)
	die(mysqli_error($con));
$res=mysqli_fetch_array($res);
$username=$res['vname'];

$q="update sign_up set v_status=1 where student_id=$voter";
	$r=mysqli_query($con,$q);
	
	if(!$r)
		die(mysqli_error($con));
	$r=mysqli_fetch_array($r);
	header('location:mhom.php');
}
?>