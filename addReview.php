<?php

include"config.php";

$id=$_POST['listingID'];
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$message = mysql_real_escape_string($_POST['comment']);
$rating = $_POST['rating'];
$date = date('Y-m-d');

if($fullname==NULL) {
	header("Location:view.php?id=".$id."&display=reviewerror");
	exit;
}
if($email==NULL) {
	header("Location:view.php?id=".$id."&display=reviewerror");
	exit;
}
if($message==NULL) {
	header("Location:view.php?id=".$id."&display=reviewerror");
	exit;
}
if($rating==NULL) {
	header("Location:view.php?id=".$id."&display=reviewerror");
	exit;
}

$insert = 'INSERT into reviews(fullname,email,listingID,message,rating,createdAt) VALUES("'.$fullname.'","'.$email.'","'.$id.'","'.$message.'","'.$rating.'","'.$date.'")';

if (!mysql_query($insert))
  {
  die('Error: ' . mysql_error());
  }
else {
header("Location:view.php?id=".$id."&display=review");
}

?>