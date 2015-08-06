<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<header class="entry-header">
								<div class="post-thumbnail">
									<?php the_post_thumbnail( 'full' ); ?>
								</div><!-- .post-thumbnail -->
							</header><!-- .entry-header -->
							<div class="entry-content">
								<?php the_content(); ?>
							</div><!-- .entry-content -->
						</div>
					</div>
					<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<div class="row"><div class="col-lg-12"><footer class="entry-footer"><span class="edit-link">', '</span></footer></div></div><!-- .entry-footer -->' ); ?>
				</div>
			</article><!-- #post-## -->

		<?php endwhile; ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
