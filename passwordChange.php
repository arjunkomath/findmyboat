<?php
session_start();
if(!isset($_SESSION['uid']))
header("Location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>findmyboat.in | Search Houseboats Online</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/bootstrapValidator.css"/>
     <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<link rel="stylesheet" href="../css/bootstrap.css"/>

    <?php include_once 'nav.php'; ?>
    <div class="container">
    <?php
	if($_GET['display']) {
		if($_GET['display']=='success'){
			echo '<div class="alert alert-success">Password Changed.</div>';
		}
	}
	?>
    </div>
<div class="container">
	<form id="defaultForm" class="form-horizontal" method="post" action="passwordSave.php">
<fieldset>

<!-- Form Name -->
<legend>Change Password</legend>

<div class="row">
<div class="col-md-6">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="number">Password</label>  
  <div class="col-md-6">
  <input name="password" type="password" placeholder="Password" class="form-control input-md">
    
  </div>
</div></div>

<div class="col-md-6">
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="action">Confirm Password</label>
  <div class="col-md-6">                     
    <input name="confirmPassword" type="password" placeholder="Confirm Password" class="form-control input-md">
  </div>
</div>
</div>
</div>

<!--
<div class="form-group">
  <label class="col-md-4 control-label" for="details">Settlement Details</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="details" name="details"></textarea>
  </div>
</div>  Textarea -->

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="add"></label>
  <div class="col-md-4">
    <button id="add" name="add" type="submit" class="btn btn-success btn-lg">Change</button>
  </div>
</div>
			
</fieldset>
</form>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>
    <script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    },
					  stringLength: {
                        min: 6,
                        max: 20,
                        message: 'Password must be more than 6 and less than 20 characters long'
                    },
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    });

});
</script>

</div>

<?php include_once 'footer.php';?>
   </body>
</html>