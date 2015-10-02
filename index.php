<?php
session_start();
include("dbconnection.php");
function getWords($text, $limit)
{
$array = explode(" ", $text, $limit+1);
if (count($array) > $limit)
{
unset($array[$limit]);
}
return implode(" ", $array);
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="poems for kids,poems for children,kids stories,nursery poems,baby rhymes,rhyming poems for kids,short stories for kids,story for kids,nursery rhymes free download,kids rhymes videos,children rhymes,english stories for kids,nursery rhymes songs,kids nursery rhymes,nursery rhymes for kids,download nursery rhymes,nursery poems in english,nursery rhymes videos download,nursery rhymes videos free download,montessori rhymes,kids poems,Most Popular Nursery Rhymes,stories for children,nursery rhymes videos,kids rhymes" name="keywords"  />
<meta content="The Fun Kids offers free online learning websites for kids that provide fun and educational activities for your kids as well as guidance to good parenting" name="description"/>
<title>Nursery Rhymes, Stories & Games For Kids | The Fun Kids</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/styletwo.css"/>
<style>
.recent-discussions {
    margin: 20px 0;
    width: 100%;
}
.recent-discussions ul {
    background: #fff none repeat scroll 0 0;
    overflow: hidden;
    padding: 10px;
}
.recent-discussions ul li {
    margin: 14px 0;
    overflow: hidden;
}
.recent-discussions a {
color:#000;


}
.main-column-picture {
    float: left;
    position: relative;
    width: 265px;
}
.post-count {
    float: left;
    padding-top: 0;
}
    .count {
    background: #f7b700;
    color: #fff;
    font-size: 1.4rem;
    height: auto;
    min-width: 20px;
    padding: 1px 2px;
    position: relative;
    text-align: center;
    width: auto;
    z-index: 5;
    display: inline-block;
    margin-top: 5px;
}
.count::after {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: transparent #f7b700 transparent transparent;
    border-image: none;
    border-style: solid;
    border-width: 10px;
    bottom: -7px;
    content: "";
    left: -80%;
    margin-left: 13px;
    position: absolute;
    z-index: -1;
}
.post-count {
    padding-top: 0px;
    float: left;
}
.discuss-name {
    float: left;
    margin-left: 5px;
    width: 220px;
}
.discuss-name .date {
    clear: both;
    display: inline-block;
}
    
</style>
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
<div class="col-md-5 popular-rhymes">
<h1 class="rhymes"><span class="popular">POPULAR</span> RHYMES</h1>
<ul>    
<?php
$featuredrhymes=  getAllHomeFeaturedRhymes();
if($featuredrhymes>0)
{
    while($featurerhyme=  mysql_fetch_array($featuredrhymes))
    {
?>
<li>
<a href="kids-rhymes-<?php echo $featurerhyme['rhyme_seo']; ?>" >
<div class="col-md-6 rhymes-img">
    <img src="rhymes/home_image/<?php echo $featurerhyme['rhyme_home_image']; ?>" alt="<?php echo strtoupper($featurerhyme['rhyme_name']); ?>" class="img-responsive"/>
<p class="rhymes-paras" align="center">
<?php echo ucwords($featurerhyme['rhyme_name']); ?>
</p>
</div>
</a>
</li>
<?php
 }
}
?>





</ul>

<div class="clearfix"></div>
</div>



<div class="col-md-5 popular-games">
<h1 class="games"><span class="popular">POPULAR</span> GAMES</h1>

<ul>
<?php
$result= getAllGames();
if($result>0)
{
    while($games=  mysql_fetch_array($result))
    {
        ?>
<li>
<a href="kids-games-<?php echo $games['seo_game']; ?>" onClick="ga('send', 'event', 'Kids <?php echo $games['game_name']; ?>', 'Play Kids <?php echo $games['game_name']; ?>');">
<div class="col-md-6 games-img">
    <img src="games/home_image/<?php echo $games['game_home_image']; ?>" alt="<?php echo $games['game_name']; ?>" class="img-responsive"/>
<p class="games-para" align="center">
    <?php echo $games['game_name']; ?>
</p>
</div>
</a>
</li>
<?php
    }
}
?>







</ul>

<div class="clearfix"></div>
</div>

<div class="col-md-2">
<!--a href="" title="life-boy-add"><img src="images/lifebuoyadd.png" alt="life-boy-add" class="add2 img-responsive"/></a-->
<a href="http://www.thefunkids.com/kids-story-lion-and-mouse" target="_blank" title="life-boy-add"><img src="images/right-add.jpg" alt="" class="adds1 img-responsive"/></a>
</div>
<div class="clearfix"></div>

<br/>

<div class="col-md-9 new-arivals">
<h3 class="arivals-h3">NEW <span class="arivals-span">ARRIVALS</span></h3>
<ul>

<?php
$home_rhymes=  getHomeRandomSliderRhymes();
if($home_rhymes>0)
{
    while($home_rhyme=  mysql_fetch_array($home_rhymes))
    {
?>  
<li>
<a href="kids-rhymes-<?php echo $home_rhyme['rhyme_seo']; ?>">
<div class="col-md-3 arivals-img" style="border:#000 px solid;">
<img src="rhymes/rhyme_slider/<?php echo $home_rhyme['slider_image']; ?>" alt="<?php echo ucwords($home_rhyme['rhyme_name']); ?>" class="img-responsive"/>
<p class="arivals-para" align="center">
<?php echo ucwords($home_rhyme['rhyme_name']); ?> (Rhyme)
</p>
</div>
</a>
</li>
<?php  
    }
}
?>
<?php
$home_games= getHomeRandomSliderGames();
if($home_games>0)
{
    while($home_game=  mysql_fetch_array($home_games))
    {
?>
<li>
<a href="kids-games-<?php echo $home_game['seo_game']; ?>" onClick="ga('send', 'event', 'Kids <?php echo $home_game['game_name']; ?>', 'Play Kids <?php echo $home_game['game_name']; ?>');">
<div class="col-md-3 arivals-img" style="border:#000 px solid;">
<img src="games/game_slider/<?php echo $home_game['slider_image']; ?>" alt="<?php echo ucwords($home_game['game_name']); ?> " class="img-responsive"/>
<p class="arivals-para" align="center">
<?php echo ucwords($home_game['game_name']); ?> (Game)
</p>
</div>
</a>
</li>
<?php
  }
}
?>

<?php
$home_stories= getHomeRandomSliderStory();
if($home_stories>0)
{
    while($home_story=  mysql_fetch_array($home_stories))
    {
?>
<li>
<a href="kids-story-<?php echo $home_story['seo_story']; ?>">
<div class="col-md-3 arivals-img" style="border:#000 px solid;">
    <img src="stories/story_slider/<?php echo $home_story['slider_image']; ?>" alt="<?php echo ucwords($home_story['story_name']); ?>" class="img-responsive"/>
<p class="arivals-para" align="center">
<?php echo ucwords($home_story['story_name']); ?> (Story)
</p>
</div>
</a>
</li>
<?php
  }
}
?>


<?php
$home_puzzles= getHomeRandomSliderPuzzles();
if($home_puzzles>0)
{
    while($home_puzzle=  mysql_fetch_array($home_puzzles))
    {
?>
<li>
<a href="kid-puzzle-<?php echo $home_puzzle['seo_puzzle']; ?>" onClick="ga('send', 'event', 'Kids Puzzle <?php echo $home_puzzle['puzzle_name']; ?> ', 'Play Kids Puzzle <?php echo $home_puzzle['puzzle_name']; ?>');">
<div class="col-md-3 arivals-img" style="border:#000 px solid;">
<img src="puzzles/puzzle_slider/<?php echo $home_puzzle['slider_image']; ?>" alt="<?php echo ucwords($home_puzzle['puzzle_name']); ?>" class="img-responsive"/>
<p class="arivals-para" align="center">
<?php echo ucwords($home_puzzle['puzzle_name']); ?> (Puzzle)
</p>
</div>
</a>
</li>
<?php
  }
}
?>

</ul>
<div class="clearfix"></div>
</div>

<div class="col-md-3 facebook">
<div class="fb-page" data-href="https://www.facebook.com/TheFunKidsCo" data-width="300" data-height="265" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/TheFunKidsCo"><a href="https://www.facebook.com/TheFunKidsCo">Thefunkids.com</a></blockquote></div></div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-9 new-stories">
<h3 class="stories-h3">NEW <span class="stories-span">STORIES</span></h3>
<ul>

<?php
$stories=  getAllHomeStories();
if($stories>0)
{
    while($story=  mysql_fetch_array($stories))
    {
?>
<li>
<a href="kids-story-<?php echo $story['seo_story']; ?>">
<div class="col-md-3 stories-img">
    <img src="stories/home_image/<?php echo $story['story_home_image'];  ?>" alt="" class="img-responsive"/>
<p class="stories-para" align="center">   
<?php  echo $story['story_name']; ?>
</p>
</div>
</a>
</li>
<?php
}
}
?>




</ul>
<div class="clearfix"></div>
</div>

<div class="col-md-3 life-add">
<a href="kid-stories" title="life-boy-add"><img src="images/right-page.jpg" alt="" class="img-responsive"/></a>
</div>

<div class="col-md-3 facebook2">
<!--<a href=""><img src="images/foram.png" alt="" class="img-responsive"/></a>-->
<a href="" title="facebook"><img src="images/like.png" alt="" class="img-responsive"/></a>
</div>

<div class="clearfix"></div>
<br/>
<div class="how-we-are-div1">
<h1 class="how-we-are">WHO <span style="color:#ffa800;">WE ARE!</span></h1>
<p class="how-we-are-para">We welcome you and your children in Pakistan’s biggest child learning and development platform. 
We provide exciting and meaningful content that helps you in child’s upbringing. 
Our platform contains activities that helps in increasing cognitive skills and bring positive attitude that is necessary in first 10 years of kid’s life. 
We hope your journey with us will be refreshing and full of fun, do login daily to catch any surprise gifts coming your way.

  <br/>
  The online games, puzzles activities, rhymes and stories will help in educating your kid with basic knowledge and instilling imagination and creativity. 
  TheFunKids is going to boost your kid’s memory by improving his cognitive learning abilities and 
  developing a creative mindset, making them think out-of-the-box. 
  Our <span class="text-info"><strong>mom forum</strong></span> is an interactive engaging blog to help mommies discuss their parental issues and 
  their baby affairs. We hope your journey with us will be refreshing and full of fun.
<br/>For information, contact us at <span class="text-info"><strong>"info@thefunkids.com"</strong></span> <br/> if you have any further queries.
 <br/>Regards &amp; Love


</p>  
</div>

<?php
include("top-momforum-discussion.php");
?>


<div class="blog-post-div1">
<h1 class="blog-post" style="margin:0;">TOP <span style="color:#ffa800;">BLOG POST</span></h1>

<?php
include('blog/wp-load.php');
$the_query = new WP_Query( 'posts_per_page=6' ); ?>
<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
<a href="<?php the_permalink() ?>" target="_blank" style="color: #000;">
<div class="top-discus-subdiv">
<?php 
 if (has_post_thumbnail()) {
   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
   echo '<img src="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" width="80px" height="70px" >';
 }
 ?>
    <p class="blog-post-para" style="float:right !important;color: #000 !important;">
    <?php
    echo substr(the_title('', '', FALSE), 0, 35); ?>
        <br/>        
        <span style="color: #000;">            
        <?php $mycontent = get_the_content();
        echo getWords($mycontent, 2)."..."; ?>
        </span><br/>    <a style="color: #f6bb15;" href="<?php the_permalink() ?>" target="_blank">Read More</a>
</p>
</div>
</a>
<?php 
endwhile;
wp_reset_postdata();
?>
 

 
</div>



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