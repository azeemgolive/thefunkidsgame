<div class="col-lg-9">
      <div class="products">
        <div class="product-top">Latest Arrivals
          <div class="carasol-arrow customNavigation"> <a href="javascript:;" class="prev"><img src="images/left-arrow.jpg" width="20" height="20" alt=""></a> <a href="javascript:;" class="next"><img src="images/right-arrow.jpg" width="20" height="20" alt=""></a> </div>
        </div>
        <div id="owl-demo" class="owl-carousel">
          <?php
          $latest_products=  getAllLatestProducts();
          if($latest_products>0)
          {
              while($latest_product=  mysql_fetch_array($latest_products))
              {
         ?>
            <div>
            <div class="col-lg-12">
              <div class="home-latest"> <img src="products/product_color/<?php echo $latest_product['product_image'];?>" alt="" class="img-responsive"> </div>
              <h3><?php 
          echo $latest_product['product_name'];          
          ?></h3>
              <p>
                  <?php $mycontent = $latest_product['product_description'];
        echo getWords($mycontent, 3)."..."; ?>
                  </p>
              <div class="clearfix"></div>
              <a href="product-detail.php?id=<?php echo $latest_product['product_id'];          
 ?>" class="for-more">For More</a> </div>
          </div>
         <?php   
              }
          }
          ?>
        </div>
      </div>
    </div>