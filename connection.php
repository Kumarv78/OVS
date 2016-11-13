<?php
$host='localhost';
$uname='root';
$pass='vk';
$con=mysqli_connect($host,$uname,$pass);
/*if(!$con)
die("could not be  connected".mysqli_error($con));
echo 'Connected';*/

$q="voting";
$rep=mysqli_select_db($con,$q);
/*if(!$rep)
echo 'DB not selected'.'<br/>';
else
echo '<b />'.'DB selected';*/
?>