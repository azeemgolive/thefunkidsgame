<?php
session_start();
if(isset($_GET['id']))
{    
include("dbconnection.php");
$game_id=$_GET['id'];
$detail_games= getFunLearnById($_GET['id']);
$detail_game=  mysql_fetch_array($detail_games);
}else
{
   header("location:kid-games");
}
?>
<!doctype html>
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="<?php echo $detail_game['meta_tag_keyword']; ?>" name="keywords"  />
<meta content="<?php echo $detail_game['meta_tag_description']; ?>" name="description"/>
<meta property="og:image" content="http://www.thefunkids.com/fun_learns/fun_learn_images/<?php echo $detail_game['fun_learn_image']; ?>" />
<title><?php echo $detail_game['fun_learn_title']; ?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/styletwo.css"/> 
<script type="text/javascript" src="js/swfobject.js"></script>
    <script type="text/javascript">
    swfobject.registerObject("myId", "9.0.115", "js/expressInstall.swf");
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
    
<div class="container-fluid">
  <div class="row"> <img src="images/cloud-1.png" alt="" class="cloud"/> </div>
</div>
<section class="sec1">
  <div class="container">
    <div class="row">
       
      <div class="col-lg-12"> 
    <?php  
      echo $detail_game['fun_learn_code'];  
    ?>
      </div>
     
	


    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="share-video">
          <div class="row">
            <div class="col-lg-9">
              <h2>Share This Video</h2>
            </div>
            <div class="col-lg-3"> 
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
     $game_comment_id=$_REQUEST['funlearn_comment_id'];
     $game_comments_view= getFunLearnCommentsById($game_comment_id);
     $game_comment_view=  mysql_fetch_array($game_comments_view);     
    ?>
			<form method="post" action="doupdatefunlearncomments.php">
				<input type="hidden" name="funlearn_id" value="<?php echo $game_id; ?>"/>
                                <input type="hidden" name="fun_learn_comment_id" value="<?php echo $game_comment_id; ?>"/>
				<textarea name="comments" cols="" rows=""><?php echo $game_comment_view['comments']; ?></textarea>
				<a href="#funlearn"><input type="submit" name="submit" value="POST A COMMENT" class="btn-coment sign-in"></a>
			</form>
			<div class="discus">
         
<?php

    $rhyme_comment=getApproveFunLearnComment($game_id);
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
<div class="share"> <a href="edit-kid-game-comments.php?id=<?php echo $game_id; ?>&game_comment_id=<?php echo $rhymecomment['fun_learn_comment_id']; ?>">Edit</a> | <a href="delete-game_comment.php?id=<?php echo $rhymecomment['fun_learn_comment_id']; ?>&rhyme_id=<?php echo $game_id; ?>">Delete</a> </div>
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
<div class="share"> <a href="edit-kid-game-comments.php?id=<?php echo $game_id; ?>&game_comment_id=<?php echo $rhymecomment['game_comment_id']; ?>">Edit </a> | <a href="delete-game_comment.php?id=<?php echo $rhymecomment['game_comment_id']; ?>&game_id=<?php echo $game_id; ?>">Delete</a> </div>
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
    <div class="row">
      <div class="col-lg-3"> <img src="images/right-page.jpg" alt="" class="img-responsive"/> </div>
      <div class="col-lg-9">
        <div class="red-bg">
          <div class="row">
            <div class="col-lg-3"> <img src="images/puzzle-collage.jpg" alt="" class=""/> </div>
            <div class="col-lg-9">
              <p>Welcome to Fun Kids, we bring exciting rhymes, games, puzzles and stories for your little angels.  Along with Kids section, we have discussion forums and other activities related to Moms and parenting.To make your journey more exciting with us, we come up with monthly contest and sweepstakes, where you can participate and win super mom gifts from us. We hope your journey with us will be refreshing and full of fun, do login daily to catch any surprise gifts coming your way. parenting.To make your journey more exciting with us, we come up with monthly contest and sweepstakes, where you can participate and win super mom gifts from us. We hope your journey with us will be refreshing and full of fun, do login daily to catch any surprise gifts coming your way.will be refreshing and full of fun, do login daily to catch any surprise gifts coming your way.</p>
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
