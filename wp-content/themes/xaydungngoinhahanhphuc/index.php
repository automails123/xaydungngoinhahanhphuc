<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();?>
<?php if(function_exists('getSliderBanner')){?>
  <div class="banner-home">
    <div data-slider>
      <?php echo getSliderBanner(); ?>
    </div>
  </div>
<?php } ?>
<div class="py-4 py-md-5">
  <div class="container pt-md-3">
    <h2 class="text-uppercase title-home mb-3 mb-md-4 pb-3 title_l">Về chúng tôi</h2>
    <div class="row mb-4 mb-md-5">
      <div class="col-md-7 mb-3 mb-md-0">
        <div class="pr-lg-5">
          <p>Công Ty TNHH Tư Vấn - Thiết Kế - Xây Dựng - Dịch Vụ - Bất Động Sản NGÔI NHÀ HẠNH PHÚC được thành lập vào ngày 08 tháng 06 năm 2016 theo Giấy chứng nhận đăng ký kinh doanh số 0313849232 do Sở Kế hoạch - Đầu tư Tp. HCM cấp.</p>
          <p>Công ty chúng tôi hoạt động chính trong các lĩnh vực: </p>
          <ul> 
            <li>Thiết kế xây dựng</li>
            <li>Nội thất</li>
            <li>Thiết bị vệ sinh</li>
            <li>Gạch men</li>
            <li>Pháp lý nhà đất (Xin phép xây dựng, Hoàn công, tách thửa)</li>
            <li>Thừa kế di sản</li>
            <li>Đo đặc địa chính</li>
            <li>Sàn giao dịch Bất động sản</li>
          </ul>
          <div class="mt-4"><a href="<?php bloginfo('url'); ?>/gioi-thieu" title="Xem chi tiết" class="btn btn-read-more text-capitalize px-3 py-2 rounded">Xem chi tiết<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></a></div>           
        </div>
      </div>
      <div class="col-md-5"><div class="img-wrap-about position-relative d-inline-block p-4"><img src="<?php echo get_template_directory_uri();?>/assets/images/xaydungngoinhahanhphuc_about.jpg" class="img-fluid" loading="lazy" alt="<?php echo get_bloginfo( 'name' ); ?>"></div></div>
    </div>

    <h2 class="text-uppercase title-home text-center mb-2">Lĩnh vực hoạt động chính</h2>
    <img src="<?php echo get_template_directory_uri();?>/assets/images/titlebg.png" loading="lazy" alt="" class="img-fluid d-block mx-auto mb-3">
    <?php
      $post_lvhd = new WP_Query(array(
        'post_type' => 'linhvuchoatdong',
        'post_status' => 'publish',
        'posts_per_page' => -1,          
      ));
      if($post_lvhd->have_posts()) {
        echo '<div class="row space-1 lvhd justify-content-center">';
          while ($post_lvhd->have_posts()) {
            $post_lvhd->the_post(); 
            echo '<div class="col-6 col-sm-6 col-md-4 col-lg-4 my-3"><div class="item h-100"><a href="' . get_the_permalink() . '" title="' . get_the_title() .'">' .get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid w-100 d-block mx-auto','alt' => get_the_title(), 'loading'=> 'lazy') ).'<h3 class="mb-0 text-capitalize py-2 text-center">' . get_the_title() .'</h3></a></div></div>';
          }
        echo '</div>'; 
      }  
      wp_reset_postdata();  
    ?>       
    <div class="col-12 text-center mb-3 mt-3 mt-md-4">
      <a href="<?php echo get_post_type_archive_link('linhvuchoatdong'); ?>" title="Xem tất cả lĩnh vực" class="btn btn-read-more text-capitalize px-3 py-2 rounded">
         Xem tất cả lĩnh vực <span class="ml-2 d-inline-block align-middle">+</span>
       </a>             
    </div>
  </div>
</div>
<div class="project-home py-5">
	<div class="container-fluid pt-lg-3 px-1">
  <h2 class="text-uppercase title-home text-center mb-2 text-white">Dự án thi công</h2>
  <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/titlebg.png" alt="" class="img-fluid d-block mx-auto mb-4">
  <?php
    $post_duan = new WP_Query(array(
      'post_type' => 'duan',
      'post_status' => 'publish',
      'posts_per_page' => 8,          
    ));
    if($post_duan->have_posts()) {
      echo '<div class="row mx-0">';
        while ($post_duan->have_posts()) {
          $post_duan->the_post(); 
          echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3 px-2 my-2"><a class="effect-img-1 d-block" href="' . get_the_permalink() . '" title="' . get_the_title() .'" ><div class="effect-inner">' .get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto d-block','alt' => get_the_title(), 'loading'=> 'lazy') ).'
                <div class="post-content d-flex flex-column align-items-center justify-content-center"><h3 class="title-item-post mb-0 text-center py-2 py-lg-3 px-1">' .get_the_title() .'</h3><div class="btn btn-read-more text-capitalize px-4 py-2 rounded mt-3">Xem thêm<span class="ml-2 d-inline-block align-middle">+</span></div>
            </div></div></a></div>'; 
        }
      echo '</div>'; 
    }  
    wp_reset_postdata();  
  ?>   
	</div>
</div>      
<div class="news-home pt-5 pb-4 pb-md-5">
  <div class="container pt-lg-3">
    <h2 class="text-uppercase title-home text-center mb-2">Tin tức & sự kiện</h2>
    <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/titlebg.png" alt="" class="img-fluid d-block mx-auto">
    <?php if(function_exists('news_home')){ echo news_home('tin-tuc'); } ?>          
  </div>
</div>
<div class="partner pt-5 pb-4 pb-md-5 bg-even">
	<div class="container pt-lg-3">
  <h2 class="title-home text-center pb-1">ĐỐI TÁC KINH DOANH
    <div class="sub-title mb-3 mt-1">Tổng hợp những đối tác lớn của chúng tôi</div>
  </h2>
  <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/titlebg.png" alt="" class="img-fluid d-block mx-auto mb-5">
		<?php if(function_exists('show_partners')){ echo show_partners(); } ?>
	</div>
</div>	  
<?php get_footer();
