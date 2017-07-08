<?php
	include("header.php");
?>
<?php
	if(isset($_POST['btn_submit']))
	{
		$cat_name=trim($_POST['txt_name']);
		$sql=mysql_query("select * from tbl_category where cat_name='$cat_name'");
		$row=mysql_fetch_array($sql);
		if($row>0)
		{
			$a_alert="Category ".$cat_name." Already Exist";
		}
		else
		{
			mysql_query("insert into tbl_category values('','$cat_name','1')");
			
			echo '<script>alert("Category Added Successfully")</script>';
			$_POST['txt_name']='';
		}
	}
?>
<form method="post" onsubmit="validation">
<div>
	<label>Category:</label>
    <input type="text" name="txt_name" id="txt_name" onkeypress="return textonly(event);" value="<?php echo $_POST['txt_name'];?>">
    <span class="error" id="cat"><?php echo $a_alert;?></span>
</div>
<div>
	<input type="submit" name="btn_submit" value="Insert" id="submit" />
    <input type="reset" name="btn_cancel" onClick="clr()" value="Clear">
</div>
</form>
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
function clr()
{
	document.getElementById("txt_name").focus();
	document.getElementById("txt_name").defaultValue="";
	document.getElementById("cat").innerHTML="";
}
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
	include("fooer.php");
?>