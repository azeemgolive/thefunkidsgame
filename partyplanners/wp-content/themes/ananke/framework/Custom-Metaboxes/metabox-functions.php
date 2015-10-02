<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';
	
    $meta_boxes[] = array(
        'id'         => 'page_setting',
        'title'      => 'Page Setting',
        'pages'      => array('page'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(
            array(
                'name' => 'Page Sub Title',
                'desc' => 'Set Page Sub Title',
                'id'   => $prefix . 'page_sub_title',
                'type'    => 'text',
            ),           
        )
    );
	// Add other metaboxes as needed
	
	$meta_boxes[] = array(
        'id'         => 'testimonial_setting',
        'title'      => 'Testimonial Setting',
        'pages'      => array('testimonial'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(
            array(
                'name' => 'Company Name',
                'desc' => 'Set company Name',
                'id'   => $prefix . 'company_name',
                'type'    => 'text',
            ),           
        )
    );
	// Add other metaboxes as needed
	
	$meta_boxes[] = array(
        'id'         => 'post_setting',
        'title'      => 'Post Setting',
        'pages'      => array('post'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(              
            array(
				'name' => __( 'Link Audio', 'cmb' ),
				'desc' => __( 'Add link Audio Soundcloud. Ex: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759', 'cmb' ),
				'id'   => $prefix . 'link_audio',
				'type' => 'text'
			),
			array(
				'name' => __( 'Link Video', 'cmb' ),
				'desc' => __( 'Add link Video Youtube, Vimeo. Ex: http://www.youtube.com/embed/eP2VWNtU5rw or http://player.vimeo.com/video/20249835', 'cmb' ),
				'id'   => $prefix . 'link_video',
				'type' => 'text'
			),            
        )
    );
	// Add other metaboxes as needed
	
	$meta_boxes[] = array(
        'id'         => 'portfolio_setting',
        'title'      => 'Portfolio Setting',
        'pages'      => array('portfolio'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(       
			array(
                'name' => 'Link Out Project',
                'desc' => 'Link Example: http://themeforest.net/user/oceanthemes',
                'id'   => $prefix . 'link_project',
                'type'    => 'text',
            ), 	
			array(
                'name' => 'Link video',
                'desc' => 'Link youtube Example: http://www.youtube.com/embed/hsEUBLIJvmE , Link Vimeo Ex : http://player.vimeo.com/video/23237102?portrait=0&color=cbab82 ',
                'id'   => $prefix . 'portfolio_video',
                'type'    => 'text',
            ), 
			array(
				'name' => __( 'Link Audio', 'cmb' ),
				'desc' => __( 'Add link Audio Soundcloud. Ex: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759', 'cmb' ),
				'id'   => $prefix . 'portfolio_audio',
				'type' => 'text'
			),
            array(
                'name' => 'Upload Image 1',
                'desc' => 'Upload an image 1 for Project',
                'id' => $prefix . 'image_1',
                'type' => 'file',
                'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
            ), 
            array(
                'name' => 'Upload Image 2',
                'desc' => 'Upload an image 2 for Project',
                'id' => $prefix . 'image_2',
                'type' => 'file',
                'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
            ),
            array(
                'name' => 'Column 1 Content',
                'desc' => 'Enter this field when use 3 columns content.',
                'id'   => $prefix . 'folio_col1',
                'type' => 'textarea',
            ),
            array(
                'name' => 'Column 2 Content',
                'desc' => 'Enter this field when use 3 columns content.',
                'id'   => $prefix . 'folio_col2',
                'type' => 'textarea',
            ),
            array(
                'name' => 'Column 3 Content',
                'desc' => 'Enter this field when use 3 columns content.',
                'id'   => $prefix . 'folio_col3',
                'type' => 'textarea',
            ),
        )
    );


    $meta_boxes[] = array(
        'id'         => 'slide_setting',
        'title'      => 'Slide Show Setting',
        'pages'      => array('slide'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(
            array(
                'name' => 'Tilt View',
                'desc' => 'Column or Row',
                'id'   => $prefix . 'tilt_view',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => 'Column', 'value' => 'col', ),
                    array( 'name' => 'Row', 'value' => 'row', ),
                    ),
            ),               
            array(
                'name' => 'Upload Image 1',
                'desc' => 'Upload an image 1 for Project',
                'id' => $prefix . 'image_1',
                'type' => 'file',
                'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
            ), 
            array(
                'name' => 'Link Image 1',
                'desc' => 'Link Example: http://themeforest.net/user/oceanthemes',
                'id'   => $prefix . 'link_1',
                'type'    => 'text',
            ),
            array(
                'name' => 'Upload Image 2',
                'desc' => 'Upload an image 2 for Project',
                'id' => $prefix . 'image_2',
                'type' => 'file',
                'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
            ),
            array(
                'name' => 'Link Image 2',
                'desc' => 'Link Example: http://themeforest.net/user/oceanthemes',
                'id'   => $prefix . 'link_2',
                'type'    => 'text',
            ),
        )
    );
	// Add other metaboxes as needed
	
	$meta_boxes[] = array(
		'id'         => 'seo_fields',
		'title'      => 'WordPress SEO by OceanThemes',
		'pages'      => array( 'page', 'post','portfolio'), // Post type
		'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
		'fields' => array(
			array(
                'name' => 'Focus Keyword:',
                'desc' => 'SEO keywords (optional)',
                'id'   => $prefix . 'seo_keywords',
                'type' => 'text',
            ),
			array(
				'name' => 'SEO Title:',
				'desc' => 'Title display in search engines is limited to 70 chars.',
				'id'   => $prefix . 'seo_title',
				'type' => 'text',
			),
            array(
                'name' => 'Meta Description:',
                'desc' => 'The meta description will be limited to 156 chars.',
                'id'   => $prefix . 'seo_description',
                'type' => 'textarea',
            ),
		)
	);
	// Add other metaboxes as needed
	
	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
