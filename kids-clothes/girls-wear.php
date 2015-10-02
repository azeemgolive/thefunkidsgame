<?php
session_start();
include("dbconnection.php");
include("includes/style.php"); 
?>
<title>The Fun Kids Clothes</title>
<meta name="author" content="">
<meta name="description" content="">
<script>
 function submitPriceForm()
 {
     var price_from= document.getElementById('price_from').value;
     var price_to= document.getElementById('price_to').value;
     jQuery.ajax({
			type: "GET",
			url: "getproductsbyprice.php",
			data: "price_from="+price_from+"&price_to="+price_to,
			success: function(response){
					jQuery("#products_by_price").html(response);
					if(!price_to)
					{
					jQuery("#proucts_cat").show();
                                        jQuery("#products_by_size").hide();
                                        jQuery("#products_by_color").hide();
                                        jQuery("#products_by_price").hide();
			 	}else{
					jQuery("#proucts_cat").hide();
                                        jQuery("#products_by_size").hide();
                                        jQuery("#products_by_color").hide();
                                        jQuery("#products_by_price").show();
					}
				}
			});
     
 }
    
</script>
</head>
<body>
<?php include("includes/header.php"); ?>
<!-- Header -->
<header>
  <div class="container">
    <div class="row">
      <div class="col-lg-12"> <img class="img-responsive" src="images/girls-banner.jpg" alt=""> </div>
    </div>
  </div>
</header>
<div class="container">
  <div class="row">
    <div class="col-lg-3">
    
    <div class="product-accord">
    <h4 class="navigation-top"> Refine By  </h4>
    <div id="accordion">
  
  <h3>Size</h3>
  <?php
  include("product-sizes.php");
  ?>
  
   <h3>Price</h3>
  <?php
  include("product-prices.php");
  ?>
  
  
  
  <h3>Colour Family</h3>
  <?php
  include("product-colors.php");
  ?>
  </div>
    
    </div>
      <?php include("includes/left-navigation.php"); ?>
      
      
      
      
      
      
      
    </div>
    <div class="col-lg-9">
      <div class="products">
        <div class="product-top">Girls Wear</div>
          <div  id="proucts_cat">
          <?php
           $gender="female";
           $products=  getProductsByGender($gender);
           if($products>0)
           {
               while($product=  mysql_fetch_array($products))
               {
           ?>
        <div class="col-lg-3" id="proucts_cat">
              <div class="home-latest"> <img src="products/product_color/<?php echo $product['product_image'];?>" alt="" class="img-responsive"> </div>
              <h3><?php echo $product['product_name']; ?></h3>
              <p>
                  <?php $mycontent = $product['product_description'];
        echo getWords($mycontent, 3)."..."; ?>
                  </p>
              <div class="clearfix"></div>
              <a href="product-detail.php?id=<?php echo $product['product_id'];          
 ?>" class="for-more">For More</a> </div>
        
        <?php
               }
           }
          ?>
            
          </div>
            
         <div id="products_by_size" style="display:none"></div>
         <div  id="products_by_color" style="display:none"></div>   
         <div id="products_by_clothing_type" style="display:none"></div>   
         <div id="products_by_price" style="display:none"></div>   
      
      </div>
    </div>
      
      
  </div>
  <?php include("includes/bottom-banners.php"); ?>
  <?php
  include("special-products.php");
  ?>
</div>
<?php include("includes/footer.php"); ?>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script> 
<script type="text/javascript" src="js/owl.carousel.js"></script> 
<script type="text/javascript" src="js/scripts.js"></script> 
<script>
function getProductBySize(size_id)
{
    var product_size_id= size_id;
    var product_gender="female";
    	jQuery.ajax({
			type: "GET",
			url: "getproductsbysize.php",
			data: "product_size_id="+product_size_id+"&product_gender="+product_gender,
			success: function(response){
					jQuery("#products_by_size").html(response);
					if(!product_size_id)
					{
					jQuery("#proucts_cat").show();
                                        jQuery("#products_by_size").hide();
                                        jQuery("#products_by_color").hide();
                                        jQuery("#products_by_clothing_type").hide(); 
                                        jQuery("#products_by_price").hide();                                         
			 	}else{
					jQuery("#proucts_cat").hide();
                                        jQuery("#products_by_size").show();
                                        jQuery("#products_by_color").hide();
                                        jQuery("#products_by_clothing_type").hide();  
                                        jQuery("#products_by_price").hide();
					}
				}
			});

}
</script>

<script>
function getProductByColor(color_id)
{
    var product_color_id= color_id;
    var product_gender="female";
    jQuery.ajax({
			type: "GET",
			url: "getproductsbycolor.php",
			data: "product_color_id="+product_color_id+"&product_gender="+product_gender,
			success: function(response){
					jQuery("#products_by_color").html(response);
					if(!product_color_id)
					{
					jQuery("#proucts_cat").show();
                                        jQuery("#products_by_size").hide();
                                        jQuery("#products_by_color").hide();
                                        jQuery("#products_by_clothing_type").hide(); 
                                        jQuery("#products_by_price").hide();
			 	}else{
					jQuery("#proucts_cat").hide();
                                        jQuery("#products_by_size").hide();
                                        jQuery("#products_by_color").show();
                                        jQuery("#products_by_clothing_type").hide();    
                                        jQuery("#products_by_price").hide();
					}
				}
			});
}
</script>

<script>
function getProuctByClothingType(clothing_type_id)
{
    var clothing_type_id= clothing_type_id;
    var product_gender="female";
    jQuery.ajax({
			type: "GET",
			url: "getproductsbyclothingtype.php",
			data: "clothing_type_id="+clothing_type_id+"&product_gender="+product_gender,
			success: function(response){
					jQuery("#products_by_clothing_type").html(response);
					if(!clothing_type_id)
					{
					jQuery("#proucts_cat").show();
                                        jQuery("#products_by_size").hide();
                                        jQuery("#products_by_color").hide();
                                        jQuery("#products_by_clothing_type").hide();     
                                        jQuery("#products_by_price").hide();
			 	}else{
					jQuery("#proucts_cat").hide();
                                        jQuery("#products_by_size").hide();
                                        jQuery("#products_by_color").show();
                                        jQuery("#products_by_clothing_type").show();
                                        jQuery("#products_by_price").hide();                                        
					}
				}
			});
}
</script>


</body>
</html>
