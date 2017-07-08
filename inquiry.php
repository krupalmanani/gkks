<?php include('header.php');?>
<?php
if(isset($_POST['btn_submit']))
{
	$snm=trim($_POST['txt_name']);
	$city=trim($_POST['txt_city']);
	$state=trim($_POST['txt_state']);
	$country=trim($_POST['txt_country']);
	$mo=trim($_POST['txt_mobile']);
	$email=trim($_POST['txt_email']);
	$msg=trim($_POST['txt_message']);
	
	mysql_query("insert into tbl_inquiry values('','$snm','$city','$state','$country','$mo','$email','$msg')");
	echo '<script>sweetAlert("Inquiry sent Successfully", "", "success");</script>';
	
	$ToEmail = 'rviparmar18@yahoo.com'; 
	$EmailSubject = 'Inquiry'; 
	$mailheader = "From: ".$email."\r\n"; 
	$mailheader .= "Reply-To: ".$email."\r\n"; 
	$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	$MESSAGE_BODY = "Name: ".$snm."";
	$MESSAGE_BODY = "City: ".$city.""; 
	$MESSAGE_BODY = "State: ".$state."";
	$MESSAGE_BODY = "Country: ".$country."";
	$MESSAGE_BODY = "Mobile No: ".$mo."";
	$MESSAGE_BODY .= "Email: ".$email.""; 
	$MESSAGE_BODY .= "Message: ".nl2br($msg).""; 
	mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 
	
	$_POST['txt_name']='';
	$_POST['txt_city']='';
	$_POST['txt_state']='';
	$_POST['txt_country']='';
	$_POST['txt_mobile']='';
	$_POST['txt_email']='';
	$_POST['txt_message']='';
}
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
          <li class="active"><a href="inquiry.php">Inquiry</a></li>
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
          <h4>Inquiry</h4>
        </div>
        <div class="aboutleft pull-right"> <span><a href="index.php">Home</a> / </span><span>Inquiry</span> </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>
<div class="container">
<div class="content">
  <div class="row">
    <div class="col-sm-12">
      <div class="form_title">
        <h4>Fill up the form</h4>
      </div>
    </div>
  </div>
  
  <div class="row">
    <form method="post">
      <div class="col-sm-6">
        <input type="text" name="txt_name" id="txt_name" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_name'];?>" class="txt" placeholder="person name"/>
            
            <span class="error" id="pnm"></span>
            <input type="text" name="txt_city" id="txt_city" class="txt" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_city'];?>" placeholder="city" />
            <span class="error" id="city"></span>
             
             <input type="text" name="txt_state" id="txt_state" class="txt" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_state'];?>" placeholder="state" />
             <span class="error" id="state"></span>
             
               <input type="text" name="txt_country" id="txt_country" class="txt"  onkeypress="return textonly(event);" value="<?php echo $_POST['txt_country'];?>" placeholder="country"/>
               <span class="error" id="country"></span>
      </div>
      <div class="col-sm-6">
        <div class="inquiry_btn">
          <input type="text" name="txt_mobile" id="txt_mobile" class="txt" value="<?php echo $_POST['txt_mobile'];?>" placeholder="mobile" />
                <span class="error" id="mobile"></span>
                
                    <input name="txt_email" id="txt_email" class="txt" value="<?php echo $_POST['txt_email'];?>" placeholder="email"/>
                    <span class="error" id="email"></span>
                    
                    <textarea class="msg txt" name="txt_message" id="txt_message" placeholder="message"><?php echo $_POST['txt_message'];?></textarea>
                    <span class="error" id="message"></span>
                    <input type="reset" name="txt_person" class="btn btn-default pull-right" onClick="clear_all()" value="Reset"/>
                    <input type="submit" name="btn_submit" class="btn btn-default pull-right" value="Submit" id="submit"/>
        </div>
      </div>
    </form>
  </div>
  </div>
</div>

