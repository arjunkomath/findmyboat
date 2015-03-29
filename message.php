<?php

$emailFrom=$_POST['email'];
$to=$_POST['to'];
$message=$_POST['message'];
$title=$_POST['title'];
$id=$_POST['id'];
$fullname='Host';

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

$message.="<br/><br/>Listing : ".$title;
$message.= '<br/><br/><hr><center><small>To Unsubscribe from all future mails, <a href="http://findmyboat.in/unsubscribe.php?email='.$to.'">Click Here!</a></small></center>';

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
$mail->From = $emailFrom;
$mail->FromName = 'Traveller';

// below we want to set the email address we will be sending our email to.
$mail->AddAddress($to, $fullname);

// set word wrap to 50 characters
$mail->WordWrap = 500;
// set email format to HTML
$mail->IsHTML(true);

$mail->Subject = "You have an Enquiry!";

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
   //echo "Message could not be sent. <p>";
   //echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

//echo "Message has been sent";

header("Location:view.php?id=".$id."&display=send");

//echo "Message has been sent";

}
else
{
header("Location:view.php?id=".$id."&display=cap");
}

}
else
{
header("Location:view.php?id=".$id."&display=cap");
}

}
?>