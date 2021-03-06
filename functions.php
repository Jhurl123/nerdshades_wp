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
    add_image_size('hero_full', 2000, 1000);
    add_image_size('card_image', 250, 200);
    
    //register nav menus here========================
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'topbar' => esc_html__( 'Top Bar', 'ns' ),
		'primary' => esc_html__( 'Primary', 'ns' ),
        'mobile' => esc_html__( 'Mobile', 'ns' ),
        'footer_1' => esc_html__('Footer Left', 'ns'),
        'footer_2' => esc_html__('Footer Middle', 'ns'),
        'footer_3' => esc_html__('Footer Right', 'ns')
	) );

}
add_action('after_setup_theme', 'ns_theme_support');

function ns_menu_classes($classes, $item, $args) {

    if($args->theme_location == 'footer_1') {
      $classes[] = 'footer-1-list';
    }
    return $classes;
  }
  add_filter('nav_menu_css_class', 'ns_menu_classes', 1, 3);

function ns_init() {
    //adds the options page to wordpress backend
    acf_add_options_page('Site Settings');

    register_sidebar( array(
        'name' => 'Footer Menu 1',
        'id'   => 'footer_menu_1',
        'theme_location' => 'footer_1',
        'before_widget' => '<ul class="footer_menu-1">',
        'after_widget'  => '</ul>',
        'before_title'  => '<h3 class="footer_menu_title">',
        'after_title'   => '</h3>'
    ));
    register_sidebar( array(
        'name' => 'Footer Menu 2',
        'id'   => 'footer_menu_2',
        'before_widget' => '<ul class="footer_menu-2">',
        'after_widget'  => '</ul>',
        'before_title'  => '<h3 class="footer_menu_title">',
        'after_title'   => '</h3>'
    ));
    register_sidebar( array(
        'name' => 'Footer Menu 3',
        'id'   => 'footer_menu_3',
        'before_widget' => '<ul class="footer_menu-3">',
        'after_widget'  => '</ul>',
        'before_title'  => '<h3 class="footer_menu_title">',
        'after_title'   => '</h3>'
    ));
}
add_action('widgets_init', 'ns_init');

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
    $labels = array(
        'name'              => _x( 'Person Type','textdomain' ),
		'singular_name'     => _x( 'Person Type', 'textdomain' ),
		'search_items'      => __( 'Search Person Types', 'textdomain' ),
		'all_items'         => __( 'All Person Types', 'textdomain' ),
		'edit_item'         => __( 'Edit Person Type', 'textdomain' ),
		'update_item'       => __( 'Update Person Type', 'textdomain' ),
		'add_new_item'      => __( 'Add New Person Type', 'textdomain' ),
		'new_item_name'     => __( 'New Person Type', 'textdomain' ),
		'menu_name'         => __( 'Person Types', 'textdomain' ),
    );

    register_taxonomy(
        'person_type',
        'sunglasses',
        array(
            'labels'      => $labels,
            'rewrite'     => array('slug' =>'gender'),
            'hierarchical' => true,
            'query_var'   => true
        )
    );

    $labels = array(
        'name'              => _x( 'Sunglasses Type','textdomain' ),
		'singular_name'     => _x( 'Sunglasses Type', 'textdomain' ),
		'search_items'      => __( 'Search Sunglasses Types', 'textdomain' ),
		'all_items'         => __( 'All Sunglasses Types', 'textdomain' ),
		'edit_item'         => __( 'Edit Sunglasses Type', 'textdomain' ),
		'update_item'       => __( 'Update Sunglasses Type', 'textdomain' ),
		'add_new_item'      => __( 'Add New Sunglasses Type', 'textdomain' ),
		'new_item_name'     => __( 'New Sunglasses Type', 'textdomain' ),
		'menu_name'         => __( 'Sunglasses Types', 'textdomain' ),
    );

    register_taxonomy(
        'sunglasses_type',
        'sunglasses',
        array(
            'labels'      => $labels,
            'rewrite'     => array('slug' =>'sunglasses-type'),
            'hierarchical' => true,
            'query_var'   => true
        )
    );
}
add_action('init', 'ns_custom_post_types', 0);

//Enqueue Styles and scripts
function ns_scripts() {

    //Styles===========
    wp_enqueue_style('ns_style', get_stylesheet_uri());
    wp_register_style('slick', get_stylesheet_directory_uri() . '/css/slick.css');
    wp_register_style('slick-theme', get_template_directory_uri() . '/css/slick-theme.css');
    wp_enqueue_style('ns_style_icons', get_template_directory_uri() . '/node_modules/@fortawesome/fontawesome-free/css/all.css');

    //Scripts==============
    wp_enqueue_script('ns-app', get_template_directory_uri() . '/js/app.js', array('jquery'), '', true );
    wp_register_script('slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '', true );
    wp_register_script('isotope', get_template_directory_uri(). 'js/isotope.pkgd.min.js', array('jquery'), '', true);
    //wp_enqueue_script( 'ns-foundation-js', get_template_directory_uri() . '/node_modules/foundation-sites/dist/foundation.min.js', array('jquery'), '', true );

}
add_action('wp_enqueue_scripts', 'ns_scripts');

class topbar_Menu_Walker extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"vertical clearfix navigation_drop-nav\">\n";
	}
}

class footer_Menu_Walker extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"vertical clearfix navigation_drop-nav\">\n";
	}
}


function breadCrumbs() {
    //filter function called in all products pages
    //Use conditional to optionally return; when not a products page, or necessary page for breadcrumbs

    if(is_home()) {
        return;
    }


    //When page is correct, execute logic to gather breadcrumbs 

    //returns string
    $post_type = get_post_type();
    $crumbs = get_term_by("name", get_query_var("term"), get_query_var("taxonomy") );

    if(!$crumbs) {
        $crumbs = ucfirst($post_type);
    }
    

    //Call ob_start to get breadcrumbs.php  and catch result and return it to function

    ob_start();
        include get_template_directory() . '/template-parts/header/breadcrumbs.php';
    $term = ob_get_clean();

    echo $term;


}
add_action('breadcrumb_filter', 'breadcrumbs');



