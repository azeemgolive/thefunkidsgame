<?php
/*
  Plugin Name: Advanced Post Pagination
  Description: Creates fully customizable pagination buttons for post and page content with five different layouts
  Version: 1.4.0
  Author: gVectors Team (A. Chakhoyan, G. Zakaryan, H. Martirosyan)
  Author URI: http://www.gvectors.com/
  Plugin URI: http://www.gvectors.com/advanced-content-pagination/
 */

/*
  Copyright 2013 gConverter, LLC (email:support@gconverter.com)
  This program is not a free software; you can not re-sell and distribute it.
 */


if (!defined('WP_CONTENT_URL'))
    define('WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if (!defined('WP_CONTENT_DIR'))
    define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
if (!defined('WP_PLUGIN_URL'))
    define('WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins');
if (!defined('WP_PLUGIN_DIR'))
    define('WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins');

define('PPACP_FOLDER', dirname(__FILE__) . '/');
define('PPACP_PATH', WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/');


include_once 'acp_css.php';
include_once 'acp_options.php';

class ACP_Core {

    private $acp_options;
    private $acp_options_serialized;
    private $acp_css;
    private $shortcode_content;
    private $pattern = '|\[nextpage[^\[\]]*\](.+?)\[/nextpage\]|is';
    private $open_pattern = '|\[nextpage[^\[\]]*\]|is';
    private $page;
    private $query_page;
    private $curr_page = 0;
    private $loading_type;
    private $html_text;
    private $shorcodes_array = array();
    public static $PLUGIN_DIRECTORY;
    public static $TEXT_DOMAIN = 'ac_pagination';

    public function __construct() {
        add_action('init', array(&$this, 'init_plugin_dir_name'), 1);
        add_action('plugins_loaded', array(&$this, 'load_acp_text_domain'));
        $this->acp_options = new ACP_Options();
        $this->acp_options_serialized = $this->acp_options->get_default_options();
        $this->acp_css = new ACP_Frontend_Style($this->acp_options_serialized);

        $this->loading_type = intval($this->acp_options_serialized->acp_plugin_pagination_type);

        add_action('init', array(&$this, 'add_buttons_and_ext_plugin'));
        add_action('admin_footer', array(&$this, 'add_dialog'));

        add_action('admin_menu', array(&$this, 'add_plugin_options_page'), -125);
        add_action('admin_enqueue_scripts', array(&$this, 'admin_page_styles_scripts'));
        add_action('wp_enqueue_scripts', array(&$this->acp_css, 'frontend_styles'));
        add_action('wp_enqueue_scripts', array(&$this, 'front_end_styles_scripts'));
        add_filter('the_excerpt', array(&$this, 'do_nextpage_shortcode_in_excerpt'));

        add_action('add_meta_boxes', array($this, 'add_acp_meta_box'));
        add_action('save_post', array($this, 'save_acp_metadata'));

        add_action('wp_ajax_pp_with_ajax', array(&$this, 'pagination_with_ajax'));
        add_action('wp_ajax_nopriv_pp_with_ajax', array(&$this, 'pagination_with_ajax'));

        $plugin = plugin_basename(__FILE__);
        add_filter("plugin_action_links_$plugin", array(&$this, 'acp_add_plugin_settings_link'));

        if (intval($this->acp_options_serialized->acp_paging_on_off) === 1) {
            if (function_exists('add_shortcode')) {
                add_shortcode('nextpage', array(&$this, 'nextpage_shortcode'));
            }
        }
        // Add nextpage shortcode to the Visual Composer
        add_action('vc_before_init', array(&$this, 'acp_shordcode_to_vc'));
    }

    public function load_acp_text_domain() {
        load_plugin_textdomain('ac_pagination', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    /**
     * Adds a box to the main column on the Post and Page edit screens.
     */
    public function add_acp_meta_box($post_type) {
        $post_types = apply_filters('acp_metabox_post_types', array('post', 'page'));
        if (in_array($post_type, $post_types)) {
            add_meta_box(
                    'some_meta_box_name'
                    , __('ACP Settings', ACP_Core::$TEXT_DOMAIN)
                    , array($this, 'render_acp_meta_box_content')
                    , $post_type
                    , 'side'
                    , 'high'
            );
        }
    }

    /**
     * Prints the meta box content.
     */
    public function render_acp_meta_box_content($post) {

        wp_nonce_field('acp_inner_custom_box', 'acp_inner_custom_box_nonce');

        $acp_loading_type = esc_attr(get_post_meta($post->ID, '_acp_loading_type', true));
        $acp_button_style = esc_attr(get_post_meta($post->ID, '_acp_button_style', true));

        $this->acp_loading_type_metabox_html($acp_loading_type);
        $this->acp_button_style_metabox_html($acp_button_style);
    }

    /**
     * When the post is saved, saves our custom data.
     */
    public function save_acp_metadata($post_id) {

        if (!isset($_POST['acp_inner_custom_box_nonce']))
            return $post_id;

        $nonce = $_POST['acp_inner_custom_box_nonce'];

        if (!wp_verify_nonce($nonce, 'acp_inner_custom_box'))
            return $post_id;

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;

        if ('page' == $_POST['post_type']) {

            if (!current_user_can('edit_page', $post_id))
                return $post_id;
        } else {
            if (!current_user_can('edit_post', $post_id))
                return $post_id;
        }
        $acp_button_style = sanitize_text_field($_POST['acp_button_style']);
        update_post_meta($post_id, '_acp_button_style', $acp_button_style);
        $acp_loading_type = sanitize_text_field($_POST['acp_loading_type']);
        update_post_meta($post_id, '_acp_loading_type', $acp_loading_type);
    }

    /*
     * return excerpt from shortcodes
     */

    public function do_nextpage_shortcode_in_excerpt($excerpt) {
        if (has_excerpt()) {
            return $excerpt;
        }
        $excerpt = get_the_content();
        $excerpt_count = $this->acp_options_serialized->acp_excerpts_count;
        if ($this->acp_options_serialized->acp_do_shortcodes_excerpts == '2') {
            return do_shortcode(wp_trim_words($excerpt, $excerpt_count));
        } else {
            $excerpt = preg_replace($this->open_pattern, '', $excerpt);
            $excerpt = str_replace('[/nextpage]', '', $excerpt);
            $excerpt = strip_shortcodes($excerpt);
            return wp_trim_words($excerpt, $excerpt_count);
        }
    }

    /**
     * Scripts and styles registration on administration pages
     */
    public function admin_page_styles_scripts() {
        wp_register_style('plugin-css', plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/css/plugin-style.css'));
        wp_enqueue_style('plugin-css');
        wp_register_style('modal-css', plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/css/modal-box.css'));
        wp_enqueue_style('modal-css');
        wp_register_style('colorpicker-css', plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/css/colorpicker.css'));
        wp_enqueue_style('colorpicker-css');
        wp_enqueue_script('colorpicker-js', plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/js/colorpicker.js'), array('jquery'), '1.0.0', false);
        wp_enqueue_script('plugin-scripts', plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/js/plugin-scripts.js'), array('jquery'), '1.0.0', false);


        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/MSIE/i', $u_agent)) {
            wp_register_style('modal-css-ie', plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/css/modal-box-ie.css'));
            wp_enqueue_style('modal-css-ie');
        }

        wp_enqueue_media();
        wp_register_script('upload-window', WP_PLUGIN_URL . '/advanced-content-pagination/files/js/open_media_window.js', array('jquery', 'media-upload', 'thickbox'));
        wp_enqueue_script('upload-window');
    }

    /**
     * Styles and scripts registration to use on front page
     */
    public function front_end_styles_scripts() {
        if (is_singular()) {
            global $post;
            $loading_type = esc_attr(get_post_meta($post->ID, '_acp_loading_type', true));
            if ($loading_type) {
                $this->loading_type = intval($loading_type);
            }

            $btn_visual_style = intval($this->acp_options_serialized->acp_buttons_visual_style);
            $current_post_button_style = esc_attr(get_post_meta($post->ID, '_acp_button_style', true));
            if ($current_post_button_style) {
                $btn_visual_style = intval($current_post_button_style);
            }

            wp_enqueue_script('front-end-scripts-js', plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/js/front-end-scripts.js'), array('jquery'), '1.0.0', false);
            if ($this->loading_type === 2) {
                wp_enqueue_script('acp-ajax-js', plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/js/acp-ajax.js'), array('jquery'), '1.0.0', false);
                wp_localize_script('jquery', 'acp_ajax_obj', array('url' => admin_url('admin-ajax.php')));
            }

            if ($this->acp_options_serialized->acp_buttons_prev_next || $btn_visual_style === 4) {
                wp_register_style('prev-next-layout-css', plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/css/prev-next-layout-css.css'));
                wp_enqueue_style('prev-next-layout-css');
                if ($this->loading_type === 2) {
                    wp_enqueue_script('prev-next-layout-js', plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/js/prev-next-layout-js.js'), array('jquery'), '1.0.0', false);
                }
            } else {
                wp_register_style('jcarousel', plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/css/jcarousel.css'));
                wp_enqueue_style('jcarousel');
                wp_enqueue_script('jcarousel-min-js', plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/js/jquery.jcarousel.min.js'), array('jquery'), '0.3.0', false);
                if ($this->acp_options_serialized->acp_buttons_is_arrow_fixed) {
                    wp_enqueue_script('jcarousel-js-fixed', plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/js/jcarousel.responsive_fixed.js'), array('jquery'), '0.3.0', false);
                } else {
                    wp_enqueue_script('jcarousel-js', plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/js/jcarousel.responsive.js'), array('jquery'), '0.3.0', false);
                }
            }
        }
    }

    /**
     * register options page for plugin
     */
    public function add_plugin_options_page() {
        if (function_exists('add_options_page')) {
            add_menu_page(__('AP Pagination', ACP_Core::$TEXT_DOMAIN), __('AP Pagination', ACP_Core::$TEXT_DOMAIN), 'manage_options', 'acp_options', array(&$this->acp_options, 'options_form'), plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/web_site.png'), 100);
        }
    }

    /**
     * the function which will be called every time on finding shortcode in post content
     * @global type $post the current post with pagination
     * @param type $atts the shortcode attributes
     * @param type $content the shortcode content
     * @return type generated html content
     */
    public function nextpage_shortcode($atts, $content) {

        if (is_singular()) {
            global $post;
            $loading_type = esc_attr(get_post_meta($post->ID, '_acp_loading_type', true));
            if ($loading_type) {
                $this->loading_type = intval($loading_type);
            }
            $btn_visual_style = intval($this->acp_options_serialized->acp_buttons_visual_style);
            $current_post_button_style = esc_attr(get_post_meta($post->ID, '_acp_button_style', true));
            if ($current_post_button_style) {
                $btn_visual_style = intval($current_post_button_style);
            }
            $pages_count;
            $this->query_page = get_query_var('page') ? get_query_var('page') : 1;
            $this->page++;
            extract(shortcode_atts(array(
                'title' => __('Title', ACP_Core::$TEXT_DOMAIN)
                            ), $atts), EXTR_OVERWRITE);

            $link;
            $anchor = '';

            if ($this->page == 1) {
                $link = get_permalink();
            } else {
                $link = get_permalink() . '&page=' . $this->page;
            }

            $link = _wp_link_page($this->page);
            $pattern = '\[(\[?)(nextpage)(?![\w-])([^\]\/]*(?:\/(?!\])[^\]\/]*)*?)(?:(\/)\]|\](?:([^\[]*+(?:\[(?!\/\2\])[^\[]*+)*+)\[\/\2\])?)(\]?)';

            $link = substr_replace($link, $anchor . '">', -2);

            if (preg_match_all('/' . $pattern . '/s', $post->post_content, $matches) && array_key_exists(2, $matches) && in_array('nextpage', $matches[2])) {
                $pages_count = 0;
                foreach ($matches[2] as $match) {
                    if ($match == 'nextpage') {
                        $pages_count++;
                    }
                }
            }
            $html = '';
            $active_item = '';

            if ($this->curr_page === $this->query_page - 1) {
                $this->shortcode_content = $content;
                $active_item = ' active';
                $link = '';
            }
            if ($btn_visual_style === 4) {
                $this->shorcodes_array[] = array(
                    'title' => $title,
                    'shortcode_content' => ($pages_count == 1) ? $content : $this->shortcode_content,
                    'curr_page' => $this->curr_page,
                    'url_page_number' => $this->page,
                    'link' => $link
                );
                if ($pages_count === count($this->shorcodes_array)) {
                    $html = $this->build_only_prev_next_pagination_html($this->shorcodes_array, $this->loading_type);
                }
            } else {
                if (!$this->acp_options_serialized->acp_buttons_prev_next) {
                    if ($pages_count == 1) {
                        $html = $this->build_pagination_html($this->curr_page, $pages_count, $active_item, $this->page, $link, trim($title), do_shortcode($content));
                    } else {
                        $html = $this->build_pagination_html($this->curr_page, $pages_count, $active_item, $this->page, $link, trim($title), do_shortcode($this->shortcode_content));
                    }
                } else {
                    $this->shorcodes_array[] = array(
                        'title' => $title,
                        'shortcode_content' => ($pages_count == 1) ? $content : $this->shortcode_content,
                        'curr_page' => $this->curr_page,
                        'url_page_number' => $this->page,
                        'link' => $link
                    );

                    if ($pages_count === count($this->shorcodes_array)) {
                        $html = $this->build_prev_next_pagination_html($this->shorcodes_array);
                    }
                }
            }
            $this->curr_page++;
            return $html;
        } else {
            return do_shortcode($content);
        }
    }

    /**
     * @param type $curr_page the i-th shortcode in post content
     * @param type $pages_count the shortcodes count in post content
     * @param type $active_item the active page 
     * @param type $page the i-th page
     * @param type $link the pages link
     * @param type $title the shortcode title attribute
     * @param type $shortcode_content the shortcode content
     * @return type HTML the generated html
     */
    private function build_pagination_html($curr_page, $pages_count, $active_item, $page, $link, $title, $shortcode_content) {
        $html = '';
        global $post;
        $loading_type = esc_attr(get_post_meta($post->ID, '_acp_loading_type', true));
        if ($loading_type) {
            $this->loading_type = intval($loading_type);
        }
        $btn_visual_style = intval($this->acp_options_serialized->acp_buttons_visual_style);
        $current_post_button_style = esc_attr(get_post_meta($post->ID, '_acp_button_style', true));
        if ($current_post_button_style) {
            $btn_visual_style = intval($current_post_button_style);
        }
        $acp_wp_shortcode_pagination_view = intval($this->acp_options_serialized->acp_wp_shortcode_pagination_view);

        $acp_paging_buttons_location = intval($this->acp_options_serialized->acp_paging_buttons_location);


        if ($acp_wp_shortcode_pagination_view === 1) {
            $btn_visual_style = -1;
        }

        // check pagination loading type if 1 reload page else type = AJAX loading
        if ($this->loading_type === 1) {
            // ==================================================================================================             
            if ($btn_visual_style === 1) { // Buttons with only title
                include 'buttons_layouts/page_reload/button_layout_1.php';
            }
            // ================================================================================================== 
            else if ($btn_visual_style === 2) { // Buttons with page number and title
                include 'buttons_layouts/page_reload/button_layout_2.php';
            }
            // ================================================================================================== 
            else {
                include 'buttons_layouts/page_reload/button_layout_3.php';
            }
        }
        // =============================== Pagination HTML for AJAX ==================================== 
        else {
            // ==================================================================================================             
            if ($btn_visual_style === 1) { // Buttons with only title
                include 'buttons_layouts/ajax_load/button_layout_1_js.php';
            }
            // ================================================================================================== 
            else if ($btn_visual_style === 2) { // Buttons with page number and title
                include 'buttons_layouts/ajax_load/button_layout_2_js.php';
            }
            // ================================================================================================== 
            else { // Buttons with page number only
                include 'buttons_layouts/ajax_load/button_layout_3_js.php';
            }
        }
        return $html;
    }

    private function build_prev_next_pagination_html($shortcodes_array) {
        $html = '';
        $btn_visual_style = intval($this->acp_options_serialized->acp_buttons_visual_style);
        $acp_wp_shortcode_pagination_view = intval($this->acp_options_serialized->acp_wp_shortcode_pagination_view);
        $acp_paging_buttons_location = intval($this->acp_options_serialized->acp_paging_buttons_location);

        global $post;
        $loading_type = esc_attr(get_post_meta($post->ID, '_acp_loading_type', true));
        if ($loading_type) {
            $this->loading_type = intval($loading_type);
        }
        $current_post_button_style = esc_attr(get_post_meta($post->ID, '_acp_button_style', true));
        if ($current_post_button_style) {
            $btn_visual_style = intval($current_post_button_style);
        }

        if ($acp_wp_shortcode_pagination_view === 1) {
            $btn_visual_style = -1;
        }

        // check pagination loading type if 1 reload page else type = AJAX loading
        if ($this->loading_type === 1) {


            $current_query_page = $this->query_page - 1;

            if ($current_query_page == 0) {
                $prev = count($shortcodes_array) - 1;
                $next = 1;
            } else if ($current_query_page == count($shortcodes_array) - 1) {
                $prev = count($shortcodes_array) - 2;
                $next = 0;
            } else {
                $prev = $current_query_page - 1;
                $next = $current_query_page + 1;
            }

            $prev_shortcode_array = $shortcodes_array[$prev];
            $next_shortcode_array = $shortcodes_array[$next];
            $current_shortcode_array = $shortcodes_array[$current_query_page];

            // ================================================================================================== 
            if ($btn_visual_style === 1) {
                include 'buttons_layouts/page_reload/prev_next/button_layout_1.php';
            }
            // ================================================================================================== 
            else if ($btn_visual_style === 2) {
                include 'buttons_layouts/page_reload/prev_next/button_layout_2.php';
            }
            // ==================================================================================================  
            else {
                include 'buttons_layouts/page_reload/prev_next/button_layout_3.php';
            }
        }
        // =============================== Pagination HTML for AJAX ==================================== 
        else {
            // ================================================================================================== 
            if ($btn_visual_style === 1) {
                include 'buttons_layouts/ajax_load/prev_next/button_layout_1_js.php';
            }
            // ================================================================================================== 
            else if ($btn_visual_style === 2) {
                include 'buttons_layouts/ajax_load/prev_next/button_layout_2_js.php';
            }
            // ================================================================================================== 
            else {
                include 'buttons_layouts/ajax_load/prev_next/button_layout_3_js.php';
            }
        }
        return $html;
    }

    public function build_only_prev_next_pagination_html($shortcodes_array, $loading_type) {
        $html = '';
        $acp_paging_buttons_location = intval($this->acp_options_serialized->acp_paging_buttons_location);

        if ($loading_type === 1) {
            $current_query_page = $this->query_page - 1;
            if ($current_query_page == 0) {
                $prev = count($shortcodes_array) - 1;
                $next = 1;
            } else if ($current_query_page == count($shortcodes_array) - 1) {
                $prev = count($shortcodes_array) - 2;
                $next = 0;
            } else {
                $prev = $current_query_page - 1;
                $next = $current_query_page + 1;
            }

            $prev_shortcode_array = $shortcodes_array[$prev];
            $next_shortcode_array = $shortcodes_array[$next];
            $current_shortcode_array = $shortcodes_array[$current_query_page];
            include 'buttons_layouts/page_reload/button_layout_4.php';
        } else {
            include 'buttons_layouts/ajax_load/button_layout_4_js.php';
        }

        return $html;
    }

    /**
     * load shortcode content via ajax
     */
    public function pagination_with_ajax() {
        $response = __('No Content', ACP_Core::$TEXT_DOMAIN);
        if (isset($_POST['acp_pid']) && !empty($_POST['acp_pid'])) {
            $acp_pid = $_POST['acp_pid'];
            $acp_currpage = $_POST['acp_currpage'];
            $acp_shortcode = $_POST['acp_shortcode'];
            if ($acp_shortcode == 'acp_shortcode') {
                // advanced pagination shortcode
                $response = $this->acp_pagination_ajax($acp_pid, $acp_currpage);
            }
        }
        echo $response;
        exit;
    }

    /**
     * @param type $id the post id
     * @param type $curr_page the i-th page
     * @return type HTML 
     */
    public function acp_pagination_ajax($id, $curr_page) {
        $post = get_post($id);
        $content = $post->post_content;
        preg_match_all($this->pattern, $content, $matches, PREG_SET_ORDER);
        for ($i = 0; $i < count($matches); $i++) {
            $shortcode_content_array[] = $matches[$i][1];
        }
        $shortcode_content = $shortcode_content_array[$curr_page - 1];
        $shortcode_content = do_shortcode($shortcode_content);
        $shortcode_content = str_replace(']]>', ']]&gt;', $shortcode_content);
        return wpautop($shortcode_content);
    }

    /**
     * register editor plugin javascript if current user can edit posts      
     */
    function add_buttons_and_ext_plugin() {
        if ($this->acp_options_serialized->acp_paging_on_off && $this->acp_options_serialized->acp_wp_shortcode_pagination_view == 2) {
            if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
                return;
            }

            if (get_user_option('rich_editing') == 'true') {
                add_filter('mce_buttons', array(&$this, 'add_mce_buttons'), -1);
                add_filter('mce_external_plugins', array(&$this, 'add_mce_external_plugins'), -1);
            }
        }
    }

    /**
     * add button on wordpress post editor panel
     */
    function add_mce_buttons($buttons) {
        global $tinymce_version;
        if (version_compare($tinymce_version, '4018') >= 0) {
            array_push($buttons, 'dialog');
        } else {
            array_push($buttons, '|', 'dialog_button');
        }
        return $buttons;
    }

    /**
     * register editor plugin
     * @return registered plugins array
     */
    function add_mce_external_plugins() {
        global $tinymce_version;
        if (function_exists("plugins_url")) {
            // if wordpress version > 2.4
            if (version_compare($tinymce_version, '4018') >= 0) {
                $plugin_array['ACPPlugin'] = plugins_url('/advanced-content-pagination/files/js/editor_plugin_3.9.js');
            } else {
                $plugin_array['ACPPlugin'] = plugins_url('/advanced-content-pagination/files/js/editor_plugin_3.8.3.js');
            }
        } else {
            // if wordpress version < 2.4
            $plugin_array['ACPPlugin'] = site_url() . '/wp-content/plugins/advanced-content-pagination/files/js/editor_plugin_3.8.3.js';
        }
        return $plugin_array;
    }

    /**
     * 
     * @param type string button title
     * @return formatted title
     */
    public function acp_button_text($title, $length = 55) {
        if (function_exists('mb_strlen')) {
            if (mb_strlen($title, mb_internal_encoding()) > $length) {
                $title = mb_substr($title, 0, $length, mb_internal_encoding()) . '...';
            }
        } else {
            if (strlen($title) > $length) {
                $title = substr($title, 0, $length) . '...';
            }
        }
        return $title;
    }

    /**
     * the dialog html to add shortcodes
     */
    function add_dialog() {
        // the layout with title and paging number
        $button_style_2 = $this->acp_options_serialized->acp_buttons_visual_style == 2;
        ?>
        <style>#TB_window{ background:#F0F0F0}</style>

        <div id="acp_dialog" style="display:none;">
            <div class="shortcode_dialog" style="padding:0px 20px 20px 20px;">    
                <h2 style="font-weight:normal; padding-bottom:10px;"><?php _e('Pagination Button Components', ACP_Core::$TEXT_DOMAIN); ?> </h2>

                <div class="acp_title_wrap">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="width:160px; vertical-align:top; padding-top:5px;"><label class="shortcode_title" for="shortcode_title" style="font-size:13px; font-weight:bold;color:#333333"><?php _e('Button Title:', ACP_Core::$TEXT_DOMAIN); ?></label></td>
                            <td>
                                <input id="shortcode_title" class="shortcode_title" type="text"  style="border:#cccccc 1px solid; padding:3px 3px; width:350px; font-size:16px;" maxlength="100" />
                                <br />
                                <span style="font-size:12px; font-style:italic; color:#555555; cursor:help;"><?php _e('maximum characters', ACP_Core::$TEXT_DOMAIN); ?> 
                                    <span title="Pagination Button Layout #1 with image title and description">L1:15</span> , 
                                    <span title="Pagination Button Layout #2 with title and description">L2:24</span> , 
                                    <span title="Pagination Button Layouts #3, #4 and #5">L3,L4,L5:43</span>
                                </span>
                                <div class="error_msg"><span class="required_field"><?php _e('The title is required field!', ACP_Core::$TEXT_DOMAIN); ?></span></div></td>
                        </tr>
                    </table>
                </div>

                <div class="submit_container" style="text-align:right; padding-right:50px; display:block; padding-top:15px;">
                    <button id="insert_shorcode" class="insert_shortcode button button-primary button-large"><?php _e('Insert Page', ACP_Core::$TEXT_DOMAIN); ?></button>
                </div>

                <div class="button_layout_wrapper">
                    <div style="margin:10px auto; font-size: 15px; font-weight: bold; text-align: center">
                        <?php _e('Current button layout on website', ACP_Core::$TEXT_DOMAIN); ?>
                    </div>

                    <div class="acp_button_layout">                    
                        <style type="text/css">

                            .acp_button_layout {
                                border: <?php echo $this->acp_options_serialized->acp_buttons_border_css; ?>;
                                background: <?php echo $this->acp_options_serialized->acp_buttons_background_css; ?>;
                                color: <?php echo $this->acp_options_serialized->acp_buttons_text_color_css; ?> !important;
                                margin: 25px auto;
                                width: 200px;
                                text-align: center;
                                overflow: hidden;
                                height: 50px;
                            }

                            .acp_button_number {
                                width: 50px;
                                height: 50px;
                                float: left;
                                margin-right: 3px;
                                background-color: #777;
                                font-family: arial;
                                font-weight: bold;
                                line-height: 50px;
                                color: #fff;
                                font-size: 16px;
                            }

                            .acp_button_title {
                                font-size: <?php echo $this->acp_options_serialized->acp_buttons_title_size_css; ?>;
                                overflow: hidden;
                            }

                            .align_left {
                                width: 50px;
                                height: 50px;
                            }
                        </style>

                        <?php if ($button_style_2) { ?>
                            <div class="acp_button_number">
                                <span class="align_left">1</span>
                            </div>
                        <?php } ?>
                        <div class="acp_button_title"></div>                        
                    </div>

                </div>

            </div>
        </div>
        <?php
    }

    /**
     * generate html loading type metabox
     */
    private function acp_loading_type_metabox_html($acp_loading_type) {
        $loading_types = array(array('id' => 'acp_loading_type_reload', 'label' => __('Reload Page', ACP_Core::$TEXT_DOMAIN), 'value' => '1'),
            array('id' => 'acp_loading_type_ajax', 'label' => __('Ajax', ACP_Core::$TEXT_DOMAIN), 'value' => '2'));

        if (empty($acp_loading_type)) {
            $acp_loading_type = $this->loading_type;
        }

        $meta_html = '<h4>' . __('Page Loading Type', ACP_Core::$TEXT_DOMAIN) . '</h4>';
        foreach ($loading_types as $loading_type) {
            $checked = ($loading_type['value'] == $acp_loading_type) ? 'checked="checked"' : '';
            $meta_html.= '<input id="' . $loading_type['id'] . '" type="radio" value="' . $loading_type['value'] . '" ' . $checked . ' name="acp_loading_type" />';
            $meta_html.= '<label for="' . $loading_type['id'] . '">' . $loading_type['label'] . '</label>&nbsp;&nbsp;&nbsp;';
        }

        echo $meta_html;
    }

    /**
     * generate html button  style metabox
     */
    private function acp_button_style_metabox_html($acp_button_style) {
        $button_styles = array(array('id' => 'acp_button_style_title', 'label' => __('Title', ACP_Core::$TEXT_DOMAIN), 'value' => '1'),
            array('id' => 'acp_button_style_title_number', 'label' => __('Title & Number', ACP_Core::$TEXT_DOMAIN), 'value' => '2'),
            array('id' => 'acp_button_style_next_prev', 'label' => __('Previous & Next', ACP_Core::$TEXT_DOMAIN), 'value' => '4'),
            array('id' => 'acp_button_style_number', 'label' => __('Number', ACP_Core::$TEXT_DOMAIN), 'value' => '3'));

        if (empty($acp_button_style)) {
            $acp_button_style = intval($this->acp_options_serialized->acp_buttons_visual_style);
        }

        $meta_html = '<h4>' . __('Pagination Button Layout', ACP_Core::$TEXT_DOMAIN) . '</h4>';
        foreach ($button_styles as $button_style) {
            $checked = ($button_style['value'] == $acp_button_style) ? 'checked="checked"' : '';
            $meta_html.= '<input id="' . $button_style['id'] . '" type="radio" value="' . $button_style['value'] . '" ' . $checked . ' name="acp_button_style" />';
            $meta_html.= '<label for="' . $button_style['id'] . '">' . $button_style['label'] . '</label><br/>';
        }

        echo $meta_html;
    }

    public function init_plugin_dir_name() {
        $plugin_dir_path = plugin_dir_path(__FILE__);
        $path_array = array_values(array_filter(explode(DIRECTORY_SEPARATOR, $plugin_dir_path)));
        $path_last_part = $path_array[count($path_array) - 1];
        ACP_Core::$PLUGIN_DIRECTORY = untrailingslashit($path_last_part);
    }

    // Add settings link on plugin page
    public function acp_add_plugin_settings_link($links) {
        $settings_link = '<a href="' . admin_url() . 'admin.php?page=acp_options">' . __('Settings', 'default') . '</a>';
        array_unshift($links, $settings_link);
        return $links;
    }

    public function acp_shordcode_to_vc() {
        vc_map(array(
            "name" => __("Advanced Post Pagination", ACP_Core::$TEXT_DOMAIN),
            "base" => "nextpage",
            'description' => __("Splits long content to multiple pages", ACP_Core::$TEXT_DOMAIN),
            'icon' => plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/web_site.png'),
            'show_settings_on_create' => true,
            "class" => "",
            "category" => __("Content", 'js_composer'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Pagination button title", ACP_Core::$TEXT_DOMAIN),
                    "param_name" => "title",
                    "value" => '',
                    "description" => __("Enter your pagination button title.", ACP_Core::$TEXT_DOMAIN)
                ),
                array(
                    "type" => "textarea_html",
                    "class" => "",
                    "heading" => __("subPage content", ACP_Core::$TEXT_DOMAIN),
                    "param_name" => "content",
                    "value" => '',
                    "description" => ''
                )
            )
        ));
    }

}

new ACP_Core();
?>