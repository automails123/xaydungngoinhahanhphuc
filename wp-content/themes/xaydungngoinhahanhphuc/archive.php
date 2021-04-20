<?php
get_header(); 
  $Catalog = get_category( get_query_var( 'cat' ) );
  $nameCatalog = $Catalog->slug;
	$postNo = $wp_query->found_posts;
	$catalogName = $Catalog->name; 
  $getArrayCatlogParent = $Catalog->category_parent;
  $getParentSlug = get_category($getArrayCatlogParent)->slug; 
 $parentFromChild = get_term( $getArrayCatlogParent, 'category' );
 $parentFromChildID = $parentFromChild->parent;
  $tax = $wp_query->get_queried_object();
  $tax_name = $tax->name;
  $child_tax = $tax->taxonomy;
//var_dump($tax);
?>
<div class="banner-feature"><img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/bg-blog.jpg" class="mx-auto d-block img-fluid" alt="<?php echo get_bloginfo( 'name' ); ?>"></div>
<div class="wrap-crumbs"><div class="container py-3"><?php if(function_exists('breadcrumb')){breadcrumb();} ?></div></div>
<div class="container py-4 py-md-5">
  <div class="row">
    <div class="col-md-3 d-none d-md-block">
      <?php get_sidebar(); ?>
    </div>
    <div class="col-12 col-md-9">
      <?php if($tax_name == 'products' || $tax_name == 'san-pham') {
        echo '<div class="d-flex justify-content-center align-items-center mb-4"><span class="double-line"></span><h2 class="text-uppercase title-item m-0 px-2">Sản phẩm</h2><span class="double-line"></span></div>';
        $taxonomy_product = 'menu-products';
        $terms = get_terms( array(
            'taxonomy' => $taxonomy_product,
            'hide_empty' => false,
            'orderby'   => 'parent', 
            'order' => 'DESC',
        ) );
        if ( $terms && !is_wp_error( $terms ) ) {
          echo '<div class="row mb-4 list-products">';
            foreach ( $terms as $term ) {
              if($term->parent == 0) {                 
                $image_id = get_term_meta ($term->term_id, 'category-image-id', true );
                $banerUrl = wp_get_attachment_image_src($image_id, 'full')[0];
                if($term->count > 0) {                
                  echo '<div class="col-xs-6 col-sm-6 col-md-4 my-3">';
                    echo '<a class="d-block item-prod w-100 p-2 mb-4" href="' . get_term_link($term->slug, $taxonomy_product) . '" title="' . $term->name .'">
                      <div class="post-media fit-img-1">
                        <div class="inner-fit-img"><img class="img-fluid mx-auto d-block" src="'. $banerUrl .'" alt="'.$term->name.'"></div>
                      </div>
                    </a>';
                    echo '<h3 class="text-capitalize text-center title-prod"><a href="' . get_term_link($term->slug, $taxonomy_product) . '" title="' . $term->name .'">'. $term->name .'</a></h3>';
                  echo '</div>'; 
                }
              }
            } 
          echo "</div>";
        }

      }  elseif($child_tax == 'menu-products') {   
          if($tax->parent == 0) {      
            $term_children = get_term_children($tax->term_id,$child_tax);  
            echo '<div class="row mb-4 list-products">';
              foreach ( $term_children as $child ) {  
                $term = get_term_by('id', $child, $child_tax);
                $image_id = get_term_meta ($term->term_id, 'category-image-id', true );
                $banerUrl = wp_get_attachment_image_src($image_id, 'full')[0];
                // if($term->count > 0) {                
                  echo '<div class="col-xs-6 col-sm-6 col-md-4 my-3">';
                    echo '<a class="d-block item-prod w-100 p-2 mb-4" href="' . get_term_link($term->slug, $child_tax) . '" title="' . $term->name .'">
                      <div class="post-media fit-img-1">
                        <div class="inner-fit-img"><img class="img-fluid mx-auto d-block" src="'. $banerUrl .'" alt="'.$term->name.'"></div>
                      </div>
                    </a>';
                    echo '<h3 class="text-capitalize text-center title-prod"><a href="' . get_term_link($term->slug, $child_tax) . '" title="' . $term->name .'">'. $term->name .'</a></h3>';
                  echo '</div>'; 
                // }
                    
              } //end for 
            echo "</div>";
          } else { 
            $q_products = new WP_Query(array(
              'post_type' => 'products',
              'post_status' => 'publish',
              // 'posts_per_page' => '16', 
              // 'paged'          => $paged,
              'tax_query' => array(
                  array(
                      'taxonomy' => $child_tax,
                      'field' => 'slug',
                      'terms' => $tax->slug,
                      'operator' => 'IN'
                  )
               )
            ));
            if($q_products->have_posts()) {
                echo '<div class="row list-products mb-4">';
                while ($q_products->have_posts()) { 
                  $q_products->the_post(); 
                  $post_id = get_the_ID();
                
                  echo '<div class="col-xs-6 col-sm-6 col-md-4 my-3">';
                    echo '<a class="d-block item-prod w-100 p-2 mb-4" href="' . get_the_permalink() . '" title="' . get_the_title() .'">
                      <div class="post-media fit-img-1">
                        <div class="inner-fit-img">'. get_the_post_thumbnail($post_id, 'full', array( 'class' => 'img-fluid mx-auto d-block','alt' => get_the_title() )) .'</div>
                      </div>
                    </a>';
                    echo '<h3 class="text-capitalize text-center title-prod"><a href="' . get_the_permalink() . '" title="' . get_the_title() .'">'. get_the_title() .'</a></h3>';
                  echo '</div>'; 
                }
                  // echo '<div class="col-12">';
                  //   echo panigation();
                  // echo '</div>';
                echo '</div>';          
            }
          }          
      } elseif ($getArrayCatlogParent === 12 || $getArrayCatlogParent === 49) { //trang con dự án
          echo "<div class='mb-4'>";
            echo catalog_grid_2($nameCatalog); 
          echo "</div>";
          echo panigation();
      } elseif ($parentFromChildID === 4 || $parentFromChildID === 362) {
          //$the_query = new WP_Query( array( 'cat' => $parentFromChildID) );
          $the_query = new WP_Query( array( 'category_name' => $nameCatalog) );
          if ( $the_query->have_posts() ) {   
            while ( $the_query->have_posts() ) {
              $the_query->the_post(); ?>
              <div class="col-sm-4 col-md-3">
                  <div class="item-2 mb-3">
                    <div class="post-media">
                      <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                        <div class="table">
                          <div class="table-cell">
                            <?php echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-responsive center-block','alt' => get_the_title()) ); ?>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="post-content">
                      <h3><a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h3>
                    </div>
                  </div>
                </div>
            <?php }
          }      
      } else {
          echo '<div class="d-flex justify-content-center align-items-center mb-4"><span class="double-line"></span><h2 class="text-uppercase title-item m-0 px-2">'.$catalogName.'</h2><span class="double-line"></span></div>';
          if ($postNo<=1) {
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/post/content', get_post_format() );
            endwhile; // End of the loop. 
          }else { 
            echo catalog_grid($nameCatalog); 
            echo panigation();
          }
      } ?>
    </div>
    
  </div>
</div>
<?php get_footer();
