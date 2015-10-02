<?php
session_start();
if(isset($_SESSION['admin_email']))
{
    include("dbconnection.php");
}  else {
   header("location:index.php");  
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>The Fun Kids| Admin | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

       <?php 
          include("momforumnotification.php");
          ?>
          
          
      <!-- Left side column. contains the logo and sidebar -->
      
      <?php
      include_once("includes/leftnavigation.php");
      ?>
 <?php
      $product_id = $_REQUEST['id'];
      $products=  getProductById($product_id);
      $product=  mysql_fetch_array($products);
      ?>
       
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           <?php echo $product['product_name']; ?>
            <small></small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Products</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         

          

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div>
              <!-- MAP & BOX PANE -->
              <!-- /.box -->
              <!-- /.row -->

              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                        <tr>
                            <td>
                                Product name:<?php echo $product['product_name']; ?>
                            </td>
                            
                            <td>
                                Product Price:<?php echo $product['product_price']; ?>
                            </td>
                            
                        </tr>
                        
                        <tr>
                            <td>
                                Clothing Type:<?php echo $product['product_name']; ?>
                            </td>
                            
                            <td>
                                Gender:<?php echo $product['product_gender']; ?>
                            </td>
                            
                        </tr>
                      
                        <tr>
                            <td>
                                CreatedAt : <?php echo date("j F, Y",strtotime($product['createdAt']));  ?>
                            </td>
                            
                            <td>
                                UpdatedAt:<?php echo date("j F, Y",strtotime($product['updatedAt']));  ?>
                            </td>                            
                        </tr>
                        
                        <tr>
                            <td>
                                Is Featured : <?php if($product['isFeatured']=='yes')
                              {
                              echo "YES";                              
                              }else{
                                  echo "NO";
                                  } ?>
                            </td>                            
                            <td>
                                Seo Name:<?php echo $product['product_seo']; ?>
                            </td>                            
                        </tr>                       
                        
                        <tr>
                            <td colspan="2">
                                Description: <?php echo $product['product_description']; ?>
                            </td>
                        </tr>                        
                        
                        <tr>
                            <td colspan="2" align="center">
                             <img src="../products/product_color/<?php echo $product['product_image']; ?>">
                            </td>
                        </tr>
                        
                    </table>
                  </div><!-- /.table-responsive -->
                </div>
                
                <section class="content-header">
          <h1>
           Product Color
            <small></small>
          </h1>
          
        </section>
                
                <div class="box-header with-border">
                  <h3 class="box-title"><div class="box-footer clearfix">
                  <a href="add-new-product-color.php?product_id=<?php echo $product_id; ?>" class="btn btn-sm btn-info btn-flat pull-left">Add New Product Color</a>                  
                </div></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Color Name</th>
                          <th>Image</th>
                          <th>Created At</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $result= getAllProductsColorByProductId($product_id);
                          if($result>0)
                          {
                              while($topmenu=  mysql_fetch_array($result))
                              {                                 
                         ?>
                          <tr>
                          <td><?php echo $topmenu['color_name']; ?></td>
                          <td>
                              <img src="../products/product_color/<?php echo $topmenu['product_color_image']; ?>" height="50px" width="50px">
                          </td>                          
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo date("j F, Y",strtotime($topmenu['createdAt'])); ?></div></td>
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20"> <a href="edit-product.php?id=<?php echo $topmenu['product_id']; ?>">Edit</a> | <a href="delete-product.php?id=<?php echo $topmenu['product_id']; ?>" onclick='return confirmfunc()' >Delete</a></div></td>
                        </tr>
                          <?php
                              }
                          }
                          ?>                        
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div>
                
        <section class="content-header">
          <h1>
           Product Sizes
            <small></small>
          </h1>
          
        </section>
                
                <div class="box-header with-border">
                  <h3 class="box-title"><div class="box-footer clearfix">
                  <a href="add-new-product-size.php?product_id=<?php echo $product_id; ?>" class="btn btn-sm btn-info btn-flat pull-left">Add New Product Size</a>                  
                </div></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Color Name</th>
                          <th>Created At</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $results= getAllProductsSizesByProductId($product_id);
                          if($results>0)
                          {
                              while($topmenus=  mysql_fetch_array($results))
                              {                                 
                         ?>
                          <tr>
                          <td><?php echo $topmenus['size_name']; ?></td>
                                                
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo date("j F, Y",strtotime($topmenu['createdAt'])); ?></div></td>
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20"> <a href="edit-product.php?id=<?php echo $topmenu['product_id']; ?>">Edit</a> | <a href="delete-product.php?id=<?php echo $topmenu['product_id']; ?>" onclick='return confirmfunc()' >Delete</a></div></td>
                        </tr>
                          <?php
                              }
                          }
                          ?>                        
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->

            <!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php include_once("includes/footer.php"); ?>

      <!-- Control Sidebar -->
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>

    </div><!-- ./wrapper -->
	 
	 <script>
function confirmfunc()
{
	return confirm("Are You sure.");
}
</script>
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>