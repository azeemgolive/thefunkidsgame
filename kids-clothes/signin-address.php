<?php
session_start();
include("dbconnection.php");
if(isset($_SESSION['email']))
{
$email=$_SESSION['email'];
$result=getUserByEmail($email);
$user=  mysql_fetch_array($result);
$user_id=$user['user_id'];
}else{
    header("location:register-user.php");
}
include("includes/style.php"); 
?>
<title>The Fun Kids Clothes</title>
<meta name="author" content="">
<meta name="description" content="">

</head>

<body>
<?php include("includes/header.php"); ?>


<div class="container">
  <div class="row">
 
    <div class="col-lg-12">
       <div class="products pad-bott">
           <?php
            if(!isset($_SESSION['user_loged_id']))
            {
                ?>
             <div class="product-top">Create new customer account</div>
           <?php
            }else
            {
                ?>
           <div class="product-top">Select your address</div>           
         <?php
           }
           ?>
            
            
       
        
        
        <div class="col-lg-8">
            <?php
            if(!isset($_SESSION['user_loged_id']))
            {             
            ?>
        <div class="signin-box">       
            <form method="post" action="adduseraddress.php" name="signUpForm" id="signUpForm">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <table width="100%" border="0">
        <tr>
    <td><label>First Name <span>*</span></label></td>
    <td width="400">
        <input name="first_name" id="first_name" type="text">
    </td>
  </tr>
  
  <tr>
    <td><label>Last Name <span>*</span></label></td>
    <td width="400">
        <input name="last_name" id="last_name" type="text">
    </td>
  </tr>
  
  <tr>
    <td><label>Password <span>*</span></label></td>
    <td width="400">
        <input name="password" id="password" type="password">
    </td>
  </tr>
  
  <tr>
    <td><label>Confirm Password <span>*</span></label></td>
    <td width="400">
        <input name="confirm_password" id="confirm_password" type="password">
    </td>
  </tr>
  
  <tr>
    <td><label>Gender <span>*</span></label></td>
    <td width="400">
    <select name="gender" id="gender">
<option value="" selected="selected">Select</option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>
    </td>
  </tr>
  <tr>
    <td><label>Telephone <span>*</span></label></td>
   <td width="400">
       <input name="moblie_number" id="moblie_number" type="text">
    </td>
  </tr>
  <tr>
    <td><label>Additional phone number (optional) <span>*</span></label></td>
    <td width="400">
        <input name="otherphonenumber" id="otherphonenumber" type="text">
    </td>
  </tr>
  <tr>
    <td><label>Address <span>*</span></label></td>
    <td>
        <textarea name="address" id="address" rows="5" cols="50"></textarea>
   
    </td>
  </tr>
  
  <tr>
    <td><label>Province <span>*</span></label></td>
   <td width="400">
    <select name="province_name" id="province_name">
<option value="Azad Kashmir">Azad Kashmir</option>
<option value="Balochistan">Balochistan</option>
<option value="Federally Administered Tribal Areas">Federally Administered Tribal Areas</option>
<option value="Gilgit-Baltistan">Gilgit-Baltistan</option>
<option value="Islamabad">Islamabad</option>
<option value="Khyber Pakhtunkhwa">Khyber Pakhtunkhwa</option>
<option value="Punjab">Punjab</option>
<option value="Sindh" selected="selected">Sindh</option>
</select>
    </td>
  </tr>
  <tr>
    <td><label>City <span>*</span></label></td>
   <td width="400">
    <select name="city_name" id="city_name">
<option value="">Please select</option>
<option value="Badin">Badin</option>
<option value="Bhan saeead abad">Bhan saeead abad</option>
<option value="Bhit shah">Bhit shah</option>
<option value="Chohar jamali">Chohar jamali</option>
<option value="Dadu">Dadu</option>
<option value="Daur">Daur</option>
<option value="Deharki">Deharki</option>
<option value="Digri">Digri</option>
<option value="District badin">District badin</option>
<option value="Dokri">Dokri</option>
<option value="Gambat">Gambat</option>
<option value="Gharo">Gharo</option>
<option value="Gharo">Ghotki</option>
<option value="Golarchi">Golarchi</option>
<option value="Goth machhi">Goth machhi</option>
<option value="Guddu">Guddu</option>
<option value="Hala">Hala</option>
<option value="Halani">Halani</option>
<option value="Hyderabad">Hyderabad</option>
<option value="Jacobabad">Jacobabad</option>
<option value="Jam">Jam </option>
<option value="Jamshoro">Jamshoro</option>
<option value="Jhuddo">Jhuddo</option>
<option value="Johi">Johi</option>
<option value="Kahirpur mirs">Kahirpur mir's</option>
<option value="Kamber">Kamber</option>
<option value="Kamber ali khan">Kamber ali khan</option>
<option value="Kandh kot">Kandh kot</option>
<option value="Kandh kot">Kandh kot</option>
<option value="Karachi">Karachi</option>
<option value="Karampur">Karampur</option>
<option value="Kashmore">Kashmore</option>
<option value="Khair pur mirs">Khair pur mirs</option>
<option value="Khair pur taminwali">Khair pur taminwali</option>
<option value="Khairpur">Khairpur</option>
<option value="Khairpur nathan shah">Khairpur nathan shah</option>
<option value="Khanpur mahar">Khanpur mahar</option>
<option value="Khipro">Khipro</option>
<option value="Kot ghulam mohammad">Kot ghulam mohammad</option>
<option value="Kotri">Kotri</option>
<option value="Kunri">Kunri</option>
<option value="Larkana">Larkana</option>
<option value="Matiari">Matiari</option>
<option value="Matli">Matli</option>
<option value="Mehar">Mehar</option>
<option value="Mirpur bathoro">Mirpur bathoro</option>
<option value="Mirpur khas">Mirpur khas</option>
<option value="Mirpur mathelo">Mirpur mathelo</option>
<option value="Mithi">Mithi</option>
<option value="Moro">Moro</option>
<option value="Nasarpur">Nasarpur</option>
<option value="Naudero larkhana">Naudero larkhana</option>
<option value="Nawabshah">Nawabshah</option>
<option value="Ninda">Ninda</option>
<option value="Nindo shahar (district badin)">Nindo shahar (district badin)</option>
<option value="Nokkundi,mirpur">Nokkundi,mirpur</option>
<option value="Nooriabad">Nooriabad</option>
<option value="Noushehro feroz">Noushehro feroz</option>
<option value="Panno aqil">Panno aqil</option>
<option value="Pasroor">Pasroor</option>
<option value="Pir jo goth">Pir jo goth</option>
<option value="Radhan">Radhan</option>
<option value="Radhan station">Radhan station</option>
<option value="Ranipur">Ranipur</option>
<option value="Ratodero">Ratodero</option>
<option value="Rohri">Rohri</option>
<option value="Sakrand">Sakrand</option>
<option value="Sanghar">Sanghar</option>
<option value="Shahdad kot">Shahdad kot</option>
<option value="Shehdadpur">Shehdadpur</option>
<option value="Shikarpur">Shikarpur</option>
<option value="Singhoro">Singhoro</option>
<option value="Sukkur">Sukkur</option>
<option value="Talhar">Talhar</option>
<option value="Tando adam">Tando adam</option>
<option value="Tando allahyar">Tando allahyar</option>
<option value="Tando bagho">Tando bagho</option>
<option value="Tando gulam ali">Tando gulam ali</option>
<option value="Tando jam">Tando jam</option>
<option value="Tando m.khan">Tando m.khan</option>
<option value="Tando soomro">Tando soomro</option>
<option value="Thari mirwah">Thari mirwah</option>
<option value="Tharo shah">Tharo shah</option>
<option value="Thatta">Thatta</option>
<option value="Ubauro">Ubauro</option>
<option value="Umerkot">Umerkot</option>
</select>
    </td>
  </tr>
 <tr>
    <td colspan="2" style="padding:20px 0 20px 308px;"> <input name="" type="checkbox" value=""><a href="javascript:;" class="billing">Billing to the same address</a></td>
    
  </tr>
  <tr>
    <td colspan="2">
    <div class="signin-login" style="margin:8px 0 8px 310px;">
        <input type="submit" name="submit" value="Continue" class="">
       </div>
    </td>
  </tr>
  
  <tr>
    <td colspan="2">
    <div class="signin-login login-fb">
    <a href="javascript:;" class="">Login with Facebook</a>
    </div>
    </td>
  </tr>
</table>

        </form>
        
        
        
        
        
        
        
        
        </div>
        <?php
            }else
            {
                if(isset($_SESSION['user_loged_id']))
                {
                    $user_details=getUserById($_SESSION['user_loged_id']);
                    $user_detail=  mysql_fetch_array($user_details);
        ?>
        
        <div class="edit-address">
         <div style="width:280px; float:left"><label><?php echo $user_detail['firstname']." ".$user_detail['lastname']; ?></label><br/>
<label><?php $user_detail['address']; ?></label><br/>
<label><?php echo $user_detail['city'];?> - <?php echo $user_detail['province'];?></label><br/>
<label><?php echo $user_detail['mobilenumber']; ?></label><br/>
   <br/>

     </div>
        
        <div style="margin:45px 0 8px 30px;" class="signin-login">
            <a href="shipping.php"><input type="button" value="Continue" class=""> </a>
       </div>
        </div>
            <?php
                }
            }
            ?>
        </div>
        
        <?php
        include("user-orders.php");
        ?>
        
        
      
      
      
        
        
        
        </div>
        </div>
        
        
    </div>
  </div>
 
  
