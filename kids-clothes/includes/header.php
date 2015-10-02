<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="top-level">
      <div class="row">
        <div class="col-lg-6"> </div>
        <?php
        if(isset($_SESSION['user_loged_id']))
        {
        ?>
        <div class="col-lg-6"> 
        <div class="fright">
        <div class="top-cart"><a href="#"><?php if(isset($_SESSION["cart_products"])){ echo count($_SESSION["cart_products"]);}else{ echo "0";} ?></a> Items</div>
        <div class="display-name">Welcome, <span><?php echo $_SESSION['loged_fullname']; ?></span></div>
        <a href="logout.php" class="logout">Log Out</a>        
        </div>
       </div>
       <?php
        }else
        {
        ?>       
       <div class="col-lg-6">
          <ul>
            <li><a href="register-user.php"><i class="fa fa-sign-out"></i>Sign Up</a></li>
            <li><a href="register-user.php"><i class="fa fa-sign-in"></i>Sign In</a></li>
            <li><a href="javascript:;"><i class="fa fa-globe"></i>Contact Us</a></li>
          </ul>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
    
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php"> <img src="images/logo.png" width="130" height="63" alt=""> </a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li> <a href="index.php">Home</a> </li>
        <li> <a href="girls-wear.php">Girls Wear</a> </li>
        <li> <a href="kids-male-wear.php">Boys Wear</a> </li>
        <li> <a href="javascript:;">Kids Wear</a> </li>
        <li> <a href="javascript:;">Accessories</a> </li>
        <li> <a href="javascript:;">Offers</a> </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<!-- Header -->