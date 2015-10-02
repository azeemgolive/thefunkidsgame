<?php
session_start();
include("dbconnection.php");
if(isset($_POST['submit'])){
	// code for check server side validation
	if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){  
		$msg="<span style='color:red'>The Validation code does not match!</span>";// Captcha verification is incorrect.		
	}else{// Captcha verification is Correct. Final Code Execute here!		
		$name=  mysql_real_escape_string($_POST['name']);
    $gender=  mysql_real_escape_string($_POST['gender']);
    $email=  mysql_real_escape_string($_POST['email']);
    $phone_number=  mysql_real_escape_string($_POST['phone_number']);
    $location=  mysql_real_escape_string($_POST['location']);   
    $password=  mysql_real_escape_string(md5($_POST['password']));
    $verificationcode=generateCode(8);
    $activation=md5($email.time());  
    $user_register=  getUserByEmail($email);     
    $user=  mysql_fetch_array($user_register);    
    if($user['email']==$email)
    {    
         header("location:signup-mother-baby-forum.php?register");   
    }else{
      registerUser($name,$gender,$email,$location,$phone_number,$password,$activation,$verificationcode);    
    $base_url="http://thefunkids.com/beta/activation.php?code=".$activation;
    $subject="Registration successful, please activate email at The Fun Kids";
    $from = "info@thefunskids.com"; 
    $to = $email;
    $mail_body="Dear $name,<br/><br/> Welcome to Fun Kids, we bring exciting rhymes, games, puzzles and stories for your little angels. We believe that learning with fun is important for child mental development and we strive to bring best products that can help you groom your child in a fun environment. <br /><br /> Along with Kids section, we have discussion forums and other activities related to Moms and parenting. To make your journey more exciting with us, we come up with monthly contest and sweepstakes, where you can participate and win super mom gifts from us.<br /><br />We hope your journey with us will be refreshing and full of fun, do login daily to catch any surprise gifts coming your way.<br /><br />Please note that your data is confidential and will be used only for our promotional activities. We do not share our data with other advertisers and refrain ourselves from any spam activities.<br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. <br/> <br/> <a href=".$base_url.">.$base_url.'</a>' <br/><br/>Please contact us at info@golive.com.pk if you have any further queries.<br/></br>Regards & Love<br/><br/>The Fun Kids Team";    
    $body = wordwrap($mail_body,2000);
    //$body_user = wordwrap($mail_body_user,70);
    $headers = "MIME-Version: 1.0" . "\r\n";
	    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
  	    $headers .= "From: " . $from ."\r\n";
            $headers .= 'Bcc:raheelaslam@golive.com.pk' . "\r\n";
            $headers .= "Reply-To: " . $email . "\r\n";   
    //------------------------Thanks You Email-------------------------------------------------------------------        
    mail($to,$subject,$mail_body,$headers);      
    header("location:message.php");
    }    
    		
	}
}	
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58113944-6', 'auto');
  ga('send', 'pageview');

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
<h3 class="posth456" style="">SIGN UP AT FUNKIDS MOM FORUM</h3>
</div>


<div class="col-md-12 postdt">
<h3 style="font-family:myfont; font-style:italic; color:#2b8ee3; padding:0; margin:0; font-size:3em;">CREATE AN ACCOUNT</h3>
<!--<pre style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;">The quick prown fox jumps over the lazy dog. The quick prown fox jumps over the lazy dog. The quick prown fox jumps over the lazy dog. The quick prown fox jumps over the lazy dog.

The quick prown fox jumps over the lazy dog. The quick prown fox jumps over the lazy dog. The quick prown fox jumps over the lazy dog. The quickprown fox jumps over the lazy dog. 

The quick prown fox jumps over the lazy dog. The quick prown fox jumps over the lazy dog. The quick prown fox jumps over the lazy dog.</pre>-->
</div>

    <?php
    if(isset($_REQUEST['register']))
    {
    ?>
    <div class="error"><strong>This Email ID already exist in our system, please use a different ID for new Signup</strong>
            </div>
    <?php
    }
    ?>
    <div class="col-md-4" style="background:#f4f4f4; margin-top:10px; padding:20px 0;">
    <form method="post" action="" name="signUpForm" id="signUpForm">
