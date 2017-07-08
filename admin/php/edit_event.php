<?php
	include("header.php");
?>
<?php
	if(isset($_GET['eid']))
	{
		$sql=mysql_query("select * from tbl_event where event_id='$_GET[eid]'");
		$row=mysql_fetch_array($sql);
	}
?>

<?php
	if(isset($_POST['btn_submit']))
	{
		$name=$_POST['txt_name'];
		$cat=$_POST['ddl_category'];
		$detail	=$_POST['txt_detail'];
		$stdt=$_POST['txt_start'];
		$eddt=$_POST['txt_end'];
		
		$s=mysql_query("select * from tbl_event where event_name='$name' and start_date='$stdt' and end_date='$eddt' and event_id!='$_GET[eid]'");
		$r=mysql_fetch_array($s);
		if($r>0)
		{
			$a_alert="Event Already Exist";
		}
		else
		{
			
			foreach($_FILES['file_img']['tmp_name'] as $image)
			{
				if($image=='')
				{
					$hidden=$_POST['hidden_image'];
				}
			}
			$dest=array();
			$src=$_FILES['file_img']['tmp_name'];
			if(isset($src))
			{
				for($i=0;$i<count($src);$i++)
				{
					if(move_uploaded_file($src[$i],"../../image/event/".$_FILES['file_img']['name'][$i]))
					{
						$dest[]="../../image/event/".$_FILES['file_img']['name'][$i];
						$hidden=implode(",",$dest);
					}
				}
			}
			
			mysql_query("update tbl_event set event_name='$name',event_cat='$cat',event_detail='$detail',start_date='$stdt',end_date='$eddt',event_photo='$hidden' where event_id='$_GET[eid]'");
			header("location:manage_event.php");
			
			/*if($_FILES['file_img']['tmp_name']=='')
			{
				$hidden=$_POST['hidden_image'];
			}
			else
			{
				$file=$_FILES['file_img']['name'];
				$dest=$_POST['hidden_image'];
				$src=$_FILES['file_img']['tmp_name'];
				move_uploaded_file($src,$dest);
				$hidden=$dest;
			}
			mysql_query("update tbl_event set event_name='$name',event_cat='$cat',event_detail='$detail',start_date='$stdt',end_date='$eddt',event_photo='$hidden' where event_id='$_GET[eid]'");
			echo '<script>alert("Event Updated Successfully")</script>';
			header("location:manage_event.php");
			
			*/
		}
	}
?>
<section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-6">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Event</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
						<li><i class="icon_document_alt"></i>Event</li>
						<li><i class="fa fa-file-text-o"></i>Manage Event</li>
                        <li><i class="fa fa-file-text-o"></i>Edit Event</li>
					</ol>
				</div>
			</div>
              <div class="row">
                  <div class="col-sm-6">
                      <section class="panel">
                          <header class="panel-heading">
                             Form Elements
                          </header>
                          <div class="panel-body">

<form method="post" enctype="multipart/form-data">
<div>
    <input type="text" name="txt_name" class="form-control" id="txt_name" onkeypress="return textonly(event);" value="<?php echo $row['event_name'];?>"/>
    <span class="error" id="enm"><?php echo $a_alert;?></span>
</div>
<div>
    <select id="ddl_category" class="form-control" name="ddl_category">
    <option value="<?php echo $row['event_cat'];?>">
    <?php
    	$sql_c=mysql_query("select * from tbl_category where cat_id='$row[event_cat]'");
		$row_c=mysql_fetch_array($sql_c);
		echo $row_c['cat_name'];
	?>
    </option>
  	<?php
		$sql_cat=mysql_query("select * from tbl_category where cat_status=1 and cat_id!='$row[event_cat]' order by cat_name");
		while($row_cat=mysql_fetch_array($sql_cat))
		{
			echo '<option value="'.$row_cat['cat_id'].'">'.$row_cat['cat_name'].'</option>';
		}
	?>
    </select>
    <span class="error" id="cat"></span>
</div>
<div>
    <textarea name="txt_detail" class="form-control" id="txt_detail" cols="18" rows="3"><?php echo $row['event_detail'];?></textarea>
    <span class="error" id="dtil"></span>
</div>
<div>
    <input type="text" name="txt_start" class="form-control" id="cal" value="<?php echo $row['start_date'];?>" />
    <span class="error" id="stdt"></span>
</div>
<div>
    <input type="text" name="txt_end" class="form-control" id="cal1" value="<?php echo $row['end_date'];?>" />
    <span class="error" id="eddt"></span>
</div>
<div>
    <input type="hidden" name="hidden_image" class="form-control" value="<?php echo $row['event_photo'];?>" />
    <input type="file" name="file_img[]" multiple="multiple"/>
    <?php
		foreach(explode(",","$row[event_photo]") as $photo)
		{
	?>
    <img src="<?php echo $photo;?>" height="50" width="50" onError="this.src='../image/NoImage.gif';">
    <?php
		}
		?>
    <span class="error" id="pto"><?php echo $alertimg;?></span>
</div>
<div>
	<input type="submit" name="btn_submit" id="submit" value="Update" class="btn btn-primary"/>
    <input type="button" name="btn_clear" onclick="window.location='manage_event.php'" value="Cancel" class="btn btn-primary"/>
</div>
</form>
</div>
</section>
</div>
</div>
</section>
</section>

<?php
	include("footer.php");
?>

<link rel="stylesheet" href="../css/mjquery-ui.css">
<link rel="stylesheet" type="text/css" href="../css/jquery.ptTimeSelect.css" />
<script src="../js/mjquery-ui.js"></script>
<script type="text/javascript" src="../js/jquery.ptTimeSelect.js"></script>
<script type="text/javascript" src="../js/event_validation.js"></script>