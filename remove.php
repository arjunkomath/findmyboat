<?php
session_start();

if(!isset($_SESSION['uid']))
header("Location:find.php");

$id = $_GET['id'];

include "config.php";

$query = mysql_query("SELECT token FROM `users` WHERE `email` = '".$_SESSION['uid']."'"); 
  while($info=mysql_fetch_array($query)) {
	$user_key=$info['token'];  
  }
  
$query = mysql_query("SELECT token FROM `listing` WHERE `id` = '".$id."'"); 
  while($info=mysql_fetch_array($query)) {
	$listing_key=$info['token'];  
  }
  
  if($user_key!=$listing_key){
	  echo 'auth fail';
	  exit;
  }

$query = mysql_query("SELECT * FROM `listing` WHERE id=".$id.""); 
  while($info=mysql_fetch_array($query)) {
	 if($info['photo1']) {
	$file="upload/uploads/".$info['photo1'];
	unlink($file);
	$file="upload/uploads/thumb_".$info['photo1'];
	unlink($file);
	 }
	 if($info['photo2']) {
	$file="upload/uploads/".$info['photo2'];
	unlink($file);
	 }
	 if($info['photo3']) {
	$file="upload/uploads/".$info['photo3'];
	unlink($file);
	 }
  }

$del = 'DELETE FROM `listing` WHERE id='.$id.'';

if (!mysql_query($del))
  {
  die('Error: ' . mysql_error());
  }
else {
		header("Location:viewListings.php?display=remove");	
}

?>