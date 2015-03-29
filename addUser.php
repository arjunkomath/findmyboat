<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$recaptcha=$_POST['g-recaptcha-response'];
if(!empty($recaptcha))
{
include("getCurlData.php");
$google_url="https://www.google.com/recaptcha/api/siteverify";
$secret='6LfIGP8SAAAAALSR_lhe-7rCDBdzd9C4NKT2NG1h';
$ip=$_SERVER['REMOTE_ADDR'];
$url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
$res=getCurlData($url);
$res= json_decode($res, true);
//reCaptcha success check
if($res['success'])
{

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

include"config.php";

$token = gen_random_string(25);
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$number = $_POST['number'];
$password = md5($_POST['password']);

$insert = 'INSERT into users(email,fullname,phone,password,token) VALUES("'.$email.'","'.$fullname.'","'.$number.'","'.$password.'","'.$token.'")';

if (!mysql_query($insert))
  {
  die('Error: ' . mysql_error());
  }
else {

$message = "Your can view and edit user listing by visiting our website. Your login details are as follows : <br/>";
$message.= "<br/>email : ".$email;
$message.= "<br/>Password : You provided during signup.";
$message.= "<br/><br/>Happy Hosting! :) <br/>findmyboat Team.";
$message.= '<br/><br/><hr><center>To Unsubscribe from all future mails, <a href="unsubscribe.php?id=$email">Click here</a></center>';

$subject = "Welcome to findmyboat!";

require("phpmail/PHPMailerAutoload.php");

$mail = new PHPMailer();

$mail->IsSMTP();

$mail->Host = "localhost";  // specify main and backup server

$mail->SMTPAuth = true;     // turn on SMTP authentication

$mail->Username = "mail@techulus.com";  // SMTP username
$mail->Password = "Mail123"; // SMTP password

// $email is the user's email address the specified
// on our contact us page. We set this variable at
// the top of this page with:
// $email = $_REQUEST['email'] ;
$mail->From = 'support@findmyboat.freshdesk.com';
$mail->FromName = 'FindmyBoat Support';

// below we want to set the email address we will be sending our email to.
$mail->AddAddress($email, $fullname);

// set word wrap to 50 characters
$mail->WordWrap = 500;
// set email format to HTML
$mail->IsHTML(true);

$mail->Subject = "Welcome to FindmyBoat!";

// $message is the user's message they typed in
// on our contact us page. We set this variable at
// the top of this page with:
// $message = $_REQUEST['message'] ;
$mail->Body    = $message;
$mail->AltBody = $message;

if(!$mail->Send())
{
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

header("Location:find.php?display=newaccount");
}


}
else
{
header("Location:register.php?display=cap");
}

}
else
{
header("Location:register.php?display=cap");
}

}

?>