</div>
<?php include("includes/footer.php"); ?>
<script type="text/javascript" src="js/jquery-1.7.1.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script> 
<script type="text/javascript" src="js/owl.carousel.js"></script>
<script type="text/javascript" src="js/cloud-zoom.1.0.2.min.js"></script> 
<script type="text/javascript" src="js/scripts.js"></script> 
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery.min.js"></script>

<script src="js/jquery.validate.js" type="text/javascript"></script>	
       
                <script type="text/javascript">
            $().ready(function() {
                $("#signUpForm").validate({
                    rules: {
                        first_name: {
                            required: true
                        },
                        last_name: {
                            required: true  
                        },
                        gender: {
                            required: true  
                        },
                        moblie_number: {
                            required: true
                        },
                        address: {
                            required: true                            
                        },
                        province_name: {
                            required: true
                        },
                        city_name: {
                            required: true
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
                        first_name: {
                            required: "Please enter your first name"
                        },
                        last_name: {
                            required: "Please enter your last name"
                        },
                        gender: {
                            required: "Please select your gender"
                        },
                        moblie_number: {
                            required: "Please enter your mobile number"
                        },
                        address: {
                            required: "Please enter your shipping address"
                        },
                        province_name:{
                            required: "Please select your province name"
                        },
                        city_name:{
                            required: "Please select your city name"
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
</body>
</html>
