<?php
/**
 * MorenCykel functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MorenCykel
 */

if ( ! function_exists( 'morencykel_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function morencykel_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on MorenCykel, use a find and replace
	 * to change 'morencykel' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'morencykel', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'morencykel' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'morencykel_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'morencykel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function morencykel_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'morencykel_content_width', 640 );
}
add_action( 'after_setup_theme', 'morencykel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function morencykel_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'morencykel' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'morencykel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function morencykel_scripts() {
	
	wp_enqueue_style( 'morencykel-style', get_stylesheet_uri() );

	wp_enqueue_script( 'morencykel-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	// Load javascript libraries (i.e. Bootstrap, etc.)
	wp_enqueue_script( 'javascript-libraries', get_template_directory_uri() . '/js/libs.js', array(), '1.0.0', TRUE );
	
	// Load custom javascript scripts
	wp_enqueue_script( 'custom-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', TRUE );
}
add_action( 'wp_enqueue_scripts', 'morencykel_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template functions for this theme.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Adjust length of excerpt
 */ 
function twentyfifteen_child_excerpt_length( $length ) {

	return 20;
}
add_filter( 'excerpt_length', 'twentyfifteen_child_excerpt_length', 999 );


/*
* Replace WooCommerce placeholder image with own
*
**/
function morencykel_woocommerce_placeholder_img_src(){

	return get_template_directory_uri() . '/images/placeholder.png';
}
add_filter( 'woocommerce_placeholder_img_src', 'morencykel_woocommerce_placeholder_img_src' );


/*
* Adjust WooCommerce default address fields
*
**/
function morencykel_woocommerce_default_address_fields( $fields ){

	$fields[ 'first_name' ][ 'placeholder' ] 	= $fields[ 'first_name' ][ 'label' ];
	$fields[ 'first_name' ][ 'class' ] 			= array( 'col-xs-6 col-sm-6 col-md-6 col-lg-6' );
	$fields[ 'last_name' ][ 'placeholder' ] 	= $fields[ 'last_name' ][ 'label' ];
	$fields[ 'last_name' ][ 'class' ] 			= array( 'col-xs-6 col-sm-6 col-md-6 col-lg-6' );
	$fields[ 'company' ][ 'placeholder' ] 		= $fields[ 'company' ][ 'label' ];
	$fields[ 'company' ][ 'class' ] 			= array( 'col-xs-12 col-sm-12 col-md-12 col-lg-12' );
	$fields[ 'country' ][ 'class' ] 			= array( 'col-xs-12 col-sm-12 col-md-12 col-lg-12', 'address-field', 'update_totals_on_change' );
	$fields[ 'address_1' ][ 'class' ] 			= array( 'col-xs-12 col-sm-12 col-md-12 col-lg-12', 'address-field' );
	$fields[ 'address_2' ][ 'class' ] 			= array( 'col-xs-12 col-sm-12 col-md-12 col-lg-12', 'address-field' );
	$fields[ 'city' ][ 'class' ] 				= array( 'col-xs-6 col-sm-6 col-md-6 col-lg-6', 'address-field' );
	$fields[ 'state' ][ 'class' ] 				= array( 'col-xs-6 col-sm-6 col-md-6 col-lg-6', 'address-field' );
	$fields[ 'postcode' ][ 'class' ] 			= array( 'col-xs-6 col-sm-6 col-md-6 col-lg-6', 'address-field' );

	return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'morencykel_woocommerce_default_address_fields' );



/*
* Remove default Woocommerce functionality
*
*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );


/*
* Add MorenCykel Woocommerce functionality
*
*/
// add_action( 'woocommerce_after_main_content', 'morencykel_woocommerce_breadcrumb', 20, 0 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 30 );


/*
* Adjust WooCommerce billing fields
*
**/
function morencykel_woocommerce_billing_fields( $fields ){

	$fields[ 'billing_email' ][ 'placeholder' ] = $fields[ 'billing_email' ][ 'label' ];
	$fields[ 'billing_email' ][ 'class' ] 		= array( 'col-xs-6 col-sm-6 col-md-6 col-lg-6' );
	$fields[ 'billing_phone' ][ 'placeholder' ] = $fields[ 'billing_phone' ][ 'label' ];
	$fields[ 'billing_phone' ][ 'class' ] 		= array( 'col-xs-6 col-sm-6 col-md-6 col-lg-6' );

	return $fields;
}
add_filter( 'woocommerce_billing_fields', 'morencykel_woocommerce_billing_fields' );


/**
 * Enable livereload on localhost
 */
function livereload() {

	if( in_array( $_SERVER[ 'REMOTE_ADDR' ], array( '127.0.0.1', '::1' ))){

		wp_register_script( 'livereload', 'http://localhost:35729/livereload.js?snipver=1', NULL, FALSE, TRUE );
		wp_enqueue_script( 'livereload' );
	}
}
add_action( 'wp_enqueue_scripts', 'livereload' );
