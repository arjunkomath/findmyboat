<?php

include 'config.php';

$emailFrom=$_POST['from'];
$to=$_POST['email'];
$title=$_POST['title'];
$id=$_POST['id'];
$date=$_POST['date'];
$time=$_POST['time'];

$find = mysql_query("SELECT * FROM `users` WHERE `email` = '".$emailFrom."'");
	
	while($row = mysql_fetch_array($find)) {
		
		$contactname=$row['fullname'];
		$number=$row['phone'];
		
	}

$message ='<center><img src="http://findmyboat.in/logo/fmb.png" width="500" height="125"  alt=""/><h2>Houseboat Reservation e-Ticket</h2></center>
<hr>
<h3>Reservation Details</h3>
<p>Date : '.$date.'</p>
<p>Reporting Time : '.$time.'</p>
<p>Houseboat : '.$title.'</p>
<hr>
<h3>Contact Us</h3>
<p>Name : '.$contactname.'</p>
<p>Phone : '.$number.'</p>
<p>&nbsp;</p>
<p>Thank you.</p>
<p>Have a pleasant journey!</p>';
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
$mail->FromName = 'Host';

// below we want to set the email address we will be sending our email to.
$mail->AddAddress($to);
$mail->AddCC($emailFrom, 'Host');

// set word wrap to 50 characters
$mail->WordWrap = 500;
// set email format to HTML
$mail->IsHTML(true);

$mail->Subject = "Houseboat Reservation e-Ticket";

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

//echo "Message has been sent";

header("Location:viewListings.php?display=send");

?>