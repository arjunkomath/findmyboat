<?php
session_start();
if(!isset($_SESSION['uid']))
header("Location:index.php");

include"config.php";

$userid = $_SESSION['uid'];
$fullname =$_POST['fullname'];
$number =$_POST['number'];

$insert = "UPDATE `users` SET `fullname` = '".$fullname."',`phone` = '".$number."' WHERE `email`='".$_SESSION['uid']."'";

if (!mysql_query($insert))
  {
  die('Error: ' . mysql_error());
  }

header("Location:editProfile.php?display=update");

?>