<?php

/**
 * Global function to retrieve the relative child template directory
 */
function get_child_template_directory_uri() {
	return get_stylesheet_directory_uri();
}

function twentyfifteen_child_setup() {

	/**
	 * Adjust post_thumbnail size
	 */
	set_post_thumbnail_size( 849, 480, array( 'center', 'center' ));

	/**
	 * Remove and add additional menus
	 */
	unregister_nav_menu( 'social' );
	register_nav_menu( 'secondary', __( 'Secondary Menu' ));
	register_nav_menu( 'social', __( 'Social Links Menu', 'twentyfifteen' ));

	/**
	 * Remove custom header feature
	 */
	remove_theme_support( 'custom-header' );

	/**
	 * Add adjusted custom header feature
	 */
	add_theme_support( 'custom-header', apply_filters( 'twentyfifteen_custom_header_args', array(
		'default-text-color'     => '#0D0D0D',
		'width'                  => 256,
		'height'                 => 88,
	)));
	
	/**
	 * Remove custom background feature
	 */
	remove_theme_support( 'custom-background' );

	/**
	 * Remove twentyfifteen sidebar text color css
	 */
	remove_action( 'wp_enqueue_scripts', 'twentyfifteen_sidebar_text_color_css', 11 );

}
add_action( 'init', 'twentyfifteen_child_setup' );


/**
 * Remove colors section
 */

function remove_colors_sections(){

    global $wp_customize;

    $wp_customize->remove_section( 'colors' );
}
add_action( 'customize_register', 'remove_colors_sections', 20 );


/**
 * Remove widget area.
 */
function remove_twentyfifteen_widgets(){

	unregister_sidebar( 'sidebar-1' );
}
add_action( 'widgets_init', 'remove_twentyfifteen_widgets', 11 );


/**
 * Remove initial parent theme load scripts function
 */
function remove_twentyfifteen_scripts() {

	remove_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );
}
add_action( 'init', 'remove_twentyfifteen_scripts' );


/**
 * Remove initial parent twenty_post_nav_background script
 */
function remove_twentyfifteen_post_nav_background() {

	remove_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );
}
add_action( 'init', 'remove_twentyfifteen_post_nav_background' );


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

	wp_enqueue_script( 'twentyfifteen-script', get_child_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
		'expand'	 => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
	));

	// Load javascript libraries (i.e. Bootstrap, etc.)
	wp_enqueue_script('javascript-libraries', get_child_template_directory_uri() . '/js/libs.js', array(), '1.0.0', TRUE);
	
	// Load custom javascript scripts
	wp_enqueue_script('custom-scripts', get_child_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', TRUE);
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_child_scripts' );


/**
 * Adjust woocommerce template hooks
 */
function woocommerce_template_hooks(){

	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
}
add_action( 'init', 'woocommerce_template_hooks' );


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


/**
 * Get network sites in dropdown
 */
function render_network_sites_dropdown( $logo ){

	$sites 	= wp_get_sites();
	$html 	= '';
	$html  .= '<div class="dropdown">';
	$html  .= sprintf( '<a href="#" data-toggle="dropdown" aria-expanded="true"><img src="%s" class="site-title"/></a>', $logo );
	$html  .= '<ul class="dropdown-menu" role="menu">';

	foreach( $sites as $site ){

		$id 		= $site[ 'blog_id' ];
		$path 		= $site[ 'path' ];
		$current 	= get_current_blog_id();

		switch_to_blog( $id );
		$title 		= get_bloginfo( 'name' );
		$url 		= network_site_url( $path );

		restore_current_blog();

		if( $id == $current ){

			$html .= sprintf( '<li role="presentation" class="active"><a role="menuitem" tabindex="-1" href="%s">%s</a></li>', $url, $title );

		} else {

			$html .= sprintf( '<li role="presentation"><a role="menuitem" tabindex="-1" href="%s">%s</a></li>', $url, $title );
		}
	}

	$html .= '</ul>';
	$html .= '</div>';

	echo $html;
}


function add_search_menu_attributes( $atts, $item, $args ){

	$menu_target = 177;

	if( $item->ID == 177 ) {

		$atts[ 'data-toggle' ] = 'modal';
		$atts[ 'data-target' ] = '#search';
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_search_menu_attributes', 10, 3 );

/**
 * Render carousel - to be used on Home Page
 */
// function render_carousel(){

// 	$slides = simple_fields_fieldgroup( 'home_page_cover' );
// 	$count  = 0;
// 	$html   = '<div class="carousel" data-ride="carousel" data-pause="hover">';
// 	$html  .= '<div class="carousel-inner" role="listbox">';

// 	foreach( $slides as $slide ){

// 		$html 	.= ( $count == 0 ) ? '<div class="item active">' : '<div class="item">';

// 		$html 	.= sprintf( '<div class="cover" style="background-image: url( %s );"></div>', $slide[ 'cover_image' ][ 'url' ] );

// 		$html 	.= '<div class="hentry">';
// 		$html 	.= '<div class="container">';

// 		$html 	.= '<div class="row">';
// 		$html 	.= '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';

// 		$html 	.= '<header class="entry-header">';
// 		$html 	.= sprintf( '<h1 class="entry-title">%s</h1>', $slide[ 'cover_title' ]);
// 		$html 	.= '</header>';

// 		$html 	.= '<div class="entry-content">';
// 		$html 	.= sprintf( '<p>%s</p>', nl2br( $slide[ 'cover_description' ]));
// 		$html 	.= sprintf( '<a href="%s" class="more-link">%s</a>', $slide[ 'cover_link' ][ 'permalink' ], __( 'Continue reading ', 'twentyfifteen' ));
// 		$html 	.= '</div>';

// 		$html 	.= '</div>';
// 		$html 	.= '</div>';

// 		$html 	.= '</div>';
// 		$html 	.= '</div>';

// 		$html 	.= '</div>';

// 		$count 	+= 1;
// 	}
	
// 	$html .= '</div>';
// 	$html .= '</div>';

// 	echo $html;
// }


/**
 * Render post_navigation - to be used on Content Pafe
 */
function render_post_navigation( $args = array() ){

	$args = wp_parse_args( $args, array(
        'prev_text'          => '%title',
        'next_text'          => '%title',
        'screen_reader_text' => __( 'Post navigation' ),
    ) );
 
    $navigation = '';
    $previous   = get_previous_post_link( '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><div class="nav-previous">%link</div></div>', $args['prev_text'] );
    $next       = get_next_post_link( '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><div class="nav-next">%link</div></div>', $args['next_text'] );
 
    // Only add markup if there's somewhere to navigate to.
    // if ( $previous || $next ) {
        $navigation = _navigation_markup( $previous . $next, 'post-navigation', $args['screen_reader_text'] );
    // }
 
    echo $navigation;
}


?>