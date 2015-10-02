<div class="col-md-5 div4">
<h1 class="H01">NEW GAMES</h1>
<img src="images/cloudunderline.png" alt=""/>
<div class="clearfix"></div>
<br/>
<?php
$result= getAllGames();
if($result>0)
{
    while($games=  mysql_fetch_array($result))
    {
        ?>
<a href="kids-games-<?php echo $games['seo_game'];  ?>">
<div class="latestgames" style="">
<img src="games/game_images/<?php echo $games['game_image']; ?>" alt="<?php echo $games['game_name']; ?>" class="img-responsive img-thumbnail"/>
</a>
<a href="kids-games-<?php echo $games['seo_game'];  ?>">
<p class="text-center" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;"><?php echo $games['game_name']; ?></p>
</a>
</div>

<?php
    }
}
?>
</div>