<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<h1 class="page-title"><?php printf( __( 'Search Results for:<br/>%s', 'twentyfifteen' ), get_search_query() ); ?></h1>
						</header><!-- .page-header -->

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'search' ); ?>

						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>

					</div>
				</div>		
			</div>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
