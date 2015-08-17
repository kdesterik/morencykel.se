<?php
/**
 * Template Name: Contact
 */
?>


<?php get_header(); ?>

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
								</div>
							</header>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="entry-content">
								<?php the_field( 'contact_information' ); ?>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="entry-content">
								<?php the_field( 'contact_opening_hours' ); ?>
							</div>
						</div>
					</div>
				</div>
			</article>

		<?php endwhile; ?>

		</main>
	</div>

<?php get_footer(); ?>
