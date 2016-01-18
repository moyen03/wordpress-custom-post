# wordpress-custom-post functions code and the related template.

===========++++=====code for functions.php =====++++===========
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

===========++++=====code for content-events-template.php =====++++===========

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
?>
<?php get_footer(); ?>

===========++++=====code for content-events.php =====++++===========
<?php
/**
 * The template part for displaying content for events
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<div class="single-event">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header event-title">
			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
			<?php endif; ?>

			<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		</header><!-- .entry-header -->
        <div class="event-img">
		    <?php twentysixteen_post_thumbnail(); ?>
		</div>
        <div class="custom-value">
			<?php echo get_post_meta($post->ID, 'Company', true) ?>
        </div>

</article>

</div>
<!-- #post-## -->
