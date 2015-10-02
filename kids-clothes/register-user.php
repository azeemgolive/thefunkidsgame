<?php
session_start();
include("dbconnection.php");
include("includes/style.php"); ?>
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
        <div class="product-top">Sign Inn</div>
        
        
        <div class="col-lg-4">
        <?php
        include("user-signup.php");
        ?>
        </div>
        
        <?php
        include("user-login.php");
        ?>
        
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
                        email: {
                            required: true,   
                            email: true
                        }
                    },
                    messages: {
                        email: {
                            required: "Please enter email address",                           
                            email: "Email address must be in the format of name@domain.com"
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
        
        <script type="text/javascript">
            $().ready(function() {
                $("#loginForm").validate({
                    rules: {
                        user_email: {
                            required: true,   
                            email: true
                        },
                        password: {
                            required: true
                        }                        
                    },
                    messages: {
                        user_email: {
                            required: "Please enter email address",                           
                            email: "Email address must be in the format of name@domain.com"
                        },
                        password: {
                            required: "Please enter a password"
                        }
                        
                    }
                });
                $("#password").focus(function() {
                    var password = $("#password").val();
                    var user_email = $("#user_email").val();
                    if(password && user_email && !this.value) {
                        this.value = password + "." + user_email;
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
