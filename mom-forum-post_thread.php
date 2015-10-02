<?php
session_start();
include("dbconnection.php");
if(isset($_SESSION['user_id']))
{
 $link="$_SERVER[REQUEST_URI]";
$links=explode("/",$link);
if(count($links)==2)
{
    $seo=$links[1];
}  else {
    $seo=$links[2];
}
$seo=substr($seo, 11);
}else if(isset($_SESSION['FBID']))
{
$link="$_SERVER[REQUEST_URI]";
$links=explode("/",$link);
if(count($links)==2)
{
    $seo=$links[1];
}  else {
    $seo=$links[2];
}
$seo=substr($seo, 11);
}
else {
    header("location:login-kid-mom-forum?login");
}


?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="robots" content="noindex">
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
<?php   
  $subforum=getSubForumBySeo($seo);
  $subforums=  mysql_fetch_array($subforum);
  $sub_forum_id=$subforums['mom_sub_forum_id'];
  ?>
<section class="second">
<div class="container">
<div class="row">
<div class="col-md-12 forumsdis">


<h1 class="momh1">WELCOME TO FUNKIDS MOM FORUM</h1><a href=""><img src="images/KHAN_03.png" alt="" class="forumimg" style=""/></a>
<div class="clearfix"></div>
</div>
<div class="breadcrum"><a href="mom-forum" style="color:#FFFFFF;">Mom Forum </a> > <a href="kid-mom-forum-<?php echo $subforums['momforum_seo']; ?>" style="color:#FFFFFF;"><?php echo $subforums['momforum_seo']; ?></a></div>
    
    
<div class="col-md-9 bgwhite" style="">
    
    <h1 class="MOTHERING">POST THREADS In <span><a href="kid-mom-forum-<?php echo $subforums['momforum_seo']; ?>"><?php echo strtoupper($subforums['mom_sub_forum_title']); ?></a></span></h1>
  <form method="post" action="dopostthread.php" enctype="multipart/form-data" name="newThreadForm" id="newThreadForm">
      <input type="hidden" name="sub_forum_id" value="<?php echo $sub_forum_id; ?>">
<input type="hidden" name="sub_form_title" value="<?php echo $seo; ?>">
  <input class="form-control" type="text" name="thread_name"  id="thread_name"  placeholder="Title" style="background:#f0efeb; margin-top:5px;"/>
   <br/>
    <br/>
      <br/>
      <textarea rows="15" cols="50" name="thread_message" class="form-control" placeholder="WRITE HERE" style="background:#f0efeb; margin-top:5px;"></textarea>
    <br/>
    <br/>
      <br/>  
  <input class="form-control" type="file" name="thread_image" style="background:#f0efeb; margin-top:5px;"/>
  
  <br/>
  <input type="submit" value="POST" name="submit" class="btn btn-lg postbtn" style="background:#f7b700; margin:0; padding:5px 15px; font-family:myfont; font-style:italic; font-size:2em; letter-spacing:1px; color:#FFF;">
  <a href="kid-mom-forum-<?php echo $subforums['momforum_seo']; ?>" class="btn btn-lg postbtn" style="background:#f7b700;  margin:0; padding:5px 15px; font-family:myfont; font-style:italic; font-size:2em; letter-spacing:1px; color:#FFF;">Back</a>
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