<?php
/**
 * Template Name: Full Width
 */
  global $theme_option;
 $textdoimain = 'ananke';
 $thumbnail1 = $theme_option['blog_thumbnail'];
get_header(); ?>
	
	<section class="blog" id="blog">
		<div class="parallax-section">	
			<div class="parallax-blog" <?php if($thumbnail1['url'] != ''){ ?> style="background-image: url('<?php echo esc_url($thumbnail1['url']); ?>');" <?php } ?> ></div>
			<div class="overlay-blog"></div>
			<div class="container z-index-pages">
				<div class="sixteen columns">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="sixteen columns">
					<div class="sub-text"><?php echo esc_attr(get_post_meta(get_the_ID(),'_cmb_page_sub_title', true));  ?></div>
				</div>
			</div>
		</div>	
	</section>				
	
	<section class="blog-post-wrapper">
		<div class="container">
			<div class="sixteen columns">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>
				<div class="blog-post" id="blog-single" data-scrollreveal="enter bottom and move 50px over 1s">
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
						<?php if ( has_post_thumbnail() ) { ?>
							<?php the_post_thumbnail(); ?>
						<?php }?>
						<?php the_content();?>
						
						<?php wp_link_pages(); ?>
					</div>
				</div>
				<?php endwhile; ?>					
			</div>
		</div>	
	</section>		
<?php
get_footer();
