<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header(); $taxonomy_name = 'menu-products';
	$terms = get_the_terms( get_the_ID(),$taxonomy_name);
?>
<div class="banner-feature"><img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/bg-blog.jpg" class="mx-auto d-block img-fluid" alt="Martoyo Dự Án"></div>
<div class="wrap-crumbs"><div class="container py-3">
<div id="crumbs" class="list-crumb"><i class="fa fa-home mr-1" aria-hidden="true"></i><a class="home" href="<?php bloginfo('url'); ?>" title="Trang chủ">Trang chủ</a> 
	<i class="fa fa-angle-double-right mx-1"></i><a href="<?php bloginfo('url'); ?>/san-pham" title="Sản Phẩm">Sản Phẩm</a>
		<?php 
			foreach ( $terms as $child ) {
				if($child->parent == 0) {
					echo '<i class="fa fa-angle-double-right mx-1"></i>';
			  		echo '<a title="' . $child->name . '" href="' . get_term_link( $child->name, $taxonomy_name) . '">' . $child->name . '</a>';
				}
			}
			// foreach ( $terms as $child ) {
			// 	// echo '<pre>' , var_dump($child) , '</pre>';
			// 	if($child->parent != 0) { echo "d";
			// 		echo '<i class="fa fa-angle-double-right mx-1"></i>';
			// 		echo '<a title="' . $child->name . '" href="' . get_term_link( $child->term_id, $taxonomy_name) . '">' . $child->name . '</a>';
			// 	}
			// }
			echo '<i class="fa fa-angle-double-right mx-1"></i>';
			echo get_the_title();
		?>
</div>
</div></div>
<div class="container py-4 py-md-5 single-product">
		<div class="row">
			<div class="col-md-3 d-none d-md-block"><?php get_sidebar(); ?></div>
			<div class="col-12 col-md-9">		
		        <?php 
					/* Start the Loop */
					while ( have_posts() ) : the_post(); 
						get_template_part( 'template-parts/post/content-products', get_post_format() );
						// If comments are open or we have at least one comment, load up the comment template.
						echo '<div class="mb-4">';
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						echo '</div>';
					endwhile; // End of the loop.		
					if(function_exists('related_taxomy_posts')){related_taxomy_posts();}	
				?>	 
			</div> 
			
		</div>      
	</div>	


<?php get_footer();
