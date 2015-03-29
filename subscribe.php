<?php

include"config.php";

$uid = $_GET['email'];

$insert = "UPDATE `users` SET `dnd` = '0' WHERE `email`='".$uid."'";

if (!mysql_query($insert))
  {
  die('Error: ' . mysql_error());
  }
  else {
	  
	  echo 'You have subscribed to all e-mail alerts! Thank you.';
  }

?>