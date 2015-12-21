<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

	<div id="primary" class="content-area" <?php the_background_image(); ?>>
		<main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<header class="entry-header">
									<?php the_content(); ?>
								</header>
								<div class="entry-content"></div>
								<footer class="entry-footer"></footer>								
							</div>
						</div>
					</div>
				</article>
				<?php endwhile; ?>
			</div>
		</main>
	</div>

<?php get_footer(); ?>