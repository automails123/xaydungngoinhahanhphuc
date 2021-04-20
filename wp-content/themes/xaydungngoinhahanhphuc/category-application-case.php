<?php
get_header();   $Catalog = get_category( get_query_var( 'cat' ) );$nameCatalog = $Catalog->slug;$postNo = $wp_query->found_posts;
 $cat_id = $Catalog->cat_ID;
 $child_categories=get_categories(array( 'parent' => $cat_id ));    
?> 
<div class="banner-feature"><img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/bg-blog.jpg" class="mx-auto d-block img-fluid" alt="Martoyo Dự Án"></div>
<div class="wrap-crumbs"><div class="container py-3"><?php if(function_exists('breadcrumb')){breadcrumb();} ?></div></div>
<div class="container py-4 py-md-5">
  <div class="row mb-5">
    <div class="col-md-3 d-none d-md-block">
      <?php get_sidebar(); ?>
    </div>  
    <div class="col-12 col-md-9">
      <div class="d-flex justify-content-center align-items-center mb-4">
        <span class="double-line"></span>
          <h2 class="text-uppercase title-item m-0 px-2"><?php echo $Catalog->name; ?></h2>
        <span class="double-line"></span>
      </div>
      <?php if ($postNo<=1) {
          /* Start the Loop */
        while ( have_posts() ) : the_post();
          get_template_part( 'template-parts/post/content', get_post_format() );
          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;
        endwhile; // End of the loop. 
      } else {
        if(count($child_categories) > 0 ) { 
          echo '<div class="row">';
          foreach ( $child_categories as $child ) { 
            $image_id = get_term_meta ($child->term_id, 'category-image-id', true );
            $banerUrl = wp_get_attachment_image_src($image_id, 'full')[0]; ?>
            <div class="col-sm-6 col-md-4 my-3">
              <div class="item-block item-p">
                <div class="post-media fit-img-1 fit-img-cat mb-4">
                  <a class="inner-fit-img position-relative d-block" href="<?php echo get_term_link( $child, $child ->cat_name); ?>" title="<?php echo $child ->cat_name; ?>"><img src="<?php echo $banerUrl; ?>" class="mx-auto d-block img-fluid w-100 h-100" alt="<?php echo $child ->cat_name; ?>"></a>
                </div>
                <div class="post-content">
                  <h3 class="cata-name text-uppercase text-center"><a href="<?php echo get_term_link( $child, $child ->cat_name); ?>" title="<?php echo $child ->cat_name; ?>"><?php echo $child ->cat_name; ?></a></h3> 
                </div>
              </div>
            </div>
          <?php }  
          echo '</div>';
        }        
      } ?>
    </div>   
    
  </div>
</div>
<?php get_footer();
