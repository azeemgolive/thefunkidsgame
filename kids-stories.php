<?php 
session_start();
include("dbconnection.php");
?>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<meta content="stories for children, kids stories, short stories for kids, story for kids, moral stories for kids, english stories for kids, kids moral stories, kids stories online, online audio stories for kids, audio stories for kids" name="keywords"  />
	<meta content="TheFunKids now presents short moral stories for kids- they can now view animated videos while listening to bedtime stories and short audio stories for kids!" name="description"/>
	<title>Short Moral Stories For Kids | Short Audio Stories for Kids</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link rel="stylesheet" href="css/styletwo.css"/>
</head>
<!-- -->
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

<!-- -->
<div class="container-fluid">
	<div class="row">
		<img src="images/cloud-1.png" alt="" class="cloud"/>
	</div>
</div>
<!-- -->
<section class="sec1">
	<div class="container">
		<div class="row">
			<div class="col-md-10 stories-page-popular">
				<h1 class="stories-page-h1"><span class="popular">POPULAR</span> STORIES</h1>
					<ul>
					<?php
						$popular_stories=getPopularStories();
						
						if($popular_stories>0){
							while($popular_story=mysql_fetch_array($popular_stories)){						
					?>
						<li>
							<a href="kids-story-<?php echo $popular_story['seo_story'];  ?>">
								<div class="col-md-6 stories-page-img">
									<img src="stories/story_images/<?php echo $popular_story['story_image']; ?>" alt="<?php echo $popular_story['story_name']; ?>" class="img-responsive"/>
									<p class="stories-page-para"><?php echo $popular_story['story_name'] ?></p>
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
				<div class="col-md-9"><p class="paragraph">What kid does not like to hear <strong>bedtime stories</strong>? All kids loves listening to stories and reading books. So, have your child listen to the best <strong>short moral stories for kids</strong> at The Fun Kids. Instead of visiting book stores or libraries now parents can get everything on their palms for their loving toddlers. Our online portal TheFunKids has exclusive section entirely dedicated to various <strong>kids moral stories</strong>.  Now your child can watch, listen and learn our tremendous short audionstories for kids with fun and joy. We assure you, once he gets involved in these short stories for toddlers online, he cannot wait to read them all. So go on to our The Fun Kids stories section and get you kid reading!
				</p></div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<br/>
			<?php 
                        include("rhymes-puzzles-games.php");                        
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
<?php include "includes/footer.php"; ?>
</body>
</html>