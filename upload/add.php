<?php

if($_POST['key']=='F122EFE3574FADECCA15E6797B7CB') {

$response = array();
 
require_once '../config.php';

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

echo '[';

if($_POST['addtype']=='user') {

$password = gen_random_string(10);
$token = gen_random_string(25);
$name=$_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

if(empty($name)) {
	$response["success"] = 0;
    $response["message"] = 'Missing Name!';
    echo json_encode($response);
	echo ']';
	die();
}

if(empty($email)) {
	$response["success"] = 0;
    $response["message"] = 'Missing E-mail!';
    echo json_encode($response);
	echo ']';
	die();
}

if(empty($phone)) {
	$response["success"] = 0;
    $response["message"] = 'Missing Phone!';
    echo json_encode($response);
	echo ']';
	die();
}

$query = mysql_query("SELECT email FROM `users` WHERE `email` = '".$email."'");
if(!mysql_num_rows($query)) {
	$insert = 'INSERT into users(fullname,email,password,phone,token) VALUES("'.$name.'","'.$email.'","'.md5($password).'","'.$phone.'","'.$token.'")';
	mysql_query($insert);
	$id=mysql_insert_id();
	$response["success"] = 1;
	$response["id"]=$id;
   $response["message"] = 'New User Created.';
    echo json_encode($response);
} else {
	$response["success"] = 0;
    $response["message"] = 'e-mail id already exsist!';
    echo json_encode($response);
}
} 

else if($_POST['addtype']=='boat') {
	
	$userid=$_POST['userid'];
	$token=$_POST['token'];
	$today = date('Y-m-d');
	$title=mysql_real_escape_string($_POST['title']);
	$type=$_POST['type'];
	$location=$_POST['location'];
	$price = $_POST['price'];
	$price2 = $_POST['price2'];
	$desc = mysql_real_escape_string($_POST['desc']);
	
	$insert = 'INSERT into listing(`title`,`type`,`location`,`price`,`price2`,`des`,`userid`,`status`,`token`,`createdAt`) VALUES("'.$title.'","'.$type.'","'.$location.'","'.$price.'","'.$price2.'","'.$desc.'","'.$userid.'","1","'.$token.'","'.$today.'")';
	mysql_query($insert);
	$id=mysql_insert_id();
	$response["success"] = 1;
    $response["id"] = $id;
	$response["message"] = 'Boat Added.';
    echo json_encode($response);
} 

else {
	$response["success"] = 1;
           $response["message"] = 'Fail!';
           echo json_encode($response);
}


echo ']';
 		
} else {
	$response["success"] = 0;
	$response["message"]="Invalid Key!";
    echo json_encode($response);
}

?>