<?php include('header.php'); ?>
<!-- Static navbar -->

<nav class="navbar navbar-default">
  <div class="container">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
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
<div class="container">
  <div class="row">
    <div class="banner">
      <div class="col-lg-12 text-center">
        <div id="carousel-example-generic" class="carousel slide  img-thumbnail"> 
          <!-- Indicators -->
          <ol class="carousel-indicators hidden-xs">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>
          
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active"> <img class="img-responsive img-full" src="img/imagebc.png" alt="" >
              <div class="carousel-caption">
                <div class="carousel-text-box"> <img src="img/ourmission.png"/> </div>
              </div>
            </div>
            <div class="item"> <img class="img-responsive img-full" src="img/Shree-Jivraj-Bapu-Shyamwadi-Malad-Mumbai.png" alt="">
              <div class="carousel-caption">
                <div class="carousel-text-box"> <img src="img/ourmission.png"/> </div>
              </div>
            </div>
            <div class="item"> <img class="img-responsive img-full" src="img/BAPS_Dhari_Mandir_Pratishtha_Sabha_19_f.jpg" alt="">
              <div class="carousel-caption">
                <div class="carousel-text-box"> <img src="img/ourmission.png"/> </div>
              </div>
            </div>
          </div>
          
          <!-- Controls --> 
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="icon-prev"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="icon-next"></span> </a> </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="content">
        <h4 class="green">About GKKS Group Ahmedabad</h4>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <a href="#" class="btn btn-default pull-right">view more..</a>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>

<div class="secondslider">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <ul class="bxslider">
        <?php
		$sql_event=mysql_query("select * from tbl_event where event_status=1");
		while($row_event=mysql_fetch_array($sql_event))
		{
			foreach(explode(",",$row_event['event_photo']) as $photo)
			{
				?><li><img src="image/event/<?php echo $photo;?>" alt="pic" width="230px" height="200px" onError="this.src='image/NoImage.gif';"></li><?php
			}
		}
		?>
         <!-- <li></li>
          <li><img src="img/pic2.jpg" alt="pic" /></li>
          <li><img src="img/pic3.jpg" alt="pic" /></li>
          <li><img src="img/pic4.jpg" alt="pic"/></li>
          <li><img src="img/pic5.jpg" alt="pic"/></li>
          <li><img src="img/pic6.jpg" alt="pic"/></li>
          <li><img src="img/pic7.jpg" alt="pic"/></li>
          <li><img src="img/pic7.jpg" alt="pic"/></li>-->
        </ul>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php');
?>
