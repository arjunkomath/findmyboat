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

include"config.php";

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

$password = gen_random_string(10);
$token = gen_random_string(25);
$pass =md5($password);
$title=mysql_real_escape_string($_POST['title']);
$type=$_POST['type'];
$location=$_POST['location'];
$price = $_POST['price'];
$price2 = $_POST['price2'];
$desc = mysql_real_escape_string($_POST['desc']);
$name=$_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$today = date('Y-m-d');

session_start();

if(isset($_SESSION['uid'])) {
	$email=$_SESSION['uid'];
}

$query = mysql_query("SELECT id FROM `users` WHERE `email` = '".$email."'");

if(!mysql_num_rows($query)) {
	$insert = 'INSERT into users(fullname,email,password,phone,token) VALUES("'.$name.'","'.$email.'","'.$pass.'","'.$phone.'","'.$token.'")';
	mysql_query($insert);
	
$message = "Your can view and edit user listing by visiting our website. Your login details are as follows : <br/>";
$message.= "<br/>email : ".$email;
$message.= "<br/>Password : ".$password;
$message.= "<br/><br/>Happy Hosting! :) <br/>findmyboat Team.";
$message.= '<br/><br/><hr><center><small>To Unsubscribe from all future mails, <a href="http://findmyboat.in/unsubscribe.php?email='.$email.'">Click Here!</a></small></center>';

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
$mail->AddAddress($email, $name);

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

$mail->addCustomHeader("Message-ID: fmb");
$mail->addCustomHeader("Precedence: bulk");

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}	
}

$find = mysql_query("SELECT id,token FROM `users` WHERE `email` = '".$email."'");

while($info=mysql_fetch_array($find)) {
	$today = date('Y-m-d');
$insert = 'INSERT into listing(`title`,`type`,`location`,`price`,`price2`,`des`,`userid`,`status`,`token`,`createdAt`) VALUES("'.$title.'","'.$type.'","'.$location.'","'.$price.'","'.$price2.'","'.$desc.'","'.$info['id'].'","1","'.$info['token'].'","'.$today.'")';

if (!mysql_query($insert))
  {
  die('Error: ' . mysql_error());
  }
else {
 $id=mysql_insert_id();
 session_start();
 $_SESSION['uid']=$email;
 
$subject = 'New Listing!';
$headers = 'From: no-reply@findmyboat.in'. "\r\n" .
    'Reply-To: no-reply@findmyboat.in' . "\r\n" .
    'X-Mailer: PHP/' . phpversion(); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = 'Please check the listing : <a href="http://findmyboat.in/ad-view.php?id=' .$id.'">View</a>';
			
if(mail('arjun@techulus.com', $subject, $message, $headers))
 header("Location:upload/index.php?id=$id");
}
}

}
else
{
header("Location:list.php?display=cap");
}

}
else
{
header("Location:list.php?display=cap");
}

}
?>