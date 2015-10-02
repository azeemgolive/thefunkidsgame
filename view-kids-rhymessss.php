<?php
session_start();
if(isset($_GET['id']))
{
include("dbconnection.php");
}else
{
    header("rhymes.php");
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
</head>
<body>

<header>
<div class="container first">
<div class="row row1">
<div class="col-md-12 border1">
<?php
include("includes/header.php");
?>
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
<?php
$rhyme_id=$_REQUEST['id'];
$rhymedetails=getRhymeById($rhyme_id);
$detailrhyme=  mysql_fetch_array($rhymedetails);
?>
<div class="row">

<div class="col-md-5 iframe101">
  <?php
  if($detailrhyme['rhyme_code']!=''){
  echo $detailrhyme['rhyme_code'];
  }else
  {
  ?>
    <iframe frameborder="1" width="100%" height="500" src="//www.dailymotion.com/embed/video/x2u9xws" allowfullscreen></iframe><br /><a href="http://www.dailymotion.com/video/x2u9xws_alphabet-song-nursery-rhymes-thefunkids-com-video-dailymotion_school" target="_blank">Alphabet song - Nursery Rhymes - TheFunKids...</a> <i>by <a href="http://www.dailymotion.com/TheFunKids" target="_blank">TheFunKids</a></i>
    
 <?php
  }
  ?>
</div>

<div class="col-md-4 marquee">
<h3 class="text-center poormary"><?php echo $detailrhyme['rhyme_name'];
?></h3>

 <?php
 if($detailrhyme['rhyme_decription']!=''){
     ?>
   <marquee behavior="scroll" scrollamount="3" direction="up" onMouseOver="this.stop()" onMouseOut="this.start()"> <p class="text-center marquepara" style="">
    <?php echo $detailrhyme['rhyme_decription'];?>
    </p></marquee>
 <?php
 }  else {
 ?>

    <?php
 }
  ?>
</div>
    
<div class="col-md-2 div3vg">    
<?php
include("gadds.php");
?>
</div>
<!--<div class="col-md-8 interss">


</div>-->
</div>  
</div>
</div>
</section>
<!--<section class="second">
<div class="container">
    </div></section>-->

<!--popuo close-->
<section class="second">   
<div class="container">
<div class="row">
<div class="col-md-4 boxx1">
<h1 style="color:#FF0; font-family:myfont; font-style:italic; letter-spacing:2px;">GAMES</h1>
<?php
$game_name=getFourRandGames();
if($game_name>0)
{
    while ($rand_game=  mysql_fetch_array($game_name))
    {
?>
<a href="view-kids-games.php?id=<?php echo $rand_game['game_id'];  ?>">
<div class="gamecls">
<img src="games/game_images/<?php echo $rand_game['game_image']; ?>" class="img-responsive img-thumbnail"/>
<p style="color: #fff; font-family:myfont; font-style:; letter-spacing:px; padding-left:7px; font-size:1em;"><?php echo $rand_game['game_name']; ?></p>
</div>
</a>
<?php        
    }
}
?>
<div class="clearfix"></div>
</div>





<div class="col-md-4 boxx1">
<h1 style="color:#FF0; font-family:myfont; font-style:italic; letter-spacing:2px;">RHYMES</h1>
<?php
$rhyme_name=  getFourRandRhymes();
if($rhyme_name>0)
{
    while ($rand_rhyme=  mysql_fetch_array($rhyme_name))
    {
?>
<a href="view-kids-rhymes.php?id=<?php echo $rand_rhyme['rhyme_id']; ?>">
<div class="gamecls">
<img src="rhymes/<?php echo $rand_rhyme['rhyme_image']; ?>" class="img-responsive img-thumbnail"/>
<p style="color: #fff; font-family:myfont; font-style:; letter-spacing:px; padding-left:7px; font-size:1em;"><?php echo $rand_rhyme['rhyme_name']; ?></p>
</div>
</a>
<?php
    }
}
?>
<div class="clearfix"></div>
</div>
<div class="col-md-4 boxx1">
<h1 style="color:#FF0; font-family:myfont; font-style:italic; letter-spacing:2px;">PUZZLE</h1>
<?php
$grand_puzzle=getRandomGamesForPuzzles();
if($grand_puzzle>0)
{
    while($grand_puzzles=  mysql_fetch_array($grand_puzzle))
    {
?>
<a href="view-puzzles-games.php?id=<?php echo $grand_puzzles['puzzle_id'];  ?>">
<div class="gamecls">
<img src="puzzles/puzzle_images/<?php echo $grand_puzzles['puzzle_image']; ?>" alt="" class="img-responsive"/>
<p style="color: #fff; font-family:myfont; font-style:; letter-spacing:px; padding-left:7px; font-size:1em;"><?php echo $grand_puzzles['puzzle_name']; ?></p>
</div>
</a>
<?php
    }
}
?>

<div class="clearfix"></div>

</div>
</div>
</div>
</section>

 <section class="second">
 <div class="container">
<div class="row">
<div class="col-md-9 discus">
     <a name="rhymes"> </a>
    <br>
    <?php
    if(isset($_REQUEST['comment']))
    {
    ?>
    <p class="text-center modiration">Your Comment Waiting For Moderation ...</p> 
    <?php
    }
    ?>
    <?php
    if(isset($_REQUEST['error']))
    {
    ?>
    <p class="text-center modiration">Please Login for comments</p>   
    <?php
    }
    ?>
    <form method="post" action="dopostcomments.php">
        <input type="hidden" name="rhyme_id" value="<?php echo $rhyme_id; ?>"/>
        <div>            
        <textarea rows="5" cols="80" name="comments" id="comments" class="form-control" placeholder="Write your views"></textarea>    
        </div>
        <div style="float:right; margin-top:15px;">
            <a href="#rhymes"><input type="submit" name="submit" value="POST"></a>
               
        </div>          
    </form>        
    <div class="clearfix"></div>
    <?php
    $rhyme_comment=getApproveRhymeComment($rhyme_id);
    if($rhyme_comment>0)
    {
       while($rhymecomment=  mysql_fetch_array($rhyme_comment))
       {
          $user_id=$rhymecomment['user_id'];          
          $user_comment=  getUserById($user_id);
          while($user=  mysql_fetch_array($user_comment))
          {
    ?>
    <div class="action">
        <h4>  
    <?php
        echo $user['name'];
        ?>
            </h4>
    <br/>
    <?php
    if($user['userimages']!='')
    {
    ?>
    <img src="userimages/<?php echo $user['userimages']; ?>" alt="" width="70" height="70"/>
    <?php
    }else
    {
    ?>
    <img src="images/user-avatar.png" alt=""/>
    <?php
    }
    ?>
    <p><?php echo $rhymecomment['comments']; ?> 
        <br/><?php if($rhymecomment['isActive']=='no'){ echo"your comments are pending and waiting for approve";   }?> </p>
   <div class="clearfix"></div>  
   
    <div style="float:right">
   <?php
   if(isset($_SESSION['user_id']))
   {   
   ?>
      <div><a href="edit-rhyme_comment.php?id=<?php echo $rhyme_id; ?>&rhyme_comment_id=<?php echo $rhymecomment['rhyme_comment_id']; ?>">Edit</a>  <a href="delete-rhyme_comment.php?id=<?php echo $rhymecomment['rhyme_comment_id']; ?>&rhyme_id=<?php echo $rhyme_id; ?>">Delete</a></div>      
  <?php
   }
   ?>
  <?php
   if($rhymecomment['isActive']=='yes')
   {
   ?>   
        <div class="fb-like" data-href="https://www.facebook.com/TheFunKidsCo" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>| <a id="ref_fb"  href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $rhymecomment['comments'];?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600'); return false;"><img src="your custom facebook share button image" alt=""/></a></div>
   <?php
   }
   ?>
 <br>    
    <div class="clearfix"></div>  
    </div> 
    
    
    <?php
       }
    }
    }
    ?>
    
    
    <div class="clearfix"></div>
</div>
<div class="col-md-3 discusadd">
<br/>
<img class="img-responsive" alt="" src="images/123.png" class="oimg">
<div class="fb-page" data-href="https://www.facebook.com/TheFunKidsCo" data-width="300" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/TheFunKidsCo"><a href="https://www.facebook.com/TheFunKidsCo">Thefunkids.com</a></blockquote></div></div>	
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
   function fb_like() {
        url = location.href;
        //var _content = "I just used YellowLite's solar calculator, its great check it out!";
        var _content = "I just used YellowLite?'s Solar Calculator to see how I can save " + jQuery('.progress-offset').html() + "% a month on my electric bill. See how much you can save by installing solar panels!";

        title = "Just used YellowLite's Solar Calculator";

        //var fbLink = 'http://www.facebook.com/sharer.php?s=100&amp;' +'p[title]=' + encodeURIComponent(brag + ' | ' + fbTitle) + '&amp;' +'p[summary]=' + encodeURIComponent(fbDesc) + '&amp;' + 'p[url]=' + encodeURIComponent(fbURL) + '&amp;' +'p[images][0]=' + encodeURIComponent(fbImage);
        //var fbClick = "window.open('" + fbLink + "','sharer','toolbar=0,status=0,width=548,height=325');";

        if (_refid == '0') {
            SaveInquiry(3);
        } else {
            //window.open('http://www.facebook.com/sharer.php?u=' + encodeURIComponent('http://www.yellowlite.com/solarcalculatorohio-results.aspx?refid=' + _refid) + '&t=' + encodeURIComponent(title), 'sharer', 'toolbar=0,status=0,width=400,height=300');
            var url = jQuery('.icon-fb').attr('href')
            url = url.replace("123456789", msg.d);
            jQuery('.icon-fb').attr('href', url)
            setTimeout(function () {
                window.open(jQuery('.icon-fb').attr('href'));
            }, 250);

        }
        return false;
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
