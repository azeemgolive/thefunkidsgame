<?php 
session_start();
include("dbconnection.php");
include("includes/style.php"); ?>
<?php 
if(isset($_REQUEST['id']))
{
$product_id=  mysql_real_escape_string($_REQUEST['id']);
$products=  getProductById($product_id);
$product=  mysql_fetch_array($products);
}  else {
  header("location:index.php");    
}

?>
<title>The Fun Kids Clothes</title>
<meta name="author" content="">
<meta name="description" content="">
<link href="css/cloud-zoom.css" rel="stylesheet" type="text/css" />
<style type="text/css">

</style>
</head>

<body>
<?php include("includes/header.php"); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="products pad-bott">
        <div class="product-top"><?php echo $product['product_name']; ?>'s Detail</div>
        <div class="col-lg-4">
          <div class="zoom-section">
            <div class="zoom-small-image"> <a href='products/product_color/<?php echo $product['product_image'];?>' class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4"><img src="products/product_color/<?php echo $product['product_image'];?>" alt='' title="<?php echo $product['product_name']; ?>" style="width:320px; height:420px;" /></a></div>
           
            
            <div class="zoom-desc">
                
                <?php
                      $product_colors=getProductColorByProduct($product_id);
                      if($product_colors>0)
                      {
                         while($product_color=  mysql_fetch_array($product_colors))
                         {
                      ?>
                
                <a href='products/product_color/<?php echo $product_color['product_color_image'];?>' class='cloud-zoom-gallery' title='<?php echo $product_color['color_name'];?>' rel="useZoom: 'zoom1', smallImage: 'products/product_color/<?php echo $product_color['product_color_image'];?>' "><img class="zoom-tiny-image" src="products/product_color/<?php echo $product_color['product_color_image'];?>" alt = "Thumbnail <?php echo $product_color['product_color_id'];?>"/></a> 
        
           <?php
                         } 
                         }
                         ?>
                </div>
          </div>
        </div>
        <form method="post" action="cart_update.php">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <input type="hidden" name="product_price" value="<?php echo $product['product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $product['product_image']; ?>">
            <input type="hidden" name="type" value="add" />
            
        <div class="col-lg-4">
          <h2 class="producthd"> <?php echo $product['product_name']; ?> </h2>
          <div class="product-discount"><?php echo $product['product_price']; ?></div>
          <div class="product-price"><?php echo $product['product_price']; ?></div>
          <div class="clearfix"></div>
          <div class="in-stock">Availability: <span>In stock</span></div>
          <p><?php echo $product['product_description']; ?></p>
          <div class="seprator"></div>
          <div class="product-options">
            <dl class="last">
              <dt>
                <label class="required"><em>*</em>Color</label>
              </dt>
              <dd>
                <div class="input-box">
                    <select name="product_color" id="product_color">
                    <option value="">-- Please Select color --</option>
                    <?php
                      $product_colors=getProductColorByProduct($product_id);
                      if($product_colors>0)
                      {
                         while($product_color=  mysql_fetch_array($product_colors))
                         {
                      ?>
                     <option value="<?php echo $product_color['color_name']; ?>"><?php echo $product_color['color_name']; ?></option>
                    <?php
                         }
                      }
                          
                    ?>
                   
                    
                  </select>
                </div>
              </dd>
              <dt>
                <label class="required"><em>*</em>Size</label>
              </dt>
              <dd class="last">
                <div class="input-box">
                    <select name="product_size" id="product_size">
                    <option value="">-- Please Select --</option>
                   <?php 
                     $product_sizes=  getProductSizeByProduct($product_id);
                     if($product_sizes>0)
                     {
                         while($product_size=  mysql_fetch_array($product_sizes))
                         {
                     ?>
                    <option value="<?php echo $product_size['size_name']; ?>"><?php echo $product_size['size_name']; ?></option>
                    <?php
                         }
                     }
                   ?>
                  </select>
                </div>
              </dd>
            </dl>
          </div>
          <div class="product-options-bottom">
            <div class="price-box"> <span id="product-price-1_clone" class="regular-price"> <span class="price">Rs <?php echo $product['product_price']; ?></span> </span> </div>
            <div class="add-to-cart">
              <label for="qty">Quantity:</label>
              <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="product_qty">
              <div class="qty-button">
                <input type="button" class="qty-increase" onClick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty )) qty_el.value++;return false;">
                <input type="button" class="qty-decrease" onClick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) qty_el.value--;return false;">
              </div>
              <button class="button btn-cart" type="submit" data-original-title="Add to Cart" rel="" onClick="return addToCart()">Add to Cart</button>
            </div>
          </div>
        </div>
        </form>
        
        <div class="col-lg-4">
        <div class="more-products">
        <h2>More products from</h2>
        <div class="row">
       <?php
        $similiar_products=getProductsbyCatogery($product['clothing_type_id']);
        if($similiar_products>0)
        {
            while($similar_product=  mysql_fetch_array($similiar_products))
            {
        ?>         
       <div class="col-lg-12">        
           <img src="products/product_color/<?php echo $similar_product['product_image']; ?>">
           <h3><?php echo $similar_product['product_name']; ?></h3>
           <p><?php echo $similar_product['product_description']; ?></p>
           <div class="more-product-price">Rs. <?php echo $similar_product['product_price']; ?></div>
           </div>
        <?php    
            }
        }
       ?>
         
           
           
           
           
           
           
        </div>
        
        
        </div>
        
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-3">
          <div class="add-detail"><img src="images/new-babies.jpg" width="256" height="253" alt=""></div>
        </div>
        <div class="col-lg-9">
          <div id="tabs" class="description-tabs">
            <ul>
              <li><a href="#tabs-1">Product Description</a></li>
              <li><a href="#tabs-2">Reviews</a></li>
              <li><a href="#tabs-3">Product Tags</a></li>
            </ul>
            <div id="tabs-1">
              <div class="col-lg-12"> <?php echo $product['product_description']; ?> </div>
            </div>
            <div id="tabs-2">
              <div class="col-lg-12"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. </div>
            </div>
            <div id="tabs-3">
              <div class="col-lg-12"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue. </div>
            </div>
          </div>
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
<script>
    function addToCart()
    {
       var product_color=document.getElementById('product_color').value;
       var product_size=document.getElementById('product_size').value;
       if(product_color==0)
       {
           alert('Please select product color');
           return false;
       }
       if(product_size==0)
       {
         alert('Please select product size');
           return false;  
       }
    }
</script>
</body>
</html>