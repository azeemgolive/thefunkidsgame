<?php
session_start();
include_once("config.php");

//add product to session or create new one
if(isset($_POST["type"]) && $_POST["type"]=='add' && $_POST["product_qty"]>0)
{
    $product_color=$_REQUEST['product_color'];
    $product_size=$_REQUEST['product_size'];    
    $product_image  =$_REQUEST['product_image'];
	foreach($_POST as $key => $value){ //add all post vars to new_product array
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
	//remove unecessary vars
	unset($new_product['type']);
	//unset($new_product['return_url']); 
	
 	//we need to get product name and price from database.
    $statement = $mysqli->prepare("SELECT product_name, product_price FROM funkids_products WHERE product_id=?");
    $statement->bind_param('s', $new_product['product_id']);
    $statement->execute();
    $statement->bind_result($product_name, $product_price);
	
	while($statement->fetch()){
		
		//fetch product name, price from db and add to new_product array
        $new_product["product_name"] = $product_name; 
        $new_product["product_price"] = $product_price;
        $new_product["product_color"] = $product_color;
        $new_product["product_size"] = $product_size;
        $new_product["product_image"] = $product_image;        
        
        if(isset($_SESSION["cart_products"])){  //if session var already exist
            if(isset($_SESSION["cart_products"][$new_product['product_id']])) //check item exist in products array
            {
                unset($_SESSION["cart_products"][$new_product['product_id']]); //unset old array item
            }
        }
        $_SESSION["cart_products"][$new_product['product_id']] = $new_product; //update or create product session with new item  
    } 
}


//update or remove items 
if(isset($_POST["product_qty"]) || isset($_POST["remove_code"]))
{
	//update item quantity in product session
	if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
		foreach($_POST["product_qty"] as $key => $value){
			if(is_numeric($value)){
				$_SESSION["cart_products"][$key]["product_qty"] = $value;
			}
		}
	}
	//remove an item from product session
	if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
		foreach($_POST["remove_code"] as $key){
			unset($_SESSION["cart_products"][$key]);
		}	
	}
}

//back to return url
//$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
header('Location:shoppingcart.php');

?>