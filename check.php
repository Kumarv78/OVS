<html>
<body>
</body>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{

	if(!empty($_POST['check']))
		echo $_POST['check'];

}
?>

<form action="<?php $_PHP_SELF ?>" method="POST">
<input type='radio' name='check' value="Checked"/>Check it
<input type="submit" name="submit"/>
</form>
</html>