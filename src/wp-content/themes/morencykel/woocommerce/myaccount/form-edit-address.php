<?php
/**
 * Edit address form
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $current_user;

$page_title = ( $load_address === 'billing' ) ? __( 'Billing Address', 'woocommerce' ) : __( 'Shipping Address', 'woocommerce' );

get_currentuserinfo();

?>

<?php wc_print_notices(); ?>

<?php if ( ! $load_address ) : ?>

	<?php wc_get_template( 'myaccount/my-address.php' ); ?>

<?php else : ?>

	<form method="post">

		<p><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title ); ?></p>

		<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

		<div class="row">
		<?php foreach ( $address as $key => $field ) : ?>
			<?php morencykel_woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); ?>
		<?php endforeach; ?>
		</div>

		<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<input type="submit" class="btn btn-default btn-block" name="save_address" value="<?php esc_attr_e( 'Save Address', 'woocommerce' ); ?>" />
				<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
				<input type="hidden" name="action" value="edit_address" />				
			</div>
		</div>
	</form>

<?php endif; ?>
