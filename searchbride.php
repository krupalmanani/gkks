<?php
	include("connection.php");
	$s=mysql_query("select dob from tbl_metrimonial");
	while($r=mysql_fetch_array($s))
	{
	$y=explode("-","$r[dob]");
	$year=$y[0];
	$age=date('Y')-$year;
	}
?>
<?php
	if(isset($_GET['city']) or isset($_GET['edu']) or isset($_GET['name']) or isset($_GET['from']) or isset($_GET['to']))
	{
		$search='';
		if($_GET['city']!='')
		{
			$search .=" and present_location like('%$_GET[city]%')";
		}
		if($_GET['edu']!='')
		{
			$search .=" and education like('%$_GET[edu]%')";
		}
		if($_GET['name']!='')
		{
			$search .=" and first_name like('%$_GET[name]%')";
		}
		if($_GET['to']!='')
		{
			$search .=" and dob > DATE_ADD(NOW(),INTERVAL -'$_GET[to]' YEAR)";
		}
		if($_GET['from']!='')
		{
			$search .=" AND dob < DATE_ADD(NOW(),INTERVAL -'$_GET[from]' YEAR)";
		}
		
		$sql=mysql_query("select * from tbl_metrimonial where  gender='Female' and status='1' $search ");
		if(mysql_affected_rows())
		{
			while($row=mysql_fetch_array($sql))
			{
			?>
			<div class="col-sm-6">
			<div class="post-row">
			<div class="left-meta-post">
			<img style="height:130px;" alt="<?php echo $row['first_name']." ".$row['last_name'];?>" title="<?php echo $row['first_name']." ".$row['last_name'];?>" src="<?php echo $row['photo'];?>" onError="this.src='image/NoImage.gif';">
			</div>
			
			<!--<div class="post-content">-->
			<div class="post-content-details">
			<h3 class="post-title con"><?php echo $row['first_name']." ".$row['last_name'];?></h3>
			<p><span class="first">Education</span>: <span><?php echo $row['education'];?></span></p>
			<p><span class="first">Date of Birth</span>: <span><?php echo $row['dob'];?></span></p>
			<p><span class="first">Ocupations</span>: <span><?php echo $row['occupation'];?></span></p>
			<p><span class="first">City</span>: <span><?php echo $row['present_location'];?></span></p>
			<a class="view_btn" style="background-color: #4BAC48; padding:4px 12px;color: #fff;" href="profiledetail.php?did=<?php echo $row['matrimonial_id'];?>"><span>View Profile</span></a></p></div></div></div>
			<?php
			}
		}
		else
		{
			echo '<div class="alert alert-info"><strong>Alert! </strong>Records Not Found</div>';
		}
	}
?>