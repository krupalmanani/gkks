<?php
include("header.php");
?>
<?php
	$sql_pro=mysql_query("select * from tbl_member where member_id='$_SESSION[member_id]'");
	$row_pro=mysql_fetch_array($sql_pro);
?>
<?php
	if(isset($_POST['btn_submit']))
	{
		$email=trim($_POST['txt_email']);
		$pass=trim($_POST['txt_password']);
		$fname=trim($_POST['txt_fname']);
		$mname=trim($_POST['txt_mname']);
		$sname=trim($_POST['txt_sname']);
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
		$img=$_FILES['file_img']['tmp_name'];
		
		
				
		if($_POST['ddl_area']=="Other")
		{
			$a=$_POST['txt_area'];
		}
		else
		{
			$a=$_POST['ddl_area'];
		}
		
		if($_FILES['file_img']['tmp_name']=='')
		{
			$hidden=$_POST['txt_photo'];
		}
		else
		{
			$file=$_FILES['file_img']['name'];
			$dest=$_POST['txt_photo'];
			$src=$_FILES['file_img']['tmp_name'];
			move_uploaded_file($src,$dest);
			$hidden=$dest;
		}
		$sql_u=mysql_query("select * from tbl_member where member_email='$_POST[txt_email]' and member_id!='$_SESSION[member_id]'");
		$row_u=mysql_fetch_array($sql_u);
		
		if($row_u>0)
		{
			$a_alert="Email Id ".$email." Already Exist";
		}
		else
		{			
			mysql_query("update tbl_member set member_first_name='$fname',member_middle_name='$mname',member_surname='$sname',member_gender='$gender',member_dob='$dob',member_type='$type',member_education='$edu',member_company_name='$cname',member_designation='$desig',member_office_address='$cadd',member_city='$city',member_state='$state',member_country='$country',member_area='$area',member_address='$radd',member_mobile='$mo',member_email='$email',member_photo='$hidden' where member_id='$_SESSION[member_id]'");
			
			echo '<script>sweetAlert("", "Profile Updated Successfully", "success");</script>';
			
			//header("location:changeprofile.php");
		}
	}
?>

