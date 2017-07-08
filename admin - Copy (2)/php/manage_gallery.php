<?php
	include("header.php");
?>
  <?php
	$sel="select * from tbl_gallery order by gallery_id";
	$result=mysql_query($sel);
	if(mysql_affected_rows())
	{
	?>
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-file-text-o"></i> Gallery</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
            <li><i class="icon_document_alt"></i>Gallery</li>
            <li><i class="fa fa-file-text-o"></i>Manage Gallery</li>
          </ol>
        </div>
      </div>
      <?php 
	  
	  //   count total number of rows from the desired table in the database  //
//step:2
    
  $query = mysql_query("SELECT * FROM tbl_gallery"); //Counting total number of rows in the table 'data',
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
    $res = mysql_query("SELECT * FROM tbl_gallery LIMIT ".$per_page." OFFSET ".$offset);

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
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="button" name="btn_delete" id="btn_delete" value="Delete" class="btn btn-info btn-sm"/></td>
                          <th>No</th>
                          <th>Category</th>
                          <th>Photo</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
	while($row=mysql_fetch_assoc($res))
	{	
	?>
                        <tr>
                          <td><input type="checkbox" name="chk_delete[]" value="<?php echo $row['gallery_id']?>" class="chk_delete" id="chk_del"/></td>
                          <td><?php echo $row['gallery_id'];?></td>
                          <td><?php
		//echo "select * from tbl_category cat,tbl_gallery g where cat.cat_id='$row[category]'";
		$sql_cat=mysql_query("select * from tbl_category cat,tbl_gallery g where cat.cat_id='$row[category]'");
		
		$row_cat=mysql_fetch_array($sql_cat);
		echo $row_cat['cat_name'];
	?></td>
                          <td><img src="<?php echo $row['gallery_photo'];?>" width="60" height="60" onError="this.src='../image/NoImage.gif';"></td>
                          <td><a href="edit_gallery.php?eid=<?php echo $row['gallery_id'];?>"><img src="../image/edit.png" height="30" width="30"></a></td>
                          <td><a href="#" class="delete" did="<?php echo $row['gallery_id'];?>"><img src="../image/delete.png" height="45" width="45" /></a></td>
                          <td><?php
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
		?></td>
                        </tr>
                        <?php
	}
	
	}
	else
	{
		echo '<script>alert("Record Not Found")</script>';
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
      <!--//display pagination page numbers //
    //step:9 
    --> 
    </section>
  </section>
  <?php
	include("footer.php");
?>
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
			swal({
		  title: "Are you sure?",
		  text: "",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn btn-danger",
		  confirmButtonText: "Yes, Deactivate",
		  closeOnConfirm: false
		},
		function(isConfirm) {
		  if (isConfirm) {
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
		});
		$(".deactive").click(function(){
			var deactive=$(this);
			var deact=deactive.attr("status_d");
			swal({
		  title: "Are you sure?",
		  text: "",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn btn-danger",
		  confirmButtonText: "Yes, Activate",
		  closeOnConfirm: false
		},
		function(isConfirm) {
		  if (isConfirm) {
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
		});
		
		$(".delete").click(function(){
			var dele=$(this);
			var del=dele.attr("did");
			swal({
		  title: "Are you sure?",
		  text: "",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn btn-danger",
		  confirmButtonText: "Yes, Delete !",
		  closeOnConfirm: false
		},
		function(isConfirm) {
		  if (isConfirm) {
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
		});
		
		$("#btn_delete").click(function(){
		var del="";
        var count_checked = $("[name='chk_delete[]']:checked").length;
		swal({
		  title: "Are you sure?",
		  text: "",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn btn-danger",
		  confirmButtonText: "Yes, Delete !",
		  closeOnConfirm: false
		},
		function(isConfirm) {
		  if (isConfirm) {
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
	});

</script>