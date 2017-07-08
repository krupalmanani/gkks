<?php
include("connection.php");
?>
<link rel="stylesheet" href="css/colorbox.css" />
<script src="js/jquery.colorbox.js"></script>
<script>
$(document).ready(function(){
	$(".group4").colorbox({rel:'group4', slideshow:true, width:"43%", height:"75%"});
});
</script>
<?php
if(isset($_GET['category']))
{
	$sql_search=mysql_query("select * from tbl_gallery where category='$_GET[category]' and gallery_status='1'");
	if(mysql_affected_rows())
	{
		echo '<br>';
		while($row_search=mysql_fetch_array($sql_search))
		{
		?>
			<div class="message_box col-lg-3 col-md-4 col-xs-6 thumb">
			  <a class="thumbnail group4" href="image/gallery/<?php echo $row_search['gallery_photo'];?>">
			  <img class="img-responsive" src="image/gallery/<?php echo $row_search['gallery_photo'];?>" alt=""onError="this.src='image/NoImage.gif';">
			  </a>
			</div>
		<?php
		}
	}
	else
	{
		echo '<script>sweetAlert("", "Records not Found", "warning");</script>';
		echo '<br>';
		echo '<br>';
	}
}

if(isset($_GET['evt']))
{
	$sql_evt=mysql_query("select * from tbl_event where event_status=1");
	if(mysql_affected_rows())
	{
		echo '<br>';
		while($row_evt=mysql_fetch_array($sql_evt))
		{
			foreach(explode(",",$row_evt['event_photo']) as $event_photo)
			{
				?>
				<div class="message_box col-lg-3 col-md-4 col-xs-6 thumb">
				<a class="thumbnail group4" href="image/event/<?php echo $event_photo;?>">
				<img class="img-responsive" src="image/event/<?php echo $event_photo;?>" alt="" onError="this.src='image/NoImage.gif';">
				</a>
				</div>
				<?php
			}
		}
	}
	else
	{
		echo '<script>sweetAlert("", "Records not Found", "warning");</script>';
		echo '<br>';
		echo '<br>';
	}
}

if(isset($_GET['all']))
{
	$sql_search=mysql_query("select * from tbl_gallery where gallery_status='1'");
	if(mysql_affected_rows())
	{
		echo '<br>';
		while($row_search=mysql_fetch_array($sql_search))
		{
		?>
			<div class="message_box col-lg-3 col-md-4 col-xs-6 thumb">
			  <a class="thumbnail group4" href="image/gallery/<?php echo $row_search['gallery_photo'];?>">
			  <img class="img-responsive" src="image/gallery/<?php echo $row_search['gallery_photo'];?>" alt="" onError="this.src='image/NoImage.gif';">
			  </a>
			</div>
		<?php
		}
	}
	else
	{
		echo '<script>sweetAlert("", "Records not Found", "warning");</script>';
		echo '<br>';
		echo '<br>';
	}
}

?>