<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['t']))
	{
		echo $_POST['t'];
	}
}
?>