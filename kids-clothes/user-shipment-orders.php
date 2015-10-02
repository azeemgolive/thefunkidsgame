<div class="col-lg-4">
        <div class="mscCart">
    <div class="title">
        <span class="fa fa-fw fa-shopping-cart"></span>
        <span class="txtCartMyOrder">My order (<?php echo count($_SESSION["cart_products"]); ?>)</span>
    </div>
    <div class="content">
        <table class="ms_cart_grid">
            <thead class="fsn fwn">
            <tr>
                <th class="pas fss">Products in Cart</th>
                <th class="pas fss">Qty</th>
                <th class="pas fss txtRight">Price</th>
            </tr>
            </thead>
            <tbody class="cartItems">
                <?php
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
                            <tr class="ms_cart_border_top">
                    <td class="article pas txtLeft vMid">
                        <div class="lfloat ms_cart-txt">
                            <div><b></b></div>
                                                        <div class="txtGray cart-brand"><?php echo $product_name; ?></div>
                                                        <div>
                                                                        <div class="txtGray cart-unique">Size: <?php echo $product_size; ?></div>
                                                            </div>
                        </div>
                    </td>
                    <td class="amount fss txtCenter pas"><?php echo $product_qty; ?></td>
                    <td class="total fss pas txtRight">
                        <div class="price">
                        <span>Rs.</span>
                            <span>&nbsp;<?php echo $currency.$subtotal; ?></span>
                         
                                                </div>
                        
                        
                    </td>
                </tr>
                <tr>
                    <td class="total fss pas txtRight" colspan="3" align="right"><a  title="Remove Item" href="remove-product.php?product_id=<?php echo $product_id; ?>" class="">Remove</a></td>
                    
                </tr>
                <?php
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
        ?>
                        </tbody>
        </table>
    </div>
    </div>
     <?php
    if(isset($_SESSION['user_loged_id']))
    {
        $user_details=getUserById($_SESSION['user_loged_id']);
                    $user_detail=  mysql_fetch_array($user_details);
    ?>
    <div class="box mscSummary">
            <div class="mscCart">
            <div class="title hasLink">
                <span class="lfloat txt">Shipping Address</span>
                            </div>
            <div class="content" id="shipping_address_summary">
                <div class="address">
    <p>
        <span class="address-name"><?php echo $user_detail['firstname']." ".$user_detail['lastname']; ?></span><br>
        <span class="address-address1"><?php $user_detail['address']; ?></span><br>
        <span class="address-city"><?php echo $user_detail['city'];?> - <?php echo $user_detail['province'];?></span><br>
        <span class="address-postcode"></span><br>
    </p>
    <p class="mbs">
        <span class="address-phone"><?php echo $user_detail['mobilenumber']; ?></span><br>
                    <span class="address-additional-phone"></span><br>
            </p>
</div>
<div class="address-pickupStation hidden">
    <p>
        <span class="address-name">umair ahmed</span><br>
        <span class="address-address1">hello</span><br>
    </p>
</div>
            </div>
        </div>
    
    
    </div>
    <?php
    }
    ?>
    <div class="box mscCart" style="display: none;">
            <div class="title hasLink"> <span class="lfloat txt">Shipping Method</span> </div>
            <div class="content">
              <table id="checkoutShippingSummary" class="ui-grid ui-gridFull">
                <tbody class="cartSummary txtLeft">
                  <tr>
                    <td class="txtLeft msc-summary_lftCol">Shipping Method</td>
                    <td id="msc-shipping_summary_method" class="value hRght msc-summary_rghtCol ft_shipping" data-shipping="UniversalShippingMatrix">Standard Shipping</td>
                  </tr>
                  <tr id="msc-shipping_fee" class="">
                    <td id="msc-shipping_summary_fee_title" class="txtLeft msc-summary_lftCol">Shipping Fee</td>
                    <td id="msc-shipping_summary_fee" class="value hRght msc-summary_rghtCol"><span data-currency-iso="PKR">Rs.</span> <span dir="ltr" data-price="140">&nbsp;140</span></td>
                    <td id="msc-shipping_summary_fee_free" data-shipping-free="Free" class="value hRght msc-summary_rghtCol summary-fields_inactive">Free</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
    <div class="box mscTotal mtm mscCart">
    <div class="content  fsm">
        <table id="checkoutCartSummary" class="ui-grid ui-gridFull">
            <tbody class="cartSummary txtLeft">
            <tr class="lnHeigh">
                <td class="txtLeft">Items price</td>
                <td class="txtRight"><span data-currency-iso="PKR">Rs.</span> <span dir="ltr" data-price="3698">&nbsp;<?php echo sprintf("%01.2f", $total);?></span> </td>
            </tr>

            

            

            
            

            

            

                            <tr class="grandTotal fsml strong">
                    <td class="txtLeft ms_grand_total">TOTAL</td>
                    <td class="ms_grand_total txtRight"><span data-currency-iso="PKR">Rs.</span> <span dir="ltr" data-price="3698">&nbsp;<?php echo sprintf("%01.2f", $total);?></span> </td>
                </tr>
            
            </tbody>
        </table>
    </div>
</div>
    
    </div>