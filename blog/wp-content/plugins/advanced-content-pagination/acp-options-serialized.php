<?php

class ACP_Options_Serialized {

    private $acp_option_slug = 'acp_options';
    // GENERAL SETTINGS
    public $acp_paging_on_off; // ACP content pagination, if 0 paging off else paging on
    public $acp_wp_shortcode_pagination_view; // if 1 default pagination else tabbed pagination 
    public $acp_plugin_pagination_type; // if 1 reload page else ajax
    public $acp_paging_buttons_location; //  if 1 top else if 2 bottom else both
    public $acp_do_shortcodes_excerpts; //  do shortcodes in excerpt or not
    public $acp_excerpts_count; //  excerpt length in words
    // PAGINATION BUTTONS STYLES
    public $acp_buttons_border_css; // pagination buttons border css
    public $acp_buttons_background_css; // pagination buttons background css
    public $acp_buttons_background_hover_css; // pagination buttons hover background css
    public $acp_buttons_font_css; // pagination buttons font css
    public $acp_buttons_text_color_css; // pagination buttons text color css
    public $acp_buttons_title_size_css; // pagination buttons text size css from 10px to 20px  
    public $acp_buttons_prev_next; // if checked display only prev next buttons    
    public $acp_buttons_visual_style; // pagination buttons visual style
    public $acp_buttons_hover_text_color; // default - black
    public $acp_buttons_is_arrow_fixed; // if checked jcarousel buttons arrows are fixed else float
    // PAGINATION ACTIVE BUTTON STYLES
    public $acp_active_button_border_css; // pagination active button border css
    public $acp_active_button_background_css; // pagination active button background css        
    public $acp_active_button_text_color_css; // pagination active button text color css
    
    // LOADER CONTAINER STYLES 
    public $acp_load_container_css;

    //CUSTOM CSS
    public $acp_custom_css; 
    
    function __construct() {
        $this->addOptions();
        $this->initOptions(get_option($this->acp_option_slug));
    }

    public function initOptions($serialize_options) {
        $options = unserialize($serialize_options);
        $this->acp_paging_on_off = $options['acp_paging_on_off'];
        $this->acp_wp_shortcode_pagination_view = $options['acp_wp_shortcode_pagination_view'];
        $this->acp_plugin_pagination_type = $options['acp_plugin_pagination_type'];
        $this->acp_paging_buttons_location = $options['acp_paging_buttons_location'];
        $this->acp_do_shortcodes_excerpts = isset($options['acp_do_shortcodes_excerpts']) ? $options['acp_do_shortcodes_excerpts'] : 2;
        $this->acp_excerpts_count = isset($options['acp_excerpts_count']) ? $options['acp_excerpts_count'] : 55;
        $this->acp_buttons_border_css = $options['acp_buttons_border_css'];
        $this->acp_buttons_background_css = $options['acp_buttons_background_css'];
        $this->acp_buttons_background_hover_css = $options['acp_buttons_background_hover_css'];
        $this->acp_buttons_font_css = $options['acp_buttons_font_css'];
        $this->acp_buttons_text_color_css = $options['acp_buttons_text_color_css'];
        $this->acp_buttons_title_size_css = $options['acp_buttons_title_size_css'];       
        $this->acp_buttons_prev_next = isset($options['acp_buttons_prev_next']) ? $options['acp_buttons_prev_next'] : 0;        
        $this->acp_buttons_visual_style = $options['acp_buttons_visual_style'];
        $this->acp_buttons_hover_text_color = $options['acp_buttons_hover_text_color'];
        $this->acp_buttons_is_arrow_fixed = $options['acp_buttons_is_arrow_fixed'];
        $this->acp_active_button_border_css = $options['acp_active_button_border_css'];
        $this->acp_active_button_background_css = $options['acp_active_button_background_css'];
        $this->acp_active_button_text_color_css = $options['acp_active_button_text_color_css'];
        $this->acp_load_container_css = $options['acp_load_container_css'];
        $this->acp_custom_css = isset($options['acp_custom_css']) ? $options['acp_custom_css'] : '';
    }

