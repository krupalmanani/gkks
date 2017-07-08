<?php
include("header.php");
?>
<?php
	$count=0;
	if(isset($_POST['btn_submit']))
	{
		$pass=trim($_POST['txt_password']);
		$fname=trim($_POST['txt_fname']);
		$mname=trim($_POST['txt_mname']);
		$sname=trim($_POST['txt_sname']);
		$relation=trim($_POST['txt_relation']);
		$gender=trim($_POST['ddl_gender']);
		$dob=trim($_POST['ddl_year'])."-".trim($_POST['ddl_month'])."-".trim($_POST['ddl_day']);
		$type=trim($_POST['ddl_type']);
		$edu=trim($_POST['txt_education']);
		$cname=trim($_POST['txt_cname']);
		$desig=trim($_POST['txt_designation']);
		$cadd=trim($_POST['txt_caddress']);
		$city=trim($_POST['txt_city']);
		$state=trim($_POST['txt_state']);
		$country=trim($_POST['txt_country']);
		$area=trim($_POST['ddl_area']);
		$radd=trim($_POST['txt_raddress']);
		$mo=trim($_POST['txt_mobile']);
		$email=trim($_POST['txt_email']);
		$img=$_FILES['file_img']['tmp_name'];
		
		$ext=strrchr($_FILES['file_img']['name'],".");
		
		if($_FILES['file_img']['tmp_name']=="")
		{
			$alertimg="Select Photo";
			$count++;
		}
		elseif($ext!=".bmp" && $ext!=".jpg" && $ext!=".jpeg" && $ext!=".png" && $ext!=".gif") 
		{
			$alertimg="Invalid Format";
			$count++;
		}
	}
