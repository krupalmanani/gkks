<?php
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
class PCGDb extends PDO{
    
    private $strDriver          =   'mysql';
    private $strHost            =   'localhost';
    private $strDB              =   'gkks_2017';
    private $strUser            =   'root';
    private $strPass            =   '';
    public $strWhere            =   '';
    public $strAction           =   '';
    public $strSQL              =   '';
    public $strGroupBy          =   '';
    public $strOrderBy          =   '';
    public $strLimit            =   '';
    public  $intLastInsertedId  =   '';
    public $intTotalRows        =   '';
    protected $strTableName     =   '';
    protected $arrFields        =   array();
    protected $objDB            =   null;
    protected $objUsDB          =   null;
    protected $arrFieldValues   =   array();
    var $SITEURL				=	"http://localhost/Gkks_2017/";
    var $ADMIN					=	"http://localhost/Gkks_2017/admin/";	
	public $INFO_MAIL  			=  	"er.peterparker@gmail.com";		
    function __construct($strHost='', $strDB='', $strUser='', $strPass='')
    {
        try{
            
            if($strHost != ''){$this->strHost = $strHost;}
            if($strDB != ''){$this->strDB = $strDB;}
            if($strUser != ''){$this->strUser = $strUser;}
            if($strPass != ''){$this->strPass = $strPass;}
            
  $this->objDB = new PDO("mysql:host=".$this->strHost.";port=3306;dbname=".$this->strDB,$this->strUser, $this->strPass, array( PDO::ATTR_PERSISTENT => true,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            if($this->objDB)
            {
                return $this->objDB;
            }
            else
            {
                echo "Database Connection Failed.";die;
            }
        }
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
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
    function getAll($strSQL, $arrFields=array(), $strWhere='', $strGroupBy='', $strOrderBy='', $intStart='', $intNum='')
    {

        try
        {
            $this->strAction    =   'SELECT';
            if(is_array($arrFields) && !empty($arrFields))
            {
                $this->strTableName = $strSQL;
                $this->arrFields    =   $arrFields;
                $this->setWhere($strWhere);
                $this->setGroupBy($strGroupBy);
                $this->setOrderBy($strOrderBy);
                $this->setLimit((string)$intStart, (string)$intNum);

                $this->generateSQL();
            }
            else
            {
                if(preg_match("/^insert/",$strSQL))
                {
                    $this->strAction    =   'INSERT';
                }
                if(preg_match("/^update/",$strSQL))
                {
                    $this->strAction    =   'UPDATE';
                }
                if(preg_match("/^delete/",$strSQL))
                {
                    $this->strAction    =   'DELETE';
                }
                $this->strSQL       =   $strSQL;
            }
            return $this->executeQuery();
}
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
        }
    }
    function executeQuery()
    {
        try{
            if($this->strSQL != '')
            {
                
                $objStmt = $this->objDB->prepare($this->strSQL);
                switch(strtoupper($this->strAction))
                {
                    case 'SELECT':
                        $objStmt->execute();
                        $arrReturn  = $objStmt->fetchAll(PDO::FETCH_ASSOC);
                        $objStmt = $this->objDB->prepare("SELECT FOUND_ROWS() as totalcount");
                        $objStmt->execute();
                        $arrTemp = $objStmt->fetch();
                        $this->intTotalRows = $arrTemp['totalcount'];

                        unset($arrTemp);unset($objStmt);
                        return $arrReturn;
                        break;
                    case 'INSERT':
                        $objStmt->execute();
                            return $this->objDB->lastInsertId();
                        break;
                    case 'MULTIINSERT':
                        $objStmt->execute();
                        return $this->objDB->lastInsertId();
                        break;
                    case 'UPDATE':
                        $objStmt->execute();
                            return $this->objDB->lastInsertId();
                        break;
                    case 'DELETE':
                        $objStmt->execute();
                            return $this->objDB->lastInsertId();
                        break;
                    default:
                }
            }
        }
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
        }
    }
    function setWhere($strWhere = '')
    {
        try{
            if($strWhere != '')
            {
                $this->strWhere =   ' WHERE '.$strWhere;
            }
            else
            {
                $this->strWhere = '';
            }
        }
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
        }
    }
    function setGroupBy($strGroupBy = '')
    {
        try{
            if($strGroupBy != '')
            {
                $this->strGroupBy =  ' GROUP BY '. $strGroupBy;
            }
            else
            {
                $this->strGroupBy = '';
            }
        }
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
        }
    }
    function setOrderBy($strOrderBy = '')
    {
        try{
            if($strOrderBy != '')
            {
                $this->strOrderBy =  ' ORDER BY '. $strOrderBy;
            }
            else
            {
                $this->strOrderBy   =   '';
            }
        }
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
        }
    }
    function setLimit($intStart='', $intNum='')
    {
        try{
            if($intStart != '' && $intNum != '')
            {
                $this->strLimit =   ' LIMIT '.$intStart.', '.$intNum;
            }
            else
            {
                $this->strLimit = '';
            }
        }
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
        }
    }
    function getSQL()
    {
        try{
            return $this->strSQL;
        }
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
        }
    }
    function generateSQL()
    {
        
        try{
            $strSQL     =   '';
            switch (strtoupper($this->strAction))
            {
                case 'SELECT':
                        $strSQL = 'SELECT SQL_CALC_FOUND_ROWS '.@implode(", ", $this->arrFields);
                        if(trim($this->strTableName) != ''):
                            $strSQL .= ' FROM '.$this->strTableName;
                        endif;
                        $strSQL .=  $this->strWhere;
                        $strSQL .=  $this->strGroupBy;
                        $strSQL .=  $this->strOrderBy;
                        $strSQL .=  $this->strLimit;
                        $this->strSQL =   $strSQL;

                    break;
                case 'UPDATE':
                        $strSQL = 'UPDATE '.$this->strTableName;
                        $arrTemp    =   array();
                        foreach($this->arrFields as $intKey=>$strValue)
                        {
                            $arrTemp[] =  $strValue.' = "'.  addslashes($this->arrFieldValues[$intKey]).'"';
                        }
                        $strSQL .=  ' SET '.@implode(", ", $arrTemp);
                        unset($arrTemp);
                        $strSQL .=  $this->strWhere;
                        $this->strSQL   =   $strSQL;
                        break;
                case 'INSERT':
                    $strSQL =   'INSERT INTO '.$this->strTableName;
                    $arrTemp    =   array();
                    foreach($this->arrFields as $intKey=>$strValue)
                    {
                        $arrTemp['field'][] =   $strValue;
                        $arrTemp['value'][] =   addslashes($this->arrFieldValues[$intKey]);
                    }
                    $strSQL .=   ' ( '.@implode(", ", $arrTemp['field']).' ) VALUES ( "'.@implode('", "', $arrTemp['value']).'" )';
                    $this->strSQL   =   $strSQL;

                    break;
                case 'PREPAREMULTIINSERT':
                    $arrTemp=array();
                    foreach($this->arrFields as $intKey=>$strValue)
                    {
                        $arrTemp['value'][] = addslashes($this->arrFieldValues[$intKey]);
                    }
                    $strSQL=   '("'.@implode('","',$arrTemp['value']).'"),';
                    $this->MultistrSQL.= $strSQL;
                    break;
                case 'MULTIINSERT':
                    $strSQL =   'INSERT INTO '.$this->strTableName;
                    $arrTemp    =   array();
                    foreach($this->arrFields as $intKey=>$strValue)
                    {
                        $arrTemp['field'][] =   $strValue;
                    }
                    $strSQL.=' ( '.@implode(", ", $arrTemp['field']).' ) VALUES '.rtrim($this->MultistrSQL,",");
                    $this->strSQL   =   $strSQL;
                    break;
				case 'DELETE':
                    $strSQL =   'DELETE FROM '.$this->strTableName;
                    $strSQL .=  $this->strWhere;
                    $this->strSQL   =   $strSQL;

                    break;
                default;
            }
        }
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
        }
    }
    function register_user($arrData = array())
    {
        
        $sql= 'CALL REGISTER_USER(?,?,?,?,?,?,?,?,?,?,?,?,?,?)' ;	//	Put Placeholders for parameters.
        $statement = $this->objDB->prepare($sql) ;			//	Sanitize the statement.
        $statement->execute($arrData) ;						//	Execute Call with array of parameters.

        if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
              return $row;  
            }
        }
        else
        {
            return  0;   
        }

    }
    function unset_noti($arrData = array())
    {
        $sql= 'CALL unset_noti(?)';		//	Put Placeholders for parameters.
        $statement = $this->objDB->prepare($sql) ; //	Sanitize the statement.
        $statement->execute($arrData) ;																//	Execute Call with array of parameters.
        //echo "<pre>";print_r($statement->rowCount());die;
        if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
                return $row;  
            }
        }
        else
        {
           return  0;   
        }

    }
    function status_counter($arrData = array())
    {
        $sql= 'CALL counter(?,?)';
        $statement = $this->objDB->prepare($sql) ;
        $statement->execute($arrData) ;															       if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
                return $row;
            }
        }
        else
        {
            return  0;
        }

    }
    function statusonlike($arrData = array())
    {
       
        $sql= 'CALL StatusUnlike(?,?)' ;										//	Put Placeholders for parameters.
        $statement = $this->objDB->prepare($sql) ;								//	Sanitize the statement.
        $statement->execute($arrData) ;																//	Execute Call with array of parameters.

        if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
              return $row;  
            }
        }
        else
        {
            return  0;   
        }

    }
	 function follwuser($arrData = array())
    {
       
        $sql= 'CALL follow(?,?,?)' ;										//	Put Placeholders for parameters.
        $statement = $this->objDB->prepare($sql) ;								//	Sanitize the statement.
        $statement->execute($arrData) ;																//	Execute Call with array of parameters.

        if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
              return $row;  
            }
        }
        else
        {
            return  0;   
        }

    }
    function top100chart($arrData = array())
    {

        $sql= 'CALL top100(?,?,?)';										//	Put Placeholders for parameters.
        $statement = $this->objDB->prepare($sql) ;								//	Sanitize the statement.
        $statement->execute($arrData) ;																//	Execute Call with array of parameters.

        if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
                return $row;
            }
        }
        else
        {
            return  0;
        }

    }
    function Musciunlike($arrData = array())
    {
        $sql= 'CALL Musciunlike1(?,?)' ;										//	Put Placeholders for parameters.
        $statement = $this->objDB->prepare($sql) ;								//	Sanitize the statement.
        $statement->execute($arrData) ;															       if($statement->rowCount() == 1)
        {
            
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
                return $row;  
            }
        }
        else
        {
           return  0;   
        }

    }
    function logout($arrData = array())
    {
        $sql= 'CALL logoutpc(?)' ;										//	Put Placeholders for parameters.
        $statement = $this->objDB->prepare($sql) ;								//	Sanitize the statement.
        $statement->execute($arrData) ;																//	Execute Call with array of parameters.
        //echo "<pre>";print_r($statement->rowCount());die;
        if($statement->rowCount() == 1)
        {
            
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
                return $row;  
            }
        }
        else
        {
           return  0;   
        }

    }
    function blk_user($arrData = array())
    {
        $sql= 'CALL blk_usr(?,?)' ;										//	Put Placeholders for parameters.
        $statement = $this->objDB->prepare($sql) ;								//	Sanitize the statement.
        $statement->execute($arrData) ;																//	Execute Call with array of parameters.
        //echo "<pre>";print_r($statement->rowCount());die;
        if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
                return $row;  
            }
        }
        else
        {
           return  0;   
        }

    }
    function unblk_user($arrData = array())
    {
        $sql= 'CALL unblk_usr(?,?)' ;										//	Put Placeholders for parameters.
        $statement = $this->objDB->prepare($sql) ;								//	Sanitize the statement.
        $statement->execute($arrData) ;																//	Execute Call with array of parameters.
        //echo "<pre>";print_r($statement->rowCount());die;
        if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
                return $row;  
            }
        }
        else
        {
           return  0;   
        }

    }
    function last_hour_like($arrData = array())
    {
        $sql= 'CALL last_hour_like_count(?,?)' ;			//	Put Placeholders for parameters.
        $statement = $this->objDB->prepare($sql) ;	//	Sanitize the statement.
        $statement->execute($arrData) ;																//	Execute Call with array of parameters.
        //echo "<pre>";print_r($statement->rowCount());die;
        if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
                return $row;
            }
        }
        else
        {
            return  0;
        }

    }
    function msearch_couter($arrData = array())
    {
        $sql= 'CALL msearch_couter(?)' ;
        $statement = $this->objDB->prepare($sql) ;
        $statement->execute($arrData) ;															       if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
                return $row;
            }
        }
        else
        {
            return  0;
        }

    }