<label>Your Name</label>

<input type="text" name="name" class="form-control"/>
<br>
<label>Your Password</label>
<input type="password" name="password" id="password" class="form-control"/>
<br>
<label>Re-type Password</label>
<input type="password" name="confirm_password" id="confirm_password" class="form-control"/>
<br>
<label>Your Email</label>
<input type="text" name="email" id="email" class="form-control"/>
<br>

<label>Gender</label>
<input type="radio" name="gender" value="male"/>Male<input type="radio" name="gender" value="female"/>Female
<br>

<label>Phone Number</label>
<input type="text" name="phone_number" class="form-control"/>
<br>

<label>location</label>
<select name="location" id="location" onchange="return checkLocation()">;
    <option value="">Select your location</option>   
    <option value="Karachi">Karachi</option>    
    <option value="Hyderabad">Hyderabad</option>    
    <option value="Larkana">Larkana</option>    
    <option value="Lahore">Lahore</option>    
    <option value="Multan">Multan</option>  
<option value="Abbotabad">Abbotabad</option> 
<option value="Hasilpur">Hasilpur</option>
<option value="Mirpur Khas">Mirpur Khas</option>
<option value="Ahmadpur East">Ahmadpur East</option>
<option value="Montgomery">Montgomery</option>
<option value="Arifwala">Arifwala</option>
<option value="Islamabad">Islamabad</option>
<option value="Moro">Moro</option>
<option value="Attock City">Attock City</option>
<option value="Jacobabad">Jacobabad</option>
<option value="Badin">Badin</option>
<option value="Jalalpur">Jalalpur</option>
<option value="Muridke">Muridke</option>
 
<option value="Bahawalnagar">Bahawalnagar</option>
<option value="Jaranwala">	Jaranwala</option>
<option value="Muzaffarabad">Muzaffarabad</option>
<option value="Bahawalpur">Bahawalpur</option>
<option value="Jhang Sadr">Jhang Sadr</option>
<option value="Muzaffargarh">Muzaffargarh</option>
<option value="Bahawalpur">Bahawalpur</option>
<option value="Jhelum">Jhelum</option>
<option value="Narowal">Narowal</option>
<option value="Bhai Pheru">Bhai Pheru</option>
<option value="Kamalia">Kamalia</option>
<option value="Nawabshah">Nawabshah</option>
<option value="Bhakkar">Bhakkar</option>
<option value="Kambar">Kambar</option>
<option value="Nowshera Cantonment">Nowshera Cantonment</option>
<option value="Bhalwal">Bhalwal</option>
<option value="Kamoke">Kamoke</option>
<option value="Okara">Okara</option>
<option value="Bhimbar">Bhimbar</option>
<option value="Kandhkot">Kandhkot</option>
<option value="Pakpattan">Pakpattan</option>
<option value="Burewala">Burewala</option>
<option value="Pano Aqil">Pano Aqil</option>
<option value="Chakwal">Chakwal</option>
<option value="Kasur">Kasur</option>
<option value="Pattoki">Pattoki</option>
<option value="Chaman">Chaman</option>
<option value="Khairpur">Khairpur</option>
<option value="Peshawar">Peshawar</option>
<option value="Chichawatni">Chichawatni</option>
<option value="Khanpur">Khanpur</option>
<option value="Quetta">Quetta</option>
<option value="Chiniot">Chiniot</option>
<option value="Kharian">Kharian</option>
<option value="Rawalpindi">Rawalpindi</option>
<option value="Chishtian">Chishtian</option>
<option value="Khushab">Khushab</option>
<option value="Sadiqabad">Sadiqabad</option>
<option value="Chuhar Kana">Chuhar Kana</option>
<option value="Kohat">Kohat</option>
<option value="Sargodha">Sargodha</option>
<option value="Charsadda">Charsadda</option>
<option value="Kohror Pakka">Kohror Pakka</option>
<option value="Shahdadkot">Shahdadkot</option>
<option value="Dadu">Dadu</option>
<option value="Kot Addu">Kot Addu</option>
<option value="Sheikhu Pura">Sheikhu Pura</option>
<option value="Daska">Daska</option>
<option value="Kot Malik">Kot Malik</option>
<option value="Shikarpur">Shikarpur</option>
<option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
<option value="Kotli">Kotli</option>
<option value="Shorko">Shorko</option>
<option value="Dera Ismail Khan">Dera Ismail Khan</option>
<option value="Kotri">Kotri</option>
<option value="Sialkot">Sialkot</option>
<option value="Dipalpur">Dipalpur</option>
<option value="Sukkur">Sukkur</option>
<option value="Faisalabad">Faisalabad</option>
<option value="Swabi">Swabi</option>
<option value="Gilgit">Gilgit</option>
<option value="Leiah">Leiah</option>
<option value="Tando Adam">Tando Adam</option>
<option value="Gojra">Gojra</option>
<option value="Lodhran">Lodhran</option>
<option value="Tando Allahyar">Tando Allahyar</option>
<option value="Gujar Khan">Gujar Khan</option>
<option value="Mandi Bahauddin">Mandi Bahauddin</option>
<option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
<option value="Gujranwala">Gujranwala</option>
<option value="Mardan">Mardan</option>
<option value="Toba Tek Singh">Toba Tek Singh</option>
<option value="Gujrat">Gujrat</option>
<option value="Mian Channu">Mian Channu</option>
<option value="Turbat">Turbat</option>
<option value="Hafizabad">Hafizabad</option>
<option value="Mianwali">Mianwali</option>
<option value="Vehari">Vehari</option>
<option value="Harunabad">Harunabad</option>
<option value="Mingora">Mingora</option>
<option value="Wazirabad">Wazirabad</option>  
    <option value="other">Other</option>     
