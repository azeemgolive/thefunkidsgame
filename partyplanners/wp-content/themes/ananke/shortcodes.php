<?php 
global $pre_text;
$pre_text = 'OT ';

// Slider Moving Background
add_shortcode('movingbg', 'movingbg_func');
function movingbg_func($atts, $content = null){
	extract(shortcode_atts(array(
		'poster'	=> 	'',
	), $atts));
	
	$img = wp_get_attachment_image_src($poster,'full');
	$img = $img[0];

	ob_start(); ?>
	
	<div class="parallax-home" style="background-image: url(<?php echo esc_url($img); ?>);"></div>
	<div class="big-text flippy">
		<?php echo htmlspecialchars_decode($content); ?>
	</div>
	<script type="text/javascript">
	(function($) { "use strict";
	   var pos = 0;

	    window.setInterval(function(){
	      pos++;
	      document.getElementsByClassName('parallax-home')[0].style.backgroundPosition = pos + "px 0px";
	    }, 40);
	})(jQuery);
	</script>
	<?php

    return ob_get_clean();
}


// Slider Pattern
add_shortcode('patternbg', 'patternbg_func');
function patternbg_func($atts, $content = null){
	extract(shortcode_atts(array(
		'poster'	=> 	'',
	), $atts));
	
	$img = wp_get_attachment_image_src($poster,'full');
	$img = $img[0];

	ob_start(); ?>
	
	<div class="pattern-home" style="background-image: url(<?php echo esc_url($img); ?>);"></div>
	<div class="big-text flippy">
		<?php echo htmlspecialchars_decode($content); ?>
	</div>
	<script type="text/javascript">
	(function($) { "use strict";
	   var pos = 0;

	    window.setInterval(function(){
	      pos++;
	      document.getElementsByClassName('pattern-home')[0].style.backgroundPosition = pos + "px 0px";
	    }, 40);
	})(jQuery);
	</script>
	<?php

    return ob_get_clean();
}


// Slider Video
add_shortcode('slidervideo', 'slidervideo_func');
function slidervideo_func($atts, $content = null){
	extract(shortcode_atts(array(
		'mp4'		=> 	'',
		'webm'		=> 	'',
		'ogg'		=> 	'',
		'poster'	=> 	'',
	), $atts));
	
	$img = wp_get_attachment_image_src($poster,'full');
	$img = $img[0];

	ob_start(); ?>
	
	<video id="video_background" preload="auto" autoplay loop muted volume="0" style="background: url(<?php echo esc_url($img); ?>) center center no-repeat;"> 
		<?php if($webm!=''){ ?><source src="<?php echo esc_url($webm); ?>" type="video/webm"> <?php } ?>
		<?php if($mp4!=''){ ?><source src="<?php echo esc_url($mp4); ?>" type="video/mp4"> <?php } ?>
		<?php if($ogg!=''){ ?><source src="<?php echo esc_url($ogg); ?>" type="video/ogg"><?php } ?>
	</video>
	<div class="big-text flippy">
		<?php echo htmlspecialchars_decode($content); ?>
	</div>

	<?php

    return ob_get_clean();
}

// Arrow Down Slider
add_shortcode('arrowdown', 'arrowdown_func');
function arrowdown_func($atts, $content = null){
	extract(shortcode_atts(array(
		'bg'	=>	'',
		'link'	=> 	'',
		'btntext' => '',
	), $atts));
	
	$img = wp_get_attachment_image_src($bg,'full');
	$img = $img[0];

	if($bg) { $extra = 'style="background-image: url('.$img.')"'; }

	$html = '<a class="scroll" href="'.$link.'"><div '.$extra.' class="scroll-btn tipped" data-title="'.$btntext.'"></div></a>';

	return $html;
}


