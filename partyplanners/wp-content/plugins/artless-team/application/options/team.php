<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

$options = array(
    'title' => __('Team', 'artless' ),
	'icon' => 'el-icon-group',
    'fields' => array(
        array(
            'id' 		=> 'al_team_filter',
            'type' 		=> 'switch',
            'title' 	=> __('Filter-By-Profession-Bar', 'artless' ),
            'subtitle' 	=> __('With this visitors can filter Members by Profession.', 'artless' ),
			"default" 	=> 0,
			'on' 		=> 'Enabled',
			'off' 		=> 'Disabled',
        ),

		array(
			'id' 		=> 'al_team_filter_show_all',
			'type' 		=> 'switch',
			'required'  => array( 'al_team_filter', '=', '1' ),
			'title' 	=> __( 'Option "All" in Filter', 'artless' ),
			"default" 	=> 0,
			'on' 		=> 'Enabled',
			'off' 		=> 'Disabled',
		),

		array(
			'id' 		=> 'al_team_members_per_row',
			'type' 		=> 'select',
			'title' 	=> __('Members per Row', 'artless' ),
			//Must provide key => value pairs for select options
			'options' => array( 1 => 1, 2 => 2, 3 => 3, 4 => 4, 6 => 6) ,
			'default' => 3
		),

		array(
			'id' 		=> 'al_team_members_description_min_height',
			'type' 		=> 'text',
			'title' 	=> __( 'Textfield Min-Height', 'artless' ),
			'desc'		=> __( 'i.e. 200px', 'artless' )
		),

        array(
            'id' 		=> 'al_team_socials_blank',
            'type' 		=> 'switch',
            'title' 	=> __('Open Social Links in a New Window', 'artless' ),
            "default" 	=> 0,
            'on' 		=> 'Enabled',
            'off' 		=> 'Disabled',
        ),
    )
);

if( class_exists( 'Artless_Theme_Options' )) {
	if( method_exists( 'Artless_Theme_Options', 'addOption' )) {
		Artless_Theme_Options::addOption( $options, 30 );
	}
}