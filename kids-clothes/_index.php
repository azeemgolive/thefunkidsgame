<?php
include("dbconnection.php");

?>
<?php include("includes/style.php"); ?>
<title>The Fun Kids Clothes</title>
<meta name="author" content="">
<meta name="description" content="">
</head>

<body id="page-top" class="index">
<?php include("includes/header.php"); ?>
    
    
    <?php
include("includes/headerimages.php");
?>

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
