<?php
	session_start();
	error_reporting(0);
	include("php/connection.php");
	$count=0;
	if(isset($_POST['btn_login']))
	{
		$name=$_POST['txt_uname'];
		$pass=$_POST['txt_password'];
		
		$sql=mysql_query("select * from tbl_admin where admin_email='$name' or admin_password='$pass'");
		$row=mysql_fetch_array($sql);
		
		if($name!=$row['admin_email'])
		{
			$e_name="User Name is Incorrect";
			$count++;
		}
		if($name==$row['admin_email'] && $pass!=$row['admin_password'])
		{
			$e_pass="Password is Incorrect";
			$count++;
		}
	}
?>
<?php
	if(isset($_POST['btn_login']) and $count==0)
	{
		//$sql=mysql_query("select * from tbl_admin where admin_email='$name' and admin_password='$pass'");
		if($name==$row['admin_email'] and $pass==$row['admin_password'])
		{
			$_SESSION['admin_id']=$row['admin_id'];
			$_SESSION['admin_name']=$row['admin_name'];
			header("location:php/home.php");
		}
	}
?>
<html>
<head>
	<title>GKKS Admin Panel</title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="css/custom.css" type="text/css"/>
<script src="js/bootstrap.js" type="text/javascript"></script>
</head>
<body class="body">
<div class="container">
<div class="row">
<div class="col-sm-12">
        <div class="card card-container">
            <div class="panel-heading">
			    <h3 class="panel-title login">Admin Login</h3>
			</div>
            <form class="form-signin" method="post">
                <input type="text" id="inputEmail" name="txt_uname" value="<?php echo $_POST['txt_uname'];?>" class="form-control" placeholder="Email address" required autofocus>
				<span class="error"><?php echo $e_name;?></span>
                <input type="password" id="inputPassword" name="txt_password" value="<?php echo $_POST['txt_password'];?>" class="form-control" placeholder="Password" required>
       			<span class="error"><?php echo $e_pass;?></span>
                
                <input type="submit" class="btn btn-lg btn-primary btn-block btn-signin" name="btn_login" value="Sign in">
            </form><!-- /form -->
            <a class="forgot-password" href="#">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>