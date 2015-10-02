<header>
<div class="container wp1">
<div class="row rp1">
    <div class="col-md-2 co1 logo-float"><a href="http://www.thefunkids.com"><img src="images/logo2-funkids.png" alt="the-fun-kids-logo" class="logo img-responsive"/></a></div>

<div class="col-md-8 co1 add-float"><a href="https://www.facebook.com/Thefunkids-Incredibles-833913193395816/timeline/ " target="_blank"><img src="images/header-top.jpg" alt="lifebuoyadd" class="add img-responsive"/></a></div>



<div class="col-md-2 co1 social-float">
<div class="box1">
<a href="https://www.facebook.com/TheFunKidsCo" title="facebook"><img src="images/fb.png" alt="facebook" class="img-responsive"/></a>
<a href="https://twitter.com/thefunkidsco" title="twitter"><img src="images/tw.png" alt="twitter" class="twiter img-responsive"/></a>
<a href="https://www.pinterest.com/the_FunKids" title="printest"><img src="images/p.png" alt="printest" class="img-responsive"/></a>
</div>

<div class="box2">
<?php
if(isset($_SESSION['FBID']))
{
?>
<span>
 <ul class="nav nav-list">
<li><img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture" style="width:75px; margin:3px;"></li>
<li style="padding-left:10px;"><?php echo $_SESSION['FULLNAME']; ?><a href="logout.php" style="padding:0px;">Logout</a></li>
<div></div>
</ul></span>
<?php
}else if(isset($_SESSION['user_id']))
{
?>
<span">
 <ul class="nav nav-list">
     <?php
if($_SESSION['user_image']!='')
{
?>
<li>
    <a href="mom-forum-user-profile"><img src="userimages/<?php echo $_SESSION['user_image']; ?>" width="80" height="80" style="margin:0; padding:0;"></a>
</li>
<?php
}else {
?>
<a href="mom-forum-user-profile"><img src="images/user-avatar.png" width="80" height="80"></a>
<?php
}
?>
<a href="mom-forum-user-profile"><li style="border:0px solid #000; padding-left:12px;"><?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?></li></a>
<div><a class="" style="margin:0; padding-left:20px;" href="logout.php">Logout</a></div>
</ul></span>
<?php
}else{
    ?>
<a href="signup-mother-baby-forum" title="sign-up"><img src="images/sign-up.png" alt="sign-up" class="signup img-responsive"/></a>
<a href="login-kid-mom-forum" title="login"><img src="images/login.png" alt="login" class="login img-responsive"/></a>
<?php
}
?>



</div>
<div class="clearfix"></div>

</div>
<div class="clearfix"></div>
<div class="col-md-12 navgate clears">
<a href="kid-rhymes" title="kids-rhymes"><img src="images/rhymes.png" alt="kids-rhymes"/></a>
<a href="kid-stories" title="kids-stories"><img src="images/stories.png" alt="kids-stories"/></a>
<a href="https://www.facebook.com/Thefunkids-Incredibles-833913193395816/timeline/" target="_balnk" title="Incredibles"><img src="images/Incredibles.png" alt="Incredibles"/></a>
<a href="kid-games" title="kids-puzzles"><img src="images/games.png" alt="kids-games"/></a>
<a href="mom-forum" title="mom-forum"><img src="images/momforum.png" alt="mom-forum"/></a>
<a href="kids-fun-learn" title="kids-funlearn"><img src="images/funlearn.png" alt="kids-funlearn"/></a>
<a href="blog" target="_balnk" title="kids-blog"><img src="images/blog.png" alt="kids-blog"/></a>
<a href="partyplanners" target="_balnk" title="Party Planners"><img src="images/party-planer.png" alt=""/></a>
</div>
</div>
</div>
</header>