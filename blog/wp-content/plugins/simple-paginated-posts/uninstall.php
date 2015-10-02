<?php
/**
 * Uninstall the plugin - completely remove the plugin and clean up its data.
 */

//if uninstall not called from WordPress exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit ();

delete_option('tla_spp_options');