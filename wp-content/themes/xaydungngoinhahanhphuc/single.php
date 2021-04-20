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
<?php 
	$nameCatalog = get_the_category()[0];
	// $nameCatalogSlug = $nameCatalog->slug; 
	$Catalog = get_category( get_query_var( 'cat' ) );
 //  $getArrayCatlogParent = $Catalog->category_parent;
 //  $getParentSlug = get_category($getArrayCatlogParent)->slug; 
  
?>
	<div class="banner-g banner-contactn d-flex align-items-center">
	  <div class="container py-3 z-index-10 text-center"><h2 class="text-uppercase title-page mb-2 mb-lg-3"><?php echo $nameCatalog->name; ?></h2>
	    <div class="wrap-crumbs w-100"><div class="container py-3"><?php if(function_exists('breadcrumb')){breadcrumb();} ?></div></div>
	  </div>  
	  <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/bg-blog.jpg" class="mx-auto d-block img-fluid" alt="<?php echo get_bloginfo( 'name' ); ?>">
	</div>

	<div class="container area-post py-4 py-md-5">
		<div class="row">
			<div class="col-12 col-lg-9">
				<?php 
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/post/content', get_post_format() );
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
			<div class="col-12"><?php if(function_exists('related_taxomy_posts')){related_taxomy_posts();} ?></div>		
		</div>
	</div>

<?php get_footer();
