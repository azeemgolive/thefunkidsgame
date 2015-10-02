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
$seo=substr($seo, 17);
include("dbconnection.php");
$thread=  getThreadBySeo($seo);
$thread_detail=mysql_fetch_array($thread);       
$thread_id=$thread_detail['thread_id'];
$user_id=$thread_detail['user_id'];
$user_record=  getUserById($user_id);
$user=  mysql_fetch_array($user_record);
$thread_sub_forum=  getSubForumByThread($thread_detail['mom_sub_forum_id']);
$sub_forum_thread=  mysql_fetch_array($thread_sub_forum);
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
<?php 
include("includes/header.php");
?>
<section>
  <div class="container-fluid">
    <div class="row row2"> <img src="images/BADAL1.png" alt="" class="badal"/> </div>
  </div>
</section>
<section class="second">
  <div class="container"> </div>
  </div>
</section>
<section class="second">
  <div class="container">
    <div class="row"> <br>
      <br>
      <br>
      <div class="col-md-12 forums">
        <table class="table-responsive table-condensed" style="width:100%;">
          <tr>
            <td class="" style="width:65%;"><span class="font-weight:bold"> <strong>
              <?php 
               echo $thread_detail['thread_name'];
               ?>
              </strong> </span></td>
            <td class="text-center" style="background:#dadada; width:35%;"><span class="tableform" style="color:#000;"> started at <?php echo date("d-m-y",strtotime($thread_detail['createdAt'])); ?> </span></td>
          </tr>
        </table>
      </div>
      <a href="mom-thread-reply-<?php echo $thread_detail['thread_seo']; ?>">
      <button class="btn btn-xs" style="background:#f7b700; color:#fff; margin:5px 0 0 20px; padding:3px 8px; font-weight:bold; font-size:1.2em; float:left;">REPLY</button>
      </a>
      <div class="breadcrum"><a href="mom-forum" style="color:#FFFFFF;">Mom Forum > </a><a style="color:#FFFFFF;" href="kid-mom-forum-<?php echo $sub_forum_thread['momforum_seo']; ?>">
        <?php 
               echo $thread_detail['thread_name'];
               ?>
        </a>
       
        </div>
         <div class="clear"></div>
      <div class="row">
        <div class="col-md-9">
          <div class="col-md-12 postdtl">
            <div class="col-md-12 postdtl3 QUICK1">
              <h3 class="posth3" style=""><?php echo strtoupper($thread_detail['thread_name']); ?></h3>
            </div>
            <div class="col-md-2 brown">
              <h3>
                <?php
if($user['user_name']!="")
{
?>
                <?php echo $user['user_name']; ?>
                <?php
}else
{
?>
                <?php echo $user['name']; ?>
                <?php    
}
?>
              </h3>
              <?php
    if($user['userimages']!="")
    {
    ?>
              <img src="userimages/<?php echo $user['userimages']; ?>" alt="" width="100" height="100"/>
              <?php
    }elseif(isset($_SESSION['FBID']))
    {
    ?>
              <img src="https://graph.facebook.com/<?php echo $user['Fuid'] ?>/picture" width="100" height="100">
              <?php
    }else{
    ?>
              <img src="images/user-avatar.png" alt="" width="100" height="100"/>
              <?php
    }
    ?>
              <p> join date:<?php echo date("d-M-Y",strtotime($user['createdAt']));?> <br/>
                location:<?php echo $user['address']; ?> <br/>
                Post:
                <?php $post=countPostByUserId($user['user_id']); 
$totalpost=  mysql_fetch_array($post);
echo $totalpost[0];
?>
                
                <!--<button class="btn btn-xs" style="background:#f7b700; color:#fff; margin-left:40px; padding:3px 8px; font-weight:bold; font-size:1.2em;">REPLY</button>--> 
            </div>
            <div class="col-md-9 offwhite" style="background:;">
              <h3><strong><?php echo $thread_detail['thread_name']; ?></strong></h3>
              <p><?php echo $thread_detail['thread_message']  ?></p>
              <br/>
              <br/>
              <a href="mom-thread-quick-reply-<?php echo $thread_detail['thread_seo']; ?>">
              <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">QUICK REPLY</button>
              </a>
              <?php 
