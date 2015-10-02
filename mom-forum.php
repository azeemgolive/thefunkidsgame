<?php
session_start();
include("dbconnection.php");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta content="parenting tips, mom blogs, babycenter community, parenting skills, positive parenting, chat with moms, parenting issues" name="keywords"  />
        <meta content="Mom Forum - A great mother and baby forum that offers parenting tips, positive parenting skills and chat with moms on how best to nurture their babies." name="description"/>
        <title>The Fun Kids Moms Forums - Mom Chat for Positive Parenting</title>
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
<?php 
include("includes/header.php");
?>

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
<div class="row forumsdis">
<div class="col-md-12">


<h1 class="momh1">WELCOME TO MOM FORUM</h1>
<div class="clearfix"></div>
</div>






<div class="col-md-9 bgwhite">
<table class="table-responsive table-bordered table-condensed" style="width:100%; background:#FFF;">
  <tr>
    <td class="" style="background:#f7b700; width:30%;"><span class="tableformyelo">FORUM</span></td>
    <td class="text-center" style="background:#f7b700; width:54%;"><span class="tableform">LATEST POST</span></td>
    <td class="text-center" style="background:#f7b700; width:8%;"><span class="tableform">THREADS</span></td>
    <td class="text-center" style="background:#f7b700; width:8%;"><span class="tableform">POSTS</span></td>
  </tr>
</table> 
<?php
$strictForm=getStrictMomForum();
if($strictForm>0)
{
    while($strictmomforum=  mysql_fetch_array($strictForm))
     {
       $strict_mom_forum_id=  $strictmomforum['mom_forum_id'];
?>
<h1 class="MOTHER"><?php echo strtoupper($strictmomforum['mom_forum_title']);  ?></h1>    
<?php      
  $strictsubforums=getStrictSubForumByForumId($strict_mom_forum_id);
  if($strictsubforums>0)
  {
      while($strictsubforum=  mysql_fetch_array($strictsubforums))
      {
 ?>   
<table class="table-responsive table-bordered table-condensed" style="width:100%; background:#FFF;">  
    <tr>
        <td><img src="subforum_smilies/<?php echo $strictsubforum['subforum_simlies'];  ?>" height="50" width="50"></td>
        <td style="background:#fff; width:30%;"><strong>Sticky:<span class="tabletd"><a href="kid-mom-forum-<?php echo $strictsubforum['momforum_seo']; ?>"><?php echo $strictsubforum['mom_sub_forum_title']; ?></a></span><strong></td>
    <td style="background:#f4f4f4; width:54%;"><span class="tabletd">
        <?php 
        $last_thread=getLastThreadBySubForum($strictsubforum['mom_sub_forum_id']); 
        $lastthread=  mysql_fetch_array($last_thread);
        ?>
            <a href="kid-mom-forum-<?php echo $strictsubforum['momforum_seo']; ?>"><?php echo $lastthread['thread_name'];  ?></a>
        <?php              
        if($lastthread['user_id']>0){
        $user_detail=  getUserById($lastthread['user_id']);
        $user=  mysql_fetch_array($user_detail);
         echo "<br> by ";
        ?>
        <span style='color: #688031'><?php echo $user['name']; ?></span>    
        <?php
        echo "<br>";
        echo date("d-m-y",strtotime($lastthread['createdAt']));       
        }
        ?>
        </span></td>
    <td class="text-center" style="background:#efefef; width:8%;"><sprean class="tabletd">
        <?php 
         $last_thread=countAllThreadsBySubForum($strictsubforum['mom_sub_forum_id']); 
         $lastthread=  mysql_fetch_array($last_thread);
         echo $lastthread[0];
        ?>
       </span></td>
    <td class="text-center" style="background:#e4e2e3; width:8%;"><span class="tabletd">
        <?php              
         $totalposts=countAllPostBySubForum($strictsubforum['mom_sub_forum_id']); 
         $totalpost=  mysql_fetch_array($totalposts);
         echo $totalpost[0];                 
        ?></span></td>
  </tr>   
</table>
<?php
    }
  }
    }
     }
?>  
 <?php 
 $momforums=  getAllMomForum();
 if($momforums>0)
 {
     while($momforum=  mysql_fetch_array($momforums))
     {
       $mom_forum_id=  $momforum['mom_forum_id'];
?>
    <h1 class="MOTHER"><?php echo strtoupper($momforum['mom_forum_title']);  ?></h1> 
 <?php 
     
  $subforums=getSubForumByForumId($mom_forum_id);
  if($subforums>0)
  {
      while($subforum=  mysql_fetch_array($subforums))
      {
 ?>   
<table class="table-responsive table-bordered table-condensed" style="width:100%; background:#FFF;">  
    <tr>
        <td><img src="subforum_smilies/<?php echo $subforum['subforum_simlies'];  ?>" height="50" width="50"></td>
        <td style="background:#fff; width:30%;"><span class="tabletd"><a href="kid-mom-forum-<?php echo $subforum['momforum_seo']; ?>"><?php echo $subforum['mom_sub_forum_title']; ?></a></span></td>
    <td style="background:#f4f4f4; width:54%;"><span class="tabletd">
        <?php 
        $last_thread=getLastThreadBySubForum($subforum['mom_sub_forum_id']); 
        $lastthread=  mysql_fetch_array($last_thread);
        ?>
            <a href="kid-mom-forum-<?php echo $subforum['momforum_seo']; ?>"><?php echo $lastthread['thread_name'];  ?></a>
        <?php              
        if($lastthread['user_id']>0){
        $user_detail=  getUserById($lastthread['user_id']);
        $user=  mysql_fetch_array($user_detail);
         echo "<br> by ";
        ?>
        <span style='color: #688031'><?php echo $user['name']; ?></span>    
        <?php
        echo "<br>";
        echo date("d-m-y",strtotime($lastthread['createdAt']));       
        }
        ?>
        </span></td>
    <td class="text-center" style="background:#efefef; width:8%;"><sprean class="tabletd">
        <?php 
         $last_thread=countAllThreadsBySubForum($subforum['mom_sub_forum_id']); 
         $lastthread=  mysql_fetch_array($last_thread);
         echo $lastthread[0];
        ?>
       </span></td>
    <td class="text-center" style="background:#e4e2e3; width:8%;"><span class="tabletd">
        <?php              
         $totalposts=countAllPostBySubForum($subforum['mom_sub_forum_id']); 
         $totalpost=  mysql_fetch_array($totalposts);
         echo $totalpost[0];                 
        ?></span></td>
  </tr>   
</table>
    
<?php
      }
  }
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