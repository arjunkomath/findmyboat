<?php session_start();
if(!isset($_SESSION['uid']))
header("Location:find.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>findmyboat.in | Search Houseboats Online | Dashboard</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="profile.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">

	</head>
	<body>

<?php include_once 'nav.php'; ?>

<!-- Main -->
<div class="container">


<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">

<?php include 'config.php';

	$total_views=0;

	$find = mysql_query("SELECT * FROM `users` WHERE `email` = '".$_SESSION['uid']."'");

	while($row = mysql_fetch_array($find)) {

	$count = mysql_query("SELECT COUNT(*) c FROM `listing` WHERE `userid` = '".$row['id']."'");
	while($c = mysql_fetch_array($count)) {
		$total_listing=$c['c'];
	}

	$count = mysql_query("SELECT SUM( views ) s FROM `listing` WHERE `userid` = '".$row['id']."'");
	while($c = mysql_fetch_array($count)) {
		$total_views=$c['s'];
	}

	if($total_views==NULL) {
		$total_views=0;
	}

echo '<div class="container">
    <div class="row user-menu-container square">
        <div class="col-md-12 user-details">
            <div class="row coralbg white">
                <div class="col-md-6 no-pad">
                    <div class="user-pad">
                        <h3>Welcome back, '.$row['fullname'].'</h3>
                        <h4 class="white"><i class="fa fa-check-circle-o"></i> '.$row['phone'].'</h4>
                        <h4 class="white"><i class="fa fa-twitter"></i> '.$row['email'].'</h4>
                        <a type="button" class="btn btn-labeled btn-info" href="editProfile.php">
                            <span class="btn-label"><i class="fa fa-pencil"></i></span>Update</a>
                    </div>
                </div>
                <div class="col-md-6 no-pad">
                    <div class="user-image">
                        <img src="https://farm7.staticflickr.com/6163/6195546981_200e87ddaf_b.jpg" class="img-responsive thumbnail">
                    </div>
                </div>
            </div>
            <div class="row overview">
                <div class="col-md-4 user-pad text-center">
                    <h3>TOTAL LISTINGS</h3>
                    <h4>'.$total_listing.'</h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>TOTAL VIEWS</h3>
                    <h4>'.$total_views.'</h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>Reward Points</h3>
                    <h4><a href="#">';
					echo $row['points'];
					echo'</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>';
	}
	?>

      <hr>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Welcome to the Dashboard</h3>
  </div>
  <div class="panel-body">
    You can manage everything in your account from here.
  </div>
</div>

      <hr>

      <strong><i class="glyphicon glyphicon-comment"></i> Announcements</strong>
      <div class="row">
        <div class="col-md-12">
          <ul class="list-group"><br/ >
            <?php

			$find = mysql_query("SELECT * FROM `announcement`");

	while($row = mysql_fetch_array($find))

 {
	 echo '<li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-flash"></i><small>'.$row['timestamp'].'</small>
           <a href="viewAnnouncement.php?id='.$row['id'].'"><strong>'.$row['title'].'</strong></a></li>';
 }
 ?>

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
