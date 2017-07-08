<?php
	session_start();
	include("connection.php");
	error_reporting(0);
?>	
 
<?php
	$message='<a href="http://localhost/gkks/reset.php?mail="'.$_GET['toemail'].'">Click Here</a>To reset you password';
	$to=$_GET['toemail'];
	$subject="Reset Password";
	$headers = 'From: info@kadiyasamaj.org' . "\r\n" .
    'Reply-To: info@kadiyasamaj.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	ini_set('display_errors', '1');
	mail($to, $subject, $message, $headers); 
	
?>
<fieldset>
	<legend align="left">Reset Password</legend>
    <a href="reset.php?mail=<?php echo $_GET['toemail'];?>">Click Here</a>To reset you password
	A mail has been sent to your email id. Please check the mail to reset your password.
</fieldset>