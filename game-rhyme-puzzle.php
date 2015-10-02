<section class="secondprpl">   
<div class="container">
<div class="row">
<div class="col-md-4 boxx1">
<h1 style="color:#FF0; font-family:myfont; font-style:italic; letter-spacing:2px;">GAMES</h1>
<?php
$game_name=getFourRandGames();
if($game_name>0)
{
    while ($rand_game=  mysql_fetch_array($game_name))
    {
?>
<a href="kids-games-<?php echo $rand_game['seo_game'];  ?>">
<div class="gamecls">
<img src="games/game_images/<?php echo $rand_game['game_image']; ?>" class="img-responsive img-thumbnail"/>
<p style="color: #fff; font-family:myfont; font-style:; letter-spacing:px; padding-left:7px; font-size:1em;"><?php echo $rand_game['game_name']; ?></p>
</div>
</a>
<?php        
    }
}
?>

<div class="clearfix"></div>
</div>





<div class="col-md-4 boxx1">
<h1 style="color:#FF0; font-family:myfont; font-style:italic; letter-spacing:2px;">RHYMES</h1>
<?php
$rhyme_name=  getFourRandRhymes();
if($rhyme_name>0)
{
    while ($rand_rhyme=  mysql_fetch_array($rhyme_name))
    {
?>
<a href="kids-rhymes-<?php echo $rand_rhyme['rhyme_seo']; ?>">
<div class="gamecls">
<img src="rhymes/<?php echo $rand_rhyme['rhyme_image']; ?>" class="img-responsive img-thumbnail"/>
<p style="color: #fff; font-family:myfont; font-style:; letter-spacing:px; padding-left:7px; font-size:1em;">
<?php 
$string = strip_tags($rand_rhyme['rhyme_name']);
if (strlen($string) > 18) {

    // truncate string
    $stringCut = substr($string, 0, 18);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'..'; 
}
echo $string; ?>..</p>
</div>
</a>
<?php
    }
}
?>

<div class="clearfix"></div>
</div>



<div class="col-md-4 boxx1">
<h1 style="color:#FF0; font-family:myfont; font-style:italic; letter-spacing:2px;">PUZZLE</h1>
<?php
$grand_puzzle=getRandomGamesForPuzzles();
if($grand_puzzle>0)
{
    while($grand_puzzles=  mysql_fetch_array($grand_puzzle))
    {
?>
<a href="kid-puzzle-<?php echo $grand_puzzles['seo_puzzle'];  ?>">
<div class="gamecls">
<img src="puzzles/puzzle_images/<?php echo $grand_puzzles['puzzle_image']; ?>" alt="" class="img-responsive"/>
<p style="color: #fff; font-family:myfont; font-style:; letter-spacing:px; padding-left:7px; font-size:1em;"><?php echo $grand_puzzles['puzzle_name']; ?></p>
</div>
</a>
<?php
    }
}
?>


<div class="clearfix"></div>

</div>
</div>
</div>
</section>