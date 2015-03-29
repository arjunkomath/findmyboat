<?php
include"config.php";

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = mysql_query("SELECT * FROM `users` WHERE `email` = '".$email."' AND `password` = '".$password."'");

if(mysql_num_rows($query)){
	session_start();
	$_SESSION['uid'] = $email;
	header('Location:find.php?display=login');
}
else {
	header('Location:find.php?display=wrong');
}
?>
