<?php
	include("connection.php");
?>
<?php
	if(isset($_GET['del']))
	{
		$sql=mysql_query("select * from tbl_gallery where gallery_id='$_GET[del]'");
		$row_i=mysql_fetch_array($sql);
		unlink("$row_i[gallery_photo]");
		$del="delete from tbl_gallery where gallery_id='$_GET[del]'";
		mysql_query($del);
	}
?>
<?php
	if(isset($_GET['act']))
	{
		$update="update tbl_gallery set gallery_status=0 where gallery_id='$_GET[act]'";
		mysql_query($update);
	}
	if(isset($_GET['deact']))
	{
		
		$update="update tbl_gallery set gallery_status=1 where gallery_id='$_GET[deact]'";
		mysql_query($update);
	}
?>