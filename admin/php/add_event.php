<?php
	include("header.php");
?>
<?php
	$count=0;
	/*if(isset($_POST['btn_submit']))
	{
		$name=trim($_POST['txt_name']);
		$cat=$_POST['ddl_category'];
		$detail	=trim($_POST['txt_detail']);
		$stdt=trim($_POST['txt_start']);
		$eddt=trim($_POST['txt_end']);
		
		$ext=strrchr($_FILES['file_img']['name'],".");
		
		if($_FILES['file_img']['tmp_name']=="")
		{
			$alertimg="Select Image";
			$count++;
		}
		elseif($ext!=".bmp" && $ext!=".jpg" && $ext!=".jpeg" && $ext!=".png" && $ext!=".gif") 
		{
			$alertimg="Invalid Format";
			$count++;
		}
	}*/
?>
<?php
	if(isset($_POST['btn_submit']) and $count==0)
	{
		$name=trim($_POST['txt_name']);
		$cat=$_POST['ddl_category'];
		$detail	=trim($_POST['txt_detail']);
		$stdt=trim($_POST['txt_start']);
		$eddt=trim($_POST['txt_end']);
		
		$s=mysql_query("select * from tbl_event where event_name='$name' and start_date='$stdt' and end_date='$eddt'");
		$r=mysql_fetch_array($s);
		if($r>0)
		{
			$a_alert="Event name ".$name." already exist";
		}
		else
		{
			$dest=array();
			$src=$_FILES['file_img']['tmp_name'];
			if(isset($src))
			{
			for($i=0;$i<count($src);$i++)
			{
				if(move_uploaded_file($src[$i],"../../image/event/".$_FILES['file_img']['name'][$i]))
				
				{
					$dest[]="../../image/event/".$_FILES['file_img']['name'][$i];
				}
			}
			mysql_query("insert into tbl_event values('','$name','$cat','$detail','$stdt','$eddt','".implode(",",$dest)."','1')");
			echo '<script>sweetAlert("Event Added Successfully", "", "success");</script>';			
			$_POST['txt_name']='';
			$_POST['txt_detail']='';
			$_POST['txt_start']='';
			$_POST['txt_end']='';
			}
	
		}
		
		/*else
		{
			$file=$_FILES['file_img']['name'];
			$dest="../image/event/$file";
			$src=$_FILES['file_img']['tmp_name'];
			move_uploaded_file($src,$dest);
			
			mysql_query("insert into tbl_event values('','$name','$detail','$stdt','$eddt','$dest','1')");
			echo '<script>alert("Event Added Successfully")</script>';
			
			$_POST['txt_name']='';
			$_POST['txt_detail']='';
			$_POST['txt_start']='';
			$_POST['txt_end']='';
		}*/
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
						<li><i class="fa fa-file-text-o"></i>Add Event</li>
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
    <input type="text" class="form-control" name="txt_name" id="txt_name" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_name'];?>" placeholder="Event Name"/>
    <span class="error" id="enm"><?php echo $a_alert;?></span>
</div>
<div>
    <select id="ddl_category" name="ddl_category" class="form-control">
    <option>Select Category</option>
    <?php
	$sql_cat=mysql_query("select * from tbl_category where cat_status=1 order by cat_name");
	while($row_cat=mysql_fetch_array($sql_cat))
	{
		echo '<option value="'.$row_cat['cat_id'].'">'.$row_cat['cat_name'].'</option>';
	}
	?>
    </select>
    <span class="error" id="cat"></span>
</div>
<div>
    <textarea name="txt_detail" class="form-control" placeholder="Event Detail" id="txt_detail" cols="18" rows="3"><?php echo $_POST['txt_detail'];?></textarea>
    <span class="error" id="dtil"></span>
</div>
<div>
    <input type="text" class="form-control" placeholder="Start Date" name="txt_start" id="cal" value="<?php echo $_POST['txt_start'];?>"/>
    <span class="error" id="stdt"></span>
</div>
<div>
    <input type="text" class="form-control" placeholder="End Date" name="txt_end" id="cal1" value="<?php echo $_POST['txt_end'];?>"/>
    <span class="error" id="eddt"></span>
</div>
<div>
    <input type="file" name="file_img[]" id="file_img" multiple/>
    <span class="error" id="pto"><?php echo $alertimg;?></span>
</div>
<div>
	<input type="submit" name="btn_submit" class="btn btn-primary" id="submit" value="Submit" />
    <input type="reset" name="btn_clear" class="btn btn-primary" id="clear" value="Reset" />
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