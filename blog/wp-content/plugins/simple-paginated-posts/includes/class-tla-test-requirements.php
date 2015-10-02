<?php
/**
 * Class for testing whether or not the plugin can be safely loaded.
 *
 */

class TLA_SPP_test_requirements {

	public $errors = array();


	function __construct() {
		
	}
	
	/**
	 * Check if there are errors
	 *
	 * @return bool	Returns TRUE if all is OK.
	 */
	public function ok() {
		if ( empty($this->errors) ) {
			return TRUE;
		};
	}
	
	
	/**
	 * Print errors
	 */
	public function print_notices() {
		if ( !empty($this->errors) ) {
			$error_items = '';
			foreach ( $this->errors as $e ) {
				$error_items .= "<li>$e</li>";
			}
			print '<div id="cpl-plugin-error" class="error"><p><strong>'
				.__('The &quot;Simple Paginated Posts&quot; plugin encountered errors! It cannot load!')
				.'</strong>'
				."<ul style='margin-left:30px;'>$error_items</ul>"
				.'</p></div>';
		};
	}

	/**
	 * Tests that the current WordPress version is greater than $ver
	 *
	 * @param string $ver the required WordPress version, e.g. '3.2'.
	 * @return none	Registers an error in the $this->errors array.
	 */
	public function wp_version( $ver ) {
		global $wp_version;
		$exit_msg = __("Custom Page List requires WordPress $ver or newer. <a href='http://codex.wordpress.org/Upgrading_WordPress'>Please update!</a>");

		if ( version_compare( $wp_version, $ver, '<')) {
			$this->errors[] = $exit_msg;
		}
	}

	/**
	 * Tests that the current PHP version is greater than $ver
	 *
	 * @param string $ver the required PHP version, e.g. '5.2.4'.
	 * @return none	Registers an error in the $this->errors array.
	 */
	public function php_version( $ver ) {
		$exit_msg = __("Custom Page List requires PHP $ver or newer. Please contact your system administrator.");

		if ( version_compare( phpversion(), $ver, '<')) {
			$this->errors[] = $exit_msg;
		}
	}

	/**
	 * Tests that the current MySQL version is greater than $ver
	 *
	 * @param string $ver the required MySQL version, e.g. '5.0'.
	 * @return none	Registers an error in the $this->errors array.
	 */
	public function mysql_version( $ver ) {
		global $wpdb;
		$exit_msg = __("Custom Page List requires MySQL $ver or newer. Please contact your system administrator.");
		$result = $wpdb->get_results( 'SELECT VERSION() as ver' );

		if ( version_compare( $result[0]->ver, $ver, '<')) {
			$this->errors[] = $exit_msg;
		}
	}

	/**
	 * Tests that there are no conflicting class names
	 *
	 * @param array $classes the class names used.
	 * @return none	Registers an error in the $this->errors array.
	 */
	public function class_names_used( $classes ) {
		$conflicting_class_names = '';

		foreach ($classes as $class_name) {
			if ( class_exists($class_name) )	{
				$conflicting_class_names .= ' '.$class_name;
			}
		}

		if ( !empty($conflicting_class_names) ) {
			$exit_msg = __("Another plugin or theme has declared conflicting class names:$conflicting_class_names. You must deactivate the plugins that are using these conflicting names");
			$this->errors[] = $exit_msg;
		}
	}

	/**
	 * Tests that there are no conflicting function names
	 *
	 * @param array $functions the function names used.
	 * @return none	Registers an error in the $this->errors array.
	 */
	public function function_names_used( $functions ) {
		$conflicting_function_names = '';

		foreach ($functions as $function_name) {
			if ( function_exists($function_name) )	{
				$conflicting_function_names .= ' '.$function_name;
			}
		}

		if ( !empty($conflicting_function_names) ) {
			$exit_msg = __("Another plugin or theme has declared conflicting function names:$conflicting_function_names. You must deactivate the plugins that are using these conflicting names");
			$this->errors[] = $exit_msg;
		}
	}

	/**
	 * Tests that there are no conflicting constant names
	 *
	 * @param array $constants the constant names used.
	 * @return none	Registers an error in the $this->errors array.
	 */
	public function constant_names_used( $constants ) {
		$conflicting_constant_names = '';

		foreach ($constants as $constant_name) {
			if ( defined($constant_name) )	{
				$conflicting_constant_names .= ' '.$constant_name;
			}
		}

		if ( !empty($conflicting_constant_names) ) {
			$exit_msg = __("Another plugin or theme has declared conflicting constant names:$conflicting_constant_names. You must deactivate the plugins that are using these conflicting names");
			$this->errors[] = $exit_msg;
		}
	}

}
