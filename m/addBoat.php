<?php

include"config.php";

$key = $_POST['key'];

if($key=="aabbcd") {

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

$query = mysql_query("SELECT id FROM `users` WHERE `email` = '".$email."'");

if(!mysql_num_rows($query)) {
	$insert = 'INSERT into users(fullname,email,password,phone,token) VALUES("'.$name.'","'.$email.'","'.$pass.'","'.$phone.'","'.$token.'")';
	mysql_query($insert);
}

$find = mysql_query("SELECT id,token FROM `users` WHERE `email` = '".$email."'");

while($info=mysql_fetch_array($find)) {
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

$response["success"]=1;
$response["id"]=$id;
echo json_encode($response);
} else {
	$response["success"]=0;
	$response["message"]='Invalid '.$key;
	echo json_encode($response);
}
?>