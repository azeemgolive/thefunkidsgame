<?php
if(isset($_REQUEST['email']))
{
    include("dbconnection.php");
$email=$_REQUEST['email'];
$passkey=$_REQUEST['passkey'];
$result=getUserByEmail($email);
$user=mysql_fetch_array($result);
}else
{
    header("location:index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>The Fun Kids Reset Password</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/styletwo.css"/> 
<link rel="stylesheet" href="css/style.css"/>
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
<h3 class="posth456" style="">THE FUNKIDS RESET PASSWORD</h3>
</div>
<div class="col-md-4" style="background:#f4f4f4; margin-top:30px; padding:20px 0;">
     <?php
                if (isset($_REQUEST['msg'])) {
                    ?>    
                    <p class="text-danger" align="center">Email address not exists</p>
                    <?php
                }
                ?>
                <?php
                if (isset($_REQUEST['success'])) {
                    ?>    
                    <p class="success" align="center">Your Password Link has been Email to your register email please check your email</p>
                    <?php
                }
                ?>
                <?php
                if (isset($_REQUEST['reset'])) {
                    ?>    
                    <p class="success" align="center">Your Password has been changed Please Login with Your New Password</p>
                    <?php
                }
                ?>
<h4 class="text-danger">  Insert Your New Password Here ...</h4>
<form method="post" action="reset-mom-baby-password.php" id="forgotPassword" name="forgotPassword">
                                    <input type="hidden" name="userId" value="<?php echo $user['user_id']; ?>" />
                                <input type="hidden" name="email" value="<?php echo $user['email']; ?>" />
                                <input type="hidden" name="passkey" value="<?php echo $passkey; ?>" />
<label>New Password</label>

<input type="password" name="password" id="password" class="form-control"/>
<br>
<label>Confirm Password</label>

<input type="password" name="confirm_password" id="confirm_password" class="form-control"/>


<br>
<input type="submit" name="submit" value="SUBMIT" class="btn btn-sm" style="background:#23a4ff; font-family:myfont; font-style:italic; font-size:1.5em; letter-spacing:2px; color:#FFF; padding:0 10px;">


</form>
</div>



<div class="col-md-4"  style="padding-bottom:20px;">
<h3 class="text-center" style="color:#2b8ee3; font-family:myfont; font-style:italic; letter-spacing:1px; ">CONNECT WITH SOCIAL MEDIA</h3>
<a href="fbconfig.php"><img src="images/fb_03.png" alt="" class="img-responsive"/></a>

</div>

<div class="col-md-4 fbad"  style="border:#000 px solid;">
<a href="kid-stories"><img src="images/right-page.jpg" alt="" class="img-responsive"/></a>
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