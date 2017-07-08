<?php
session_start();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/* if(!defined("DBHOST")){

  include_once './config.php';
  } */
//require_once('class.phpmailer.php');
include_once 'base.php';

class Module extends PCGDb
{

    public $objDB = null;
    public $PostStatus=array(
        '0'=>'Rejected',
        '1'=>'Running',
        '2'=>'Closed',
        '3'=>'Won'
        
    );
    public $PostStatusColor=array(
        '0'=>'red',
        '1'=>'green',
        '2'=>'red',
        '3'=>'green'
    );
    
    public $arrWinStatus = array('0'=>'Running','1'=>'Awarded','2'=>'Completed','3'=>'Not Awarded','4'=>'Mark as done');
    public $arrWinStatusColor = array('0'=>'green','1'=>'green','2'=>'green','3'=>'red','4'=>'green');
    
    public $arrMessage=array(
        '1'=> "has bidded on your job",
        '2'=>"has sent you a message for the job",
        '3'=>"has updated bid for your job",
        '4'=>"has accepted your bid for the job",
        '5'=>"has rejected your bid for the job",
        '6'=>"has accepted milestone for the job",
        '7'=>"has rejected milestone for the job",
        '8'=>"has added new milestone for job",
        '9'=>"has added review for the job",
        '10'=>"Your milestone <milestone name> for job <job name> is running over due",
        '11'=>"Document has been Rejected for the milestone <milestone name> of job <job name> by the system"
    );

    function __consturct($strHost = '', $strDB = '', $strUser = '', $strPass = '')
    {
        parent::__construct($strHost, $strDB, $strUser, $strPass);
    }

    function getRequest($strKey, $strDefault = '', $strGlobal = 'REQUEST')
    {
        switch (strtoupper(trim($strGlobal)))
        {
            case 'REQUEST':
                if (isset($_REQUEST[$strKey]))
                {
                    return trim($_REQUEST[$strKey]);
                }
                else
                {
                    return $strDefault;
                }
                break;
            case 'POST':
                if (isset($_POST[$strKey]))
                {
                    return trim($_POST[$strKey]);
                }
                else
                {
                    return $strDefault;
                }
                break;
            case 'GET':
                if (isset($_GET[$strKey]))
                {
                    return trim($_GET[$strKey]);
                }
                else
                {
                    return $strDefault;
                }
                break;
            default: return $strDefault;
        }
    }

    function setSession($strKey, $strValue)
    {
        $_SESSION[session_id() . '_admin'][$strKey] = $strValue;
    }

    function resetSession($strKey)
    {
        if (isset($_SESSION[session_id() . '_admin']))
            unset($_SESSION[session_id() . '_admin'][$strKey]);
    }

    function getSession($strKey, $strDefault = '')
    {
        if (isset($_SESSION[session_id() . '_admin'][$strKey]))
        {
            return $_SESSION[session_id() . '_admin'][$strKey];
        }
        else
        {
            return $strDefault;
        }
    }

    function getConfig($strFlag)
    {
        if (isset($_SESSION[session_id() . '_CONFIG'][$strFlag]))
        {
            return $_SESSION[session_id() . '_CONFIG'][$strFlag];
        }
        return '';
    }

    function getEditData(&$arrEditData, $strKey)
    {
        if (trim($strKey) != '' && isset($arrEditData[$strKey]))
        {
            return stripslashes(htmlspecialchars($arrEditData[$strKey]));
        }
        return '';
    }

    /**
     * @param type $strMsg
     * @param type $strType (success/error/danger/info)
     * 
     */
    function setMessage($strMsg, $strType = "sucess")
    {
        if (trim($strMsg) != '')
        {
            $_SESSION[session_id() . '_admin']["system_message"] = $strMsg;
            $_SESSION[session_id() . '_admin']["system_message_type"] = $strType;
        }
    }

