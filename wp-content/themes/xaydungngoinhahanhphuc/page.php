<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<div class="banner-g bn-page d-flex align-items-center">
  <div class="container py-3 z-index-10 text-center"><h2 class="text-uppercase title-page mb-2 mb-lg-3"><?php echo get_the_title(); ?></h2>
    <div class="wrap-crumbs"><div class="container py-3"><?php if(function_exists('breadcrumb')){breadcrumb();} ?></div></div>
  </div>  
  <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/bg-blog.jpg" class="mx-auto d-block img-fluid" alt="<?php echo get_bloginfo( 'name' ); ?>">
</div>
<div class="area-page py-4 py-md-5">
	<div class="container">	
		<div class="row">
    		<div class="col-12">
    			<div class="d-flex justify-content-center align-items-center"><h3 class="title-item mb-4 pb-4">Giới thiệu về công ty</h3></div>
    			<div class="row align-items-center mb-4">
    				<div class="col-md-6 mb-3 mb-md-0">
    					<p>Công Ty Tnhh Tư Vấn Thiết Kế Xây Dựng Dịch Vụ Bất Động Sản <strong>NGÔI NHÀ HẠNH PHÚC</strong> được thành lập vào ngày 08 tháng 06 năm 2016 theo Giấy chứng nhận đăng ký kinh doanh số 0313849232 do Sở Kế hoạch - Đầu tư Tp. HCM cấp.</p>
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
    				</div>
    				<div class="col-md-6">gioithieu_1</div>
    			</div>
    			<div class="row align-items-center mb-4 bg-even py-4">
    				<div class="col-md-6 mb-3 mb-md-0">gioithieu_2</div>
    				<div class="col-md-6 "><h3 class="mb-3">Chúng tôi sở hữu những thương hiệu rất mạnh và những giải pháp tốt.</h3>
    					<p>NGÔI NHÀ HẠNH PHÚC là một nhà cung cấp hàng đầu về các giải pháp công nghệ tiên tiến, đặc biệt trong ngành xây dựng, nội thất, thiết bị vệ sinh cao cấp.</p>
    					<p>Các thương hiệu nổi tiếng của chúng tôi đang có mặt trên thị trường được nhiều cá nhân, doanh nghiệp tin dùng. Chúng tôi làm tốt hơn và đạt được kết quả cao hơn tất cả các thương hiệu khác là nhờ vào chất lượng sản phẩm thượng đỉnh, giải pháp thiết thực, dịch vụ và hỗ trợ tận tình, chuyên nghiệp.</p>
    				</div>    				
    			</div>
    			<div class="row align-items-center mb-4">
    				<div class="col-md-6 mb-3 mb-md-0">
    					<h3 class="mb-3">Chúng tôi luôn là sự lựa chọn đầu tiên cho các giải pháp công nghệ tiết kiệm về chi phí nhưng đảm bảo về chất lượng.</h3>
    					<p>Chúng tôi trao quyền cho các nhà phân phối, nhà bán lẻ, trường đại học, bệnh viện, hãng hàng không, khách sạn, doanh nghiệp, tập đoàn và các tổ chức chính phủ gây ấn tượng với khách hàng, sinh viên, bệnh nhân và khách viếng thăm của họ với hệ thống giải pháp chất lượng cao và được kiểm chứng.</p>
    					
    				</div>
    				<div class="col-md-6">gioithieu_1</div>
    			</div>


				<?php if ( have_posts() ) : 
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/page/content', 'page' );
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile; // End of the loop.			
				endif; ?>	


			</div>
		    		
	</div>
</div>
<?php get_footer();
