// JavaScript Document
$(document).ready(function() {
    $("#submit").click(function(){
	
	var email=$("#txt_email").val();
	if(email=='')
	{
		$("#email").html("Enter Email Id");
		$("#txt_email").focus();
		return false;
	}
	else
	{
		$("#email").html("");
	}
	
	var pass=$("#txt_password").val();
	if(pass=='')
	{
		$("#password").html("Enter Password");
		$("#txt_password").focus();
		return false;
	}
	else if(pass.length<5)
	{
		$("#password").html("Password atleast 5 Character long.");
		$("#txt_password").focus();
		return false;
	}
	else
	{
		$("#password").html("");
	}
	
	var conf=$("#txt_confirm").val();
	if(conf=='')
	{
		$("#confirm").html("Enter Confirm Password");
		$("#txt_confirm").focus();
		return false;
	}
	else if(conf!=pass)
	{
		$("#confirm").html("Password Not Match");
		$("#txt_confirm").focus();
		return false;
	}
	else
	{
		$("#confirm").html("");
	}
	
	var nm=$("#txt_fnm").val();
	if(nm=='')
	{
		$("#nm").html("Ente First Name");
		$("#txt_fnm").focus();
		return false;
		
	}
	else if(nm.length<3 || nm.length>25)
	{
		$("#nm").html("Name must be between 3 and 25 characters long.");
		$("#txt_fnm").focus();
		return false;
	}
	else
	{
		$("#nm").html("");
	}
	
	var mnm=$("#txt_mnm").val();
	if(mnm=='')
	{
		$("#nm").html("Ente Middle Name");
		$("#txt_mnm").focus();
		return false;
		
	}
	else if(mnm.length<3 || mnm.length>25)
	{
		$("#nm").html("Name must be between 3 and 25 characters long.");
		$("#txt_mnm").focus();
		return false;
	}
	else
	{
		$("#nm").html("");
	}
	
	var lnm=$("#txt_lnm").val();
	if(lnm=='')
	{
		$("#nm").html("Ente Last Name");
		$("#txt_lnm").focus();
		return false;
		
	}
	else if(lnm.length<3 || lnm.length>25)
	{
		$("#nm").html("Name must be between 3 and 25 characters long.");
		$("#txt_lnm").focus();
		return false;
	}
	else
	{
		$("#nm").html("");
	}
	
	var year=$("#ddl_year").val();
	if(year=='Year')
	{
		$("#dob").html("Select Year");
		$("#ddl_year").focus();
		return false;
	}
	else
	{
		$("#dob").html("");
	}
	
	var month=$("#ddl_month").val();
	if(month=='Month')
	{
		$("#dob").html("Select Month");
		$("#ddl_month").focus();
		return false;
	}
	else
	{
		$("#dob").html("");
	}
	
	var day=$("#ddl_day").val();
	if(day=='Day')
	{
		$("#dob").html("Select Day");
		$("#ddl_day").focus();
		return false;
	}
	else
	{
		$("#dob").html("");
	}
	
	var height=$("#txt_height").val();
	if(height=='')
	{
		$("#height").html("Enter Your Height");
		$("#txt_height").focus();
		return false;
		
	}
	else
	{
		$("#height").html("");
	}
	
	var gen=$("#ddl_gender").val();
	if(gen=='Select')
	{
		$("#gender").html("Select Gender");
		$("#ddl_gender").focus();
		return false;
	}
	else
	{
		$("#gender").html("");
	}
	
	var weight=$("#txt_weight").val();
	if(weight=='')
	{
		$("#weight").html("Enter Your Weight");
		$("#txt_weight").focus();
		return false;
		
	}
	else
	{
		$("#weight").html("");
	}
	
	var gen=$("#ddl_gender").val();
	if(gen=='Gender')
	{
		$("#gender").html("Select Gender");
		$("#ddl_gender").focus();
		return false;
	}
	else
	{
		$("#gender").html("");
	}
	
	var btype=$("#ddl_bodytype").val();
	if(btype=='Body Type')
	{
		$("#btype").html("Select Body Type");
		$("#ddl_bodytype").focus();
		return false;
	}
	else
	{
		$("#btype").html("");
	}
	
	var complexion=$("#ddl_complexion").val();
	if(complexion=='Complexion')
	{
		$("#complexion").html("Select Complexion");
		$("#ddl_complexion").focus();
		return false;
	}
	else
	{
		$("#complexion").html("");
	}
	
	var photo=$("#file_img").val();
	if(photo=='')
	{
		$("#pto").html("Select Photo");
		$("#file_img").focus();
		return false;
	}
	else
	{
		$("#pto").html("");
	}
	
	var edu=$("#txt_education").val();
	if(edu=='')
	{
		$("#education").html("Enter Education");
		$("#txt_education").focus();
		return false;
	}
	else if(edu.length<2 || edu.length>20)
	{
		$("#education").html("Education atleast 2 to 20 character long");
		$("#txt_education").focus();
		return false;
	}
	else
	{
		$("#education").html("");
	}
	
	var occupation=$("#txt_occupation").val();
	if(occupation=='')
	{
		$("#occupation").html("Enter Occupation");
		$("#txt_occupation").focus();
		return false;
	}
	else if(occupation.length<3 || occupation.length>20)
	{
		$("#occupation").html("Occupation atleast 3 to 20 character long");
		$("#txt_occupation").focus();
		return false;
	}
	else
	{
		$("#occupation").html("");
	}
	
	var income=$("#txt_income").val();
	if(income=='')
	{
		$("#income").html("Enter Your Income");
		$("#txt_income").focus();
		return false;
	}
	else
	{
		$("#income").html("");
	}
	
	var bplace=$("#txt_bplace").val();
	if(bplace=='')
	{
		$("#bplace").html("Enter Your Birth Place");
		$("#txt_bplace").focus();
		return false;
	}
	else if(bplace.length<3 || bplace.length>20)
	{
		$("#bplace").html("Birth Place atleast 3 characters long");
		$("#txt_bplace").focus();
		return false;
	}
	else
	{
		$("#bplace").html("");
	}
	
	var grew=$("#txt_grew").val();
	if(grew=='')
	{
		$("#grew").html("Enter Grew up");
		$("#txt_grew").focus();
		return false;
	}
	else if(grew.length<3 || grew.length>20)
	{
		$("#grew").html("Name atleast 3 character long");
		$("#txt_grew").focus();
		return false;
	}
	else
	{
		$("#grew").html("");
	}
	
	var present=$("#txt_present").val();
	if(present=='')
	{
		$("#present").html("Enter Present Location");
		$("#txt_present").focus();
		return false;
	}
	else if(present.length<3 || present.length>20)
	{
		$("#present").html("Location atleast 3 character long");
		$("#txt_present").focus();
		return false;
	}
	else
	{
		$("#present").html("");
	}
	
	var personality=$("#txt_personality").val();
	if(personality=='')
	{
		$("#personality").html("Enter Your Personality");
		$("#txt_personality").focus();
		return false;
	}
	else if(personality.length<3)
	{
		$("#personality").html("Personality atleast 3 character long");
		$("#txt_personality").focus();
		return false;
	}
	else
	{
		$("#personality").html("");
	}
	
	var hoby=$("#txt_hoby").val();
	if(hoby=='')
	{
		$("#hoby").html("Enter Your Hobby");
		$("#txt_hoby").focus();
		return false;
	}
	else if(hoby.length<3)
	{
		$("#hoby").html("Hobby atleast 3 character long");
		$("#txt_hoby").focus();
		return false;
	}
	else
	{
		$("#hoby").html("");
	}
	
	var pref=$("#txt_pref").val();
	if(pref=='')
	{
		$("#pref").html("Enter Partner Preference");
		$("#txt_pref").focus();
		return false;
	}
	else if(pref.length<3)
	{
		$("#pref").html("Preference atleast 3 character long");
		$("#txt_pref").focus();
		return false;
	}
	else
	{
		$("#pref").html("");
	}
	
	var fname=$("#txt_fname").val();
	if(fname=='')
	{
		$("#fname").html("Enter Father's Name");
		$("#txt_fname").focus();
		return false;
	}
	else if(fname.length<3 || fname.length>20)
	{
		$("#fname").html("Name atleast 3 character long");
		$("#txt_fname").focus();
		return false;
	}
	else
	{
		$("#fname").html("");
	}
	
	var mname=$("#txt_mname").val();
	if(mname=='')
	{
		$("#mname").html("Enter Mother's Name");
		$("#txt_mname").focus();
		return false;
	}
	else if(mname.length<3 || mname.length>20)
	{
		$("#mname").html("Name atleast 3 character long");
		$("#txt_mname").focus();
		return false;
	}
	else
	{
		$("#mname").html("");
	}
	
	var mosal=$("#txt_mosal").val();
	if(mosal=='')
	{
		$("#mosal").html("Enter Mosal Name");
		$("#txt_mosal").focus();
		return false;
	}
	else if(mosal.length<3 || mosal.length>20)
	{
		$("#mosal").html("Name atleast 3 character long");
		$("#txt_mosal").focus();
		return false;
	}
	else
	{
		$("#mosal").html("");
	}
	
	var msname=$("#txt_msname").val();
	if(msname=='')
	{
		$("#msname").html("Enter Mosal Surname");
		$("#txt_msname").focus();
		return false;
	}
	else if(msname.length<3 || msname.length>20)
	{
		$("#msname").html("Surname atleast 3 character long");
		$("#txt_msname").focus();
		return false;
	}
	else
	{
		$("#msname").html("");
	}
	
	var mantive=$("#txt_mnative").val();
	if(mantive=='')
	{
		$("#mantive").html("Enter Mosal Native");
		$("#txt_mnative").focus();
		return false;
	}
	else if(mantive.length<3 || mantive.length>20)
	{
		$("#mantive").html("Native atleast 3 character long");
		$("#txt_mnative").focus();
		return false;
	}
	else
	{
		$("#mantive").html("");
	}
	
	var brother=$("#txt_brother").val();
	if(brother=='')
	{
		$("#brother").html("Enter No Of Brothers");
		$("#txt_brother").focus();
		return false;
	}
	else if(brother.length<1)
	{
		$("#brother").html("Brothers atleast 1 character long");
		$("#txt_brother").focus();
		return false;
	}
	else
	{
		$("#brother").html("");
	}
	
	var sister=$("#txt_sister").val();
	if(sister=='')
	{
		$("#sister").html("Enter No Of Sister");
		$("#txt_sister").focus();
		return false;
	}
	else if(sister.length<1)
	{
		$("#sister").html("Sister atleast 1 character long");
		$("#txt_sister").focus();
		return false;
	}
	else
	{
		$("#sister").html("");
	}
	
	var family=$("#txt_family").val();
	if(family=='')
	{
		$("#family").html("Enter Family Detail");
		$("#txt_family").focus();
		return false;
	}
	else if(family.length<5 || family.length>500)
	{
		$("#family").html("Detail atleast 5 character long");
		$("#txt_family").focus();
		return false;
	}
	else
	{
		$("#family").html("");
	}
	
	var contact=$("#txt_contact").val();
	if(contact=='')
	{
		$("#contact").html("Enter Contact Detail");
		$("#txt_contact").focus();
		return false;
	}
	else if(contact.length<5 || contact.length>500)
	{
		$("#contact").html("Detail atleast 5 character long");
		$("#txt_contact").focus();
		return false;
	}
	else
	{
		$("#contact").html("");
	}
	});
});
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 40 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

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
