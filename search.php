<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>findmyboat.in | Search Houseboats Online</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
body{
font-family:Arial, Helvetica, sans-serif;

}
*{margin:0;padding:0;}
a
{
color:#DF3D82;
text-decoration:none

}
a:hover
{
color:#DF3D82;
text-decoration:underline;

}
b
{


}
	ol.update
	{list-style:none;font-size:1.1em; margin-top:20px }
	ol.update li{ height:70px; border-bottom:#dedede dashed 1px; text-align:left;}
	ol.update li:first-child{ border-top:#dedede dashed 1px; height:70px; text-align:left}
	#flash
	{
	margin-top:20px;
	text-align:left;
	
	}
	#searchword
	{
	text-align:left; margin-top:20px; display:none;
	font-family:Arial, Helvetica, sans-serif;
	font-size:16px;
	color:#000;
	}
	.searchword
	{
	font-weight:bold;
	color:#000000;
	
	}
	#search_box
	{
	padding:4px; border:solid 1px #666666; width:300px; height:30px; font-size:18px;-moz-border-radius: 6px;-webkit-border-radius: 6px;
	}
	.search_button
	{
	background:url(http://static.twitter.com/images/bg-btn-signup.png); border:#000000 solid 1px; padding-left:9px;padding-right:9px;padding-top:9px;padding-bottom:9px; color:#000; font-weight:bold; font-size:16px;-moz-border-radius: 6px;-webkit-border-radius: 6px;
	}
</style>
     <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">

$(function() {
//-------------- Update Button-----------------


$(".search_button").click(function() {
    var search_word = $("#search_box").val();
    var dataString = 'search_word='+ search_word;
	
	if(search_word=='')
	{
	}
	else
	{
	$.ajax({
	type: "GET",
    url: "searchdata.php",
    data: dataString,
    cache: false,
    beforeSend: function(html) {
   
	document.getElementById("insert_search").innerHTML = ''; 
	$("#flash").show();
	$("#searchword").show();
	 $(".searchword").html(search_word);
	$("#flash").html('<img src="img/ajax-loader.gif" align="absmiddle">&nbsp;Loading Results...');
	
	
               
            },
  success: function(html){
   $("#insert_search").show();
  
   $("#insert_search").append(html);
   $("#flash").hide();
	
  }
});
		
	}
		

    return false;
	});
//---------------- Delete Button----------------


});
</script>
  </head>
  <body>
  	<link rel="stylesheet" href="css/bootstrap.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <?php include_once 'nav.php'; ?>

<div align="center">
<div style="width:600px">
<div style="margin-top:20px; text-align:left">
<form method="get" action="">
			  <input type="text" name="search" id="search_box" class='search_box'/>
			  <input type="submit" value="Search" class="search_button" /><br />
			  <span style="color:#666666; font-size:14px; font-family:Arial, Helvetica, sans-serif;"><b>Enter any ID or Title or Location to search..</span>
			  
			  
			  </form>
		</div>	  
			  <div>
			  <div id="searchword">Search results for <span class="searchword"></span></div>
			  <div id="flash"></div>
			  <ol id="insert_search" class="update">
			  </ol>
			  
			  </div>
			  </div>
			  </div>
</div>
<?php include_once 'footer.php';?>
   </body>
</html>