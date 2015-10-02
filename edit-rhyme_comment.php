<?php
session_start();
if(isset($_GET['id']))
{
include("dbconnection.php");
$rhyme_details=  getRhymeById($_GET['id']);
$rhyme_detail=  mysql_fetch_array($rhyme_details);
}else
{
    header("rhymes.php");
}
?>
<!doctype html>
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="<?php echo $rhyme_detail['meta_tag_keyword']; ?>" name="keywords"  />
<meta content="<?php echo $rhyme_detail['meta_tag_description']; ?>" name="description"/>
<meta property="og:image" content="http://www.thefunkids.com/rhymes/<?php echo $rhyme_detail['rhyme_image']; ?>" />
<meta name="robots" content="noindex">       
<title><?php echo $rhyme_detail['rhyme_title']; ?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/styletwo.css"/>
<script src="js/jquery-1.4.4.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script>
  $(document).ready(function() {    
	$("#scroll").niceScroll();

  });
</script>
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
<?php
$rhyme_id=$_REQUEST['id'];
$rhymedetails=getRhymeById($rhyme_id);
$detailrhyme=  mysql_fetch_array($rhymedetails);
?>
    
<div class="container-fluid">
  <div class="row"> <img src="images/cloud-1.png" alt="" class="cloud"/> </div>
</div>
<section class="sec1">
  <div class="container">
  <div class="row">
   <div class="col-lg-10">
  
    <div class="row">
      <div class="col-lg-6"> 
       <?php  
  echo $detailrhyme['rhyme_code'];  
  ?>
          <div class="row">
      <div class="col-lg-12">
        <div class="share-video">
          <div class="row">
            <div class="col-lg-5">
              <h2 style="font-size:19px; padding-top:5px;">Share This Video</h2>
            </div>
            <div class="col-lg-7"> 
            <a href="javascript:;"><img src="images/icon-twitter.png" alt="" class=""/></a> 
            <a href="javascript:;"><img src="images/icon-pintest.png" alt="" class=""/></a>
            <a href="javascript:;"><img src="images/icon-instagram.png" alt="" class=""/></a>  
            <a href="javascript:;"><img src="images/icon-gplus.png" alt="" class=""/></a>
            <a href="javascript:;"><img src="images/icon-fb.png" alt="" class=""/></a>  </div>
          </div>
        </div>
      </div>
    </div>
      <?php
 $title=urlencode($detailrhyme['rhyme_title']);
 //$url=urlencode('http://www.facebook.com/yourfanpage');
 $summary=urlencode($detailrhyme['meta_tag_description']);
 $rhyme_image='http://www.thefunkids.com/rhymes/'.$detailrhyme['rhyme_image'];
 ?>
      
      </div>
      
      <div class="col-lg-6"> 
      <div class="video-detail" id="scroll">
      <h2>
      <?php 
      echo $detailrhyme['rhyme_name'];
      ?>
      
      </h2>
      
      <p>
      <?php 
        echo $detailrhyme['rhyme_decription'];
      ?>
      </p>
      
      </div>
      
      
      </div>
    </div>
    
    <?php 
   if(!isset($_SESSION['user_id']))
   {   
   ?>
    <div class="row">
      <div class="col-lg-12">
        <div class="leave-comment">
          <div class="row">
            <div class="col-lg-9 col-sm-4">
              <h2>Leave A Comment<br/>
                <span>You need to log in for commenting</span> </h2>
            </div>
            <div class="col-lg-3 col-sm-4"> <a href="/signup-mother-baby-forum" class="btn-coment sign-up">SIGN UP</a> <a href="/login-kid-mom-forum" class="btn-coment sign-in">LOG IN</a> </div>
          </div>
        </div>
      </div>
    </div>
      <?php
   }
   ?>
    <div class="row">
      <div class="col-lg-12">
        <div class="comment-wrap">
            <a name="rhymes"> </a>
            <br>
    <?php
    if(isset($_REQUEST['comment']))
    {
    ?>
    <p class="text-center modiration">Your Comment Waiting For Moderation ...</p> 
    <?php
    }
    ?>
    <?php
    if(isset($_REQUEST['error']))
    {
    ?>
    <p class="text-center modiration">Please Login for comments</p>   
    <?php
    }
    ?>
    <?php 
     $rhyme_comment_id=$_REQUEST['rhyme_comment_id'];
     $rhyme_comments_view=  getRhymeCommentById($rhyme_comment_id);
     $rhyme_comment_view=  mysql_fetch_array($rhyme_comments_view);     
    ?>
    <form method="post" action="doeditpostcomments.php">
     <input type="hidden" name="rhyme_id" value="<?php echo $rhyme_id; ?>"/>
        <input type="hidden" name="rhyme_comment_id" value="<?php echo $rhyme_comment_id; ?>"/>
     <textarea name="comments" id="comments" cols="" rows=""><?php echo $rhyme_comment_view['comments']; ?></textarea>
     <a href="#rhymes"><input type="submit" name="submit" value="POST A COMMENT" class="btn-coment sign-in"></a>
    </form>
   <div class="clearfix"></div>  
    <div class="discus">
         
