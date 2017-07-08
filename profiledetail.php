<?php
	include("header.php");
	if($_SESSION['m_id']=='')
	{
		header("location:matrimonial.php?fid=$_GET[did]");
	}
?>
<link rel="stylesheet" href="css/colorbox.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/jquery.colorbox.js"></script>
<script>
$(document).ready(function(){
	$(".group3").colorbox({rel:'group3', transition:"fade-in", width:"43%", height:"75%"});
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
          <li class="active"><a href="matrimonial.php">Matrimonial</a></li>
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
<div>
  <div class="maintitle">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="aboutright pull-left">
			<h4>Profile Details</h4>
          </div>
          <div class="aboutleft pull-right"> <span><a href="index.php">Home</a> / </span><span><a href="boys.php">Matrimonial List</a> / </span><span>Profile Details</span> </div>
          <div class="clr"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
<div class="content">
  <div class="row">
    <div class="col-sm-12">
    <div class="post-row">
<?php
	if(isset($_GET['did']))
	{
		$sql=mysql_query("select * from tbl_metrimonial where matrimonial_id='$_GET[did]'");
		$row=mysql_fetch_array($sql);
		
		?>
        <div class="profile_view_table">
            
            <div class="profile_image">
            	<a class="thumbnail group3" href="<?php echo $row['photo'];?>">
                <img src="<?php echo $row['photo'];?>" alt="" onError="this.src='image/NoImage.gif';"></a>
            </div>
            
            <div class="content_box">
                <div class="profile_title">
                    <h3><?php echo $row['first_name']." ".$row['last_name'];?></h3>
                </div>                        
                <div class="profile_table">
                <table border="0">
                <tr class="border_bottom">
                <td colspan="2"><h5><strong>Basic</strong></h5></td>
                </tr>
                <tr>
                <td class="table_first">Birth Date</td>
                <td><?php echo $row['dob'];?></td>
                </tr>
                <tr>
                    <td class="table_first">Height</td>
                    <td><?php echo $row['height'];?></td>
                </tr>
                <tr>
                    <td class="table_first">Weight</td>
                    <td><?php echo $row['weight'];?></td>
                </tr>
                <tr>
                    <td class="table_first">Gender</td>
                    <td><?php echo $row['gender'];?></td>
                </tr>
                <tr>
                    <td class="table_first">Body Type</td>
                    <td><?php echo $row['body_type'];?></td>
                </tr>
                <tr>
                    <td class="table_first">Complexion</td>
                    <td><?php echo $row['complexion'];?></td>
                </tr>
                <tr class="border_bottom">
                    <td colspan="2"><h5><strong>Education and Work</strong></h5></td>
                </tr>
                <tr>
                    <td class="table_first">Education</td>
                    <td><?php echo $row['education'];?></td>
               </tr>
               <tr>
                    <td class="table_first">Occupation</td>
                    <td><?php echo $row['occupation'];?></td>
               </tr>
               <tr>
                    <td class="table_first">Income</td>
                    <td><?php echo $row['income'];?></td>
               </tr>
               <tr>
                    <td class="table_first">Education</td>
                    <td><?php echo $row['education'];?></td>
               </tr>
               <tr class="border_bottom">
                    <td colspan="2"><h5><strong>Location</strong></h5></td>
              </tr>
              <tr>
                    <td class="table_first">Birth Place</td>
                    <td><?php echo $row['place_of_birth'];?></td>
              </tr>
              <tr>
                    <td class="table_first">Grew Up In</td>
                    <td><?php echo $row['grew_up_in'];?></td>
              </tr>
              <tr>
                <td class="table_first">Present Location</td>
                <td><?php echo $row['present_location'];?></td>
             </tr>
             <tr class="border_bottom">
                <td colspan="2"><h5><strong>Info</strong></h5></td>
             </tr>
             <tr>
                <td class="table_first">My Personality</td>
                <td><?php echo $row['my_personality'];?></td>
            </tr>
            <tr>
                    <td class="table_first">Hobbies</td>
                    <td><?php echo $row['hobbies'];?></td>
               </tr>
               <tr>
                    <td class="table_first">Partner Preference</td>
                    <td><?php echo $row['partner_preference'];?></td>
               </tr>
               <tr class="border_bottom">
                <td colspan="2"><h5><strong>Family</strong></h5></td>
             </tr>
             <tr>
                    <td class="table_first">Father's Name</td>
                    <td><?php echo $row['father_name'];?></td>
               </tr>
               <tr>
                    <td class="table_first">Mother's Name</td>
                    <td><?php echo $row['mother_name'];?></td>
               </tr>
               <tr>
                    <td class="table_first">Mosal Name</td>
                    <td><?php echo $row['mosal_name'];?></td>
               </tr>
               <tr>
                    <td class="table_first">Mosal Surname</td>
                    <td><?php echo $row['mosal_surname'];?></td>
               </tr>
               <tr>
                    <td class="table_first">Mosal Native</td>
                    <td><?php echo $row['mosal_native'];?></td>
               </tr>
               <tr>
                    <td class="table_first">Brothers</td>
                    <td><?php echo $row['no_of_brother'];?></td>
               </tr>
               <tr>
                    <td class="table_first">Sisters</td>
                    <td><?php echo $row['no_of_sister'];?></td>
               </tr>
             <tr>
                    <td class="table_first">Family Detail</td>
                    <td><?php echo $row['family_detail'];?></td>
               </tr>
               <tr>
                    <td class="table_first">Contact Detail</td>
                    <td><?php echo $row['contact_detail'];?></td>
               </tr>
             </table>
             </div>
         	</div>
     	</div>
       <?php
	}
?>
    </div>
  </div>
  </div>
</div>
</div>
</div>

<?php include("footer.php");