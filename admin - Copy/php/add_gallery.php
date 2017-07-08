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
			
		echo '<script>alert("Image Added Successfully")</script>';
		$_POST['txt_name']='';
	}
?>
<form method="post" enctype="multipart/form-data">
<div>
	<label>Category:</label>
    <select id="ddl_cat" name="ddl_cat">
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
	<label>Photos:</label>
	<input type="file" name="file_img" id="file_img">
    <span class="error" id="img"><?php echo $alertimg;?></span>
</div>
<div>
	<input type="submit" name="btn_submit" id="submit" value="Insert" />
    <input type="reset" name="btn_cancel" onClick="clr()" value="Clear">
</div>
</form>

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
	include("fooer.php");
?>