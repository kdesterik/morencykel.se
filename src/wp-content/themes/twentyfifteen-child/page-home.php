<?php

get_header(); ?>

	<?php if (has_post_thumbnail( $post->ID ) ): ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	<div class="cover" style="background-image: url('<?php echo $image[0]; ?>')"></div>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