<?php include('footer.php');?>
<script type="text/javascript">
$(document).ready(function() {
    $("#submit").click(function(){
		
	var nm=$("#txt_name").val();
	if(nm=='')
	{
		$("#pnm").html("Enter Your Name");
		$("#txt_name").focus();
		return false;
	}
	else if(nm.length<3 || nm.length>20)
	{
		$("#pnm").html("Name atleast 3 to 20 character long");
		$("#txt_name").focus();
		return false;
	}
	else
	{
		$("#pnm").html("");
	}
	
	var ct=$("#txt_city").val();
	if(ct=='')
	{
		$("#city").html("Enter City");
		$("#txt_city").focus();
		return false;
	}
	else if(ct.length<3 || ct.length>20)
	{
		$("#city").html("City atleast 3 to 20 character long");
		$("#txt_city").focus();
		return false;
	}
	else
	{
		$("#city").html("");
	}
	
	var state=$("#txt_state").val();
	if(state=='')
	{
		$("#state").html("Enter State");
		$("#txt_state").focus();
		return false;
	}
	else if(state.length<3 || state.length>20)
	{
		$("#state").html("State atleast 3 to 20 character long");
		$("#txt_state").focus();
		return false;
	}
	else
	{
		$("#state").html("");
	}
	
	var country=$("#txt_country").val();
	if(country=='')
	{
		$("#country").html("Enter Country");
		$("#txt_country").focus();
		return false;
	}
	else if(country.length<3 || country.length>20)
	{
		$("#country").html("Country atleast 3 to 20 character long");
		$("#txt_country").focus();
		return false;
	}
	else
	{
		$("#country").html("");
	}
	
	var mobile=$("#txt_mobile").val();
	if(mobile=='')
	{
		$("#mobile").html("Enter Your Mobile no.");
		$("#txt_mobile").focus();
		return false;
	}
	else if(mobile.length<5 || mobile.length>10)
	{
		$("#mobile").html("Mobile atleast 5 to 10 character long");
		$("#txt_mobile").focus();
		return false;
	}
	else
	{
		$("#mobile").html("");
	}
	
	var email=$("#txt_email").val();
	if(email=='')
	{
		$("#email").html("Enter Email");
		$("#txt_email").focus();
		return false;
	}
	else
	{
		$("#email").html("");
	}
	
	var msg=$("#txt_message").val();
	if(msg=='')
	{
		$("#message").html("Enter Your Message");
		$("#txt_message").focus();
		return false;
	}
	else if(msg.length<5)
	{
		$("#message").html("Message atleast 5 character long");
		$("#txt_message").focus();
		return false;
	}
	else
	{
		$("#message").html("");
	}
	
	});
	
	$("#txt_mobile").keydown(function (e) {
	// Allow: backspace, delete, tab, escape, enter and .
	if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
		 // Allow: Ctrl+A
		(e.keyCode == 65 && e.ctrlKey === true) ||
		 // Allow: Ctrl+C
		(e.keyCode == 67 && e.ctrlKey === true) ||
		 // Allow: Ctrl+X
		(e.keyCode == 88 && e.ctrlKey === true) ||
		 // Allow: home, end, left, right
		(e.keyCode >= 35 && e.keyCode <= 39)) {
			 // let it happen, don't do anything
			 return;
	}
	// Ensure that it is a number and stop the keypress
	if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		e.preventDefault();
	}
   
	});
});

function textonly(e){
var code;
if (!e) var e = window.event;
if (e.keyCode) code = e.keyCode;
else if (e.which) code = e.which;
var character = String.fromCharCode(code);
//alert('Character was ' + character);
    //alert(code);
    //if (code == 8) return true;
    var AllowRegex  = /^[\ba-zA-Z\s-]$/;
    if (AllowRegex.test(character)) return true;    
    return false;
}

function clear_all()
{
	document.getElementById("txt_name").defaultValue="";
	document.getElementById("txt_city").defaultValue="";
	document.getElementById("txt_state").defaultValue="";
	document.getElementById("txt_country").defaultValue="";
	document.getElementById("txt_mobile").defaultValue="";
	document.getElementById("txt_email").defaultValue="";
	document.getElementById("txt_message").defaultValue="";
	document.getElementById("pnm").innerHTML="";
	document.getElementById("city").innerHTML="";
	document.getElementById("state").innerHTML="";
	document.getElementById("country").innerHTML="";
	document.getElementById("mobile").innerHTML="";
	document.getElementById("email").innerHTML="";
	document.getElementById("message").innerHTML="";
}
</script>
