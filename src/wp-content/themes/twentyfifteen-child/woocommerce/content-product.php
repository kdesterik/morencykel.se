<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Retrieve product_settings from simple_fields plugin
$product_settings = simple_fields_fieldgroup( 'product_settings' );

// Extra post classes
$classes = array( 
	'shop-item', 
	'col-md-6', 
	'col-sm-6', 
	'col-xs-12'
);

if( isset( $product_settings ) && isset( $product_settings[ 'display_size' ])){

	if( $product_settings[ 'display_size' ][ 'selected_value' ] == 'large' ){

		$classes[] = 'col-lg-9';
		$classes[] = 'large';

	} elseif( $product_settings[ 'display_size' ][ 'selected_value' ] == 'medium' ){

		$classes[] = 'col-lg-6';
		$classes[] = 'medium';

	} elseif( $product_settings[ 'display_size' ][ 'selected_value' ] == 'small' ){

		$classes[] = 'col-lg-3';
		$classes[] = 'small';
	}

} else {

	$classes[] = 'col-lg-3';
	$classes[] = 'small';
}



?>
<div <?php post_class( $classes ); ?>>

	<div class="background"></div>

	<?php // do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<a href="<?php the_permalink(); ?>" class="hotspot"></a>

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			// do_action( 'woocommerce_before_shop_loop_item_title' );
		?>

		<!-- <h3><?php the_title(); ?></h3> -->

		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			// do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

	<?php

		/**
		 * woocommerce_after_shop_loop_item hook
		 *
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		// do_action( 'woocommerce_after_shop_loop_item' ); 

	?>

</div>