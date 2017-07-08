<?php
	include("header.php");
	$sql=mysql_query("select * from tbl_event");
	if(mysql_affected_rows())
	{
?>
<table border="1" cellpadding="5">
<tr>
	<td><input type="checkbox" id="selecctall"/><input type="button" name="btn_delete" id="btn_delete" value="Delete" /></td>
    <td>No</td>
    <td>Name</td>
    <td>Category</td>
    <td>Detail</td>
    <td>Start Date</td>
    <td>End Date</td>
    <td>Photo</td>
    <td>Edit</td>
    <td>Delete</td>
    <td>Status</td>
</tr>
<?php
	while($row=mysql_fetch_array($sql))
	{
		echo '<tr>';
   		echo '<td><input type="checkbox" name="chk_delete[]" value="'.$row['event_id'].'" class="chk_delete" id="chk_del"/></td>';
		echo '<td>'.$row['event_id'].'</td>';
		echo '<td>'.$row['event_name'].'</td>';
		
		$sql_cat=mysql_query("select * from tbl_category cat,tbl_event e where cat.cat_id='$row[event_cat]'");
		$row_cat=mysql_fetch_array($sql_cat);
		
		echo '<td>'.$row_cat['cat_name'].'</td>';
		
		echo '<td>'.$row['event_detail'].'</td>';
		echo '<td>'.$row['start_date'].'</td>';
		echo '<td>'.$row['end_date'].'</td>';
		echo '<td>';
		foreach(explode(",","$row[event_photo]") as $a)
		{
			echo '<img src="'.$a.'" height="100" width="100">';
		}
		echo '</td>';
		echo '<td><a href=edit_event.php?eid='.$row['event_id'].'><img src="../image/edit.png" height="30" width="30"></a></td>';
		echo '<td><a href="#" class="delete" did="'.$row['event_id'].'"><img src="../image/delete.png" height="45" width="45"></td>';
		echo '<td>';
		if($row['event_status']==1)
		{
			echo '<a href="#" a_id="'.$row['event_id'].'" class="active"><img src="../image/active.png" height="30" width="30"></a>';
		}
		else
		{
			echo '<a href="#" d_id="'.$row['event_id'].'" class="deactive"><img src="../image/deactive.png" height="30" width="30"></a>';
		}
		echo '</td>';
		echo '</tr>';
	}
	}
	else
	{
		echo '<script>alert("Records Not Found")</script>';
	}
?>
</table>
<?php include("footer.php");?>
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
			var conf=confirm("You want to delete?");
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
							url:"action_event.php",
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
		var conf=confirm("you want to deactivate?");
		if(conf==true)
		{
		$.ajax({
			type:"GET",
			url:"action_event.php",
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
		var conf=confirm("you want to activate?");
		if(conf==true)
		{
		$.ajax({
			type:"GET",
			url:"action_event.php",
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
		var conf=confirm("you want to delete?");
		if(conf==true)
		{
		$.ajax({
			type:"GET",
			url:"action_event.php",
			data:{del:del},
			success: function(){
				location.reload();
			}
		});
		}
	});
    });
</script>