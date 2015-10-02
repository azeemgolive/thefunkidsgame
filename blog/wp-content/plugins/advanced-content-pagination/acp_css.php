<?php

class ACP_Frontend_Style {

    public $options;

    function __construct($options) {
        $this->options = $options;
    }

    function frontend_styles() {
        if (is_singular()) {
            ?>
            <style type="text/css">
                .jcarousel-control-prev {
                    left: <?php echo ($this->options->acp_buttons_is_arrow_fixed) ? '15px' : '-35px'; ?>;
                }

                .jcarousel-control-next {
                    right: <?php echo ($this->options->acp_buttons_is_arrow_fixed) ? '15px' : '-35px'; ?>;
                }

                .acp_wrapper { 
                    clear: both;
                    border-radius: 0px;
                }

                .paging_btns li.nbox a { 
                    height: auto !important; 
                } 

                .paging_btns {
                    list-style: none;
                    margin: 0 auto!important;
                    padding: 0; 
                    height: auto;
                    text-align: center; 
                } 

                .loader_container .loader { 
                    display: block; 
                    width: 100px;
                    height: auto;
                    box-shadow: none;
                } 

                .loader_container {
                    position: absolute; 
                    display: none;  
                    background: <?php echo $this->options->acp_load_container_css; ?>;
                }                

                .button_style a { 
                    color: <?php echo $this->options->acp_buttons_text_color_css; ?> !important; 
                    text-decoration: none !important;
                    display: block; 
                    width: 100%; 
                    height: 100%; 
                    overflow: hidden;
                } 
                <?php
                global $post;

                $btn_visual_style = $this->options->acp_buttons_visual_style;
                $current_post_button_style = esc_attr(get_post_meta($post->ID, '_acp_button_style', true));
                if ($current_post_button_style) {
                    $btn_visual_style = intval($current_post_button_style);
                }

                if ($this->options->acp_wp_shortcode_pagination_view == 1 || $btn_visual_style === 3) {
                    ?>
                    .button_style { 
                        margin: 10px 2px 10px 0!important;
                        padding:0px; 
                        text-align: center; 
                        color: <?php echo $this->options->acp_buttons_text_color_css; ?> !important;
                        cursor: pointer; 
                        overflow: hidden; 
                        display: inline-block;
                    }
                    .button_style:hover,
                    .button_style:focus {
                        background: #CCCCCC;
                    } 

                    .acp_page_number {
                        float: left; 
                        font-size:16px; 
                        line-height:30px;
                        padding: 0px 10px;
                        background:#AAAAAA; 
                        border:1px solid #AAAAAA !important;
                        color:#FFFFFF; 
                        font-weight:bold; 
                        font-family:<?php echo $this->options->acp_buttons_font_css; ?>
                    }   
                    .paging_btns li.nbox { 
                        width: auto !important;
                        height: auto !important;
                        padding: 1px; 
                    } 

                    .paging_btns li.active .acp_page_number { 
                        background:#FFFFFF!important; 
                        color:#AAAAAA;cursor: default;
                        border: 1px solid #AAAAAA!important; 
                    } 

                    .jcarousel-control-prev,.jcarousel-control-next{
                        display: none;
                    }
                    <?php
                } else {
                    /* BUTTON STYL */
                    ?>
                    .button_style { 
                        background: <?php echo $this->options->acp_buttons_background_css; ?>;
                        margin: 10px 2px 10px 0!important; 
                        padding:0px; 
                        text-align: center; 
                        color: <?php echo $this->options->acp_buttons_text_color_css; ?> !important;
                        cursor: pointer;
                        overflow: hidden; 
                        display: inline-block;
                        border: <?php echo $this->options->acp_buttons_border_css; ?>!important;
                    } 

                    .acp_title_left { 
                        float: left; 
                        width: 100%;
                    }
                    .acp_content {
                        text-align: justify; 
                        clear: both; 
                    } 
                    .button_style:hover, 
                    .button_style:hover *:not(.acp_page_number) { 
                        background: <?php echo $this->options->acp_buttons_background_hover_css; ?>;
                        color: <?php echo $this->options->acp_buttons_hover_text_color; ?> !important;
                    }
                    .acp_page_number {
                        float: left; 
                        font-size:16px;
                        line-height: 47px;
                        padding: 0px 10px; 
                        background-color:#777777;
                        color:#FFFFFF;
                        font-weight:bold;
                        font-family:<?php echo $this->options->acp_buttons_font_css; ?> 
                    }
                    .paging_btns li.active {
                        background: <?php echo $this->options->acp_active_button_background_css; ?> !important;
                        color: <?php echo $this->options->acp_active_button_text_color_css; ?> !important;cursor: default;
                        border: <?php echo $this->options->acp_active_button_border_css; ?> !important; 
                    }

                    .paging_btns li.active a { 
                        color: <?php echo $this->options->acp_active_button_text_color_css; ?> !important; 
                        cursor: default;
                    } 
                    .paging_btns li.nbox { 
                        width: auto !important; 
                        height: auto !important;
                        padding: 3px; 
                    } 
                    <?php
                    if ($btn_visual_style == 2):
                        ?>
                        .paging_btns li.active {
                            cursor: default;
                        } 
                        .acp_title { 
                            font-size: <?php echo $this->options->acp_buttons_title_size_css; ?>; 
                            overflow: hidden; 
                            box-sizing: initial;
                            height:47px; 
                            line-height:45px;
                            font-family:<?php echo $this->options->acp_buttons_font_css; ?>;
                        } 
                    <?php elseif ($btn_visual_style == 1): ?>
                        .acp_title { 
                            font-size: <?php echo $this->options->acp_buttons_title_size_css; ?>;
                            overflow: hidden;
                            box-sizing: initial; 
                            height:38px; 
                            padding-top:7px; 
                            line-height:17px;
                            font-family:<?php echo $this->options->acp_buttons_font_css; ?>; 
                        } 
                    <?php elseif ($btn_visual_style == 4): ?>
                        .acp_title { 
                            font-size: <?php echo $this->options->acp_buttons_title_size_css; ?>;
                            overflow: hidden;
                            box-sizing: initial; 
                            max-height:38px; 
                            padding:12px; 
                            line-height:16px;
                            font-family:<?php echo $this->options->acp_buttons_font_css; ?>; 
                        } 
                        button_style:hover, .button_style:hover *:not(.acp_page_number) { 
                            background:inherit;
                        }
                        .acp_previous_page{
                            background: url(<?php echo plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/acp-prev.png') ?>) center left no-repeat <?php echo $this->options->acp_buttons_background_css; ?>;
                        }
                        .acp_previous_page:hover{
                            background: url(<?php echo plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/acp-prev_hover.png') ?>) center left no-repeat <?php echo $this->options->acp_buttons_background_hover_css; ?>;
                            color: <?php echo $this->options->acp_buttons_hover_text_color; ?> !important;
                        }
                        .acp_next_page{
                            background: url(<?php echo plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/acp-next.png') ?>) center right no-repeat <?php echo $this->options->acp_buttons_background_css; ?>;
                        }
                        .acp_next_page:hover{
                            background: url(<?php echo plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/acp-next_hover.png') ?>) center right no-repeat <?php echo $this->options->acp_buttons_background_hover_css; ?>;
                            color: <?php echo $this->options->acp_buttons_hover_text_color; ?> !important;
                        }
                        <?php
                    endif;
                }
                echo isset($this->options->acp_custom_css) ? $this->options->acp_custom_css : '';
                ?>
            </style>
            <?php
        }
    }

}
?>