if(isset($_SESSION['user_id']))
{
if($_SESSION['user_id']==$thread_detail['user_id'])
{    
?>
              <a href="edit-mom-thread-<?php echo $thread_detail['thread_id']; ?>">
              <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">Edit</button>
              </a> <a href="delete-mom_thread.php?id=<?php echo $thread_detail['thread_id']; ?>" onClick="return confirmThread();">
              <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">Delete</button>
              </a>
              <?php
}
}
?>
              <?php 
if(isset($_SESSION['FBID']))
{
 $user_facebook_id=getUserByFaceBookId($_SESSION['FBID']);
 if($user_facebook_id){
 $face_book_user=  mysql_fetch_array($user_facebook_id);
 $user_id=$face_book_user['user_id'];
 }
 if($user_id==$thread_detail['user_id'])
 {
?>
              <a href="edit-mom-thread-<?php echo $thread_detail['thread_id']; ?>">
              <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">Edit</button>
              </a> <a href="delete-mom_thread.php?id=<?php echo $thread_detail['thread_id']; ?>" onClick="return confirmThread();">
              <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">Delete</button>
              </a>
              <?php
}
}
?>
            </div>
          </div>
          <?php
$get_reply=getReplyByThreadByQoute($thread_id);
if($get_reply>0)
{
    while($reply_get=  mysql_fetch_array($get_reply))
    {
        $thread_user=  getUserById($reply_get['user_id']);
        $userthread=  mysql_fetch_array($thread_user);
?>
          <div class="col-md-12 postdtl">
            <div class="col-md-2 brown">
              <h3>
                <?php
if($userthread['user_name']!="")
{
?>
                <?php echo $userthread['user_name']; ?>
                <?php
}else
{
?>
                <?php echo $userthread['name']; ?>
                <?php    
}
?>
              </h3>
              <?php
    if($userthread['userimages']!="")
    {
    ?>
              <img src="userimages/<?php echo $userthread['userimages']; ?>" alt="" width="100" height="100"/>
              <?php
    }elseif(isset($_SESSION['FBID']))
    {
    ?>
              <img src="https://graph.facebook.com/<?php echo $userthread['Fuid'] ?>/picture" width="100" height="100">
              <?php
    }else{
    ?>
              <img src="images/user-avatar.png" alt="" width="100" height="100"/>
              <?php
    }
    ?>
              <p> join date:<?php echo date("d-M-Y",strtotime($userthread['createdAt']));?> <br/>
                location:<?php echo $userthread['address']; ?> <br/>
                Post:
                <?php $posts=countPostByUserId($userthread['user_id']); 
$totalposts=  mysql_fetch_array($posts);
echo $totalposts[0];
?>
                
                <!--<button class="btn btn-xs" style="background:#f7b700; color:#fff; margin-left:40px; padding:3px 8px; font-weight:bold; font-size:1.2em;">REPLY</button>--> 
            </div>
            <div class="col-md-10 offwhite" style="background:">
              <p>Quote</p>
              <p><?php echo $reply_get['reply_name'];?></strong>
                </h3>
              <p>
                <?php  echo $reply_get['reply_message'] ?>
              </p>
              <?php 
if($reply_get['reply_image']=='')
{
?>
              <img style="display:none"/>
              <?php
}else
{
?>
              <?php
}
?>
              <br/>
              <br/>
              <a href="mom-thread-quick-reply-<?php echo $thread_detail['thread_seo']; ?>">
              <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">QUICK REPLY</button>
              </a>
              <?php 
if(isset($_SESSION['user_id']))
{
if($_SESSION['user_id']==$reply_get['user_id'])
{
?>
              <a href="edit-thread-quick-reply-<?php echo $reply_get['thread_reply_id']; ?>">
              <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">Edit</button>
              </a> <a href="delete-mom_thread_reply.php?id=<?php echo $reply_get['thread_reply_id']; ?>" onClick="return confirmThreadReply();">
              <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">Delete</button>
              </a>
              <?php
}
}
?>
              <?php 
if(isset($_SESSION['FBID']))
{
 $user_facebook_id=getUserByFaceBookId($_SESSION['FBID']);
 if($user_facebook_id){
 $face_book_user=  mysql_fetch_array($user_facebook_id);
 $user_id=$face_book_user['user_id'];
 }
if($user_id==$reply_get['user_id'])
{
?>
              <a href="edit-thread-quick-reply-<?php echo $reply_get['thread_reply_id']; ?>">
              <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">Edit</button>
              </a> <a href="delete-mom_thread_reply.php?id=<?php echo $reply_get['thread_reply_id']; ?>" onClick="return confirmThreadReply();">
              <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">Delete</button>
              </a>
              <?php
}
}
?>
            </div>
          </div>
          <?php
 }
}
?>
          <?php
