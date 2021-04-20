<?php
	get_header();   
	$Catalog = get_queried_object(); 
?>
	<div class="banner-g bn-duan d-flex align-items-center">
	  <div class="container py-3 z-index-10 text-center"><h2 class="text-uppercase title-page mb-2 mb-lg-3"><?php echo $Catalog->label; ?></h2>
	    <div class="wrap-crumbs w-100"><div id="crumbs" class="list-crumb"><i class="fa fa-home mr-1" aria-hidden="true"></i><a title="Trang chủ" class="home" href="<?php bloginfo('url'); ?>">Trang chủ</a> <i class="fa fa-angle-double-right mx-1"></i> <span class="current"><?php echo $Catalog->label; ?></span></div></div>
	  </div>  
	  <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/bg_duan.jpg" class="mx-auto d-block img-fluid" alt="<?php echo get_bloginfo( 'name' ); ?>">
	</div>

	<div class="py-5 tax-duan">
	  	<div class="container">
	  		<div class="d-flex justify-content-center align-items-center"><h3 class="title-item mb-4 pb-4">Dự Án Thi Công Xây Dựng Ngôi Nhà Hạnh Phúc</h3></div>
	  		<div class="row grid-item">
		  		<?php 
					$post_duan = new WP_Query(array(
				      'post_type' => 'duan',
				      'post_status' => 'publish',
				      'posts_per_page' => -1,          
				    ));
				    if($post_duan->have_posts()) {
				      	while ($post_duan->have_posts()) {
					        $post_duan->the_post(); 
					        echo '<div class="col-6 col-sm-6 col-md-4 my-3">
					          	<a class="post-media p-2 mb-3 d-block" href="' . get_the_permalink() . '" title="' . get_the_title() .'" ><div class="vertical-img">' .get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto d-block','alt' => get_the_title(), 'loading'=> 'lazy') ).'</div></a>
						        <div class="post-content">
						          <h3 class="text-capitalize title-item-post mb-0 text-center"><a href="' . get_the_permalink() . '" title="' . get_the_title() .'" >' .get_the_title() .'</a></h3>						          
						        </div></div>';				        	
				      	} 
				    }  
				    wp_reset_postdata();  
				?>
			</div>
	  	</div>
	</div>

<?php get_footer();