// Buttons Slider
add_shortcode('btnslider','btnslider_func');
function btnslider_func($atts, $content = null){
	extract(shortcode_atts(array(
		'text1'		=> 	'',
		'text2'		=> 	'',
		'link1'		=> 	'',
		'link2'		=> 	'',
	), $atts));

	ob_start(); ?>
	
	<div class="small-text">
		<div class="cl-effect-5">
			<?php if($text1) { ?><a class="scroll" href="<?php echo esc_url($link1); ?>"><span data-hover="<?php echo esc_attr($text1); ?>"><?php echo esc_attr($text1); ?></span></a><?php } ?>
			<?php if($text2) { ?><a class="scroll" href="<?php echo esc_url($link2); ?>"><span data-hover="<?php echo esc_attr($text2); ?>"><?php echo esc_attr($text2); ?></span></a><?php } ?>
		</div>
	</div>

	<?php

    return ob_get_clean();
}


// Socials Slider
add_shortcode('socslider','socslider_func');
function socslider_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon1'		=> 	'',
		'icon2'		=> 	'',
		'icon3'		=> 	'',
		'icon4'		=> 	'',
		'icon5'		=> 	'',
		'link1'		=> 	'',
		'link2'		=> 	'',
		'link3'		=> 	'',
		'link4'		=> 	'',
		'link5'		=> 	'',
	), $atts));

	ob_start(); ?>
	
	<div class="social-top">
		<ul class="list-social">
			<?php if($icon1) { ?>
			<li class="icon-soc tipped" data-title="<?php if($icon1 == 'google-plus') { echo "google +"; }else{ echo esc_attr($icon1); } ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
				<a href="<?php echo esc_url($link1); ?>"><i class="fa fa-<?php echo esc_attr($icon1); ?>"></i></a>
			</li>
			<?php } ?>
			<?php if($icon2) { ?>
			<li class="icon-soc tipped" data-title="<?php if($icon2 == 'google-plus') { echo "google +"; }else{ echo esc_attr($icon2); } ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
				<a href="<?php echo esc_url($link2); ?>"><i class="fa fa-<?php echo esc_attr($icon2); ?>"></i></a>
			</li>
			<?php } ?>
			<?php if($icon3) { ?>
			<li class="icon-soc tipped" data-title="<?php if($icon3 == 'google-plus') { echo "google +"; }else{ echo esc_attr($icon3); } ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
				<a href="<?php echo esc_url($link3); ?>"><i class="fa fa-<?php echo esc_attr($icon3); ?>"></i></a>
			</li>
			<?php } ?>
			<?php if($icon4) { ?>
			<li class="icon-soc tipped" data-title="<?php if($icon4 == 'google-plus') { echo "google +"; }else{ echo esc_attr($icon4); } ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
				<a href="<?php echo esc_url($link4); ?>"><i class="fa fa-<?php echo esc_attr($icon4); ?>"></i></a>
			</li>
			<?php } ?>
			<?php if($icon5) { ?>
			<li class="icon-soc tipped" data-title="<?php if($icon5 == 'google-plus') { echo "google +"; }else{ echo esc_attr($icon5); } ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
				<a href="<?php echo esc_url($link5); ?>"><i class="fa fa-<?php echo esc_attr($icon5); ?>"></i></a>
			</li>
			<?php } ?>
		</ul>	
	</div>

	<?php

    return ob_get_clean();
}	


// About Box
add_shortcode('aboutbox', 'aboutbox_func');
function aboutbox_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',
		'icon'		=> 	'',
	), $atts));
	
	ob_start(); ?>
	
	<div class="about-what-we-do" data-scrollreveal="enter bottom and move 150px over 1s">
		<div class="icon-left1"><i class="fa fa-<?php echo esc_attr($icon); ?>"></i></div>
		<h5><?php echo htmlspecialchars_decode($title); ?></h5>
		<p><?php echo htmlspecialchars_decode($content); ?></p>
	</div>

	<?php

    return ob_get_clean();
}


