<?php
/**
 * Template part for displaying image posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<h2 class="title-post text-center">', '</h2>' ); ?>
	<?php
		if ( is_sticky() && is_home() ) :
			echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
	?>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">

		<?php if ( is_single() || '' === get_the_post_thumbnail() ) :

			// Only show content if is a single post, or if there's no featured image.
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
			) );

			// wp_link_pages( array(
			// 	'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
			// 	'after'       => '</div>',
			// 	'link_before' => '<span class="page-number">',
			// 	'link_after'  => '</span>',
			// ) );

		endif; ?>

	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<?php //twentyseventeen_entry_footer(); ?>
	<?php endif; ?>

</article><!-- #post-## -->
