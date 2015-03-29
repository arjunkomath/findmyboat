<?php

include 'config.php';
$flag=0;
function gen_random_string($length=8)
{
	$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";//length:36
	$final_rand="";
	for($i=0;$i<$length; $i++)
	{
		$final_rand .= $chars[ rand(0,strlen($chars)-1)];

	}
	return $final_rand;
}

$email = $_GET['email'];
$pass = gen_random_string(8);
$password = md5($pass);

$insert = "UPDATE `users` SET `password`='".$password."' WHERE `email`='".$email."'";
mysql_query($insert);

$message = '<html><body>';

$data_u = mysql_query("SELECT fullname,email FROM `users` WHERE `email`='".$email."'") or die(mysql_error()); 
while($info = mysql_fetch_array( $data_u )) 
 { 
 $flag=1;
$rows=0;
$message.='Hi '.$info['fullname'].'<br/><br/>'; 
$message.='You new password is <b>'.$pass.'</b> ';
$message.='<br/><br/>Thank you.<br/><br/>Techulus Team';
$message .= '</html></body>';

$to = $info['email'];
$subject = "Reset Password";
$headers = 'From: no-reply@techulus.com' . "\r\n" .
    'Reply-To: no-reply@techulus.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion(); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($to, $subject, $message, $headers);
header('Location:find.php?display=forgotSuccess');
}
if($flag==0) {header('Location:find.php?display=forgotFail');}
?>