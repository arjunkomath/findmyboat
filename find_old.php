<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>find my boat | Dashboard</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
    </head>
	<body>
<!-- Header -->
<?php include_once 'nav.php'; ?>
<!-- /Header -->

<!-- Main -->
<div class="container">

<?php
	if($_GET['display']) {
		if($_GET['display']=='login'){
			echo '<div class="alert alert-success">You have logged In.</div>';
		}
		if($_GET['display']=='wrong'){
			echo '<div class="alert alert-danger">Incorrent Username or Password! Please try Again.</div>';
		}
		if($_GET['display']=='forgotSuccess'){
			echo '<div class="alert alert-success">We have send an e-mail to you with your new Password.</div>';
		}
		if($_GET['display']=='newaccount'){
			echo '<div class="alert alert-success">Your account has been created. You can Sign in Now.</div>';
		}
		if($_GET['display']=='forgotFail'){
			echo '<div class="alert alert-warning">Username not Found!</div>';
		}
	}
	?>

<div class="row">
	<div class="col-md-3">
      <!-- Left column -->
      <strong><i class="glyphicon glyphicon-wrench"></i> Filter Results</strong> 
      
      <hr>
      
      <ul class="list-unstyled">
      	<li class="nav-header">
        <a href="#" data-toggle="collapse" data-target="#menu3">
          <h5>Type <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
            <ul class="list-unstyled collapse in" id="menu3">
                <li><a href="find.php?type=4"></i>Family Houseboats</a></li>
                <li><a href="find.php?type=1"></i>Honeymoon Suite</a></li>
                <li><a href="find.php?type=2"></i>Conference Hall</a></li>
                <li><a href="find.php?type=3"></i>Double Decker</a></li>
            </ul>
        </li>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">
          <h5>Price <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
            <ul class="list-unstyled collapse" id="userMenu">
                <li class="active"> <a href="find.php?price=1"></i>Less than &#8377; 4999</a></li>
                <li><a href="find.php?price=2"></i>&#8377; 5000 - &#8377; 9999</a></li>
                <li><a href="find.php?price=3"></i>&#8377; 10000 - &#8377; 19999</a></li>
                <li><a href="find.php?price=4"></i>Above &#8377; 20000</a></li>
            </ul>
        </li>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu2">
          <h5>Location <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
        
            <ul class="list-unstyled collapse" id="menu2">
                <li><a href="find.php?location=1">Alappuzha ( Alleppey )</a>
                </li>
                <li><a href="find.php?location=2">Kollam</a>
                </li>
                <li><a href="find.php?location=3">Kottayam</a>
                </li>
                <li><a href="find.php?location=4">Cochin ( Kochi )</a>
                </li>
                <li><a href="find.php?location=5">Others</a>
                </li>
            </ul>
        </li>
      </ul>
           
      <hr>
      
<?php include_once 'ad.php'; ?>
      
      <hr>
     
  	</div><!-- /col-3 -->
    <div class="col-md-9">
      	
      <!-- column 2 -->	
      <strong><i class="glyphicon glyphicon-dashboard"></i> Check out these Houseboats..</strong>
      
      	<hr>
      
		<div class="row">
      
      <div class="row">
        <div class="col-md-12">
          <ul class="list-group">
           
            <?php
	
	include 'config.php';
		
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
 
 //Here we count the number of results 

 //Edit $data to be your query 

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
 
  //This is your query again, the same one... the only difference is we add $max into it
 $data_p = mysql_query("SELECT * FROM `listing` WHERE ".$filter_price." `status`=0 ".$filter." ORDER BY `listing`.`".$orderby."` DESC LIMIT ".$max) or die(mysql_error()); 

 //This is where you display your query results

 while($info = mysql_fetch_array( $data_p )) 

 { 
	echo '<li class="list-group-item">
	<div class="row">
	
	<div class="col-md-3">
  <a class="pull-left" href="view.php?id='.$info['id'].'">
	<img href class="media-object" height="110px" src="upload/uploads/'.$info['photo1'].'">
  </a>
  </div>
  
  <div class="col-md-9">
    <h3><a href="view.php?id='.$info['id'].'">'.$info['title'].'</a> - <small>';
	if($info['type']==1) {
		echo 'Honeymoon Suite';
	} else if($info['type']==2) {
		echo 'Conference Hall Boats';
	} else if($info['type']==3) {
		echo 'Doube Decker';
	} else if($info['type']==4) {
		echo 'Family houseboats';
	} else if($info['type']==5) {
		echo 'Other';
	} 
	echo'</small></h3>';
	
	echo'<h3>'.$info['views'].' <small> views </small></h3>
                    <a type="button" class="btn btn-primary btn-lg btn-block"> &#8377; '.$info['price'].' </a>
	<h4>Located at ';
	
	if($info['location']==1) {
	  echo '<a target="_blank"  href="https://www.google.co.in/maps/place/Alappuzha,+Kerala/@9.4989551,76.3405891,12z/data=!3m1!4b1!4m2!3m1!1s0x3b0884f1aa296b61:0xb84764552c41f85a"> Alappuzha ( Alleppey )</a>';
  } else if($info['location']==2) {
	  echo '<a target="_blank"  href="https://www.google.co.in/maps/place/Kollam,+Kerala/@8.8912018,76.6010506,14z/data=!3m1!4b1!4m2!3m1!1s0x3b05fc5bdda9c621:0x8bf03195267372f7"> Kollam</a>';
  } else if($info['location']==3) {
	  echo '<a target="_blank"  href="https://www.google.co.in/maps/place/Kottayam,+Kerala/@9.5937652,76.5238677,13z/data=!3m1!4b1!4m2!3m1!1s0x3b062ba16c6b435f:0xbe2b02f68f8dd06e"> Kottayam</a>';
  } else if($info['location']==4) {
	  echo '<a target="_blank"  href="https://www.google.co.in/maps/place/Kochi,+Kerala/@9.9273366,76.2668541,13z/data=!3m1!4b1!4m2!3m1!1s0x3b080d514abec6bf:0xbd582caa5844192"> Cochin ( Kochi )</a>';
  } else if($info['location']==5) {
	  echo ' Other';
  }
	
	echo'</h3>
	<h4>&#8377; '.$info['price'].' / day <br/> &#8377; '.$info['price2'].' / day+night</h4></div></div>
</div></li>';

 } 

 
 // This shows the user what page they are on, and the total number of pages

 echo '<br><p>Page '.$pagenum.' of '.$last;

 
 // First we check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we generate links to the first page, and to the previous page.

 if ($pagenum == 1) 

 {

 } 

 else 

 {

 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=1'".' class="btn btn-sm btn-info">First</a>';

 echo " ";

 $previous = $pagenum-1;

 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$previous'".' class="btn btn-sm btn-info">Previous</a>';

 } 


 //just a spacer

 echo ' · ';


 //This does the same as above, only checking if we are on the last page, and then generating the Next and Last links

 if ($pagenum == $last) 

 {

 } 

 else {

 $next = $pagenum+1;

 echo "<a href='{$_SERVER['PHP_SELF']}?pagenum=$next'".' class="btn btn-sm btn-info">Next</a>';

 echo " ";

 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$last'".' class="btn btn-sm btn-info">Last</a>';

 } 
 }
 else {
	 echo '<div class="alert alert-danger">Oops! No Boats Found.</div>';
 }
 ?> 
            </p>
          </ul>
        </div>
      </div>
  	</div><!--/col-span-9-->
</div>
</div>
<!-- /Main -->

<?php include_once 'footer.php';?>
  
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>