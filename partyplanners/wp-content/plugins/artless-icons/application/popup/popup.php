<?php
/**
 * @package    artless Icons
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

$icons = include( dirname( __FILE__ ) . '/data/icons.php' );


$html = '';
$tabs = '';
$tabs_count = 1;

foreach( $icons as $section ) {

    if( $tabs_count == 1 ) {
        $tabs .= '<li><a class="openContent current" href="javascript:void(0)" data-open-content="'.$tabs_count.'">'.$section['tab-title'].'</a></li>';
        $html .= '<div id="content'.$tabs_count.'" class="content">';
    } else {
        $tabs .= '<li><a class="openContent" data-open-content="'.$tabs_count.'">'.$section['tab-title'].'</a></li>';
        $html .= '<div id="content'.$tabs_count.'" class="content hidden">';
    }
    $tabs_count++;

    $html .= '<h2>'.$section['headline'].'</h2>';
    $html .= '<p>[sub_tabs]</p>';
    $icons_total = count( $section['icons'] );
    $icons_count = 0;
    $sub_tabs = '';
    $sub_count = 0;
    foreach( $section['icons'] as $icon ) {
        if( $icons_total <= 85 ) {
            $html .= '<div class="icon"><i class="fa fa-'.$icon.'" data-icon="'.$icon.'"></i></div>';
        } else {
            if( $icons_count == 0 or $icons_count % 85 == 0 ) {
                $sub_count++;
                if( $sub_count == 1 ) {
                    $sub_tabs .= '<a class="openSubContent current" href="javascript:void(0)" data-open-content="'. $tabs_count . $sub_count .'">Tab ' . $sub_count . '</a> | ';
                    $html .= '<div class="subcontent" id="subcontent' . $tabs_count . $sub_count .'">';
                } else {
                    $sub_tabs .= '<a class="openSubContent" href="javascript:void(0)" data-open-content="'. $tabs_count . $sub_count . '">Tab ' . $sub_count . '</a> | ';
                    $html .= '<div class="subcontent hidden" id="subcontent' .$tabs_count . $sub_count . '" class="hidden">';
                }
            }

            $html .= '<div class="icon"><i class="fa fa-'.$icon.'" data-icon="'.$icon.'"></i></div>';

            if( $icons_count == $icons_total-1 or $icons_count % 85 == 84 ) {
                $html .= '<div style="clear:both;"></div></div>';
            }

            $icons_count++;

        }
    }

    if( $sub_tabs != '' ) {
        $sub_tabs = rtrim( $sub_tabs, ' | ' );
        $html = str_replace( '[sub_tabs]', $sub_tabs, $html );
    } else {
        $html = str_replace( '<p>[sub_tabs]</p>', '', $html );
    }


    $html .= '<div style="clear:both;"></div>';
    $html .= '</div>';
}

/*
$tabs .= '<li><a class="openContent" href="javascript:void(0)" data-open-content="99">Info</a></li>';
$html .= '<div id="content99" class="content hidden"><h2>Additional Info</h2><p>By default the size and color will be inherited until you add the attributes <b>size</b> and <b>color</b>.<br />For example: <b>[fa icon="rocket" size="32px" color="#f00000"]</b><br />
Output: <i class="fa fa-rocket" style="font-size:32px; color:#f00"></i></p></div>'
*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>artless Icon Picker</title>
    <link rel="stylesheet" href="../../public/css/production/font-awesome.min.css" media="all" />
    <link rel="stylesheet" href="../../public/css/production/popup.css" media="all" />
</head>
<body class="windows wp-core-ui">

<ul id="tabs">
    <?php echo $tabs; ?>
</ul>

<div id="flipper" class="wrap">
    <?php echo $html; ?>
</div>

<div class="icon-preview"><div class="no-icon-selected"><b>Select an icon.</b></div><div class="icon-attributes" style="display: none;"><b>Icon Settings</b> (size and color will be inherited if not set)<br />Size: <input class="previewChange" id="size" type="text">em  Color: <input class="previewChange" id="color" type="text"> Link: <input class="previewChange" id="link" type="text" value="http://"> Circle<input id="circle" type="checkbox" /><br /><a id="insert" href="javascript:void(0);" style="margin-top: 10px;">Insert Icon</a> <a id="close" href="javascript:void(0);">Close</a></div><div id="preview"><div id="icon" data-icon=""></div></div></div>

<script type="text/javascript" src="../../public/js/production/jquery.1.9.1.min.js"></script>
<script type="text/javascript" src="../../public/js/production/tiny_mce_popup.js"></script>
<script type="text/javascript" src="../../public/js/production/popup.js"></script>
</body>
</html>
