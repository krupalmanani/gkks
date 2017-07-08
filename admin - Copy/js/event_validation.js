// JavaScript Document
$(document).ready(function(){
	$('#cal').datepicker({ dateFormat: "yy-mm-dd",minDate:"dateToday",beforeShow:function(){$('#cal').datepicker('option','maxDate',$('#cal1').val());} });
	
	$('#cal1').datepicker({ dateFormat: "yy-mm-dd",beforeShow:function(){
		$('#cal1').datepicker('option','minDate',$('#cal').val());
		if($('#cal').val()==''){$('#cal1').datepicker('option','minDate','dateToday')}}
	});
	 	 
	$("#submit").click(function(){
	var enm=$("#txt_name").val();
	if(enm=='')
	{
		$("#enm").html("Enter Event Name");
		$("#txt_name").focus();
		return false;
	}
	else if(enm.length<3)
	{
		$("#enm").html("Name alteast 3 character long");
		$("#txt_name").focus();
		return false;
	}
	else
	{
		$("#enm").html("");
	}
	
	var cat=$("#ddl_category").val();
	if(cat=="Select Category")
	{
		$("#cat").html("Select Category"); 
		$("#ddl_category").focus();
		return false;
	}
	else
	{
		$("#cat").html("");
	}
	
	var dtl=$("#txt_detail").val();
	if(dtl=='')
	{
		$("#dtil").html("Enter Event Detail");
		$("#txt_detail").focus();
		return false;
	}
	else if(dtl.length<5)
	{
		$("#dtil").html("Detail alteast 5 character long");
		$("#txt_detail").focus();
		return false;
	}
	else
	{
		$("#dtil").html("");
	}
	 
	var stdt=$("#cal").val();
	if(stdt=='')
	{
		$("#stdt").html("Enter Date");
		$("#cal").focus();
		return false;
	}
	else
	{
		$("#stdt").html("");
	}
	
	var eddt=$("#cal1").val();
	if(eddt=='')
	{
		$("#eddt").html("Enter Date");
		$("#cal1").focus();
		return false;
	}
	else
	{
		$("#eddt").html("");
	}
	
	var pto=$("#file_img").val();
	if(pto=='')
	{
		$("#pto").html("Select Photo");
		$("#file_img").focus();
		return false;
	}
	else
	{
		$("#pto").html("");
	}
	});
});			
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
function clear_all()
{
	document.getElementById("txt_name").defaultValue="";
	document.getElementById("txt_start").defaultValue="";
	document.getElementById("txt_end").defaultValue="";
}