<?php
/*
Template Name: Cart
*/
?>

<?php get_header(); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content', 'page' ); ?>
							<?php endwhile; ?>					
						</div>
					</div>
				</div>
			</main>
		</div>

<?php get_footer(); ?>