function Notificationsettings($arrData = array())
{
        $sql= 'CALL notification_settings(?,?,?,?,?)';										//	Put Placeholders for parameters.
        $statement = $this->objDB->prepare($sql);								//	Sanitize the statement.
        $statement->execute($arrData);														//	Execute Call with array of parameters.
        if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
                return $row;  
            }
        }
        else
        {
           return  0;
        }
    }
    function decrease_badge($arrData = array())
    {
        $sql= 'CALL badge_descrease(?)';										//	Put Placeholders for parameters.
        $statement = $this->objDB->prepare($sql);								//	Sanitize the statement.
        $statement->execute($arrData);														//	Execute Call with array of parameters.
        if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
                return $row;
            }
        }
        else
        {
            return  0;
        }
    }
    function counter_increase($arrData = array())
    {
        $sql= 'CALL counter_increase(?)';										
        $statement = $this->objDB->prepare($sql);
        $statement->execute($arrData);			
        
        if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
                return $row;
            }
        }
        else
        {
            return  0;
        }
    }
    function profile_counter($arrData = array())
    {
        $sql= 'CALL profile_counter(?)';
        $statement = $this->objDB->prepare($sql);
        $statement->execute($arrData);
        if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
                return $row;
            }
        }
        else
        {
            return  0;
        }
    }
    function profile_like_comment_counter($arrData = array())
    {
        $sql= 'CALL profile_like_comment_counter(?,?)';
        $statement = $this->objDB->prepare($sql);
        $statement->execute($arrData);
        if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
                return $row;
            }
        }
        else
        {
            return  0;
        }
    }
    function list_music_counter($arrData = array())
    {
        $sql= 'CALL list_music_counter(?)';
        $statement = $this->objDB->prepare($sql);
        $statement->execute($arrData);
        if($statement->rowCount() == 1)
        {
            $statement->setFetchMode(PDO::FETCH_OBJ) ;
            while( $row = $statement->fetch() )
            {
                return $row;
            }
        }
        else
        {
            return  0;
        }
    }
}
class PCGData extends PCGDb{
    
    
    private $strPrimaryKey   =   '';
    
