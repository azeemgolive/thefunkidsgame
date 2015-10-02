<?php
session_start();
if(isset($_SESSION['userId']))
{
include("dbconnection.php");
}else
{
   header("location:index.php");
}
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
    <div style="float: right;
    margin-top: 52px;
    padding-right: 124px;">
        <a class="btn btn-sm btn-info btn-flat pull-left" onclick="displayTopic();">  Add New Topic</a>
    </div>  
    <div class="clearthis">&nbsp;</div>
     <div class="clearthis">&nbsp;</div>
      <div class="clearthis">&nbsp;</div>
       <div class="clearthis">&nbsp;</div>
          <div class="clearthis">&nbsp;</div>
<div class="container-fluid">  
    <?php
    $topic_id=$_REQUEST['topic_id'];
    $topicresult=  getTopicById($topic_id);
    if($topicresult>0)
    {
    $topics=mysql_fetch_array($topicresult);   
    ?> 
    <a href="view-topic-detail.php?topic_id=<?php echo $topics['topic_id']; ?>">
        <div>
            <div>
                 <h2><?php echo $topics['topic_name']; ?></h2>  
                  <div align="right">
             <?php echo date("d-m-y",  strtotime($topics['createdAt'])); ?>
         </div>
              <?php
                echo $topics['topic_description']
                ?>
            </div>
        </div>   
      </a>
        
<?php  
    }
?>
</div>
     <div class="clearthis">&nbsp;</div>
     <div class="clearthis">&nbsp;</div>
     <div class="clearthis">&nbsp;</div>  
   <?php
   $topicscomment=  getTopicCommentByTopicId($topic_id);
   if($topicscomment>0)
   {
       while($topicoment=  mysql_fetch_array($topicscomment))
       {
    ?>
     <span style="padding-left: 10px"></span><?php echo $topicoment['comment']; ?><div style="float:right">LIKE | Share</div>
    <br>
    
    <div class="clearfix"></div>
    <?php 
       }
   }
   ?>
     
     
          
          
          
          
          
          <div class="clearthis">&nbsp;</div>
          <div class="clearthis">&nbsp;</div>
          <div id="top_id">
        <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add Your Comment</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="doaddtopiccomments.php"> 
                    <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>"/>
                  <div class="form-group">                  
                      <textarea class="form-control" rows="3" placeholder="Enter ..." name="comments"></textarea>
                    </div>  
                    <!-- /.box-body -->

                  <div class="box-footer">
                      <input class="btn btn-primary" type="submit" name="submit" value="Submit">
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
    <div id="modal" class="popupContainer" style="display:none;">
		<section class="popupHeader">
			<span class="header_title">Login</span>
			<span class="modal_close"><i class="fa fa-times"></i></span>
		</section>
		
		<section class="popupBody">
			<!-- Social Login -->
			<div class="social_login">
				<div class="">
					<a href="fbconfig.php" class="social_box fb">
						<span class="icon"><i class="fa fa-facebook"></i></span>
						<span class="icon_title">Connect with Facebook</span>
						
					</a>

					
				</div>

				<div class="centeredText">
					<span>Or Complete Your Profile By Clicking <strong>"SIGN-UP"</strong></span>
				</div>

				<div class="action_btns">
					<div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
					<div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
				</div>
			</div>

			<!-- Username & Password Login form -->
			<div class="user_login">
                            <form method="post" action="dologin.php">
					<label>Email / Username</label>
                                        <input type="text" name="email" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email'];?>" />
					<br />
					<label>Password</label>
                                        <input type="password" name="password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'];?>" />
					<br />
					<div>
						<input type="checkbox" name="rememberme" value="rememberme" <?php if(isset($_COOKIE['email'])) { ?> checked="checked" <?php }?> />
                                                <span><label for="remember">Remember me</label></span>
					</div>
					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
						<div class="one_half last"><input type="submit" name="submit" value="Login" class="btn btn_red"></div>
					</div>
				</form>

				<a href="#" class="forgot_password">Forgot password?</a>
			</div>

			<!-- Register Form -->
			<div class="user_register">
                            <form method="post" action="doregister.php">
					<label>Full Name</label>
                                        <input type="text" name="name" required />
					<br />

					<label>Gender</label>
                                        <input type="radio" name="gender" value="male">Male
                                        <input type="radio" name="gender" value="female">FeMale
					<br />

					<label>Location</label>
                                        <input type="text" name="location" required/>
					<br />
                    
                    <label>Email</label>
                    <input type="text" name="email" required/>
					<br />
                                        
                    <label>Password</label>
                    <input type="password" name="password" required/>
					<br />                    
                    
                    <label>Phone Number</label>
                    <input type="text" name="phone_number" />
					<br />
                    
                    <label>Number Of Kids</label>
                    <input type="text" name="kidsnumber" />
					<br />

					

					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                                                <div class="one_half last"><input type="submit" name="submit" value="Register" class="btn btn_red"></div>
					</div>
				</form>
			</div>
		</section>
	</div>
      <div id="top_id" style="display: none;">
        <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New Topic</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="doaadtopic.php">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Topic name</label>
                      <input type="text" name="topic_name" placeholder="Enter email" id="exampleInputEmail1" class="form-control">
                    </div>
                  </div>
                    
                  <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" rows="3" placeholder="Enter ..." name="topic_description"></textarea>
                    </div>  
                    <!-- /.box-body -->

                  <div class="box-footer">
                      <input class="btn btn-primary" type="submit" name="submit" value="Submit">
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
