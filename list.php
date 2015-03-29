<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>findmyboat.in | Search Houseboats Online | List you boat</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/bootstrapValidator.css"/>
    <script src="https://www.google.com/recaptcha/api.js"></script>
     <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script type="text/javascript">
				tinymce.init({
					selector: "textarea",
					plugins: "image link media table fullpage",
					width:900}
					);
				</script>
  </head>

  <body>
  <?php include_once 'nav.php'; ?>

	<div class="container">
    
    <?php

	if($_GET['display']) {
		if($_GET['display']=='cap'){
			echo '<div class="alert alert-danger">Please confirm that you are not a robot!.</div>';
		}
	}
?>
    
	<div class="jumbotron">
    <img src="img/profit.png" class="pull-right"> 
  <h1>List your Houseboat!</h1>
  <p><a class="btn btn-primary btn" href="guidelines.php" role="button">Listing Guidelines</a> <a class="btn btn-info btn" href="support.php" role="button">Help?</a></p>
</div>
    
    <div class="well">
    <form id="addForm" class="form-horizontal" method="post" action="addListingProcess.php">
<fieldset>

<!-- Form Name -->
<legend>Houseboat Details</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Listing Titile</label>  
  <div class="col-md-4">
  <input id="title" name="title" type="text" placeholder="Titie" class="form-control input-md" required>
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="type">Type</label>
  <div class="col-md-4">
    <select id="type" name="type" class="form-control">
      <option value="0">--- Select ---</option>
      <option value="1">Honeymoon Suite</option>
      <option value="2">Conference Hall Boats</option>
      <option value="3">Double Decker</option>
      <option value="4">Family Houseboats</option>
      <option value="5">Luxury Houseboats</option>
      <option value="6">Other</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="type">Location</label>
  <div class="col-md-4">
    <select id="type" name="location" class="form-control">
       <option value="0">--- Select ---</option>
      <option value="1">Alappuzha ( Alleppey )</option>
      <option value="2">Kollam</option>
      <option value="3">Cochin ( Kochi )</option>
      <option value="4">Kumarakom</option>
      <option value="5">Srinagar (Jammu and Kashmir)</option>
      <option value="6">Other</option>
    </select>
  </div>
</div>

<!-- 
<div class="form-group">
  <label class="col-md-4 control-label" for="price">Price (Day Only)</label>  
  <div class="col-md-4">
  <input id="price" name="price" type="hidden" value="0" placeholder="Price" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="price2">Price (Day & Night)</label>  
  <div class="col-md-4">
  <input id="price2" name="price2" type="hidden" value="0" placeholder="Price" class="form-control input-md">
    
  </div>
</div> Text input-->

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-2 control-label" for="desc">Description</label>
  <div class="col-md-8">                     
    <textarea class="form-control" rows="20" id="desc" name="desc"></textarea>
  </div>
</div>

<?php if(!isset($_SESSION['uid'])) { echo '
<legend>Contact Details</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Full Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="Full Name" class="form-control input-md" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">e-mail ID</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="e-mail ID" class="form-control input-md" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone">Phone Number</label>  
  <div class="col-md-4">
  <input id="phone" name="phone" type="text" placeholder="Phone Number" class="form-control input-md" required>
    
  </div>
</div>';
} 

?>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit">By clicking "Next" you agree to our <a href="http://findmyboat.in/policy.php">Terms and Conditions</a></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-chevron-right"></span> Next</button>
  </div>
  
  <div class="col-md-4">
  <div class="g-recaptcha" data-sitekey="6LfIGP8SAAAAABzq9Aa67tGZSN0bpewGjWz35tef"></div>
  </div>
</div>

</fieldset>
</form>
</div>
</div>
    
    <?php include_once 'footer.php'; ?>
	
     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
$(document).ready(function() {

    $('#addForm').bootstrapValidator({
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
                    notEmpty: {
                        message: 'The Full name is required and cannot be empty'
                    }
                }
            },
            title: {
                validators: {
                    notEmpty: {
                        message: 'Title is required and cannot be empty'
                    },
					stringLength: {
                        min: 6,
                        max: 36,
                        message: 'Title must be more than 6 and less than 36 characters long'
                    },
                }
            },
			desc: {
                validators: {
                    notEmpty: {
                        message: 'Description is required and cannot be empty'
                    },
                }
            },
			 phone: {
                validators: {
					notEmpty: {
                        message: 'The phone number is required and cannot be empty'
                    },regexp: {
                        regexp: /^[0-9_\.]+$/,
                        message: 'The phone number can only consist of numbers'
                    
                    }
                }
            },
			price: {
                validators: {
					notEmpty: {
                        message: 'The price is required and cannot be empty'
                    },regexp: {
                        regexp: /^[0-9_\.]+$/,
                        message: 'The price can only consist of numbers'
                    
                    }
                }
            },
            email: {
                validators: {
					notEmpty: {
                        message: 'e-mail ID is required and cannot be empty'
                    },
					
                    emailAddress: {
                        message: 'The input is not a valid email address',
                    }, 
					remote: {
                        url: 'remote.php',
                        message: 'The email ID already exsists!'
                    },
                }
            }
        }
    });

});
</script>
  </body>
</html>
