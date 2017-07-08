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
          <li class="active"><a href="contactus.php">Contact us</a></li>
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
          <h4>Contactus</h4>
        </div>
        <div class="aboutleft pull-right"> <span><a href="index.php">Home</a> / </span><span>Contactus</span> </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>
<div class="contact_content">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 text-justify">
        <div class="contactbox">
          <div class="contactleftbar">
            <h4 class="green">GKKS</h4>
            <p> Gurjar Kshatriya Kadia Sarvajanik Trust
              Bhimjipura, N Wadaj, N Wadaj, Ahmedabad, Gujarat 380013</p>
          </div>
          <div class="contactleftbar">
            <h4 class="green">contact</h4>
            <p>+91 9998 999 777</p>
          </div>
          <h4 class="green">Email</h4>
          <p>kadiyasamaj@gmail.com</p>
          <p>kadiyasamaj@gmail.com</p>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="samajmap img-thumbnail">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3670.982043224494!2d72.56558610000002!3d23.061119899999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84802fffffff%3A0xc4fc9cc5100bf07f!2sGurjar+Kshatriya+Kadia+Sarvajanik+Trust!5e0!3m2!1sen!2sin!4v1439363025743" width="600" height="450" frameborder="0" style="border:0"  allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php');

?>