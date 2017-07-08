<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	ob_start();
	if($_SESSION['admin_id']=='')
	{
		header("location:../index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../image/favicon.png">
   

    <title>GKKS Admin</title>

    <!-- Bootstrap CSS -->    
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet" />
	<link href="../css/line-icons.css" rel="stylesheet" />
    <link href="../css/sweetalert.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/sweetalert.min.js" type="text/javascript"></script>
   
<script>
$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
});
/*
$(document).ready(function(){
	
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});
*/
</script>

  </head>

  <body>
  <div class="se-pre-con"></div>

  <!-- container section start -->
  <section class="" id="container">
      <!--header start-->
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div data-placement="bottom" data-original-title="Toggle Navigation" class="icon-reorder">
                
                </div>
            </div>

            <!--logo start-->
            <a href="home.php" class="logo">GKKS <span class="lite">Admin</span></a>
            <!--logo end-->

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="../image/avatar.png" height="30" width="30">
                            </span>
                            <span class="username"><?php echo $_SESSION['admin_name'];?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="change_password.php"><i class="icon_profile"></i> Change Password</a>
                            </li>
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="">
                      <a class="" href="home.php">
                          <i class="icon_house_alt"></i>
                          <span>Home</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a class="" href="javascript:;">
                          <i class="icon_document_alt"></i>
                          <span>Events</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a href="add_event.php" class="">Add Events</a></li>                          
                          <li><a href="manage_event.php" class="">Manage Events</a></li>
                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a class="" href="javascript:;">
                          <i class="icon_document_alt"></i>
                          <span>Gallery</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a href="add_gallery.php" class="">Add Gallery</a></li>                          
                          <li><a href="manage_gallery.php" class="">Manage Gallery</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="" href="javascript:;">
                          <i class="icon_document_alt"></i>
                          <span>Category</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a href="add_category.php" class="">Add Category</a></li>                          
                          <li><a href="manage_category.php" class="">Manage Category</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="" href="javascript:;">
                          <i class="icon_document_alt"></i>
                          <span>Matrimonial</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a href="manage_matrimonial.php" class="">Manage Matrimonial</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="" href="javascript:;">
                          <i class="icon_document_alt"></i>
                          <span>Member</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a href="managemember.php" class="">Manage Member</a></li>
                      </ul>
                  </li>
                   <li class="sub-menu">
                      <a class="" href="javascript:;">
                          <i class="icon_document_alt"></i>
                          <span>Inquiry</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a href="manage_inquiry.php" class="">Manage Inquiry</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

     
 