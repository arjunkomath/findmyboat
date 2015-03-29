<?php

$response = array();
 
// include db connect class
require_once 'config.php';

//key
//if($_GET['key']=='njanaraMWONE!'){
	
// check for post data
if (isset($_GET["id"])) {
    $id = $_GET['id'];
	
$update=mysql_query("UPDATE `listing` SET `views` =`views` + 1 WHERE `id`='".$id."'");
 
$result = mysql_query("SELECT * FROM `listing` WHERE `status`=0 AND `id`='".$id."'") or die(mysql_error()); 
 
    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {
 
            $result = mysql_fetch_array($result);
 
            $product = array();
            $product["id"] = $result["id"];
            $product["tilte"] = $result["title"];
            $product["type"] = $result["type"];
			 $product["location"] = $result["location"];
			 $product["price"] = $result["price"];
			 $product["price2"] = $result["price2"];
            $product["des"] = $result["des"];
            $product["userid"] = $result["userid"];
            $product["views"] = $result["views"];
			 $product["photo1"] = $result["photo1"];
			 $uid = $result["userid"];
            // success
            $response["success"] = 1;
			
			 $gethost= mysql_query("SELECT * FROM `users` WHERE `id`='".$uid."'") or die(mysql_error());
			 if (mysql_num_rows($gethost) > 0) {
 
            $resulthost = mysql_fetch_array($gethost); 
			 $host =array();
			 $host["fullname"]=$resulthost["fullname"];
			 $host["email"]=$resulthost["email"];
			 $host["phone"]=$resulthost["phone"];
			 
			 }
 			// user node
            $response["host"] = array();
            // user node
            $response["product"] = array();
 
            array_push($response["product"], $product);
			 array_push($response["host"], $host);
 
            // echoing JSON response
            echo json_encode($response);
        } else {
            // no product found
            $response["success"] = 0;
            $response["message"] = "No boat found";
 
            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "No boat found";
 
        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
/*} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required key is missing";
 
    // echoing JSON response
    echo json_encode($response);
}*/
?>