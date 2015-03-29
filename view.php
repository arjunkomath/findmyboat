<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php
		include 'config.php';
		$id=$_GET['id'];
		$data = mysql_query("SELECT title FROM `listing` WHERE `status`=0 AND `id`='".$id."'") or die(mysql_error());
while($info = mysql_fetch_array( $data ))
 {
 	echo '<title>findmyboat.in | '.$info['title'].'</title>
	<meta name="description" content="'.$info['title'].'" />
		<meta name="keywords" content="search find houseboat online book kerala ad" />';
 }
		?>
		<link href="css/bootstrap.css" rel="stylesheet">
        <script src="https://www.google.com/recaptcha/api.js"></script>
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
        <link rel="stylesheet" href="dist/css/bootstrapValidator.css"/>
               <link rel="shortcut icon" href="img/favicon.ico">
<style>
.animated {
    -webkit-transition: height 0.2s;
    -moz-transition: height 0.2s;
    transition: height 0.2s;
}

.stars
{
    margin: 20px 0;
    font-size: 24px;
    color: #d17581;
}

/* http://www.jquery2dotnet.com/ */
.glyphicon { margin-right:5px;}
.rating .glyphicon {font-size: 22px;}
.rating-num { margin-top:0px;font-size: 54px; }
.progress { margin-bottom: 5px;}
.progress-bar { text-align: left; }
.rating-desc .col-md-3 {padding-right: 0px;}
.sr-only { margin-left: 5px;overflow: visible;clip: auto; }

</style>
	</head>
	<body>
<!-- Header -->
<?php include_once 'nav.php'; ?>
<!-- /Header -->

<!-- Main -->
<div class="container">

<?php
	if($_GET['display']) {
		if($_GET['display']=='cap'){
			echo '<div class="alert alert-danger">Please confirm that you are not a robot!.</div>';
		}
		if($_GET['display']=='send'){
			echo '<div class="alert alert-success">Your message has been Send.</div>';
		}
		if($_GET['display']=='review'){
			echo '<div class="alert alert-success">Thank you for the review!</div>';
		}
		if($_GET['display']=='reviewerror'){
			echo '<div class="alert alert-danger">Please fill all fields, Full Name, email, comment and rating is mandatory!</div>';
		}
	}
?>

