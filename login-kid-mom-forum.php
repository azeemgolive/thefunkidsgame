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
        .success {
       color: green;
    font-size: 12px;
    font-weight: normal;
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
<h3 class="posth456" style="">FUNKIDS LOGIN MESSAGE</h3>
</div>


<div class="col-md-12 postdt">
<!--<h3><strong>THE QUICK BROWN FOX JUMPS</strong></h3>-->

</div>

<div class="col-md-4" style="background:#f4f4f4; margin-top:30px; padding:20px 0;">
    <?php
                if (isset($_REQUEST['msg'])) {
                    ?>    
                    <p class="error1" align="center">Invalid user name or password</p>
                    <?php
                }
                ?>
                    <?php
                if (isset($_REQUEST['reset'])) {
                    ?>    
                    <p class="success" align="center">Your Password has been changed Please Login with Your New Password</p>
                    <?php
                }
                if (isset($_REQUEST['login'])) {
                    ?>
                    <p class="">You are not logged in or you do not have permission to access this page. This could be due to one of several reasons:
                        </br> 1. You are not logged in. Fill in the form at the bottom of this page and try again.
    </br> 2.You may not have sufficient privileges to access this page. Are you trying to edit someone else's post, access administrative features or some other privileged system?
    </br> 3. If you are trying to post, the administrator may have disabled your account, or it may be awaiting activation.
 </p>
                    <?php
                }
                ?> 
                    
<form method="post" action="dologin.php" name="loginForm" id="loginForm">
<label>Email/User name</label>
<input type="text" name="email" id="email" class="form-control"/>
<br>
<label>Password</label><span><a style="float:right;" href="forgot-password-mom-baby" rel="forgot_password" class="forgot linkform">Forgot your password?</a></span>
<input type="password" name="password" id="password" class="form-control"/>
<br>
<input type="submit" name="submit" value="LOGIN" class="btn btn-sm" style="background:#23a4ff; font-family:myfont; font-style:italic; font-size:1.5em; letter-spacing:2px; color:#FFF; padding:0 10px;"/>


<a href="signup-mother-baby-forum" class="btn btn-xs" style="background:#f7b700; font-family:myfont; font-style:italic; font-size:1.5em; letter-spacing:2px; color:#FFF;
padding:0 10px;" >
   SIGN-UP
</a>

</form>
</div>



<div class="col-md-4"  style="padding-bottom:20px;">
<h3 class="text-center" style="color:#2b8ee3; font-family:myfont; font-style:italic; ">CONNECT WITH SOCIAL MEDIA</h3>
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
<script src="js/jquery.validate.js" type="text/javascript"></script>	
       
                <script type="text/javascript">
            $().ready(function() {
                $("#loginForm").validate({
                    rules: {
                        email: {
                            required: true   
                        },
                        password: {
                            required: true
                        }
                    },
                    messages: {
                        email: {
                            required: "Please enter email address or user name"   
                        },
                        password: {
                            required: "Please enter a password"
                        }
                    }
                });
                $("#password").focus(function() {
                    var password = $("#password").val();
                    var email = $("#email").val();
                    if(password && email && !this.value) {
                        this.value = password + "." + email;
                    }
                });
            });
        </script>
<?php
include("includes/footer.php");
?>



