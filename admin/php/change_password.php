<?php
 include("header.php");
?>
<?php
		$sel="select * from tbl_admin where admin_id='$_SESSION[admin_id]'";
		$result=mysql_query($sel);
		$row=mysql_fetch_array($result);
	
?>
<?php
	$count=0;
	if(isset($_POST['btn_submit']))
	{	
	
		$old=$_POST['txt_old'];
		$new=$_POST['txt_new'];
		$confirm=$_POST['txt_confirm'];
		
		if($old=='')
		{
			$a_old="Enter old password";
			$count++;
		}
		elseif($old!=$row['admin_password'])
		{
			$a_match="pass not match";
			$a_old='';
			$count++;
		}
		
		if($new=='')
		{
			$a_new="Enter new password";
			$count++;
		}
		elseif(strlen($new)<6 || strlen($new)>15)
		{
			$alertpwd="Input length is 6 to 15 characters.";
			$count++;	
		}
		if($confirm=='')
		{
			$a_confirm="Enter Confirm password";
			$count++;
		}
		elseif($new!=$confirm)
		{
			$match="Password is not match";
			$a_confirm='';
			$count++;
		}
	}
?>


<?php
	
	if(isset($_POST['btn_submit']) and $count==0)
	{
		
		$update_q="update tbl_admin set admin_password='$_POST[txt_new]' where admin_id='$_SESSION[admin_id]'";
		mysql_query($update_q);
		
		echo '<script>sweetAlert("Password Updated Successfully", "", "success");</script>';
		
		$_POST['txt_old']='';
		$_POST['txt_new']='';
		$_POST['txt_confirm']='';
		
	}

?>
 <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-6">
          <h3 class="page-header"><i class="fa fa-file-text-o"></i> Profile</h3>
          <ol class="breadcrumb">
            <li><i class="icon_document_alt"></i>Change Password</li>
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
		  <input type="password" name="txt_old" id="txt_old"  class="form-control" placeholder="Old Password" value="<?php echo $_POST['txt_old'];?>"/>
          <span class="error" id="oldpwd"><?php echo $a_old,$a_match;?></span>
       </div>
       <div>
       	  <input type="password" name="txt_new" id="txt_new" class="form-control" placeholder="New Password" value="<?php echo $_POST['txt_new'];?>">
		  <span class="error" id="newpwd"><?php echo $a_new,$alertpwd;?></span>
       </div>
       <div>
         <input type="password" name="txt_confirm" id="txt_confirm" class="form-control" placeholder="Confirm Password" value="<?php echo $_POST['txt_confirm'];?>" />
		<span class="error" id="confirmpwd"><?php echo $a_confirm,$match,$alert;?></span>
       </div>
	   <div>
         <input type="submit" name="btn_submit" value="Submit" id="submit" class="btn btn-primary"/>
         <input type="reset" name="btn_cancel" onClick="clr()" value="Reset" class="btn btn-primary">
	   </div>	
		  </form>
          </div>
          </section>
        </div>
      </div>
    </section>
  </section>
<?php

include("footer.php");
?>
<script>
function clr()
{
	document.getElementById("txt_old").focus();
	document.getElementById("oldpwd").innerHTML="";
	document.getElementById("txt_old").defaultValue="";
	document.getElementById("newpwd").innerHTML="";
	document.getElementById("txt_new").defaultValue="";
	document.getElementById("confirmpwd").innerHTML="";
	document.getElementById("txt_confirm").defaultValue="";
}
$(document).ready(function() {
    $("#submit").click(function(){
		var old=$("#txt_old").val();
		if(old=='')
		{
			$("#oldpwd").html("Enter Old Password")
			$("#txt_old").focus();
			return false;
		}
		else
		{
			$("#oldpwd").html("");
		}
		
		var newpwd=$("#txt_new").val();
		if(newpwd=='')
		{
			$("#newpwd").html("Enter new Password")
			$("#txt_new").focus();
			return false;
		}
		else
		{
			$("#newpwd").html("");
		}
		
		var confirmpwd=$("#txt_confirm").val();
		if(confirmpwd=='')
		{
			$("#confirmpwd").html("Enter Confirm Password")
			$("#txt_confirm").focus();
			return false;
		}
		else if(newpwd!=confirmpwd)
		{
			$("#confirmpwd").html("Password is not match")
			$("#txt_confirm").focus();
			return false;
		}		
		else
		{
			$("#confirmpwd").html("");
		}
	});
});
</script>