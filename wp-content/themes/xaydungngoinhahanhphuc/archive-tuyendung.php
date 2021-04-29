<?php
	get_header();   
	$Catalog = get_queried_object(); 
?>
	<div class="banner-g bn-tuyendung d-flex align-items-center">
	  <div class="container py-3 z-index-10 text-center"><h2 class="text-uppercase title-page mb-2 mb-lg-3"><?php echo $Catalog->label; ?></h2>
	    <div class="wrap-crumbs w-100"><div id="crumbs" class="list-crumb"><i class="fa fa-home mr-1" aria-hidden="true"></i><a title="Trang chủ" class="home" href="<?php bloginfo('url'); ?>">Trang chủ</a> <i class="fa fa-angle-double-right mx-1"></i> <span class="current"><?php echo $Catalog->label; ?></span></div></div>
	  </div>  
	  <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/bg_tuyendung.jpg" class="mx-auto d-block img-fluid" alt="<?php echo get_bloginfo( 'name' ); ?>">
	</div>

	<div class="py-5 tax-tuyendung">
	  	<div class="container">
	  		<div class="d-flex justify-content-center align-items-center mb-3"><h3 class="title-item mb-4 pb-4">Xây Dựng Ngôi Nhà Hạnh Phúc đang tuyển dụng</h3></div>	  		
	  		<div class="grid-item">
		  		<?php 
					$post_tuyendung = new WP_Query(array(
				      'post_type' => 'tuyendung',
				      'post_status' => 'publish',
				      'posts_per_page' => -1,          
				    ));
				    if($post_tuyendung->have_posts()) {
				    	echo '<table class="table tbl-tdung"><thead><tr>
			  						<th class="text-nowrap text-uppercase align-middle">Tên công việc</th>
			  						<th class="text-nowrap text-uppercase text-center align-middle">Số lượng nhân viên</th>
			  						<th class="text-nowrap text-uppercase text-center align-middle">Địa chỉ</th>
			  						<th class="text-nowrap text-uppercase text-center align-middle">Ngày đăng</th>
			  					</tr></thead><tbody>';
				      	while ($post_tuyendung->have_posts()) {
					        $post_tuyendung->the_post(); 
					        $postid = get_the_ID(); 
							$soluong = get_post_meta($postid, 'soluong', true);
							$diachi_lamviec = get_post_meta($postid, 'diachi_lamviec', true); 
							
							if($diachi_lamviec == '') {
								if(get_option('address_company') !='') {
									$diachi_lamviec = get_option('address_company');
								}
							}
					        echo '<tr>
	  						<td class="w-25 align-middle"><a class="d-block" href="' . get_the_permalink() . '" title="' . get_the_title() .'" ><strong class="pr-2 text-uppercase">' .get_the_title() .'</strong><span class="detail-view text-nowrap">Xem chi tiết<i class="ml-1 fa fa-angle-double-right" aria-hidden="true"></i></span></a></td>
	  						<td class="text-center align-middle"><strong>'.$soluong.'</strong></td>
	  						<td class="align-middle col-address">'.$diachi_lamviec.'</td>
	  						<td class="text-nowrap align-middle">'.get_the_date( 'l, ' ).''.get_the_date('d/m/Y').'</td>
	  					</tr>';
					     			        	
				      	} 
				      	echo '</tbody></table>';
				    }  
				    wp_reset_postdata();  
				?>
			</div>
	  	</div>
	</div>

<?php get_footer();
