<?php get_header(); ?>
<?php $zones = $post->layout['zones'];?>

<div id="layout-<?php echo $post->layout['layout_id'];?>" class="layoutcolumn" role="main">

	<div class="post" id="post-<?php echo $post->ID; ?>">
		<h2><?php the_title(); ?></h2>
	

	<div class="columns-three">	
	<div class="col-1-2">
	<div class="col-1">
	<div class="col-content">
	
	<div class="zone-left">
	<?php dynamic_sidebar($zones[0]);?>
	</div>
	
	</div>
	</div>
	<div class="col-2">
	<div class="col-content">
	
	<div class="zone-right">
	<?php dynamic_sidebar($zones[1]);?>
	</div>

	</div>
	</div>
	</div>
	<div class="col-3">
	<div class="col-content">
	
	<div class="zone-right">
	<?php dynamic_sidebar($zones[2]);?>
	</div>

	</div>
	</div>
	</div>


	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
	</div> 
</div>
<?php get_footer(); ?>