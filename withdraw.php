<?php
session_start();
//require('session.php');
include_once 'connection.php';
?>
	
<!DOCTYPE html>

<html>
<head> 
<title>WITHDRAW</title> 
<meta name="viewport" content="width=device-width, initial-scale=1.0  "> 
<link rel="icon" type="image/png/jpg/jpeg" href="images/nk.jpg">
<!-- Bootstrap --> 
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="mhom.css">
 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<script src="bootstrap/js/jquery.js" type="text/javascript"></script>
 <script src="bootstrap/js/bootstrap.min.js"type="text/javascript"></script>
<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
  }
  </style>

</head>
<body>
<?php
//authenticatioin
      $user=$_SESSION['student_id'];
       $branch=$_SESSION['branch'];

       if(!$user)
            header("location:home.php");
      if(!$branch)
            die("Branch Error");
      
      
      //voting status
      $msg;
     /* $q="select v_status from sign_up where student_id=$user";
	$r=mysqli_query($con,$q);
	
	if(!$r)
		die(mysqli_error($con));
	$r=mysqli_fetch_array($r);
	if(!$r)
		die(mysqli_error($con));
	if($r['v_status']==1)
		header('location:mhom.php');*/
      //USer Name
      $q="select vname from sign_up where student_id='$user'";
      $res=mysqli_query($con,$q);
      if(!$res)
            die(mysqli_error($con));
      $res=mysqli_fetch_array($res);
      $username=$res['vname'];
      //
      $f1=-1;
      $f2=-1;
      $q="select *from csa where ID=$user";
	$r=mysqli_query($con,$q) or die(mysqli_error($con));
	if($r)
		 $f1=1;    
     $q="select *from $branch where ID=$user";
	$r=mysqli_query($con,$q)or die(mysqli_error($con));
	
	if($r)
          $f2=1;
       if($f1==-1 && $f2==-1)
             header("location:mhom.php");
      $posts=array();
      
      $i=0;
      if($f1==1)
      {
            $q="select post from csa where ID=$user";
                        $res=mysqli_query($con,$q) or die(mysqli_error($con));
                    
                        while($r=mysqli_fetch_array($res))
                        {
                             $posts[$i]="CSA_".$r['post'];
                             $i=$i+1;
                        }
      }
      if($f2==1)
      {
            $q="select post from $branch where ID=$user";
                        $res=mysqli_query($con,$q) or die(mysqli_error($con));
                    
                        while($r=mysqli_fetch_array($res))
                        {
                             $posts[$i]="DSSA_".$r['post'];
                             $i=$i+1;
                        }
      }
      
      $msg="";
      $flg=-1;
if($_SERVER['REQUEST_METHOD']=='POST')
{
     
      
      if(isset($_POST['post']))
      {     $pst=$_POST['post'];
            $cat=substr($pst,0,3);          
            if($cat=='CSA')
            {
                 echo $len=strlen($pst);
                  $len=$len-4;
                  $pst=substr($pst,4,$len);
                        $q="delete from $branch where ID=$user";
                              $r=mysqli_query($con,$q) or die(mysqli_error($con)); 
    
                               $q="delete from csa where ID=$user and post!='$pst'";
                              $r=mysqli_query($con,$q) or die(mysqli_error($con));
                   
            }
            
           if($cat=='DSS')
            {
                  
                  $len=strlen($pst);
                  $len=$len-5;
                   $pst=substr($pst,5,$len);
                 $q="delete from csa where ID=$user";
                              $r=mysqli_query($con,$q) or die(mysqli_error($con));
                             $q="delete from $branch where ID=$user and post!='$pst'";
                              $r=mysqli_query($con,$q) or die(mysqli_error($con));                                          

            }
            if($cat=='Not')
            {
                   $q="delete from csa where ID=$user";
                              $r=mysqli_query($con,$q) or die(mysqli_error($con)); 
                              
                      
                            $q="delete from $branch where ID=$user";
                              $r=mysqli_query($con,$q) or die(mysqli_error($con)); 
                              
                            
            }
            $q="update sign_up set nom_status=2 where student_id=$user";
                              $r=mysqli_query($con,$q) or die(mysqli_error($con));
            header('location:mhom.php');
      }
      mysqli_close($con);
}

?>
  <div class="container">
  <div class="row">
  
  <div class="col-md-7">
  <img id="img1" src='images/mhom2.png' class="img-responsive"></img>

  </div>
  <div class="col-md-3	">
       
  </div>
  <div class="col-md-2">
  <img id="img1" src='images/nk.jpg' class="img-responsive"></img>
  </div>
  
  </div>
  <div class="row">
  <div class="col-md-12" >
  <nav class="navbar navbar-inverse navbar-static" id="dd">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">NITUK OVS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="mhom.php">Home</a></li>
     
      <li><a href="nominees.php">Nominees</a></li> 
	  <li><a href="shedule.php">Schedule</a></li> 
      <li><a href="rules.php">Rules And Regulations</a></li> 
      <li><a href="#">How To Vote</a></li> 
      <li><a href="#">Help</a></li> 
      <li><a href="#">About OVS</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $username;?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
    </ul>
  </div>
  </nav>
  </div>
  </div>
  <div class="row">
    <div class="col-md-5">
  <h1 class="text-success">Just One step ahead </h1>
  
  </div>
  <div class="col-md-7">
  <h1 class="text-info">Choose a post for which you want to apply.</h1>
	<?php echo $msg;?>
  <form class="form-horizontal" name="brenchform" role="form" action="<?php $_PHP_SELF;?>" method="POST">
       
				<div class="radio">
        <select name="post">
			<?php	
                 foreach($posts as $v)
                 {
                       echo "<option>".$v."</option>";
                 }
				
                   ?>
                   <option>Nothing</option>
				
        </div>
        <input type="submit" value ="Submit" name='submit' id="ipbranch" />
        <div>
        </form>
      <!--  <h1 class="text-info">Choose a post for which you want to apply.</h1>
        <form class="form-horizontal" name="brenchform" role="form" action="<?php $_PHP_SELF;?>" method="POST">
        <select name='post'>
        <?php
        
             /*     if($flg==1)
                  {
                      $q="select post from csa where ID=$user";
                        $res=mysqli_query($con,$q) or die(mysqli_error($con));  
                       echo "<select name='post'>";
                        while($r=mysqli_fetch_array($res))
                        {
                              echo "<option>".$r['post']."</option>";
                        }
                       echo "</select>";
                        
                  }
                  if($flg==2)
                  {
                      $q="select post from $branch where ID=$user";
                        $res=mysqli_query($con,$q) or die(mysqli_error($con));
                        echo "<select name='post'>";
                        while($r=mysqli_fetch_array($res))
                        {
                              echo "<option>".$r['post']."</option>";
                        }
                       echo "</select>";
                  }*/
	?>
      </select>
        
		<input type="submit" value ="Submit" name='submit1' id="ipbranch" />
            </div>
  </form>-->
  </div>
  </div>
    </div>
</body>
</html>