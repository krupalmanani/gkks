<?php
	session_start();
	include("connection.php");
	error_reporting(0);
	ob_start();
	if($_SESSION['admin_id']=='')
	{
		header("location:../index.php");
	}
?>