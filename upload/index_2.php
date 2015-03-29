<?php
include('../config.php');
session_start();

if(!$_GET['id']) {
  echo 'missing id';
  die();
}

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
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Findmyboat</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.form.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	var options = {
			target: '#output',   // target element(s) to be updated with server response
			beforeSubmit: beforeSubmit,  // pre-submit callback
			success: afterSuccess,  // post-submit callback
			resetForm: true        // reset the form after successful submit
		};

	 $('#MyUploadForm').submit(function() {
			$(this).ajaxSubmit(options);
			// always return false to prevent standard browser submit and page navigation
			return false;
		});
});

function afterSuccess()
{
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button

}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{

		if( !$('#imageInput').val()) //check empty input filed
		{
			$("#output").html("Please select the picture!!");
			return false
		}

		var fsize = $('#imageInput')[0].files[0].size; //get file size
		var ftype = $('#imageInput')[0].files[0].type; // get file type


		//allow only valid image file types
		switch(ftype)
        {
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }

		//Allowed file size is less than 1 MB (1048576)
		if(fsize>3048576)
		{
			$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
			return false
		}

		$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#output").html("");
	}
	else
	{
		//Output error to older browsers that do not support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

</script>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="upload-wrapper">
<div align="center">
<h3>FindmyBoat Photo Uploader</h3>
<form action="processupload_2.php" method="post" enctype="multipart/form-data" id="MyUploadForm">
<input name="image_file" id="imageInput" type="file" />
<input type="submit"  id="submit-btn" value="Upload" />
<input type="text" name="id" hidden value="<?php echo $_GET['id']; ?>">
<img src="images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
</form>
<div id="output"></div>
</div><br/>
<center><h2><a href="index_3.php?id=<?php echo $_GET['id']; ?>">Upload 3rd Photo</a></h2></center>
<br/>
<center><h2><a href="../find.php">Submit Listing</a></h2></center>
</div>

</body>
</html>
