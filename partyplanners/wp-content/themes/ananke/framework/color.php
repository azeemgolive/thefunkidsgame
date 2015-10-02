<?php
$root =dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header("Content-type: text/css; charset=utf-8");
global $theme_option; 
?>
/* Color Theme - Amethyst /Violet/

color - <?php echo esc_attr( $theme_option['main-color'] ); ?>

/* 01 MAIN STYLES
****************************************************************************************************/
a {
  color: <?php echo esc_attr( $theme_option['main-color'] ); ?>;
}
::selection {
  color: #fff;
  background: <?php echo esc_attr( $theme_option['main-color'] ); ?>;
}
::-moz-selection {
  color: #fff;
  background: <?php echo esc_attr( $theme_option['main-color'] ); ?>;
}

/**** Custom logo ****/
.logo{    
  width: <?php echo esc_attr($theme_option['logo_width']); ?>;
  height: <?php echo esc_attr($theme_option['logo_height']); ?>;        
  background-size: <?php echo esc_attr($theme_option['logo_width']); ?> <?php echo esc_attr($theme_option['logo_height']); ?>; 
}
.cbp-af-header.cbp-af-header-shrink .logo{
  width: <?php echo esc_attr($theme_option['logo_widths']); ?>;
  height: <?php echo esc_attr($theme_option['logo_heights']); ?>;        
  background-size: <?php echo esc_attr($theme_option['logo_widths']); ?> <?php echo esc_attr($theme_option['logo_heights']); ?>;
}
@media only screen and (max-width: 800px) {
  .logo{
    width:80px;
    height:50px;    
    background-size:80px 50px;
  }
  .cbp-af-header.cbp-af-header-shrink .logo{
      width:80px;
      height:50px;      
      background-size:80px 50px;     
  }
}

/**** Custom Main Color ****/
#royal_preloader.text .loader,
.big-text,
.cl-effect-5 a span::before,
.list-social li.icon-soc a,
.icon-left1,
.text-over-video, 
.team-social li:hover.icon-team a,
.portfolio-box .fancybox-button,
#filter li .current ,
.portfolio-box h4,
.plans-offer-gold h3,  
.plans-offer-gold h3 span, 
.plans-offer-gold h6,
.plans-offer-gold a,
.plans-offer a,
.link-work a,
.facts-wrap-num,
form #button-con input,
form #button-con input:hover,
.button-map:hover,
.blog-post p span,
.contact-wrap i, 
.icon-footer,
.icon-test,
#footer .back-top,
.blog-text-name a, #footer i,
.pagination ul li a.current, .pagination ul li span.current, 
.pagination ul li a:hover,
.blog-post .post h6 a, .widget_meta abbr,
.search_form:hover:before, .view-live:hover{
	color: <?php echo esc_attr( $theme_option['main-color'] ); ?>;
}
ul.slimmenu li a:hover {
    border-bottom: 1px solid <?php echo esc_attr( $theme_option['main-color'] ); ?>;
}
ul.slimmenu li ul li a:hover {
    border-bottom:1px solid <?php echo esc_attr( $theme_option['main-color'] ); ?>;
}
.team-line{
	background: <?php echo esc_attr( $theme_option['main-color'] ); ?>;
} 
.slideshow > nav span.current {
	background-color: <?php echo esc_attr( $theme_option['main-color'] ); ?>;
}
.flat-filled .icon > path {
    fill: <?php echo esc_attr( $theme_option['main-color'] ); ?>;
}
.flat-filled .icon > .lightning {
    fill: <?php echo esc_attr( $theme_option['main-color'] ); ?>;
}
