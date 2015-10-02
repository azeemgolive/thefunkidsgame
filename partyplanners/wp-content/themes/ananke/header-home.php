<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<?php 
global $theme_option; 
global $wp_query;
    $seo_title = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_title", true);
    $seo_description = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_description", true);
    $seo_keywords = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_keywords", true);
?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Page Title 
	================================================== -->
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<!-- For SEO -->
	<?php if($seo_description!="") { ?>
	<meta name="description" content="<?php echo esc_attr($seo_description); ?>">
	<?php }elseif($theme_option['seo_des']){ ?>
	<meta name="description" content="<?php echo esc_attr($theme_option['seo_des']); ?>">
	<?php } ?>
	<?php if($seo_keywords!="") { ?>
	<meta name="keywords" content="<?php echo esc_attr($seo_keywords); ?>">
	<?php }elseif($theme_option['seo_key']){ ?>
	<meta name="keywords" content="<?php echo esc_attr($theme_option['seo_key']); ?>">
	<?php } ?>
	<!-- End SEO-->
	
	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?php echo esc_url($theme_option['favicon']['url']); ?>" type="image/png">
	<link rel="apple-touch-icon" href="<?php echo esc_url($theme_option['apple_icon']['url']); ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url($theme_option['apple_icon_72']['url']); ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url($theme_option['apple_icon_114']['url']); ?>">
	
<?php wp_head(); ?>
</head>

<?php if($theme_option['show_pre'] == 'no') { ?><body <?php body_class(); ?> ><?php }else{ ?><body <?php body_class('royal_loader'); ?> ><?php } ?>
	<div id="menu-wrap" class="menu-back cbp-af-header">
			<div class="container">
				<div class="sixteen columns">
				<h1><a href="<?php echo esc_url(home_url()); ?>" class="logo" <?php if($theme_option['logo']) { ?>style="background-image: url('<?php echo esc_url($theme_option['logo']['url']); ?>');" <?php } ?> ></a></h1>				
				<?php
				 $primarymenu = array(
						'theme_location'  => 'primary',
						'menu'            => '',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'slimmenu homemenu',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
						'walker'          => new wp_bootstrap_navwalker(),
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
					);
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( $primarymenu );
					}
				?>
			</div>
		</div>
	</div>	