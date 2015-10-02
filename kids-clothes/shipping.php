<?php 
session_start();
include("dbconnection.php");
if(!isset($_SESSION['user_loged_id']))
{
    header("location:register-user.php");
}
$taxes              = array( //List your Taxes percent here.
                            'VAT' => 0, 
                            'Service Tax' => 0
                            );
  $shipping_cost      = 250; //shipping cost
 $currency = ''; //Currency Character or code
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
        <div class="product-top">Shipping</div>
        <div class="col-lg-8">
          <div class="signin-box">           
            <div class="box mtm">
              <div class="ui-formRow selected">
                
                <div class="ship-time"><strong>Shipping Time:</strong> 1 - 5 days</div>
                
              </div>
            </div>
            <div class="mtm pbs fulfillmentInformationContainer">
              <table class="msc-package mvm pbl" border="0">
                <thead>
                  <tr class="pbs txtGray">
                    <th class="header pbs">Shipment 1 of 1</th>
                    <th class="qty pll">Qty</th>
                    <th class="price pll">Price</th>
                    <th class=""></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                 if(isset($_SESSION["cart_products"]))
{
    $total = 0; //set initial total value
    $b = 0; 
    foreach ($_SESSION["cart_products"] as $cart_itm)
        {
			//set variables to use in content below
			$product_name = $cart_itm["product_name"];
			$product_qty = $cart_itm["product_qty"];
			$product_price = $cart_itm["product_price"];
			$product_id = $cart_itm["product_id"];
			$product_color = $cart_itm["product_color"];
                        $product_size= $cart_itm["product_size"];
                        $product_image= $cart_itm["product_image"];
			$subtotal = ($product_price * $product_qty); //calculate Price x Qty
                 ?>
                <tr>
                    <td class="pbl txtLeft"><div class="strong">
                      <div><?php echo $product_name; ?></div>
                      <div class="txtGray">Size: <?php echo $product_size; ?></div></td>
                    <td class="pll txtLeft"><?php echo $product_qty; ?></td>
                    <td align="right"><span data-currency-iso="PKR">Rs.</span> <span dir="ltr" data-price="1849">&nbsp;<?php echo $currency.$subtotal; ?></span></td>
                  </tr>
                  <?php
                    }
                }
        ?>
                </tbody>
              </table>
            </div>
            <div class="signin-login" style="margin:45px 0 8px 30px; float:right;"> <a href="create-customer-order.php">
              <input type="submit" class="" value="Complete Your Order">
              </a> </div>
          </div>
        </div>
        <?php
         include("user-shipment-orders.php");
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
</body>
</html>
