<?php include('header.php');

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
          <li class="active"><a href="ourmission.php">Our Mission</a></li>
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
<div class="maintitle">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="aboutright pull-left">
          <h4>Our Mission</h4>
        </div>
        <div class="aboutleft pull-right"> <span><a href="index.php">Home</a> / </span><span>Our Mission</span> </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="content">
    <div class="row">
      <div class="col-sm-12">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php');

?>