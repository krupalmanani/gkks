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

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-file-text-o"></i> Inquiry</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
          <li><i class="icon_document_alt"></i>Inquiry</li>
          <li><i class="fa fa-file-text-o"></i>Manage Inquiry</li>
        </ol>
      </div>
    </div>
    <?php 
	 //   count total number of rows from the desired table in the database  //
//step:2
    
  $query = mysql_query("SELECT * FROM tbl_inquiry"); //Counting total number of rows in the table 'data',
  $total_rows = mysql_num_rows($query);

// setup configuration//  
//step:3

  $per_page = 5;                           //number of results to shown per page 
  $num_links = 1;                           // how many links you want to show
  $total_rows = $total_rows; 
  $cur_page = 1;                           // set default current page to 1
  
  //now we will extract information from url//
//step:4
    if(isset($_GET['page']))
    {
      $cur_page = $_GET['page'];
      $cur_page = ($cur_page < 1)? 1 : $cur_page;            //if page no. in url is less then 1 or -ve
    }
	
	// calculate limit and offset, it'll will be used for Sql Query//
//step:5
    $offset = ($cur_page-1)*$per_page;                //setting offset
   
    $pages = ceil($total_rows/$per_page);              // no of page to be created
	
	//Calculate the start and end page numbers for pagination links//
//step:6

    $start = (($cur_page - $num_links) > 0) ? ($cur_page - ($num_links - 1)) : 1;
    $end   = (($cur_page + $num_links) < $pages) ? ($cur_page + $num_links) : $pages;
	
	//query the database with calculated OFFSET //
//step:7
    $res = mysql_query("SELECT * FROM tbl_inquiry LIMIT ".$per_page." OFFSET ".$offset);

	 //        display the results //
     //step:8
     
        if(isset($res))// results from Step 7
        {
            //creating table
	?>
    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
          <header class="panel-heading"> Form Elements </header>
          <div class="panel-body">
            <div class="col-lg-12">
              <section class="panel">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <td><input type="checkbox" id="selecctall"/>
                          &nbsp;&nbsp;
                          <input type="button" name="btn_delete" id="btn_delete" value="Delete" class="btn btn-info btn-sm"/></td>
                        <th>No</th>
                        <th>Sender Name</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
	while($row=mysql_fetch_array($res))
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
                    </tbody>
                  </table>
                </div>
              </section>
            </div>
            <div id="pagination">
              <div id="pagiCount">
                <?php
                if(isset($pages))
                {  
                    if($pages > 1)        
                    {    if($cur_page > $num_links)     // for taking to page 1 //
                        {   $dir = "First";
                            echo '<span id="prev"> <a href="'.$_SERVER['PHP_SELF'].'?page='.(1).'">'.$dir.'</a> </span>';
                        }
                       if($cur_page > 1) 
                        {
                            $dir = "Prev";
                            echo '<span id="prev"> <a href="'.$_SERVER['PHP_SELF'].'?page='.($cur_page-1).'">'.$dir.'</a> </span>';
                        }                 
                        
                        for($x=$start ; $x<=$end ;$x++)
                        {
                            
                            echo ($x == $cur_page) ? '<strong>'.$x.'</strong> ':'<a href="'.$_SERVER['PHP_SELF'].'?page='.$x.'">'.$x.'</a> ';
                        }
                        if($cur_page < $pages )
                        {   $dir = "Next";
                            echo '<span id="next"> <a href="'.$_SERVER['PHP_SELF'].'?page='.($cur_page+1).'">'.$dir.'</a> </span>';
                        }
                        if($cur_page <= ($pages-$num_links) )
                        {   $dir = "Last";
                       
                            echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$pages.'">'.$dir.'</a> '; 
                        }   
                    }
                }
            ?>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <?php }?>
  </section>
</section>
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
			swal({
		  title: "Are you sure?",
		  text: "Your will not be able to recover this Record!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn btn-danger",
		  confirmButtonText: "Yes, delete it!",
		  closeOnConfirm: false
		},
		function(isConfirm) {
		  if (isConfirm) {
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
		});
		
		
		
	$(".delete").click(function(){
		var dele=$(this);
		var del=dele.attr("did");

		  swal({
		  title: "Are you sure?",
		  text: "Your will not be able to recover this Record!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn btn-danger",
		  confirmButtonText: "Yes, delete it!",
		  closeOnConfirm: false
		},
		function(isConfirm) {
		  if (isConfirm) {
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
});
</script>
<?php include("footer.php"); ?>