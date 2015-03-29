<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>findmyboat.in | Search Houseboats Online</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="dist/css/bootstrapValidator.css"/>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- Include the FontAwesome CSS if you want to use feedback icons provided by FontAwesome -->
    <!--<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />-->

    <script type="text/javascript" src="vendor/jquery/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
  .login-box{
	  width:900px;
	  padding-top:10px;
	  margin-left:auto;
	  margin-right:auto;
	  }
  </style>
     
  </head>
  <body>
    <?php include_once 'nav.php'; ?>
   
<div class="login-box">

<?php

	if($_GET['display']) {
		if($_GET['display']=='cap'){
			echo '<div class="alert alert-danger">Please confirm that you are not a robot!.</div>';
		}
	}
?>

	<form id="defaultForm" class="form-horizontal" method="post" action="addUser.php">
<fieldset>

<!-- Form Name -->
<legend>Registration</legend>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-2 control-label" for="action">e-mail ID</label>
  <div class="col-md-8">                     
    <input name="email" type="text" placeholder="e-mail ID" class="form-control input-md">
  </div>
</div>

<div class="row">
<div class="col-md-6">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="claimid">Full Name</label>  
  <div class="col-md-6">
  <input id="claimid" name="fullname" type="text" placeholder="Full Name" class="form-control input-md">
    
  </div>
</div></div>

<div class="col-md-6">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="number">Contact Number</label>  
  <div class="col-md-6">
  <input id="number" name="number" type="text" placeholder="Contact Number" class="form-control input-md">
    
  </div>
</div>
</div>
</div>

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
<br/>

<!-- Button -->
<div class="form-group">
<center>
<div class="col-md-4">
<div class="g-recaptcha" data-sitekey="6LfIGP8SAAAAABzq9Aa67tGZSN0bpewGjWz35tef"></div>
</div>

<div class="col-md-4 pull-right">
    <button id="add" name="add" type="submit" class="btn btn-success btn-lg">Register Now!</button><br>
    <small>By clicking the register button, you agree to our <a href="policy.php">Terms of service.</a></small>
  </div>
  </center>
</div>
			
</fieldset>
</form>

<br/>

<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

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
					 stringLength: {
                        min: 6,
                        max: 20,
                        message: 'Password must be more than 6 and less than 20 characters long'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
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
                    },
                }
            },
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
                    },
					remote: {
                        url: 'remote.php',
                        message: 'The email ID already exsists!'
                    },
                }
            },
			number: {
                validators: {
                    regexp: {
                        regexp: /^[0-9_\.]+$/,
                        message: 'Number can only consist of numbers'
                    },
						notEmpty: {
                        message: 'Number is required and cannot be empty'
                    }
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
</script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script>
    $('.input-group.date').datepicker({
    format: "yyyy/mm/dd",
    startDate: "2012-01-01",
    endDate: "2015-01-01",
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true
    });
    </script>
</div>

<?php include_once 'footer.php';?>
   </body>
</html>