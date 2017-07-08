<?php include('header.php');

?>
<?php
	$count=0;
	if(isset($_POST['btn_reg']))
	{
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
	if(isset($_POST['btn_reg']) and $count==0)
	{
		echo "<pre>";
			print_r($_POST);
		echo "</pre>";
		exit;
		$email=trim($_POST['txt_email']);
		$pass=trim($_POST['txt_password']);
		$conf=trim($_POST['txt_confirm']);
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
		
		$file=$_FILES['file_img']['name'];
		$dest="image/matrimonial/$file";
		$src=$_FILES['file_img']['tmp_name'];
		move_uploaded_file($src,$dest);
		
		$sql=mysql_query("select * from tbl_metrimonial where email_id='$email'");
		$row=mysql_fetch_array($sql);
		if($row>0)
		{
			$a_alert="Email Id ".$email." Already Exist";
		}
		else
		{
			mysql_query("insert into tbl_metrimonial values('','$email','$pass','$fnm','$mnm','$lnm','$dob','$height','$weight','$gender','$btype','$complexin','$dest','$edu','$occupation','$income','$bplace','$grew','$present','$personality','$hobby','$pref','$fname','$mname','$mosal','$msname','$mnative','$brother','$sister','$family','$contact','0')");
		
			echo '<script>sweetAlert("", "Registration is successfully done", "success");</script>';
			
			$_POST['txt_email']='';
			$_POST['txt_fnm']='';
			$_POST['txt_mnm']='';
			$_POST['txt_lnm']='';
			$_POST['txt_password']='';
			$_POST['txt_confirm']='';
			$_POST['ddl_year']='';
			$_POST['ddl_month']='';
			$_POST['ddl_day']='';
			$_POST['txt_height']='';
			$_POST['txt_weight']='';
			$_POST['ddl_gender']='';
			$_POST['ddl_bodytype']='';
			$_POST['ddl_complexion']='';
			$_FILES['file_img']['tmp_name']='';
			$_POST['txt_education']='';
			$_POST['txt_occupation']='';
			$_POST['txt_income']='';
			$_POST['txt_bplace']='';
			$_POST['txt_grew']='';
			$_POST['txt_present']='';
			$_POST['txt_personality']='';
			$_POST['txt_hoby']='';
			$_POST['txt_pref']='';
			$_POST['txt_fname']='';
			$_POST['txt_mname']='';
			$_POST['txt_mosal']='';
			$_POST['txt_msname']='';
			$_POST['txt_mnative']='';
			$_POST['txt_brother']='';
			$_POST['txt_sister']='';
			$_POST['txt_family']='';
			$_POST['txt_contact']='';
		}
	}
?>
<?php
	$cnt=0;
	if(isset($_POST['btn_submit']))
	{
		$email=trim($_POST['txt_unm']);
		$pass=trim($_POST['txt_pass']);
		$sql=mysql_query("select * from tbl_metrimonial where email_id='$email'");
		$row=mysql_fetch_array($sql);

		if($email!=$row['email_id'])
		{
			$a_unm="Invalid Email Id";
			$cnt++;
		}
		if($pass!=$row['password'] and $email==$row['email_id'])
		{
			$a_pass="Invalid Password";
			$cnt++;
		}
	}
?>
<?php
	if(isset($_POST['btn_submit']) and $cnt==0)
	{
		if($row['status']==0)
		{
			$a_war="Unable to Login!";
		}
		else
		{
			if($email==$row['email_id'] and $pass==$row['password'])
			{
				$_SESSION['m_id']=$row['matrimonial_id'];
				if(isset($_GET['fid']))
				{
					header("location:profiledetail.php?did=$_GET[fid]");	
				}
				else
				{
					header("location:index.php");
				}
			}
		}
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
          <h4>Matrimonial</h4>
        </div>
       
        <div class="aboutleft pull-right"> <span><a href="index.php">Home</a> / </span><span>Matrimonial</span> </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>
<div class="matrimonial_content">
  <div class="container">
    <div class="row">
        	<span id="add"><a class="btn btn-success" href="brides.php">Matrimonial List</a></span>
            <?php if($_SESSION['m_id']!=''){?>
            <span id="add"><a class="btn btn-success" href="changematrimonialprof.php">Profile</a></span>
            <span id="add"><a class="btn btn-success" href="logout.php">Logout</a></span>
			<?php }?>
            </div>
	<div class="row">
      <div class="col-sm-6">
      <div class="row">
        <div class="matrimoniallogin">
        <div class="col-sm-12">
          <div class="loginbox content">
            <form class="form-signin" method="post">
            <input type="text" placeholder="Email Id" class="form-control" name="txt_unm" id="txt_unm" value="<?php echo $_POST['txt_unm'];?>">
        <span class="error" id="usernm"><?php echo $a_unm;?></span>

        <input type="password" placeholder="Password" class="form-control" name="txt_pass" id="txt_pass" value="<?php echo $_POST['txt_pass'];?>">
        <span class="error" id="userpass"><?php echo $a_pass,$a_war;?></span>
          <label>
          <a href="reset_pwdmatrimonial.php" target="new">forget password</a>
          </label>
        <button type="submit" name="btn_submit" id="login" class="btn btn-lg btn-primary btn-block">Sign in</button>
          </form>
          </div>
        </div>
        </div>
      </div>
      <div data-ride="carousel" class="vertical-slider carousel vertical slide col-md-12 content" id="myCarousel">
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
    </div>
      
      <div class="col-sm-6 content">
        <form method="post" enctype="multipart/form-data">
          
          <div>
            <input type="email" name="txt_email" id="txt_email" value="<?php echo $_POST['txt_email'];?>" placeholder="Email" class="txt"/>
            <span class="error" id="email"><?php echo $a_alert;?></span></div>
          <div>
            <input type="password" name="txt_password" id="txt_password" value="<?php echo $_POST['txt_password'];?>" placeholder="Password" class="txt" />
            <span class="error" id="password"></span> </div>
          <div>
            <input type="password" name="txt_confirm" id="txt_confirm" value="<?php echo $_POST['txt_confirm'];?>" placeholder="Confirm Password"  class="txt"/>
            <span class="error" id="confirm"></span> </div>
          <h4>Basic Information</h4>
          <div class="row">
          <div class="col-sm-4 ma1">
            <input type="text" name="txt_fnm" id="txt_fnm" class="txt" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_fnm'];?>" placeholder="first name" />
          </div>
          <div class="col-sm-4 ma1">
            <input type="text" name="txt_mnm" id="txt_mnm" class="txt" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_mnm'];?>"  placeholder="middle name"/>
          </div>
          <div class="col-sm-4">
            <input type="text" name="txt_lnm" id="txt_lnm" class="txt" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_lnm'];?>"  placeholder="last name"/>
             </div>
             
            </div>
            <div><span class="error" id="nm"></span></div>
          <div>
            <label>Date Of Birth:</label>
            <select name="ddl_year" class="txtbirthbox" id="ddl_year">
              <option>Year</option>
              <?php 
	$year=date('Y');
	for($a=$year-18;$a>=1980;$a--)
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
          <div class="row">
            <div class="col-sm-6 ma1">
              <input type="text" name="txt_height" id="txt_height" value="<?php echo $_POST['txt_height'];?>" placeholder="Height" class="txt" />
              <span class="error" id="height"></span> </div>
            <div class="col-sm-6">
              <input type="text" name="txt_weight" id="txt_weight" value="<?php echo $_POST['txt_weight'];?>" placeholder="Weight"  class="txt"/>
              <span class="error" id="weight"></span> </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <select name="ddl_gender" id="ddl_gender" class="txt">
                <option>Gender</option>
                <option>Male</option>
                <option>Female</option>
              </select>
              <span class="error" id="gender"></span> </div>
            <div class="col-sm-4 ma">
              <select name="ddl_bodytype" id="ddl_bodytype" class="txt">
                <option>Body Type</option>
                <option>Average</option>
                <option>Slim</option>
                <option>Healthy</option>
              </select>
              <span class="error" id="btype"></span> </div>
            <div class="col-sm-4">
              <select name="ddl_complexion" id="ddl_complexion" class="txt">
                <option>Complexion</option>
                <option>Wheatish</option>
                <option>Fair</option>
                <option>Dark</option>
              </select>
              <span class="error" id="complexion"></span> </div>
          </div>
          <div>
            <div class="fileUpload btn btn-primary"  > <span>Upload Photo</span>
              <input type="file" name="file_img" class="upload" id="file_img" value="<?php echo $_POST['file_img'];?>" />
            </div>
            <span class="error" id="pto"></span>
          </div>
          <h4>Education / Work</h4>
          <div>
            <input type="text" class="txt" name="txt_education" id="txt_education" onKeyPress="return textonly(event);" value="<?php echo $_POST['txt_education'];?>" placeholder="Education" class="txt"/>
            <span class="error" id="education"></span> </div>
          <div>
            <input type="text" name="txt_occupation" id="txt_occupation" onKeyPress="return textonly(event);" value="<?php echo $_POST['txt_occupation'];?>" placeholder="Occupation"  class="txt"/>
            <span class="error" id="occupation"></span> </div>
          <div>
            <input type="text" name="txt_income" id="txt_income" onKeyPress="return isNumber(event)" value="<?php echo $_POST['txt_income'];?>" placeholder="Income"  class="txt"/>
            <span class="error" id="income"></span> </div>
          <h4>Location</h4>
          <div>
            <input type="text" name="txt_bplace" id="txt_bplace" onKeyPress="return textonly(event);" value="<?php echo $_POST['txt_bplace'];?>" placeholder="Birth Place"  class="txt"/>
            <span class="error" id="bplace"></span> </div>
          <div>
            <input type="text" name="txt_grew" id="txt_grew" onKeyPress="return textonly(event);" value="<?php echo $_POST['txt_grew'];?>" placeholder="Grew up in"  class="txt"/>
            <span class="error" id="grew"></span> </div>
          <div>
            <input type="text" name="txt_present" id="txt_present" onKeyPress="return textonly(event);" value="<?php echo $_POST['txt_present'];?>" placeholder="Present Location"  class="txt"/>
            <span class="error" id="present"></span> </div>
          <h4>Information</h4>
          <div>
            <textarea name="txt_personality" id="txt_personality" placeholder="My Personality" class="txt msg"><?php echo $_POST['txt_personality'];?></textarea>
            <span class="error" id="personality"></span> </div>
          <div>
            <textarea name="txt_hoby" id="txt_hoby" placeholder="Hobbies" class="txt msg"><?php echo $_POST['txt_hoby'];?></textarea>
            <span class="error" id="hoby"></span> </div>
          <div>
            <textarea name="txt_pref" id="txt_pref" placeholder="Partner Preference" class="txt msg"><?php echo $_POST['txt_pref'];?></textarea>
            <span class="error" id="pref"></span> </div>
          <h4>Family Details:</h4>
          <div class="row">
            <div class="col-sm-6 ma1">
              <input type="text" name="txt_fname" id="txt_fname" onKeyPress="return textonly(event);" value="<?php echo $_POST['txt_fname'];?>" placeholder="Father's Name"  class="txt"/>
              <span class="error" id="fname"></span> </div>
            <div class="col-sm-6">
              <input type="text" name="txt_mname" id="txt_mname" onKeyPress="return textonly(event);" value="<?php echo $_POST['txt_mname'];?>" placeholder="Mother's Name"  class="txt"/>
              <span class="error" id="mname"></span> </div>
          </div>
          <!--row end -->
          
          <div class="row">
            <div class="col-sm-4">
              <input type="text" name="txt_mosal" id="txt_mosal" onKeyPress="return textonly(event);" value="<?php echo $_POST['txt_mosal'];?>" placeholder="Mosal Name"  class="txt"/>
              <span class="error" id="mosal"></span> </div>
            <div class="col-sm-4 ma">
              <input type="text" name="txt_msname" id="txt_msname" onKeyPress="return textonly(event);" value="<?php echo $_POST['txt_msname'];?>" placeholder="Mosal Surname"  class="txt"/>
              <span class="error" id="msname"></span> </div>
            <div class="col-sm-4">
              <input type="text" name="txt_mnative" id="txt_mnative" onKeyPress="return textonly(event);" value="<?php echo $_POST['txt_mnative'];?>" placeholder="Mosal Native"  class="txt"/>
              <span class="error" id="mantive"></span> </div>
          </div>
          <!--row ends -->
          
          <div class="row">
            <div class="col-sm-6 ma1">
              <input type="text" name="txt_brother" id="txt_brother" onKeyPress="return isNumber(event)" maxlength="1" value="<?php echo $_POST['txt_brother'];?>" placeholder="No. of Brothers"  class="txt"/>
              <span class="error" id="brother"></span> </div>
            <div class="col-sm-6">
              <input type="text" name="txt_sister" id="txt_sister" onKeyPress="return isNumber(event)" maxlength="1" value="<?php echo $_POST['txt_sister'];?>" placeholder="No. of Sister"  class="txt"/>
              <span class="error" id="sister"></span> </div>
          </div>
          <div>
            <textarea name="txt_family" id="txt_family" placeholder="Family Details" class="msg txt"><?php echo $_POST['txt_family'];?></textarea>
            <span class="error" id="family"></span> </div>
          <div>
            <textarea name="txt_contact" id="txt_contact" placeholder="Contact Details" class="txt msg"><?php echo $_POST['txt_contact'];?></textarea>
            <span class="error" id="contact"></span> </div>
          <div>
          <div>
            <input type="submit" name="btn_reg" value="Submit" id="submit" class="btn btn-default"/>
            <input type="reset" name="btn_cancel" value="Cancel" class="btn btn-default" />
          </div>
        </form>
      </div>
    </div>
    
  </div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $("#login").click(function(){
		var unm=$("#txt_unm").val();
		if(unm=="")
		{
			$("#usernm").html("Enter Email id");
			$("#txt_unm").focus();
			return false;
		}
		else
		{
			$("#usernm").html("");
		}
		
		var pass=$("#txt_pass").val();
		if(pass=='')
		{
			$("#userpass").html("Enter Password");
			$("#txt_pass").focus();
			return false;
		}
		else
		{
			$("#userpass").html("");
		}
	});
});
</script>
<script type="text/javascript" src="js/matrimonial_validation.js"></script>
<?php include('footer.php');
?>