<?php
session_start();
include("dbconnection.php");
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
           
           <div class="product-top">Select your address</div>   
        
        <div class="col-lg-8">
            
        
        <?php
           
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
