<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="Shortcut Icon" href="<?php echo get_template_directory_uri();?>/assets/images/favicon.ico" type="image/x-icon">
<meta name="description" content="<?php bloginfo('description'); ?>" />
<script src="<?php echo get_template_directory_uri();?>/assets/js/jquery.min.js"></script>
<?php wp_head();
  if (is_home() || is_front_page()) {?>
        <meta property="og:image" content="<?php echo get_template_directory_uri();?>/assets/images/banner_1.jpg"> 
    <?php } 
?>
</head>
<body <?php body_class(); ?>>
  <?php $unique_id = esc_attr( uniqid( 'search-form-' ) );  ?>
  <header id="header" class="header">
    <div class="header-top py-md-3">
      <div class="container">
        <h2 class="slogan text-uppercase my-2 text-center d-block d-md-none"><?php echo get_bloginfo( 'name' ); ?></h2>
        <div class="row align-items-center mb-3 mb-md-0">
          <div class="col-3 d-md-none">
            <button class="navbar-toggler btn-m d-block d-md-none rounded-0" type="button" data-toggle="collapse" data-target="#menu-primary" aria-controls="menu-primary" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span>
            </button>
          </div>
          <div class="col-6 col-md-3">
            <h1 class="logo mx-auto my-0 m-lg-0"><span class="text-logo"><?php bloginfo('description'); ?></span><a class="d-block wrap-logo" href="<?php bloginfo('url'); ?>" title="<?php echo get_bloginfo( 'name' ); ?>"><img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" class="img-fluid d-block" alt="<?php echo get_bloginfo( 'name' ); ?>"></a></h1>
          </div>
          <div class="col-3 col-md-9">
            <h2 class="slogan text-uppercase mt-0 mb-4 text-center d-none d-md-block"><?php echo get_bloginfo( 'name' ); ?></h2>
            <div class="search-area  p-lg-0 mb-0 ml-md-auto d-none d-md-block">
              <form class="inner-search position-relative" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">  
                <input id="<?php echo $unique_id; ?>" type="search"  class="search-field input-searchbox rounded pl-2 " placeholder="<?php echo esc_attr_x( 'Tìm kiếm …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s">
                <button class="btn btn-searchbox py-0" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>"><i class="fa fa-search" aria-hidden="true"></i></button>
              </form>                    
            </div> 
            <div class="d-none d-md-flex justify-content-between">
              <?php if(get_option('phone_company') !='') {
                echo '<div class="media contact-head align-items-center">  
                  <img class="img-fluid" src="'.get_template_directory_uri().'/assets/images/hotline.png" alt="Hotline">
                  <div class="media-body text-left ml-2">'.get_option('phone_company').'</div>
                </div>';
              }?>
              <?php if(get_option('mail_company') !='') {
                echo '<div class="media contact-head ml-3 ml-lg-3 align-items-center">  
                  <img class="img-fluid" src="'.get_template_directory_uri().'/assets/images/mail.png" alt="Email">
                  <div class="media-body text-left ml-2 break-word">'.get_option('mail_company').'</div>
                </div>';
              }?>
              <?php if(get_option('address_company') !='') {
                echo '<div class="media contact-head head-location ml-3 ml-lg-3 align-items-center">  
                  <img class="img-fluid" src="'.get_template_directory_uri().'/assets/images/location.png" alt="Địa chỉ">
                  <div class="media-body text-left ml-2">'.get_option('address_company').'</div>
                </div>';
              }?>
            </div> 
            <div class="d-flex align-items-center justify-content-center d-md-none wrap-search-m ml-auto">
              <i class="fa fa-search" aria-hidden="true"></i>
            </div>           
          </div>          
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-md p-0">
      <div class="container">
          <div id="menu-primary" class="navbar-collapse collapse p-3 p-md-0">   
            <div class="d-flex flex-wrap align-items-center flex-column flex-md-row">       
              <?php if ( has_nav_menu( 'top' ) ) : ?>               
                <?php wp_nav_menu( array(
                  'theme_location' => 'top',
                  'menu_id'        => 'top-menu',
                  'menu_class' => 'navbar-nav justify-content-center',
                ) ); ?>          
              <?php endif; ?> 
              
            </div>
          </div>
      </div>
    </nav>
    <div class="search-area search-m p-3 p-lg-0 mb-0 ml-md-auto">
      <form class="inner-search position-relative mx-auto bg-white rounded" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">  
        <input id="<?php echo $unique_id; ?>" type="search"  class="search-field input-searchbox rounded pl-2 w-100" placeholder="<?php echo esc_attr_x( 'Tìm kiếm …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s">
        <button class="btn btn-searchbox py-0" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>"><i class="fa fa-lg fa-search" aria-hidden="true"></i></button>
      </form>                    
    </div> 
  </header><!-- /header -->
  <main class="main">


