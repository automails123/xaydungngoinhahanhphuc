<?php
/**
 * Template part for displaying gallery posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php the_title( '<h1 class="title-post text-capitalize mb-4">', '</h2>' ); ?>
	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() && ! get_post_gallery() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
	<div class="entry-content">
	    <div class="gallary mb-5">
	    	<div class="slider-for mb-4">
	    		<?php 
					// if(function_exists('get_img_gallery')){
					// 	foreach ( get_img_gallery(the_ID()) as $gl ) {
					// 		echo "<div class='gallery-icon'>".$gl."</div>";
					// 	}
					// }
					$beforeEachImage = "<div class='gallery-icon'>";
		            $afterEachImage = "</div>";
		            preg_match_all("/(<img [^>]*>)/",get_the_content(),$matches,PREG_PATTERN_ORDER);
		            for( $i=0; isset($matches[1]) && $i < count($matches[1]); $i++ ) {
		                 echo $beforeEachImage . $matches[1][$i] . $afterEachImage;
		            }
			    ?>
	    	</div>
	    	<div class="slider-nav">
	    		<?php
					// if(function_exists('get_img_gallery')){
					// 	foreach ( get_img_gallery(the_ID()) as $gl ) {
					// 		echo "<div class='gallery-icon'><div class='p-2 h-100'>".$gl."</div></div>";
					// 	}
					// }
					$beforeEachImage = "<div class='gallery-icon'>";
		            $afterEachImage = "</div>";
		            preg_match_all("/(<img [^>]*>)/",get_the_content(),$matches,PREG_PATTERN_ORDER);
		            for( $i=0; isset($matches[1]) && $i < count($matches[1]); $i++ ) {
		                 echo $beforeEachImage . $matches[1][$i] . $afterEachImage;
		            }
			    ?>
	    	</div>
	    </div>

	    <!-- <div id="content">
	        <?php //echo strip_shortcodes(get_the_content()); ?>
	    </div> -->
		
		<?php //if ( ! is_single() ) :

			// If not a single post, highlight the gallery.
			// if ( get_post_gallery() ) :
			// 	echo '<div class="entry-gallery">';
			// 		echo get_post_gallery();
			// 	echo '</div>';
			// endif;

		//endif;

		// if (get_post_gallery() ) :

		// 	/* translators: %s: Name of current post */
		// 	the_content( sprintf(
		// 		__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
		// 		get_the_title()
		// 	) );
		// endif;
		?>

	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<?php //twentyseventeen_entry_footer(); ?>
	<?php endif; ?>

</article><!-- #post-## -->