$get_reply=getReplyByThreadByReply($thread_id);
if($get_reply>0)
{
    while($reply_get=  mysql_fetch_array($get_reply))
    {
        $thread_user=  getUserById($reply_get['user_id']);
        $userthread=  mysql_fetch_array($thread_user);
?>
          <div class="col-md-12 postdtl">
            <div class="col-md-2 brown">
              <h3>
                <?php
if($userthread['user_name']!="")
{
?>
                <?php echo $userthread['user_name']; ?>
                <?php
}else
{
?>
                <?php echo $userthread['name']; ?>
                <?php    
}
?>
              </h3>
              <?php
    if($userthread['userimages']!='')
    {
    ?>
              <img src="userimages/<?php echo $userthread['userimages']; ?>" alt="" width="100" height="100"/>
              <?php
    }elseif(isset($_SESSION['FBID']))
    {
    ?>
              <img src="https://graph.facebook.com/<?php echo $userthread['Fuid'] ?>/picture" width="100" height="100">
              <?php
    }else{
    ?>
              <img src="images/user-avatar.png" alt="" width="100" height="100"/>
              <?php
    }
    ?>
              <p> join date:<?php echo date("d-M-Y",strtotime($userthread['createdAt']));?> <br/>
                location:<?php echo $userthread['address']; ?> <br/>
                Post:
                <?php $posts=countPostByUserId($userthread['user_id']); 
$totalposts=  mysql_fetch_array($posts);
echo $totalposts[0];
?>
                
                <!--<button class="btn btn-xs" style="background:#f7b700; color:#fff; margin-left:40px; padding:3px 8px; font-weight:bold; font-size:1.2em;">REPLY</button>--> 
            </div>
            <div class="col-md-10 offwhite" style="background:">
              <h3><strong></strong></h3>
              <p><?php echo $reply_get['reply_name'];?></strong>
                </h3>
              <p>
                <?php  echo $reply_get['reply_message'] ?>
              </p>
              <?php 
if($reply_get['reply_image']=='')
{
?>
              <img style="display:none"/>
              <?php
}else
{
?>
              <?php
}
?>
              <br/>
              <br/>
              <a href="mom-thread-quick-reply-<?php echo $thread_detail['thread_seo']; ?>">
              <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">QUICK REPLY</button>
              </a>
              <?php 
if(isset($_SESSION['user_id']))
{
if($_SESSION['user_id']==$reply_get['user_id'])
{
?>
              <a href="edit-thread-reply-<?php echo $reply_get['thread_reply_id']; ?>">
              <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">Edit</button>
              </a> <a href="delete-mom_thread_reply.php?id=<?php echo $reply_get['thread_reply_id']; ?>" onClick="return confirmThreadReply();">
              <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">Delete</button>
              </a>
              <?php
}
}
?>
              <?php 
if(isset($_SESSION['FBID']))
{
 $user_facebook_id=getUserByFaceBookId($_SESSION['FBID']);
 if($user_facebook_id){
 $face_book_user=  mysql_fetch_array($user_facebook_id);
 $user_id=$face_book_user['user_id'];
 }
if($user_id==$reply_get['user_id'])
{
?>
              <a href="edit-thread-reply-<?php echo $reply_get['thread_reply_id']; ?>">
              <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">Edit</button>
              </a> <a href="delete-mom_thread_reply.php?id=<?php echo $reply_get['thread_reply_id']; ?>" onClick="return confirmThreadReply();">
              <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">Delete</button>
              </a>
              <?php
}
}
?>
            </div>
          </div>
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
  </div>
</section>
<section> </section>
<section class="latestgames">
  <div class="container-fluid">
    <div class="row"> <img src="images/BADAL11.png" alt="" class="footercloud"/> </div>
  </div>
</section>
<?php
include("includes/footer.php");
?>
</body>
</html>