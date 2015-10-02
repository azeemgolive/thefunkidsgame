<div class="owlborder">
<div id="owl-demo" class="owl-carousel"> 
    <?php
$rhymes=  getRandomSliderRhymes();
if($rhymes>0)
{
    while($rhyme=  mysql_fetch_array($rhymes))
    {
 ?>
<a href="kids-rhymes-<?php echo $rhyme['rhyme_seo']; ?>" style="text-decoration:none;">
    <div class="item"><img src="rhymes/rhyme_slider/<?php echo $rhyme['slider_image']; ?>" alt="<?php echo $rhyme['rhyme_name']; ?>"/><p align="center" style="padding:12px; font-family:myfont; font-style:letter-spacing:2px;"><?php echo ucwords($rhyme['rhyme_name']); ?> (Rhyme)</p></div>
</a>
<?php
    }
}
?>
 <?php
$games=  getRandomSliderGames();
if($games>0)
{
    while($game=  mysql_fetch_array($games))
    {
 ?>
<a href="kids-games-<?php echo $game['seo_game']; ?>" style="text-decoration:none;">
    <div class="item"><img src="games/game_slider/<?php echo $game['slider_image']; ?>" alt="<?php echo $game['game_name']; ?>"/><p align="center" style="padding:12px; font-family:myfont; font-style:; letter-spacing:2px;"><?php echo ucwords($game['game_name']); ?> (Game)</p></div>
</a>
<?php
    }
}
?>    
<?php
$puzzles=  getRandomSliderPuzzles();
if($puzzles>0)
{
    while($puzzle=  mysql_fetch_array($puzzles))
    {
 ?>
<a href="kid-puzzles-<?php echo $puzzle['seo_puzzle']; ?>" style="text-decoration:none;">
    <div class="item"><img src="puzzles/puzzle_slider/<?php echo $puzzle['slider_image']; ?>" alt="<?php echo $puzzle['puzzle_name']; ?>"/><p align="center" style="padding:12px; font-family:myfont; font-style:; letter-spacing:2px;"><?php echo ucwords($puzzle['puzzle_name']); ?> (Puzzle)</p></div>
</a>
<?php
    }
}
?> 
</div>
 </div>