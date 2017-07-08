<?php
include('header.php');
if($_POST['btn_submit']!='')
{
	$strEmail = trim($_POST['txt_email']);
	$strPassword = md5($_POST['txt_pass']);	
	$arrData = $objData->getAll("SELECT * FROM tbl_member WHERE member_email='".$strEmail."' AND member_password='".$strPassword."' AND member_status='1'");	
	if(count($arrData)=='0')
	{	
		$objData->setMessage('Incorrect email-id and Password Please check and try again.','error');								
		$objData->redirect('login.php');
	}
	else
	{		
		if(count($arrData)>0)
		{   			
			$_SESSION['Gkks_memberId'] = $arrData[0]['member_id'];
			$_SESSION['Gkks_siteName'] = 'GKKS';			
			$objData->redirect('index.php');
		}
	}
}


?>

<!-- Static navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="aboutus.php">About us</a></li>
          <li><a href="ourmission.php">Our Mission</a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown">Members <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="itmember.php" tabindex="-1" >IT Professional</a></li>
              <li><a href="doctor.php" tabindex="-1" >Doctors</a></li>
              <li><a href="civil.php" tabindex="-1" >Civil Engineer</a></li>
              <li><a href="goverment.php" tabindex="-1" >Government Employee</a></li>
              <li><a href="graduate.php" tabindex="-1" >Any Graduate</a></li>
            </ul>
          </li>
          <li><a href="jobs.php">Jobs</a></li>
          <li><a href="matrimonial.php">Matrimonial</a></li>
          <li><a href="inquiry.php">Inquiry</a></li>
          <li><a href="event.php">Events</a></li>
           <li><a href="gallery.php">Gallery</a></li>
          <li><a href="contactus.php">Contact us</a></li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
  <!--/.container-fluid --> 
</nav>
<div class="shedow text-center"> <img src="img/shadow.png" alt=""/> </div>
<div>
  <div class="maintitle">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="aboutright pull-left">
            <h4>Login</h4>
          </div>
          <div class="aboutleft pull-right"> <span><a href="index.php">Home</a> / </span><span>Login</span> </div>
          <div class="clr"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-4"> </div>
      <div class="col-sm-4">
        <div class="loginbox">
          <form class="form-signin content" method="post">
          <?php echo $objModule->getMessage(); ?>  
            <input type="text" placeholder="Email Id" class="form-control" name="txt_email" id="txt_email" value="<?php echo $_POST['txt_email'];?>">
        <span class="error" id="unm"><?php echo $a_unm;?></span>

        <input type="password" placeholder="Password" class="form-control" name="txt_pass" id="txt_pass" value="<?php echo $_POST['txt_pass'];?>">
        <span class="error" id="pass"><?php echo $a_pass,$a_war;?></span>
        
          <label>
            <a href="memberregister.php">New User? Signup Now!!</a>
          </label>
          <label>
          <a href="reset_pwd.php" target="new">forget password</a>
          </label>
        <input type="submit" name="btn_submit" id="submit" value="Sign in" class="btn btn-lg btn-primary btn-block"/>
          </form>
        </div>
      </div>
      <div class="col-sm-4"> </div>
    </div>
  </div>

<?php include('footer.php');?>
<script>
$(document).ready(function() {
    $("#submit").click(function(){
		var unm=$("#txt_email").val();
		if(unm=="")
		{
			$("#unm").html("Enter Your User Name");
			$("#txt_email").css('border-color','red');
			$("#txt_pass").css('border-color','#ccc');
			$("#pass").html("");	
			$("#txt_email").focus();
			return false;
		}
		else
		{
			$("#unm").html("");
			$("#txt_email").css('border-color','#ccc');				
		}		
		var pass=$("#txt_pass").val();
		if(pass=='')
		{
			$("#pass").html("Enter Your Password");
			$("#txt_pass").css('border-color','red');
			$("#txt_pass").focus();
			return false;
		}
		else
		{
			$("#pass").html("");
			$("#txt_pass").css('border-color','#ccc');	
		}
	});
});
</script>