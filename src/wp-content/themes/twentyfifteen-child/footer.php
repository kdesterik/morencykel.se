	</div>
	<footer id="footer" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="site-info">
						<?php $description = get_bloginfo( 'description', 'display' ); ?>
						<?php if( $description || is_customize_preview() ): ?>
						<p class="site-description">&copy; <?php echo date( "Y" ); ?> <?php echo $description; ?>. <?php _e( 'All rights reserved.', 'twentyfifteen' ); ?></p>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>		
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
