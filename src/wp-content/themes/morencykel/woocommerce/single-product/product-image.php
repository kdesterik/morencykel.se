<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;

?>


<!-- <div class="product-zoom" data-target="<?php // echo $this->helper('catalog/image')->init($_product, 'image'); ?>"> -->
<!-- <img src="<?php // echo $this->helper('catalog/image')->init($_product, 'small_image'); ?>" alt="<?php // echo $this->stripTags($_product->getName(), null, true); ?>" class="normal" /> -->
<!-- </div> -->

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<?php
		if( has_post_thumbnail() ){

			$image_link  	= wp_get_attachment_url( get_post_thumbnail_id() );
			$image_title 	= esc_attr( get_the_title( get_post_thumbnail_id() ));
			$image       	= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title'	=> $image_title,
				'alt'	=> $image_title
			));

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div class="product-zoom" data-target="%1$s">%2$s</div>', $image_link, $image ), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );

		}
	?>
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>
</div>