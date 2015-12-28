<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();

if ( $attachment_ids ) {
	?>
	<?php

		foreach ( $attachment_ids as $attachment_id ) {

			$image_link = wp_get_attachment_url( $attachment_id );

			if ( !$image_link )
				continue;

			$image_title 	= esc_attr( get_the_title( $attachment_id ) );

			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ), 0, $attr = array(
				'title'	=> $image_title,
				'alt'	=> $image_title
			));

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div class="product-zoom" data-target="%1$s">%2$s</div>', $image_link, $image ), $post->ID );

			$loop++;
		}

	?>
	<!-- </div> -->
	<?php
}
