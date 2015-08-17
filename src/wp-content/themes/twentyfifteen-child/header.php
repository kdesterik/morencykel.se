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

<div class="modal fade" id="search" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="page" class="hfeed site">
	<header id="header" class="site-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<?php render_network_sites_dropdown( get_header_image() ); ?>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="row">
						<nav class="navigation" role="navigation">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<?php if ( has_nav_menu( 'primary' ) ) : ?>
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
									) );
								?>
								<?php endif; ?>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<?php if ( has_nav_menu( 'secondary' ) ) : ?>
								<?php
									wp_nav_menu( array(
										'theme_location' => 'secondary',
									) );
								?>
								<?php endif; ?>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<?php if ( has_nav_menu( 'social' ) ) : ?>
								<?php
									wp_nav_menu( array(
										'theme_location' => 'social',
									) );
								?>
								<?php endif; ?>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header><!-- .site-header -->
	<div id="content" class="site-content">
