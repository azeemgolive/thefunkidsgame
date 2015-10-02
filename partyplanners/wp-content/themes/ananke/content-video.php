<?php 
global $theme_option;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post" data-scroll-reveal="enter bottom move 100px over 0.5s after 0.1s">	
		<?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);?>
		<?php if($link_video !=''){?>
			<div class="item">
				<div class="thevideo">
					<iframe height="450" src="<?php echo esc_url(get_post_meta(get_the_ID(),'_cmb_link_video', true));?>" ></iframe>
				</div> 
			</div>
		<?php }?>
		<div class="blog-text-wrap">
			<?php echo get_avatar( get_the_author_id(), '70' ); ?>
			<div class="blog-text-name"><?php the_author_posts_link(); ?></div>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="blog-text-date"><?php the_time('d.m.Y.'); ?></div>
			<p><?php echo ananke_excerpt(); ?>
				<a href="<?php the_permalink(); ?>">
					<span>
					<?php if($theme_option['read_more']) { echo esc_attr($theme_option['read_more']); }else{ echo '<i class="fa fa-long-arrow-right"></i>'; }?>
					</span>
				</a>
			</p>
		</div>
	</div>
</article>	
