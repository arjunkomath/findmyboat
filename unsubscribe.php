<?php

include"config.php";

$uid = $_GET['email'];

$insert = "UPDATE `users` SET `dnd` = '1' WHERE `email`='".$uid."'";

if (!mysql_query($insert))
  {
  die('Error: ' . mysql_error());
  }
  else {
	  
	  echo 'You have unsubscribed to all e-mail alerts! Note that you will not get any more e-mail enquires from customers!';
  }

?>