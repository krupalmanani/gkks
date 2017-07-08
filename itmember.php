<?php include("header.php");?>
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
            <h4>IT Professional</h4>
          </div>
          <div class="aboutleft pull-right"> <span><a href="index.php">Home</a> / </span> <span>It Professional</span> </div>
          <div class="clr"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
   <div class="content">
  <div class="row">
     <div class="col-sm-12">
        <?php
		$sql=mysql_query("select * from tbl_member where member_type='IT Professional' and member_status='1'");
		if(mysql_affected_rows()){
		while($row=mysql_fetch_array($sql))
		{
		?>
        <div class="col-sm-6">
        <div class="post-row">
        <div class="left-meta-post">
        <img style="height: 130px;" class="thumbnail" alt="<?php echo $row['member_first_name']." ".$row['member_surname'];?>"  title="<?php echo $row['member_first_name']." ".$row['member_surname'];?>" src="<?php echo $row['member_photo'];?>" onError="this.src='image/NoImage.gif';">
        </div>
        
        <!--<div class="post-content">-->
        <div class="post-content-details">
        <h3 class="post-title con"><?php echo $row['member_first_name']." ".$row['member_surname'];?></h3>
        <p><span class="first">Education</span>: <span><?php echo $row['member_education'];?></span></p>
        <p><span class="first">Designation</span>: <span><?php echo $row['member_designation'];?></span></p>
        <p><span class="first">Gender</span>: <span><?php echo $row['member_gender'];?></span></p>
        <p><span class="first">Company Name</span>: <span><?php echo $row['member_company_name'];?></span></p>
        
        <a class="view_btn" style="background-color: #4BAC48; padding:4px 12px;color: #fff;" href="memberdetail.php?mid=<?php echo $row['member_id'];?>"><span>View Profile</span></a></p></div></div></div>
        <?php
		}
		}
		else
		{
			echo '<div class="alert alert-info"><strong>Alert! </strong>Records Not Found</div>';
		}
		?>
     
      </div>
      </div>
   </div>
 </div>
 </div>
<?php include("footer.php");?>