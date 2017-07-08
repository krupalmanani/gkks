<?php include("connection.php");?>

<link rel="stylesheet" href="css/colorbox.css" />
<script src="js/jquery.colorbox.js"></script>
<script>
$(document).ready(function(){
	$(".group4").colorbox({rel:'group4', slideshow:true, width:"43%", height:"75%"});
	
});
</script>


<?php
$last_msg_id=$_GET['last_msg_id'];
$sql=mysql_query("SELECT * FROM tbl_gallery WHERE gallery_id < '$last_msg_id' and gallery_status='1' ORDER BY gallery_id DESC LIMIT 8");
$last_msg_id="";
while($row=mysql_fetch_array($sql))
{
	$id=$row['gallery_id'];
?>

<div class="message_box col-lg-3 col-md-4 col-xs-6 thumb" id="<?php echo $id;?>"> <a class="thumbnail group4" href="image/gallery/<?php echo $row['gallery_photo'];?>"> <img class="img-responsive" src="image/gallery/<?php echo $row['gallery_photo'];?>" alt="" onError="this.src='image/NoImage.gif';"> </a> </div>
<?php
}
?>
