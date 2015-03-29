<?php session_start();
if(!isset($_SESSION['uid']))
header("Location:find.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>findmyboat.in | Search Houseboats Online</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>

<?php include_once 'nav.php'; ?>

<!-- Main -->
<div class="container">

<?php
	if($_GET['display']) {
		if($_GET['display']=='remove'){
			echo '<div class="alert alert-success">Listing has been Removed.</div>';
		}
		if($_GET['display']=='edit'){
			echo '<div class="alert alert-success">Listing has been Updated. Kindly wait for approval.</div>';
		}
		if($_GET['display']=='send'){
			echo '<div class="alert alert-success">Ticket has been send to customer. A copy has been send your email ID also. (<b>Note. If you have not recieved the mail, check SPAM Folder also</b>)</div>';
		}

	}
	?>

    <h3>Your Listings</h3><hr>

  <?php

 $email=$_SESSION['uid'];
 $query = mysql_query("SELECT id FROM `users` WHERE `email` = '".$email."'");
 while($info=mysql_fetch_array($query)) {
	 $id=$info['id'];
 }

 $query = mysql_query("SELECT * FROM `listing` WHERE `userid` = '".$id."'");

 if(mysql_num_rows($query)<1) {
	 echo '<h3>You have not listed any houseboats! Click here to <a href="list.php">Create a listing</a>.</h3>';
 } else {
	 echo '<table class="table table-striped table-hover">
   <thead>
   <th style="width:5%">ID</th>
   <th style="width:50%">Title</th>
   <th style="width:7.5%">Status</th>
   <th style="width:30%">Options</th>
   </thead>';
  while($info_l=mysql_fetch_array($query)) {

	 if($info_l['status']==0) {
		echo '<tr>';
	} else echo '<tr class="danger">';
	echo '<td style="width:5%"><b>'.$info_l['id'].'</b></td>';
	echo '<td style="width:72.5%"><b>'.$info_l['title'].'</b></td>';
	echo '<td style="width:7.5%">';

	if($info_l['status']==0) {
		echo 'Approved';
	} else echo 'Not Approved';

	echo'</td>';
	echo '<td style="width:15%"><center><a href="edit.php?id='.$info_l['id'].'" class="btn btn-info">Edit</a> <a href="remove.php?id='.$info_l['id'].'" class="btn btn-danger btn-sm">Remove</a></center></td>';
	echo '</tr>';
 }}
  ?>
  </table>

</div>
<!-- /Main -->

<?php include_once 'footer.php';?>

	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
