<?php

if ( ! function_exists( 'twentyfifteen_setup' ) ) :
function twentyfifteen_child_setup() {

	// This theme uses additional wp_nav_menu() in two more locations.
	register_nav_menus( array(
		'primary' 	=> __( 'Primary Menu',      'twentyfifteen' ),
		'secondary'	=> __( 'Secondary Menu',    'twentyfifteen' ),
		'legal'  	=> __( 'Legal Menu', 		'twentyfifteen' ),
		'social'  	=> __( 'Social Links Menu', 'twentyfifteen' ),
	) );
}
endif; // twentyfifteen_child_setup
add_action( 'after_setup_theme', 'twentyfifteen_child_setup' );

/**
 * Global function to retrieve the relative child template directory
 */
function get_child_template_directory_uri() {
	return get_stylesheet_directory_uri();
}

/**
 * Remove initial parent theme load scripts function
 */
function remove_twentyfifteen_scripts() {
	remove_action('wp_enqueue_scripts', 'twentyfifteen_scripts');
}
add_action( 'init', 'remove_twentyfifteen_scripts' );

/**
 * main theme asset hook
 * register assets
 */
function twentyfifteen_child_scripts(){

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style('twentyfifteen-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('twentyfifteen-child-style', get_stylesheet_uri());

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

	wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
	));

	// Load javascript libraries (i.e. Bootstrap, etc.)
	wp_enqueue_script('javascript-libraries', get_child_template_directory_uri() . '/js/libs.js', array(), '1.0.0', TRUE);
	
	// Load custom javascript scripts
	wp_enqueue_script('custom-scripts', get_child_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', TRUE);
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_child_scripts' );

/**
 * enable livereload on localhost
 */
function livereload() {
	if( in_array( $_SERVER[ 'REMOTE_ADDR' ], array( '127.0.0.1', '::1' ))){
		wp_register_script( 'livereload', 'http://localhost:35729/livereload.js?snipver=1', NULL, FALSE, TRUE );
		wp_enqueue_script( 'livereload' );
	}
}
add_action( 'wp_enqueue_scripts', 'livereload' );


?>