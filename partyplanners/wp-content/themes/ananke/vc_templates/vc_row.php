<?php
$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = '';
extract(shortcode_atts(array(
    'el_class'        => '',
    'bg_image'        => '',
    'bg_color'        => '',
    'bg_image_repeat' => '',
    'font_color'      => '',
    'padding'         => '',
    'margin_bottom'   => '',
    'css' => '',
	'fullwidth'=>'no',
	'extra_id' => '',
    'wrap_class'=>'',
    'ses_title'=>'',
    'ses_sub_title'=>'',
), $atts));

// wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
// wp_enqueue_style('js_composer_custom_css');

$el_class = $this->getExtraClass($el_class);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ''. ( $this->settings('base')==='vc_row_inner' ? 'vc_inner ' : '' ) . get_row_css_class() . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$style = $this->buildStyle($bg_image, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);
$extra_id = (!empty($extra_id) ? 'id="'.esc_attr($extra_id).'"' : '');

$output .='<section '.$extra_id.' class="bg-fixed '.$css_class.'" '.$style.'>';
if($ses_title!='' or $ses_sub_title!=''){
$output .='<div class="container">
		   <div class="sixteen columns" data-scrollreveal="enter top and move 150px over 1s">
           <div class="header-text">';
}
if($ses_title!=''){
$output .='<div class="header-shadow-text">'.$ses_title.'</div>
            <h1>'.$ses_title.'</h1>';
}
if($ses_sub_title!=''){
$output .='<p>'.$ses_sub_title.'</p>';
}
if($ses_title!='' or $ses_sub_title!=''){
$output .='</div></div></div>';
}
if($wrap_class == 'yes'){
    $output .= '<div class="just_pattern"></div>';
}
if($fullwidth == 'no'){
	$output .= '<div class="container">';
}
$output .= '<div class="rows">';
$output .= wpb_js_remove_wpautop($content);
$output .= '</div>';
if($fullwidth == 'no'){
	$output .= '</div>';
}
$output .='</section>'.$this->endBlockComment('row');

echo $output;