?>
<?php
	if(isset($_POST['btn_submit']) and $count==0)
	{
		$sql_u=mysql_query("select * from tbl_member where member_email='$_POST[txt_email]'");
		$row_u=mysql_fetch_array($sql_u);
		
		if($row_u>0)
		{
			$a_alert="Email Id ".$email." Already Exist";
		}
		else
		{
			if($_POST['ddl_area']=="Other")
			{
				$a=$_POST['txt_area'];
			}
			else
			{
				$a=$_POST['ddl_area'];
			}
			$file=$_FILES['file_img']['name'];
			$dest="image/member/$file";
			$src=$_FILES['file_img']['tmp_name'];
			move_uploaded_file($src,$dest);
			
			mysql_query("insert into tbl_member values('','$pass','$fname','$mname','$sname','$gender','$dob','$type','$edu','$cname','$desig','$cadd','$city','$state','$country','$a','$radd','$mo','$email','$dest','0')");
			
			echo '<script>sweetAlert("", "Registration is successfully done", "success");</script>';
			
			//header("location:login.php");
			
			$_POST['txt_password']='';
			$_POST['txt_confirm']='';
			$_POST['txt_fname']='';
			$_POST['txt_mname']='';
			$_POST['txt_sname']='';
			$_POST['txt_relation']='';
			$_POST['ddl_gender']='';
			$_POST['txt_education']='';
			$_POST['txt_cname']='';
			$_POST['txt_designation']='';
			$_POST['txt_caddress']='';
			$_POST['txt_city']='';
			$_POST['txt_state']='';
			$_POST['txt_country']='';
			$_POST['txt_raddress']='';
			$_POST['txt_mobile']='';
			$_POST['txt_email']='';
			$_POST['file_img']='';
			$_POST['txt_raddress']='';
		}
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
          <h4>Register Information</h4>
        </div>
        <div class="aboutleft pull-right"> <span><a href="index.php">Home</a> / </span><span>Register info</span> </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="ragister_form content">
        <form method="post" enctype="multipart/form-data">
          
          <div>
            <input class="txt" type="email" name="txt_email" id="txt_email" value="<?php echo $_POST['txt_email'];?>"  placeholder="email"/>
            <span class="error" id="email"><?php echo $a_alert;?></span> </div>
          <div>
            <input type="password" name="txt_password" id="txt_password" class="txt" value="<?php echo $_POST['txt_password'];?>" placeholder="password"/>
            <span class="error" id="pass"></span> </div>
          <div>
            <input type="password" name="txt_confirm" id="txt_confirm" class="txt" value="<?php echo $_POST['txt_confirm'];?>" placeholder="Confirm Password" />
            <span class="error" id="conf"></span> </div>
          <h5>Personal Information</h5>
          <div class="row">
          <div class="col-sm-4">
            <input type="text" name="txt_fname" id="txt_fname" class="txt" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_fname'];?>" placeholder="first name" />
            <span class="error" id="fnm"></span> </div>
          <div class="col-sm-4 ma">
            <input type="text" name="txt_mname" id="txt_mname" class="txt" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_mname'];?>"  placeholder="middle name"/>
            <span class="error" id="mnm"></span> </div>
          <div class="col-sm-4">
            <input type="text" name="txt_sname" id="txt_sname" class="txt" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_sname'];?>"  placeholder="last name"/>
            <span class="error" id="snm"></span> </div></div>
          <div>
            <select name="ddl_gender" class="txt" id="ddl_gender">
              <option selected>Select Gender</option>
              <option>Male</option>
              <option>Female</option>
            </select>
            <span class="error" id="gender"></span> </div>
          <div>
            <h4> Date Of Birth: </h4>
            <select name="ddl_year" class="txtbirthbox" id="ddl_year">
              <option>Year</option>
              <?php 
	$year=date('Y');
	for($a=1980;$a<=$year;$a++)
	{
		echo '<option value="'.$a.'">'.$a.'</option>';
	}
	?>
            </select>
            <select name="ddl_month" class="txtbirthbox" id="ddl_month">
              <option>Month</option>
              <?php
	for($month=1;$month<=12;$month++)
	{
		echo '<option value="'.$month.'">'.$month.'</option>';
	}
	?>
            </select>
            <select name="ddl_day" id="ddl_day" class="txtbirthbox">
              <option>Day</option>
              <?php
	for($day=1;$day<=31;$day++)
	{
		echo '<option value="'.$day.'">'.$day.'</option>';
	}
	?>
            </select>
            <span class="error" id="dob"></span> </div>
          <h5>Education & Company/Office Information</h5>
           <div>
          <select name="ddl_type" id="ddl_type" class="txt">
          <option>Select Employee Type</option>
          <option>IT Professional</option>
          <option>Doctor</option>
          <option>Civil Engineer</option>
          <option>Goverment Employee</option>
          <option>Any Graduate</option>
          </select>
          <span class="error" id="type"></span>
          </div>
          <div>
            <input type="text" class="txt" name="txt_education" id="txt_education" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_education'];?>"  placeholder="Education"/>
            <span class="error" id="education"></span> </div>
          <div>
            <input type="text" class="txt" name="txt_cname" id="txt_cname" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_cname'];?>"  placeholder="company name"/>
            <span class="error" id="cname"></span> </div>
          <div>
            <input type="text" class="txt" name="txt_designation" id="txt_designation" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_designation'];?>"  placeholder="Designation"/>
            <span class="error" id="designation"></span> </div>
          <div>
            <textarea class="txt msg" name="txt_caddress" id="txt_caddress" cols="20" rows="3"  placeholder="company/office address"><?php echo $_POST['txt_caddress'];?></textarea>
            <span class="error" id="caddress"></span> </div>
          <h5>Contact Information</h5>
          <div class="row">
            <div class="col-sm-4">
              <input class="txt" type="text" name="txt_city" id="txt_city" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_city'];?>"  placeholder="City"/>
              <span class="error" id="city"></span> </div>
            <div class="col-sm-4 ma">
              <input class="txt" type="text" name="txt_state" id="txt_state" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_state'];?>"  placeholder="State"/>
              <span class="error" id="state"></span> </div>
            <div class="col-sm-4">
              <input class="txt" type="text" name="txt_country" id="txt_country" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_country'];?>"  placeholder="Country"/>
              <span class="error" id="country"></span> </div>
          </div>
          <div>
            <select class="txt" id="ddl_area" name="ddl_area" onChange="area()">
              <option>Choose Area</option>
              <option value="Nirnaynagar">Nirnaynagar</option>
              <option value="Satellite">Satellite</option>
              <option value="Jivrajpark">Jivrajpark</option>
              <option value="Bhapunagar">Bhapunagar</option>
              <option value="Naroda">Naroda</option>
              <option value="Vastrapur">Vastrapur</option>
              <option value="Ghatlodiya">Ghatlodiya</option>
              <option value="Chandlodiya">Chandlodiya</option>
              <option value="Ranip">Ranip</option>
              <option value="Ellisbridge">Ellisbridge</option>
              <option value="Bopal">Bopal</option>
              <option value="Isanpur">Isanpur</option>
              <option value="Sabarmati">Sabarmati</option>
              <option value="Nava Vadaj">Nava Vadaj</option>
              <option value="Juna Vadaj">Juna Vadaj</option>
              <option value="Maninagar">Maninagar</option>
              <option value="kankariya">kankariya</option>
              <option value="Meghaninagar">Meghaninagar</option>
              <option value="Naranpura">Naranpura</option>
              <option value="Memnagar">Memnagar</option>
              <option value="New Ranip">New Ranip</option>
              <option value="Gandhinagar">Gandhinagar</option>
              <option value="Other">Other</option>
            </select>
            <span class="error" id="area"></span>
            </div>
            <div id="other_area">
          	<input type="text" name="txt_area" id="txt_area" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_area'];?>" class="txt" placeholder="Area">
            <span class="error" id="ara"></span>
          </div>
          <div>
            <textarea class="txt msg" name="txt_raddress" id="txt_raddress" cols="20" rows="3"  placeholder="residance address"><?php echo $_POST['txt_raddress'];?></textarea>
            <span class="error" id="raddress"></span> </div>
          <div>
            <input class="txt" type="text" name="txt_mobile" id="txt_mobile" value="<?php echo $_POST['txt_mobile'];?>" max="10"  placeholder="Mobile no."/>
            <span class="error" id="mobile"></span> </div>
          
          <div>
            <div class="fileUpload btn btn-primary"  > <span>Upload Photo</span>
              <input type="file" name="file_img" id="file_img" class="upload" value="<?php echo $_POST['file_img'];?>"/>
            </div>
            <span class="error" id="photo"><?php echo $alertimg;?></span> </div>
          <div>
            <input type="submit" name="btn_submit" value="Register" id="submit" class="btn btn-default"/>
            <input type="reset" name="btn_reset" value="Clear" class="btn btn-default"/>
          </div>
        </form>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="registerbox text-justify">
        <p>for more information</p>
        <h4 class="green">GKKS</h4>
        <p> Gurjar Kshatriya Kadia Sarvajanik Trust
          Bhimjipura, N Wadaj, N Wadaj, Ahmedabad, Gujarat 380013</p>
      </div>
    </div>
  </div>
</div>
<script>

$(document).ready(function() {
	$("#other_area").hide();
	$("#submit").click(function (){
	var email=$("#txt_email").val();
	if(email=='')
	{
		$("#email").html("Enter Email Id");
		$("#txt_email").focus();
		return false;
	}
	else
	{
		$("#email").html("");
	}
	
	var pass=$("#txt_password").val();
	if(pass=='')
	{
		$("#pass").html("Enter Password");
		$("#txt_password").focus();
		return false;
	}
	else if(pass.length<5)
	{
		$("#pass").html("Password atleast 5 Characters long.");
		$("#txt_password").focus();
		return false;
	}
	else
	{
		$("#pass").html("");
	}
	
	var conf=$("#txt_confirm").val();
	if(conf=='')
	{
		$("#conf").html("Enter Confirm Password");
		$("#txt_confirm").focus();
		return false;
	}
	else if(conf!=pass)
	{
		$("#conf").html("Password Not Match");
		$("#txt_confirm").focus();
		return false;
	}
	else
	{
		$("#conf").html("");
	}
	
	var fnm=$("#txt_fname").val();
	if(fnm=='')
	{
		$("#fnm").html("Enter First Name");
		$("#txt_fname").focus();
		return false;
	}
	else if(fnm.length<3 || fnm.length>20)
	{
		$("#fnm").html("Firstname atleast 3 characters long");
		$("#txt_fname").focus();
		return false;
	}
	else
	{
		$("#fnm").html("");
	}
	
	var mnm=$("#txt_mname").val();
	if(mnm=='')
	{
		$("#mnm").html("Enter Middle Name");
		$("#txt_mname").focus();
		return false;
	}
	else if(mnm.length<3 || mnm.length>20)
	{
		$("#mnm").html("Middlename atleast 3 characters long");
		$("#txt_mname").focus();
		return false;
	}
	else
	{
		$("#mnm").html("");
	}
		
	var snm=$("#txt_sname").val();
	if(snm=='')
	{
		$("#snm").html("Enter Last Name");
		$("#txt_sname").focus();
		return false;
	}
	else if(snm.length<3 || snm.length>20)
	{
		$("#snm").html("Last Name atleast 3 characters long");
		$("#txt_sname").focus();
		return false;
	}
	else
	{
		$("#snm").html("");
	}
	
	var gen=$("#ddl_gender").val();
	if(gen=='Select Gender')
	{
		$("#gender").html("Select Gender");
		$("#ddl_gender").focus();
		return false;
	}
	else
	{
		$("#gender").html("");
	}
	
	var year=$("#ddl_year").val();
	if(year=='Year')
	{
		$("#dob").html("Select Year");
		$("#ddl_year").focus();
		return false;
	}
	else
	{
		$("#dob").html("");
	}
	
	var month=$("#ddl_month").val();
	if(month=='Month')
	{
		$("#dob").html("Select Month");
		$("#ddl_month").focus();
		return false;
	}
	else
	{
		$("#dob").html("");
	}
	
	var day=$("#ddl_day").val();
	if(day=='Day')
	{
		$("#dob").html("Select Day");
		$("#ddl_day").focus();
		return false;
	}
	else
	{
		$("#dob").html("");
	}
	
	var type=$("#ddl_type").val();
	if(type=='Select Employee Type')
	{
		$("#type").html("Select Employee Type");
		$("#ddl_type").focus();
		return false;
	}
	else
	{
		$("#type").html("");
	}
	
	var edu=$("#txt_education").val();
	if(edu=='')
	{
		$("#education").html("Enter Education");
		$("#txt_education").focus();
		return false;
	}
	else if(edu.length<2)
	{
		$("#education").html("Education atleast 2 characters long");
		$("#txt_education").focus();
		return false;
	}
	else
	{
		$("#education").html("");
	}
	
	var company=$("#txt_cname").val();
	if(company=='')
	{
		$("#cname").html("Enter Company");
		$("#txt_cname").focus();
		return false;
	}
	else if(company.length<3)
	{
		$("#cname").html("Company Name atleast 3 characters long");
		$("#txt_cname").focus();
		return false;
	}
	else
	{
		$("#cname").html("");
	}
	
	var desig=$("#txt_designation").val();
	if(desig=='')
	{
		$("#designation").html("Enter Designation");
		$("#txt_designation").focus();
		return false;
	}
	else if(desig.length<3)
	{
		$("#designation").html("Designation atleast 3 characters long");
		$("#txt_designation").focus();
		return false;
	}
	else
	{
		$("#designation").html("");
	}
	
	var cadd=$("#txt_caddress").val();
	if(cadd=='')
	{
		$("#caddress").html("Enter Company Address");
		$("#txt_caddress").focus();
		return false;
	}
	else if(cadd.length<10 || cadd.length>500)
	{
		$("#caddress").html("Address atleast 10 characters long");
		$("#txt_caddress").focus();
		return false;
	}
	else
	{
		$("#caddress").html("");
	}
	
	var cadd=$("#txt_caddress").val();
	if(cadd=='')
	{
		$("#caddress").html("Enter Company Address");
		$("#txt_caddress").focus();
		return false;
	}
	else if(cadd.length<10 || cadd.length>500)
	{
		$("#caddress").html("Address atleast 10 characters long");
		$("#txt_caddress").focus();
		return false;
	}
	else
	{
		$("#caddress").html("");
	}
	
	var city=$("#txt_city").val();
	if(city=='')
	{
		$("#city").html("Enter City");
		$("#txt_city").focus();
		return false;
	}
	else if(city.length<3 || city.length>20)
	{
		$("#city").html("City atleast 3 to 20 characters long");
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
		$("#state").html("State atleast 3 to 20 characters long");
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
		$("#country").html("Country atleast 3 to 20 characters long");
		$("#txt_country").focus();
		return false;
	}
	else
	{
		$("#country").html("");
	}
	
	var area=$("#ddl_area").val();
	if(area=='Choose Area')
	{
		$("#area").html("Select Area");
		$("#ddl_area").focus();
		return false;
	}
	else
	{
		$("#area").html("");
	}
	
	if(area=='Other')
	{
		var ara=$("#txt_area").val();
		if(ara=='')
		{
			$("#ara").html("Enter Area");
			$("#txt_area").focus();
			return false;
		}
		else if(ara.length<3 || ara.length>20)
		{
			$("#ara").html("Area Name atleast 3 characters long");
			$("#txt_area").focus();
			return false;
		}
		else
		{
			$("#ara").html("");
		}
	}
	var radd=$("#txt_raddress").val();
	if(radd=='')
	{
		$("#raddress").html("Enter Resicental Address");
		$("#txt_raddress").focus();
		return false;
	}
	else if(radd.length<10 || radd.length>500)
	{
		$("#raddress").html("Address atleast 10 characters long");
		$("#txt_raddress").focus();
		return false;
	}
	else
	{
		$("#raddress").html("");
	}
	
	var mo=$("#txt_mobile").val();
	if(mo=='')
	{
		$("#mobile").html("Enter Mobile No");
		$("#txt_mobile").focus();
		return false;
	}
	else if(mo.length<5 || mo.length>10)
	{
		$("#mobile").html("Number must be 5 to 10 characters long");
		$("#txt_mobile").focus();
		return false;
	}
	else
	{
		$("#mobile").html("");
	}
	
	var photo=$("#file_img").val();
	if(photo=='')
	{
		$("#photo").html("Select Photo");
		$("#file_img").focus();
		return false;
	}
	else
	{
		$("#photo").html("");
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
function area()
{
	var a=document.getElementById("ddl_area").value;
	if(a=='Other')
	{
		$("#other_area").show();
	}
	else
	{
		$("#other_area").hide();
	}
}
</script>
<?php include('footer.php');
?>