// About Video
add_shortcode('aboutvideo', 'aboutvideo_func');
function aboutvideo_func($atts, $content = null){
	extract(shortcode_atts(array(
		'textover'	=> 	'',
		'mp4'		=> 	'',
		'webm'		=> 	'',
		'ogg'		=> 	'',
		'poster'	=> 	'',
		'content1'	=> 	'',
		'content2'	=> 	'',
		'content3'	=> 	'',
	), $atts));
	
	$img = wp_get_attachment_image_src($poster,'full');
	$img = $img[0];

	ob_start(); ?>
	
	<div class="video-sections">
		<div class="video-section-1" style="background-image: url(<?php echo esc_url($img); ?>);">
			<?php if($webm || $mp4 ||$ogg) { ?>
			<video id="video_background" preload="auto" autoplay loop muted> 
				<source src="<?php echo esc_url($webm); ?>" type="video/webm"> 
				<source src="<?php echo esc_url($mp4); ?>" type="video/mp4"> 
				<source src="<?php echo esc_url($ogg); ?>" type="video/ogg"> 
			</video>
			<?php } ?>
			<div class="just_pattern"></div>
			<div class="text-over-video"><?php echo htmlspecialchars_decode($textover); ?></div>	
		</div>	
		<div class="video-section-2">	
			<div class="container">
				<div class="nine columns padding-top-video-sec2" data-scrollreveal="enter right and move 150px over 1s">
					<?php echo htmlspecialchars_decode($content1); ?>
				</div>
				<div class="clear"></div>
				<div class="nine columns" data-scrollreveal="enter right and move 150px over 1s">
					<?php echo htmlspecialchars_decode($content2); ?>
				</div>
				<div class="clear"></div>
				<div class="nine columns" data-scrollreveal="enter right and move 150px over 1s">
					<?php echo htmlspecialchars_decode($content3); ?>
				</div>
			</div>
		</div>	
	</div>

	<?php

    return ob_get_clean();
}


//Member Team
add_shortcode('memberItem','memberItem_func');
function memberItem_func($atts, $content = null){
	extract(shortcode_atts(array(
		'name'		=> 	'',
		'job'		=> 	'',	
		'src'		=>	'',		
		'icon1'    	=>  '',
		'url1'     	=> '',
		'icon2'    	=>  '',
		'url2'     	=> '',
		'icon3'    	=>  '',
		'url3'     	=> '',
		'icon4'    	=>  '',
		'url4'     	=> '',
	), $atts));

	$icon11 = (!empty($icon1) ? '<a href="'.esc_url($url1).'" target="_blank"><i class="fa fa-'.esc_attr($icon1).'"></i></a>' : '');
	$icon22 = (!empty($icon2) ? '<a href="'.esc_url($url2).'" target="_blank"><i class="fa fa-'.esc_attr($icon2).'"></i></a>' : '');
	$icon33 = (!empty($icon3) ? '<a href="'.esc_url($url3).'" target="_blank"><i class="fa fa-'.esc_attr($icon3).'"></i></a>' : '');
	$icon44 = (!empty($icon4) ? '<a href="'.esc_url($url4).'" target="_blank"><i class="fa fa-'.esc_attr($icon4).'"></i></a>' : '');
	
	$img = wp_get_attachment_image_src($src,'full');
	$img = $img[0];

	ob_start(); ?>

	<div class="" data-scrollreveal="enter bottom and move 150px over 1s">
		<div class="team-wrap">	
			<img src="<?php echo esc_url($img); ?>" alt=""/>
			<h5><?php echo htmlspecialchars_decode($name); ?></h5>
			<p><?php echo htmlspecialchars_decode($job); ?></p>
			<div class="team-line"></div>
			<div class="team-desc"><?php echo htmlspecialchars_decode($content); ?></div> 
			<div class="social-team">
				<ul class="team-social">
					<?php if($icon1) { ?>
					<li class="icon-team tipped" data-title="<?php if($icon1 == 'google-plus') { echo esc_attr( "google +" ); }else{ echo esc_attr($icon1); } ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
						<?php echo htmlspecialchars_decode($icon11); ?>
					</li>
					<?php } ?>
					<?php if($icon2) { ?>
					<li class="icon-team tipped" data-title="<?php if($icon2 == 'google-plus') { echo esc_attr( "google +" ); }else{ echo esc_attr($icon2); } ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
						<?php echo htmlspecialchars_decode($icon22); ?>
					</li>
					<?php } ?>
					<?php if($icon3) { ?>
					<li class="icon-team tipped" data-title="<?php if($icon3 == 'google-plus') { echo esc_attr( "google +" ); }else{ echo esc_attr($icon3); } ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
						<?php echo htmlspecialchars_decode($icon33); ?>
					</li>
					<?php } ?>
					<?php if($icon4) { ?>
					<li class="icon-team tipped" data-title="<?php if($icon4 == 'google-plus') { echo esc_attr( "google +" ); }else{ echo esc_attr($icon4); } ?>"  data-tipper-options='{"direction":"top","follow":"true"}'>
						<?php echo htmlspecialchars_decode($icon44); ?>
					</li>
					<?php } ?>
				</ul>	
			</div>								
		</div>
	</div>

	<?php

    return ob_get_clean();
}

