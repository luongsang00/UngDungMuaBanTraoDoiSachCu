<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="{path}/public/css/style.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

 <meta property="og:url"           content="{path}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="HQBook Trang Web Thương Mại Điện Tử Bán Sách Lớn Nhất Thế Giới" />
  <meta property="og:description"   content="HQBook Trang Web Thương Mại Điện Tử Bán Sách Lớn Nhất Thế Giới" />
  <meta property="og:image"         content="{path}public/img/logo.png" />
    <title>{block name='title'}
       <!-- top banner head 1-->
    
    {/block}</title>
  </head>

  <div class="top-banner-block">
                        <p><img src="{path}public/img/banner-top.jpg" alt=""/></p>
    </div>


    <!-- header 2 -->
    <div class="container">
        <div class="row">
            <div class=" col-lg-5 col-md-5 col-sm-12 col-xs-12 header-left hidden-xs">
              <ul class="nav ">
                <li class="nav-item disabled">
                  <a class="nav-link" >info@HQBook.com &nbsp &nbsp | &nbsp  &nbsp 0399066199</a>
                </li> 
              </ul>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 header-right hidden-xs">
                <ul class="nav header-right">
                    <li class="nav-item ">
                        {if !isset($smarty.session.fullname)}
                            <a href="{$path}tao-tai-khoan/" class="nav-link" >Tạo tài khoản</a>
                        {/if}  
                      
                    </li> 
                    <li class="nav-item ">
                        {if isset($smarty.session.fullname)}
                            <a href="{$path}thong-tin-user" class="nav-link">Xin Chào {$smarty.session.fullname}</a>
                            {elseif !isset($smarty.session.fullname)}
                            <a href="{path}dang-nhap" class="nav-link" >Đăng Nhập</a>
                        {/if}        
                    </li> 
                    <li class="nav-item ">
                      <a href="{path}lien-he/" class="nav-link" >Liên Hệ</a>
                    </li> 
                </ul>
            </div>
        </div>
    </div>   


        <!-- header 3     -->
    <div class="container">
        <div class="row">
            <!-- logo -->
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 logo">
                 <a href="{path}" title="HQbook.COM" class="logo"><img src="{path}public/img/logo.png" alt="HQBook.COM"></a>                        
            </div>
            <!-- search -->
            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 no-padding">
                <nav class="navbar navbar-expand-sm navbar-dark">

                  <form class="form-inline" action="search" method="get">
                    <input name="tim_kiem" id="tim_kiem" class="form-control search_box" type="text" placeholder="Tìm kiếm sản phẩm mong muốn...">
                    <button style="margin-left: -54px" type="submit" class="btn btn-warning tim">Tìm</button>
                  </form>
                </nav>
            </div>

            <!-- gio hang -->
            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 no-padding">
                <a href="{path}gio-hang">
                    <div class="shopping-cart-icon">
                        <span class="hidden"></span>
                   </div>                
                    <div class="cart-total">
                        <h3>Giỏ Hàng  </h3>                        
                    </div> 
                </a>                   
            </div>
        </div>
    </div>
  <body style="background-color: #f0f0f0">

    {block name='content'}{/block}
  <footer>
      <!-- footer -->
    <div class="container ">
        <div class="row footer">
            <div class="col-lg-3 col-sm-3 col-md-6 col-xs-12">
                <div class="footer-static-title">
                    <h3>DỊCH VỤ</h3>
                </div>
                <div class="footer-static-content">
                    <ul>
                        <li class="first"><a href="#">Điều khoản sử dụng</a></li>
                        <li><a href="#">Chính sách bảo mật</a></li>
                        <li><a href="#">Giới thiệu Fahasa</a></li>
                        <li class="last"><a href="#">Hệ thống trung tâm</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-6 col-xs-12">
                <div class="footer-static-title">
                    <h3>Hỗ trợ</h3>
                </div>
                <div class="footer-static-content ">
                    <ul>
                    <li class="first"><a href="#">Chính sách đổi - trả</a></li>
                    <li><a href="#">Chính sách khách sỉ</a></li>
                    <li><a href="#">Phương thức vận chuyển</a></li>
                    <li class="last"><a href="https://www.fahasa.com/huong-dan-thanh-toan">Phương thức thanh toán</a></li>
                    </ul>
                 </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-6 col-xs-12">
                <div class="footer-static-title">
                    <h3>Tài khoản của tôi</h3>
                </div>
                <div class="footer-static-content">
                    <ul>
                        <li class="first"><a href="{path}dang-nhap" onclick="return false;">Đăng nhập/Tạo tài khoản</a></li>
                        <li><a href="#">Thay đổi địa chỉ khách hàng</a></li>
                        <li><a href="#">Chi tiết tài khoản</a></li>
                        <li class="last"><a href="#">Lịch sử mua hàng</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-6 col-xs-12">
                <div class="footer-static-title">
                    <h3>Liên hệ</h3>
                </div>
                <div class="footer-static-content">
                    <ul>
                        <li class="first"><em class="fa fa-map-marker">&nbsp;</em><a href="#">60-62 Lê Lợi, Q.1, TP. HCM </a></li>
                        <li><em class="fa fa-envelope">&nbsp;</em><a href="#">info@hqbook.com</a></li>
                        <li class="last"><em class="fa fa-phone">&nbsp;</em><a href="#">0399066199</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
                <div class="col-lg-4 col-sm-4 col-md-4">
                    <div class="col-sm-12 col-md-12 col-xs-12 icon-footer" style="margin-bottom: 8px;"><img alt="HQbook.COM" src="{path}public/img/logo.png">
                    </div>
                    <div class="col-sm-12 col-md-12 col-xs-12 address-footer" style="font-size:13px;">Lầu 7, 387-389 Hai Bà Trưng Quận 3 TP HCM
                    </div>
                    <div class="col-sm-12 col-md-12 col-xs-12 address-footer" style="font-size:13px;">Công Ty Cổ Phần Phát Hành Sách TP HCM - HQBOOK
                    </div>
                    <div class="col-sm-12 col-md-12 col-xs-12 address-footer" style="font-size:13px;">60 - 62 Lê Lợi, Quận 1, TP. HCM, Việt Nam
                    </div>
                    <div class="col-sm-12 col-md-12 col-xs-12 address-footer" style="font-size:13px; padding-top: 5px;">HQbook.com nhận đặt hàng trực tuyến và giao hàng tận nơi. KHÔNG hỗ trợ đặt mua và nhận hàng trực tiếp tại văn phòng cũng như tất cả Hệ Thống HQbook trên toàn quốc.
                    </div>
                    <div v class="col-sm-12 col-md-12 col-xs-12 address-footer" style="margin-top: 5px;">
                        <a target="_blank" href="http://online.gov.vn/CustomWebsiteDisplay.aspx?DocId=19176">
                        <img src="{path}public/img/logo-bo-cong-thuong-da-thong-bao.png" style="width: 100px;">
                        </a> 
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4">
                    <div class="col-sm-12 col-md-12 col-xs-12" align="center" style="font-size:14.5px; margin-bottom:20px; margin-top:10px; padding: 0px;">
                        <a target="_blank" href="https://www.facebook.com/fahasa/" title="Facebook">
                            <img alt="Facebook" src="https://www.fahasa.com/skin/frontend/ma_vanese/fahasa/images/footer/Facebook-on.png">
                        </a>
                        <a target="_blank" href="https://www.instagram.com/fahasa_official/" title="Instagram">
                            <img alt="Instagram" src="https://www.fahasa.com/skin/frontend/ma_vanese/fahasa/images//footer/Insta-on.png">
                        </a>
                        <a target="_blank" href="https://www.youtube.com/channel/UCUZcVOLSxK1q6RfgzQ9-HYQ" title="Youtube">
                            <img alt="Youtube" src="https://www.fahasa.com/skin/frontend/ma_vanese/fahasa/images//footer/Youtube-on.png">
                        </a>
                        <a target="_blank" href="https://fahasa-blog.tumblr.com/" title="Tumblr">
                            <img alt="Tumblr" src="https://www.fahasa.com/skin/frontend/ma_vanese/fahasa/images//footer/tumblr-on.png">
                        </a>
                        <a target="_blank" href="https://twitter.com/Fahasa_com" title="Twitter">
                            <img alt="Twitter" src="https://www.fahasa.com/skin/frontend/ma_vanese/fahasa/images//footer/twitter-on.png">
                        </a>
                        <a target="_blank" href="https://www.pinterest.com/fahasaVN/" title="Pinterest">
                            <img alt="Pinterest" src="https://www.fahasa.com/skin/frontend/ma_vanese/fahasa/images//footer/pinterest-on.png">
                        </a>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" align="center" style="font-size:14.5px">
                        <a href="https://play.google.com/store/apps/details?id=com.fahasa.android.fahasa">
                            <img alt="FAHASA.COM" src="https://www.fahasa.com/media/wysiwyg/Logo-NCC/android.png" style="max-width: 110px;">
                        </a>
                        <a href="https://itunes.apple.com/app/id1227597830?mt=8">
                            <img alt="FAHASA.COM" src="https://www.fahasa.com/media/wysiwyg/Logo-NCC/appstore.png" style="max-width: 110px;">
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-4 col-md-4 ">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 footer-end"   >
                        <a target="_blank" href="https://www.ninjavan.co/vn-vn/">
                            <img src="https://www.fahasa.com/media/wysiwyg/Logo-NCC/Ninja-1.png">
                        </a>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 footer-end">
                        <a target="_blank" href="http://speedlink.vn/">
                            <img src="https://www.fahasa.com/media/wysiwyg/Logo-NCC/Speedlink-1.png" alt="">
                        </a>
                    </div>
                    <div class="col-lg-12  col-sm-12 col-md-12 col-xs-12 footer-end" >
                        <a target="_blank" href="https://kerryexpress.com.vn/">
                            <img src="https://www.fahasa.com/media/wysiwyg/huongdan/logo-Kerry-172x40.png">
                        </a>
                    </div>
                </div>

            </div>              
      </div>
    </div>
  </footer>
   
    {block name='script'}{/block}

  </body>
</html>