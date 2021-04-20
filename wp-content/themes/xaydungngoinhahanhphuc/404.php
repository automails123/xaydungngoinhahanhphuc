<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<div class="banner-g bn-notfound d-flex align-items-center">
  <div class="container py-3 z-index-10 text-center"><h2 class="text-uppercase title-page mb-3">404</h2>
    <div class="wrap-crumbs w-100"><div id="crumbs" class="list-crumb"><i class="fa fa-home mr-1" aria-hidden="true"></i><a title="Trang chủ" class="home" href="<?php bloginfo('url'); ?>">Trang chủ</a>
    	<i class="fa fa-angle-double-right mx-1"></i>
    	<span class="current">404</span>
    </div></div>
  </div>  
  <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/bg-blog.jpg" class="mx-auto d-block img-fluid" alt="<?php echo get_bloginfo( 'name' ); ?>">
</div>
<div class="content-area area-404 py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12 error-404 not-found text-center">			
					<h1 class="text-uppercase title-item mb-5 pb-4"><?php _e( 'Rất tiếc! Không thể tìm thấy trang web.', 'twentyseventeen' ); ?></h1>				
				<div class="page-content">
					<p><?php _e( 'Có vẻ như không có gì được tìm thấy tại địa điểm này. Bạn có thể thử tìm kiếm?', 'twentyseventeen' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div>
		</div>
	</div>
</div>

<?php get_footer();