    function getMessage()
    {
        if (isset($_SESSION[session_id() . '_admin']["system_message"]) && $_SESSION[session_id() . '_admin']["system_message"] != ''):

            $strHtml = "<div class='alert alert-" . $_SESSION[session_id() . '_admin']['system_message_type'] . "'>";
            //$strHtml .="<button data-dismiss='alert' type='button' class='close'></button>";
            $strHtml .=$_SESSION[session_id() . '_admin']['system_message'];
            $strHtml .='<span></span>';
            $strHtml .="</div>";
            unset($_SESSION[session_id() . '_admin']['system_message']);
            unset($_SESSION[session_id() . '_admin']['system_message_type']);
            return $strHtml;
        endif;
        return '';
    }

    function redirect($strPath)
    {
        if (!headers_sent()):
            header("location: " . $strPath);
            exit;
        else:
            echo "<script type='text/javascript'>window.location.href='" . $strPath . "'</script>";
            exit;
        endif;
    }

    function getCountry()
    {
        return $this->getAll("select * from tbl_country ORDER BY Name asc");
    }

    function getCategory()
    {
        return $this->getAll("SELECT * FROM tbl_category ORDER BY name ASC");
    }

    function timeDiff($strDate1, $strDate2)
    {
        $dateF = new DateTime($strDate1);
        $dateL = new DateTime($strDate2);
        $interval = $dateF->diff($dateL);
        $years = $interval->y;
        $days = $interval->d;
        $hours = $interval->h;
        $mins = $interval->i;
        $sec = $interval->s;
        $diff = abs(strtotime($strDate1) - strtotime($strDate2));
        $weeks = floor($diff / 604800);
        $str = '';
        if ($days > 0)
        {
            return date("M d Y",  strtotime($strDate1));
        }
        else
        {
            if ($hours > 0)
            {
                $str = $this->chk_gtr2($hours, 'hr');
            }
            if ($mins > 0)
            {
                $str .='&nbsp;' . $this->chk_gtr2($mins, 'minute');
            }
            if($mins==0)
            {
                $str .='&nbsp;' .'0'. ' ' .'minute';
            }
            return $str . ' &nbsp; ago';
        }
    }
    function timeDiff2($strDate1, $strDate2)
    {
        $dateF = new DateTime($strDate1);
        $dateL = new DateTime($strDate2);
        $interval = $dateF->diff($dateL);
        $years = $interval->y;
        $days = $interval->d;
        $hours = $interval->h;
        $mins = $interval->i;
        $sec = $interval->s;
        $diff = abs(strtotime($strDate1) - strtotime($strDate2));
        $weeks = floor($diff / 604800);
        $str = '';
        if ($days > 0)
        {
            return date("M d Y",  strtotime($strDate2));
        }
        else
        {
            if ($hours > 0)
            {
                $str = $this->chk_gtr2($hours, 'hr');
            }
            if ($mins > 0)
            {
                $str .='&nbsp;' . $this->chk_gtr2($mins, 'minute');
            }
            if($mins==0)
            {
                $str .='&nbsp;' .'0'. ' ' .'minute';
            }
            return $str . ' &nbsp; ago';
        }
    }

    function chk_gtr2($count, $attr)
    {
        if ($count > 1)
        {
            return $count . ' ' . $attr . 's';
        }
        else
        {
            return $count . ' ' . $attr;
        }
    }

    function timeLeft($strDate1, $strDate2)
    {
        $dateF = new DateTime($strDate1);
        $dateL = new DateTime($strDate2);
        $interval = $dateF->diff($dateL);
        $years = $interval->y;
        $days = $interval->d;
        $hours = $interval->h;
        $mins = $interval->i;
        $sec = $interval->s;
        $diff = abs(strtotime($date2) - strtotime($date1));
        $weeks = floor($diff / 604800);
        $str = '';
        if ($days > 0)
        {
            $str = $days . " d ";
        }
        if ($hours > 0)
        {
            $str .=$hours . ' h';
        }

        return $str;
    }

