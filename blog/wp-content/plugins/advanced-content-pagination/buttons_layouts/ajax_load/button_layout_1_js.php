<?php
if ($acp_paging_buttons_location === 1) {
    if (!$curr_page) {
        $html .= '<div class="acp_wrapper"><div data-jcarousel="true" class="jcarousel"><ul class="paging_btns" id="acp_paging_menu"><li tabindex="0" class="button_style active" id="item' . $page . '"><a href="' . '#' . $page . '"><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li>';
        if ($pages_count == 1) {
            $html .= '</ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div><div id="acp_content" class="acp_content">' . $shortcode_content . '</div></div>';
        }
    } else if ($curr_page == $pages_count - 1) {
        $html .= '<li tabindex="0" class="button_style" id="item' . $page . '"><a href="' . '#' . $page . '"><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li></ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div>' . '<div class="loader_container"><img class="loader" src="' . plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/ajax-loader_200x200_trans_blue.gif') . '" /></div><div id="acp_content" class="acp_content">' . $shortcode_content . '</div><input id="acp_post" type="hidden" value="' . get_the_ID() . '" /><input id="acp_shortcode" type="hidden" value="acp_shortcode" /></div>';
    } else {
        $html .= '<li tabindex="0" class="button_style" id="item' . $page . '"><a href="' . '#' . $page . '"><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li>';
    }
} else if ($acp_paging_buttons_location === 2) {
    if (!$curr_page) {
        $html = '<div style="display:none;">';
        $this->html_text .= '<div class="loader_container"><img class="loader" src="' . plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/ajax-loader_200x200_trans_blue.gif') . '" /></div><div id="acp_content" class="acp_content">' . $shortcode_content . '</div><input id="acp_post" type="hidden" value="' . get_the_ID() . '" /><input id="acp_shortcode" type="hidden" value="acp_shortcode" /><div data-jcarousel="true" class="jcarousel"><ul class="paging_btns" id="acp_paging_menu"><li tabindex="0" class="button_style item' . $page . '' . $active_item . '" id="item' . $page . '"><a href="' . '#' . $page . '"><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li>';
        if ($pages_count == 1) {
            $html .= '</div><div class="acp_wrapper">' . $this->html_text . '</ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div></div>';
        }
    } elseif ($curr_page == $pages_count - 1) {
        $html .= '</div><div class="acp_wrapper">' . $this->html_text . '<li tabindex="0" class="button_style item' . $page . '' . $active_item . '" id="item' . $page . '"><a href="' . '#' . $page . '"><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li></ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div></div>';
    } else {
        $this->html_text .= '<li tabindex="0" class="button_style item' . $page . '" id="item' . $page . '"><a href="' . '#' . $page . '"><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li>';
    }
} else {
    if (!$curr_page) {
        $html = '<div style="display:none;">';
        $this->html_text .= '<div data-jcarousel="true" class="jcarousel"><ul class="paging_btns" id="acp_paging_menu"><li tabindex="0" class="button_style' . $active_item . ' item' . $page . '" id="item' . $page . '"><a href="' . '#' . $page . '"><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li>';
        if ($pages_count == 1) {
            $html .= '</div><div class="acp_wrapper"><input id="acp_post" type="hidden" value="' . get_the_ID() . '" /><input id="acp_shortcode" type="hidden" value="acp_shortcode" />' . $this->html_text . '</ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div><div id="acp_content" class="acp_content">' . $shortcode_content . '</div>' . $this->html_text . '</ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div></div>';
        }
    } elseif ($curr_page == $pages_count - 1) {
        $html .= '</div><div class="acp_wrapper"><input id="acp_post" type="hidden" value="' . get_the_ID() . '" /><input id="acp_shortcode" type="hidden" value="acp_shortcode" />' . $this->html_text . '<li tabindex="0" class="button_style' . $active_item . ' item' . $page . '" id="item' . $page . '"><a href="' . '#' . $page . '"><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li></ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div><div class="loader_container"><img class="loader" src="' . plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/ajax-loader_200x200_trans_blue.gif') . '" /></div><div id="acp_content" class="acp_content">' . $shortcode_content . '</div>' . $this->html_text . '<li tabindex="0" class="button_style' . $active_item . ' item' . $page . '" id="item' . $page . '"><a href="' . '#' . $page . '"><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li></ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div></div>';
    } else {
        $this->html_text .= '<li tabindex="0" class="button_style item' . $page . '" id="item' . $page . '"><a href="' . '#' . $page . '"><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li>';
    }
}
?>