    function __construct()
    {
        //call parent class constuctor...
        parent::__construct();
    }
    
    function setTableDetails($strTableName, $strPrimaryKey)
    {
        try{
            if($strTableName != '')
            {
                $this->strTableName =   $strTableName;
            }
            else
            {
                echo "Table Name not selected.";exit;
            }
            
            if($strPrimaryKey != '')
            {
                $this->strPrimaryKey    =   $strPrimaryKey;
                $this->arrFields        =   array();
                $this->arrFieldValues   =   array();
            }
            else
            {
                echo "Primary Key not defined.";exit;
            }
        }
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
        }
    }
    
    function setFieldValues($strFieldName, $strFieldValue='')
    {
        try{
            if($strFieldName != '')
            {
                $this->arrFields[]      =   $strFieldName;
                $this->arrFieldValues[] =   $strFieldValue;
            }
        }
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
        }
    }
    
    function update()
    {
        try{
            $this->strAction    =   'UPDATE';
            $this->generateSQL();
            $this->intLastInsertedId = $this->executeQuery();
        }
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
        }
    }
    function insert()
    {
        try{
            $this->strAction='INSERT';
            $this->generateSQL();
            $this->intLastInsertedId = $this->executeQuery();
        }
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
        }
    }
    function preparemultiinsert()
    {
        try{
            $this->strAction='PREPAREMULTIINSERT';
            $this->generateSQL();
        }
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
        }
    }
    function multiinsert()
    {
        try{
            $this->strAction='MULTIINSERT';
            $this->generateSQL();
            $this->intLastInsertedId = $this->executeQuery();
        }
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
        }
    }
    function delete()
    {
        try{
            $this->strAction    =   'DELETE';
            $this->generateSQL();
            $this->intDeletedId = $this->executeQuery();
        }
        catch(Exception $objException)
        {
            echo $objException->getMessage();exit;
        }
    }
    function redirect ($strPath)
    {
         if(!headers_sent()):
            header("location: ".$strPath);
         exit();
        else:
            echo "<script type='text/javascript'>window.location.href='".$strPath."'</script>";
        exit();
        endif;
        exit();
    }
    function setMessage($strMsg, $strType="sucess")
    { 
        if(trim($strMsg) != '')
        {
            $_SESSION[session_id().'_admin']["system_message"] = $strMsg;
            $_SESSION[session_id().'_admin']["system_message_type"] = $strType;
        }
    }
    function getMessage()
    {
        
        if(isset($_SESSION[session_id().'_admin']["system_message"]) && $_SESSION[session_id().'_admin']["system_message"]!=''):
            
            $strHtml = "<div class='alert alert-".$_SESSION[session_id().'_admin']['system_message_type']."'>";
            $strHtml .="<button data-dismiss='alert' type='button' class='close'></button>";
            $strHtml .=$_SESSION[session_id().'_admin']['system_message'];
            $strHtml .='<span></span>';
            $strHtml .="</div>";
            unset($_SESSION[session_id().'_admin']['system_message']);
            unset($_SESSION[session_id().'_admin']['system_message_type']);
            return $strHtml;
        endif;
        return '';
    }
}
$objData =  new PCGData();
?>