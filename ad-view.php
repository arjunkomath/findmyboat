<?php
session_start();
if($_SESSION['uid']!='arjuun@me.com'){
	echo 'auth fail';
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
        <title>findmyboat.in | Search Houseboats Online</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
        <link rel="stylesheet" href="dist/css/bootstrapValidator.css"/>
               <link rel="shortcut icon" href="img/favicon.ico">
	</head>
	<body>
<!-- Header -->
<?php include_once 'nav.php'; ?>
<!-- /Header -->

<!-- Main -->
<div class="container">

<?php
	if($_GET['display']) {

		if($_GET['display']=='send'){
			echo '<div class="alert alert-success">Your message has been Send.</div>';
		}
	}
?>
    
<?php
include 'config.php';
$id=$_GET['id'];
$data = mysql_query("SELECT * FROM `listing` WHERE `id`='".$id."'") or die(mysql_error()); 
while($info = mysql_fetch_array( $data )) 

 { 
 
echo '<div class="page-header">
  <h1>'.$info['title'].'<small> ';
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
  echo'</small></h1></div>';
  echo'<div class="row">';
  echo '<div class="col-md-8">
  <ul class="list-group">
  <li class="list-group-item"><center><img width="525px" src="upload/uploads/'.$info['photo1'].'"></center></li>
  <li class="list-group-item"><p class="pull-right"><b>Views : '.$info['views'].'</b></p><h3>&#8377; '.$info['price'].' / day, &#8377; '.$info['price2'].' / day+night</h3></li>
  <li class="list-group-item"><p class="pull-right"><h4>at ';
  
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
  
  echo'</h4></li>
</ul>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Description &amp; Features</h3>
  </div>
  <div class="panel-body">
    '.$info['des'].'
  </div>
</div>
</div>';

echo '<div class="col-md-4">

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Contact Host</h3>
  </div>
  <div class="panel-body">';
$data_u = mysql_query("SELECT * FROM `users` WHERE `status`=0 AND `id`='".$info['userid']."'") or die(mysql_error()); 
while($info_u = mysql_fetch_array( $data_u )){
  echo'<li class="list-group-item"><h4><span class="glyphicon glyphicon-user"></span> '.$info_u['fullname'].'</h4></li>';
  echo'<li class="list-group-item"><h4><span class="glyphicon glyphicon-phone"></span> '.$info_u['phone'].'</h4></li>';
  echo'
	<div class="row">
      <div class="col-md">
        <div class="well well-sm">
          <form id="message" class="form-horizontal" action="message.php" method="post">
          <fieldset>
            <legend class="text-center">Send Message to Host</legend>
    		 <input type="text" value="'.$info['id'].'" hidden name="id">
			 <input type="text" value="'.$info['title'].'" hidden name="title">
			 <input type="text" value="'.$info_u['email'].'" hidden name="to">
            <!-- Email input-->
            <div class="form-group">
                <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
            </div>
    
            <!-- Message body -->
            <div class="form-group">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button id="add" name="add" type="submit" class="btn btn-success pull-right">Send</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
  ';
}
 echo'</div>
</div>

<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title">Sharing is Caring!</h3>
  </div>
  <div class="panel-body">';
    echo "<span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_linkedin_large' displayText='LinkedIn'></span>
<span class='st_googleplus_large' displayText='Google +'></span>
<span class='st_pinterest_large' displayText='Pinterest'></span>
<span class='st_email_large' displayText='Email'></span>
  </div>
</div>";

include_once 'ad.php';

echo"</div></div>";

 } 

?>
</div>
<!-- /Main -->

<?php include_once 'footer.php';?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>
    <script src="js/bootstrap.min.js"></script>

  <script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "b1b06b30-8706-4b09-8bd9-c92ca7b8641d", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>

<script src="js/scripts.js"></script>
        
        <script type="text/javascript">
$(document).ready(function() {

    $('#message').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			fullname: {
                validators: {
                    regexp: {
                        regexp: /^[a-z A-Z_\.]+$/,
                        message: 'Name can consist only of alphabets!'
                    },
						notEmpty: {
                        message: 'Full Name is required and cannot be empty'
                    }
                }
            },
			email: {
                validators: {
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    },
						notEmpty: {
                        message: 'email ID is required and cannot be empty'
                    }
                }
            },
			message: {
                validators: {
						notEmpty: {
                        message: 'email ID is required and cannot be empty'
                    }
                }
            },
        }
    });
});
</script>
	</body>
</html>