<?php
include 'config.php';
$id=$_GET['id'];
$update=mysql_query("UPDATE `listing` SET `views` =`views` + 1 WHERE `id`='".$id."'");
$data = mysql_query("SELECT * FROM `listing` WHERE `status`=0 AND `id`='".$id."'") or die(mysql_error());
while($info = mysql_fetch_array( $data ))

 {

echo '<div itemscope itemtype="http://schema.org/Organization" class="page-header">
  <h1 itemprop="name">'.$info['title'].'<small> (Boat ID : '.$info['id'];
  echo')</small></h1></div>';
  echo'<div class="row">';
  echo '<div class="col-md-8">
  <ul class="list-group">
  <li class="list-group-item">

  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';

	if($info['photo2']){
		 echo '<li data-target="#carousel-example-generic" data-slide-to="1"></li>';
	}
	if($info['photo3']){
		echo '<li data-target="#carousel-example-generic" data-slide-to="2"></li>';
	}
    echo '
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <center><img width="100%" src="upload/uploads/'.$info['photo1'].'"></center>
    </div>';

	if($info['photo2']){
		 echo '<div class="item">
      <center><img width="100%"  src="upload/uploads/'.$info['photo2'].'"></center>
    </div>';
	}
	if($info['photo3']){
		echo '<div class="item">
      <center><img width="100%"  src="upload/uploads/'.$info['photo3'].'"></center>
    </div>';
	}

  echo '</div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
  </li>';
  /*if($info['price']!=0)
	{echo $info['price'];}
	else
	{echo 'Not Available';}
  echo' / day, &#8377; ';
  if($info['price2']!=0)
	{echo $info['price2'];}
	else
	{echo 'Not Available';}
  echo ' / day+night</h3>';*/
  echo '<li class="list-group-item"><p class="pull-right"><b>Views : '.$info['views'].'</b></p><h4>';

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

  echo ' at ';

  if($info['location']==1) {
	  echo '<a itemprop="addressRegion" target="_blank"  href="https://www.google.co.in/maps/place/Alappuzha,+Kerala/@9.4989551,76.3405891,12z/data=!3m1!4b1!4m2!3m1!1s0x3b0884f1aa296b61:0xb84764552c41f85a"> Alappuzha ( Alleppey )</a>';
  } else if($info['location']==2) {
	  echo '<a itemprop="addressRegion" target="_blank"  href="https://www.google.co.in/maps/place/Kollam,+Kerala/@8.8912018,76.6010506,14z/data=!3m1!4b1!4m2!3m1!1s0x3b05fc5bdda9c621:0x8bf03195267372f7"> Kollam</a>';
  } else if($info['location']==3) {
	  echo '<a itemprop="addressRegion" target="_blank"  href="https://www.google.co.in/maps/place/Kochi,+Kerala/@9.9273366,76.2668541,13z/data=!3m1!4b1!4m2!3m1!1s0x3b080d514abec6bf:0xbd582caa5844192"> Cochin ( Kochi )</a>';
  } else if($info['location']==4) {
	  echo '<a itemprop="addressRegion" target="_blank"  href="https://goo.gl/maps/SLziR"> Kumarakom</a>';
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
</div>';

echo '
   <div class="container">
	<div class="row" style="margin-top:5px;">
		<div class="col-md-8">
    	<div class="well well-sm">
            <div class="text-right">
                <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
            </div>

            <div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12">
				<h4>Note. Fullname, email, comment and rating is mandatory!</h4><br/>
                    <form accept-charset="UTF-8" action="addReview.php" method="post">
						<input name="listingID" value="'.$id.'" hidden="">
						<input class="form-control" placeholder="Enter your Name" name="fullname" type="text"><br/>
						<input class="form-control" placeholder="Enter e-mail" name="email" type="email"><br/>
                        <input id="ratings-hidden" name="rating" type="hidden">
                        <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>

                        <div class="text-right">
                            <div class="stars starrr" data-rating="0"></div>
                            <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                            <button class="btn btn-success btn-lg" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

		</div>
	</div>
</div>

</div>';

echo '<div class="col-md-4">';

echo '<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Contact Host</h3>
  </div>
  <div class="panel-body">
  <center><small>Dont forget to mention that you found this ad on <b>FindmyBoat!</b></small></center>';
$data_u = mysql_query("SELECT * FROM `users` WHERE `status`=0 AND `id`='".$info['userid']."'") or die(mysql_error());
while($info_u = mysql_fetch_array( $data_u )){
  echo'<li class="list-group-item"><h4><span class="glyphicon glyphicon-user"></span> '.$info_u['fullname'].'</h4></li>';
  echo'<li class="list-group-item"><h4 itemprop="telephone"><span class="glyphicon glyphicon-phone"></span> '.$info_u['phone'].'</h4></li>';
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

			<center>
			<div class="g-recaptcha" data-sitekey="6LfIGP8SAAAAABzq9Aa67tGZSN0bpewGjWz35tef"></div>
			</center>
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button id="add" name="add" type="submit" class="btn btn-success btn-block pull-right">Send</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div></div>
	</div>
  ';

	$data_c5= mysql_query("SELECT count(*) c FROM `reviews` WHERE `rating`=5 AND `listingID`='".$id."'") or die(mysql_error());
	$row = mysql_fetch_row($data_c5);
	$c_5=$row[0];

	$data_c5= mysql_query("SELECT count(*) c FROM `reviews` WHERE `rating`=4 AND `listingID`='".$id."'") or die(mysql_error());
	$row = mysql_fetch_row($data_c5);
	$c_4=$row[0];

	$data_c5= mysql_query("SELECT count(*) c FROM `reviews` WHERE `rating`=3 AND `listingID`='".$id."'") or die(mysql_error());
	$row = mysql_fetch_row($data_c5);
	$c_3=$row[0];

	$data_c5= mysql_query("SELECT count(*) c FROM `reviews` WHERE `rating`=2 AND `listingID`='".$id."'") or die(mysql_error());
	$row = mysql_fetch_row($data_c5);
	$c_2=$row[0];

	$data_c5= mysql_query("SELECT count(*) c FROM `reviews` WHERE `rating`=1 AND `listingID`='".$id."'") or die(mysql_error());
	$row = mysql_fetch_row($data_c5);
	$c_1=$row[0];

	$data_r = mysql_query("SELECT count(*) c, round(AVG(rating),2) r FROM `reviews` WHERE `listingID`='".$id."'") or die(mysql_error());
	while($info_r = mysql_fetch_array( $data_r )){

		$total=$info_r['c'];
		$rating=$info_r['r'];

	echo    '<div class="row">';

	echo'<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Safety Tips for Buyers</h3>
		</div>
		<div class="panel-body">
		<p>Meet seller at a safe location.<p/>
 <p>Check the boat, make your terms clear before payment.</p>
 <p>Pay only after you see the boat. <a href="safe.php">(Read More)</a></p>
		</div>
	</div>';

	echo '<div class="col-xs-24 col-md-12">
							<div class="well well-sm">
									<div class="row">
											<div class="col-xs-12 col-md-6 text-center">
													<h1 class="rating-num">
															';
								if($rating==0) {echo 0;} else echo $rating;
								echo'</h1>
													<div class="rating">';
							$s=0;
							for($i=1;$i<=$info_r['r'];$i++){
								echo '<span><span class="glyphicon glyphicon-star"></span>';
								$s++;
							}
							$l=5-$s;
							while($l){
								echo '<span><span class="glyphicon glyphicon-star-empty"></span>'; $l--;
							}
													echo'</div>
													<div>
															<span class="glyphicon glyphicon-user"></span>'.$info_r['c'].' votes
													</div>
											</div>
											<div class="col-xs-12 col-md-6">
													<div class="row rating-desc">
															<div class="col-xs-3 col-md-3 text-right">
																	<span class="glyphicon glyphicon-star"></span>5
															</div>
															<div class="col-xs-8 col-md-9">
																	<div class="progress progress-striped">
																			<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
																					aria-valuemin="0" aria-valuemax="100" style="width: ';
											if($c_5>0) {echo round((($c_5/$total)*100));} else echo 0;
											echo'%">
																					<span class="sr-only">';
											if($c_5>0) {echo round((($c_5/$total)*100));} else echo 0;
											echo'%</span>
																			</div>
																	</div>
															</div>
															<!-- end 5 -->
															<div class="col-xs-3 col-md-3 text-right">
																	<span class="glyphicon glyphicon-star"></span>4
															</div>
															<div class="col-xs-8 col-md-9">
																	<div class="progress">
																			<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
																					aria-valuemin="0" aria-valuemax="100" style="width: ';
											if($c_4>0) {echo round((($c_4/$total)*100));} else echo 0;
											echo'%">
																					<span class="sr-only">';
											if($c_4>0) {echo round((($c_4/$total)*100));} else echo 0;
											echo'%</span>
																			</div>
																	</div>
															</div>
															<!-- end 4 -->
															<div class="col-xs-3 col-md-3 text-right">
																	<span class="glyphicon glyphicon-star"></span>3
															</div>
															<div class="col-xs-8 col-md-9">
																	<div class="progress">
																			<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
																					aria-valuemin="0" aria-valuemax="100" style="width: ';
											if($c_3>0) {echo round((($c_3/$total)*100));} else echo 0;
											echo'%">
																					<span class="sr-only">';
											if($c_3>0) {echo round((($c_3/$total)*100));} else echo 0;
											echo'%</span>
																			</div>
																	</div>
															</div>
															<!-- end 3 -->
															<div class="col-xs-3 col-md-3 text-right">
																	<span class="glyphicon glyphicon-star"></span>2
															</div>
															<div class="col-xs-8 col-md-9">
																	<div class="progress">
																			<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
																					aria-valuemin="0" aria-valuemax="100" style="width: ';
											if($c_2>0) {echo round((($c_2/$total)*100));} else echo 0;
											echo'%">
																					<span class="sr-only">';
											if($c_2>0) {echo round((($c_2/$total)*100));} else echo 0;
											echo'%</span>
																			</div>
																	</div>
															</div>
															<!-- end 2 -->
															<div class="col-xs-3 col-md-3 text-right">
																	<span class="glyphicon glyphicon-star"></span>1
															</div>
															<div class="col-xs-8 col-md-9">
																	<div class="progress">
																			<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
																					aria-valuemin="0" aria-valuemax="100" style="width: ';
											if($c_1>0) {echo round((($c_1/$total)*100));} else echo 0;
											echo'%">
																					<span class="sr-only">';
											if($c_1>0) {echo round((($c_1/$total)*100));} else echo 0;
											echo'%</span>
																			</div>
																	</div>
															</div>
															<!-- end 1 -->
													</div>
													<!-- end row -->
											</div>
									</div>
							</div>
					</div>
			</div>';

	}

}
 echo'
<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title">FindmyBoat Tools</h3>
  </div>
  <div class="panel-body">';
    echo '<a class="btn btn-block btn-primary" onClick="window.print();">Print this Page</a><a class="btn btn-block btn-primary" href="mailto:?subject=Check out this Houseboat I found at FindmyBoat!&body=Have a look at this awesome houseboat I found: '.'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'">E-mail this Page</a><hr><a class="btn btn-block btn-danger" href="mailto:arjun@techulus.com">Report Listing</a>
  </div>
</div>';

//include_once 'ad_big.php';

echo"</div></div>";

 }

?>
</div>
<!-- /Main -->

<?php include_once 'footer.php';?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>
    <script src="js/bootstrap.min.js"></script>

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
<script>
(function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

$(function(){

  $('#new-review').autosize({append: "\n"});

  var reviewBox = $('#post-review-box');
  var newReview = $('#new-review');
  var openReviewBtn = $('#open-review-box');
  var closeReviewBtn = $('#close-review-box');
  var ratingsField = $('#ratings-hidden');

  openReviewBtn.click(function(e)
  {
    reviewBox.slideDown(400, function()
      {
        $('#new-review').trigger('autosize.resize');
        newReview.focus();
      });
    openReviewBtn.fadeOut(100);
    closeReviewBtn.show();
  });

  closeReviewBtn.click(function(e)
  {
    e.preventDefault();
    reviewBox.slideUp(300, function()
      {
        newReview.focus();
        openReviewBtn.fadeIn(200);
      });
    closeReviewBtn.hide();

  });

  $('.starrr').on('starrr:change', function(e, value){
    ratingsField.val(value);
  });
});
</script>

	</body>
</html>
