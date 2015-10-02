<?php
session_start();
include("dbconnection.php");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="robots" content="noindex">
<title>The FUN KIDS</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/styletwo.css"/>
<link rel="stylesheet" href="css/style.css"/>

<link href="owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="owl-carousel/owl.theme.css" rel="stylesheet">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
<link type="text/css" rel="stylesheet" href="css/styleext.css" />
<style>

.row1 img {
    padding: 0 0px;
}
</style>


</head>
<body>
<header>
<div class="container first">
<div class="row row1">
<div class="col-md-12 border1">
<?php include("includes/header.php"); ?>
</div>
<!--</div>--><!--/*col-md-12 first*/-->
</div><!--/*row first*/-->
</div><!--container-fluid first-->

</header>
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
<h3 class="posth456" style="">THE FUNKIDS FORGOT PASSWORD</h3>
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
                    <p class="success" align="center">Check your email-we sent an email for you reset your password</p>
                    <?php
                }
                ?>
<form method="post" action="forgotpassword.php" id="forgotPassword" name="forgotPassword">
<h4 class="text-danger"> Insert Your Email Here ...</h4>
<input type="text" name="email" class="form-control"/>
<br>

<input type="submit" name="submit" value="SUBMIT" class="btn btn-sm" style="background:#23a4ff; font-family:myfont; font-style:italic; font-size:1.5em; letter-spacing:2px; color:#FFF; padding:0 10px;float:left;">

<a href="login-kid-mom-forum" style="float:right;"><span>Suddenly Remember?Login Here</span></a>

</form>
</div>



<div class="col-md-4">
<h3 class="text-center" style="color:#2b8ee3; font-family:myfont; font-style:italic; ">CONNECT WITH SOCIAL MEDIA</h3>
<img src="images/fb_03.png" alt="" class="img-responsive"/>
</div>

<div class="col-md-4 fbad"  style="border:#000 px solid;margin-top:60px;">
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



<footer>

<!--<script src="js/jquery-1.11.3.min.js"></script>-->
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<script type="text/javascript">
	$("#modal_trigger").leanModal({top : 0, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
		// Calling Login Form
		$("#login_form").click(function(){
			$(".social_login").hide();
			$(".user_login").show();
			return false;
		});

		// Calling Register Form
		$("#register_form").click(function(){
			$(".social_login").hide();
			$(".user_register").show();
			$(".header_title").text('Register');
			return false;
		});

		// Going back to Social Forms
		$(".back_btn").click(function(){
			$(".user_login").hide();
			$(".user_register").hide();
			$(".social_login").show();
			$(".header_title").text('Login');
			return false;
		});

	})
</script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>	       
                <script type="text/javascript">
            $().ready(function() {
                $("#forgotPassword").validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                    },
                    messages: {
                        email: {
                            required: "Please enter email address",     
                            email: "Email address must be in the format of name@domain.com"
                        },
                    }
                });
                $("#password").focus(function() {
                    var email = $("#email").val();
                    if(email && !this.value) {
                        this.value =email;
                    }
                });
            });
        </script>
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
<!--<script src="owl-carousel/jquery-1.9.1.min.js"></script> -->
<script src="owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="js/jssor.js"></script>
<script type="text/javascript" src="js/jssor.slider.js"></script>
    <script>

        jssor_slider1_starter = function (containerId) {

            var _SlideshowTransitions = [
            //Fade
            { $Duration: 1200, $Opacity: 2 }
            ];

            var options = {
                $AutoPlay: true,                             
                $AutoPlaySteps: 1,                                
                $AutoPlayInterval: 3000,                           
                $PauseOnHover: 1,                              

                $ArrowKeyNavigation: true,   			           
                $SlideDuration: 500,                                
                $MinDragOffsetToSlide: 20,                        
      
                $SlideSpacing: 0, 					               
                $DisplayPieces: 1,                                 
                $ParkingPosition: 0,                                
                $UISearchMode: 1,                                  
                $PlayOrientation: 1,                                
                $DragOrientation: 3,                                

                $SlideshowOptions: {                               
                    $Class: $JssorSlideshowRunner$,                 
                    $Transitions: _SlideshowTransitions,           
                    $TransitionsOrder: 1,                           
                    $ShowLink: true                                    
                },

                $BulletNavigatorOptions: {                               
                    $Class: $JssorBulletNavigator$,                     
                    $ChanceToShow: 2,                              
                    $AutoCenter: 1,                                 
                    $Steps: 1,                                    
                    $Lanes: 1,                                     
                    $SpacingX: 10,
					$SpacingY: 10,                                   
                    $Orientation: 1                                
                },

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              
                    $ChanceToShow: 2,                               
                    $Steps: 1                                       
                }
            };
            var jssor_slider1 = new $JssorSlider$(containerId, options);

   
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$ScaleWidth(Math.min(parentWidth, 600));
                else
                    $Jssor$.$Delay(ScaleSlider, 30);
            }

            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);

            $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>
        <script>
            jssor_slider1_starter('slider1_container');
        </script>

    <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 2000,
        items : 2,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });

    });
	
	   
    </script>
 
 
 	 
    
</footer>


</body>
</html>