</select>
<br>
<div id="other" style="display: none;">
  <input type="text" name="location" class="form-control"/>
</div>
<br>
<br>
<table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td align="right" valign="top"> Validation code:</td>
      <td><img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
        <label for='message'>Enter the code above here :</label>
        <br>
        <input id="captcha_code" name="captcha_code" type="text">
        <br>
        Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.</td>
    </tr>
  </table>
<br>
<br>
<input type="submit" name="submit" value="SIGN-UP" class="btn btn-xs" style="background:#f7b700; font-family:myfont; font-style:italic; font-size:1.5em; letter-spacing:2px; color:#FFF;
padding:0 10px;"/>


</form>
</div>



<div class="col-md-4"  style="padding-bottom:20px;">
<h3 class="text-center" style="color:#2b8ee3; font-family:myfont; font-style:italic; letter-spacing:1px; ">CONNECT WITH SOCIAL MEDIA</h3>
<a href="fbconfig.php"><img src="images/fb_03.png" alt="" class="img-responsive"/></a>

</div>

<div class="col-md-4 fbad"  style="border:#000 px solid;">
<img src="images/fbadd.png" alt="" class=""/>
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
    <script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
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
<script src="js/jquery.validate.js" type="text/javascript"></script>	
       
                <script type="text/javascript">
            $().ready(function() {
                $("#signUpForm").validate({
                    rules: {
                        email: {
                            required: true,   
                            email: true
                        },
                        password: {
                            required: true
                        },
                        confirm_password: {
                            required: true,
                            equalTo: "#password"
                        }
                    },
                    messages: {
                        email: {
                            required: "Please enter email address",                           
                            email: "Email address must be in the format of name@domain.com"
                        },
                        password: {
                            required: "Please enter a password"
                        },
                        confirm_password: {
                            required: "Please enter confirm password",
                            equalTo: "Please enter the same password as above"
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
 
 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58113944-6', 'auto');
  ga('send', 'pageview');

</script>
 

 	 
    
</footer>


</body>
</html>