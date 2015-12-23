<?php
/**
 * Edit account form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<form action="" method="post">

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<input type="text" class="input-text form-control" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" placeholder="<?php _e( 'First name', 'woocommerce' ); ?>" />	
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<input type="text" class="input-text form-control" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" placeholder="<?php _e( 'Last name', 'woocommerce' ); ?>" />	
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<input type="email" class="input-text form-control" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" placeholder="<?php _e( 'Email address', 'woocommerce' ); ?>" />	
		</div>
	</div>

	<p class="down"><?php _e( 'Password Change', 'woocommerce' ); ?></p>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<input type="password" class="input-text form-control" name="password_current" id="password_current" placeholder="<?php _e( 'Current Password (leave blank to leave unchanged)', 'woocommerce' ); ?>" />	
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<input type="password" class="input-text form-control" name="password_1" id="password_1" placeholder="<?php _e( 'New Password (leave blank to leave unchanged)', 'woocommerce' ); ?>" />	
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<input type="password" class="input-text form-control" name="password_2" id="password_2" placeholder="<?php _e( 'Confirm New Password', 'woocommerce' ); ?>" />	
		</div>
	</div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php wp_nonce_field( 'save_account_details' ); ?>
			<input type="submit" class="btn btn-default btn-block" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>" />
			<input type="hidden" name="action" value="save_account_details" />
		</div>
	</div>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>

</form>
