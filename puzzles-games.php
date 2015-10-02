<?php
session_start();
include("dbconnection.php");
?>
<!doctype html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta content="puzzle games for girls, jigsaw puzzle games, puzzle games download, puzzle games for kids, jigsaw puzzle games online, online puzzle games for kids, puzzle games online for kids, free online puzzle games" name="keywords"  />
        <meta content="Download jigsaw puzzle games for girls and boys at The Fun Kids. Let your child play with jigsaw puzzle games to crossword puzzles to boost their memory!" name="description"/>
        <title>Free Online Puzzle Games for Kids | Jigsaw Puzzle Games</title>
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
<div class="row">
<img src="images/cloud-1.png" alt="" class="cloud"/>
</div>
</div>

<section class="sec1">
<div class="container">
<div class="row">
<div class="col-md-10 puzzle-page-popular">
<h1 class="stories-page-h1"><span class="popular">FEATURED</span> PUZZLES</h1>

<ul>
<?php
$featured_puzzles=getFeaturedPuzzles();
if($featured_puzzles>0)
{
    while($featured_puzzle=  mysql_fetch_array($featured_puzzles))
    {
?>
<li>
<a href="kid-puzzle-<?php echo $featured_puzzle['seo_puzzle'];  ?>" title="" onClick="ga('send', 'event', 'Kids Puzzle <?php echo $featured_puzzle['puzzle_name']; ?> ', 'Play Kids Puzzle <?php echo $featured_puzzle['puzzle_name']; ?>');">
<div class="col-md-6 stories-page-img">
<img src="funkid-puzzles/puzzle_images/<?php echo $featured_puzzle['puzzle_image']; ?>" alt="<?php echo $featured_puzzle['puzzle_name'];?>" class="img-responsive"/>
<p class="stories-page-para" align="center">
<?php echo $featured_puzzle['puzzle_name'];?>
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
<img src="games/game_images/coming-soon-1.jpg" alt="kids-rhymes-duck" class="img-responsive"/>
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
<div class="col-md-9"><p class="paragraph">Let your child play with his favorite mind-boggling puzzle games online for kids. Exercise your brain with our collection of skull cracking <strong>puzzle games for girls and boys</strong>. Practice words completion puzzles to increase your kid’s vocabulary. Start with the basic puzzle game with whizz words and go on trying the harder one and test your skills. Play with our gorgeous collection of <strong>jigsaw puzzle games</strong>! This mentally engaging activity will not only keep your kid glued to puzzles but also teach your kid with the basic nursery education. Your kid will become proactive, ingenious and mentally smart enough to grasp things easily by involving in these puzzle games. This activity is great for enhancing your child’s eyes, mind and reflexes. </p></div>

<div class="clearfix"></div>
</div>

<div class="clearfix"></div>
<br/>

<?php 
include("rhymes-stories-games.php")
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