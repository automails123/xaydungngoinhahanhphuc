<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
// $Catalog = get_category( get_query_var( 'cat' ) );
// $cat_id = $Catalog->cat_ID;
// $child_categories=get_categories(array( 'parent' => $cat_id ));
//echo '<pre>' , var_dump($Catalog) , '</pre>';exit();

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
$post_type = get_queried_object();   
$tax_name = $post_type->post_type; 
?>

<div class="slider-bar">
  <?php 
    if($tax_name !='duan') {
      echo '<div class="box-shaw mb-4">';
        echo '<h3 class="text-uppercase px-2 py-3 text-center mb-3">Dự án thi công</h3>';    
        $post_congtrinh = new WP_Query(array(
          'post_type' => 'duan',
          'post_status' => 'publish',
          'posts_per_page' => 5,          
        ));
        if($post_congtrinh->have_posts()) {
          while ($post_congtrinh->have_posts()) {
            $post_congtrinh->the_post(); 
            echo '<div class="media mb-3 pb-3 align-items-center px-2"><div class="fix-img mr-2">' .get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto d-block','alt' => get_the_title(), 'loading'=> 'lazy') ).'</div><div class="media-body"><a href="' . get_the_permalink() . '" title="' . get_the_title() .'">' . get_the_title() .'</a></div></div>';            
          }
        }  
        wp_reset_postdata();  
      echo '</div>';
    }
  ?> 
  <div class="box-shaw mb-4">
    <h3 class="text-uppercase px-2 py-3 text-center mb-3">Tin tức mới</h3>
    <?php
      $post_congtrinh = new WP_Query(array(
        'category_name' => 'tin-tuc',
        'post_status' => 'publish',
        'posts_per_page' => 5,          
      ));
      if($post_congtrinh->have_posts()) {
        while ($post_congtrinh->have_posts()) {
          $post_congtrinh->the_post(); 
          echo '<div class="media mb-3 pb-3 align-items-center px-2"><div class="fix-img mr-2">' .get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto d-block','alt' => get_the_title(), 'loading'=> 'lazy') ).'</div><div class="media-body"><a href="' . get_the_permalink() . '" title="' . get_the_title() .'">' . get_the_title() .'</a></div></div>';            
        }
      }  
      wp_reset_postdata();  
    ?>    
  </div>
  
</div>
