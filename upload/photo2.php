<?php

require_once '../config.php';

if($_POST['key']=='F122EFE3574FADECCA15E6797B7CB') {

$id=$_POST['id'];

if (isset($_FILES['photo2'])) {
	move_uploaded_file($_FILES['photo2']['tmp_name'], 'uploads/'.$_FILES['photo2']['name']);
	
	mysql_query("UPDATE `listing` SET `photo2`='".$_FILES['photo2']['name']."' WHERE `id`='".$id."'") or die(mysql_error());

echo '[';
	$response["success"] = 1;
	$response["message"]="Image Upload Success!";
    echo json_encode($response);
echo ']';
}
} else {
	echo '[';
	$response["success"] = 0;
	$response["message"]="Invalid Key!";
    echo json_encode($response);
echo ']';
}

?>