<div class="products">
        <div class="product-top">Featured
          <div class="carasol-arrow"> <a href="javascript:;" id="fet-prev"><img src="images/left-arrow.jpg" width="20" height="20" alt=""></a> <a href="javascript:;" id="fet-next"><img src="images/right-arrow.jpg" width="20" height="20" alt=""></a> </div>
        </div>
        <div id="featured">       
       <?php
       $featured_products=  getAllFeaturedProducts();
       if($featured_products>0)
       {
           while($featured_product=  mysql_fetch_array($featured_products))
           {
      ?>
            <div class="fet-wrap">
          <div class="product-cen pro"> <img src="products/product_color/<?php echo $featured_product['product_image'];?>" class="img-responsive" alt="" > </div>
          <h3>
              <?php 
          echo $featured_product['product_name'];          
          ?>
          </h3>
          <p>
              <?php $mycontent = $featured_product['product_description'];
        echo getWords($mycontent, 3)."..."; ?>
        
          </p>
            <div class="clearfix"></div>
        <a href="product-detail.php?id=<?php echo $featured_product['product_id'];          
 ?>" class="for-more">For More</a>
        </div>
       
      <?php      
           }
       }
       ?>           
        
        </div>
         </div>