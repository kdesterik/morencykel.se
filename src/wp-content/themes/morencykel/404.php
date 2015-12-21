<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package MorenCykel
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="container">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<section class="error-404 not-found">
								<header class="page-header">
									<h3 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'morencykel' ); ?></h3>
								</header>
								<div class="page-content">
									<p><?php _e( 'It looks like nothing was found at this location.<br>Maybe try a search?', 'morencykel' ); ?></p>
								</div>
							</section>
						</div>
					</div>
				</div>
			</main>
		</div>

<?php get_footer(); ?>