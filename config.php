<?php

$hostname = "localhost";
$username = "root";
$dbname = "findmyboat";

$con = mysql_connect($hostname,$username,"root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($dbname, $con);
?>