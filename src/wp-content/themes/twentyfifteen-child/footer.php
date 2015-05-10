<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

		</div><!-- .container -->
	</div><!-- .site-content -->

	<footer id="footer" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="row">
						<div class="col-lg-4">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="primary-menu" class="main-navigation" role="navigation">
								<?php
									// Primary Menu
									wp_nav_menu( array(
										'menu_class'     => 'nav-menu',
										'theme_location' => 'primary',
									) );
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>
						</div>
						<div class="col-lg-4">
						<?php if ( has_nav_menu( 'secondary' ) ) : ?>
							<nav id="secondary-menu" class="main-navigation" role="navigation">
								<?php
									// Secondary Menu
									wp_nav_menu( array(
										'menu_class'     => 'nav-menu',
										'theme_location' => 'secondary',
									) );
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>
						</div>
						<div class="col-lg-4">
						<?php if ( has_nav_menu( 'legal' ) ) : ?>
							<nav id="legal-menu" class="main-navigation" role="navigation">
								<?php
									// Legal Menu
									wp_nav_menu( array(
										'menu_class'     => 'nav-menu',
										'theme_location' => 'legal',
									) );
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-lg-offset-6">
				<?php if ( has_nav_menu( 'social' ) ) : ?>
					<nav id="social-navigation" class="social-navigation" role="navigation">
						<?php
							// Social links navigation menu.
							wp_nav_menu( array(
								'theme_location' => 'social',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>',
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif; ?>
					<div class="site-info">
						<p class="text-right">&copy; <?php echo date( "Y" ); ?> Nerom AB. All rights reserved.</p>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>		
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
