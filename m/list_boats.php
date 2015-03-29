<?php

$response = array();
 
// include db connect class
require_once 'config.php';

//key
//if($_GET['key']=='njanaraMWONE!'){
	 
echo '[';
		
	if(!($_GET['orderby'])){
		$orderby='id';
	}
		else {
	$orderby=$_GET['orderby'];
		}
		
	if($_GET['type']==1) {
		$filter='AND `type`=1';
	} else if($_GET['type']==2) {
		$filter='AND `type`=2';
	} else if($_GET['type']==3) {
		$filter='AND `type`=3';
	} else if($_GET['type']==4) {
		$filter='AND `type`=4';
	}
	
	if($_GET['price']==1) {
		$filter_price='`price` < 4999 AND';
	} else if($_GET['price']==2) {
		$filter_price='`price` BETWEEN 5000 AND 9999 AND';
	} else if($_GET['price']==3) {
		$filter_price='`price` BETWEEN 10000 AND 19999 AND';
	} else if($_GET['price']==4) {
		$filter_price='`price` BETWEEN 20000 AND 9999999 AND';
	}
	
	if($_GET['location']==1) {
		$filter='AND `location`=1';
	} else if($_GET['location']==2) {
		$filter='AND `location`=2';
	} else if($_GET['location']==3) {
		$filter='AND `location`=3';
	} else if($_GET['location']==4) {
		$filter='AND `location`=4';
	} else if($_GET['location']==5) {
		$filter='AND `location`=5';
	}
		
 //This checks to see if there is a page number. If not, it will set it to page 1
 
 $pagenum=$_GET['pagenum'];

 if (!(isset($pagenum))) 

 { 

 $pagenum = 1; 

 } 
 
 $data = mysql_query("SELECT * FROM listing WHERE ".$filter_price." status=0 ".$filter) or die(mysql_error()); 

 $rows = mysql_num_rows($data); 
 
 if($rows>0) {
	 
	 //This is the number of results displayed per page 

 $page_rows = 10; 


 //This tells us the page number of our last page 

 $last = ceil($rows/$page_rows); 

 
 //this makes sure the page number isn't below one, or more than our maximum pages 

 if ($pagenum < 1) 

 { 

 $pagenum = 1; 

 } 

 elseif ($pagenum > $last) 

 { 

 $pagenum = $last; 

 } 


 //This sets the range to display in our query 

 $max = ($pagenum - 1) * $page_rows .',' .$page_rows; 
 
$result = mysql_query("SELECT * FROM `listing` WHERE ".$filter_price." `status`=0 ".$filter." ORDER BY `listing`.`".$orderby."` DESC LIMIT ".$max) or die(mysql_error());
 
    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {
 
		$response["products"] = array();
 
    	while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product = array();
            $product["id"] = $row["id"];
            $product["tilte"] = $row["title"];
            $product["type"] = $row["type"];
			 $product["price"] = $row["price"];
			 $product["price2"] = $row["price2"];
            //$product["des"] = mysql_real_escape_string($row["des"]);
            $product["userid"] = $row["userid"];
            $product["views"] = $row["views"];
			 $product["photo1"] = $row["photo1"];
           // push single product into final response array
        array_push($response["products"], $product);
    }
    // success
    $response["success"] = 1;
	
	$response["previous"] = $pagenum-1;
	$response["next"] = $pagenum+1;
	$response["last"] = $last;
 
    // echoing JSON response
    echo json_encode($response);
	}
	}
	
	else {
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
/*	} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required key is missing";
 
    // echoing JSON response
    echo json_encode($response);
}*/
echo ']';
?>