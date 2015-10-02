<?php
session_start();
include("dbconnection.php");
$thread_id=$_REQUEST['id'];
$thread=  getSubForumById($thread_id);
$thread_detail=mysql_fetch_array($thread);        
$user_id=$thread_detail['user_id'];
$user_record=  getUserById($user_id);
$user=  mysql_fetch_array($user_record);
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
<link href="owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="owl-carousel/owl.theme.css" rel="stylesheet">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
<link type="text/css" rel="stylesheet" href="css/styleext.css" />
</head>
<body>
<?php include("includes/header.php"); ?>
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
    <div class="row">
      <div class="col-md-12 for"><a href=""><img src="images/KHAN_03.png" alt="" class="postdetailimg"/></a> 
        <!--<button class="btn btn-xs" style="background:#f7b700; color:#fff; margin-left:40px; padding:3px 8px; font-weight:bold; font-size:1.2em;">REPLY</button>--></div>
      <div class="col-md-12 forums">
        <table class="table-responsive table-condensed" style="width:100%;">
          <tr>
            <td class="" style="background:; width:65%;"><span class=""> Therad Started </span></td>
            <td class="text-center" style="background:#dadada; width:35%;"><span class="tableform" style="color:#000;">THREAD TOOL</span></td>
          </tr>
        </table>
      </div>
      <a href="mom-thread-reply.php?id=<?php echo $thread_detail['mom_sub_forum_id']; ?>">
      <button class="btn btn-xs" style="background:#f7b700; color:#fff; margin:10px 0 0 20px; padding:3px 8px; font-weight:bold; font-size:1.2em;">REPLY</button>
      </a>
      <div class="col-md-12 postdtl">
        <div class="col-md-12 postdtl3 QUICK1">
          <h3 class="posth3" style=""><?php echo strtoupper($thread_detail['mom_sub_forum_title']); ?></h3>
          <br>
          <?php
   echo $thread_detail['subforum_description'];
    ?>
        </div>
        <div class="col-md-2 brown">
          <h3><?php echo $user['name']; ?></h3>
          <p> join date:<?php echo date("M-y",strtotime($user['createdAt']));?> <br/>
            location:<?php echo $user['address']; ?> <br/>
            Post:
            <?php $post=countPostByUserId($user['user_id']); 
$totalpost=  mysql_fetch_array($post);
echo $totalpost[0];
?>
            
            <!--<button class="btn btn-xs" style="background:#f7b700; color:#fff; margin-left:40px; padding:3px 8px; font-weight:bold; font-size:1.2em;">REPLY</button>--> 
        </div>
        <div class="col-md-10 offwhite" style="background:;">
          <h3><strong><?php echo $thread_detail['mom_sub_forum_title']; ?></strong></h3>
          <p><?php echo $thread_detail['subforum_description']  ?></p>
          <br/>
          <br/>
          <a href="mom-thread-quick-reply.php?id=<?php echo $thread_detail['mom_sub_forum_id']; ?>">
          <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">QUICK REPLY</button>
          </a> </div>
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
          <h3><?php echo $userthread['name']; ?></h3>
          <p> join date:<?php echo date("M-y",strtotime($userthread['createdAt']));?> <br/>
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
          <br/>
          <br/>
          <a href="mom-thread-quick-reply.php?id=<?php echo $thread_detail['mom_sub_forum_id']; ?>">
          <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">QUICK REPLY</button>
          </a> </div>
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
          <h3><?php echo $userthread['name']; ?></h3>
          <p> join date:<?php echo date("M-y",strtotime($userthread['createdAt']));?> <br/>
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
          <br/>
          <br/>
          <button class="btn btn-xs" style="background:#f7b700; color:#000; padding:3px 8px; font-weight:bold; font-size:1.2em;">QUICK REPLY</button>
        </div>
      </div>
      <?php
 }
}
?>
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