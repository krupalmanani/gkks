<?php
	include("header.php");
?>
<?php
	$count=0;
	if(isset($_POST['btn_submit']))
	{
		$img=trim($_FILES['file_img']['tmp_name']);
		$cat=$_POST['ddl_cat'];
	
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
	}
?>
<?php
	if(isset($_POST['btn_submit']) and $count==0)
	{
		$file=$_FILES['file_img']['name'];
		$dest="../../image/gallery/$file";
		$src=$_FILES['file_img']['tmp_name'];
		move_uploaded_file($src,$dest);
	
		mysql_query("insert into tbl_gallery values('','$cat','$dest','1')");
			
		echo '<script>sweetAlert("Gallery Added Successfully", "", "success");</script>';
		$_POST['txt_name']='';
	}
?>
<section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-6">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Gallery</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
						<li><i class="icon_document_alt"></i>Gallery</li>
						<li><i class="fa fa-file-text-o"></i>Add Gallery</li>
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
    <select id="ddl_cat" name="ddl_cat" class="form-control">
    <option>Select Category</option>
    <?php
		$sql_cat=mysql_query("select * from tbl_category where cat_status=1 order by cat_name");
		while($row_cat=mysql_fetch_array($sql_cat))
		{
			echo '<option value="'.$row_cat['cat_id'].'">'.$row_cat['cat_name'].'</option>';
		}
	?>
    </select>
    <span class="error" id="ctgr"><?php echo $a_cat;?></span>
</div>
<div>
	<input type="file" name="file_img" id="file_img" placeholder="Select Photo">
    <span class="error" id="img"><?php echo $alertimg;?></span>
</div>
<div>
	<input type="submit" name="btn_submit" id="submit" value="Submit" class="btn btn-primary"/>
    <input type="reset" name="btn_cancel" onClick="clr()" value="Reset" class="btn btn-primary"/>
</div>
</form>
</div>
</section>
</div>
</div>
</section>
</section>
<script type="text/javascript">
	$(document).ready(function() {
        $("#submit").click(function(){
		
		var cat=$("#ddl_cat").val();
		if(cat=="Select Category")
		{
			$("#ctgr").html("Select Category");
			$("#ddl_cat").focus();
			return false;
		}
		else
		{
			$("#ctgr").html("");
		}
		
		var img=$("#file_img").val();
		if(img=="")
		{
			$("#img").html("Select Image");
			$("#file_img").focus();
			return false;
		}
		else
		{
			$("#img").html("");
		}
		});
    });
function clr()
{
	document.getElementById("ctgr").innerHTML="";
	document.getElementById("img").innerHTML="";
}
</script>
<?php
	include("footer.php");
?>