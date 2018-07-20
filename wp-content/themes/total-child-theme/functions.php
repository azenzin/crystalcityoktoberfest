<?php
/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: total-child
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

if ( ! defined( 'TOTAL_CHILD_THEME_DIR_URL' ) ) {
	define( 'TOTAL_CHILD_THEME_DIR_URL', get_stylesheet_directory_uri() );
}
if ( ! defined( 'TOTAL_CHILD_THEME_DIR_PATH' ) ) {
	define( 'TOTAL_CHILD_THEME_DIR_PATH', get_stylesheet_directory() );
}

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function total_child_enqueue_parent_theme_style() {

	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme( 'Total' );
	$version = $theme->get( 'Version' );

	// Load the stylesheet
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), $version );
	wp_enqueue_style( 'child-style', TOTAL_CHILD_THEME_DIR_URL . '/style.css', array(), $version );
	wp_enqueue_style( 'bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' );
	wp_enqueue_script( 'total-child-script', TOTAL_CHILD_THEME_DIR_URL . '/assets/child.js');
	wp_enqueue_script( 'bootstrap-js', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js', array('jquery'), true);

}
add_action( 'wp_enqueue_scripts', 'total_child_enqueue_parent_theme_style' );

function total_child_setup_images() {
	add_theme_support( 'post-thumbnails' );
	add_image_size('home-slider', 1152, 768, true);
}

add_action( 'after_setup_theme', 'total_child_setup_images' );

/* Add custom fonts to font settings */
function wpex_add_custom_fonts() {
	return array( 'TradeGothicDisplay1-Layer1', 'Gothic-A1', 'Rubik' ); // You can add more then 1 font to the array!
}

/**
 * Register sidebars and widgetized areas in header & footer.
 *
 */
function total_child_register_sidebars() {

	register_sidebar( array(
		'name'          => __( 'Top header widget area', 'total-child' ),
		'id'            => 'top_header_area',
		'description'   => __( 'Appears at the top of the Header.', 'total-child' ),
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Header Festival Info', 'total-child' ),
		'id'            => 'header_fest_info_area',
		'description'   => __( 'Add Festival Info widget here to appear in Header.', 'total-child' ),
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

}

add_action( 'widgets_init', 'total_child_register_sidebars' );

require_once TOTAL_CHILD_THEME_DIR_PATH . '/includes/widgets/class-widget-fest-info.php';