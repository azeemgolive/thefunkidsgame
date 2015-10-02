<?php
include("dbconnection.php");
?>
         
          <?php
           $price_from=$_REQUEST['price_from'];
           $price_to=$_REQUEST['price_to'];
           $products=  getProductsByPrice($price_from,$price_to);
           if($products>0)
           {
               while($product=  mysql_fetch_array($products))
               {
           ?>
        <div class="col-lg-3">
              <div class="home-latest"> <img src="products/product_color/<?php echo $product['product_image'];?>" alt="" class="img-responsive"> </div>
              <h3><?php echo $product['product_name']; ?></h3>
              <p><?php echo $product['product_description']; ?></p>
              <div class="clearfix"></div>
              <a href="product-detail.php?id=<?php echo $product['product_id'];          
 ?>" class="for-more">For More</a> </div>
        
        <?php
               }
           }
          ?>
     