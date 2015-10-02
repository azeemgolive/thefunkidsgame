<?php 
session_start();
include("dbconnection.php");
$taxes              = array( //List your Taxes percent here.
                            'VAT' => 0, 
                            'Service Tax' => 0
                            );
  $shipping_cost      = 250; //shipping cost
 $currency = ''; //Currency Character or code
$user_id=$_SESSION['user_loged_id'];
$results=  getUserById($user_id);
$user=  mysql_fetch_array($results);
$customers_orders=getOrderByUser($user_id);
$customer_order=  mysql_fetch_array($customers_orders);
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
        <div class="product-top">Success</div>
        <div class="col-lg-8">
          <div class="chkSucP-colLeft">
            <div class="chkSucP-orderInfo">
              <h1 class="chkSucP-orderInfo-hdl"> We're processing your order right now! </h1>
              <div class="chkSucP-orderInfo-inner">
                <ul class="chkSucP-orderInfo-list">
                  <li class="chkSucP-orderInfo-orderData clearfix">
                      <p class="ui-block ltr-content">Order number <span class="sel-order-nr">#<?php echo $customer_order['order_number']; ?></span>, made on <span class="strong"><?php echo date("d-m-y",  strtotime($customer_order['createdAt'])); ?></span>, will be sent to <span class="strong"><?php echo $user['firstname']." ".$user['lastname']; ?></span>.</p>
                    <span class="ui-block mtl"> Address: <span class="strong"><?php echo $user['address']; ?></span> </span> <span class="ui-block mts"> Payment Method: <span class="strong ft_payment" data-payment="CashOnDelivery">Cash On Delivery</span> </span> <span class="ui-block mts"> Shipping Method: <span class="strong ft_shipping" data-shipping="UniversalShippingMatrix">Universal Shipping Matrix</span> </span> </li>
                  <li class="clearfix"> <span class="chkSucP-orderInfo-amount">
                          <div class="chkSucP-orderInfo-overlayHolder"> <a href="shoppingcart.php" class="chkSucP-orderInfo-amount-link"> <?php echo count($_SESSION["cart_products"]); ?> Item </a>
                      <div class="chkSucP-orderInfo-overlay">
                        <div class="chkSucP-orderInfo-amount-link chkSucP-orderInfo-overlay-head"> <?php echo count($_SESSION["cart_products"]); ?> Item </div>
                        <div class="chkSucP-orderInfo-overlay-inner-cols-1 chkSucP-orderInfo-overlay-inner clearfix">
                          <ul class="chkSucP-orderInfo-overlay-list">
                            <?php
                                if(isset($_SESSION["cart_products"])) //check session var
    {
		$total = 0; //set initial total value
		$b = 0; //var for zebra stripe table 
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
                        $total = ($total + $subtotal); //add subtotal to total var
        }
    }
     $grand_total = $total + $shipping_cost;
                        ?>
                              
                              <li class="clearfix"> <span class="imgBox loadOnCustomEvent"> <span class="productImage loaded" id="prd-singleImg-itemsoverlay-KA117FAADJ94PKFAS" style="width:60px;height:75px;" data-width="60" data-height="75" data-context="itemsoverlay" data-image-key="cart" data-zoom-image="" data-image="https://static.daraz.pk/p/karachi-wearhouse-4979-029461-1-cart.jpg" data-image-initial="https://static.daraz.pk/p/karachi-wearhouse-4979-029461-1-cart.jpg" data-swap-image="" data-vertical="1" data-sku="KA117FAADJ94PKFAS" data-image-parentkey="" data-parent-sku=""> <span class="itm-imageWrapper ll-imageWrapper default-state" data-placeholder="https://static.daraz.pk/images/local/placeholder/placeholder_s_daraz.jpg" data-sprite="">
                              <div class="i-loader large icon" style="display: none;"></div>                              
                              <img class="itm-img loading" width="undefined" height="undefined" src="https://static.daraz.pk/p/karachi-wearhouse-4979-029461-1-cart.jpg"></span>
                              <div id="magnifier"></div>
                              </span> </span>
                                
                              <p class="chkSucP-orderInfo-overlay-info"> <span class="chkSucP-orderInfo-overlay-brand"> <?php echo $product_name;?> </span> <a href="https://www.daraz.pk/blue-cotton-mens-shorts-ag0039-164920.html" class="chkSucP-orderInfo-overlay-productName"> Blue Cotton Men's Sho... </a> <span class="chkSucP-orderInfo-overlay-variation"> <span class="variation-label">Size:</span> <span class="variation-value">28</span> </span> <span class="chkSucP-orderInfo-overlay-price"> <span class="variation-label">Price:</span> <span class="variation-value"><span data-currency-iso="PKR">Rs.</span> <span dir="ltr" data-price="399">&nbsp;<?php echo $subtotal; ?></span> </span> </span> </p>
                            </li>
         
                          </ul>
                        </div>
                      </div>
                    </div>
                    </span> <span class="chkSucP-orderInfo-info"> <span class="chkSucP-orderInfo-txtLine chkSucP-orderInfo-byShop"> by <span class="chkSucP-orderInfo-company">thefunkids.com</span><span class="chkSucP-orderInfo-left"></span>
                    <label class="rfloat resumeBoldAttribute"><span data-currency-iso="PKR">Rs.</span> <span dir="ltr" data-price="399">&nbsp;<?php echo sprintf("%01.2f", $total);?></span> </label>
                    </span> <span class="chkSucP-orderInfo-txtLine chkSucP-orderInfo-delivery"> <span class="chkSucP-orderInfo-label">Exp. Arrival:</span> <span class="chkSucP-orderInfo-arrival">1 - 5 days</span> </span> </span> </li>
                </ul>
                 
                <div class="wrapperItemListOrder mln mbn rfloat fsm">
                  <div class="fullSizeLine mts ">
                    <div class="resumeTotalListBox mtl mbl ">
                      <div class="lineAttributesBox fullSizeLine clearfix successLineHeight">
                        <div class="resumeSubBox itemGridLineFloatLeft"> <span class="ft_subtotal"><span data-currency-iso="PKR">Rs.</span> <span dir="ltr" data-price="399">&nbsp;<?php echo sprintf("%01.2f", $total);?></span> </span> </div>
                        <div class="resumeSubBoxLeft itemGridLineFloatRight txtLeft"> <span>Subtotal</span> </div>
                      </div>
                      <div class="resumeBox clearfix successLineHeight">
                        <div class="resumeSubBox itemGridLineFloatLeft"> <span class="ft_delivery">+ <span data-currency-iso="PKR">Rs.</span> <span dir="ltr" data-price="140">&nbsp;<?php echo $shipping_cost;?></span> </span> </div>
                        <div class="resumeSubBoxLeft itemGridLineFloatRight txtLeft"> <span>Shipping</span> </div>
                      </div>
                      <div class="resumeBox clearfix successTotal">
                        <div class="resumeSubBox itemGridLineFloatLeft"> <span class="resumeBoldAttribute"><span data-currency-iso="PKR">Rs.</span> <span dir="ltr" data-price="539">&nbsp;<?php echo sprintf("%01.2f", $grand_total);?></span> </span> </div>
                        <div class="resumeSubBoxLeft itemGridLineFloatRight"> <span class="resumeBoldAttribute">TOTAL</span> </div>
                      </div>
                    </div>
                  </div>
                </div>
                <p class="chkSucP-orderInfo-more fullSizeLine "> <a href="" class="chkSucP-orderInfo-print print-order chslinks">Print</a> <span class="chkSucP-orderInfo-line chkSucP-orderInfo-confirmationTxt"> <a href="add-more-products.php" class="chslinks">Add more items</a> </span> </p>
                <div class="clearfix clear ht1"> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4"> </div>
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
