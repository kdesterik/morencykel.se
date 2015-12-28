<?php
/**
 * Displayed when no products are found matching the current query.
 *
 * Override this template by copying it to yourtheme/woocommerce/loop/no-products-found.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="alert alert-info" role="alert"><?php _e( 'No products were found matching your selection.', 'woocommerce' ); ?></div>	
</div>