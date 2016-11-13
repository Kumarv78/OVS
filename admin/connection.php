<?php
$host='localhost';
$uname='root';
$dbpass='vk';
//$pass='451230';
$con=mysqli_connect($host,$uname,$dbpass);
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