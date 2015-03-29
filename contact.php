<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>findmyboat.in | Search Houseboats Online | Contact Us</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/bootstrapValidator.css"/>


    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
      
  </head>

  <body>
  
  <?php include_once 'nav.php'; ?>

    <div class="container">
    <?php if($_GET['display']=='send') {
		echo'
<div class="row">
  <div class="col-md-12">
	<div class="alert alert-success"><strong><span class="glyphicon glyphicon-send"></span> Message sent! We will get back to you soon.</strong></div>	  
  </div>';
	}
	?>
    <h3>Contact Us</h3>
  <form id="defaultForm" class="form-horizontal" role="form" action="contactSend.php" method="post" >
    <div class="col-lg-6">
      <div class="form-group">
        <label for="InputName">Your Name</label>
        <div class="input-group">
          <input style="width:570px;" type="text" class="form-control input-md" name="fullname" placeholder="Enter Name" required>
          </div>
      </div>
      <div class="form-group">
        <label for="InputEmail">Your Email</label>
        <div class="input-group">
          <input style="width:570px;" type="email" class="form-control input-md" name="email" placeholder="Enter Email" required>
          </div>
      </div>
      <div class="form-group">
        <label for="InputMessage">Message</label>
        <div class="input-group"
>
          <textarea cols="83" name="message" class="form-control" rows="5" required></textarea>
          </div>
      </div>
  
    <button id="add" name="add" type="submit" class="btn btn-success btn-lg pull-right">Send</button>
    </div>
  </form>
  <hr class="featurette-divider hidden-lg">
  <div class="col-lg-5 col-md-push-1">
    <address>
    <h3>Techulus</h3>
    <p class="lead">C/O StartUp Village<br>
Kinfra Hi-Tech Park Main Rd,<br/> Kinfra Hi-Tech Park, <br/>HMT Colony, North Kalamassery, <br/>Kalamassery, Kochi, Kerala 683503
      <br/> <small>e-mail: arjun@techulus.com, georgekutty@techulus.com</small></p>
    </address>
  </div>
</div>

</div>
    <script type="text/javascript" src="vendor/jquery/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>
    <?php include_once 'footer.php'; ?>
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
