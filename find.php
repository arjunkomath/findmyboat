<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>findmyboat.in | Search Houseboats Online</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
       <meta name="description" content="Search, Find, Book Houseboats online, List houseboat for rent" />
		<meta name="keywords" content="search find houseboat online book kerala ad" />
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
       <link rel="shortcut icon" href="img/favicon.ico">
    </head>

    <style>

.thumbnail {
    position: relative;
    padding: 0px;
    margin-bottom: 20px;
	height: 400px;

}

.thumbnail img {
    width: 100%;
	min-height:195px;
	max-height:195px;
}
	</style>
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
                <li><a href="find.php"></i>All</a></li>
                <li><a href="find.php?type=1"></i>Honeymoon Suite</a></li>
                <li><a href="find.php?type=2"></i>Conference Hall</a></li>
                <li><a href="find.php?type=3"></i>Double Decker</a></li>
                <li><a href="find.php?type=4"></i>Family Houseboats</a></li>
                <li><a href="find.php?type=5"></i>Luxury Houseboats</a></li>
                <li><a href="find.php?type=6"></i>Other</a></li>
            </ul>
        </li>
        <!--<li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">
          <h5>Price <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
            <ul class="list-unstyled collapse" id="userMenu">
                <li class="active"> <a href="find.php?price=1"></i>Less than &#8377; 4999</a></li>
                <li><a href="find.php?price=2"></i>&#8377; 5000 - &#8377; 9999</a></li>
                <li><a href="find.php?price=3"></i>&#8377; 10000 - &#8377; 19999</a></li>
                <li><a href="find.php?price=4"></i>Above &#8377; 20000</a></li>
            </ul>
        </li>-->
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu2">
          <h5>Location <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>

            <ul class="list-unstyled collapse" id="menu2">
                <li><a href="find.php?location=1">Alappuzha ( Alleppey )</a>
                </li>
                <li><a href="find.php?location=2">Kollam</a>
                </li>
                <li><a href="find.php?location=3">Cochin ( Kochi )</a>
                </li>
                <li><a href="find.php?location=4">Kumarakom</a>
                </li>
                <li><a href="find.php?location=5">Srinagar (Jammu and Kashmir)</a>
                </li>
                <li><a href="find.php?location=6">Others</a>
                </li>
            </ul>
        </li>
      </ul>

      <hr>

<?php include_once 'ad.php'; ?>
<?php include_once 'ad.php'; ?>

      <hr>

  	</div><!-- /col-3 -->
    <div class="col-md-9">

      <!-- column 2 -->
      <strong><i class="glyphicon glyphicon-dashboard"></i> Check out these Houseboats..</strong>

<div class="btn-group pull-right">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <b>Sort by :</b> <?php
			if ($_GET['sort']==1){
			echo 'Newly Listed ';
			} else if ($_GET['sort']==2){
			echo 'Most Popular ';
			//} else if ($_GET['sort']==3){
			//echo 'Price: Low to High ';
			//} else if ($_GET['sort']==4){
			//echo 'Price: High to Low ';
			} else {
				echo 'Newly Listed ';
			}
			?><span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>&sort=1">Newely Listed</a></li>
            <li><a href="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>&sort=2">Most Popular</a></li>
            <!--<li><a href="<?php //echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>&sort=3">Price: Low to High</a></li>
            <li><a href="<?php //echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>&sort=4">Price: High to Low</a></li>-->
          </ul>
        </div>

      	<hr>

		<div class="row">

      <div class="row">
        <div class="col-md-12">
			<div class="row">
            <?php

	include 'config.php';

	if(!($_GET['orderby'])){
		$orderby='updatedAt';
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
	} else if($_GET['type']==5) {
		$filter='AND `type`=5';
	} else if($_GET['type']==6) {
		$filter='AND `type`=6';
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
	} else if($_GET['location']==6) {
		$filter='AND `location`=6';
	}

