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
          <li  class="active"><a href="event.php">Events</a></li>
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
<div class="maintitle">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">        
          <div class="aboutright pull-left">
            <h4>Event Detail</h4>
          </div>      
        <div class="aboutleft pull-right"> <span><a href="index.php">Home</a> / </span><span><a href="event.php">Events</a> / </span><span>Event Details</span> </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>
<div class="event_content">
  <div class="container">
    <div class="content">
    <div class="row">
    <div class="col-sm-12"><a href="event.php"><img src="image/back.png" width="100px" height="40px"></a></div>
    </div>
    <div class="row"> 
    <div class="col-sm-12">
    	<div class="post-row">
        
        <div class="profile_title">
               
		<?php 
		if(isset($_GET['evtid']))
		{
			$sql=mysql_query("select * from tbl_event where event_id='$_GET[evtid]'");
			$row=mysql_fetch_array($sql);

			$photo=explode(',',"$row[event_photo]");
			$a=$photo[0];
		?>
            <div class="col-sm-4 profile_image"><img src="image/event/<?php echo $a;?>" height="100%" width="100%" class="thumbnail" onError="this.src='image/NoImage.gif';"></div>
            <div class="col-sm-8">
			<div class="meber_profile"><label><strong>Name</strong></label><?php echo $row['event_name'];?></div>
			<div class="meber_profile"><label><strong>Start Date</strong></label><?php echo $row['start_date'];?></div>
			<div class="meber_profile"><label><strong>End Date</strong></label><?php echo $row['end_date'];?></div>
			<div class="meber_profile"><label><strong>Details</strong></label><?php echo $row['event_detail'];?></div>
            </div>
            </div>
            </div>
            </div>
           <?php
           }
			?>
	</div>
    </div>
  </div>
</div>

<?php include("footer.php");?>