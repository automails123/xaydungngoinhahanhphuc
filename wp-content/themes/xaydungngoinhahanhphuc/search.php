<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<div class="banner-g bn-notfound d-flex align-items-center">
  <div class="container py-3 z-index-10 text-center"><h2 class="text-uppercase title-page mb-3"><?php if ( have_posts() ) : ?>
			<?php printf( __( 'Kết quả tiềm kiếm: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?>
		<?php else : ?>
			<?php _e( 'Không tìm thấy trang', 'twentyseventeen' ); ?>
		<?php endif; ?></h2>
    <div class="wrap-crumbs w-100"><div id="crumbs" class="list-crumb"><i class="fa fa-home mr-1" aria-hidden="true"></i><a title="Trang chủ" class="home" href="<?php bloginfo('url'); ?>">Trang chủ</a>
    	<i class="fa fa-angle-double-right mx-1"></i>
    	<?php if ( have_posts() ) : ?>
			<span class="current"><?php printf( __( 'Kết quả tiềm kiếm: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></span>
		<?php else : ?>
			<span class="current"><?php _e( 'Không tìm thấy trang', 'twentyseventeen' ); ?></span>
		<?php endif; ?>
    </div></div>
  </div>  
  <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/bg-blog.jpg" class="mx-auto d-block img-fluid" alt="<?php echo get_bloginfo( 'name' ); ?>">
</div>
<div class="wrap page-search py-5">
	<div class="container">
		

		<div class="pt-4">
			<?php
			if ( have_posts() ) : 
				echo '<h3 class="title-post mb-4 text-capitalize  pb-2">';
				printf( __( 'Kết quả tiềm kiếm: %s', 'twentyseventeen' ), '<span class="text-uppercase">' . get_search_query() . '</span>' );
				echo '</h3>';
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', 'search' );

				endwhile; // End of the loop.

				the_posts_pagination( array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Trang Trước', 'twentyseventeen' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Trang Tiếp', 'twentyseventeen' ) . '</span>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Trang', 'twentyseventeen' ) . ' </span>',
				) );

			else : ?>

				<p class="mb-4"><?php _e( 'Xin lỗi, nhưng không có gì phù hợp với cụm từ tìm kiếm của bạn. Vui lòng thử lại với một số từ khóa khác nhau.', 'twentyseventeen' ); ?></p>
				<?php
					get_search_form();

			endif;
			?>

		</div><!-- #primary -->	
	</div>
</div><!-- .wrap -->

<?php get_footer();
