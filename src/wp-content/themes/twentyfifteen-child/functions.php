<?php

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
 * Add additional top menu
 */
function register_top_menu() {
  register_nav_menu( 'top', __( 'Top Menu' ));
}
add_action( 'init', 'register_top_menu' );

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

/**
 * Get network sites in dropdown
 */
function get_network_sites_dropdown(){

	$sites 	= wp_get_sites();
	$html 	= '';
	$html  .= '<div class="dropdown">';
	$html  .= '<a href="#" data-toggle="dropdown" aria-expanded="true"><h1 class="site-title">MorenCykel</h1></a>';
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

	return $html;
}

/**
 * Add data-toggle: modal - attribute to menu-item
 */

add_filter( 'nav_menu_link_attributes', 'menu_menu_atts', 10, 3 );
function menu_menu_atts( $atts, $item, $args ){

	// inspect $item
	if( $item->post_name == 'menu' ){

		$atts[ 'data-toggle' ] = 'modal';
		$atts[ 'data-target' ] = '#menu';
	}
	return $atts;
}


/**
 * Render menu - to be used on Menu Modal
 */
function render_menu() {
	$arguments = array(
		'theme_location' => 'primary',
		'items_wrap'     => '<div class="container">%3$s</div>',
		'walker'		 => new Menu_Walker()
	);
	return wp_nav_menu( $arguments );
}


/**
 * Custom Walker_Nav_Menu to walk through Menu navigation
 */
class Menu_Walker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = array() ){

		$output .= '';
	}

	public function end_lvl( &$output, $depth = 0, $args = array() ){

		$output .= '';
	}

	public function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ){

		if( $depth == 0 ){

			$output .= '<div class="row">';
			$output .= '<div class="col-lg-12"><hr/></div>';
			$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">';
		}

		if( $depth == 1 ){

			if( $this->get_previous_depth() == 3 ){

				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><br/></div>';
				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">';

			} else if( $this->get_previous_depth() == 1 ){

				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><br/></div>';
				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><br/></div>';
				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><br/></div>';
				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">';

			} else {

				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">';
			}
		}

		if( $depth == 2 ){

			if( $this->get_previous_depth() == 3 ){

				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><br/></div>';
				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><br/></div>';
				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">';

			} else {

				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">';
			}
		}

		if( $depth == 3 ){

			if( $this->get_previous_depth() == 3 ){

				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><br/></div>';
				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><br/></div>';
				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><br/></div>';
				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">';

			} else {

				$output .= '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">';
			}
		}

		$output .= sprintf( '<a href="%s" class="%s">%s</a>', esc_attr( $object->url ), implode( ' ', $object->classes ), esc_attr( $object->title ));
		$output .= '</div>';

		$this->set_previous_depth( $depth );
	}

	public function end_el( &$output, $object, $depth = 0, $args = array() ){

		if( $depth == 0 ){

			$output .= '</div>';
		}
	}


	private $previous = 0;
	public function get_previous_depth(){ return $this->previous; }
	public function set_previous_depth( $value ){ $this->previous = $value; }
}



/**
 * Render carousel - to be used on Home Page
 */
function render_carousel(){

	$slides		 = simple_fields_fieldgroup( 'home_page_carousel' );
	$count		 = 0;
	$html 	 	 = '<div class="carousel" data-ride="carousel" data-pause="hover">';
	$html 		.= '<div class="carousel-inner" role="listbox">';

	foreach( $slides as $slide ){

		$html 	.= ( $count == 0 ) ? '<div class="item active">' : '<div class="item">';

		$html 	.= sprintf( '<div class="cover" style="background-image: url( %s );"></div>', $slide[ 'url' ] );

		$html 	.= '<div class="caption">';
		$html 	.= '<div class="container">';

		$html 	.= '<div class="row">';
		$html 	.= '<div class="col-lg-4">';

		$html 	.= '<h1>Hello world</h1>';
		$html 	.= '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pretium nibh in lorem sodales, ornare dignissim neque scelerisque.</p>';
		$html 	.= '<p><a href="#">Link to page</a></p>';

		$html 	.= '</div>';
		$html 	.= '</div>';

		$html 	.= '</div>';
		$html 	.= '</div>';

		$html 	.= '</div>';

		$count 	+= 1;
	}
	
	$html 	.= '</div>';
	$html 	.= '</div>';

	return $html;
}




?>