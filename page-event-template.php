<?php
    /**
    * Template Name: Event Template
    */

get_header(); ?>

<div id="primary" class="content-area-events">
	<main id="main" class="site-main" role="main">
		<h1>All the Events Below:</h1>

		<?php

		$args = array('post_type' => 'events', 'posts_per_page' => 9);
		$loop = new WP_Query($args);

		// Start the loop.
		while ( $loop->have_posts() ) : $loop->the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content-events', get_post_format() );

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_footer(); ?>
