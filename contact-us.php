<?php
session_start();
include("dbconnection.php");
?>
<!doctype html>
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="contact us, contact information, the fun kids" name="keywords"  />
<meta content="Contact Information about TheFunKids" name="description"/>
<title>Contact Us- The Fun Kids</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/styletwo.css"/> 
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/styletwo.css"/>
<style>
       .error {
       color: #FF0000;
    font-size: 11px;
    font-weight: normal;
    padding-left: 29px;
       }
       
       .error1 {
       color: #FF0000;
    font-size: 14px;
    font-weight: bold;
    padding-left: 29px;
       }
        </style>

 

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
<div class="container">
    
  
</div>
</div>
</section>


<section class="second">
<div class="container">
<div class="row">
<!--<div class="col-md-12 for"><a href=""><img src="images/postbtn.png" alt="" class="postdetailimg"/></a></div>-->
<!--<div class="col-md-12 forums">

<table class="table-responsive table-condensed" style="width:100%;">
  <tr>
  	<td class="" style="background:; width:65%;"><span class="">Yesterday 12:09 Therad Started </span></td>
    <td class="text-center" style="background:#dadada; width:35%;"><span class="tableform">POST</span></td>
  </tr>
</table>
</div>-->

<div class="col-md-12 postdtl123">

<div class="col-md-12 postdtl3">
<h3 class="posth456" style="">CONTACT-US</h3>
</div>


<div class="col-md-12 postdt">
<!--<h3><strong>THE QUICK BROWN FOX JUMPS</strong></h3>-->
<!--<pre style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;">You are not logged in or you do not have permissionto access this page. This could be due to one of srveral reasons:

-You are not logged in. Fill in this form at the bottom of this page and try again.
-You may not have sufficient privileges to access this page.Are you trying to edit someone else's post, access administrative features or some other privileged system?
-You are trying to post, the administrator may have disabled your account, or it may be awaiting activation. </pre>-->
</div>

<div class="col-md-8" style="background:#f4f4f4; margin-top:30px; padding:20px 0;">
    <?php
                if (isset($_REQUEST['thanks'])) {
                    ?>    
                    <p class="" align="center">Thank you for contacting us. Our team will get back to you very soon.</p>
                    <?php
                }
                ?>              
                   
    <form method="post" action="docontactus.php" name="loginForm" id="loginForm">
<label>&nbsp;&nbsp;Name</label>

<input type="text" name="name" class="form-control" placeholder="Type your name"/>
<br>
<label>&nbsp;&nbsp;Email</label>
<input type="text" name="email" class="form-control" placeholder="Type your email"/>
<br>
<textarea class="form-control" rows="10" cols="50" placeholder="Type your text" name="message"></textarea>
<br>
<input type="submit" name="submit" value="SUBMIT" class="btn btn-sm" style="background:#23a4ff; font-family:myfont; font-style:italic; font-size:1.5em; letter-spacing:2px; color:#FFF; padding:0 10px;"/>


<!--<a href="signup-mother-baby-forum.php" class="btn btn-xs" style="background:#f7b700; font-family:myfont; font-style:italic; font-size:1.5em; letter-spacing:2px; color:#FFF;
padding:0 10px;" >
   SIGN-UP
</a>-->

</form>
</div>



<div class="col-md-4"  style="padding-bottom:20px;">

</div>

<div class="col-md-4 fbad"  style="border:#000 px solid;">
<!--<img src="images/fbadd.png" alt="" class=""/>-->
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
</section>
<section>



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