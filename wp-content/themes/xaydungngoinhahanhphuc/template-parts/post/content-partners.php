<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<h2 class="title-post text-capitalize mb-4 pb-2 text-center">', '</h2>' );?>	
	<?php if ( has_post_thumbnail() ) { echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid d-block mx-auto my-3')); } ?>
	<div class="entry-content mb-4">		
		<?php		
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
			) );			

			/*wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );*/
		echo share_social();
		?>

	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<?php //twentyseventeen_entry_footer(); ?>
	<?php endif; ?>

</article><!-- #post-## -->