// Slide Show
add_shortcode('slideshow', 'slideshow_func');
function slideshow_func($atts, $content = null){
	extract(shortcode_atts(array(
	), $atts));

	ob_start(); ?>
	
	<div class="slideshow" id="slideshow">
		<ol class="slides">
			<?php
			$args=array('post_type'=>'slide','posts_per_page'=> -1);
		 	$slide= new WP_Query($args);

			if($slide->have_posts()):
				$i = 0;
			while($slide->have_posts()) : $slide->the_post();

			$view  = get_post_meta(get_the_ID(),'_cmb_tilt_view', true);
			$link1 = get_post_meta(get_the_ID(),'_cmb_link_1', true);
			$link2 = get_post_meta(get_the_ID(),'_cmb_link_2', true);
			$img1  = get_post_meta(get_the_ID(),'_cmb_image_1', true);
			$img2  = get_post_meta(get_the_ID(),'_cmb_image_2', true);

		    ?>
			<li class="<?php if($i==0) echo 'current'; ?>">
				<div class="description">
					<h4><?php the_title(); ?></h4>
					<p><?php the_content(); ?></p>
				</div>
				<div class="tiltview <?php echo $view; ?>">
					<a href="<?php echo esc_url($link1); ?>"><img src="<?php echo esc_url($img1); ?>" alt=""/></a>
					<a href="<?php echo esc_url($link1); ?>"><img src="<?php echo esc_url($img2); ?>" alt=""/></a>
				</div>
			</li>
			<?php $i++; endwhile; endif; ?>
		</ol>	
	</div>
	
	<script type="text/javascript">
		window.jQuery = window.$ = jQuery;  
		(function($) { "use strict";
			new TiltSlider( document.getElementById( 'slideshow' ) );
		})(jQuery);	
    </script>

	<?php

    return ob_get_clean();
}

// Portfolio

