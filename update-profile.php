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
<div class="row">
<div class="col-md-6 height">
    
<?php
$email=$_SESSION['email'];
$loginuser=  getUserByEmail($email);
if($loginuser>0)
{
    $user=  mysql_fetch_array($loginuser);
}
?>
    <?php 
    if($user['userimages']!='')
    {
    ?>
    <img src="userimages/<?php echo $user['userimages'];?>" alt=""/>
    <?php
    }else
    {
    ?>
<img src="images/user-avatar.png" alt=""/>
<?php
    }
    ?>
<br/>
<form method="post" accept-charset="#" style="" action="doupdateprofile.php" enctype="multipart/form-data">
<label><span style="color:#FFF; font-size:1.5em;">Name</span></label>
<input type="text" name="name" class="form-control" placeholder="Type Your Name" value="<?php if(isset($user['name'])) echo $user['name']; ?>"/>
<br/>
<label><span style="color:#FFF; font-size:1.5em;">Email</span></label>
<input type="text" name="email" class="form-control" placeholder="Type Your Email" value="<?php if(isset($user['email'])) echo $user['email']; ?>"/>
<br/>
<label><span style="color:#FFF; font-size:1.5em;">Gender</span></label>
<input type="radio" name="gender" value="male"> Male <input type="radio"  name="gender" value="female">Female
<br/>
<label><span style="color:#FFF; font-size:1.5em;">Phone Number</span></label>
<input type="text" name="mobile_number" classs="form-control" placeholder="Type Your Email" value="<?php if(isset($user['mobile_number'])) echo $user['mobile_number']; ?>"/>
<br/>
<label><span style="color:#FFF; font-size:1.5em;">Location</span></label>
<select name="location" id="location" onchange="return checkLocation()">;
    <option value="">Select your location</option>    
    <option value="karachi">karachi</option>    
    <option value="hyderabad">hyderabad</option>    
    <option value="larkana">larkana</option>    
    <option value="lahore">lahore</option>    
    <option value="Multan">Multan</option>    
    <option value="other">Other</option>     
</select>
<div id="other" style="display: none;">
    <input type="text" name="location">
</div>
<br/>
<label><span style="color:#FFF; font-size:1.5em;">Total number Of  kids</span></label>
<input type="text" name="totalkids" class="form-control" placeholder="Type Your Email" value="<?php if(isset($user['totalkids'])) echo $user['totalkids']; ?>"/>
<br/>
<label><span style="color:#FFF; font-size:1.5em;">Kids age</span></label>
<input type="text" name="kidsage" class="form-control" placeholder="Type Your Email" value="<?php if(isset($user['kidsage'])) echo $user['kidsage']; ?>"/>
<br/>
<label><span style="color:#FFF; font-size:1.5em;">User interest</span></label>
<textarea name="user_interest" class="form-control" placeholder="Type your interest"><?php if(isset($user['user_interest'])) echo $user['user_interest']; ?></textarea>
<br/>

<label><span style="color:#FFF; font-size:1.5em;">upload image</span></label>
<input type="file" name="userimages" placeholder="Upload your file"/>
<br/>
<input type="submit" name="submit" value="Submit" class="btn-info btn-lg">
</form>
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
    <script>
    function checkLocation()
    {
        var location=document.getElementById('location').value;
        if(location=='other')
        {
            document.getElementById('other').style.display="block";
        }
    }
    </script>   
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