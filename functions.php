<?php
/*
* Nerdshades functions and definitions
*
*
*/


function ns_theme_support() {

    /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
    add_theme_support('title-tag');

    /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
    add_theme_support( 'post-thumbnails' );
    
    //register nav menus here========================
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'topbar' => esc_html__( 'Top Bar', 'ns' ),
		'primary' => esc_html__( 'Primary', 'ns' ),
		'mobile' => esc_html__( 'Mobile', 'ns' )
	) );

}
add_action('after_setup_theme', 'ns_theme_support');

function ns_init() {
    //adds the options page to wordpress backend
    acf_add_options_page('Site Settings');
}
add_action('init', 'ns_init');

function ns_custom_post_types() {

    //register sunglasses
    register_post_type('sunglasses',
        array(
            'labels' => array(
                'name'           => __('Sunglasses'),
                'singular_name'  => __('Sunglasses'),
                'menu_name'      => __('Sunglasses'),
                'all_items'      => __('All Sunglasses'),
                'view_item'      => __('View Sunglasses'),
                'add_new_item'   => __('Add Sunglasses'),
                'edit_item'      => __('Edit Sunglasses'),
                'update_item'    => __('Update Sunglasses'),  
            ),
            'public'             => true,
            'has_archive'        => true,
            'supports'           => array( 'title', 'editor', 'thumbnail' ),
            'show_in_nav_menus'  => true,
            'show_in_admin_bar'  => true,
            'menu_position'      => 5,
        )
    );

    //ACF to handle any additional categories or field work
    register_taxonomy( 'sunglasses_categories', 'sunglasses',
        array(
            'label' => __( 'Category' ),
            'hierarchical' => true
        )
    );
}
add_action('init', 'ns_custom_post_types', 0);

//Enqueue Styles and scripts
function ns_scripts() {

    //Styles===========
    wp_enqueue_style('ns_style', get_stylesheet_uri());

    //Scripts==============

}
add_action('wp_enqueue_scripts', 'ns_scripts');

class topbar_Menu_Walker extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"vertical menu\">\n";
	}
}