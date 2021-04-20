</main>
<footer class="footer pt-5">
  <div class="inner-footer">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-7 text-left">
          <div class="logo-footer">
            <a href="<?php bloginfo('url'); ?>" title="<?php echo get_bloginfo( 'name' ); ?>"><img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" class="img-fluid d-block mb-4" alt="<?php bloginfo('description'); ?>"></a>
          </div>
          <h2 class="mb-3 text-uppercase"><?php echo get_bloginfo( 'name' ); ?></h2>          
        </div> 
        <div class="col-12 col-md-5"><div class="wrap-fb text-md-right"><iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo get_option('facebook');?>&tabs=timeline&width=340&height=130&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=false&appId=215651349123280" width="340" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></div>
      </div>       
      </div>
      <div class="slogan"><i><?php bloginfo('description'); ?></i></div>
      <div class="line my-4 my-md-5"></div>
      <div class="row mb-2">
        <div class="col-12 col-md-4">
          <h3 class="text-uppercase"><span class="pb-2">Thông tin liên hệ</span></h3>       
          <ul class="address list-unstyled">
            <?php if(get_option('address_company') !='') {echo'<li class="address-icon">'.get_option('address_company').'</li>';}?>
            <?php if(get_option('phone_company') !='') {echo'<li class="hotline-icon">'.get_option('phone_company').'</li>';}?>
            <?php if(get_option('fax_company') !='') {echo'<li class="fax-icon">'.get_option('fax_company').'</li>';}?>
            <?php if(get_option('taxcode') !='') {echo'<li class="taxcode-icon">'.get_option('taxcode').'</li>';}?>            
            <?php if(get_option('mail_company') !='') {echo'<li class="mail-icon">'.get_option('mail_company').'</li>';}?>
            <?php $surl = get_bloginfo('url'); ?>
            <?php if($surl) {echo'<li class="website-icon">'.str_replace('https://', 'www.', $surl).'</li>';} ?>
          </ul>
          <!-- <ul class="list-unstyled social-icon d-flex align-items-center flex-wrap">
            <li class="pr-3 text-center"><a href="<?php echo get_option('facebook');?>" class="d-block" target="_blank" title="Facebook Martoyo"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li class="pr-3 text-center"><a href="<?php echo get_option('twitter');?>" class="d-block" target="_blank" title="Twitter Martoyo"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li class="text-center"><a href="<?php echo get_option('youtube');?>" class="d-block" target="_blank" title="Youtube Martoyo"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
          </ul>  -->
        </div>
        <div class="col-12 col-md-4">
          <h3 class="text-uppercase"><span class="pb-2">Site map</span></h3>
          <div class="row">
            <div class="col-6"> 
                <ul class="list-unstyled list-i">
                 <li class="mb-3"><a href="<?php bloginfo('url'); ?>/gioi-thieu" title="Giới thiệu">Giới thiệu</a></li>
                 <li class="mb-3"><a href="<?php bloginfo('url'); ?>/lien-he" title="Liên hệ">Liên hệ</a></li>
                 <li class="mb-3"><a href="<?php bloginfo('url'); ?>/tuyen-dung/" title="Tuyển dụng">Tuyển dụng</a></li>
                 <li><a href="<?php bloginfo('url'); ?>/tin-tuc/" title="Tin tức & sự kiện">Tin tức & sự kiện</a></li>
                </ul>
             </div>
             <div class="col-6">
               <ul class="list-unstyled list-i">
                 <li class="mb-3"><a href="<?php bloginfo('url'); ?>/linh-vuc-hoat-dong" title="Lĩnh vực hoạt động">Lĩnh vực hoạt động</a></li>
                 <li class="mb-3"><a href="https://batdongsanland.com.vn/" title="Mua bán BĐS">Mua bán BĐS</a></li>
                 <li class="mb-3"><a href="<?php bloginfo('url'); ?>/du-an" title="Dự án đã thi công">Dự án đã thi công</a></li>
                 <li><a href="<?php bloginfo('url'); ?>/doi-tac" title="Đối tác">Đối tác</a></li>
                </ul>
             </div>
          </div>         
        </div>
        <div class="col-12 col-md-4 mb-md-0">
          <h3 class="text-uppercase"><span class="pb-2">Đăng ký bản tin</span></h3>
            <?php echo newsLetter(); ?>
        </div>
      </div>
    </div>
    <div class="footer-b py-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-md-6 order-md-1 mb-3 mb-md-0 text-center text-md-right"><a href="https://batdongsanland.com.vn/" title="batdongsanland"><img src="<?php echo get_template_directory_uri();?>/assets/images/logo_batdongsanland.png" alt="" class="img-fluid"></a></div>         
          <div class="col-12 col-md-6">
            Copyright © 2021 XAYDUNGNGOINHAHANHPHUC. All rights reserved.
          </div> 
        </div>  
      </div>
    </div>      
  </div>
</footer>

<div class="wrap-action d-flex flex-md-column justify-content-between">
  <?php if(get_option('phone_company') !='') {echo '<a target="_blank" href="tel:'.str_replace(' ','',get_option('phone_company')).'" title="Gọi tới Chúng tôi '.get_option('phone_company').'" class="tooltip-r icon-phone"><span>Gọi tới Chúng tôi '.get_option('phone_company').'</span></a>'; } ?>
  <?php if(get_option('zalo') !='') {
    echo '<a target="_blank" href="'.get_option('zalo').'" title="Chat với Chúng tôi qua Zalo" class="tooltip-r icon-zalo"><span>Chat với Chúng tôi qua Zalo</span></a>'; } ?>
  <?php if(get_option('facebook') !='') { $shopfb =  str_replace( 'https://www.facebook.com/', '', get_option('facebook') );    
    echo '<a target="_blank" href="https://www.messenger.com/t/'.$shopfb.'" title="Chat với Chúng tôi qua Facebook Messenger" class="tooltip-r icon-fb"><span>Chat với Chúng tôi qua Facebook Messenger</span></a>'; } ?>
  <a id="totop" class="totop tooltip-r active" href="#" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
</div>
<script src="<?php echo get_template_directory_uri();?>/assets/js/script.js"></script>
<script>
  $("#subscribe-form").on("click","#btn-subscribe",function(){
    var email_sub = $('#subscribe-form .mail_subscribe').val();
    $(".new-letter .error-sub-mail").text('');
    $(".new-letter .success-sub-mail").remove();    
    if(email_sub != 0){
      if(isValidEmailAddress(email_sub)){
        $.ajax({
            type : "post", //Phương thức truyền post hoặc get
            dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
            url : '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
            data : {
                action: "thongbao", //Tên action
                email_sub : email_sub,//Biến truyền vào xử lý. $_POST['website']
            },
            context: this,
            success: function(response) {
              if(response.success) {
                  window.alert('Thank you for subscribing.');
                }                   
                else {
                  $(".new-letter .error-sub-mail").text('Email existed!');
                }
            },
            error: function( jqXHR, textStatus, errorThrown ){
            console.log( 'The following error occured: ' + textStatus, errorThrown );
            }
        })
      } else {
        $(".new-letter .error-sub-mail").text('Email is invalid!.');
      }
    } else {
      $(".new-letter .error-sub-mail").text('Email is invalid!.');
    }    
    return false;  
  });
  function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
  }
</script>


  <?php wp_footer(); ?>
</body>
</html>