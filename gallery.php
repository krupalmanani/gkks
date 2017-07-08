<?php
	include("header.php");
?>
<script type="text/javascript">
$(document).ready(function() {
    $(".filter").click(function(){
		var cat=$(this);
		var category=cat.attr("id");
		$.ajax({
			type:"GET",
			url:"fgallery.php",
			data:{category:category},
			dataType:"html",
			success:function(data){
				$("#record").hide();
				$("#result").html(data);
			}
		});
	});
	$(".events").click(function(){
		var evt=0;
		$.ajax({
			type:"GET",
			url:"fgallery.php",
			data:{evt:evt},
			dataType:"html",
			success: function(data){
				$("#record").hide();
				$("#result").html(data);
			}
		});
	});
	$(".all").click(function(){
		var all=0;
		$.ajax({
			type:"GET",
			url:"fgallery.php",
			data:{all:all},
			dataType:"html",
			success: function(data){
				$("#record").hide();
				$("#result").html(data);
			}
		});
	});
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
          <li class="active"><a href="gallery.php">Gallery</a></li>
          <li><a href="contactus.php">Contact us</a></li>
        </ul>
      </div><!--/.nav-collapse --> 
    </div> <!--/.container-fluid -->
  </div><!--/.Container-->
</nav>
<div class="shedow text-center"> <img src="img/shadow.png" alt=""/> </div>

<div class="maintitle">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="aboutright pull-left">
          <h4>Gallery</h4>
        </div>
        <div class="aboutleft pull-right"> <span><a href="index.php">Home</a> / </span><span>Gallery</span> </div>
        <div class="clr"></div>
      </div>
    </div><!--/Row-->
  </div><!--/Container-->
</div><!--/.main title-->
<div class="inquiry_content">
    <div class="container">
        <div class="content">
            <div class="row">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                    <div>
                    <ul class="nav navbar-nav" style="text-align:center">
                    <li><a href="#" class="all">All</a></li>
                    <?php
                    $sql_cat=mysql_query("select * from tbl_category where cat_status='1' order by cat_name");
                    while($row_cat=mysql_fetch_array($sql_cat))
                    {
                    ?>
                    <li><a href="#" id="<?php echo $row_cat['cat_id'];?>" class="filter"><?php echo $row_cat['cat_name'];?></a></li>
                    <?php }?>
                    <li><a href="#" class="events">Events</a></li>
                    </ul>
                    </div>
                    </div>
                </nav>
                </div>
                <div class="row">
                <div id="result"></div>
                <div id="record"> <br />
                
                <?php
                include("loaddatagallery.php");
                ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php");?>
