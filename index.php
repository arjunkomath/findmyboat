<?php

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;

// Any mobile device (phones or tablets).
if ( $detect->isMobile() ) {
 header('Location: http://m.findmyboat.in/');
}

// Any tablet device.
if( $detect->isTablet() ){
 header('Location: http://m.findmyboat.in/');
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="fl-verify" content="7f66ac0ca6bef8958da6e627721d1e25">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Search, Find Houseboats online, List houseboat for rent" />
	<meta name="keywords" content="search find houseboat online book kerala ad" />
    <meta name="author" content="Arjun Komath">
    <meta name="alexaVerifyID" content="RLELp0GELATlEZBKDXORywC6Pec"/>

    <meta property="og:title"
content="findmyboat.in | Search Houseboats Online" />
<meta property="og:site_name" content="findmyboat.in | Search Houseboats Online"/>
<meta property="og:url"
content="http://findmyboat.in/" />
<meta property="og:image"
content="http://findmyboat.in/logo/findmyboat.png" />
<meta property="og:description"
content="Search, Find Houseboats online, List houseboat for rent" />

    <link rel="shortcut icon" href="img/favicon.ico">

    <title>findmyboat.in | Search Houseboats Online</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/fmb.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner"><br>

              <!-- <img id="logo" src="logo/fmb.png"> -->

              <!-- <ul class="nav masthead-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Find</a></li>
                <li><a href="#">Contact</a></li>
              </ul> -->
            </div>
          </div>

          <div class="inner cover">
          <div class="logo">
          <iframe src="//player.vimeo.com/video/102039288?title=0&amp;byline=0&amp;portrait=0" width="499" height="280" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            <h1 class="cover-heading">Find the perfect houseboat for you.</h1>
            <p class="lead">You've reached the worlds largest online database for Houseboats!</p>
            <p class="lead">
              <a href="find.php" class="btn btn-lg btn-default"><span class="glyphicon glyphicon-search"></span> Show me houseboats</a>
            </p>
            <a href="https://play.google.com/store/apps/details?id=in.findmyboat.findmyboat">
  <img alt="Get it on Google Play"
       src="logo/en_generic_rgb_wo_60.png" /><a href="#">
  <img alt="Get it on Google Play" src="logo/appstore.png" />
</a>
          </div>
</div>
         <div class="mastfoot">
            <div class="inner">
              <p><a href="list.php">List your Boat</a> · Powered by <a href="http://techulus.com">Techulus</a></p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-4655726-4', 'auto');
  ga('send', 'pageview');

</script>

<!-- Start of GetKudos Script -->
<script>
(function(w,t,gk,d,s,fs){if(w[gk])return;d=w.document;w[gk]=function(){
(w[gk]._=w[gk]._||[]).push(arguments)};s=d.createElement(t);s.async=!0;
s.src='//static.getkudos.me/widget.js';fs=d.getElementsByTagName(t)[0];
fs.parentNode.insertBefore(s,fs)})(window,'script','getkudos');

getkudos('create', 'findmyboat');
</script>
<!-- End of GetKudos Script -->
  </body>
</html>
