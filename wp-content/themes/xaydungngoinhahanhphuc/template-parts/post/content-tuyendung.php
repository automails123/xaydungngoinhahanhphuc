<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<h2 class="title-post text-capitalize pb-2 mb-4">', '</h2>' );?>		
	<div class="entry-content">		
     	<div class="content-tuyendung">
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
			?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
