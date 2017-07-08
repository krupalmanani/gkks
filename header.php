<?php include('lib/module.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>GKKS GROUP</title>
<style type="text/css">
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
    position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(image/big-loader.gif) center no-repeat #fff;
}
</style>
<link rel="shortcut icon" href="img/logo-2.png"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/custom.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css"/>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script src="js/jquery.bxslider.js" type="text/javascript"></script>
<script src="js/bootstrap-hover-dropdown.js" type="text/javascript"></script>
<script src="js/sweetalert.min.js"></script>
<script>
$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
	
<!-- Go to top code-->
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
<!-- End -->

</script>
</head>
<body>

<!--Fb Like-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--Loading Page-->
<div class="se-pre-con"></div>

<header>
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-xs-4">
        <div class="logo"> <img src="img/logo-2.png" alt="logo"/> </div>
      </div>
      <div class="col-sm-8 col-xs-8">
        <div class="topright">
          <div class="topcontact">
            <div class="contactbc"> <a href="#" class="a">call +91 9999 888 777</a> <a href="#" class="a">email info@kadiyasamaj.org</a> </div>
            
            <!--<div class="socialicon"> <a href="#"><img src="img/facebook.png"/></a> <a href="#"><img src="img/twitter.png"/></a> <a href="#"><img src="img/google+.png"></a> </div>-->
            <div class="clr"></div>
          </div>
          <!--<div class="search">
            <input type="search" name="Search" class="searchbox" placeholder="search here...."/>
          </div>-->
          <div class="clr"></div>
         
          <div class="login">
           <?php
		  if($_SESSION['Gkks_memberId']=='')
		  {?>
          <span class="freesingup">Sing up & Free Member</span> <span>
            <input type="button" name="Btn" value="Login" class="rgbtn" onClick="window.location='login.php'"/>
            <?php
		  }
		  elseif($_SESSION['Gkks_memberId']!='')
		  {
		  ?>
          <input type="button" name="Btn" value="Logout" class="rgbtn" onClick="window.location='logout.php'"/>
          <?php
		  }
		  else
		  {?>
		<input type="button" name="Btn" value="Logout" class="rgbtn" onClick="window.location='logout.php'"/>
        <?php } ?>
        </span> 
        <span>
        <?php if($_SESSION['Gkks_memberId']==''){?>
            <input type="button" name="Btn" value="Sign up" class="lgbtn" onClick="window.location='memberregister.php'"/>
        <?php } else { ?>
        <input type="button" name="Btn" value="Setting" class="lgbtn" onClick="window.location='changeprofile.php'"/>
        <?php }?>
            </span> </div>
        </div>
      </div>
    </div>
  </div>
  
</header>
