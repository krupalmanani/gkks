<?php
	include("connection.php");
?>
<?php
	if(isset($_GET['del']))
	{
		$sql=mysql_query("select * from tbl_event where event_id='$_GET[del]'");
		$row_i=mysql_fetch_array($sql);
		foreach(explode(",","$row_i[event_photo]") as $img)
		{
			unlink("$img");
		}
		$del="delete from tbl_event where event_id='$_GET[del]'";
		mysql_query($del);
	}
?>
<?php
	if(isset($_GET['act']))
	{
		$update="update tbl_event set event_status=0 where event_id='$_GET[act]'";
		mysql_query($update);
	}
	if(isset($_GET['deact']))
	{
		
		$update="update tbl_event set event_status=1 where event_id='$_GET[deact]'";
		mysql_query($update);
	}
?>