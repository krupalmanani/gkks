<?php
	include("header.php");
?>
<?php
	if(isset($_GET['eid']))
	{
		$sql_edit=mysql_query("select * from tbl_gallery where gallery_id='$_GET[eid]'");
		$row_edit=mysql_fetch_array($sql_edit);
	}
?>
<?php
	if(isset($_POST['btn_submit']))
	{
		if($_FILES['file_img']['tmp_name']=='')
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
		mysql_query("update tbl_gallery set category='$_POST[ddl_cat]',gallery_photo='$hidden' where gallery_id='$_GET[eid]'");
		header("location:manage_gallery.php");
	}
?>
<form method="post" enctype="multipart/form-data">
<div>
	<label>Category:</label>
    <select id="ddl_cat" name="ddl_cat">
    <?php 
		
	?>
    <option value="<?php echo $row_edit['category'];?>">
	<?php 
		$sql=mysql_query("select * from tbl_category where cat_id='$row_edit[category]'");
		$row=mysql_fetch_array($sql);
		echo $row['cat_name'];
	?>
    </option>
    <?php
		$sql_cat=mysql_query("select * from tbl_category where cat_status=1 and cat_id!='$row_edit[category]' order by cat_name");
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
    <input type="hidden" name="hidden_image" value="<?php echo $row_edit['gallery_photo'];?>">
	<input type="file" name="file_img">
    <td><img src="<?php echo $row_edit['gallery_photo'];?>" width="50" height="50"></td>
    <span class="error" id="img"><?php echo $a_alert,$alertimg;?></span>
</div>
<div>
	<input type="submit" name="btn_submit" id="submit" value="Update" />
    <input type="button" name="btn_cancel" onClick="window.location='manage_gallery.php'" value="Cancel">
</div>
</form>

<?php
	include("fooer.php");
?>