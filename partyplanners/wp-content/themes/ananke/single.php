<?php
 global $theme_option;
 $textdoimain = 'ananke';
get_header(); 
$thumbnail1 = $theme_option['blog_thumbnail'];
?>
	
	<section class="blog" id="blog">
		<div class="parallax-section">	
			<div class="parallax-blog" <?php if($thumbnail1['url'] != ''){ ?> style="background-image: url('<?php echo esc_url($thumbnail1['url']); ?>');" <?php } ?> ></div>
			<div class="overlay-blog"></div>
			<div class="container z-index-pages">
				<div class="sixteen columns">
					<h1><?php echo esc_attr($theme_option['blog_title']); ?></h1>
				</div>
				<div class="sixteen columns">
					<div class="sub-text"><?php echo esc_attr($theme_option['blog_subtitle']); ?></div>
				</div>
			</div>
		</div>	
	</section>	
				

	<section class="blog-post-wrapper">
		<div class="container">
			<div class="twelve columns">
			<?php while (have_posts()): the_post(); ?> 
				<?php $format = get_post_format($post->ID); ?>
				<div class="blog-post" id="blog-single">
					<?php if($format=='image'){?>
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="item">
								<img alt="<?php the_title(); ?>" src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id()));?>"/>
							</div>	
						<?php }?>
					<?php }elseif($format=='gallery'){?>
					<?php
						$gallery = get_post_gallery( get_the_ID(), false );
						if(isset($gallery['ids'])){ ?>
						<!-- Gallery -->
						<div class="flexslider">
							<ul class="slides">
							<?php
								$gallery_ids = $gallery['ids'];
								$img_ids = explode(",",$gallery_ids);
								foreach( $img_ids AS $img_id ){
								$image_src = wp_get_attachment_image_src($img_id,'');
							?>
							<li><img src="<?php echo esc_url($image_src[0]); ?>" alt=""></li>
							<?php } ?>
							</ul>
						</div>
					<?php } ?>
					<?php }elseif($format=='video'){?>
					<?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);?>
						<?php if($link_video !=''){?>
							<div class="item">
								<div class="thevideo">
									<iframe width="1100" height="550" src="<?php echo esc_url(get_post_meta(get_the_ID(),'_cmb_link_video', true));?>" ></iframe>
								</div> 
							</div>
						<?php }?>
					<?php }elseif($format == 'audio'){?>
						<?php $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);?>
						<?php if($link_audio !=''){?>
							<div class="audio-player">
								<iframe height="166" scrolling="no" frameborder="no" src="<?php echo esc_url(get_post_meta(get_the_ID(), "_cmb_link_audio", true));?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true"></iframe>
							</div>
						<?php }?>
					<?php }else{?>
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="item">
								<img alt="<?php the_title(); ?>" src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id()));?>"/>
							</div>								
						<?php }?>
					<?php }?>	
					
					<h3 class="single-title"><?php the_title(); ?></h3>
					<div class="blog-text-date"><?php the_time('d.m.Y.'); ?></div>
					<?php the_content();?>
					
					<?php wp_link_pages(); ?>					
					<?php
						if(get_the_tag_list()) {
							echo get_the_tag_list('<div class="tag11">','</div><div class="tag11">','</div>');
						}
					?>
					<div class="post">
						<?php 
							echo get_avatar(get_the_author_meta('user_email'),$size='100',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=74' );
							?> 
						<h6><span><?php _e('Author:', 'ananke') ?> </span> <?php the_author_posts_link(); ?></h6>
						<p><?php echo get_the_author_meta('description');?></p> 
						<div style="clear: both;"></div>	
					</div>  
					
				</div>
				<?php endwhile; ?>	
				<?php comments_template();?>
			</div>
			<div class="four columns">
				<?php get_sidebar();?>
			</div>
		</div>	
	</section>				
<?php
get_footer();
?>						