    function getClass($strEx = '')
    {
        if ($strEx != '')
        {
            $arrEx = array(
                'doc' => 'jp-word',
                'docx' => 'jp-word',
                'txt' => 'jp-text',
                'pdf' => 'jp-pdf',
                'xls' => 'jp-xls',
                'xlsx' => 'jp-xls',
                'jpg' => 'jp-img',
                'jpeg' => 'jp-img',
                'png' => 'jp-img'
            );
            return $arrEx[$strEx];
        }
        return '';
    }

    function getName($table, $column1, $field1, $field2)
    {
        if ($field1 != '' && $field2 != '')
        {
            $strTableName   =   $table;
            $arrFields      =   array($column1);
            $strWhere       =   " ".$field1." = '".$field2."'  ";
            $arrResult      = $this->getAll($strTableName,$arrFields,$strWhere);
            return $arrResult;
        }
    }
    function getShortDescription($strString='')
    {
        $strNew='';
        if($strString!='')
        {
            $strLen = strlen($strString);
            if($strLen>500)
            {
                $strNew = substr($strString, 0, 500)."...";
            }
            else
            {
                $strNew =  $strString;
            }
            return stripslashes($strNew);
        }
        return '';
    }
    function roundDownToHalf($n) 
    {
        return number_format(floatval(intval($n)+((($n*10)%10)>=5?.5:0)),1,'.','');
    }
    

}

$objModule = new Module();
function get_likes($itm_id){
	$objModule = new Module();
	$arrLikes = $objModule->getAll("SELECT * FROM tbl_like_product WHERE itm_id='".$itm_id."'");
	return count($arrLikes);
}

function get_live_rate_boe($converter){
	if($_SESSION['currency']=='NIS'){
		$converter='XUDLBK65';
	}
	else if($_SESSION['currency']=='EURO'){
		$converter='EUR';
	}
	else if($_SESSION['currency']=='USD'){
		$converter='USD';
	}
	$curl_handle=curl_init();
	curl_setopt($curl_handle, CURLOPT_URL,'https://www.quandl.com/api/v3/datasets/BOE/'.$converter.'/data.json?api_key=6HsMoDr5AWiZBR7Wy99g');
	curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Madame');
	$urls = curl_exec($curl_handle);
	curl_close($curl_handle);
	$json_data = json_decode($urls,true);
	return  $json_data['dataset_data']['data'][0][1];
}
  function scrape_between($data, $start, $end)
    {
        $data = stristr($data, $start); // Stripping all data from before $start
        $data = substr($data, strlen($start));  // Stripping $start
        $stop = stripos($data, $end);   // Getting the position of the $end of the data to scrape
        $data = substr($data, 0, $stop);    // Stripping all data from after and including the $end of the data to scrape
        return $data;   // Returning the scraped data from the function
    }
function get_live_rate_usd(){

	$ses_currency='USD';
    $url = "http://www.google.com/finance/converter?a=1&from=ILS&to=".$ses_currency; 
 
    $request = curl_init(); 
    $timeOut = 0; 
    curl_setopt ($request, CURLOPT_URL, $url); 
    curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1); 
 
    curl_setopt ($request, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
    curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, $timeOut); 
    $response = curl_exec($request); 
    curl_close($request); 
	$results_page1 = scrape_between($response, "<span class=bld>",$ses_currency);
	
	return round($results_page1,2);
}   


