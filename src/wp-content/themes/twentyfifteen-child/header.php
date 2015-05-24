<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="menuLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="container">
					<div class="row">
						<div class="col-lg-9">
								<?php echo get_network_sites_dropdown(); ?>
								<?php $description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo $description; ?></p>
								<?php endif; ?>
						</div>
						<div class="col-lg-3">
							<div class="close">
								<p class="text-right down"><a href="#" data-dismiss="modal">Close</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<?php echo render_menu(); ?>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>

<div id="page" class="hfeed site">

	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
						<?php echo get_network_sites_dropdown(); ?>
						<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; ?></p>
						<?php endif; ?>
				</div>
				<div class="col-lg-3">
					<?php if ( has_nav_menu( 'top' ) ) : ?>
					<nav id="top-navigation" class="top-navigation" role="navigation">
						<?php
							wp_nav_menu( array(
								'menu_class'     => 'breadcrumb text-right down',
								'theme_location' => 'top',
								'depth'          => 1,
							) );
						?>
					</nav>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>

	<div id="content" class="site-content">