    public function toArray() {
        $options = array(
            'acp_paging_on_off' => $this->acp_paging_on_off,
            'acp_wp_shortcode_pagination_view' => $this->acp_wp_shortcode_pagination_view,
            'acp_plugin_pagination_type' => $this->acp_plugin_pagination_type,
            'acp_paging_buttons_location' => $this->acp_paging_buttons_location,
            'acp_do_shortcodes_excerpts' => $this->acp_do_shortcodes_excerpts,
            'acp_excerpts_count' => $this->acp_excerpts_count,
            'acp_buttons_border_css' => $this->acp_buttons_border_css,
            'acp_buttons_background_css' => $this->acp_buttons_background_css,
            'acp_buttons_background_hover_css' => $this->acp_buttons_background_hover_css,
            'acp_buttons_font_css' => $this->acp_buttons_font_css,
            'acp_buttons_text_color_css' => $this->acp_buttons_text_color_css,
            'acp_buttons_title_size_css' => $this->acp_buttons_title_size_css,            
            'acp_buttons_prev_next' => $this->acp_buttons_prev_next,            
            'acp_buttons_visual_style' => $this->acp_buttons_visual_style,
            'acp_buttons_hover_text_color' => $this->acp_buttons_hover_text_color,
            'acp_buttons_is_arrow_fixed' => $this->acp_buttons_is_arrow_fixed,
            'acp_active_button_border_css' => $this->acp_active_button_border_css,
            'acp_active_button_background_css' => $this->acp_active_button_background_css,
            'acp_active_button_text_color_css' => $this->acp_active_button_text_color_css,
            'acp_load_container_css' => $this->acp_load_container_css,
            'acp_custom_css' => $this->acp_custom_css
        );

        return $options;
    }

    public function updateOptions() {
        update_option($this->acp_option_slug, serialize($this->toArray()));
    }

    private function addOptions() {
        $options = array(
            'acp_paging_on_off' => '1', // ACP content pagination, if 0 paging off else paging on
            'acp_wp_shortcode_pagination_view' => '2', // if 1 default pagination else tabbed pagination 
            'acp_plugin_pagination_type' => '1', // if 1 reload page else ajax
            'acp_paging_buttons_location' => '3', //  if 1 top else if 2 bottom else both
            'acp_do_shortcodes_excerpts' => '1', //  do shortcodes in excerpt or not
            'acp_excerpts_count' => '55', //  excerpt length in words
            'acp_buttons_border_css' => '1px solid #cccccc', // pagination buttons border css
            'acp_buttons_background_css' => '#dbdbdb', // pagination buttons background css
            'acp_buttons_background_hover_css' => '#e3e3e3', // pagination buttons hover background css
            'acp_buttons_font_css' => 'arial', // pagination buttons font css
            'acp_buttons_text_color_css' => '#333333', // pagination buttons text color css
            'acp_buttons_title_size_css' => '13px', // pagination buttons text size css from 10px to 20px             
            'acp_buttons_prev_next' => '0', // displays only prev/next buttons            
            'acp_buttons_visual_style' => '1', // pagination buttons visual style
            'acp_buttons_hover_text_color' => '#000000', // pagination buttons visual style
            'acp_buttons_is_arrow_fixed' => '0',
            // PAGINATION ACTIVE BUTTON STYLES
            'acp_active_button_border_css' => '1px solid #cccccc', // pagination active button border css
            'acp_active_button_background_css' => '#ffffff', // pagination active button background css        
            'acp_active_button_text_color_css' => '#333333',
            'acp_load_container_css' => 'rgba(174,174,174,0.7)',
            'acp_custom_css' => ''
        );
        add_option($this->acp_option_slug, serialize($options));
    }

}

?>