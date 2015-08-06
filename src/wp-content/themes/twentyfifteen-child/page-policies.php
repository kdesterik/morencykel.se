<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

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

					<?php
						$pages = get_pages( array( 'child_of' => $post->ID, 'sort_order' => 'asc' ));

						foreach( $pages as $page ) {		
							$content = $page->post_content;
							$content = apply_filters( 'the_content', $content );
					?>

					<div class="row">
						<div class="col-lg-3">
							<p><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></p>
						</div>
						<div class="col-lg-9">
							<div class="entry-content">
								<?php echo $content; ?>
							</div>
						</div>
					</div>

					<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<div class="row"><div class="col-lg-12"><footer class="entry-footer"><span class="edit-link">', '</span></footer></div></div><!-- .entry-footer -->', $page->ID ); ?>

					<?php }	?>

				</div>
			</article><!-- #post-## -->

		<?php endwhile; ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>