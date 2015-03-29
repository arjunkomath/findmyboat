<?php
$valid = true;

include 'config.php';

$query = mysql_query("SELECT * FROM `users` WHERE `email` = '".$_POST['email']."'");

if(mysql_num_rows($query)){
			 $valid = false;
            break;
	}

echo json_encode(array(
    'valid' => $valid,
));
