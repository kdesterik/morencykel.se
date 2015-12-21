<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MorenCykel
 */

?>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="site-info">
							<?php printf( __( '<p class="site-description">Copyright &copy; %1$s %2$s</p>', 'morencykel' ), date( 'Y' ), get_bloginfo( 'description', 'display' )); ?>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
						<div class="widget-area" role="complementary">
							<?php dynamic_sidebar( 'sidebar-1' ); ?>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<div class="grid"></div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
