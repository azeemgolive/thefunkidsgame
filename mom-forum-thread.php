<?php
session_start();
$link="$_SERVER[REQUEST_URI]";
$links=explode("/",$link);
if(count($links)==2)
{
    $seo=$links[1];
}  else {
    $seo=$links[2];
}
$seo=substr($seo, 14);
include("dbconnection.php");
$subforum=getSubForumBySeo($seo);
$subforums=  mysql_fetch_array($subforum);
$sub_forum_id=$subforums['mom_sub_forum_id'];
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="robots" content="noindex">
<title><?php echo $subforums['sub_forum_title'];  ?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/styletwo.css"/>
<link href="owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="owl-carousel/owl.theme.css" rel="stylesheet">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
<link type="text/css" rel="stylesheet" href="css/styleext.css" />
</head>
<body>
    <?php 
include_once("analyticstracking.php");
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=481352955356475";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php include("includes/header.php"); ?>
<section>
<div class="container-fluid">
<div class="row row2">
<img src="images/BADAL1.png" alt="" class="badal"/>
</div>
</div>
</section>
<section class="second">
<div class="container">
    
  
</div>
</div>
</section>

<section class="second">
<div class="container">
<div class="row">
<div class="col-md-12 forumsdis">


    <h1 class="momh1"><a href="mom-forum" style="text-decoration:none; color:white;">WELCOME TO MOM FORUM</a></h1><a href="new-thread-<?php echo $subforums['momforum_seo'];?>"><img src="images/KHAN_03.png" alt="" class="forumimg" style=""/></a>
<div class="clearfix"></div>
</div>
    <div class="breadcrum"><a href="mom-forum" style="color:#FFFFFF;">Mom Forum </a></div>
    <div class="clearfix" style="margin-top:5px;"></div>
    
    
<div class="col-md-9 bgwhite">
  
  <h1 class="MOTHERING">THREADS IN FORUM : <?php echo $subforums['mom_sub_forum_title'];?></h1>
 
  <table class="table-responsive table-bordered table-condensed" style="width:100%; background:#FFF;">
  <tr>
    <td class="" style="background:#24a1fa; width:30%;"><span class="tableformblu">THREAD / THREAD STARTED</span></td>
    <td class="text-center" style="background:#24a1fa; width:54%;"><span class="tableform">LATEST POST</span></td>
    <td class="text-center" style="background:#24a1fa; width:8%;"><span class="tableform">VIEWS</span></td>
    <td class="text-center" style="background:#24a1fa; width:8%;"><span class="tableform">REPLY</span></td>
  </tr>
</table>  
<hr/> 
<?php 
$strictthreads=getStrictThreadsBySubForumId($sub_forum_id);
if($strictthreads>0)
{
    while($strictthread=  mysql_fetch_array($strictthreads))
    {
        ?>
<table class="table-responsive table-bordered table-condensed" style="width:100%; background:#FFF;">  
    <tr>
        <td><img src="subforum_smilies/msg-mf.png"></td>
        <td style="background:#fff; width:30%;" valign="top">
            <?php 
            if($strictthread['isStrict']=='yes')
            {
            ?>
            <strong>Sticky:<span class="tabletd"><a href="mom-forum-thread-<?php echo $strictthread['thread_seo']; ?>"><?php echo $strictthread['thread_name']; ?></a></span></strong>
            <?php
    }else
    {
    ?>
     <span class="tabletd"><a href="mom-forum-thread-<?php echo $strictthread['thread_seo']; ?>"><?php echo $strictthread['thread_name']; ?></a></span>
       <?php
    }
    ?>
        </td>
        <td style="background:#f4f4f4; width:54%;""><span class="tabletd">
             <a href="mom-forum-thread-<?php echo $strictthread['thread_seo']; ?>">
                    <?php            
                   $string = strip_tags($strictthread['thread_message']);
if (strlen($string) > 100) {

    // truncate string
    $stringCut = substr($string, 0, 100);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
}
echo $string;  
        if($strictthread['user_id']>0){
        $user_detail=  getUserById($strictthread['user_id']);
        $user=  mysql_fetch_array($user_detail);
        echo "<br> by ";
        ?>
        <span style='color: #688031'><?php echo $user['name']; ?><br></span>
        <?php      
        echo date("d-m-y",strtotime($strictthread['createdAt']));
        }
        ?>
             </a>
            </span></td>
    <td class="text-center" style="background:#efefef; width:8%;"><sprean class="tabletd">
  <?php
$counter = 0;
if(! isset($_SESSION['visited'])):
        $counter +=1;
        $_SESSION['visited'] = TRUE;
        $_SESSION['counter'] = $counter;
endif;
echo $_SESSION['counter'];
?></span></td>
    <td class="text-center" style="background:#e4e2e3; width:8%;"><span class="tabletd">
       <?php 
         $last_postt=countAllRepliesByThread($strictthread['thread_id']); 
         $lastpost=  mysql_fetch_array($last_postt);
         echo $lastpost[0];
        ?>
        </span></td>
  </tr>
</table>
<?php        
    }
}
?>
<?php 
$threads=getThreadsBySubForumId($sub_forum_id);
if($threads>0)
{
    while($thread=  mysql_fetch_array($threads))
    {
        ?>
<table class="table-responsive table-bordered table-condensed" style="width:100%; background:#FFF;">  
    <tr>
       <td><img src="subforum_smilies/msg-mf.png"></td>
        <td style="background:#fff; width:30%;" valin="top"><span class="tabletd"><a href="mom-forum-thread-<?php echo $thread['thread_seo']; ?>"><?php echo $thread['thread_name']; ?></a></span></td>
                <td style="background:#f4f4f4; width:54%;"><span class="tabletd">
             <a href="mom-forum-thread-<?php echo $thread['thread_seo']; ?>">
                    <?php            
                   $string = strip_tags($thread['thread_message']);
if (strlen($string) > 100) {

    // truncate string
    $stringCut = substr($string, 0, 100);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
}
echo $string;  
        if($thread['user_id']>0){
        $user_detail=  getUserById($thread['user_id']);
        $user=  mysql_fetch_array($user_detail);
        echo "<br> by ";
        ?>
        <span style='color: #688031'><?php echo $user['name']; ?><br></span>
        <?php      
        echo date("d-m-y",strtotime($thread['createdAt']));
        }
        ?>
             </a>
            </span></td>
    <td class="text-center" style="background:#efefef; width:8%;"><sprean class="tabletd">
  <?php
$counter = 0;
if(! isset($_SESSION['visited'])):
        $counter +=1;
        $_SESSION['visited'] = TRUE;
        $_SESSION['counter'] = $counter;
endif;
echo $_SESSION['counter'];
?></span></td>
    <td class="text-center" style="background:#e4e2e3; width:8%;"><span class="tabletd">
       <?php 
         $last_postt=countAllRepliesByThread($thread['thread_id']); 
         $lastpost=  mysql_fetch_array($last_postt);
         echo $lastpost[0];
        ?>
        </span></td>
  </tr>
</table>
<?php
        
    }
}

?>
</div>


<div class="col-md-3">
<?php
include("includes/forum-right-panel.php");
?>

</div>

</div>
</div>



</section>

<section class="latestgames">

<div class="container-fluid">
<div class="row">
<img src="images/BADAL11.png" alt="" class="footercloud"/>
</div>
</div>
</section>
<?php
include("includes/footer.php");
?>






</body>
</html>