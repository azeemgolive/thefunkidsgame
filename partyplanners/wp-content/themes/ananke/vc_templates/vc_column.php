<?php
$output = $el_class = $width = '';
extract(shortcode_atts(array(
    'el_class' => '',
    'width' => '1/1',
    'wap_class' => '',
	'wap_id' => '',
	'title' =>'',
	'column_effect' => ''
), $atts));

$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);

$effect_col = '';
if($column_effect == 'bottommove'){
	$effect_col = 'data-scroll-reveal="enter bottom move 100px over 0.5s after 0.1s"';
}elseif($column_effect == 'topmove'){
	$effect_col = 'data-scroll-reveal="enter top move 100px over 0.5s after 0.1s"';
}else{
	$effect_col = '';
}
$wap_id = (!empty($wap_id) ? ' id="'.esc_attr($wap_id).'"' : '');

$el_class .= ' wpb_column column_container';

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width.$el_class, $this->settings['base']);
$output .= "\n\t".'<div class="'.$css_class.'" '.$effect_col.' >';
$output .= "\n\t\t".'<div '.$wap_id.' class="wpb_wrapper '.$wap_class.'">';
if($title!=""){
	$output .='<h5>'.$title.'</h5>';
}
$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment($el_class) . "\n";

echo $output;