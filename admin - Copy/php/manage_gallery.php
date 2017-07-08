<?php
	include("header.php");
?>
<?php
	$sel="select * from tbl_gallery order by gallery_id";
	$result=mysql_query($sel);
	if(mysql_affected_rows())
	{
	?>
<table border="1" cellpadding="5">
<tr>
	<td><input type="checkbox" id="selecctall"/><input type="button" name="btn_delete" id="btn_delete" value="Delete" /></td>
    <td>No</td>
    <td>Category</td>
    <td>Photo</td>
    <td>Edit</td>
    <td>Delete</td>
	<td>Status</td>
</tr>
<?php
	while($row=mysql_fetch_array($result))
	{	
	?>
	<tr>
    <td><input type="checkbox" name="chk_delete[]" value="<?php echo $row['gallery_id']?>" class="chk_delete" id="chk_del"/></td>
	<td><?php echo $row['gallery_id'];?></td>
    <td>
    <?php
		$sql_cat=mysql_query("select * from tbl_category cat,tbl_gallery g where cat.cat_id='$row[category]'");
		$row_cat=mysql_fetch_array($sql_cat);
		echo $row_cat['cat_name'];
	?>
    </td>
	<td><img src="<?php echo $row['gallery_photo'];?>" width="100" height="100"></td>
    <td><a href="edit_gallery.php?eid=<?php echo $row['gallery_id'];?>"><img src="../image/edit.png" height="30" width="30"></a></td>
    <td><a href="#" class="delete" did="<?php echo $row['gallery_id'];?>"><img src="../image/delete.png" height="45" width="45" /></a></td>
	<td>
	<?php
		if($row['gallery_status']==1)
		{
		?>
			<a href="#" status_a="<?php echo $row['gallery_id'];?>" class="active"><img src="../image/active.png" height="30" width="30"></a>
		<?php
		}
		else
		{
		?>
			<a href="#" status_d="<?php echo $row['gallery_id'];?>" class="deactive"><img src="../image/deactive.png" height="30" width="30"></a>
		<?php
		}
		?>
	</td>
	</tr>
	<?php
	}
	
	}
	else
	{
		echo '<script>alert("Record Not Found")</script>';
	}
	?>
</form>
<?php
	include("footer.php");
?>
<script src="../js/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$('#selecctall').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.chk_delete').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.chk_delete').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
   		 });
		$(".active").click(function(){
			var active=$(this);
			var act=active.attr("status_a");
			var conf=confirm("You want to Deactivate?");
			if(conf==true)
			{
			$.ajax({
				type:"GET",
				url:"action_gallery.php",
				data:{act:act},
				success:function(){
					location.reload();
				}
			});
			}
		});
		$(".deactive").click(function(){
			var deactive=$(this);
			var deact=deactive.attr("status_d");
			var conf=confirm("You want to Activate?");
			if(conf==true)
			{
			$.ajax({
				type:"GET",
				url:"action_gallery.php",
				data:{deact:deact},
				success:function(){
					location.reload();
				}
			});
			}
		});
		
		$(".delete").click(function(){
			var dele=$(this);
			var del=dele.attr("did");
			var conf=confirm("You want to Delete?");
			if(conf==true)
			{
			$.ajax({
				type:"GET",
				url:"action_gallery.php",
				data:{del:del},
				success:function(){
					location.reload();
				}
			});
			}
		});
		$("#btn_delete").click(function(){
		var del="";
        var count_checked = $("[name='chk_delete[]']:checked").length;
		var conf=confirm("You want to Delete?");
		if(conf==true)
		{
		for(i=0;i<count_checked;i++)
		{
			$(".chk_delete").each(function () 
			{
			var ischecked = $(this).is(":checked");
			if (ischecked) 
			{
				del= $(this).val();
				$.ajax({
					type:"GET",
					url:"action_gallery.php",
					data:{del:del},
					success:function(){
					location.reload();
					}
				});
			}
			});
		}
		}
	});
	});

</script>