function get_live_rate(){
	if($_SESSION['currency']=='NIS'){
		return 1;
	}
	else if($_SESSION['currency']=='EURO'){
		$ses_currency='EUR';
	}
	else if($_SESSION['currency']=='USD'){
		$ses_currency='USD';
	}
    $url = "http://www.google.com/finance/converter?a=1&from=ILS&to=".$ses_currency; 
 
    $request = curl_init(); 
    $timeOut = 0; 
    curl_setopt ($request, CURLOPT_URL, $url); 
    curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1); 
 
    curl_setopt ($request, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
    curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, $timeOut); 
    $response = curl_exec($request); 
    curl_close($request); 
	$results_page1 = scrape_between($response, "<span class=bld>",$ses_currency);
	if($_SESSION['currency']=='NIS'){
		return 1;
	}
	else{
		return round($results_page1,2);
	}
}
function Product_get_live_rate($currency){
	if($currency=='NIS'){
		return 1;
	}
	else if($currency=='EURO'){
		$ses_currency='EUR';
	}
	else if($currency=='USD'){
		$ses_currency='USD';
	}
    $url = "http://www.google.com/finance/converter?a=1&from=ILS&to=".$ses_currency; 
 
    $request = curl_init(); 
    $timeOut = 0; 
    curl_setopt ($request, CURLOPT_URL, $url); 
    curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1); 
 
    curl_setopt ($request, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
    curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, $timeOut); 
    $response = curl_exec($request); 
    curl_close($request); 
	$results_page1 = scrape_between($response, "<span class=bld>",$ses_currency);
	if($currency=='NIS'){
		return 1;
	}
	else{
		return round($results_page1,2);
	}
} 
function random_val($ch,$num){		
	$text      = "";		
	$text1     = "";		
	$text2     = "";		
	$possible1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";		
	$possible2 = "0123456789";		
	for ($i = 0; $i < $ch; $i++) {			
	$text1 = substr(str_shuffle($possible1), 1, $ch);		
	}		
	for ($j = 0; $j < $num; $j++) {			
	$text2 = substr(str_shuffle($possible2), 1, $num);		
	}		
	return $text1.$text2;
} 

function getConvertedPrice($price){
  
  if($_SESSION['currency'] == 'USD'){
   $finalPrice = round($price*get_live_rate(),2);
   if($finalPrice=='' or $finalPrice=='0'){
	 $finalPrice = round($price/get_live_rate_boe('XUDLBK65'),2);
   }
   $finalPriceHtml = "<span class='money_symbol'>$</span>".$finalPrice;
   //$price = 
  }
  else if($_SESSION['currency'] == 'EURO'){
   $finalPrice = round($price*get_live_rate(),2);
   if($finalPrice=='' or $finalPrice=='0'){
	 $finalPrice = round($price/get_live_rate_boe('XUDLBK65'),2);
   }
   $finalPriceHtml = "<span class='money_symbol'>&#8364;</span>".$finalPrice; 
   //$price = 
  }
  else if($_SESSION['currency'] == 'NIS'){
   //$finalPrice = round($price*get_live_rate('XUDLBK65'),2); 
   $finalPrice = round($price,2);
   $finalPriceHtml = "<span class='money_symbol'>&#8362;</span>".$finalPrice;
  }
  else{
  $finalPrice = round($price,2);
   $finalPriceHtml = "<span class='money_symbol'>&#8362;</span>".$finalPrice;
  }
  return $finalPriceHtml; 
  
}

function getConvertedCurrency(){

    if($_SESSION['currency'] == 'USD'){
        return "$";

    }
    else if($_SESSION['currency'] == 'EURO'){
        return "&#8364;";
    }
    else if($_SESSION['currency'] == 'NIS'){
        return "&#8362;";
    }
    else{
        return "&#8362;";
    }
}

