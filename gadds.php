<?php
$result=  getAllRightAdds();
if($result>0)
{
    while($rightadd=mysql_fetch_array($result))
    {
?>
<div class="col-md-2 div3">
<img src="rightadds/<?php echo $rightadd['adds_image'];  ?>" alt="<?php echo $rightadd['add_name']; ?>"/>
</div>

<?php        
    }
}
?>
