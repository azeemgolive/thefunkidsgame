<?php 
session_start();
include("dbconnection.php");
include("includes/style.php"); 
?>
<title>The Fun Kids Clothes</title>
<meta name="author" content="">
<meta name="description" content="">
</head>

<body id="page-top" class="index">
<?php include("includes/header.php"); ?>
<header>
  <div class="container">
    <div class="row">
      <div class="col-lg-9"> 
      <ul id="slider">
      
      <li>
      <img class="img-responsive" src="images/baby-baba.jpg" alt="">
      </li>
      
      <li>
      <img class="img-responsive" src="images/baby-baba.jpg" alt="">
      </li>
      
      
      </ul>
      </div>
      <div class="col-lg-3 sub-headers"> <img class="img-responsive" src="images/girls-wear.jpg" alt=""> <img class="img-responsive" src="images/boys-wear.jpg" alt="" style="margin-top:18px;"> </div>
    </div>
  </div>
</header>
<div class="container">
  <div class="row">
    <div class="col-lg-3">
      <?php
      include("featured-products.php");
      ?>
    </div>
    <?php
    include("latest-products.php");
    ?>
  </div>
  <?php include("includes/bottom-banners.php"); ?>
</div>
<?php include("includes/footer.php"); ?>
<!-- jQuery --> 
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script> 
<script type="text/javascript" src="js/owl.carousel.js"></script> 
<script type="text/javascript" src="js/scripts.js"></script> 
</body>
</html>
