<?php
include_once 'acp-options-serialized.php';

class ACP_Options {

    private $acp_options_serialized;

    public function __construct() {
        $this->acp_options_serialized = new ACP_Options_Serialized();
    }

    public function get_default_options() {
        return $this->acp_options_serialized;
    }

    /**
     * Builds options page
     */
    public function options_form() {

        if (isset($_POST['submit'])) {

            if (function_exists('current_user_can') && !current_user_can('manage_options')) {
                die(_e('Hacker?', ACP_Core::$TEXT_DOMAIN));
            }

            if (function_exists('check_admin_referer')) {
                check_admin_referer('acp_options_form');
            }

            $this->acp_options_serialized->acp_paging_on_off = isset($_POST['acp_paging_on_off']) ? $_POST['acp_paging_on_off'] : 0;
            $this->acp_options_serialized->acp_wp_shortcode_pagination_view = $_POST['acp_wp_shortcode_pagination_view'];
            $this->acp_options_serialized->acp_plugin_pagination_type = $_POST['acp_plugin_pagination_type'];
            $this->acp_options_serialized->acp_paging_buttons_location = $_POST['acp_paging_buttons_location'];
            $this->acp_options_serialized->acp_do_shortcodes_excerpts = isset($_POST['acp_do_shortcodes_excerpts']) ? $_POST['acp_do_shortcodes_excerpts'] : 1;
            $this->acp_options_serialized->acp_excerpts_count = isset($_POST['acp_excerpts_count']) ? $_POST['acp_excerpts_count'] : 55;
            $this->acp_options_serialized->acp_buttons_border_css = $_POST['acp_buttons_border_css'];
            $this->acp_options_serialized->acp_buttons_background_css = $_POST['acp_buttons_background_css'];
            $this->acp_options_serialized->acp_buttons_background_hover_css = $_POST['acp_buttons_background_hover_css'];
            $this->acp_options_serialized->acp_buttons_font_css = $_POST['acp_buttons_font_css'];
            $this->acp_options_serialized->acp_buttons_text_color_css = $_POST['acp_buttons_text_color_css'];
            $this->acp_options_serialized->acp_buttons_title_size_css = $_POST['acp_buttons_title_size_css'];
            $this->acp_options_serialized->acp_buttons_prev_next = isset($_POST['acp_buttons_prev_next']) ? $_POST['acp_buttons_prev_next'] : 0;
            $this->acp_options_serialized->acp_buttons_visual_style = $_POST['acp_buttons_visual_style'];
            $this->acp_options_serialized->acp_buttons_hover_text_color = isset($_POST['acp_buttons_hover_text_color']) ? $_POST['acp_buttons_hover_text_color'] : '#000000';
            $this->acp_options_serialized->acp_buttons_is_arrow_fixed = isset($_POST['acp_buttons_is_arrow_fixed']) ? $_POST['acp_buttons_is_arrow_fixed'] : '0';
            $this->acp_options_serialized->acp_active_button_border_css = $_POST['acp_active_button_border_css'];
            $this->acp_options_serialized->acp_active_button_background_css = $_POST['acp_active_button_background_css'];
            $this->acp_options_serialized->acp_active_button_text_color_css = $_POST['acp_active_button_text_color_css'];
            $this->acp_options_serialized->acp_load_container_css = isset($_POST['acp_load_container_css']) ? $_POST['acp_load_container_css'] : 'rgba(174,174,174,0.7)';
            $this->acp_options_serialized->acp_custom_css = isset($_POST['acp_custom_css']) ? $_POST['acp_custom_css'] : '';



            $this->acp_options_serialized->updateOptions();
        }
        ?>
        <div class="wrap">

            <div style="float:left; width:34px; height:34px; margin:10px 10px 20px 0px;"><img src="<?php echo plugins_url(ACP_Core::$PLUGIN_DIRECTORY . '/files/img/acp.gif'); ?>" style="width:34px;"/></div><h2><?php _e('Advanced Content Pagination Settings', ACP_Core::$TEXT_DOMAIN); ?></h2>
            <br style="clear:both" />           
            <form action="<?php echo admin_url(); ?>admin.php?page=acp_options&updated=true" method="post" name="acp_options">
                <?php
                if (function_exists('wp_nonce_field')) {
                    wp_nonce_field('acp_options_form');
                }
                ?>

                <?php
                include 'options_layouts/promo.php';
                ?> 
                <table cellspacing="0" class="wp-list-table widefat plugins">
                    <thead>
                        <tr>
                            <th colspan="4" scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="4">&nbsp;</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        include 'options_layouts/settings-general.php';
                        include 'options_layouts/settings-button-style.php';
                        include 'options_layouts/settings-button-active-style.php';
                        include 'options_layouts/settings-button-layouts.php';
                        include 'options_layouts/settings-custom-styles.php';
                        ?>

                        <tr class="type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0" valign="top">
                            <td colspan="4">
                                <p class="submit">
                                    <input type="submit" class="button button-primary" name="submit" value="<?php _e('Save Changes', ACP_Core::$TEXT_DOMAIN); ?>" />
                                </p>
                            </td>
                        </tr>

                    <input type="hidden" name="action" value="update" />
                    </tbody>
                </table>

            </form>
        </div>
        <?php
    }

}
?>