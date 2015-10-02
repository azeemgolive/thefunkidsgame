<div>  
  <table width="100%" border="0" class="tabel_size">
      <?php
        $product_colors=getAllProductColors();
        if($product_colors>0)
        {
            while($product_color=  mysql_fetch_array($product_colors))
            {
      ?>
       <tr>
    <td><input name="product_color" type="checkbox" value="" onclick="return getProductByColor(<?php echo $product_color['color_id']; ?>)"><span><a href="javascript:;" onclick="return getProductByColor(<?php echo $product_color['color_id']; ?>)">
        <?php
        echo $product_color['color_name'];
        ?> <?php 
         $lasts_thread=countProductByProductColor($product_color['color_id']); 
         $lastthreads=  mysql_fetch_array($lasts_thread);
         echo "(".$lastthreads[0].")";
        ?></a></span></td>
  </tr>
      <?php
            }
        }
      ?>
  </table>
  </div>