$sort='DESC';

	if(($_GET['sort'])==3){
	$sort='ASC';
	$orderby='price';
} else if(($_GET['sort'])==4){
	$sort='DESC';
	$orderby='price';
} else if(($_GET['sort'])==2){
	$orderby='views';
} else if(($_GET['sort'])==1){
	$orderby='updatedAt';
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

 $page_rows = 9;


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
 $data_p = mysql_query("SELECT * FROM `listing` WHERE ".$filter_price." `status`=0 ".$filter." ORDER BY `listing`.`".$orderby."` ".$sort." LIMIT ".$max) or die(mysql_error());

 //This is where you display your query results

 while($info = mysql_fetch_array( $data_p ))

 {
echo'<div class="col-xs-32 col-sm-8 col-md-4">
          <div itemscope itemtype="http://schema.org/Organization" class="thumbnail">
            <a href="view.php?id='.$info['id'].'"><img src="upload/uploads/thumb_'.$info['photo1'].'" alt=""></a>
              <div class="caption">
                <h4 itemprop="name"><a href="view.php?id='.$info['id'].'">'.$info['title'].'</a></h4>
                <p>';

				if($info['type']==1) {
		echo 'Honeymoon Suite';
	} else if($info['type']==2) {
		echo 'Conference Hall Boats';
	} else if($info['type']==3) {
		echo 'Doube Decker';
	} else if($info['type']==4) {
		echo 'Family houseboats';
	} else if($info['type']==5) {
		echo 'Luxury houseboats';
	} else if($info['type']==6) {
		echo 'Other';
	}
	echo '</p>';

	echo '<p itemprop="addressRegion">at ';

	if($info['location']==1) {
	  echo '<a target="_blank"  href="https://www.google.co.in/maps/place/Alappuzha,+Kerala/@9.4989551,76.3405891,12z/data=!3m1!4b1!4m2!3m1!1s0x3b0884f1aa296b61:0xb84764552c41f85a"> Alappuzha ( Alleppey )</a>';
  } else if($info['location']==2) {
	  echo '<a target="_blank"  href="https://www.google.co.in/maps/place/Kollam,+Kerala/@8.8912018,76.6010506,14z/data=!3m1!4b1!4m2!3m1!1s0x3b05fc5bdda9c621:0x8bf03195267372f7"> Kollam</a>';
  } else if($info['location']==3) {
	  echo '<a target="_blank"  href="https://www.google.co.in/maps/place/Kochi,+Kerala/@9.9273366,76.2668541,13z/data=!3m1!4b1!4m2!3m1!1s0x3b080d514abec6bf:0xbd582caa5844192"> Cochin ( Kochi )</a>';
  } else if($info['location']==4) {
	  echo '<a target="_blank"  href="https://goo.gl/maps/SLziR"> Kumarakom</a>';
  } else if($info['location']==5) {
	  echo 'Srinagar (Jammu and Kashmir)';
  } else if($info['location']==6) {
	  echo ' Other';
  }
	echo'</p>';

	//echo '<h4>&#8377; ';

	/*if($info['price']!=0)
	{echo $info['price'];}
	else
	{echo 'Not Available';}

	echo ' / day <br/> &#8377; ';
	if($info['price2']!=0)
	{echo $info['price2'];}
	else
	{echo 'Not Available';}
	echo ' / day+night</h4>';*/
	echo '<p>
			<a href="view.php?id='.$info['id'].'" class="btn btn-info btn-block" role="button">View Details</a>';

			echo '<div class="row pull-right" style="margin-right:2px;">';

		  $data_rating = mysql_query("SELECT round(AVG(rating),2) r FROM `reviews` WHERE `listingID`='".$info['id']."'") or die(mysql_error());
			while($info_rating = mysql_fetch_array( $data_rating )){
		 				$s=0;
						for($i=1;$i<=$info_rating['r'];$i++){
							echo '<span><span class="glyphicon glyphicon-star"></span>';
							$s++;
						}
						$l=5-$s;
						while($l){
							echo '<span><span class="glyphicon glyphicon-star-empty"></span>'; $l--;
						}
			}
            echo'</div>';

	       echo '<a href="#" class="btn btn-default btn-xs" role="button">'.$info['views'].' views</a>';
		  echo'</div>
          </div>
        </div>';

 }

echo '</div><!-- End row -->';

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
