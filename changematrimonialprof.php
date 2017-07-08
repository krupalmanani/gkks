<?php include('header.php');?>
<?php
	$sql_prof=mysql_query("select * from tbl_metrimonial where matrimonial_id='$_SESSION[m_id]'");
	$row_prof=mysql_fetch_array($sql_prof);
?>
<?php
	if(isset($_POST['btn_reg']))
	{
		
		$email=trim($_POST['txt_email']);
		$fnm=trim($_POST['txt_fnm']);
		$mnm=trim($_POST['txt_mnm']);
		$lnm=trim($_POST['txt_lnm']);
		$dob=$_POST['ddl_year']."-".$_POST['ddl_month']."-".$_POST['ddl_day'];
		$height=trim($_POST['txt_height']);
		$weight=trim($_POST['txt_weight']);
		$gender=trim($_POST['ddl_gender']);
		$btype=trim($_POST['ddl_bodytype']);
		$complexin=trim($_POST['ddl_complexion']);
		$photo=trim($_FILES['file_img']['name']);
		$edu=trim($_POST['txt_education']);
		$occupation=trim($_POST['txt_occupation']);
		$income=trim($_POST['txt_income']);
		$bplace=trim($_POST['txt_bplace']);
		$grew=trim($_POST['txt_grew']);
		$present=trim($_POST['txt_present']);
		$personality=trim($_POST['txt_personality']);
		$hobby=trim($_POST['txt_hoby']);
		$pref=trim($_POST['txt_pref']);
		$fname=trim($_POST['txt_fname']);
		$mname=trim($_POST['txt_mname']);
		$mosal=trim($_POST['txt_mosal']);
		$msname=trim($_POST['txt_msname']);
		$mnative=trim($_POST['txt_mnative']);
		$brother=trim($_POST['txt_brother']);
		$sister=trim($_POST['txt_sister']);
		$family=trim($_POST['txt_family']);
		$contact=trim($_POST['txt_contact']);
		
		$sql=mysql_query("select * from tbl_metrimonial where email_id='$email' and matrimonial_id!='$_SESSION[m_id]'");

		$row=mysql_fetch_array($sql);
		if($row>0)
		{
			$a_alert="Email Id ".$email." Already Exist";
		}
		
		else
		{
			if($_FILES['file_img']['tmp_name']=='')
			{
					
				
				$hidden=$_POST['file_hidden'];
				
			}
			else
			{
				$file=$_FILES['file_img']['name'];
				$dest=$_POST['file_hidden'];
				$src=$_FILES['file_img']['tmp_name'];
				move_uploaded_file($src,$dest);
				$hidden=$dest;
			}
		 	$sql = "update tbl_metrimonial set email_id='$email',first_name='$fnm',middle_name='$mnm',last_name='$lnm',dob='$dob',height='$height',weight='$weight',gender='$gender',body_type='$btype',complexion='$complexin',photo='$hidden',education='$edu',occupation='$occupation',income='$income',place_of_birth='$bplace',grew_up_in='$grew',present_location='$present',my_personality='$personality',hobbies='$hobby',partner_preference='$pref',father_name='$fname',mother_name='$mname',mosal_name='$mosal',mosal_surname='$msname',mosal_native='$mnative',no_of_brother='$brother',no_of_sister='$sister',family_detail='$family',contact_detail='$contact' where matrimonial_id='$_SESSION[m_id]'";
			mysql_query($sql);
			
			echo '<script>sweetAlert("", "Profile Updated Successfully", "success");</script>';
			//header("location:matrimonial.php");			
		}
	}
