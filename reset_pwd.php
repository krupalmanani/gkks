<?php include('header.php');?>
<?php
	$count="";
	if(isset($_POST['btn_submit']))
	{
		$email=$_POST['txt_email'];
		$sel_email="select * from tbl_member where member_email='$email'";
		$q_email=mysql_query($sel_email);
		$row_email=mysql_num_rows($q_email);
		
		if($email=="")
		{
			$alertemail="*";
			$count++;
		}
		elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$alertemail="Invalid Email format.";
			$count++;
		}
		elseif($row_email<1)
		{
			$alertemail="Incorrect Email ID.";
			$count++;
		}
	}
?>
<?php
	if(isset($_POST['btn_submit']) && $count==0)
	{
		?>
		<script>
		window.location.href="forgot_pwd.php?toemail=<?php echo $_POST['txt_email'];?>";
		</script>
		<?php
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
            <div id="reset_pwd">
				<fieldset >
					<legend align="left" class="green">Reset Password</legend>
					<input type="text" name="txt_email" id="txt_email" class="txt" placeholder="Email ID">
					<span class="error" id="unm"><?php echo $alertemail;?></span>
					<br>*A link to reset your password will be sent to the email address.
					<br><br>
					<input type='submit' name='btn_submit' value='Submit' id="submit" class="btn btn-lg btn-primary btn-block" />
				</fieldset>
			</div>
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
			$("#unm").html("Enter Email Id");
			$("#txt_email").focus();
			return false;
		}
		else
		{
			$("#unm").html("");
		}
	});
});
</script>