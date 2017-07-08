<?php
	include("header.php");
?>	
<!------------------Login Validation--------------------->
<?php
	$count="";
	if(isset($_POST['btn_submit']))
	{
		$pwd=$_POST['txt_pwd'];
		$cpwd=$_POST['txt_cpwd'];
		if($pwd=="" || $cpwd=="")
		{
			$alert="*All Fields Are Mandatory.";
			$count++;
		}	
		elseif(strlen($pwd)<6 || strlen($pwd)>30)
		{
			$alert="Password length must be 6-30 characters.";
			$count++;
		}
		elseif($pwd!=$cpwd)
		{
			$alert="Confirm Password do not match.";
			$count++;
		}
	}
?>
<?php
	if(isset($_POST['btn_submit']) && $count==0)
	{
		$pwd=$_POST['txt_pwd'];
		mysql_query("update tbl_metrimonial set password='$pwd' where email_id='$_GET[mail]'");
		header("location:index.php");
	}
?>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="container-fluid">
      
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
              <li><a href="goverment.php" tabindex="-1" >Goverment Employee</a></li>
              <li><a href="graduate.php" tabindex="-1" >Any Gruduate</a></li>
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
<div class="container">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <div class="loginbox">
          <form class="form-signin content" method="post">
          <fieldset>
          <legend align="left" class="green">Change Password</legend>
			<input type="password" name="txt_pwd" id="txt_pwd" placeholder="New Password" class="txt">
            <span class="error" id="pwd"></span>
			<input type="password" name="txt_cpwd" id="txt_cpwd" placeholder="Confirm Password" class="txt">
			<span class="error" id="cpwd"><?php echo $alert; ?></span>    
			<input type="submit" value="Change Password" name="btn_submit" id="submit" class="btn btn-lg btn-primary btn-block">
		</fieldset>
		</form>
        </div>
        </div>
    	</div>
	</div>
</div>
<?php include("footer.php");?>
<script type="text/javascript">
$(document).ready(function() {
    $("#submit").click(function(){
		var new_pwd=$("#txt_pwd").val();
		if(new_pwd=='')
		{
			$("#pwd").html("Enter New Password");
			$("#txt_pwd").focus();
			return false;
		}
		else
		{
			$("#pwd").html("");
		}
		
		var cpwd=$("#txt_cpwd").val();
		if(cpwd=='')
		{
			$("#cpwd").html("Enter Confirm Password");
			$("#txt_cpwd").focus();
			return false;
		}
		else if(cpwd!=new_pwd)
		{
			$("#cpwd").html("Password Not Match");
			$("#txt_cpwd").focus();
			return false;
		}
		else
		{
			$("#cpwd").html("");
		}
	});
});
</script>