function get_lang_val($type_id,$type,$lang_id){		
	$objModule = new Module();
	if($lang_id=='web'){ $lang_id = $_SESSION['lang_id'];}
	if($type=='ctype'){
		$arrCat = $objModule->getAll("SELECT * FROM tbl_category WHERE ctype='".$type_id."' and lid='".$lang_id."'");
		if($arrCat[0]['cat_name']==''){
			$arrCat = $objModule->getAll("SELECT * FROM tbl_category WHERE ctype='".$type_id."' and lid='1'");
		}
		return $arrCat[0]['cat_name'];
	}
	else if($type=='stype'){
		$arrCat = $objModule->getAll("SELECT * FROM tbl_subcategory WHERE stype='".$type_id."' and lid='".$lang_id."'");
		if($arrCat[0]['sname']==''){
			$arrCat = $objModule->getAll("SELECT * FROM tbl_subcategory WHERE stype='".$type_id."' and lid='1'");
		}
		return $arrCat[0]['sname'];
	}
	else if($type=='sstype'){
		$arrCat = $objModule->getAll("SELECT * FROM tbl_sub_subcategory WHERE sstype='".$type_id."' and lid='".$lang_id."'");
		if($arrCat[0]['ssname']==''){
			$arrCat = $objModule->getAll("SELECT * FROM tbl_sub_subcategory WHERE sstype='".$type_id."' and lid='1'");
		}
		return $arrCat[0]['ssname'];
	}
	else if($type=='atype'){
		$arrCat = $objModule->getAll("SELECT * FROM tbl_attribute WHERE atype='".$type_id."' and lid='".$lang_id."'");
		if($arrCat[0]['attribute_name']==''){
			$arrCat = $objModule->getAll("SELECT * FROM tbl_attribute WHERE atype='".$type_id."' and lid='1'");
		}
		return $arrCat[0]['attribute_name'];
	}
	else if($type=='satype'){
		$arrCat = $objModule->getAll("SELECT * FROM tbl_attribute_detail WHERE satype='".$type_id."' and lid='".$lang_id."'");
		if($arrCat[0]['attr_name']==''){
			$arrCat = $objModule->getAll("SELECT * FROM tbl_attribute_detail WHERE satype='".$type_id."' and lid='1'");
		}
		return $arrCat[0]['attr_name'];
	}
	
}
function getConvertedPriceVal($price){ 
  
  if($_SESSION['currency'] == 'USD'){
   $finalPrice = round($price*get_live_rate(),2);
   if($finalPrice=='' or $finalPrice=='0'){
	 $finalPrice = round($price/get_live_rate_boe('XUDLBK65'),2);
   }
   $finalPriceHtml = $finalPrice;
   //$price = 
  }
  else if($_SESSION['currency'] == 'EURO'){
   $finalPrice = round($price*get_live_rate(),2);
   if($finalPrice=='' or $finalPrice=='0'){
	 $finalPrice = round($price/get_live_rate_boe('XUDLBK65'),2);
   }
   $finalPriceHtml = $finalPrice; 
   //$price = 
  }
  else if($_SESSION['currency'] == 'NIS'){
   //$finalPrice = round($price*get_live_rate('XUDLBK65'),2); 
   $finalPrice = round($price,2);
   $finalPriceHtml = $finalPrice;
  }
  else{
   $finalPrice = round($price,2);
   $finalPriceHtml = $finalPrice;
  }
  return $finalPriceHtml;
} 

function ProductConvertedPriceVal($price,$currency){ 
  
  if($currency == 'USD'){
   $finalPrice = round($price*get_live_rate(),2);
   if($finalPrice=='' or $finalPrice=='0'){
	 $finalPrice = round($price/get_live_rate_boe('XUDLBK65'),2);
   }
   $finalPriceHtml = $finalPrice;
   //$price = 
  }
  else if($currency == 'EURO'){
   $finalPrice = round($price*get_live_rate(),2);
   if($finalPrice=='' or $finalPrice=='0'){
	 $finalPrice = round($price/get_live_rate_boe('XUDLBK65'),2);
   }
   $finalPriceHtml = $finalPrice; 
   //$price = 
  }
  else if($currency == 'NIS'){
   //$finalPrice = round($price*get_live_rate('XUDLBK65'),2); 
   $finalPrice = round($price,2);
   $finalPriceHtml = $finalPrice;
  }
  else{
   $finalPrice = round($price,2);
   $finalPriceHtml = $finalPrice;
  }
  return $finalPriceHtml;
}

