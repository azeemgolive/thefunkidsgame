<?php
session_start();
include("dbconnection.php");
?>
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<meta content="short stories,short stories for kids,online games for kids,bedtime stories,story for kids,moral stories for kids,stories for children in urdu,urdu stories for childrens,urdu stories for kids,english stories for kids,kids stories with pictures,learning games for kids,short story for kids,learning english for kids,english story for kids,stories for babies,baby stories" name="keywords"  />
        <meta content="Every kid loves listening stories and reading books. So, do your kid like to listen short stories? Instead of visiting book stores or libraries now parents can get everything on their palms for their loving toddlers. Our online portal TheFunKids.com has exclusive section entirely dedicated to all sort of various short stories.  Now your child, little sisters/brothers can watch, listen and learn our tremendous short stories with fun and joy. We assure you, once your child gets involved in these short stories, he cannot wait to read them all. Our TheFunKids.com has everything that you need to know for your child’s brain development, this section includes short stories ranging from classic stories to animal stories to moral stories. If your child loves listening or reading stories then you must click and share your child’s favorite short story." name="description"/>
        <title>Fun Learn For Kids| English Stories | Poems For Kids | Kids Stories With Pictures</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link href="owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="owl-carousel/owl.theme.css" rel="stylesheet">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
<link type="text/css" rel="stylesheet" href="css/styleext.css" />
<link rel="stylesheet" href="css/styletwo.css"/>
</head>
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
<h1 class="stories-page-h1"><span class="popular"></span> </h1>

<img src="images/commingsoongren1.png" alt="" class="img-responsive"/>


<a href="mom-forum" ><img src="images/BUTTON.png" alt="" class="img-responsive" style="margin-top:60px;margin-left:45px;"/></a>


<div class="clearfix"></div>

</div>

<div class="col-md-2">

<a href="kid-stories" title="life-boy-add"><img src="images/right-add.jpg" alt="life-boy-add" class="adds1 img-responsive"/></a>
</div>
<div class="clearfix"></div>

<br/>

<div class="col-md-3 facebook3" style="">
    <a href="kid-stories" title="life-boy-add"><img src="images/right-page.jpg" alt="" class="img-responsive storyadd1"/></a>

</div>

<div class="col-md-9 stories-page-new-rhymes">
<!--h3 class="stories-page-new-rhymes-h3"><span class="arivals-span">THEFUNKIDS</span> RHYMES</h3-->
<div class="col-md-3"><img src="images/Rhymes-image-demo.png" class="img-responsive"/></div>
<div class="col-md-9"><p class="paragraph" style="padding:0px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry</p></div>

<div class="clearfix"></div>
</div>



<div class="clearfix"></div>
<br/>

<div class="col-md-12 new-stories-page">
<h1 class="stories-page-h1"><span class="popular">NEW</span> GAMES</h1>
<ul>
<?php 
$new_games=getAllNewGames();
if($new_games>0)
{
    while($new_game=  mysql_fetch_array($new_games))
    {
?>

<li>
<a href="kids-games-<?php echo $new_game['seo_game'];  ?>" title="">
<div class="col-md-3 stories-page-down">
<img src="games/game_images/<?php echo $new_game['game_image']; ?>" alt="kids-rhymes-sunshine" class="img-responsive"/>
<p class="stories-page-para2" align="center">
<?php 
echo $new_game['game_name'];
?>
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