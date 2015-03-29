<?php

if (($_POST['fullname'])&&($_POST['email'])) {
$name=$_POST['fullname'];
$email=$_POST['email'];

$message='From : '.$name.' ( '.$email.' )<br/><br/>Message :<br/>';
$message.=$_POST['message'];

$subject = "IMPORTANT ! You have a new MESSAGE findmyboat!";
$headers = 'From: no-reply@findmyboat.in' . "\r\n" .
    'Reply-To:' .$email. "\r\n" .
    'X-Mailer: PHP/' . phpversion(); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail('arjun@techulus.com', $subject, $message, $headers);

header("Location:contact.php?display=send");

} else {
header("Location:contact.php");
}
?>