add_shortcode('portfolio','portfolio_func');
function portfolio_func($atts, $content = null){
    extract( shortcode_atts( array(
      'all' => '',
	  'order'     =>  'ASC',
	  'orderby'   =>  'date',
	  'show'      =>  '' 
   ), $atts ) );
    ob_start(); ?>

    <div class="clear"></div>
    <div class="portfolio"></div>
	<div class="expander-wrap relative">
		<div id="expander-wrap">
			<p class="cls-btn"><a class="close">X</a></p>
			<div class="expander-inner"></div>
		</div>
	</div>	
	<div class="clear"></div>			
	<div class="container">
		<div class="sixteen columns">
			<div id="portfolio-filter">
				<ul id="filter">
					<li><a href="#" class="current" data-filter="*" title=""><?php echo esc_attr($all); ?></a></li>
					<?php 
					$categories = get_terms('categories');   
					foreach( (array)$categories as $categorie){
						$cat_name = $categorie->name;
						$cat_slug = $categorie->slug;
					?>
					<li><a href="#" data-filter=".<?php echo esc_attr($cat_slug); ?>"><?php echo esc_attr($cat_name); ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<ul class="portfolio-wrap">
		<?php 
			$args = array(   
				'post_type' => 'portfolio',
				'posts_per_page' => $show,
				'order' => $order,
				'orderby' => $orderby
			);  
			$wp_query = new WP_Query($args);					
			while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
			$cates = get_the_terms(get_the_ID(),'categories');
			$cate_name ='';
			$cate_slug = '';
				  foreach((array)$cates as $cate){
					if(count($cates)>0){
						$cate_name .= $cate->name.' ' ;
						$cate_slug .= $cate->slug .' ';     
					} 
			} 
			$format = get_post_format($post->ID);
			$link_video = get_post_meta(get_the_ID(),'_cmb_portfolio_video', true);
		?>
		<li class="portfolio-box <?php echo esc_attr($cate_slug); ?>">	
			<a class="expander" href="<?php the_permalink(); ?>" title="">
				<?php $params = array( 'width' => 600, 'height' => 375 );
				$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>
				<img src="<?php echo esc_url($image); ?>" alt="" />	
				<div class="mask"></div>
				<h4><?php the_title(); ?></h4>
			</a>	
			<?php if($format=='video'){ ?>
			<a class="fancybox-media fancybox.iframe" href="<?php echo esc_url( $link_video ); ?>" title="">
				<div class="fancybox-button">&#xf106;</div>
			</a>	
			<?php }else{ ?>
			<a class="fancybox-effects-d" href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" title="">
				<div class="fancybox-button">&#xf106;</div>
			</a>
			<?php } ?>	
		</li>
		<?php endwhile;?>
	</ul>
	
<?php
    return ob_get_clean();
}

// Slider Project (use)
add_shortcode('folioslider', 'folioslider_func');
function folioslider_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
	), $atts));

	ob_start(); ?>
	
	<div class="project">
		<ul class="project-slides">
			<?php 
				$img_ids = explode(",",$gallery);
				foreach( $img_ids AS $img_id ){
				$meta = wp_prepare_attachment_for_js($img_id);
				$caption = $meta['caption'];
				$title = $meta['title'];	
				$description = $meta['description'];
				$image_src = wp_get_attachment_image_src($img_id,''); 
			?>
				<li class="slide"><img src="<?php echo esc_url($image_src[0]); ?>" alt=""></li>				
			<?php } ?>
		</ul>
	</div>

	<?php

    return ob_get_clean();
}

// Video Player (use)
add_shortcode('videoplayer', 'videoplayer_func');
function videoplayer_func($atts, $content = null){
	extract(shortcode_atts(array(
		'video'  => 	'',
		'withvideo'  => '',
		'heightvideo'=> ''
	), $atts));

	$withvideo1 = (!empty($withvideo)) ? $withvideo : 950;
	$heightvideo1 = (!empty($heightvideo)) ? $heightvideo : 400;

	ob_start(); ?>
	<div class="video">
		<iframe src="<?php echo esc_url($video); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="<?php echo esc_attr($withvideo1); ?>" height="<?php echo esc_attr($heightvideo1); ?>" ></iframe>
	</div>
	<?php
    return ob_get_clean();
}

// Audio Player 
add_shortcode('audiopost', 'audiopost_func');
function audiopost_func($atts, $content = null){
	extract(shortcode_atts(array(
		'linkmp3'  => 	'',
		'linkoog'  => 	'',
	), $atts));
	ob_start(); ?>
	
	<div class="audio-player">
		<audio controls>
			<?php if($linkoog != ''){ ?><source src="<?php echo esc_url($linkoog); ?>" type="audio/ogg"> <?php } ?>
			<?php if($linkmp3 != ''){ ?><source src="<?php echo esc_url($linkmp3); ?>" type="audio/mpeg"> <?php } ?>
		</audio> 
	</div>
	
	<?php
    return ob_get_clean();
}

