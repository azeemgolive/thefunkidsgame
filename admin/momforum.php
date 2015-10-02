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
    <style type="text/css">           
    

        </style>
        
    <style type="text/css">
            
            #loading{
                width: 100%;
                position: absolute;
                top: 100px;
                left: 100px;
				margin-top:200px;
            }
            #container .pagination ul li.inactive,
            #container .pagination ul li.inactive:hover{
                background-color:#ededed;
                color:#bababa;
                border:1px solid #bababa;
                cursor: default;
            }
            #container .data ul li{
                list-style: none;
                font-family: verdana;
                margin: 5px 0 5px 0;
                color: #000;
                font-size: 13px;
            }

            #container .pagination{
                width: 800px;
                height: 25px;
            }
            #container .pagination ul li{
                list-style: none;
                float: left;
                border: 1px solid #006699;
                padding: 2px 6px 2px 6px;
                margin: 0 3px 0 3px;
                font-family: arial;
                font-size: 14px;
                color: #006699;
                font-weight: bold;
                background-color: #f2f2f2;
            }
            
            element.style {
    background-color: #006699;
    color: #fff;
}
#container .pagination ul li.active{
    background-color: #f2f2f2;
    border: 1px solid #006699;
    color: #006699;
    float: left;
    font-family: arial;
    font-size: 14px;
    font-weight: bold;
    list-style: outside none none;
    margin: 0 3px;
    padding: 2px 6px;
}
            #container .pagination ul li:hover{
                color: #fff;
                background-color: #006699;
                cursor: pointer;
            }
			.go_button
			{
			background-color:#f2f2f2;border:1px solid #006699;color:#cc0000;padding:2px 6px 2px 6px;cursor:pointer;position:absolute;margin-top:-1px;
			}
			.total
			{
			float:right;font-family:arial;color:#999;
			}

        </style>
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

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Mom Forum
            <small></small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Mom Forum</li>
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
                <div class="box-header with-border">
                  <h3 class="box-title"><div class="box-footer clearfix">
                  <a href="add-mom-forum.php" class="btn btn-sm btn-info btn-flat pull-left">Add New Forum</a>                  
                </div></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>                         
                          <th>Title</th>                                             
                          <th>Created At</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $result= getAllMomForum();
                          $num_rows = mysql_num_rows($result);
                          $Limit = 5; //Number of results per page
                          if (isset($_GET["page"]))
                         $page = $_GET["page"]; //Get the page number to show
                         else
                         $page = 1;
                         $NumberOfPages = ceil($num_rows / $Limit);
                         $count = 0;
                         $pageresult = getAllMomForumListPaged(($page - 1) * $Limit,$Limit);
                         $num_rows = mysql_num_rows($pageresult);
                          if($num_rows > 0)
                          {
                              while($mom_forum=  mysql_fetch_array($pageresult))
                              {                                 
                         ?>
                          <tr>                          
                          <td><?php echo $mom_forum['mom_forum_title']; ?></td>                                                 
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo date("j F, Y",strtotime($mom_forum['createdAt'])); ?></div></td>
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20"><a href="edit-mom-forum.php?id=<?php echo $mom_forum['mom_forum_id']; ?>">Edit</a>|<a href="delete-momforum.php?id=<?php echo $mom_forum['mom_forum_id']; ?>" onclick='return confirmfunc()' >Delete</a></div></td>
                        </tr>
                          <?php
                              }                          
                          ?>
                          
                       <tr>
                           <td colspan="3" align="right">
                               
        <div align="center" style="font-size:24px;color:#cc0000;font-weight:bold"></div>
        <div id="loading"></div>
        <div id="container">
            <div class="data"></div>
            <div class="pagination">
                <?php
                $Nav = "";
                If ($page > 1) {
                    $Nav .= "<a    class='page_link'  HREF=\"momforum.php\">First</a> ";
                    $Nav .= "<a   class='page_link'  HREF=\"momforum.php?page=" . ($page - 1) . "\">Prev</a> ";
                }
                $count = 0;
                if ($page - 5 <= 0) {
                    For ($i = 1; $i <= $page; $i++) {
                        if ($page == $i) {
                            $Nav .= "<B><span class='page_link_selected'>$i</span></B> ";
                            $count++;
                        } else {
                            $Nav .= "<a class='page_link' HREF=\"momforum.php?&page=" . $i . "\">$i</a> ";
                            $count++;
                        }
                    }
                    if ($NumberOfPages < 11) {
                        For ($i = $count + 1; $i <= $NumberOfPages; $i++) {
                            $Nav .= "<a   class='page_link'  HREF=\"momforum.php?&page=" . $i . "\">$i</a> ";
                        }
                    } else {
                        For ($i = $count + 1; $i <= 11; $i++) {
                            $Nav .= "<a class='page_link' HREF=\"momforum.php?&page=" . $i . "\">$i</a> ";
                        }
                    }
                }
                if ($page - 5 > 0) {
                    if ($page + 5 <= $NumberOfPages) {
                        For ($i = $page - 5; $i <= $page; $i++) {
                            if ($page == $i) {
                                $Nav .= "<B><span class='page_link_selected'>$i</span></B> ";
                                $count++;
                            } else {
                                $Nav .= "<a class='page_link' HREF=\"momforum.php?&page=" . $i . "\">$i</a> ";
                                $count++;
                            }
                        }
                    }
                   if ($page + 5 > $NumberOfPages) {
                        if ($NumberOfPages <= 10) {
                            For ($i = 1; $i <= $NumberOfPages; $i++) {
                                if ($page == $i)
                                    $Nav .= "<B><span class='page_link_selected'>$i</span></B> ";
                                else
                                    $Nav .= "<a class='page_link' HREF=\"momforum.php?page=" . $i . "\">$i</a> ";
                            }
                        }else {
                            For ($i = $NumberOfPages - 10; $i <= $NumberOfPages; $i++) {
                                if ($page == $i)
                                    $Nav .= "<B><span class='page_link_selected'>$i</span></B> ";
                                else
                                    $Nav .= "<a class='page_link' HREF=\"momforum.php?page=" . $i . "\">$i</a> ";
                            }
                        }
                    }else {
                        For ($i = $page + 1; $i <= $page + 5; $i++) {
                            $Nav .= "<a class='page_link' HREF=\"momforum.php?page=" . $i . "\">$i</a> ";
                        }
                    }
                }
                If ($page < $NumberOfPages) {
                    $Nav .= "<a class='page_link' HREF=\"momforum.php?page=" . ($page + 1) . "\">Next</a> ";
                    $Nav .= "<a class='page_link' HREF=\"momforum.php?page=" . ($NumberOfPages) . "\">Last</a> ";
                }
                if (($NumberOfPages) > 1)
                    print "<table border='0' cellpadding='3' cellspacing='0'><tr><td align='right'><p class='body-text' align='right'>&nbsp;" . $Nav . "&nbsp;&nbsp;&nbsp;</p></td></tr></table>";
                ?>
                    </td>
                </tr>
                        <?php
                    }else {
                        ?>
                <tr>
                    <td  colspan="7" ><b>No Student Avaliable</b></td>

                </tr>
                        <?php
                    }
                    ?>
                </td>
            </tr>   
            </div>
        </div>	                        
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
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