<?php
	include("header.php");
?>
<?php
	$sql=mysql_query("select * from tbl_member order by member_id");
	if(mysql_affected_rows())
	{
?>
<table border="1" cellpadding="5">
<tr>
	<td><input type="checkbox" id="selecctall"/><input type="button" name="btn_delete" id="btn_delete" value="Delete" /></td>
    <td>No</td>
    <td>Name</td>
    <td>User Name</td>
    <td>Password</td>
    <td>Date Of Birth</td>
    <td>Email</td>
    <td>Mobile</td>
    <td>Address</td>
    <td>Company Name</td>
    <td>Designation</td>
    <td>Photo</td>
    <td>Delete</td>
	<td>Status</td>
</tr>

<?php
	while($row=mysql_fetch_array($sql))
	{
		echo '<tr>';
		echo '<td><input type="checkbox" name="chk_delete[]" value="'.$row['member_id'].'" class="chk_delete" id="chk_del"/></td>';
		echo '<td>'.$row['member_id'].'</td>';
		echo '<td>'.$row['member_first_name']." ".$row['member_middle_name']." ".$row['member_surname'].'</td>';
		echo '<td>'.$row['member_uname'].'</td>';
		echo '<td>'.$row['member_password'].'</td>';
		echo '<td>'.$row['member_dob'].'</td>';
		echo '<td>'.$row['member_email'].'</td>';
		echo '<td>'.$row['member_mobile'].'</td>';
		echo '<td>'.$row['member_address'].'</td>';
		echo '<td>'.$row['member_company_name'].'</td>';
		echo '<td>'.$row['member_designation'].'</td>';
		echo '<td><a href="../../'.$row['member_photo'].'"><img src="../../'.$row['member_photo'].'" height="100" width="100"></a></td>';
		echo '<td><a href="#" class="delete" did="'.$row['member_id'].'"><img src="../image/delete.png" height="40" width="40"></a></td>';
		echo '<td>';
		if($row['member_status']==1)
		{
			echo '<a href="#" class="active" a_id="'.$row['member_id'].'"><img src="../image/active.png" height="30" width="30"></a>';
		}
		else
		{
			echo '<a href="#" class="deactive" d_id="'.$row['member_id'].'"><img src="../image/deactive.png" height="30" width="30"></a>';
		}
		echo '</td>';
		echo '</tr>';
	}
	}
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
	$("#btn_delete").click(function(){
		var del="";
        var count_checked = $("[name='chk_delete[]']:checked").length;
		var conf=confirm("You Want to Delete?");
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
					url:"action_member.php",
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
		var conf=confirm("You Want to Deactivate?");
		if(conf==true)
		{
		$.ajax({
			type:"GET",
			url:"action_member.php",
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
			url:"action_member.php",
			data:{deact:deact},
			success: function(){
				location.reload();
			}
		});	
		}
	});
	
	$(".delete").click(function() {
        var dele=$(this);
		var del=dele.attr("did");
		var conf=confirm("You Want to Delete?");
		if(conf==true)
		{
		$.ajax({
			type:"GET",
			url:"action_member.php",
			data:{del:del},
			success:function(){
				location.reload();
			}
		});
		}
    });
});
</script>
<?php include("footer.php");?>