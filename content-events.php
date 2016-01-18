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
