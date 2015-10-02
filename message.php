<?php
session_start();
include("dbconnection.php");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>The FUN KIDS</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link href="owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="owl-carousel/owl.theme.css" rel="stylesheet">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
<link type="text/css" rel="stylesheet" href="css/styleext.css" />
<link rel="stylesheet" href="css/styletwo.css"/>
</head>
<body>
<?php 
include_once("analyticstracking.php");
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=481352955356475";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>    
<?php 
include("includes/header.php");
?>

<section>
<div class="container-fluid">
<div class="row row2">
<img src="images/BADAL1.png" alt="" class="badal"/>
</div>
</div>
</section>
<section class="second">

</div>
</section>


<section class="second">
<div class="container">
<div class="row">


<div class="col-md-12 msgpostdtl">

<div class="col-md-12 postdtl3">
<h3 class="posth456" style="">MESSAGE</h3>
</div>


<div class="col-md-12 postdt">
<h3 style="font-family:myfont; font-style:italic; color:#2b8ee3; padding:0; margin:0; font-size:3em;">Welcome to The Fun Kids Portal</h3>
</div>

<div class="col-md-12" style="background:#f4f4f4;">

<p style="font-size:1.1em; font-weight:bold;">Thank you for registering. Please check your inbox for activation.</p>
<p></p>
</div>




</div>

</div>
</div>
</section>

<section class="latestgames">

<div class="container-fluid">
<div class="row">
<img src="images/BADAL11.png" alt="" class="footercloud"/>
</div>
</div>
</section>
<?php
include("includes/footer.php");
?>






</body>
</html>