<?php 
	include("header.php");
	if($_SESSION['member_id']=='')
	{
		header("location:login.php?mdid=$_GET[mid]");
	}
?>

<link rel="stylesheet" href="css/colorbox.css" />
<script src="js/jquery.colorbox.js"></script>
<script>
$(document).ready(function(){
	$(".group3").colorbox({rel:'group3', transition:"fade-in", width:"43%", height:"75%"});
});
</script>

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
          <li class="dropdown active"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-hover="dropdown">Members <span class="caret"></span></a>
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
            <h4>Member Details</h4>
          </div>
          <div class="aboutleft pull-right"> <span><a href="index.php">Home</a> / </span> <span>Members / </span><span>Member Detail </div>
          <div class="clr"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="content">
      <div class="row">
      <div class="col-sm-12">
      <div class="post-row">
      <?php
	  if(isset($_GET['mid']))
	  {
		$sql=mysql_query("select * from tbl_member where member_id='$_GET[mid]'");
		$row=mysql_fetch_array($sql);
		?>
        <div class="profile_view_table">
        	<div class="profile_image">
            <a class="thumbnail group3" href="<?php echo $row['member_photo'];?>">
				<img src="<?php echo $row['member_photo'];?>" onError="this.src='image/NoImage.gif';"></a>
            </div>
            <div class="content_box">
                <div class="profile_title">                
        			<h3><?php echo $row['member_first_name']." ".$row['member_surname'];?></h3>
                    
                        <h5><strong>Personal Information</strong></h5>
                        <div class="meber_profile"><label>Gender</label> <?php echo $row['member_gender'];?></div>
                        <div class="meber_profile"><label>Date of Birth</label> <?php echo $row['member_dob'];?></div>
                        <div class="meber_profile"><label>City</label> <?php echo $row['member_city'];?></div>
                        <div class="meber_profile"><label>State</label> <?php echo $row['member_state'];?></div>
                        <div class="meber_profile"><label>Country</label> <?php echo $row['member_country'];?></div>
                        <div class="meber_profile"><label>Area</label> <?php echo $row['member_area'];?></div>
                        <div class="meber_profile"><label>Resident Address</label> <?php echo $row['member_address'];?></div>
                        <div class="meber_profile"><label>Contact No</label> <?php echo $row['member_mobile'];?></div>
                        <div class="meber_profile"><label>Email</label> <?php echo $row['member_email'];?></div>
                        <div class="meber_profile"><label>Education</label> <?php echo $row['member_education'];?></div>        
                        <h5><strong>Company / Office Info</strong></h5>
                        <div class="meber_profile"><label>Company / Office Name</label><?php echo $row['member_company_name'];?></div>
                        <div class="meber_profile"><label>Designation</label> <?php echo $row['member_designation'];?></div>
                        <div class="meber_profile"><label>Office Address</label> <?php echo $row['member_office_address'];?></div>
        		</div>
            </div>
        <?php
	  }	  
	  ?>
      </div>
      </div>
      </div>
    </div>
  </div>
</div>
<?php include("footer.php");?>