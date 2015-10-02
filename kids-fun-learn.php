<?php
session_start();
include("dbconnection.php");
?>
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="pakistani fun learrning blogs, pakistani fun learning websites, fun learn, general knowledge facts, iq facts, short stories,short stories for kids,online games for kids, bedtime stories, story for kids, moral stories for kids, stories for children in urdu, learning games for kids, short story for kids, learning english for kids, english story for kids, stories for babies, baby stories" name="keywords"  />
<meta content="Now your child can learn with fun! Introducing TheFunKids Fun Learn, a Pakistani fun learning website that offers general fun facts, history, geogrpahy, art and culture lessons to kids!" name="description"/>
<title>Pakistani Fun Learning Blogs, Games and Fun Facts</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/styletwo.css"/>
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
<div class="row">
<img src="images/cloud-1.png" alt="" class="cloud"/>
</div>
</div>

<section class="sec1">
<div class="container">
<div class="row">
<div class="col-md-10 rhymes-page-popular">
<h1 class="stories-page-h1"><span class="popular">FEATURED</span> FUN LEARN</h1>

<ul>
<?php
$featured_fun_learns=  getKidsFeaturedFunLearn();
if($featured_fun_learns>0)
{
    while($featured_fun_learn=  mysql_fetch_array($featured_fun_learns))
    {
?>    
<li>
<a href="kid-fun-learn-<?php echo $featured_fun_learn['fun_learn_seo']; ?>" title="">
<div class="col-md-6 stories-page-img">
    <img src="fun_learns/fun_learn_images/<?php echo $featured_fun_learn['fun_learn_image'];  ?>" alt="kids-rhymes-duck" class="img-responsive"/>
<p class="stories-page-para" align="center">
<?php 
  echo $featured_fun_learn['fun_learn_name'];
?>
</p>
</div>
</a>
</li>
<?php    
    }
}
?>

<li>
 <a href="" title="">
<div class="col-md-6 stories-page-img">
<img src="games/game_images/coming-soon-1.jpg" alt="kids-rhymes-duck" class="img-responsive"/>
<p class="stories-page-para" align="center">
Coming Soon...
</p>
</div>
</a>
</li>
<li>
 <a href="" title="">
<div class="col-md-6 stories-page-img">
<img src="games/game_images/coming-soon-2.jpg" alt="kids-rhymes-duck" class="img-responsive"/>
<p class="stories-page-para" align="center">
Coming Soon...
</p>
</div>
</a>
</li>
<li>
 <a href="" title="">
<div class="col-md-6 stories-page-img">
<img src="games/game_images/coming-soon-3.jpg" alt="kids-rhymes-duck" class="img-responsive"/>
<p class="stories-page-para" align="center">
Coming Soon...
</p>
</div>
</a>
</li>

</ul>

<div class="clearfix"></div>
</div>

<?php 
include("funkids-rightadds.php");
?>
</div>
<br/>
<div class="row">

<?php 
include("funkids-smalladd.php");
?>
<div class="col-md-9 stories-page-new-rhymes">
<!--h3 class="stories-page-new-rhymes-h3"><span class="arivals-span">THEFUNKIDS</span> RHYMES</h3-->
<div class="col-md-3"><img src="images/Rhymes-image-demo.png" class="img-responsive"/></div>
<div class="col-md-9"><p class="paragraph"> Want your little child to learn more outide of schools and textbooks. The Fun Learn section of TheFunKids offers fun learning facts and creative puzzle solving. Not only will your child learn general knowledge, history, geography, culture and art from our <strong>Pakistani fun learning blogs</strong>, he can also learn solutions to amazing <strong>jigsaw puzzles</strong>- thats what we call learning with fun! Come to our <strong>online kids learning portal</strong> to make sure your kids can continue their education even while having fun. Ensure that your child increases his IQ and further develops his intelligence by introducing him to our fun learrning website.<br></br></p></div>

<div class="clearfix"></div>
</div>



<div class="clearfix"></div>
<br/>

<?php 
include("kid-rhymes-stories-puzzles-games.php");
?>







<div class="clearfix"></div>
<br/>
<!--<div class="how-we-are-div1">
<h1 class="how-we-are">WHO <span style="color:#ffa800;">WE ARE!</span></h1>
<p class="how-we-are-para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p> 
</div>-->

<!--<div class="top-discus-div1">
<h1 class="top-discus" style="margin:0;">TOP <span style="color:#ffa800;">DISCUSSION</span></h1>

<a href="" title="">
<div class="top-discus-subdiv">
<img src="images/kids-rhymes-sunshine.png" alt="" class="top-discus-image"/>
<p class="top-discus-para">
Lorem Ipsum is simply dummy text of the printing and typesetting industry.
</p>
</div>
</a>

<a href="" title="">
<div class="top-discus-subdiv">
<img src="images/kids-rhymes-sunshine.png" alt="" class="top-discus-image"/>
<p class="top-discus-para">
Lorem Ipsum is simply dummy text of the printing and typesetting industry.
</p>
</div>
</a>

<a href="" title="">
<div class="top-discus-subdiv">
<img src="images/kids-rhymes-sunshine.png" alt="" class="top-discus-image"/>
<p class="top-discus-para">
Lorem Ipsum is simply dummy text of the printing and typesetting industry.
</p>
</div>
</a>

</div>-->

<!--<div class="blog-post-div1">
<h1 class="blog-post" style="margin:0;">TOP <span style="color:#ffa800;">BLOG POST</span></h1>

<a href="" title="">
<div class="top-discus-subdiv">
<img src="images/kids-rhymes-sunshine.png" alt="" class="blog-post-img"/>
<p class="blog-post-para">
Lorem Ipsum is simply dummy text of the printing and typesetting industry.
</p>
</div>
</a>

<a href="" title="">
<div class="top-discus-subdiv">
<img src="images/kids-rhymes-sunshine.png" alt="" class="blog-post-img"/>
<p class="blog-post-para">
Lorem Ipsum is simply dummy text of the printing and typesetting industry.
</p>
</div>
</a>

<a href="" title="">
<div class="top-discus-subdiv">
<img src="images/kids-rhymes-sunshine.png" alt="" class="blog-post-img"/>
<p class="blog-post-para">
Lorem Ipsum is simply dummy text of the printing and typesetting industry.
</p>
</div>
</a>
 
</div>-->



</div>
</div>
</section>
<div class="container-fluid">
<div class="row">
<img src="images/cloud-2.png" alt="" class="cloud"/>
</div>
</div>

<?php 
include("includes/footer.php");
?>
</body>
</html>