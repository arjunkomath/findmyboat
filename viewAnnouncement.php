<?php session_start();
if(!isset($_SESSION['uid']))
header("Location:find.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>findmyboat.in | Search Houseboats Online</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <?php include_once 'nav.php'; ?>
    <div class="container">
     <?php
			$id=$_GET['id'];
			$find = mysql_query("SELECT * FROM `announcement` WHERE `id`='".$id."'");
	
	while($row = mysql_fetch_array($find)) 

 {
	 echo '<div class="page-header">
  <a href="dashboard.php" class="btn btn-primary pull-right">Back</a><h1>'.$row['title'].'<small> '.$row['timestamp'].'</small></h1>
</div>';
echo'<div class="jumbotron">  
      <div id="intro">
        '.$row['message'].'
  </div>
</div>';
 }
 ?>
    
    
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
    <?php include_once 'footer.php'; ?>
        
  </body>
</html>