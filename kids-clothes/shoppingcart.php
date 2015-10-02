<?php 
session_start();
include_once("config.php");
include("includes/style.php"); ?>
<title>The Fun Kids Clothes</title>
<meta name="author" content="">
<meta name="description" content="">

</head>

<body>
<?php include("includes/header.php"); ?>


<div class="container">
  <div class="row">
 <form method="post" action="cart_update.php">
    <div class="col-lg-12">
       <div class="products pad-bott">
           <div class="product-top">Shopping Cart <span style="float: right;"><a class="btn btn-primary" href="empty-cart.php">Empty</a></span></div>
        <div class="table-responsive cart-tabel">
         <table class="table table-bordered">
            <thead>
              <tr>
                <td class="text-center">Image</td>
                <td class="text-left">Product Name</td>
                <td class="text-left">Product Color</td>
                <td class="text-left">Product Size</td>
                <td class="text-left">Quantity</td>
                <td class="text-left">Price</td>
                <td class="text-left">Total</td>
                 <td class="text-left">Remove</td>
              </tr>
            </thead>
            <tbody>
                
                
                
                
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
			
		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
		    echo '<tr class="'.$bg_color.'">';	
                    echo '<td class="text-center"><div class="cart-small-image"><img src="products/product_color/'.$product_image.'"  class="img-thumbnail" title="Bisbee Dress" alt="Bisbee Dress"></div></td>';
			echo '<td>'.$product_name.'</td>';
                        echo '<td>'.$product_color.'</td>';
                        echo '<td>'.$product_size.'</td>';
                        echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_id.']" value="'.$product_qty.'" /></td>';
			echo '<td>'.$currency.$product_price.'</td>';
			echo '<td>'.$currency.$subtotal.'</td>';
			echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_id.'" /></td>';
            echo '</tr>';
			$total = ($total + $subtotal); //add subtotal to total var
        }
		
		$grand_total = $total + $shipping_cost; //grand total including shipping cost
		foreach($taxes as $key => $value){ //list and calculate all taxes in array
				$tax_amount     = round($total * ($value / 100));
				$tax_item[$key] = $tax_amount;
				$grand_total    = $grand_total + $tax_amount;  //add tax val to grand total
		}
		
		$list_tax       = '';
		foreach($tax_item as $key => $value){ //List all taxes
			$list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
		}
		$shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
	}
    ?>
                                        </tbody>
          </table>
                
                
        </div>
        
        
        <div class="">
        <div class="col-sm-4 col-sm-offset-8">
          <table class="table table-bordered">
                        <tbody>
                            <tr><td colspan="5"><button type="submit">Update</button></td></tr>
                            
                            <tr><td colspan="5"><span style="float:right;text-align: right;"><?php echo $shipping_cost; ?>Amount Payable : <?php echo sprintf("%01.2f", $grand_total);?></span></td></tr>
                      </tbody></table>
        </div>
      </div>
      
      
      <div class="buttons">
        <div class="pull-left"><a class="btn btn-primary" href="index.php">Continue Shopping</a></div>
        <div class="pull-right"><a class="btn btn-primary" href="signin-address.php">Checkout</a></div>
      </div>
        
        
        
        </div>
        </div>
      </form>
        
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
