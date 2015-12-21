<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MorenCykel
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="container">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content', 'page' ); ?>
							<?php endwhile; ?>							
						</div>
					</div>				
				</div>
			</main>
		</div>

<?php get_footer(); ?>
