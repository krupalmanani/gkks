<?php
	include("header.php");
	$sql=mysql_query("select * from tbl_inquiry");
	if(mysql_affected_rows())
	{
?>
<?php
	if(isset($_GET['del']))
	{
		mysql_query("delete from tbl_inquiry where inquiry_id='$_GET[del]'");
	}
?>
<table border="1" cellpadding="5">
<tr>
	<td><input type="checkbox" id="selecctall"/><input type="button" name="btn_delete" id="btn_delete" value="Delete" /></td>
    <td>No</td>
    <td>Sender Name</td>
    <td>City</td>
    <td>State</td>
    <td>Country</td>
    <td>Mobile</td>
    <td>Email</td>
    <td>Message</td>
    <td>Delete</td>
</tr>
<?php
	while($row=mysql_fetch_array($sql))
	{
		echo '<tr>';
   		echo '<td><input type="checkbox" name="chk_delete[]" value="'.$row['inquiry_id'].'" class="chk_delete" id="chk_del"/></td>';
		echo '<td>'.$row['inquiry_id'].'</td>';
		echo '<td>'.$row['person_name'].'</td>';
		echo '<td>'.$row['city'].'</td>';
		echo '<td>'.$row['state'].'</td>';
		echo '<td>'.$row['country'].'</td>';
		echo '<td>'.$row['mobile'].'</td>';
		echo '<td>'.$row['email'].'</td>';
		echo '<td>'.$row['message'].'</td>';
		echo '<td><a href="#" class="delete" did="'.$row['inquiry_id'].'"><img src="../image/delete.png" height="45" width="45"></a></td>';
		echo '</tr>';
	}
?>
</table>
<?php
	}
	else
	{
		echo '<script>alert("Records not found")</script>';
	}
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
							url:"manage_inquiry.php",
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
	$(".delete").click(function(){
		var dele=$(this);
		var del=dele.attr("did");
		var conf=confirm("you want to delete?");
		if(conf==true)
		{
		$.ajax({
			type:"GET",
			url:"manage_inquiry.php",
			data:{del:del},
			success: function(){
				location.reload();
			}
		});
		}
	});
    });
</script>
<?php include("footer.php"); ?>