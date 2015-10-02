<div class="col-md-6 div6">
<h1 class="H02">NEW RHYMES</h1>
<img src="images/cloudunderline.png" alt=""/>
<div class="clearfix"></div>
<br/>
<?php
$featuredrhymes=  getAllFeaturedRhymes();
if($featuredrhymes>0)
{
    while($featurerhyme=  mysql_fetch_array($featuredrhymes))
    {
 ?>
<a href="kids-rhymes-<?php echo $featurerhyme['rhyme_seo']; ?>">
<div class="latestgames" style="">
<img src="rhymes/<?php echo $featurerhyme['rhyme_image']; ?>" alt="<?php echo $featurerhyme['rhyme_name']; ?>" class="img-responsive img-thumbnail"/>
</a>
<a href="">
<p class="text-center" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;"><?php echo $featurerhyme['rhyme_name']; ?></p>
</a>
</div>
<?php
   }
}
?>
<div class="clearfix"></div>
<div class="col-md-4 div7">

<!-- The Fun Kids Top Ad -->
<a href="kid-stories"><img src="images/right-page.jpg" alt="" class="img-responsive"/></a>
</div>
<div class="col-md-4 div70">
<div class="fb-page" data-href="https://www.facebook.com/TheFunKidsCo" data-width="250" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/TheFunKidsCo"><a href="https://www.facebook.com/TheFunKidsCo">Thefunkids.com</a></blockquote></div></div>
</div>

</div>