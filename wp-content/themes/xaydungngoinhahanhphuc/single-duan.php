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
get_header(); ?>
	<div class="banner-g bn-duan d-flex align-items-center">
	  <div class="container py-3 z-index-10 text-center"><h2 class="text-uppercase title-page mb-2 mb-lg-3">Dự án</h2>
	    <div class="wrap-crumbs w-100"><div id="crumbs" class="list-crumb"><i class="fa fa-home mr-1" aria-hidden="true"></i><a title="Trang chủ" class="home" href="<?php bloginfo('url'); ?>">Trang chủ</a>
	    	<i class="fa fa-angle-double-right mx-1"></i><a href="<?php bloginfo('url'); ?>/du-an" title="Dự án">Dự án</a><i class="fa fa-angle-double-right mx-1"></i>
	    	<span class="current"><?php echo get_the_title();	?></span>
	    </div></div>
	  </div>  
	  <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/bg_duan.jpg" class="mx-auto d-block img-fluid" alt="<?php echo get_bloginfo( 'name' ); ?>">
	</div>

	<div class="container content-tax area-post py-4 py-md-5">
		<div class="row">
			<div class="col-12 col-lg-9">
				<?php 
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/post/content-duan', get_post_format() );
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile; // End of the loop.			
				?>	
			</div>
			<div class="col-lg-3 d-none d-lg-block">
				<?php get_sidebar(); ?>
			</div>	
			<div class="col-12">
				<?php 
					$args = array(
					'post_type' => 'duan',
		            'post_status' => 'publish',
		            'posts_per_page' => 4,   
					'orderby' => 'rand',
					'post__not_in' => array ($post->ID),
					);
					$related_items = new WP_Query($args );
					// loop over query
					if ($related_items->have_posts()) :
						echo '<div class="related-product"><h2 class="text-capitalize title-item item-line mb-2">Dự Án Thi công liên quan</h2><div class="row">';
						while ($related_items->have_posts() ) : $related_items->the_post();
				        	echo '<div class="col-6 col-md-3 my-3">';
				                echo '<a class="d-block item-prod w-100 p-0 rounded overflow-hidden mb-3" href="' . get_the_permalink() . '" title="' . get_the_title() .'">
				                  <div class="post-media fit-img-1">
				                    <div class="inner-fit-img">'. get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto d-block', 'alt' => get_the_title(), 'loading'=> 'lazy')) .'</div>
				                  </div>
				                </a>';
				                echo '<h3 class="text-capitalize text-left title-prod"><a href="' . get_the_permalink() . '" title="' . get_the_title() .'">'. get_the_title() .'</a></h3>';
				            echo '</div>'; 
				            
						endwhile;
						echo '</div></div>';
					endif;
					// Reset Post Data
					wp_reset_postdata();					
				?>
			</div>		
		</div>
	</div>

<?php get_footer();
