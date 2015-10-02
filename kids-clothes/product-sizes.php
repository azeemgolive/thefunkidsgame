<div>
  <table width="100%" border="0" class="tabel_size">
  <?php
  $product_sizes=  getAllProductsSizes();
  if($product_sizes>0)
  {
      while($product_size=  mysql_fetch_array($product_sizes))
      {
  ?>
      <tr>
          <td><input name="product_size" type="checkbox" value="" onclick="return getProductBySize(<?php echo $product_size['size_id']; ?>)"><span><a href="javascript:;" onclick="return getProductBySize(<?php echo $product_size['size_id']; ?>)"><?php echo $product_size['size_name']; ?> <?php 
         $last_thread=countProductByProductSize($product_size['size_id']); 
         $lastthread=  mysql_fetch_array($last_thread);
         echo "(".$lastthread[0].")";
        ?> </a></span></td>
  </tr>
 <?php     
      }
  }
  ?>
</table>

   
  </div>

