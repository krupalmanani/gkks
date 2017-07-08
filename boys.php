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
          <li class="active"><a href="matrimonial.php">Matrimonial</a></li>
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
            <h4><a href="brides.php" class="a">Bride List</a> <a href="boys.php" class="a" style="text-decoration:underline;color:#30527C">Groom List</a></h4>
          </div>
          <div class="aboutleft pull-right"> <span><a href="index.php">Home</a> / </span><span><a href="matrimonial.php">Matrimonial</a> / </span><span>Groom</span> </div>
          <div class="clr"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
  <div class="content">
  <div class="row">
  <fieldset>
  <legend align="left" class="green">Search</legend>
  <div class="col-md-2 ma1"><input type="text" name="txt_city" id="txt_city" placeholder="City" class="txt"></div>
  <div class="col-md-2 ma1"><input type="text" name="txt_edu" id="txt_edu" placeholder="Education" class="txt"></div>
  <div class="col-md-2 ma1"><input type="text" name="txt_name" id="txt_name" placeholder="Name" class="txt"></div>
  <div class="col-md-2 ma1"><input type="text" name="txt_from" id="txt_from" placeholder="From Age" class="txt"></div>
  <div class="col-md-2 ma1"><input type="text" name="txt_to" id="txt_to" placeholder="To Age" class="txt"></div>
  <div class="col-md-2"><input type="button" name="btn_submit" id="search" value="Search" class="btn btn-sm btn-primary btn-block"></div>
  </fieldset>
  </div>
  </div>
   <div class="content">
  <div class="row">
  <div id="result"></div>
    <div id="record">
        <?php
		$sql=mysql_query("select * from tbl_metrimonial where gender='Male' and status='1'");
		if(mysql_affected_rows()){
		while($row=mysql_fetch_array($sql))
		{
		?>
        <div class="col-sm-6">
        <div class="post-row">
        <div class="left-meta-post">
        <img style="height: 130px;" alt="<?php echo $row['first_name']." ".$row['last_name'];?>" title="<?php echo $row['first_name']." ".$row['last_name'];?>" src="<?php echo $row['photo'];?>" onError="this.src='image/NoImage.gif';">
        </div>
        
        <!--<div class="post-content">-->
        <div class="post-content-details">
        <h3 class="post-title con"><?php echo $row['first_name']." ".$row['last_name'];?></h3>
        <p><span class="first">Education</span> <span>:  <?php echo $row['education'];?></span></p>
        <p><span class="first">Date of Birth</span> <span>:  <?php echo $row['dob'];?></span></p>
        <p><span class="first">Occupation</span> <span>:  <?php echo $row['occupation'];?></span></p>
        <p><span class="first">City</span> <span>:  <?php echo $row['present_location'];?></span></p>
        <a class="view_btn" style="background-color: #4BAC48; padding:4px 12px;color: #fff;" href="profiledetail.php?did=<?php echo $row['matrimonial_id'];?>"><span>View Profile</span></a></p></div></div></div>
        <?php
		}
		}
		else{
			echo '<div class="alert alert-info"><strong>Alert! </strong>Records Not Found</div>';
		}
		?>
    	</div>
      </div>
      </div>
   </div>
 </div>
<?php include("footer.php");?>
<script type="text/javascript">
$(document).ready(function() {
    $("#search").click(function(){
		var city=document.getElementById("txt_city").value;
		var city=city.trim();
		var edu=document.getElementById("txt_edu").value;
		var edu=edu.trim();
		var name=document.getElementById("txt_name").value;
		var name=name.trim();
		var from=document.getElementById("txt_from").value;
		var from=from.trim();
		var to=document.getElementById("txt_to").value;
		var to=to.trim();
		$.ajax({
			type:"GET",
			url:"searchgroom.php",
			data:{city:city,edu:edu,name:name,from:from,to:to},
			dataType:"html",
			success:function(data){
				$("#record").hide();
				$("#result").html(data);
			}
		});
	});
});
</script>