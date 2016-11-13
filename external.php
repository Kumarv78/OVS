<?php
echo rand(6,9999999);
if($_SERVER['REQUEST_METHOD']=="POST")
{
      echo $_POST['c'];
      echo $_POST['uc'];
      $a='b';     
      $d=$$a;
      echo $d;     
}

?>
<html>
<body>
<form action="<?php $_PHP_SELF ?>" method="POST">
<input type="checkbox" value=";lkjas" name='c'/>Check it
<input type="checkbox" value="tyity" name='uc'/>dhj
<input type="submit" value="sub" name='s'/>
</form>
</body>
</html>
