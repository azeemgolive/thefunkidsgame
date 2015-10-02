<?php
session_start();
include("dbconnection.php");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>The Fun Kids</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link href="owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="owl-carousel/owl.theme.css" rel="stylesheet">
<!--<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>-->
<link type="text/css" rel="stylesheet" href="css/styleext.css" />
</head>
<body>

<header>
<div class="container first">
<div class="row row1">	
<div class="col-md-12 border1">
<?php
include("includes/header.php");
?>
<!--<a href=""><img src="images/p7.png" alt="" class="login"/></a>-->
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
<div class="row">
    
<?php
$randRhyme=getOneRandomRhymes();
if($randRhyme>0)
{
    while($ranrhyme=  mysql_fetch_array($randRhyme))
    {
?>
    <a href="view-rhyme.php?id=<?php echo $ranrhyme['rhyme_id'] ?>">
<div class="col-md-5 div1">
<!--<h1 class="Rhymes"><span style="color:#FF0;">FEATURED</span> PRODUCT</h1>-->
    <img src="images/bigtv.png" alt="" class="static img-responsive"/>
</div>
        </a>
    <?php
    }
}
    ?>
<div class="col-md-5 woro">
    <h1 class="Rhymes"><span style="color:#FF0;">FEATURED</span> RHYMES</h1>
<?php 
$featuredrhymes=  getAllFeaturedRhymes();
if($featuredrhymes>0)
{
    while($featurerhyme=  mysql_fetch_array($featuredrhymes))
    {
?>
<a href="view-rhyme.php?id=<?php echo $featurerhyme['rhyme_id'] ?>" style="text-decoration:none;">
<div class="rhymesgames" style="">
<img src="rhymes/<?php echo $featurerhyme['rhyme_image']; ?>" alt="<?php echo $featurerhyme['rhyme_name']; ?>" class="img-responsive img-thumbnail"/>
<p class="text-center pararhymesgames"><?php echo strtoupper( $featurerhyme['rhyme_name']); ?></p>
</div>
</a>
<div class="clearfix"></div>
<?php        
    }
}
?>
</div>
<?php
include("gadds.php");
?>

<div class="col-md-8 interss">


<img src="images/BUTTON.png" alt="" class="img-responsive"/>	


</div>
</div>  
</div>
</div>
</section>
<section class="second">
    
<div class="container">
<div class="row hororow">

<div class="col-md-3" style="border:#000 px solid;">
<h1 class="H02"><span class="NEW2">NEW</span>RHYMES</h1>
<img src="images/cloudunderline.png" alt="" class="img"/>
</div>

<div class="col-md-8 horoadd">
<img src="images/horoadd.png" alt="" class="img-responsive"/>
</div>

</div>
<div class="col-md-12 div6 div606">


<div class="clearfix"></div>
<br/>
<?php
$rhymes=  getRhymes();
if($rhymes>0)
{
    while($rhyme=  mysql_fetch_array($rhymes))
    {
 ?>
<a href="view-rhyme.php?id=<?php echo $rhyme['rhyme_id']; ?>">
<div style="width:19%; float:left; border:#000 px solid; margin-left:10px;color: #fff; height:180px;">
<img src="rhymes/<?php echo $rhyme['rhyme_image']; ?>" alt="<?php echo $rhyme['rhyme_name']; ?>" class="img-responsive img-thumbnail"/>
</a>
<a href="view-rhyme.php?id=<?php echo $rhyme['rhyme_id']; ?>">
    <p class="text-center" style="color: #fff; font-family:myfont; font-style:; letter-spacing:px; padding-left:7px; font-size:1em;">
	<?php echo $rhyme['rhyme_name']; ?></p>
</a>
</div>
<?php
    }
}
?>
<div class="clearfix"></div>



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



<footer>
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
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="owl-carousel/jquery-1.9.1.min.js"></script> 
<script src="owl-carousel/owl.carousel.js"></script>
<!--<script type="text/javascript" src="js/jssor.js"></script>
<script type="text/javascript" src="js/jssor.slider.js"></script>-->
  <!--  <script>

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
        </script>-->

    <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 2000,
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });

    });
	
	   
    </script>
 
 
 	<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->
		<script type="text/javascript">
			$(function() {
					
				var $form_wrapper	= $('#form_wrapper'),
					
					$currentForm	= $form_wrapper.children('form.active'),
					//the change form links
					$linkform		= $form_wrapper.find('.linkform');
												
				$form_wrapper.children('form').each(function(i){
					var $theForm	= $(this);

					if(!$theForm.hasClass('active'))
						$theForm.hide();
					$theForm.data({
						width	: $theForm.width(),
						height	: $theForm.height()
					});
				});
				
				setWrapperWidth();
			
				$linkform.bind('click',function(e){
					var $link	= $(this);
					var target	= $link.attr('rel');
					$currentForm.fadeOut(400,function(){
						//remove class active from current form
						$currentForm.removeClass('active');
						//new current form
						$currentForm= $form_wrapper.children('form.'+target);
						//animate the wrapper
						$form_wrapper.stop()
									 .animate({
										width	: $currentForm.data('width') + 'px',
										height	: $currentForm.data('height') + 'px'
									 },500,function(){
										//new form gets class active
										$currentForm.addClass('active');
										//show the new form
										$currentForm.fadeIn(400);
									 });
					});
					e.preventDefault();
				});
				
				function setWrapperWidth(){
					$form_wrapper.css({
						width	: $currentForm.data('width') + 'px',
						height	: $currentForm.data('height') + 'px'
					});
				}
				
				
				$form_wrapper.find('input[type="submit"]')
							 .click(function(e){
								e.preventDefault();
							 });	
			});
        </script>  
    
</footer>


</body>
</html>
