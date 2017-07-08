<?php include('header.php');

?>
<!-- Static navbar -->

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
            <h4>Events</h4>
          </div>      
        <div class="aboutleft pull-right"> <span><a href="index.php">Home</a> / </span><span>Events</span> </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>
<div class="event_content">
  <div class="container">
    <div class="content">
    
    
    <div class="row">    		
          	<h4>Upcoming Events</h4>  
                     
          <?php
		  $sql=mysql_query("select * from tbl_event where event_status='1' and start_date>now() order by start_date limit 8");
		  if(mysql_affected_rows())
		  {
			  while($row=mysql_fetch_array($sql))
			  {
			  ?>
			  <div class="col-sm-3">
				<div class="post-row">
                <div class="event_box">
				<?php 
				$photo=explode(',',"$row[event_photo]");
				$a=$photo[0];
				?>
				<a href="image/event/<?php echo $a;?>"><img src="image/event/<?php echo $a;?>" height="100%" width="100%"></a>
				<div><label>Name:</label> <?php echo $row['event_name'];?></div>
				<div><label>Start Date:</label> <?php echo $row['start_date'];?></div>
				<div><label>End Date:</label> <?php echo $row['end_date'];?></div>
				<div><label>Details:</label> <?php echo $row['event_detail'];?></div>
				</div>
				</div>
                </div>
				<?php
			  }
		  }
		  else
		  {
			  echo "Events Not Available";
		  }
		  ?>
          
        </div>
        
        <div class="row">
        <h4>Recent Events</h4>
          <?php
		  $sql_r=mysql_query("select * from tbl_event where event_status='1' and end_date<now() order by end_date desc limit 4");
		   while($row_r=mysql_fetch_array($sql_r))
		  {
		  ?>
          <div class="col-sm-3">
          	
        	<div class="post-row">
            <div class="event_box">
            <?php 
			$ph=explode(',',"$row_r[event_photo]");
			$aa=$ph[0];
			?>
            <a href="image/event/<?php echo $aa;?>"><img src="image/event/<?php echo $aa;?>" height="100%" width="100%"></a>
            <div><label>Name:</label> <?php echo $row_r['event_name'];?></div>
            <div><label>Start Date:</label> <?php echo $row_r['start_date'];?></div>
			<div><label>End Date:</label> <?php echo $row_r['end_date'];?></div>
            <div><label>Details:</label> <?php echo $row_r['event_detail'];?></div>
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
</div>
<?php include('footer.php');

?>