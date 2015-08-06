<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<header class="entry-header">
					<?php
						if ( is_single() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
						endif;
					?>
				</header><!-- .entry-header -->
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<ul class="up">
					<?php the_date( 'Y/m/d', '<li>', '</li>' ); ?>
					<li><?php the_author(); ?></li>
				</ul>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
				<div class="entry-content">
					
					<?php twentyfifteen_post_thumbnail(); ?>

					<?php if ( is_single() ): ?>

						<?php the_content(); ?>

						<nav class="navigation post-navigation" role="navigation">
							<div class="nav-links">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<?php echo get_previous_post_link( '<div class="nav-previous">%link</div>', '%title' ); ?>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<?php echo get_next_post_link( '<div class="nav-previous text-right">%link</div>', '%title' ); ?>
									</div>
								</div>
							</div>
						</div>

					<?php else : ?>

						<?php the_excerpt( sprintf( __( 'Continue reading %s', 'twentyfifteen' ), the_title( '<span class="screen-reader-text">', '</span>', false ))); ?>

					<?php endif; ?>
				</div><!-- .entry-content -->
			</div>
		</div>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><footer class="entry-footer"><span class="edit-link">', '</span></footer></div></div><!-- .entry-footer -->' ); ?>

	</div>
</article><!-- #post-## -->