//getConvertedPriceVal_App(130,2);
function getConvertedPriceVal_App($price,$usercurrencyID){ 
$objModule = new Module();
$UserArr = $objModule->getAll("select * from tbl_currency where id='".$usercurrencyID."'");
$usercurrency = $UserArr[0]['curr_name']  ;

  if($usercurrency == 'USD'){
   $finalPrice = round($price*get_live_rate_App($usercurrency),2);
   if($finalPrice=='' or $finalPrice=='0'){
	 $finalPrice = round($price/get_live_rate_boe_App($usercurrency,'XUDLBK65'),2);
   }
   $finalPriceHtml = $finalPrice;

  }
  else if($usercurrency == 'EURO'){
   $finalPrice = round($price*get_live_rate_App($usercurrency),2);
   if($finalPrice=='' or $finalPrice=='0'){
	 $finalPrice = round($price/get_live_rate_boe_App($usercurrency,'XUDLBK65'),2);
   }
   $finalPriceHtml = $finalPrice; 
   
  }
  else if($usercurrency == 'NIS'){
   $finalPrice = round($price,2);
   $finalPriceHtml = $finalPrice;
  }
  else{
   $finalPrice = round($price,2);
   $finalPriceHtml = $finalPrice;
  }
  return $finalPriceHtml;
  
}
function get_live_rate_App($curr){
	
	if($curr=='NIS'){
		return 1;
	}
	else if($curr=='EURO'){
		$ses_currency='EUR';
	}
	else if($curr=='USD'){
		$ses_currency='USD';
	}
    $url = "http://www.google.com/finance/converter?a=1&from=ILS&to=".$ses_currency; 
 
    $request = curl_init(); 
    $timeOut = 0; 
    curl_setopt ($request, CURLOPT_URL, $url); 
    curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1); 
 
    curl_setopt ($request, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
    curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, $timeOut); 
    $response = curl_exec($request); 
    curl_close($request); 
	$results_page1 = scrape_between($response, "<span class=bld>",$ses_currency);
	if($_SESSION['currency']=='NIS'){
		return 1;
	}
	else{
		return round($results_page1,2);
	}
} 

function get_live_rate_boe_App($curr,$converter){
	if($curr=='NIS'){
		$converter='XUDLBK65';
	}
	else if($curr=='EURO'){
		$converter='EUR';
	}
	else if($curr=='USD'){
		$converter='USD';
	}
	$curl_handle=curl_init();
	curl_setopt($curl_handle, CURLOPT_URL,'https://www.quandl.com/api/v3/datasets/BOE/'.$converter.'/data.json?api_key=6HsMoDr5AWiZBR7Wy99g');
	curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Madame');
	$urls = curl_exec($curl_handle);
	curl_close($curl_handle);
	$json_data = json_decode($urls,true);
	return  $json_data['dataset_data']['data'][0][1];
}

function getStaticText($text_type,$type,$lang_id){ 
	$objModule = new Module();
	if($lang_id=='web'){ 
		$lang_id = $_SESSION['lang_id'];
		$type='1';
	}
	$static_text = $objModule->getAll("SELECT * FROM tbl_statictext WHERE lid='".$lang_id."' and type='".$type."' and text_type='".$text_type."'");
	if($static_text[0]['msg']==''){
		$static_text = $objModule->getAll("SELECT * FROM tbl_statictext WHERE lid='1' and type='".$type."' and text_type='".$text_type."'");
	}
	return $static_text[0]['msg'];
}
function generateRandomString($length = 6) {
    $possible1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $possible2 = "0123456789";
    $possible1Length = strlen($possible1);
    $possible2Length = strlen($possible2);
    $randomString = '';
    for ($i = 0; $i < 3; $i++) {
        $randomString .= $possible1[rand(0, $possible1Length - 1)];
    }
    for ($i = 0; $i < 3; $i++) {
        $randomString .= $possible2[rand(0, $possible2Length - 1)];
    }
    return $randomString;
}
function search_in_array($array, $key, $val) {
    foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return true;
    return false;
}
?>
