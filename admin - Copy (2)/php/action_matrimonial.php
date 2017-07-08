<?php
include("connection.php");
?>
<?php
	if(isset($_GET['del']))
	{
		$s=mysql_query("select * from tbl_metrimonial where matrimonial_id='$_GET[del]'");
		$r=mysql_fetch_array($s);
		unlink("$r[photo]");
		mysql_query("delete from tbl_metrimonial where matrimonial_id='$_GET[del]'");
		
	}
	if(isset($_GET['act']))
	{
		mysql_query("update tbl_metrimonial set status='0' where matrimonial_id='$_GET[act]'");
	}
	if(isset($_GET['deact']))
	{
		mysql_query("update tbl_metrimonial set status='1' where matrimonial_id='$_GET[deact]'");	
	}
?>