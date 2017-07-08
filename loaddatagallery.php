<?php
$last_msg_id=$_GET['last_msg_id'];
$action=$_GET['action'];

if($action <> "get")
{
?>
<script type="text/javascript">
	$(document).ready(function(){
			
		function last_msg_funtion() 
		{ 
		   
           var ID=$(".message_box:last").attr("id");
			$('div#last_msg_loader').html('<img src="image/big-loader.gif">');
			$.post("loaddatagallery.php?action=get&last_msg_id="+ID,
			
			function(data){
				if (data != "") {
				$(".message_box:last").after(data);			
				}
				$('div#last_msg_loader').empty();
			});
		};  
		
		$(window).scroll(function(){
			if  ($(window).scrollTop() == $(document).height() - $(window).height()){
			   last_msg_funtion();
			}
		}); 
		
	});
	</script>
<?php
include('loadfirstgallery.php');
?>
<div id="last_msg_loader"></div>
</div>
</body>
</html>

<?php
}
else
{
 
include('loadsecondgallery.php');		
}
?>	
