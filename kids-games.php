<?php
session_start();
include("dbconnection.php");
?>
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="kids learning games, kids educational games, word search games for kids, educational games for kids, word search puzzle games, english learning games for kids, learning games for kids free download" name="keywords"  />
<meta content="TheFunKids brings educational games like symmetry, shape recognition and word search puzzle games. Download free learning games for kids in Pakistan!" name="description"/>
<title>Kids Educational Games | Online Puzzle Games for Kids!</title>
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
<div class="col-md-10 games-page-popular">
<h1 class="stories-page-h1"><span class="popular">FEATURED</span> GAMES</h1>

<ul>
 <?php 
 $featured_games=getAllFeaturedGames();
 if($featured_games>0)
 {
     while($feature_game=  mysql_fetch_array($featured_games))
     { 
 ?>
<li>
 <a href="kids-games-<?php echo $feature_game['seo_game'];  ?>" title="" onClick="ga('send', 'event', 'Kids <?php echo $feature_game['game_name']; ?>', 'Play Kids <?php echo $feature_game['game_name']; ?>');">
<div class="col-md-6 stories-page-img">
<img src="games/game_images/<?php echo $feature_game['game_image']; ?>" alt="kids-rhymes-duck" class="img-responsive"/>
<p class="stories-page-para" align="center">
<?php echo $feature_game['game_name']; ?>
</p>
</div>
</a>
</li>
<?php
}
}
?>

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
<div class="col-md-9"><p class="paragraph">Now learning with fun is very easy if you choose TheFunKids for your kiddies. TheFunKids.com is the place where your child learns with joy. If you want to enhance your kid’s cognitive and motor skills then you must involve your kid into challenging educational <strong>online puzzle games for kids</strong> like logical puzzles, word search games and more exciting game that encourages your child to think quickly. <strong>The Fun Kid puzzle games</strong> section will improve your child’s concentration, speed, creativity and logical thinking while improving hand-eye coordination-moreover our <strong>Kids Learning Games</strong> section is specially designed to build and enhance your child’s intelligence. We assist parents all moms and dads to make their child smarter than ever.</p></div>

<div class="clearfix"></div>
</div>



<div class="clearfix"></div>
<br/>

<?php 
include("rhymes-stories-puzzles.php");

?>





<div class="clearfix"></div>
<br/>




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