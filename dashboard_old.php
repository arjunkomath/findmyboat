<?php session_start();
if(!isset($_SESSION['uid']))
header("Location:find.php");
?>
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

<?php include_once 'nav.php'; ?>

<!-- Main -->
<div class="container">
<div class="row">
	<div class="col-md-3">
      <!-- Left column -->
      <a href="#"><strong><i class="glyphicon glyphicon-wrench"></i> Tools</strong></a>  
      
      <hr>
      
      <ul class="list-unstyled">
      	<li class="nav-header">
        <a href="#" data-toggle="collapse" data-target="#menu3">
          <h5>My Listings <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
        
            <ul class="list-unstyled collapse in" id="menu3">
                <li><a href="list.php"><i class="glyphicon glyphicon-circle"></i> Add New</a></li>
                <li><a href="viewListings.php"><i class="glyphicon glyphicon-circle"></i> View Listings</a></li>
            </ul>
        </li>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">
          <h5>Settings <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
            <ul class="list-unstyled collapse" id="userMenu">
                <li class="active"> <a href="#"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-envelope"></i> Messages <span class="badge badge-info">4</span></a></li>
                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Options</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-comment"></i> Shoutbox</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Staff List</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-flag"></i> Transactions</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-exclamation-sign"></i> Rules</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
            </ul>
        </li>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu2">
          <h5>Reports <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
        
            <ul class="list-unstyled collapse" id="menu2">
                <li><a href="#">Information &amp; Stats</a>
                </li>
                <li><a href="#">Views</a>
                </li>
                <li><a href="#">Requests</a>
                </li>
                <li><a href="#">Timetable</a>
                </li>
                <li><a href="#">Alerts</a>
                </li>
            </ul>
        </li>
      </ul>
           
      <hr>
      
      <a href="#"><strong><i class="glyphicon glyphicon-link"></i> Resources</strong></a>  
      
      <hr>
      
      <ul class="nav nav-pills nav-stacked">
        <li class="nav-header"></li>
        <li><a href="#"><i class="glyphicon glyphicon-list"></i> Layouts &amp; Templates</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-briefcase"></i> Toolbox</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-link"></i> Widgets</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-book"></i> Pages</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-star"></i> Social Media</a></li>
      </ul>
      
  	</div><!-- /col-3 -->
    <div class="col-md-9">
      	
      <!-- column 2 -->	
      <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>   
      <hr>
      

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Welcome to the Dashboard</h3>
  </div>
  <div class="panel-body">
    Here you can manage everything.. see stats etc..
  </div>
</div>
      
      <a href="#"><strong><i class="glyphicon glyphicon-comment"></i> Announcements</strong></a>  
      
      <hr>
      
      <div class="row">
        <div class="col-md-12">
          <ul class="list-group">
            <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-flash"></i> <small>(3 mins ago)</small> The 3rd page reports don't contain any links. Does anyone know why..</a></li>
            <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-flash"></i> <small>(1 hour ago)</small> Hi all, I've just post a report that show the relationship betwe..</a></li>
            <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-heart"></i> <small>(2 hrs ago)</small> Paul. That document you posted yesterday doesn't seem to contain the over..</a></li>
            <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-heart-empty"></i> <small>(4 hrs ago)</small> The map service on c243 is down today. I will be fixing the..</a></li>
            <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-heart"></i> <small>(yesterday)</small> I posted a new document that shows how to install the services layer..</a></li>
            <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-flash"></i> <small>(yesterday)</small> ..</a></li>
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