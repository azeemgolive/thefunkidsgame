<?php
add_action( 'init', 'register_ananke_Portfolio' );
function register_ananke_Portfolio() {
    
    $labels = array( 
        'name' => __( 'Portfolio', 'ananke' ),
        'singular_name' => __( 'Portfolio', 'ananke' ),
        'add_new' => __( 'Add New Portfolio', 'ananke' ),
        'add_new_item' => __( 'Add New Portfolio', 'ananke' ),
        'edit_item' => __( 'Edit Portfolio', 'ananke' ),
        'new_item' => __( 'New Portfolio', 'ananke' ),
        'view_item' => __( 'View Portfolio', 'ananke' ),
        'search_items' => __( 'Search Portfolios', 'ananke' ),
        'not_found' => __( 'No Portfolios found', 'ananke' ),
        'not_found_in_trash' => __( 'No Portfolios found in Trash', 'ananke' ),
        'parent_item_colon' => __( 'Parent Portfolio:', 'ananke' ),
        'menu_name' => __( 'Portfolio', 'ananke' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Portfolio',
        'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'post-formats' ),
        'taxonomies' => array( 'Portfolio_category','categories','tags' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'menu_icon' => get_stylesheet_directory_uri(). '/images/admin_ico_portfolio.png', 
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'Portfolio', $args );
}
add_action( 'init', 'create_Categories_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Categories_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'Categories', 'ananke' ),
    'singular_name' => __( 'Categories', 'ananke' ),
    'search_items' =>  __( 'Search Categories','ananke' ),
    'all_items' => __( 'All Categories','ananke' ),
    'parent_item' => __( 'Parent Categories','ananke' ),
    'parent_item_colon' => __( 'Parent Categories:','ananke' ),
    'edit_item' => __( 'Edit Categories','ananke' ), 
    'update_item' => __( 'Update Categories','ananke' ),
    'add_new_item' => __( 'Add New Categories','ananke' ),
    'new_item_name' => __( 'New Categories Name','ananke' ),
    'menu_name' => __( 'Categories','ananke' ),
  );     

// Now register the taxonomy

  register_taxonomy('categories',array('Portfolio'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'categories' ),
  ));

}
add_action( 'init', 'create_Tags_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Tags_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'Tags', 'ananke' ),
    'singular_name' => __( 'Tags', 'ananke' ),
    'search_items' =>  __( 'Search Tags','ananke' ),
    'all_items' => __( 'All Tags','ananke' ),
    'parent_item' => __( 'Parent Tags','ananke' ),
    'parent_item_colon' => __( 'Parent Tags:','ananke' ),
    'edit_item' => __( 'Edit Tags','ananke' ), 
    'update_item' => __( 'Update Tags','ananke' ),
    'add_new_item' => __( 'Add New Tags','ananke' ),
    'new_item_name' => __( 'New Tags Name','ananke' ),
    'menu_name' => __( 'Tags','ananke' ),
  );     

// Now register the taxonomy

  register_taxonomy('tags',array('Portfolio'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tags' ),
  ));
}


add_action( 'init', 'register_ananke_slideshow' );
function register_ananke_slideshow() {
    
    $labels = array( 
        'name' => __( 'Slide Show', 'ananke' ),
        'singular_name' => __( 'Slide Show', 'ananke' ),
        'add_new' => __( 'Add New Slide', 'ananke' ),
        'add_new_item' => __( 'Add New Slide', 'ananke' ),
        'edit_item' => __( 'Edit Slide', 'ananke' ),
        'new_item' => __( 'New Slide', 'ananke' ),
        'view_item' => __( 'View Slide', 'ananke' ),
        'search_items' => __( 'Search Slide', 'ananke' ),
        'not_found' => __( 'No Slide found', 'ananke' ),
        'not_found_in_trash' => __( 'No Slide found in Trash', 'ananke' ),
        'parent_item_colon' => __( 'Parent Slide:', 'ananke' ),
        'menu_name' => __( 'Slide Show', 'ananke' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Slide',
        'supports' => array( 'title', 'editor', 'thumbnail', ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,  
    );

    register_post_type( 'slide', $args );
}