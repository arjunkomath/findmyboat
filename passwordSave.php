<?php
session_start();
if(!isset($_SESSION['uid']))
header("Location:find.php");

include"config.php";

$password =md5($_POST['password']);

$insert = "UPDATE `users` SET `password` = '".$password."' WHERE `email`='".$_SESSION['uid']."'";

if (!mysql_query($insert))
  {
  die('Error: ' . mysql_error());
  }
header("Location:passwordChange.php?display=success");

?>