// Call To Action
add_shortcode('callto', 'callto_func');
function callto_func($atts, $content = null){
	extract(shortcode_atts(array(
		'btnhover' 	=>	'',
		'btntext'		=>	'',
		'link'		=> 	'',
	), $atts));

	ob_start(); ?>
	
	<div class="link-work" data-scrollreveal="enter top and move 150px over 1s">
		<h6><?php echo htmlspecialchars_decode($content); ?></h6>
		<div class="cl-effect-5">
			<a class="scroll" href="<?php echo esc_url($link); ?>">
				<span data-hover="<?php echo esc_attr($btnhover); ?>"><?php echo esc_attr($btntext); ?></span>
			</a>
		</div>
	</div>

	<?php

    return ob_get_clean();
}

// Our Facts
add_shortcode('ourfacts', 'ourfacts_func');
function ourfacts_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',
		'number'    => 	'',
	), $atts));
	ob_start(); ?>
	
	<div class="facts-wrap">
		<div class="facts-wrap-num"><span class="counter"><?php echo esc_attr($number); ?></span></div>
		<h5><?php echo esc_attr($title); ?></h5> 
	</div>

    <?php

    return ob_get_clean();
}

// Services Box
add_shortcode('servicebox', 'service_func');
function service_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',
		'icon'		=> 	'',
	), $atts));

	ob_start(); ?>
	
	<div class="one-third column" data-scrollreveal="enter bottom and move 150px over 1s">
		<div class="services-offer">
			<span class="svg-icon flat-filled" id="filled-<?php echo esc_attr($icon); ?>"></span>
			<h5><?php echo htmlspecialchars_decode($title); ?></h5>
			<p><?php echo htmlspecialchars_decode($content); ?></p>
		</div>
	</div>

	<?php

    return ob_get_clean();
}


// Pricing Table

add_shortcode('pricingtable', 'pricingtable_func');
function pricingtable_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		 => '',
		'price'		 => '',
		'buttontext' => '',
		'link'       => '',
		'featured'   => '',
	), $atts));
	ob_start(); ?>

	<div data-scrollreveal="enter bottom and move 150px over 1s">
		<div class="plans-offer<?php if($featured == 'yes') { echo "-gold";}?>">
			<h3><?php echo htmlspecialchars_decode($price); ?></h3>
			<h6><?php echo esc_attr($title); ?></h6>
			<?php echo htmlspecialchars_decode($content); ?>
			<div class="cl-effect-5"><a href="<?php echo esc_url($link); ?>"><span data-hover="<?php echo esc_attr($buttontext); ?>"><?php echo esc_attr($buttontext); ?></span></a></div>
		</div>
	</div>

	<?php
    return ob_get_clean();
}


// Logo Clients
add_shortcode('clients','clients_func');
function clients_func($atts, $content = null){
	extract(shortcode_atts(array(
		'src'		=> '',
		'link' 		=> '',
	), $atts));
	
	
	$img = wp_get_attachment_image_src($src,'full');
	$img = $img[0];

	ob_start(); ?>
	
	<div class="logos-wrap">
		<?php if($link) { ?>
		<a href="<?php echo esc_url($link); ?>"><img src="<?php echo esc_url($img); ?>" alt="" /></a>
		<?php }else{ ?>
		<img src="<?php echo esc_url($img); ?>" alt="" />
		<?php } ?>	
	</div>

	<?php

    return ob_get_clean();
	
}
//End Clients Logo


