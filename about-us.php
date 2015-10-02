<?php
session_start();
include("dbconnection.php");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta content="about us, the fun kids" name="keywords"  />
        <meta content="About Us- The Fun Kids is an interactive, online fun and learning kids platform." name="description"/>
<title>About Us | Welcome to The Fun Kids</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/styletwo.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/bootstrap.css"/>
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
<h3 class="posth456" style="">ABOUT US</h3>
</div>


<div class="col-md-12 postdt">
<!--<h3 style="font-family:myfont; font-style:italic; color:#2b8ee3; padding:0; margin:0; font-size:3em; letter-spacing:1px;">WELCOME TO THE FUNKIDS PORTAL</h3>-->
</div>

<div class="col-md-12" style="background:#f4f4f4;">

<p style="font-size:1.1em; font-weight:bold;">Thank you for visiting ...</p>
<pre style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:1.1em;">Welcome to Fun Kids, we bring exciting rhymes, games, puzzles and stories for your little angels. We believe that learning with fun is important for child mental <br/>development and we strive to bring best products that can help you groom your child in a fun environment. 

Along with Kids section, we have discussion forums and other activities related to Moms and parenting. To make your journey more exciting with us, we come up with monthly contest and sweepstakes, where you can participate and win super mom gifts from us.

We hope your journey with us will be refreshing and full of fun, do login daily to catch any surprise gifts coming your way.

Please note that your data is confidential and will be used only for our promotional activities. We do not share our data with other advertisers and refrain ourselves from any spam activities. 

Please contact us at  <span class="text-info"><strong>"info@thefunkids.com"</strong></span>  if you have any further queries.
Regards & Love</pre>

<div class="col-md-12"><!--<img src="images/horoadd.png" alt="" class="img-responsive"/>-->
<script async
src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- The Fun Kids Top Ad -->
<ins class="adsbygoogle"
      style="display:block"
      data-ad-client="ca-pub-9191971814710539"
      data-ad-slot="5000235203"
      data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({}); </script>
</div>
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