<?php
	include("connection.php");
?>
<?php
	if(isset($_GET['del']))
	{
		$sql_m=mysql_query("select * from tbl_member where member_id='$_GET[del]'");
		$row_m=mysql_fetch_array($sql_m);
		unlink("$row_i[member_photo]");
		mysql_query("delete from tbl_member where member_id='$_GET[del]'");
	}
	
	if(isset($_GET['act']))
	{
		mysql_query("update tbl_member set member_status='0' where member_id='$_GET[act]'");
	}
	
	if(isset($_GET['deact']))
	{
		mysql_query("update tbl_member set member_status='1' where member_id='$_GET[deact]'");
	}
?>
