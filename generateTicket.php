<?php 
session_start();
include 'config.php';
$query = mysql_query("SELECT `token` FROM `users` WHERE `email` = '".$_SESSION['uid']."'"); 
  while($info=mysql_fetch_array($query)) {
	$user_key=$info['token'];  
  }
  
$query = mysql_query("SELECT `token` FROM `listing` WHERE `id` = '".$_GET['id']."'"); 
  while($info=mysql_fetch_array($query)) {
	$listing_key=$info['token'];  
  }
  
  if($user_key!=$listing_key){
	  echo 'auth fail';
	  exit;
  }

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
        <link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" rel="stylesheet">
	</head>
	<body>

<?php include_once 'nav.php'; ?>

<!-- Main -->
<div class="container">

<h1>Generate Ticket</h1>
<hr>

<form class="form-horizontal" method="post" action="sendTicket.php">
<fieldset>

<?php
$id=$_GET['id'];
$title=$_GET['title'];
echo '<h3>Houseboat : '.$title.'</h3><br/>';
echo '<input type="hidden" name="id" value="'.$id.'">';
echo '<input type="hidden" name="title" value="'.$title.'">';
echo '<input type="hidden" name="from" value="'.$_SESSION['uid'].'">';
?>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dateAdd">Date</label>  
  <div class="input-group col-md-6 date today">
  <input name="date" type="text" value="<?php echo date("d/m/y"); ?>" class="form-control" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="time">Reporting Time</label>  
  <div class="col-md-6">
  <input id="time" name="time" type="text" placeholder="Enter time (eg. 10 am.)" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Customer e-mail</label>  
  <div class="col-md-6">
  <input id="email" name="email" type="text" placeholder="Enter e-mail ID" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-success btn-block">Send</button>
  </div>
</div>

</fieldset>
</form>

</div>
<!-- /Main -->

<?php include_once 'footer.php';?>


	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script>
    $('.input-group.date').datepicker({
    format: "dd/mm/yyyy",
    startDate: "01-01-2014",
    endDate: "01-01-2020",
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true
    });
    </script>

	</body>
</html>