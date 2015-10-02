<?php
session_start();
include("dbconnection.php");
$user_id = $_SESSION['user_loged_id'];
$result=getLastAddedOrder();
$orders=  mysql_fetch_array($result);
if($orders['order_number']>0){
$order_number=$orders['order_number']+1;
addNewOrder($user_id,$order_number);
foreach($_SESSION["cart_products"] as $cart_itm)
        {
	 $product_name = $cart_itm["product_name"];
	 $product_qty = $cart_itm["product_qty"];
	 $product_price = $cart_itm["product_price"];
	 $product_id = $cart_itm["product_id"];
	 $product_color = $cart_itm["product_color"];
         $product_size= $cart_itm["product_size"];
         $product_image= $cart_itm["product_image"];
	 $subtotal = ($product_price * $product_qty); //calculate Price x Qty
         $order_id= $orders['order_id'];
         $product_array = array(array('order_id'=>$order_id,
        'product_id'    =>$product_id,
        'product_quantity'    => $product_qty,
        'product_price'    => $product_price                  
            )); 
        $sql = "INSERT INTO customer_orders (order_id,product_id,product_quantity,product_price,createdAt,updatedAt) VALUES";
        $total = count($product_array);
        $it = new ArrayIterator( $product_array );
        while($it->valid()){
$currentItem = $it->current();
$sql .='('.$currentItem['order_id'].','.$currentItem['product_id'].','.$currentItem['product_quantity'].','.$currentItem['product_price'].','."'".date('Y-m-d')."'".','."'".date('Y-m-d')."'".')';
$it->next();
$sql .= $it->key() ? ',' : ';';
mysql_query($sql) or die(mysql_error());
}
}  
header("location:payment-receipt.php");
}else
{
    $orders =300;
    $order_number=$orders+1;    
    addNewOrder($user_id,$order_number);
    $result=getLastAddedOrder();
    $orders=  mysql_fetch_array($result);
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
                    $order_id= $orders['order_id'];
        $product_array = array(array('order_id'=>$order_id,
            'product_id'    =>$product_id,
            'product_quantity'    => $product_qty,
            'product_price'    => $product_price                  
            ));         
        $sql = "INSERT INTO customer_orders (order_id,product_id,product_quantity,product_price,createdAt,updatedAt) VALUES";
        $total = count($product_array);
        $it = new ArrayIterator( $product_array );
        while($it->valid()){
        $currentItem = $it->current();
        $sql .='('.$currentItem['order_id'].','.$currentItem['product_id'].','.$currentItem['product_quantity'].','.$currentItem['product_price'].','."'".date('Y-m-d')."'".','."'".date('Y-m-d')."'".')';
        $it->next();
        $sql .= $it->key() ? ',' : ';'; 
        mysql_query($sql) or die(mysql_error()); 
}     
}    
header("location:payment-receipt.php");
}

