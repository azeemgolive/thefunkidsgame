<?php
/*
 * Template Name: Canvas Page
 * Description: A Page Template with a Page Builder design.
 */
$textdoimain = 'ananke';
get_header(); ?>

<?php if (have_posts()){ ?>
	
		<?php while (have_posts()) : the_post()?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	
	<?php }else {
		_e('Page Canvas For Page Builder', 'ananke'); 
	}?>

<?php get_footer(); ?>