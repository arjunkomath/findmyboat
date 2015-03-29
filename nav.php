<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<style>
h1, h2, h3, h4, h5, h6 {
   font-family: 'Ubuntu', sans-serif; font-weight: 400; 
}

#login-nav input { margin-bottom: 15px; }
</style>
<style>
.navbar-login
{
    width: 205px;
    padding: 10px;
    padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}
</style>
<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="find.php"><img src="logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      
        <li ><a href="find.php"><span class="glyphicon glyphicon-thumbs-up"></span> <strong>Find</strong></a></li>
        <li><a href="search.php"><span class="glyphicon glyphicon-search"></span> Search</a></li>
        
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Help? <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a target="_blank" href="support.php">Online Support</a></li>
            <li><a target="_blank" href="https://twitter.com/findmyboat">Twitter Support</a></li>
            <li><a target="_blank" href="https://findmyboat.freshdesk.com/support/solutions/folders/5000006466">Get Started</a></li>
            <li><a target="_blank" href="https://findmyboat.freshdesk.com/support/solutions/folders/5000006465">FAQ</a></li>
            <li class="divider"></li>
            <li><a target="_blank" href="https://vimeo.com/102039288">What is FindmyBoat?</a></li>
            <li class="divider"></li>
            <li><a href="http://findmyboat.in/contact.php">Contact Us</a></li>
          </ul>
        </li>
        <a href="list.php" style="float:right;" class="btn btn-default navbar-btn"><span class="glyphicon glyphicon-plus"></span> List your houseboat</a>
       </ul>
       <ul class="nav navbar-nav navbar-right">
        
                  <?php
				  if(!isset($_SESSION['uid'])) {  
                  echo '
				  <li><a href="register.php">Sign Up</a></li>
				  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
                     <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form" role="form" method="post" action="loginProcess.php" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                       <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" name="email" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputPassword2">Password</label>
                                       <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="password" required>
                                    </div>
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox"> Remember me
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-success btn-block">Sign in</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                           <input class="btn btn-primary btn-block" data-toggle="modal" data-target="#login" type="button" value="Forgot Password?">
                        </li>
                     </ul>
                  </li>'; 
				  }
				  else {
					  
	include 'config.php';
	$find = mysql_query("SELECT `fullname`,`email` FROM `users` WHERE `email` = '".$_SESSION['uid']."'");
	
	while($row = mysql_fetch_array($find)) 

 { 	echo'
 <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> <b>Manage Listings</b><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="list.php">Create New Listing</a></li>
            <li><a href="viewListings.php">View / Edit Listings</a></li>
            <li class="divider"></li>
            <li><a href="guidelines.php">Listing Guidelines</a></li>
            <li class="divider"></li>
            <li><a target="_blank" href="support.php">Help?</a></li>
          </ul>
        </li>
		
 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong>Dashboard</strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                   
                                        <p class="text-left"><strong>'.$row['fullname'].'</strong></p>
                                        <p class="text-left small">'.$row['email'].'</p>
                                        <p class="text-left">
                                            <a href="dashboard.php" class="btn btn-primary btn-block btn-sm">Dashboard</a>
												 <a href="passwordChange.php" class="btn btn-primary btn-block btn-sm">Change Password</a>
                                        </p>

                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>';

			} 
		}
					  ?>
               </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53c9513e3becf5ce"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-4655726-4', 'auto');
  ga('send', 'pageview');

</script>