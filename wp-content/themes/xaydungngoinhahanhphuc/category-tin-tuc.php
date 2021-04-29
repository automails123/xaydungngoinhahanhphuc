<?php
	get_header();   
	$Catalog = get_category( get_query_var( 'cat' ) );
  	$nameCatalog = $Catalog->slug;
?>
	<div class="banner-g banner-contactn d-flex align-items-center">
	  <div class="container py-3 z-index-10 text-center">
	    <h2 class="text-uppercase title-page mb-3"><?php echo $Catalog->name; ?></h2>
	    <div class="wrap-crumbs w-100"><?php if(function_exists('breadcrumb')){breadcrumb();} ?></div>
	  </div>
	  
	  <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/bg_news.jpg" class="mx-auto d-block img-fluid" alt="<?php echo get_bloginfo( 'name' ); ?>">
	</div>
  	<div class="container py-5"> 
  		<div class="d-flex justify-content-center align-items-center"><h3 class="title-item mb-4 pb-4 text-capitalize">Tin tức và sự kiện</h3></div>
	  	<?php 
	  		echo catalog_grid($nameCatalog); 
            echo panigation();
		?>
  	</div>
<?php get_footer();
