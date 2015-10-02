<?php
/**
 * Admin class for the Simple Paginated Posts plugin
 * 
 * @todo set default implementation method for new installs
 */

class TLA_SPP_Admin {

	protected $option_name = TLA_SPP_OPTION_NAME;
	protected $plugin_version = TLA_SPP_VERSION;
	protected $pluginurl = TLA_SPP_URL;

	
	function __construct() 	{
		$this->check_upgrade();
		add_action( 'admin_init', array( $this, 'options_init' ) );
		add_action( 'admin_menu', array( $this, 'register_options_page' ) );
		add_action( 'admin_print_styles', array( $this, 'options_page_styles' ));
	}

	
	/**
	 * Check if we need to upgrade anything
	 *
	 */
	function check_upgrade() {
		$options = get_option( $this->option_name );
		$installed_version = isset($options['version']) ? $options['version'] : 0;
	
		if ( version_compare( $installed_version, $this->plugin_version, '==' ) )
			return;

		//New install
		if ( $installed_version == 0 ) {
			$options['implementation_method'] = 'auto';
		}
			
	
		/*
		//Template for upgrading options
		if ( version_compare( $installed_version, '0.1', '<' ) ) {
			$options = get_option( $this->option_name );
			if ( isset( $options['old_option'] ) ) {
				$options['new_option'] = 'on';
				unset( $options['old_option'] );
			}
			update_option( $this->option_name, $options );
		}
		*/
	
		//Update version number
		$options['version'] = $this->plugin_version;
		update_option( $this->option_name, $options );
	
	}
	

	/**
	 * Register all options.
	 */
	function options_init() {
		register_setting( 'spp_settings', $this->option_name );
		add_settings_section('spp_main', __('Settings'), array($this,'section_text'), 'simple-paginated-posts' );
		add_settings_field('spp_text_string', __('Implementation in theme:', 'simple-paginated-posts' ), array($this,'setting_string'), 'simple-paginated-posts', 'spp_main');
	}


	/**
	 * Register the menu
	 *
	 */
	function register_options_page() {
		add_options_page( __('Simple Paginated Posts Settings', 'simple-paginated-posts' ), __('Paginated Posts', 'simple-paginated-posts' ), 'manage_options', 'simple-paginated-posts', array( $this,'options_page' ) );
	}

	/**
	 * Enqueue the CSS when needed
	 *
	 */
	function options_page_styles() {
		global $pagenow;
		if ( $pagenow == 'options-general.php' && isset($_GET['page']) && $_GET['page'] == 'simple-paginated-posts' ) {
			wp_enqueue_style('spp-admin-css',  $this->pluginurl . 'includes/css/admin.css');
		}
	}
	
	
	/**
	 * The settings page
	 *
	 */
	function options_page() {
		?>
		<div class="wrap">
			<div id="icon-options-general" class="icon32"><br /></div>
			<h2><?php _e('Simple Paginated Posts Settings', 'simple-paginated-posts'); ?></h2>
			<div class="metabox-holder">
				<div id ="spp-main" class="postbox-container">
					<form id="spp-options" action="options.php" method="post">
						<?php settings_fields('spp_settings'); ?>
						<?php do_settings_sections('simple-paginated-posts'); ?>
						<input id="submit" class="button-primary" name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
					</form>

					<?php $this->instructions(); ?>

				</div>
				<div  id="spp-sidebar" class="postbox-container">
					<?php include TLA_SPP_DIR.'/includes/page-sidebar.php'; ?>
				</div>
			</div>
		</div>
		<?php
		
	}

	/**
	 * A section text
	 *
	 */
	function section_text() {
		echo '<p>' . _e('Use automatic implementation or manually insert the SPP functions in your theme?', 'simple-paginated-posts') . '</p>';
	}
	
	/**
	 * A settings field
	 *
	 */
	function setting_string() {
		$options = get_option( $this->option_name );
		isset($options['implementation_method']) ? $options['implementation_method'] : $options['implementation_method'] = '';
		echo "<input id='spp_text_radio' name='tla_spp_options[implementation_method]' type='radio' value='auto'" . checked( $options['implementation_method'], 'auto', false ) . " /> Automatic";
		echo '<br/>';
		echo "<input id='spp_text_radio' name='tla_spp_options[implementation_method]' type='radio' value='manual'" . checked( $options['implementation_method'], 'manual', false ) . " /> Manual";
	}
	
		
	/**
	 * Instructions
	 */
	function instructions() {
		$content = '';
		$content .= '<p>';
		$content .= 'The Simple Paginated Posts plugin uses the native WordPress Page-Link tag &lt;!--nextpage--&gt; in combination with a shortcode tag [spp title="My title"] to generate a Table Of Contents for paginated posts. ';
		$content .= 'You simply define a title for the Table Of Contents (TOC) by placing a SPP shortcode tag right after the &lt;!--nextpage--&gt; tag.';
		$content .= '</p><p>';
		$content .= '<strong>Example:</strong><br/>&lt;!--nextpage--&gt;<br/>[spp title="My title"]';
		$content .= '</p>';
		$content .= '<p>The plugin will then generate a TOC with the values defined in the SPP shortcodes';
		$content .= '</p>';
		$content .= '<h4>Manual Implementation</h4>';
		$content .= '<p>If you choose to implement Simple Paginated Posts (SPP) manually you need to insert the SPP template functions in your theme</p>';
		$content .= '<ul>';
		$content .= '<li><strong>spp_continued()</strong> - Displays "Continued from PREVIOUS TITLE"</li>';
		$content .= '<li><strong>spp_toc()</strong> - Displays the Table Of Contents</li>';
		$content .= '<li><strong>spp_link_pages()</strong> - Displays: Previous 1 2 3 4 Next</li>';
		$content .= '</ul>';
		$content .= '<p>Please refer to the plugin homepage for full <a href="http://wpplugins.tlamedia.dk/simple-paginated-posts/">documentation</a> of the template functions</p>';
		$this->dashboard_widget('spp-instructions',__('Instructions', 'simple-paginated-posts'),$content);
	}
		
	
	/**
	 * Create a potbox widget
	 */
	function dashboard_widget($id, $title, $content) {
		?>
		<div id="<?php echo $id; ?>" class="postbox">
			<div class="handlediv" title="Click to toggle"><br /></div>
			<h3 class="hndle"><span><?php echo $title; ?></span></h3>
			<div class="inside">
				<?php echo $content; ?>
			</div><!-- .inside -->
		</div><!-- #<?php echo $id; ?> .postbox -->
		<?php
	}

}
