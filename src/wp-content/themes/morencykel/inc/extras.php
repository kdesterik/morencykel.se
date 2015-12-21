<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package MorenCykel
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function morencykel_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'morencykel_body_classes' );


/**
 * Renders the featered image of a post as an inline background-image style
 *
 * @return string
 */
function the_background_image(){

	if( has_post_thumbnail() ){

		printf( 'style="background-image: url( %s );"', wp_get_attachment_url( get_post_thumbnail_id( $post->ID )));
	}
}
