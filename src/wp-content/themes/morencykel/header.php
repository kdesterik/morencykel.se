<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MorenCykel
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="modal fade" id="search" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<?php echo get_search_form( $echo ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="content" class="site-content">
		<header id="header" class="site-header" role="banner">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="site-branding">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo file_get_contents( get_template_directory() . '/images/morencykel-logo.svg' ); ?></a>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
						<nav id="navigation" class="site-navigation" role="navigation">
							<ul>
								<li>
									<a href="#cart" title="cart" data-toggle="dropdown">cart</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li>Your cart is currently empty.</li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something else here</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Separated link</a></li>
									</ul>
								</li>
								<li>
									<a href="#search" title="search" data-toggle="modal" data-target="#search">search</a>
								</li>
								<li>
									<a href="#mmenu" title="menu">menu</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>
