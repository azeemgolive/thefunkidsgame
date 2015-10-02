<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

function al_portfolio_options() {
    $options = array(
        'title' => __('Portfolio', 'redux-framework-demo'),
        'icon' => 'el-icon-th',
        'fields' => array(
            array(
                'id' => 'al_portfolio_posts',
                'type' => 'text',
                'title' => __('Number of Projects on One-Page', 'artless'),
                'subtitle' => __('-1 for all projects', 'artless'),
                "default" => -1,
                'validate' => 'numeric'
            ),

            array(
                'id' 		=> 'al_portfolio_filter',
                'type' 		=> 'switch',
                'title' 	=> __('Filter-By-Category-Bar', 'artless' ),
                'subtitle' 	=> __('Filter projects by category.', 'artless' ),
                "default" 	=> 0,
                'on' 		=> 'Enabled',
                'off' 		=> 'Disabled',
            ),

            array(
                'id' 		=> 'al_portfolio_load_more',
                'type' 		=> 'switch',
                'title' 	=> __('Load-More Button', 'artless' ),
                "default" 	=> 0,
                'on' 		=> 'Enabled',
                'off' 		=> 'Disabled',
            ),

            array(
                'id' 		=> 'al_portfolio_highlight_active_item',
                'type' 		=> 'switch',
                'title' 	=> __('Highlight Active Item', 'artless' ),
                "default" 	=> 0,
                'on' 		=> 'Enabled',
                'off' 		=> 'Disabled',
            ),

            array(
                'id' 		=> 'al_portfolio_min_height',
                'type'     => 'slider',
                'title'    => __( 'Item Min-Height', 'artless' ),
                'default'  => '350',
                'min'      => '0',
                'step'     => '10',
                'max'      => '500',
            ),

			array(
				'id' 		=> 'al_portfolio_term_client',
				'type' 		=> 'text',
				'title' 	=> __( 'Change Term "Client / [client-name]"', 'artless' ),
				'subtitle'  => __( 'Default: CLIENT / &lt;i>[client-name]&lt;/i>', 'artless' ),
				'desc'		=> __( 'Available Placeholder: <b>[client-name]</b>', 'artless' ),
				"placeholder" => 'CLIENT / <i>[client-name]</i>',
			),

            array(
                'id' 		=> 'al_portfolio_term_filter_all',
                'type' 		=> 'text',
                'title' 	=> __( 'Change Term "All"', 'artless' ),
                'subtitle'  => __( 'Term for "all categories" in the filter-bar', 'artless' ),
                "placeholder" => 'All',
            ),

            array(
                'id' 		=> 'al_portfolio_term_load_more',
                'type' 		=> 'text',
                'title' 	=> __( 'Change Term "Load More"', 'artless' ),
                'subtitle'  => __( 'Term for the Load-More-Button', 'artless' ),
                "placeholder" => 'Load More',
            ),

			array(
				'id' 		=> 'al_portfolio_term_view_project',
				'type' 		=> 'text',
				'title' 	=> __( 'Change Term "View Project"', 'artless' ),
				'subtitle'  => __( 'Term for the View-Project-Button', 'artless' ),
				"placeholder" => 'View Project',
			)
        )
    );

    return $options;
}


if( class_exists( 'Artless_Theme_Options' )) {

	if( method_exists( 'Artless_Theme_Options', 'addOption' )) {
		Artless_Theme_Options::addOption( al_portfolio_options(), 20 );
	}

}
