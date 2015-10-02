<div class="left-navigation">
        <div class="navigation-top"> Products </div>
        <ul>
            <?php
              $clothing_types=getAllClothingTypes();
              if($clothing_types>0)
              {
                  while($clothing_type=  mysql_fetch_array($clothing_types))
                  {
               ?>            
            <li> <a href="javascript:;" onclick="return getProuctByClothingType(<?php echo $clothing_type['clothing_type_id']; ?>)"><?php echo $clothing_type['Clothing_type_name']; ?></a> </li>
            <?php
                  }
              }
            ?>
        </ul>
      </div>