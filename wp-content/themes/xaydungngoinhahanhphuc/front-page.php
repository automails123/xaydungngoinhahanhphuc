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
  <div class="banner-home">
      <div data-slider>
        <div class="item"><img loading="lazy" class="img-fluid mx-auto d-block" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_banner_2.jpg" alt="Martoyo"></div>
        <div class="item"><img loading="lazy" class="img-fluid mx-auto d-block" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_banner_3.jpg" alt="Martoyo"></div>
        <div class="item"><img loading="lazy" class="img-fluid mx-auto d-block" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_banner_4.jpg" alt="Martoyo"></div>
        <div class="item"><img loading="lazy" class="img-fluid mx-auto d-block" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_banner_5.jpg" alt="Martoyo"></div>
        <div class="item"><img loading="lazy" class="img-fluid mx-auto d-block" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_banner_6.jpg" alt="Martoyo"></div>
      </div>
    </div> 
      <div class="about-home py-5">
       <div class="container py-md-5">
        <div class="row align-items-center">
          <div class="col-md-6 mb-5 mb-md-0 pb-4 pb-md-0">
            <h2 class="text-uppercase title-item item-line pb-2 mb-4">Về chúng tôi</h2>
            <p class="mb-4">Công ty TNHH (Thẩm Quyến) thiết bị điện chiếu sáng MARTOYO thành lập năm 2004, công ty TNHH thiết bị chiếu sáng MARTOYO Hong Kong chính thức đầu tư cơ sở sản xuất chuyên nghiệp tại Thẩm Quyến Trung Quốc , gọi tắt là MARTOYO. Vốn điều lệ của công ty là 10.000.000đồng, diện tích nhà xưởng hơn 5000m2 là một công ty lớn về thiết bị chiếu sáng trong ngoài nhà là một chỉnh thể nghiên cứu, thiết kế, sản xuất, bán hàng và phục vụ.</p>
            <a class="btn btn-read-more text-uppercase px-4 py-2" href="<?php bloginfo('url'); ?>/ve-chung-toi" title="Về chúng tôi">Xem thêm<span class="ml-2 d-inline-block align-middle">+</span></a>
          </div>
          <div class="col-md-6 text-center">
            <div class="p-md-4">
              <div class="d-inline-block wrap-videos position-relative">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/img_video.jpg" alt="Về chúng tôi Martoyo" loading="lazy" class="img-fluid">
              </div>
            </div>          
          </div>
        </div>
       </div>
      </div> 
      <div class="products-home bg-even py-5">
        <div class="container">
          <div class="d-flex justify-content-center align-items-center mb-5">
            <span class="double-line"></span>
              <h2 class="text-uppercase title-item m-0 px-2">Sản phẩm</h2>
            <span class="double-line"></span>
          </div>
          <div class="row">
            <div class="col-sm-4 col-md-3">
              <div class="products-home-left">
                <h3 class="text-capitalize mb-3 title-prod">Thiết bị xi mạ</h3>
                <ul class="nav nav-pills flex-column mb-4">
                      <li class="active"><a class="py-2 d-block" href="#pro-1" title="Máy chỉnh lưu">Máy chỉnh lưu</a></li>
                      <li><a class="py-2 d-block" href="#pro-1" title="Máy chỉnh lưu">Máy chỉnh lưu</a></li>
                      <li><a class="py-2 d-block" href="#pro-1" title="Máy chỉnh lưu">Máy chỉnh lưu</a></li>
                      <li><a class="py-2 d-block" href="#pro-1" title="Máy chỉnh lưu">Máy chỉnh lưu</a></li>
                    </ul>
                    <h3 class="text-capitalize mb-3 title-prod">Thiết bị xi mạ</h3>
                <ul class="nav nav-pills flex-column mb-4">
                      <li class="active"><a class="py-2 d-block" href="#pro-1" title="Máy chỉnh lưu">Máy chỉnh lưu</a></li>
                      <li><a class="py-2 d-block" href="#pro-1" title="Máy chỉnh lưu">Máy chỉnh lưu</a></li>
                      <li><a class="py-2 d-block" href="#pro-1" title="Máy chỉnh lưu">Máy chỉnh lưu</a></li>
                      <li><a class="py-2 d-block" href="#pro-1" title="Máy chỉnh lưu">Máy chỉnh lưu</a></li>
                    </ul>
                    <h3 class="text-capitalize mb-3 title-prod">Thiết bị xi mạ</h3>
                <ul class="nav nav-pills flex-column mb-4">
                      <li class="active"><a class="py-2 d-block" href="#pro-1" title="Máy chỉnh lưu">Máy chỉnh lưu</a></li>
                      <li><a class="py-2 d-block" href="#pro-1" title="Máy chỉnh lưu">Máy chỉnh lưu</a></li>
                      <li><a class="py-2 d-block" href="#pro-1" title="Máy chỉnh lưu">Máy chỉnh lưu</a></li>
                      <li><a class="py-2 d-block" href="#pro-1" title="Máy chỉnh lưu">Máy chỉnh lưu</a></li>
                    </ul>
              </div>
              
            </div>
            <div class="col-sm-8 col-md-9">
                  <div class="products-home-right">
                    <h3 class="text-capitalize mb-3 title-prod">Thiết bị xi mạ</h3>
                      <div class="row mb-4">
                          <div class="col-xs-6 col-sm-6 col-md-4">
                            <a class="d-block item-prod w-100 p-2 mb-4" href="#" title="">
                              <div class="d-table mb-3">
                                <div class="d-table-cell align-middle">
                                  <img src="http://localhost/martoyo.vn/wp-content/themes/martoyo/assets/images/img_video.jpg" class="img-fluid mx-auto d-block" alt="">
                                </div>
                              </div>
                              <h4 class="mb-0 text-center">Đèn Đường Năng Lượng Mặt Trời Hai Tường Gió</h4>
                            </a>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-4">
                            <a class="d-block item-prod w-100 p-2 mb-4" href="#" title="">
                              <div class="d-table mb-3">
                                <div class="d-table-cell align-middle">
                                  <img src="http://localhost/martoyo.vn/wp-content/themes/martoyo/assets/images/img_video.jpg" class="img-fluid mx-auto d-block" alt="">
                                </div>
                              </div>
                              <h4 class="mb-0 text-center">Đèn Đường Năng Lượng Mặt Trời Hai Tường Gió</h4>
                            </a>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-4">
                            <a class="d-block item-prod w-100 p-2 mb-4" href="#" title="">
                              <div class="d-table mb-3">
                                <div class="d-table-cell align-middle">
                                  <img src="http://localhost/martoyo.vn/wp-content/themes/martoyo/assets/images/img_video.jpg" class="img-fluid mx-auto d-block" alt="">
                                </div>
                              </div>
                              <h4 class="mb-0 text-center">Đèn Đường Năng Lượng Mặt Trời Hai Tường Gió</h4>
                            </a>
                          </div>
                          <div class="col-12 text-center">
                            <a class="btn btn-read-more text-capitalize px-3 py-1" href="<?php bloginfo('url'); ?>/ve-chung-toi" title="Về chúng tôi">Xem thêm<span class="ml-2 d-inline-block align-middle">+</span></a>
                          </div>
                      </div>
                      <h3 class="text-capitalize mb-3 title-prod">Thiết bị xi mạ</h3>
                      <div class="row mb-4">
                          <div class="col-xs-6 col-sm-6 col-md-4">
                            <a class="d-block item-prod w-100 p-2 mb-4" href="#" title="">
                              <div class="d-table mb-3">
                                <div class="d-table-cell align-middle">
                                  <img src="http://localhost/martoyo.vn/wp-content/themes/martoyo/assets/images/img_video.jpg" class="img-fluid mx-auto d-block" alt="">
                                </div>
                              </div>
                              <h4 class="mb-0 text-center">Đèn Đường Năng Lượng Mặt Trời Hai Tường Gió</h4>
                            </a>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-4">
                            <a class="d-block item-prod w-100 p-2 mb-4" href="#" title="">
                              <div class="d-table mb-3">
                                <div class="d-table-cell align-middle">
                                  <img src="http://localhost/martoyo.vn/wp-content/themes/martoyo/assets/images/img_video.jpg" class="img-fluid mx-auto d-block" alt="">
                                </div>
                              </div>
                              <h4 class="mb-0 text-center">Đèn Đường Năng Lượng Mặt Trời Hai Tường Gió</h4>
                            </a>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-4">
                            <a class="d-block item-prod w-100 p-2 mb-4" href="#" title="">
                              <div class="d-table mb-3">
                                <div class="d-table-cell align-middle">
                                  <img src="http://localhost/martoyo.vn/wp-content/themes/martoyo/assets/images/img_video.jpg" class="img-fluid mx-auto d-block" alt="">
                                </div>
                              </div>
                              <h4 class="mb-0 text-center">Đèn Đường Năng Lượng Mặt Trời Hai Tường Gió</h4>
                            </a>
                          </div>
                          <div class="col-12 text-center">
                            <a class="btn btn-read-more text-capitalize px-3 py-1" href="<?php bloginfo('url'); ?>/ve-chung-toi" title="Về chúng tôi">Xem thêm<span class="ml-2 d-inline-block align-middle">+</span></a>
                          </div>
                      </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
      <div class="project-home py-5">
        <div class="container">
          <div class="d-flex justify-content-center align-items-center mb-4">
            <span class="double-line"></span>
              <h2 class="text-uppercase title-item m-0 px-2">Dự án</h2>
            <span class="double-line"></span>
          </div>
          <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-4 my-3">
                    <div class="d-block item-proj w-100 position-relative overflow-hidden" href="#" title="">
                      <div class="d-table w-100">
                        <div class="d-table-cell align-middle">
                          <img src="http://localhost/martoyo.vn/wp-content/themes/martoyo/assets/images/img_video.jpg" class="img-fluid mx-auto h-100 d-block" alt="">
                          <div class="des px-3 py-3">
                            <div class="date pb-2 mb-4">Ngày 8 tháng 7 năm 2020</div>
                            <h4 class="mb-2 text-uppercase">Tòa nhà liên khu</h4>
                            <p class="mb-3">nội dung</p>
                            <a class="btn-detail text-capitalize d-inline-block" href="" title="Xem chi tiết">Xem chi tiết<span class="ml-2 d-inline-block align-middle">+</span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4 my-3">
                    <div class="d-block item-proj w-100 position-relative overflow-hidden" href="#" title="">
                      <div class="d-table w-100">
                        <div class="d-table-cell align-middle">
                          <img src="http://localhost/martoyo.vn/wp-content/themes/martoyo/assets/images/img_video.jpg" class="img-fluid mx-auto h-100 d-block" alt="">
                          <div class="des px-3 py-3">
                            <div class="date pb-2 mb-4">Ngày 8 tháng 7 năm 2020</div>
                            <h4 class="mb-2 text-uppercase">Tòa nhà liên khu</h4>
                            <p class="mb-3">nội dung</p>
                            <a class="btn-detail text-capitalize d-inline-block" href="" title="Xem chi tiết">Xem chi tiết<span class="ml-2 d-inline-block align-middle">+</span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4 my-3">
                    <div class="d-block item-proj w-100 position-relative overflow-hidden" href="#" title="">
                      <div class="d-table w-100">
                        <div class="d-table-cell align-middle">
                          <img src="http://localhost/martoyo.vn/wp-content/themes/martoyo/assets/images/img_video.jpg" class="img-fluid mx-auto h-100 d-block " alt="">
                          <div class="des px-3 py-3">
                            <div class="date pb-2 mb-4">Ngày 8 tháng 7 năm 2020</div>
                            <h4 class="mb-2 text-uppercase">Tòa nhà liên khu</h4>
                            <p class="mb-3">nội dung</p>
                            <a class="btn-detail text-capitalize d-inline-block" href="" title="Xem chi tiết">Xem chi tiết<span class="ml-2 d-inline-block align-middle">+</span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4 my-3">
                    <div class="d-block item-proj w-100 position-relative overflow-hidden" href="#" title="">
                      <div class="d-table w-100">
                        <div class="d-table-cell align-middle">
                          <img src="http://localhost/martoyo.vn/wp-content/themes/martoyo/assets/images/img_video.jpg" class="img-fluid mx-auto h-100 d-block" alt="">
                          <div class="des px-3 py-3">
                            <div class="date pb-2 mb-4">Ngày 8 tháng 7 năm 2020</div>
                            <h4 class="mb-2 text-uppercase">Tòa nhà liên khu</h4>
                            <p class="mb-3">nội dung</p>
                            <a class="btn-detail text-capitalize d-inline-block" href="" title="Xem chi tiết">Xem chi tiết<span class="ml-2 d-inline-block align-middle">+</span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="col-12 text-center">
                      <a class="btn btn-read-more text-capitalize px-4 py-2" href="<?php bloginfo('url'); ?>/ve-chung-toi" title="Về chúng tôi">Xem thêm dự án<span class="ml-2 d-inline-block align-middle">+</span></a>
                    </div>

                </div>
        </div>
      </div>
      <div class="partner py-5 bg-even">
        <div class="container">
          <div class="d-flex justify-content-center align-items-center mb-4">
            <span class="double-line"></span>
              <h2 class="text-uppercase title-item m-0 px-2">Đối tác</h2>
            <span class="double-line"></span>
          </div>
          <div data-partner>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_1.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_2.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_3.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_4.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_5.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_6.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_7.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_8.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_9.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_10.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_11.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_12.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_13.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_14.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_15.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_16.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_17.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_18.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_19.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>
            <div class="item p-2 p-md-3">
              <div class="d-table w-100 h-100">
                    <div class="d-table-cell align-middle">
                      <img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/images/martoyo_partner_20.jpg" class="img-fluid mx-auto d-block" alt="Martoyo Partener">
                    </div>
                  </div>
            </div>

          </div>
        </div>
      </div>
    
<?php get_footer();
