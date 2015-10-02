<?php
session_start();
include("dbconnection.php");
?>
<!doctype html>
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="nursery poems, baby rhymes, rhyming poems for kids, famous poems for kids, children rhymes, kids rhymes videos, nursery rhymes poems, nursery rhymes songs, download nursery rhymes, nursery rhymes for kids, nursery rhymes videos free download, free download nursery rhymes" name="keywords"  />
<meta content="Famous rhyming poems for kids are a great way to develop their vocabulary and creativity. Download nursery rhymes songs for free at The Fun Kids." name="description"/>
<title>Famous Rhyming Poems for Kids | Nursery Rhymes Videos</title>
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
<h1 class="stories-page-h1"><span class="popular">FEATURED</span> RHYMES</h1>

<ul>
<?php
$featured_rhymes=  getKidsFeaturedRhymes();
if($featured_rhymes>0)
{
    while($feature_rhyme=  mysql_fetch_array($featured_rhymes))
    {
?>    
<li>
<a href="kids-rhymes-<?php echo $feature_rhyme['rhyme_seo'] ?>" title="">
<div class="col-md-6 stories-page-img">
<img src="rhymes/<?php echo $feature_rhyme['rhyme_image'];  ?>" alt="kids-rhymes-duck" class="img-responsive"/>
<p class="stories-page-para" align="center">
<?php 
  echo $feature_rhyme['rhyme_name'];
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
<div class="col-md-9"><p class="paragraph"><strong>Nursery rhymes songs</strong> are not just silly songs to amuse you kids but are also very essential for your kid to develop language variations and to build vocabulary. Make sure <strong>nursery poems</strong> and <strong>baby rhymes</strong> should be taught in a fun manner so that your kid learns about music and language quickly. Our portal TheFunKids brings Alphabets and Counting songs, Lullabies, Riddles, Fables and Nursery Rhymes Videos for kids in Pakistan that enables your child to build fluency in reading and speaking with joy. Now do not waste your money and time to purchase CD’s and downloading nursery rhymes, because our virtual <strong>children rhymes</strong> section can teach your child his favorite nursery rhymes songs! </p></div>

<div class="clearfix"></div>
</div>



<div class="clearfix"></div>
<br/>

<div class="col-md-12 new-rhymes-page">
<h1 class="stories-page-h1"><span class="popular">NEW</span> RHYMES</h1>
<ul>
<?php
  $new_rhymes=  getAllRhymes();
  if($new_rhymes>0)
  {
      while($new_rhyme=  mysql_fetch_array($new_rhymes))
      {
?>
<li>
<a href="kids-rhymes-<?php echo $new_rhyme['rhyme_seo'] ?>" title="">
<div class="col-md-3 stories-page-down">
<img src="rhymes/<?php echo $new_rhyme['rhyme_image'];  ?>" alt="kids-rhymes-sunshine" class="img-responsive"/>
<p class="stories-page-para2" align="center">
<?php 
  echo $new_rhyme['rhyme_name'];
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