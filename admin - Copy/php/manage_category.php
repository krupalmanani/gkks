<?php
	include("header.php");
	$sql=mysql_query("select * from tbl_category");
	if(mysql_affected_rows())
	{
?>
<?php
	if(isset($_GET['del']))
	{
		mysql_query("delete from tbl_category where cat_id='$_GET[del]'");
	}
	if(isset($_GET['act']))
	{
		mysql_query("update tbl_category set cat_status=0 where cat_id='$_GET[act]'");
	}
	if(isset($_GET['deact']))
	{
		mysql_query("update tbl_category set cat_status=1 where cat_id='$_GET[deact]'");
	}
?>
<table border="1" cellpadding="5">
<tr>
    <td><input type="checkbox" id="selecctall"/><input type="button" name="btn_delete" id="btn_delete" value="Delete" /></td>
	<td>No</td>
    <td>Category</td>
    <td>Delete</td>
    <td>Edit</td>
    <td>Status</td>
</tr>
<?php
	while($row=mysql_fetch_array($sql))
	{
		echo '<tr>';
		echo '<td><input type="checkbox" name="chk_delete[]" value="'.$row['cat_id'].'" class="chk_delete" id="chk_del"/></td>';
		echo '<td>'.$row['cat_id'].'</td>';
		echo '<td>'.$row['cat_name'].'</td>';
		echo '<td><a href="#" class="delete" did="'.$row['cat_id'].'"><img src="../image/delete.png" height="40" width="40"></td>';
		echo '<td><a href=edit_category.php?eid='.$row['cat_id'].'><img src="../image/edit.png" height="30" width="30"></a></td>';
		echo '<td>';
		if($row['cat_status']==1)
		{
		?>
			<a href="#" a_id="<?php echo $row['cat_id'];?>" class="active"><img src="../image/active.png" height="30" width="30"></a>
        <?php	
		}
		else
		{
		?>
			<a href="#" d_id="<?php echo $row['cat_id'];?>" class="deactive"><img src="../image/deactive.png" height="30" width="30"></a>
         <?php
		}
		echo '</td>';
		echo '</tr>';	
	}
?>
</table>
<?php
	}
	else
	{
		echo '<script>alert("Category Not Found")</script>';
	}
?>
<?php
	include("footer.php");
?>
<script src="../js/jquery.min.js"></script>
<script>
	$(document).ready(function() {
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
        $("#btn_delete").click(function(){
		var del="";
		var count_checked = $("[name='chk_delete[]']:checked").length;
		var conf=confirm("You Want Delete?");
		if(conf==true)
		{
			for(i=0;i<count_checked;i++)
			{
				$(".chk_delete").each(function (){
					var ischecked = $(this).is(":checked");
					if (ischecked) 
					{
						del= $(this).val();
						$.ajax({
							type:"GET",
							url:"manage_category.php",
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
		$(".active").click(function() {
        var actv=$(this);
		var act=actv.attr("a_id");
		var conf=confirm("You Want Deactivate?");
		if(conf==true)
		{
			$.ajax({
				type:"GET",
				url:"manage_category.php",
				data:{act:act},
				success: function(){
					location.reload();
				}
			});
		}
   		});
		
		$(".deactive").click(function(){
		var deactv=$(this);
		var deact=deactv.attr("d_id");
		var conf=confirm("You Want Activate?");
		if(conf==true)
		{
			$.ajax({
				type:"GET",
				url:"manage_category.php",
				data:{deact:deact},
				success: function(){
					location.reload();
				}
			});
		}
		});
		
		$(".delete").click(function(){
		var dele=$(this);
		var del=dele.attr("did");
		var conf=confirm("You Want Delete?");
		if(conf==true)
		{
			$.ajax({
			type:"GET",
			url:"manage_category.php",
			data:{del:del},
			success:function(){
				location.reload();
			}
			});
		}
		});
    });
</script>