// Blog Post
add_shortcode('blog', 'blog_func');
function blog_func($atts, $content = null) {	
	extract(shortcode_atts(array(
		'btntext'	=> 	'',
		'link'		=> 	'',
	), $atts));
ob_start(); ?>
   
	<div class="z-index">	
    <?php
	$args=array('post_type'=>'post','posts_per_page'=> 3);
 	$blog= new WP_Query($args);

	if($blog->have_posts()):
	while($blog->have_posts()) : $blog->the_post();

    ?>
	
		<div class="one-third column">
			<div class="blog-post home-blog">
				<?php $params = array( 'width' => 420, 'height' => 201 );
				$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image); ?>" alt="" /></a>
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<p><?php echo esc_attr(ananke_blog_excerpt('18')); ?></p>
				<p><span><?php the_time('d.m.Y.'); ?></span><span> <?php comments_number( __('0 comment', 'anake' ), __('1 comment', 'ananke' ), __('% comments', 'ananke' )); ?></span></p>
			</div>
		</div>
	
	<?php endwhile; endif; ?>
		<div class="clear"></div>
		<div class="sixteen columns">
			<div class="blog-link"><a href="<?php echo esc_url($link); ?>"><?php echo esc_attr($btntext); ?></a></div>
		</div>
	</div> 
<?php
    return ob_get_clean();
}	

//Contact Info

add_shortcode('cinfo','cinfo_func');
function cinfo_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon'		=> '',
		'title' 	=> '',
		'desc'		=> '',
	), $atts));

	ob_start(); ?>
	
	<div class="contact-wrap">
		<p><i class="fa fa-<?php echo esc_attr($icon); ?>"></i><span><?php echo htmlspecialchars_decode($title); ?></span> <?php echo htmlspecialchars_decode($desc); ?></p>	
	</div>

	<?php

    return ob_get_clean();
	
}


add_shortcode('maps','maps_func');
function maps_func($atts, $content = null){
	extract(shortcode_atts(array(
		'btntext'	 => '',
		'imgmap'	 	 => '',
		'tooltip'	 	 => '',
		'latitude'		 => '',
		'longitude'	 	 => '',
		'zoommap'        => '',
		'showgmap'       => '',
	), $atts));
	ob_start(); ?>
	<?php 
		$img = wp_get_attachment_image_src($imgmap,'full');
		$img = $img[0];
	 ?>
	<div class="container">
		<div class="sixteen columns" data-scrollreveal="enter bottom and move 150px over 1s">	
			<a class="button-map close-map"><span><?php echo esc_attr($btntext) ?></span></a>
		</div>
	</div>
	<div id="google_map" <?php if($showgmap == 'optionmap2'){ ?>class="show" <?php } ?> ></div>

	<script>
	
	//Google map	
		
	/*global $:false */
	(function($) { "use strict"

		var e=new google.maps.LatLng(<?php echo esc_attr($latitude); ?>,<?php echo esc_attr($longitude); ?>),
		o={zoom:<?php echo esc_attr($zoommap); ?>,center:new google.maps.LatLng(<?php echo esc_attr($latitude); ?>,<?php echo esc_attr($longitude); ?>),
		mapTypeId:google.maps.MapTypeId.ROADMAP,
		mapTypeControl:!1,
		scrollwheel:!1,
		draggable:!0,
		navigationControl:!1
		},
		n=new google.maps.Map(document.getElementById("google_map"),o);
		google.maps.event.addDomListener(window,"resize",function(){var e=n.getCenter();
		google.maps.event.trigger(n,"resize"),n.setCenter(e)});
		
		var g='<div class="map-tooltip"><h6><?php echo htmlspecialchars_decode($tooltip); ?></h6></div>',a=new google.maps.InfoWindow({content:g})
		,t=new google.maps.MarkerImage("<?php echo esc_url($img); ?>",new google.maps.Size(40,70),
		new google.maps.Point(0,0),new google.maps.Point(20,55)),
		i=new google.maps.LatLng(<?php echo esc_attr($latitude); ?>,<?php echo esc_attr($longitude); ?>),
		p=new google.maps.Marker({position:i,map:n,icon:t,zIndex:3});
		google.maps.event.addListener(p,"click",function(){a.open(n,p)});
		<?php if($showgmap != 'optionmap2'){ ?>			
			$(".button-map").click(function(){$("#google_map").slideToggle(300,function(){google.maps.event.trigger(n,"resize"),n.setCenter(e)}),
			$(this).toggleClass("close-map show-map")});
		<?php } ?>
	})(jQuery);

	</script>

	<?php

    return ob_get_clean();

}

 ?>