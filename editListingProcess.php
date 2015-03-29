<?php

include"config.php";

session_start();

$query = mysql_query("SELECT token FROM `users` WHERE `email` = '".$_SESSION['uid']."'"); 
  while($info=mysql_fetch_array($query)) {
	$user_key=$info['token'];  
  }
  
$query = mysql_query("SELECT token FROM `listing` WHERE `id` = '".$_POST['id']."'"); 
  while($info=mysql_fetch_array($query)) {
	$listing_key=$info['token'];  
  }
  
  if($user_key!=$listing_key){
	  echo 'auth fail';
	  exit;
  }

$title=mysql_real_escape_string($_POST['title']);
$type=$_POST['type'];
$location=$_POST['location'];
$price = $_POST['price'];
$price2 = $_POST['price2'];
$desc = mysql_real_escape_string($_POST['desc']);
$id=$_POST['id'];
$now=date("Y-m-d H:i:s");

$insert = 'UPDATE `listing` SET `updatedAt`="'.$now.'",`title`="'.$title.'",`type`="'.$type.'",`location`="'.$location.'",`price`="'.$price.'",`price2`="'.$price2.'",`des`="'.$desc.'" WHERE `id`="'.$id.'"';

if (!mysql_query($insert))
  {
  die('Error: ' . mysql_error());
  }
else {
 header("Location:upload/index.php?id=$id");
}

?>