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
	<div class="banner-g bn-tuyendung d-flex align-items-center">
	  <div class="container py-3 z-index-10 text-center"><h2 class="text-uppercase title-page mb-2 mb-lg-3">Tuyển dụng</h2>
	    <div class="wrap-crumbs w-100"><div id="crumbs" class="list-crumb"><i class="fa fa-home mr-1" aria-hidden="true"></i><a title="Trang chủ" class="home" href="<?php bloginfo('url'); ?>">Trang chủ</a>
	    	<i class="fa fa-angle-double-right mx-1"></i><a href="<?php bloginfo('url'); ?>/tuyen-dung" title="Tuyển dụng">Tuyển dụng</a><i class="fa fa-angle-double-right mx-1"></i>
	    	<span class="current"><?php echo get_the_title();	?></span>
	    </div></div>
	  </div>  
	  <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/bg_tuyendung.jpg" class="mx-auto d-block img-fluid" alt="<?php echo get_bloginfo( 'name' ); ?>">
	</div>

	<div class="container content-tax area-post py-4 py-md-5">
		<div class="row">
			<div class="col-12 col-lg-9">
				<?php 
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/post/content-tuyendung', get_post_format() );
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile; // End of the loop.		
					
					if(function_exists('ungtuyen')){ungtuyen();}
					echo share_social();
				?>					
			</div>
			<div class="col-lg-3 d-none d-lg-block">
				<?php get_sidebar(); ?>
			</div>	
		</div>
	</div>

<?php get_footer();
