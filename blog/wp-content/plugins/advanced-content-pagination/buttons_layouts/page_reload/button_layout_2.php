<?php

if ($acp_paging_buttons_location === 1) {
    if (!$curr_page) {
        $html .= '<div class="acp_wrapper"><div data-jcarousel="true" class="jcarousel"><ul class="paging_btns" id="acp_paging_menu"><li tabindex="0" class="button_style' . $active_item . '" id="item' . $page . '">' . $link . '<div class="acp_page_number">' . $page . '</div><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li>';
        if ($pages_count == 1) {
            $html .= '</ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div><div id="acp_content" class="acp_content">' . $shortcode_content . '</div></div>';
        }
    } elseif ($curr_page == $pages_count - 1) {
        $html .= '<li tabindex="0" class="button_style' . $active_item . '" id="item' . $page . '">' . $link . '<div class="acp_page_number">' . $page . '</div><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li></ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div>' . '<div id="acp_content" class="acp_content">' . $shortcode_content . '</div></div>';
    } else {
        $html .= '<li tabindex="0" class="button_style' . $active_item . '" id="item' . $page . '">' . $link . '<div class="acp_page_number">' . $page . '</div><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li>';
    }
} else if ($acp_paging_buttons_location === 2) {
    if (!$curr_page) {
        $html = '<div style="display:none;">';
        $this->html_text .= '<div data-jcarousel="true" class="jcarousel"><ul class="paging_btns" id="acp_paging_menu"><li tabindex="0" class="button_style' . $active_item . '" id="item' . $page . '">' . $link . '<div class="acp_page_number">' . $page . '</div><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li>';
        if ($pages_count == 1) {
            $html .= '</div><div class="acp_wrapper"><div id="acp_content" class="acp_content">' . $shortcode_content . '</div>' . $this->html_text . '</ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div></div>';
        }
    } elseif ($curr_page == $pages_count - 1) {
        $html .= '</div><div class="acp_wrapper"><div id="acp_content" class="acp_content">' . $shortcode_content . '</div>' . $this->html_text . '<li tabindex="0" class="button_style' . $active_item . '" id="item' . $page . '">' . $link . '<div class="acp_page_number">' . $page . '</div><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li></ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div></div>';
    } else {
        $this->html_text .= '<li tabindex="0" class="button_style' . $active_item . '" id="item' . $page . '">' . $link . '<div class="acp_page_number">' . $page . '</div><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li>';
    }
} else {
    if (!$curr_page) {
        $html = '<div style="display:none;">';
        $this->html_text .= '<div data-jcarousel="true" class="jcarousel"><ul class="paging_btns" id="acp_paging_menu"><li tabindex="0" class="button_style' . $active_item . '" id="item' . $page . '">' . $link . '<div class="acp_page_number">' . $page . '</div><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li>';
        if ($pages_count == 1) {
            $html .= '</div><div class="acp_wrapper">' . $this->html_text . '</ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div><div id="acp_content" class="acp_content">' . $shortcode_content . '</div>' . $this->html_text . '</ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div></div>';
        }
    } elseif ($curr_page == $pages_count - 1) {
        $html .= '</div><div class="acp_wrapper">' . $this->html_text . '<li tabindex="0" class="button_style' . $active_item . '" id="item' . $page . '">' . $link . '<div class="acp_page_number">' . $page . '</div><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li></ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div><div id="acp_content" class="acp_content">' . $shortcode_content . '</div>' . $this->html_text . '<li tabindex="0" class="button_style' . $active_item . '" id="item' . $page . '">' . $link . '<div class="acp_page_number">' . $page . '</div><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li></ul><a data-jcarouselcontrol="true" class="jcarousel-control-prev">‹</a><a data-jcarouselcontrol="true" class="jcarousel-control-next">›</a></div></div>';
    } else {
        $this->html_text .= '<li tabindex="0" class="button_style' . $active_item . '" id="item' . $page . '">' . $link . '<div class="acp_page_number">' . $page . '</div><div class="acp_title">' . $this->acp_button_text($title) . '</div></a></li>';
    }
}
?>