?>
<?php
$count=0;
if(isset($_POST['btn_submit']))
{
	$new=trim($_POST['txt_new']);
	$old=trim($_POST['txt_old']);
	$confirm=trim($_POST['txt_confirm']);
	
	if($old=='')
	{
		$a_old="Enter old password";
		$count++;
	}
	elseif($old!=$row_prof['password'])
	{
		$a_match="password not match";
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
if(isset($_POST['btn_submit']) and $count==0)
{
	mysql_query("update tbl_metrimonial set password='$_POST[txt_new]' where matrimonial_id='$_SESSION[m_id]'");
	
	echo '<script>alert("Password Updated Successfully")</script>';
	header("location:matrimonial.php");
}
?>
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
          <li  class="active"><a href="matrimonial.php">Matrimonial</a></li>
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
       
        <div class="aboutleft pull-right"> <span><a href="index.php">Home</a> / </span><span><a href="matrimonial.php">Matrimonial</a></span> / <span>Change Profile</span> </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>
<div class="matrimonial_content">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 content">
        <form method="post" enctype="multipart/form-data">
          
          <div>
            <input type="email" name="txt_email" id="txt_email" value="<?php echo $row_prof['email_id'];?>" placeholder="Email" class="txt"/>
            <span class="error" id="email"><?php echo $a_alert;?></span> </div>
           
          <h4>Basic Information</h4>
          <div class="row">
          <div class="col-sm-4 ma1">
            <input type="text" name="txt_fnm" id="txt_fnm" class="txt" onkeypress="return textonly(event);" value="<?php echo $row_prof['first_name'];?>" placeholder="first name" />

          </div>
          <div class="col-sm-4 ma1">
            <input type="text" name="txt_mnm" id="txt_mnm" class="txt" onkeypress="return textonly(event);" value="<?php echo $row_prof['middle_name'];?>"  placeholder="middle name"/>
          </div>
          <div class="col-sm-4">
            <input type="text" name="txt_lnm" id="txt_lnm" class="txt" onkeypress="return textonly(event);" value="<?php echo $row_prof['last_name'];?>"  placeholder="last name"/>
             </div>
             
            </div>
            <div><span class="error" id="nm"></span></div>
          <div>
          <?php $dob=explode("-","$row_prof[dob]"); $y=$dob[0];$m=$dob[1];$d=$dob[2];
		  ?>
            <label>Date Of Birth:</label>
            <select name="ddl_year" class="txtbirthbox" id="ddl_year">
              <option><?php echo $y;?></option>
              <?php 
				$year=date('Y');
				for($a=$year-18;$a>=1980;$a--)
				{
					if($y!=$a)
					echo '<option value="'.$a.'">'.$a.'</option>';
					
				}
				?>
            </select>
            <select name="ddl_month" class="txtbirthbox" id="ddl_month">
              <option><?php echo $m;?></option>
              <?php
				for($month=1;$month<=12;$month++)
				{
					if($m!=$month)
					echo '<option value="'.$month.'">'.$month.'</option>';
				}
				?>
            </select>
            <select name="ddl_day" id="ddl_day" class="txtbirthbox">
              <option><?php echo $d;?></option>
              <?php
				for($day=1;$day<=31;$day++)
				{
					if($d!=$day)
					echo '<option value="'.$day.'">'.$day.'</option>';
				}
				?>
            </select>
            <span class="error" id="dob"></span> </div>
          <div class="row">
            <div class="col-sm-6 ma1">
              <input type="text" name="txt_height" id="txt_height" value="<?php echo $row_prof['height'];?>" placeholder="Height" class="txt" />
              <span class="error" id="height"></span> </div>
            <div class="col-sm-6">
              <input type="text" name="txt_weight" id="txt_weight" value="<?php echo $row_prof['weight'];?>" placeholder="Weight"  class="txt"/>
              <span class="error" id="weight"></span> </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <select name="ddl_gender" id="ddl_gender" class="txt">
                <option><?php echo $row_prof['gender'];?></option>
                <?php if($row_prof['gender']!='Male'){?>
                <option>Male</option>
                <?php }if($row_prof['gender']!='Female'){?>
                <option>Female</option>
                <?php }?>
              </select>
              <span class="error" id="gender"></span> </div>
            <div class="col-sm-4 ma">
              <select name="ddl_bodytype" id="ddl_bodytype" class="txt">
                <option><?php echo $row_prof['body_type'];?></option>
                <?php if($row_prof['body_type']!='Average'){?>
                <option>Average</option>
                <?php }if($row_prof['body_type']!='Slim'){?>
                <option>Slim</option>
                <?php }if($row_prof['body_type']!='Healthy'){?>
                <option>Healthy</option>
                <?php }?>
              </select>
              <span class="error" id="btype"></span> </div>
            <div class="col-sm-4">
              <select name="ddl_complexion" id="ddl_complexion" class="txt">
                <option><?php echo $row_prof['complexion'];?></option>
                <?php if($row_prof['complexion']!='Weatish'){?>
                <option>Wheatish</option>
                <?php }if($row_prof['complexion']!='Fair'){?>
                <option>Fair</option>
                <?php } if($row_prof['complexion']!='Dark'){?>
                <option>Dark</option>
                <?php }?>
              </select>
              <span class="error" id="complexion"></span> </div>
          </div>
          <div>
            <div class="fileUpload btn btn-primary"  > <span>Upload Photo</span>
      		  <input type="hidden" name="file_hidden" value="<?php echo $row_prof['photo'];?>">
              <input type="file" name="file_img" class="upload" value="<?php echo $_FILES['file_img'];?>" />
            </div>
            <img src="<?php echo $row_prof['photo'];?>" width="60" height="60" class="thumbnail" onError="this.src='image/NoImage.gif';">
          </div>
          <h4>Education / Work</h4>
          <div>
            <input type="text" class="txt" name="txt_education" id="txt_education" onKeyPress="return textonly(event);" value="<?php echo $row_prof['education'];?>" placeholder="Education" class="txt"/>
            <span class="error" id="education"></span> </div>
          <div>
            <input type="text" name="txt_occupation" id="txt_occupation" onKeyPress="return textonly(event);" value="<?php echo $row_prof['occupation'];?>" placeholder="Occupation"  class="txt"/>
            <span class="error" id="occupation"></span> </div>
          <div>
            <input type="text" name="txt_income" id="txt_income" onKeyPress="return isNumber(event)" value="<?php echo $row_prof['income'];?>" placeholder="Income"  class="txt"/>
            <span class="error" id="income"></span> </div>
          <h4>Location</h4>
          <div>
            <input type="text" name="txt_bplace" id="txt_bplace" onKeyPress="return textonly(event);" value="<?php echo $row_prof['place_of_birth'];?>" placeholder="Birth Place"  class="txt"/>
            <span class="error" id="bplace"></span> </div>
          <div>
            <input type="text" name="txt_grew" id="txt_grew" onKeyPress="return textonly(event);" value="<?php echo $row_prof['grew_up_in'];?>" placeholder="Grew up in"  class="txt"/>
            <span class="error" id="grew"></span> </div>
          <div>
            <input type="text" name="txt_present" id="txt_present" onKeyPress="return textonly(event);" value="<?php echo $row_prof['present_location'];?>" placeholder="Present Location"  class="txt"/>
            <span class="error" id="present"></span> </div>
          <h4>Information</h4>
          <div>
            <textarea name="txt_personality" id="txt_personality" placeholder="My Personality" class="txt msg"><?php echo $row_prof['my_personality'];?></textarea>
            <span class="error" id="personality"></span> </div>
          <div>
            <textarea name="txt_hoby" id="txt_hoby" placeholder="Hobbies" class="txt msg"><?php echo $row_prof['hobbies'];?></textarea>
            <span class="error" id="hoby"></span> </div>
          <div>
            <textarea name="txt_pref" id="txt_pref" placeholder="Partner Preference" class="txt msg"><?php echo $row_prof['partner_preference'];?></textarea>
            <span class="error" id="pref"></span> </div>
          <h4>Family Details:</h4>
          <div class="row">
            <div class="col-sm-6 ma1">
              <input type="text" name="txt_fname" id="txt_fname" onKeyPress="return textonly(event);" value="<?php echo $row_prof['father_name'];?>" placeholder="Father's Name"  class="txt"/>
              <span class="error" id="fname"></span> </div>
            <div class="col-sm-6">
              <input type="text" name="txt_mname" id="txt_mname" onKeyPress="return textonly(event);" value="<?php echo $row_prof['mother_name'];?>" placeholder="Mother's Name"  class="txt"/>
              <span class="error" id="mname"></span> </div>
          </div>
          <!--row end -->
          
          <div class="row">
            <div class="col-sm-4">
              <input type="text" name="txt_mosal" id="txt_mosal" onKeyPress="return textonly(event);" value="<?php echo $row_prof['mosal_name'];?>" placeholder="Mosal Name"  class="txt"/>
              <span class="error" id="mosal"></span> </div>
            <div class="col-sm-4 ma">
              <input type="text" name="txt_msname" id="txt_msname" onKeyPress="return textonly(event);" value="<?php echo $row_prof['mosal_surname'];?>" placeholder="Mosal Surname"  class="txt"/>
              <span class="error" id="msname"></span> </div>
            <div class="col-sm-4">
              <input type="text" name="txt_mnative" id="txt_mnative" onKeyPress="return textonly(event);" value="<?php echo $row_prof['mosal_native'];?>" placeholder="Mosal Native"  class="txt"/>
              <span class="error" id="mantive"></span> </div>
          </div>
          <!--row ends -->
          
          <div class="row">
            <div class="col-sm-6 ma1">
              <input type="text" name="txt_brother" id="txt_brother" onKeyPress="return isNumber(event)" maxlength="1" value="<?php echo $row_prof['no_of_brother'];?>" placeholder="No. of Brothers"  class="txt"/>
              <span class="error" id="brother"></span> </div>
            <div class="col-sm-6">
              <input type="text" name="txt_sister" id="txt_sister" onKeyPress="return isNumber(event)" maxlength="1" value="<?php echo $row_prof['no_of_sister'];?>" placeholder="No. of Sister"  class="txt"/>
              <span class="error" id="sister"></span> </div>
          </div>
          <div>
            <textarea name="txt_family" id="txt_family" placeholder="Family Details" class="msg txt"><?php echo $row_prof['family_detail'];?></textarea>
            <span class="error" id="family"></span> </div>
          <div>
            <textarea name="txt_contact" id="txt_contact" placeholder="Contact Details" class="txt msg"><?php echo $row_prof['contact_detail'];?></textarea>
            <span class="error" id="contact"></span> </div>
          <div>
          <div>
            <input type="submit" name="btn_reg" value="Submit" id="submit" class="btn btn-default"/>
            <input type="reset" name="btn_cancel" value="Cancel" class="btn btn-default" />
          </div>
        </form>
      </div>
    </div>
    
    <!-- Change Password -->
    
    <div class="col-sm-6">
      <div class="row">
        <div class="matrimoniallogin">
        <div class="col-sm-12">
          <div class="loginbox content">
            <form class="form-signin" method="post">
            <input type="password" placeholder="Old Password" class="form-control" name="txt_old" id="txt_old" value="<?php echo $_POST['txt_old'];?>">
        <span class="error" id="old"><?php echo $a_old,$a_match;?></span>

        <input type="password" placeholder="New Password" class="form-control" name="txt_new" id="txt_new" value="<?php echo $_POST['txt_new'];?>">
        <span class="error" id="new"><?php echo $a_new,$alertpwd;?></span>
        
        <input type="password" placeholder="Confirm Password" class="form-control" name="txt_confirm" id="txt_confirm" value="<?php echo $_POST['txt_confirm'];?>">
        <span class="error" id="confirm"><?php echo $a_confirm,$match;?></span>
        
        <button type="submit" name="btn_submit" id="change_profile" class="btn btn-lg btn-primary btn-block">Change</button>
          </form>
          </div>
        </div>
        </div>
      </div>
      
      <!--- Over-->
      
      <!-- Slider Start -->
      <div data-ride="carousel" class="vertical-slider carousel vertical slide col-md-12" id="myCarousel">
        <div class="row">
          <div class="col-md-4"> <span style="font-size: 20px" class="btn-vertical-slider glyphicon glyphicon-menu-up " data-slide="next"></span> </div>
          <div class="col-md-8"> </div>
        </div>
        <br>
        <!-- Carousel items -->
        <div class="carousel-inner">
          <div class="item">
            <div class="row">
              <div class="col-xs-6 col-sm-5 col-md-5"> <a href="http://dotstrap.com/"> <img alt="Image" class="thumbnail" src="img/mpic1.jpg"></a> </div>
              <div class="col-xs-6 col-sm-7 col-md-7"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                euismod tincidunt ut laoreet.. </div>
            </div>
            <!--/row-fluid--> 
          </div>
          <!--/item-->
          <div class="item">
            <div class="row">
              <div class="col-xs-6 col-sm-5 col-md-5"> <a href="http://dotstrap.com/"> <img alt="Image" class="thumbnail" src="img/mpic2.jpg"></a> </div>
              <div class="col-xs-6 col-sm-7 col-md-7"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                euismod tincidunt ut laoreet.. </div>
            </div>
            <!--/row-fluid--> 
          </div>
          <!--/item-->
          <div class="item active">
            <div class="row">
              <div class="col-xs-6 col-sm-5 col-md-5"> <a href="http://dotstrap.com/"> <img alt="Image" class="thumbnail" src="img/mpic3.jpg"></a> </div>
              <div class="col-xs-6 col-sm-7 col-md-7"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                euismod tincidunt ut laoreet.. </div>
            </div>
            <!--/row-fluid--> 
          </div>
          <!--/item--> 
        </div>
        <div class="row">
          <div class="col-md-4"> <span style="color: Black; font-size: 20px" class="btn-vertical-slider glyphicon glyphicon-menu-down" data-slide="prev"></span> </div>
          <div class="col-md-8"> </div>
        </div>
      </div>
      <!-- Sleder Over -->
    </div>
  </div>
</div>
</div>
<script type="text/javascript" src="js/matrimonial_validation.js"></script>
<script>
$(document).ready(function(e) {
    $("#change_profile").click(function (){
		
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
});
</script>
<?php include('footer.php');
?>