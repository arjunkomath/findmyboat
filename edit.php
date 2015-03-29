<?php session_start();

include 'config.php';

$query = mysql_query("SELECT token FROM `users` WHERE `email` = '".$_SESSION['uid']."'");
  while($info=mysql_fetch_array($query)) {
	$user_key=$info['token'];
  }

$query = mysql_query("SELECT token FROM `listing` WHERE `id` = '".$_GET['id']."'");
  while($info=mysql_fetch_array($query)) {
	$listing_key=$info['token'];
  }

  if($user_key!=$listing_key){
	  echo 'auth fail';
	  exit;
  }

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
	<div class="jumbotron">
  <h1>Edit Listings</h1>
<p><a class="btn btn-primary btn" href="guidelines.php" role="button">Listing Guidelines</a> <a class="btn btn-info btn" href="support.php" role="button">Help?</a></p>
</div>

    <div class="well">
    <form id="addForm" class="form-horizontal" method="post" action="editListingProcess.php">
<fieldset>

<!-- Form Name -->
<legend>Houseboat Details</legend>

<?php

$id=$_GET['id'];

$query = mysql_query("SELECT * FROM `listing` WHERE `id` = '".$id."'");
  while($info=mysql_fetch_array($query)) {

echo '
<input type="text" hidden name="id" value="'.$id.'">

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Listing Titile</label>
  <div class="col-md-4">
  <input id="title" name="title" type="text" placeholder="Titie" value="'.$info['title'].'" class="form-control input-md" required>

  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="type">Type</label>
  <div class="col-md-4">
    <select id="type" name="type" class="form-control">
      <option '; if ($info['type']==0) echo 'selected'; echo ' value="0">--- Select ---</option>
      <option '; if ($info['type']==1) echo 'selected'; echo ' value="1">Honeymoon Suite</option>
      <option '; if ($info['type']==2) echo 'selected'; echo ' value="2">Conference Hall Boats</option>
      <option '; if ($info['type']==3) echo 'selected'; echo ' value="3">Double Decker</option>
      <option '; if ($info['type']==4) echo 'selected'; echo ' value="4">Family Houseboats</option>
      <option '; if ($info['type']==5) echo 'selected'; echo ' value="5">Luxury Houseboats</option>
      <option '; if ($info['type']==6) echo 'selected'; echo ' value="6">Other</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="type">Location</label>
  <div class="col-md-4">
    <select id="type" name="location" class="form-control">
       <option '; if ($info['location']==0) echo 'selected'; echo ' value="0">--- Select ---</option>
      <option '; if ($info['location']==1) echo 'selected'; echo ' value="1">Alappuzha ( Alleppey )</option>
      <option '; if ($info['location']==2) echo 'selected'; echo ' value="2">Kollam</option>
      <option '; if ($info['location']==3) echo 'selected'; echo ' value="3">Cochin ( Kochi )</option>
      <option '; if ($info['location']==4) echo 'selected'; echo ' value="4">Kumarakom</option>
      <option '; if ($info['location']==5) echo 'selected'; echo ' value="5">Srinagar (Jammu and Kashmir)</option>
      <option '; if ($info['location']==6) echo 'selected'; echo ' value="6">Other</option>
    </select>
  </div>
</div>

<!--
<div class="form-group">
  <label class="col-md-4 control-label" for="price">Price (Day Only)</label>
  <div class="col-md-4">
  <input id="price" name="price" type="text" placeholder="Price" hidden="" value="'.$info['price'].'" class="form-control input-md">

  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="price2">Price (Day & Night)</label>
  <div class="col-md-4">
  <input id="price2" name="price2" type="text" placeholder="Price" hidden="" value="'.$info['price2'].'" class="form-control input-md">

  </div>
</div>-->

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-2 control-label" for="desc">Description</label>
  <div class="col-md-8">
    <textarea class="form-control" rows="20" id="desc" name="desc">'.$info['des'].'</textarea>
  </div>
</div>';

  }

?>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-chevron-right"></span> Next</button>
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
                    }
                }
            }
        }
    });

});
</script>
  </body>
</html>