<?php
$count=0;
if(isset($_POST['btn_password']))
{
	$sql=mysql_query("select * from tbl_member where member_id='$_SESSION[member_id]'");
	$row=mysql_fetch_array($sql);
	
	$old=trim($_POST['txt_old']);
	$new=trim($_POST['txt_new']);
	$confirm=trim($_POST['txt_confirm']);
	
	if($old=='')
	{
		$a_old="Enter old password";
		$count++;
	}
	elseif($old!=$row['member_password'])
	{
		$a_match="Password not match";
		$a_old='';
		$count++;
	}
	if($new=='')
	{
		$a_new="Enter new password";
		$count++;
	}
	elseif(strlen($new)<5 || strlen($new)>15)
	{
		$alertpwd="Input length is 5 to 15 characters.";
		$count++;	
	}
	if($confirm=='')
	{
		$a_confirm="Enter Confirm password";
		$count++;
	}
	elseif($new!=$confirm)
	{
		$match="Password is not match";
		$a_confirm='';
		$count++;
	}
}
?>
<?php
if(isset($_POST['btn_password']) and $count==0)
{
	mysql_query("update tbl_member set member_password='$_POST[txt_new]' where member_id='$_SESSION[member_id]'");
	
	echo '<script>alert("Password Updated Successfully")</script>';
	header("location:matrimonial.php");
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
          <h4>Change Profile</h4>
        </div>
        <div class="aboutleft pull-right"> <span><a href="index.php">Home</a> / </span><span>Setting</span> </div>
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
            <input class="txt" type="email" name="txt_email" id="txt_email" value="<?php echo $row_pro['member_email'];?>"  placeholder="email"/>
            <span class="error" id="email"><?php echo $a_alert;?></span> </div>
          <h5>Personal Information</h5>
          <div>
            <input type="text" name="txt_fname" id="txt_fname" class="txt" onkeypress="return textonly(event);" value="<?php echo $row_pro['member_first_name'];?>" placeholder="first name" />
            <span class="error" id="fnm"></span> </div>
          <div>
            <input type="text" name="txt_mname" id="txt_mname" class="txt" onkeypress="return textonly(event);" value="<?php echo $row_pro['member_middle_name'];;?>"  placeholder="middle name"/>
            <span class="error" id="mnm"></span> </div>
          <div>
            <input type="text" name="txt_sname" id="txt_sname" class="txt" onkeypress="return textonly(event);" value="<?php echo $row_pro['member_surname'];?>"  placeholder="last name"/>
            <span class="error" id="snm"></span> </div>
          <div>
            <select name="ddl_gender" class="txt" id="ddl_gender">
              <option><?php echo $row_pro['member_gender'];?></option>
              <?php if($row_pro['member_gender']!='Male'){?>
              <option>Male</option>
              <?php }if($row_pro['member_gender']!='Female'){?>
              <option>Female</option>
              <?php } ?>
            </select>
            <span class="error" id="gender"></span> </div>
          <div>
            <h4> Date Of Birth: </h4>
            <?php $date=explode("-","$row_pro[member_dob]"); $y=$date[0]; $m=$date[1]; $d=$date[2];?>
            <select name="ddl_year" class="txtbirthbox" id="ddl_year">
              <option><?php echo $y;?></option>
              <?php 
	$year=date('Y');
	for($a=1980;$a<=$year;$a++)
	{
		if($y!=$a)
		{
			echo '<option value="'.$a.'">'.$a.'</option>';
		}
	}
	?>
            </select>
            <select name="ddl_month" class="txtbirthbox" id="ddl_month">
              <option><?php echo $m;?></option>
              <?php
	for($month=1;$month<=12;$month++)
	{
		if($m!=$month)
		{
			echo '<option value="'.$month.'">'.$month.'</option>';
		}
	}
	?>
            </select>
            <select name="ddl_day" id="ddl_day" class="txtbirthbox">
              <option><?php echo $d;?></option>
              <?php
	for($day=1;$day<=31;$day++)
	{
		if($d!=$day)
		{
			echo '<option value="'.$day.'">'.$day.'</option>';
		}
	}
	?>
            </select>
            <span class="error" id="dob"></span> </div>
          <h5>Education & Company/Office Information</h5>
           <div>
          <select name="ddl_type" id="ddl_type" class="txt">
          <option><?php echo $row_pro['member_type'];?></option>
          <?php if($row_pro['member_type']!='IT Professional'){?>
          <option>IT Professional</option>
          <?php }?>
          <?php if($row_pro['member_type']!='Doctor'){?>
          <option>Doctor</option>
          <?php }?>
          <?php if($row_pro['member_type']!='Civil Engineer'){?>
          <option>Civil Engineer</option>
          <?php }?>
          <?php if($row_pro['member_type']!='Goverment Employee'){?>
          <option>Goverment Employee</option>
          <?php }?>
          <?php if($row_pro['member_type']!='Any Graduate'){?>
          <option>Any Graduate</option>
          <?php }?>
          </select>
          <span class="error" id="type"></span>
          </div>
          <div>
            <input type="text" class="txt" name="txt_education" id="txt_education" onkeypress="return textonly(event);" value="<?php echo $row_pro['member_education'];?>"  placeholder="Education"/>
            <span class="error" id="education"></span> </div>
          <div>
            <input type="text" class="txt" name="txt_cname" id="txt_cname" onkeypress="return textonly(event);" value="<?php echo $row_pro['member_company_name'];?>"  placeholder="company name"/>
            <span class="error" id="cname"></span> </div>
          <div>
            <input type="text" class="txt" name="txt_designation" id="txt_designation" onkeypress="return textonly(event);" value="<?php echo $row_pro['member_designation'];?>"  placeholder="Designation"/>
            <span class="error" id="designation"></span> </div>
          <div>
            <textarea class="txt msg" name="txt_caddress" id="txt_caddress" cols="20" rows="3"  placeholder="company/office address"><?php echo $row_pro['member_office_address'];?></textarea>
            <span class="error" id="caddress"></span> </div>
          <h5>Contact Information</h5>
          <div class="row">
            <div class="col-sm-4">
              <input class="txt" type="text" name="txt_city" id="txt_city" onkeypress="return textonly(event);" value="<?php echo $row_pro['member_city'];?>"  placeholder="City"/>
              <span class="error" id="city"></span> </div>
            <div class="col-sm-4 ma">
              <input class="txt" type="text" name="txt_state" id="txt_state" onkeypress="return textonly(event);" value="<?php echo $row_pro['member_state'];?>"  placeholder="State"/>
              <span class="error" id="state"></span> </div>
            <div class="col-sm-4">
              <input class="txt" type="text" name="txt_country" id="txt_country" onkeypress="return textonly(event);" value="<?php echo $row_pro['member_country'];?>"  placeholder="Country"/>
              <span class="error" id="country"></span> </div>
          </div>
          <div>
            <select class="txt" id="ddl_area" name="ddl_area" onChange="area()">
              <option><?php echo $row_pro['member_area'];?></option>
              <?php if($row_pro['member_area']!='Nirnaynagar'){?>
              <option value="Nirnaynagar">Nirnaynagar</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Satellite'){?>
              <option value="Satellite">Satellite</option>
              <?php } ?>
              <?php if($row_pro['member_area']!='Jivrajpark'){?>
              <option value="Jivrajpark">Jivrajpark</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Bhapunagar'){?>
              <option value="Bhapunagar">Bhapunagar</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Naroda'){?>
              <option value="Naroda">Naroda</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Vastrapur'){?>
              <option value="Vastrapur">Vastrapur</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Ghatlodiya'){?>
              <option value="Ghatlodiya">Ghatlodiya</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Chandlodiya'){?>
              <option value="Chandlodiya">Chandlodiya</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Ranip'){?>
              <option value="Ranip">Ranip</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Ellisbridge'){?>
              <option value="Ellisbridge">Ellisbridge</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Bopal'){?>
              <option value="Bopal">Bopal</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Isanpur'){?>
              <option value="Isanpur">Isanpur</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Sabarmati'){?>
              <option value="Sabarmati">Sabarmati</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Nava Vadaj'){?>
              <option value="Nava Vadaj">Nava Vadaj</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Juna Vadaj'){?>
              <option value="Juna Vadaj">Juna Vadaj</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Maninagar'){?>
              <option value="Maninagar">Maninagar</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Kankariya'){?>
              <option value="Kankariya">Kankariya</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Meghaninagar'){?>
              <option value="Meghaninagar">Meghaninagar</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Naranpura'){?>
              <option value="Naranpura">Naranpura</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Memnagar'){?>
              <option value="Memnagar">Memnagar</option>
              <?php }?>
              <?php if($row_pro['member_area']!='New Ranip'){?>
              <option value="New Ranip">New Ranip</option>
              <?php }?>
              <?php if($row_pro['member_area']!='Gandhinagar'){?>
              <option value="Gandhinagar">Gandhinagar</option>
              <?php }?>
              <option value="Other">Other</option>
            </select>
            <span class="error" id="area"></span>
            </div>
            <div id="other_area">
          	<input type="text" name="txt_area" id="txt_area" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_area'];?>" class="txt" placeholder="Area">
            <span class="error" id="ara"></span>
          </div>
          <div>
            <textarea class="txt msg" name="txt_raddress" id="txt_raddress" cols="20" rows="3"  placeholder="residance address"><?php echo $row_pro['member_address'];?></textarea>
            <span class="error" id="raddress"></span> </div>
          <div>
            <input class="txt" type="text" name="txt_mobile" id="txt_mobile" value="<?php echo $row_pro['member_mobile'];?>" max="10"  placeholder="Mobile no."/>
            <span class="error" id="mobile"></span> </div>
          
          <div>
          <input type="hidden" name="txt_photo" value="<?php echo $row_pro['member_photo'];?>">
          <div class="fileUpload btn btn-primary"> <span>Upload Photo</span>
          	<input type="file" class="upload" value="<?php echo $_POST['file_img'];?>" name="file_img" id="file_img"/>
          </div>
            <img src="<?php echo $row_pro['member_photo'];?>" height="60" width="60" class="thumbnail" onError="this.src='image/NoImage.gif';">
            <span class="error" id="photo"><?php echo $alertimg;?></span>
          </div>
          <div>
            <input type="submit" name="btn_submit" value="Update" id="submit" class="btn btn-default"/>
            <input type="reset" name="btn_reset" value="Clear" class="btn btn-default"/>
          </div>
        </form>
      </div>
    </div>
    
   <div class="row">
   <div class="col-sm-4">
        <div class="col-sm-12">
          <div class="loginbox content">
        <form class="form-signin" method="post">
            <input type="password" placeholder="Old Password" class="form-control" name="txt_old" id="txt_old" value="<?php echo $_POST['txt_old'];?>">
        <span class="error" id="old"><?php echo $a_old,$a_match;?></span>

        <input type="password" placeholder="New Password" class="form-control" name="txt_new" id="txt_new" value="<?php echo $_POST['txt_new'];?>">
        <span class="error" id="new"><?php echo $a_new,$alertpwd;?></span>
        
        <input type="password" placeholder="Confirm Password" class="form-control" name="txt_confirm" id="txt_confirm" value="<?php echo $_POST['txt_confirm'];?>">
        <span class="error" id="confirm"><?php echo $a_confirm,$match;?></span>
        
		<input type="submit" name="btn_password" id="login" class="btn btn-lg btn-primary btn-block" value="Change">
          </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$("#other_area").hide();
	$("#login").click(function (){
		var old=$("#txt_old").val();
		if(old=='')
		{
			$("#old").html("Enter Old Password");
			$("#txt_old").focus();
			return false;
		}
		else
		{
			$("#old").html("");
		}
		
		var newpwd=$("#txt_new").val();
		if(newpwd=='')
		{
			$("#new").html("Enter New Password");
			$("#txt_new").focus();
			return false;
		}
		else
		{
			$("#new").html("");
		}
		
		var confirmpwd=$("#txt_confirm").val();
		if(confirmpwd=='')
		{
			$("#confirm").html("Enter Confirm Password");
			$("#txt_confirm").focus();
			return false;
		}
		else if(newpwd!=confirmpwd)
		{
			$("#confirm").html("Confirm Password not Match");
			$("#txt_confirm").focus();
			return false;
		}
		else
		{
			$("#confirm").html("");
		}
	});
	$("#submit").click(function (){
	var unm=$("#txt_uname").val();
	if(unm=='')
	{
		$("#unm").html("Ente User Name");
		$("#txt_uname").focus();
		return false;
		
	}
	else if(unm.length<3 || unm.length>25)
	{
		$("#unm").html("your username must be between 3 and 25 characters long.");
		$("#txt_uname").focus();
		return false;
	}
	else
	{
		$("#unm").html("");
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
		$("#pass").html("Password atleast 5 Character long.");
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
		$("#fnm").html("Firstname atleast 3 character long");
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
		$("#mnm").html("Middlename atleast 3 character long");
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
		$("#snm").html("Last Name atleast 3 character long");
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
	else if(edu.length<2 || edu.length>20)
	{
		$("#education").html("Education must be 2 to 20 character long");
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
	else if(company.length<3 || company.length>20)
	{
		$("#cname").html("Company Name must be 3 to 20 character long");
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
	else if(desig.length<3 || desig.length>20)
	{
		$("#designation").html("Designation Name atleast 3 to 20 character long");
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
	else if(cadd.length<10 || cadd.length>100)
	{
		$("#caddress").html("Address atleast 10 character long");
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
	else if(cadd.length<10 || cadd.length>100)
	{
		$("#caddress").html("Address atleast 10 character long");
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
		$("#other_area").show();
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
		$("#raddress").html("Enter Residential Address");
		$("#txt_raddress").focus();
		return false;
	}
	else if(radd.length<10 || radd.length>100)
	{
		$("#raddress").html("Address atleast 10 character long");
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
	else if(mo.length<10)
	{
		$("#mobile").html("Number must be 10 character long");
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
		$("#email").html("Enter Email Id");
		$("#txt_email").focus();
		return false;
	}
	else
	{
		$("#email").html("");
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