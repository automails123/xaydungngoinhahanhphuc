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
        <h2 class="text-uppercase title-home mb-1 mb-md-4 pb-3 title_l">XÂY DỰNG NGÔI NHÀ HẠNH PHÚC</h2>
        <div class="row justify-content-center mb-4 mb-md-5">
          <div class="col-11 col-md-10 col-lg-10">
            <p>Công Ty TNHH Tư Vấn - Thiết Kế - Xây Dựng - Dịch Vụ - Bất Động Sản NGÔI NHÀ HẠNH PHÚC được thành lập vào ngày 08 tháng 06 năm 2016 theo Giấy chứng nhận đăng ký kinh doanh số 0313849232 do Sở Kế hoạch - Đầu tư Tp. HCM cấp.</p>
            <p>Công ty có chức năng hoạt động chính trong lĩnh vực các lĩnh vực: </p>
            <ul> 
              <li>Thiết kế kiến trúc</li>
              <li>Xây dựng dân dụng</li>
              <li>Xin phép xây dưng</li>
              <li>Hoàn công</li>
              <li>Đo vẽ hiện trạng nhà đất</li>
              <li>Sàn giao dịch Bất động sản</li>
            </ul>
            <p>Trải qua gần 10 năm hình thành và phát triển, Hoang Trieu Group đạt được nhiều thành tựu trong lĩnh vực đầu tư – xây dựng phát triển các dự án bất động sản, Sản xuất bột cá làm nguyên liệu chế biến thức ăn chăn nuôi, Xây dựng các công trình hạ tầng kỹ thuật, đô thị đã tạo ra những  khu dân cư mới, khu đô thị mới khang trang, hiện đại, văn minh phục vụ cho nhu cầu an cư của người dân tại TP.HCM và các tỉnh thành Việt Nam.</p>
          </div>
        </div>
        <h3 class="text-item mb-3 d-flex text-uppercase">Lĩnh vực hoạt động chính</h3>
        <div class="row mx-0 wrap-lv">         
          <div class="col-6 col-sm-6 col-md pl-0">
            <a href="<?php bloginfo('url'); ?>/gioi-thieu/#linh-vuc-hoat-dong" title="Phát triển dự án Bất Động sản">
              <div class="block-lv position-relative mb-4 overflow-hidden" >
                <div class="h-100 lv-inner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/phat-trien-du-an-bat-dong-san.jpg')"></div>
               <!--  <img class="img-fluid" loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/phat-trien-du-an-bat-dong-san.jpg" alt="Phát triển dự án Bất Động sản"> -->
              </div>
              <div class="p-4">
                <img class="img-fluid mb-3" loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/icon_building.png" alt="Phát triển dự án Bất Động sản">
                <div class="text text-uppercase">Phát triển dự án Bất Động sản</div>   
              </div>
            </a>
          </div>
          <div class="col-6 col-sm-6 col-md pl-0">
            <a href="<?php bloginfo('url'); ?>/gioi-thieu/#linh-vuc-hoat-dong" title="Tổng thầu thi công và xây dựng">
              <div class="p-4 mt-4">
                <img class="img-fluid mb-3" loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/icon_construct.png" alt="Tổng thầu thi công và xây dựng">
                <div class="text text-uppercase">Tổng thầu thi công và xây dựng</div>   
              </div>
              <div class="block-lv position-relative mt-4 overflow-hidden">
                <div class="h-100 lv-inner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/tong-thau-thi-cong-va-xay-dung.jpg')"></div>
              </div>              
            </a>            
          </div>
          <div class="col-6 col-sm-6 col-md pl-0">
            <a href="<?php bloginfo('url'); ?>/gioi-thieu/#linh-vuc-hoat-dong" title="Kinh doanh nhà hàng khách sạn">
              <div class="block-lv position-relative mb-4 overflow-hidden">
                <div class="h-100 lv-inner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/kinh-doanh-nha-hang-khach-san.jpg')"></div>
              </div>
              <div class="p-4">
                <img class="img-fluid mb-3" loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/icon_hotel.png" alt="Kinh doanh nhà hàng khách sạn">
                <div class="text text-uppercase">Kinh doanh nhà hàng khách sạn</div>   
              </div>
            </a>
          </div>
          <div class="col-6 col-sm-6 col-md px-0">
            <a href="<?php bloginfo('url'); ?>/gioi-thieu/#linh-vuc-hoat-dong" title="Sản xuất thức ăn gia súc gia cầm và thủy sản">
              <div class="p-4 mt-4">
                <img class="img-fluid mb-3" loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/icon_factory.png" alt="Sản xuất thức ăn gia súc gia cầm và thủy sản">
                <div class="text text-uppercase">Sản xuất thức ăn gia súc gia cầm và thủy sản</div>   
              </div>
              <div class="block-lv position-relative mt-4 overflow-hidden">
                <div class="h-100 lv-inner" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/san-xuat-thuc-an-gia-suc-gia-cam-va-thuy-san.jpg')"></div>
              </div>              
            </a>            
          </div>
        </div>
        <!-- <div class="col-12 text-center mb-3">
          <div class="btn btn-read-more text-capitalize px-3 py-2 rounded">
             Xem tất cả lĩnh vực <span class="ml-2 d-inline-block align-middle">+</span>
           </div>             
        </div> -->
      </div>
    </div>
   	<div class="project-home py-5">
   		<div class="container-fluid pt-lg-3 px-1">
			  <h2 class="text-uppercase title-home text-center mb-2 text-white">Dự án thi công</h2>
        <img src="<?php echo get_template_directory_uri();?>/assets/images/titlebg.png" alt="" class="img-fluid d-block mx-auto">
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
      <!-- <div class="news-home pt-5 pb-4 pb-md-5 bg-even">
        <div class="container pt-lg-3">
         <h2 class="text-uppercase title-home title-home-2 mb-1 mb-md-4 mb-lg-5 pb-3"><span>Tin tức & sự kiện <small class="d-block">HOANG TRIEU GROUP</small></span></h2>
          <?php if(function_exists('news_home')){ echo news_home('tin-tuc-su-kien'); } ?>
        </div>
      </div> -->
   		<div class="partner pt-5 pb-4 pb-md-5">
   			<div class="container pt-lg-3">
          <h2 class="text-uppercase title-home text-center mb-2">Đối tác</h2>
          <img src="<?php echo get_template_directory_uri();?>/assets/images/titlebg.png" alt="" class="img-fluid d-block mx-auto mb-5">
   				<?php if(function_exists('show_partners')){ echo show_partners(); } ?>
   			</div>
   		</div>
	  
<?php get_footer();
