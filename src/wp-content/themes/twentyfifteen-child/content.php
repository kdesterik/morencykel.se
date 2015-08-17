<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<ul class="up">
					<?php the_date( 'Y/m/d', '<li>', '</li>' ); ?>
					<li><?php the_author(); ?></li>
				</ul>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
				
				<header class="entry-header">

					<?php twentyfifteen_post_thumbnail(); ?>
					<?php
						if ( is_single() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
						endif;
					?>
					
				</header><!-- .entry-header -->
				
				<div class="entry-content">
					
					<?php if ( is_single() ): ?>

						<?php the_content(); ?>

					<?php else : ?>

						<?php the_excerpt( sprintf( __( 'Continue reading %s', 'twentyfifteen' ), the_title( '<span class="screen-reader-text">', '</span>', false ))); ?>

					<?php endif; ?>
				</div><!-- .entry-content -->

				<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

				<?php if ( is_single() ): ?>

				<nav class="navigation post-navigation" role="navigation">
					<div class="nav-links">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<?php echo get_next_post_link( '<div class="nav-next"><p>%link</p></div>', '%title' ); ?>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<?php echo get_previous_post_link( '<div class="nav-previous text-right"><p>%link</p></div>', '%title' ); ?>								
							</div>
						</div>
					</div>
				</nav>

				<?php endif; ?>

			</div>
		</div>
	</div>
</article><!-- #post-## -->
