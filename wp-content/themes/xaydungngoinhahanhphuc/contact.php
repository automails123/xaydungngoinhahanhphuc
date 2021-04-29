<?php

/*Template Name: Contact Layout*/
get_header();  
?>

<div class="contact-form pt-4 pt-md-5">
  <div class="container">
    <h1 class="text-uppercase title-item mb-5 pb-4 text-center"><?php echo the_title(); ?></h1>
    <div class="row justify-content-center mb-4 mb-md-5">
      <div class="col-lg-10"><p class="text-center"><strong>Quý khách vui lòng điền thông tin vào mẫu bên dưới và gửi những góp ý, thắc mắc cho <?php echo get_bloginfo( 'name' ); ?>, chúng tôi sẽ phản hồi email của Quý Khách trong thời gian sớm nhất.</strong></p></div>
    </div>    
    <div class="row">
      <div class="col-md-6 order-sm-1 mb-5">
        <div class="wrap-form-contact bg-even px-4 py-3">
          <?php echo contactForm(); ?>                  
        </div>
      </div>
      <div class="col-md-6 mb-5">
        <div class="pr-md-5 h-100">
          <div class="py-3 px-3 px-lg-5 h-100 border rounded">
            <!-- <h3 class="text-uppercase mb-3 mb-md-5 position-relative">Thông tin</h3> -->
            <a href="<?php bloginfo('url'); ?>" title="<?php echo get_bloginfo( 'name' ); ?>"><img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" class="img-fluid d-block mb-4 mx-auto" alt="<?php bloginfo('description'); ?>"></a>
            <strong class="mb-4 text-uppercase d-block name-contact"><?php echo get_bloginfo( 'name' ); ?></strong>
            <ul class="address list-unstyled mb-4">
              <?php if(get_option('address_company') !='') {echo'<li class="address-icon">'.get_option('address_company').'</li>';}?>
              <?php if(get_option('phone_company') !='') {echo'<li class="hotline-icon">'.get_option('phone_company').'</li>';}?>
              <?php if(get_option('taxcode') !='') {echo'<li class="taxcode-icon">'.get_option('taxcode').'</li>';}?>              
              <?php if(get_option('fax_company') !='') {echo'<li class="fax-icon">'.get_option('fax_company').'</li>';}?>
              <?php if(get_option('mail_company') !='') {echo'<li class="mail-icon">'.get_option('mail_company').'</li>';}?>
              <?php $surl = get_bloginfo('url'); ?>
              <?php if($surl) {echo'<li class="website-icon">'.str_replace('https://', 'www.', $surl).'</li>';} ?>
            </ul>
            <!-- <ul class="list-unstyled social-icon d-flex align-items-center flex-wrap">
              <li class="pr-4 text-center"><a href="<?php echo get_option('facebook');?>" class="d-block" target="_blank" title="Facebook Martoyo"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li class="pr-4 text-center"><a href="<?php echo get_option('twitter');?>" class="d-block" target="_blank" title="Twitter Martoyo"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li class="text-center"><a href="<?php echo get_option('youtube');?>" class="d-block" target="_blank" title="Youtube Martoyo"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            </ul>  -->
          </div>
        </div>              
      </div>      
    </div>
    
  </div>
  <?php if(get_option('google_map') !='') { echo'<div class="map">'.get_option('google_map').'</div>';}?>
  
</div>
<?php 
  get_footer();
  echo "<script src='https://www.google.com/recaptcha/api.js' async defer></script>";
?>

