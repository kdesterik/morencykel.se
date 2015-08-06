<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
			</div>
			<div class="col-lg-3"></div>
			<div class="col-lg-9">
				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
			</div>
		</div>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<div class="row"><div class="col-lg-12"><footer class="entry-footer"><span class="edit-link">', '</span></footer></div></div><!-- .entry-footer -->' ); ?>
	</div>
</article><!-- #post-## -->
