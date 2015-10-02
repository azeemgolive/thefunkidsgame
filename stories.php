<?php
session_start();
include("dbconnection.php");
?>
<!doctype html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>

<title>The FUN KIDS</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link href="owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="owl-carousel/owl.theme.css" rel="stylesheet">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
<link type="text/css" rel="stylesheet" href="css/styleext.css" />
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
<img src="images/greencloud.png" alt="" class="badal"/>
</div>
</div>
</section>
<section class="secondgreen">
<div class="container">
    
<div class="row">

<div class="col-md-10 div2">
<img src="images/coming-soon_GREEN.png" alt="" class="img-responsive"/>
</div>

<div class="col-md-2 storyad">
<?php
include("gadds.php");
?>
</div>	

<div class="col-md-8 inters">

<a href=""><img src="images/BUTTON.png" alt="" class="img-responsive"/></a>

</div>
</div>  
</div>
</div>
</section>
<section class="secondgreen">
<div class="container cloudline">
<div class="row">
<div class="container">
<?php
include("newgames.php");
?>
<div class="col-md-1 div5">
<img src="images/baar.png" alt="" class="baar"/>
</div>
<?php
include("newrhymes.php");
?>

</div>
</div>
</div>
</section>
<section class="latestgames">

<div class="container-fluid">
<div class="row">
<img src="images/greencloud1.png" alt="" class="footercloud"/>
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