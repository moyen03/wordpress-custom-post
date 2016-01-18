# wordpress-custom-post

===========++++=====functions.php =====++++===========
<?php
/**
 * Custom Post Type
 */

if( !function_exists('my_custom_post_types'));

// Our custom post type function
function my_custom_post_types() {

	register_post_type( 'events',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Event' ),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'events'),
			'query_var' => true,
			'capability_type' => 'post',
			'supports' => array(
				'title',
				'custom-fields',
				'comments',
				'revisions',
				'thumbnail',
				'author',
				'page-attributes',)
		)
	);
}
/**
 * Hooking up custom post function to theme setup
 */
add_action( 'init', 'my_custom_post_types' );
?>

===========++++===== content-events-template.php =====++++===========

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

===========++++===== content-events.php =====++++===========
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

===========++++===== =====++++===========
===========++++===== =====++++===========

