<?php
session_start();
include("dbconnection.php");

/*if(isset($_SESSION['userId']))
{

}else
{
   header("location:index.php");
}*/
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
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
<link type="text/css" rel="stylesheet" href="css/styleext.css" />
<link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="css/df.css" rel="stylesheet" type="text/css" />
    
<script>
    function displayTopic()
    {
		//alert('a');
       document.getElementById('top_id').style.display="block";
    }
</script>
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
<div class="row momrow">
<img src="images/BADAL1.png" class="momcloud"/></section>
</div>
</div>
<section class="momgradient">
<div class="container">
<div class="row">
<div class="col-md-12" style="border:#000 px solid;">

 <div style="float:right;"> 
<a class="btn btn-sm btn-info btn-flat pull-left" onclick="displayTopic();" style=""><span style="color:#FFF; font-size:1.3em;">Add New Topic</span></a>
</div>
     
    
  
    <?php
    $topicresult=getAllTopics();
    if($topicresult>0)
    {
        while($topics=mysql_fetch_array($topicresult))
        {
    ?> 
   
        <div>
            <div>

<a href="view_topic_detail.php?topic_id=<?php echo $topics['topic_id']; ?>"> 
<h1 style="color:#FF0; padding:0; font-size:3em; border:#000 px solid; width:50%; font-family:myfont; font-style:italic; letter-spacing:2px;">
  	ALPHABET FUN
   <?php //echo $topics['topic_name']; ?>
   </h1>
   </a>  
                  
          <div align="right" style="color:#fff; font-size:1.3em;">
         <?php echo date("d-m-y",  strtotime($topics['createdAt'])); ?>
         </div>
         
            <p style="color:#fff; border:#000 px solid; width:75%; font-size:1.3em; margin:0; padding:0;">
			<?php echo $topics['topic_description']?>
            </p>
                
            </div>
        </div>   
      
        
<?php
        }
    }
?>
     
    
  <div id="top_id" style="display: none;">
        <div class="col-md-6">
              <!-- general form elements -->
              <div class="">
                <h3 style="color:#FF0; border:#000 px solid; width:60%; font-family:myfont; font-style:italic; letter-spacing:2px;">ADD NEW TOPIC</h3>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="doaadtopic.php">
                  <div class="form-group">
                      <label for="exampleInputEmail1"><span style="color:#FFF; border:#000 px solid;">Topic name</span></label>
                      <input type="text" name="topic_name" placeholder="Enter email" id="exampleInputEmail1" class="form-control">
                   </div>
                    <br/>
                  <div class="form-group">
                      <label><span style="color:#FFF; border:#000 px solid;">DescriptionM</span></label>
                      <textarea class="form-control" rows="3" placeholder="Enter ..." name="topic_description"></textarea>
                    </div>  
                    <!-- /.box-body -->

                  <div class="" style="background:none; border:#000 px solid;">
                      <input class="btn btn-success" type="submit" name="submit" value="Submit">
                  </div>
                </form>
              </div><!-- /.box -->

              <!-- Form Element sizes -->
              <!-- /.box -->

              <!-- /.box -->

              <!-- Input addon -->
              <!-- /.box -->

            </div>
    </div>  

















    </div>
</div>
  </section>  
<section>
<!--<div class="container-fluid">
<div class="row momrow">
<img src="images/BADAL11.png" class="momcloud"/></section>
</div>
</div>
--><section>  
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
