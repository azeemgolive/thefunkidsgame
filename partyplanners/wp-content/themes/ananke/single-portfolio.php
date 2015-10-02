<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
</head>
<body>
<?php global $theme_option; if($theme_option['builder_project'] != 'yes'){ ?>
	<?php 
		while(have_posts()) :the_post(); 
	    $link_out = get_post_meta(get_the_ID(),'_cmb_link_project', true);
	    $format = get_post_format();    
	?>
		<div id="project-single-slider">
			<div class="clear"></div>
			<div id="last-work">
				<div class="container">
					<div class="sixteen columns">
						<h3><?php the_title(); ?></h3>
						<?php if($link_out) { ?>
						<a class="view-live" href="<?php echo esc_url($link_out);?>"><?php global $theme_option; echo esc_attr($theme_option['portfolio_live']); ?></a>
						<?php } ?>	
					</div>
					<div class="clear"></div>
					<?php 
					$content = get_the_content();
					if($content) { ?>

					<div class="ten columns">
						<?php if($format == 'video') { ?>
						<div class="video">							
							<iframe src="<?php echo esc_url(get_post_meta(get_the_ID(),'_cmb_portfolio_video', true));?>" width="560" height="300" ></iframe>						
						</div>	
						<?php }elseif ($format == 'gallery') { ?>

						<?php $gallery = get_post_gallery( get_the_ID(), false ); ?>
						<div class="project">
							<ul class="project-slides">
								<?php
									$gallery_ids = $gallery['ids'];
									$img_ids = explode(",",$gallery_ids);
									foreach( $img_ids AS $img_id ){
									$image_src = wp_get_attachment_image_src($img_id,'');
								?>
								<!-- Slides -->
								<li class="slide"><img src="<?php echo esc_url($image_src[0]); ?>" alt=""></li>
								<!-- End Slides -->
								<?php } ?>
							</ul>
						</div>
						<?php }else{ ?>
							<img src="<?php echo esc_url(get_post_meta(get_the_ID(),'_cmb_image_1', true)); ?>" alt="">
							<img src="<?php echo esc_url(get_post_meta(get_the_ID(),'_cmb_image_2', true)); ?>" alt="">
						<?php } ?>
					</div>
					<div class="six columns" data-scrollreveal="enter left and move 150px over 2s">
						<?php the_content(); ?>
					</div>

					<?php }else{ ?>

					<div class="eight columns">
						<img src="<?php echo esc_url(get_post_meta(get_the_ID(),'_cmb_image_1', true)); ?>" alt="">
					</div>
					<div class="eight columns">
						<img src="<?php echo esc_url(get_post_meta(get_the_ID(),'_cmb_image_2', true)); ?>" alt="">
					</div>
					<div class="clear"></div>
					<div class="one-third column">
						<?php echo htmlspecialchars_decode(get_post_meta(get_the_ID(),'_cmb_folio_col1', true)); ?>
					</div>
					<div class="one-third column">
						<?php echo htmlspecialchars_decode(get_post_meta(get_the_ID(),'_cmb_folio_col2', true)); ?>
					</div>
					<div class="one-third column">
						<?php echo htmlspecialchars_decode(get_post_meta(get_the_ID(),'_cmb_folio_col3', true)); ?>
					</div>

					<?php } ?>

				</div>
			</div>
		</div>
	<?php endwhile;?>

	<?php }else{ ?>

	<?php 
		while(have_posts()) :the_post(); 
    	$link_out = get_post_meta(get_the_ID(),'_cmb_link_project', true); 
    ?>
		<div id="project-single-slider">
			<div class="clear"></div>
			<div id="last-work">
				<div class="container">
					<div class="sixteen columns">
						<h3><?php the_title(); ?></h3>
						<?php if($link_out) { ?>
						<a class="view-live" href="<?php echo esc_url($link_out);?>"><?php global $theme_option; echo esc_attr($theme_option['portfolio_live']); ?></a>
						<?php } ?>	
					</div>				
				</div>
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile;?>
<?php } ?>
</body>
</html>