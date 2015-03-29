<?php

$response = array();
 
require_once '../config.php';
echo '[';

if($_POST['key']=='F122EFE3574FADECCA15E6797B7CB') {

$id=$_POST['id'];

$query = mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."'") or die();
if(!mysql_num_rows($query)){
	$response["success"] = 0;
    $response["name"] = 'Invalid ID!';
    echo json_encode($response);
}else {
while($info=mysql_fetch_array($query)) {
	$name=$info['fullname'];
	$token=$info['token'];
	$response["success"] = 1;
	$response["name"]=$name;
	$response["token"]=$token;
    echo json_encode($response);
} }
} else {
	$response["success"] = 0;
	$response["message"]="Invalid Key!";
    echo json_encode($response);
}
echo ']';
?>