<?php

    $rhyme_comment=getApproveRhymeComment($rhyme_id);
    if($rhyme_comment>0)
    {
       while($rhymecomment=  mysql_fetch_array($rhyme_comment))
       {
          $user_id=$rhymecomment['user_id'];          
          $user_comment=  getUserById($user_id);
          while($user=  mysql_fetch_array($user_comment))
          {
    ?>
    <div class="action">
        <h4>  
    <?php
        echo $user['name'];
        ?>
            </h4>
    <br/>
    <?php
    if($user['userimages']!='')
    {
    ?>
    <img src="userimages/<?php echo $user['userimages']; ?>" alt="" width="70" height="70"/>
    <?php
    }elseif(isset($_SESSION['FBID']))
    {
    ?>
    <img src="https://graph.facebook.com/<?php echo $user['Fuid'] ?>/picture" width="70" height="70">
    <?php
    }else{
    ?>
    <img src="images/user-avatar.png" alt=""/>
    <?php
    }
    ?>
    <p><?php echo $rhymecomment['comments']; ?> 
        <br/><?php if($rhymecomment['isActive']=='no'){ echo"your comments are pending and waiting for approval";   }?> </p>
   <div class="clearfix"></div>  
   
     
         
                    
<?php 
if(isset($_SESSION['user_id']))
{
if($_SESSION['user_id']==$rhymecomment['user_id'])
{
?>         
<div class="share"> <a href="edit-rhyme_comment.php?id=<?php echo $rhyme_id; ?>&rhyme_comment_id=<?php echo $rhymecomment['rhyme_comment_id']; ?>">Edit |</a>  <a href="delete-rhyme_comment.php?id=<?php echo $rhymecomment['rhyme_comment_id']; ?>&rhyme_id=<?php echo $rhyme_id; ?>">Delete</a> </div>
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
if($user_id==$rhymecomment['user_id'])
{
?>         
<div class="share"> <a href="edit-rhyme_comment.php?id=<?php echo $rhyme_id; ?>&rhyme_comment_id=<?php echo $rhymecomment['rhyme_comment_id']; ?>">Edit|</a>  <a href="delete-rhyme_comment.php?id=<?php echo $rhymecomment['rhyme_comment_id']; ?>&rhyme_id=<?php echo $rhyme_id; ?>">Delete</a> </div>
<?php
}
}   
?>           
        
        

   
       
       
        <!-- <div><a href="edit-rhyme_comment.php?id=<?php //echo $rhyme_id; ?>&rhyme_comment_id=<?php // echo $rhymecomment['rhyme_comment_id']; ?>">Edit</a>  <a href="delete-rhyme_comment.php?id=<?php //echo $rhymecomment['rhyme_comment_id']; ?>&rhyme_id=<?php //echo $rhyme_id; ?>">Delete</a></div>
    -->    
   
 <br>    
    <div class="clearfix"></div> 
    
    </div>
    <?php
       }
    }
    }
    ?>
</div>
        </div>
          
          
      </div>
    </div>
    </div>
    
    
    
     <div class="col-lg-2">
     <a href="kid-stories">    
     <img src="images/right-add.jpg" alt="" class=""/>
     </a>
     </div>
    
    </div>   
    
    <div class="row">
      <div class="col-lg-3"><a href="kid-stories"><img src="images/right-page.jpg" alt="" class="img-responsive"/></a> </div>
      <div class="col-lg-9">
        <div class="red-bg">
          <div class="row">
            <div class="col-lg-3"> <img src="images/puzzle-collage.jpg" alt="" class=""/> </div>
            <div class="col-lg-9">
              <p><?php 
        echo $detailrhyme['rhyme_seo_decription'];
      ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <?php 
    include("rhymes-stories-puzzles-games.php");    
    ?>
    
    
  </div>
</section>
<div class="container-fluid">
  <div class="row"> <img src="images/cloud-2.png" alt="" class="cloud"/> </div>
</div>
<?php 
include("includes/footer.php");
?>
</body>
</html>