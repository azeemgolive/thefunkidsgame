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
$seo=substr($seo, 24);
include("dbconnection.php");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>The FUN KIDS</title>
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


<h1 class="momh1">WELCOME TO FUNKIDS MOM FORUM</h1>
<div class="clearfix"></div>
</div>

 <?php
 $thread= getThreadReplyById($seo);
 $threads=  mysql_fetch_array($thread);
  $mom_threads=  getThreadById($threads['threadd_id']);
 $mom_thread=  mysql_fetch_array($mom_threads);
 $thread_sub_forum=  getSubForumByThread($threads['mom_sub_forum_id']);
$sub_forum_thread=  mysql_fetch_array($thread_sub_forum);
 ?>
    
 <div class="breadcrum">
    <a href="mom-forum" style="color:#FFFFFF;">Mom Forum </a> > <a href="kid-mom-forum-<?php echo $sub_forum_thread['momforum_seo']; ?>" style="color:#FFFFFF;"><?php echo $sub_forum_thread['mom_sub_forum_title']; ?></a> > <a href="mom-forum-thread-<?php echo $mom_thread['thread_seo']; ?>" style="color:#FFFFFF;"><?php echo $mom_thread['thread_name']; ?></a>
</div> 
    
<div class="col-md-9 bgwhite" style="">
  <h1 class="MOTHERING">Quick Reply to Thread </h1>
  <form method="post" action="doeitpostquickreplythread.php" enctype="multipart/form-data" name="newQuickReplyThreadForm" id="newQuickReplyThreadForm">
     <input type="hidden" name="thread_reply_id" value="<?php echo $threads['thread_reply_id']; ?>"> 
  <input class="form-control" type="text" name="thread_name" id="thread_name" placeholder="Title" style="background:#f0efeb; margin-top:5px;" value="<?php echo $threads['reply_name']; ?>"/>
   <br/>
    <br/>
      <br/>
      <textarea rows="15" cols="50" name="thread_message" class="form-control" placeholder="WRITE HERE" style="background:#f0efeb; margin-top:5px;"><?php echo $threads['reply_message']; ?></textarea>
    <br/>
    <br/>
      <br/>  
  <input class="form-control" type="file" name="thread_image" style="background:#f0efeb; margin-top:5px;"/>
  
  <br/>
  <input type="submit" value="POST" name="submit" class="btn btn-lg postbtn" style="background:#f7b700; float:; margin:0; padding:5px 15px; font-family:myfont; font-style:italic; font-size:2em; letter-spacing:1px; color:#FFF;">
  
  </form>
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