<?php
/**
 * Simple product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

?>

<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<form method="post" enctype='multipart/form-data'>
				<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
				<div class="input-group">
				 	<?php
				 		if ( ! $product->is_sold_individually() ) {
				 			woocommerce_quantity_input( array(
				 				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
				 				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product ),
				 				'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 )
				 			) );
				 		}
				 	?>
				 	<span class="input-group-btn">
				 		<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />
				 		<button type="submit" class="btn btn-default"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
				 	</span>
				 </div>
				<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
			</form>			
		</div>
	</div>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
