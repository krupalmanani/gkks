<?php
	include("header.php");
?>
<?php
	if(isset($_GET['eid']))
	{
		$s_cat=mysql_query("select * from tbl_category where cat_id='$_GET[eid]'");
		$r_cat=mysql_fetch_array($s_cat);
	}
?>
<?php
	if(isset($_POST['btn_submit']))
	{
		$cat_name=trim($_POST['txt_name']);
		$sql=mysql_query("select * from tbl_category where cat_name='$cat_name' and cat_id!='$_GET[eid]'");
		$row=mysql_fetch_array($sql);
		if($row>0)
		{
			$a_alert="Category ".$cat_name." Already Exist";
		}
		else
		{
			mysql_query("update tbl_category set cat_name='$cat_name' where cat_id='$_GET[eid]'");
			
			echo '<script>alert("Category Updated Successfully")</script>';
			header("location:manage_category.php");
		}
	}
?>
 <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-6">
          <h3 class="page-header"><i class="fa fa-file-text-o"></i> Category</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
            <li><i class="icon_document_alt"></i>Category</li>
            <li><i class="fa fa-file-text-o"></i>Manage Category</li>
            <li><i class="fa fa-file-text-o"></i>Edit Category</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <section class="panel">
            <header class="panel-heading"> Form Elements </header>
            <div class="panel-body">
<form method="post">
<div>
    <input type="text" name="txt_name" class="form-control" id="txt_name" onkeypress="return textonly(event);" value="<?php echo $r_cat['cat_name'];?>" onblur="cate()" required>
    <span class="error" id="cat"><?php echo $a_alert;?></span>
</div>
<div>
	<input type="submit" name="btn_submit" value="Update" id="submit" class="btn btn-primary"/>
    <input type="button" name="btn_cancel" onClick="window.location='manage_category.php'" value="Cancel" class="btn btn-primary">
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
		var cat=$("#txt_name").val();
		if(cat=='')
		{
			$("#cat").html("Enter Category");
			$("#txt_name").focus();
			return false;
		}
		else if(cat.length<3)
		{
			$("#cat").html("Category atleast 3 character long");
			$("#txt_name").focus();
			return false;
		}
		else
		{
			$("#cat").html("");
		}
	});
});

function textonly(e){
var code;
if (!e) var e = window.event;
if (e.keyCode) code = e.keyCode;
else if (e.which) code = e.which;
var character = String.fromCharCode(code);
//alert('Character was ' + character);
    //alert(code);
    //if (code == 8) return true;
    var AllowRegex  = /^[\ba-zA-Z\s-]$/;
    if (AllowRegex.test(character)) return true;    
    return false;
}
</script>

<?php
	include("footer.php");
?>