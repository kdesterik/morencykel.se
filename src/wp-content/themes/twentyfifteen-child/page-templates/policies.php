<?php
/**
 * Template Name: Policies
 */
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<header class="entry-header">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</header><!-- .entry-header -->
							<div class="entry-content">
								<?php the_content(); ?>
							</div><!-- .entry-content -->
						</div>
					</div>

					<?php $pages = get_pages( array( 'child_of' => $post->ID, 'sort_order' => 'asc' )); ?>

					<?php foreach( $pages as $page ): ?>
					<?php $content = $page->post_content; ?>
					<?php $content = apply_filters( 'the_content', $content ); ?>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="entry-footer">
								<p><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="entry-content">
								<?php echo $content; ?>
							</div>
						</div>
					</div>

					<?php endforeach; ?>

				</div>
			</article><!-- #post-## -->

		<?php endwhile; ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>