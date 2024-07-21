<!-- slide -->
<div class="slideshow">
    <div class="slider">
        <?php
        $slider_list = $db->getRaw("SELECT * FROM images WHERE type = 'slider'");
        foreach ($slider_list as $item): ?>
        <div>
            <img style="width: 100%;" src="<?= ASSET . 'images/slider/' . $item['image'] ?>" alt="Image 4" />
        </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- main -->
<div id="main" class="wrap-main">
    <section id="criteria" class="d-none d-lg-block">
        <div class="maxwidth">
            <div class="slick-criteria">
                <div class="criteria-items">
                    <div>
                        <a>
                            <div class="criteria-items__img">
                                <img src="assets/images/page/location.png">
                            </div>
                            <div class="criteria-items__content">
                                <h3>Địa chỉ</h3>
                                <p>Tiệm sửa xe máy THÀNH ĐẠT tại quận Tân Phú, TP.HCM</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="criteria-items">
                    <div>
                        <a>
                            <div class="criteria-items__img">
                                <img src="assets/images/page/uytin.png">
                            </div>
                            <div class="criteria-items__content">
                                <h3>Uy tín</h3>
                                <p>Tiệm sửa xe máy THÀNH ĐẠT tại quận Tân Phú, TP.HCM</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="criteria-items">
                    <div>
                        <a>
                            <div class="criteria-items__img">
                                <img src="assets/images/page/nhanhnhen.png">
                            </div>
                            <div class="criteria-items__content">
                                <h3>Nhanh nhẹn</h3>
                                <p>Tiệm sửa xe máy THÀNH ĐẠT tại quận Tân Phú, TP.HCM</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="criteria-items">
                    <div>
                        <a>
                            <div class="criteria-items__img">
                                <img src="assets/images/page/launam.png">
                            </div>
                            <div class="criteria-items__content">
                                <h3>Lâu năm</h3>
                                <p>Tiệm sửa xe máy THÀNH ĐẠT tại quận Tân Phú, TP.HCM</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="gioithieu">
        <div class="maxwidth">
            <div class="row">
                <div class="col-md-6 col-sm-5" data-aos="fade-right" data-aos-easing="ease-in-out"
                    data-aos-duration="1000">
                    <div class="info-about">
                        <div class="title-about">
                            <p>Giới thiệu về</p>
                            <span>SỬA XE THÀNH ĐẠT</span>
                        </div>
                        <div class="desc-about">
                            <p>Tiệm sửa chữa xe máy Thành Đạt Với hơn 20 năm kinh nghiệm sửa chữa xe tay ga và xe số
                                của Honda,Yamaha,Suzuki,Sym,Piagio... Sửa xe Thành Đạt luôn đặt chất lượng và uy tín
                                lên hàng đầu .Đã từng trải qua những tiệm sửa xe lớn tại 108 PVH - Dầu Nhớt ĐP Với
                                tinh thần làm việc Uy Tín – Chất Lượng – Chế Độ BH Chu Đáo – Giá Cả Cạnh Tranh - Phù
                                hợp với tất cả mọi người. Tuyệt đối KHÔNG sử dụng phụ tùng cũ tái chế thành đồ mới,
                                đồ kém chất lượng làm ảnh hưởng đến uy tín tiệm. Với độ ngũ thợ sửa chuyên nghiệp có
                                kinh nghiệm đã được đào tạo bài bản trên nhiều loại xe,cùng với trang thiết bị
                                hiện...</p>
                        </div>
                        <div class="link-about">
                            <a href="gioi-thieu" class="link-more">Xem thêm <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-7" data-aos="fade-in" data-aos-easing="ease-in-out"
                    data-aos-duration="1000">
                    <article class="about-img">
                        <div class="about-flexbox">
                            <?php
                            $banner = $db->getRaw("SELECT * FROM images WHERE type = 'banner'");
                            ?>
                            <figure class="about-first">
                                <img src="assets/images/banner/<?= $banner[0]['image'] ?>" alt="">
                            </figure>
                            <figure class="about-last">
                                <img src="assets/images/banner/<?= $banner[1]['image'] ?>" alt="">
                            </figure>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <section id="service">
        <div class="maxwidth" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="800">
            <div class="title-main text-white">
                <img src="assets/images/page/space1.png" alt="SỬA XE THÀNH ĐẠT">
                <h2>DỊCH VỤ NỔI BẬT</h2>
                <p>SỬA XE CHUYÊN NGHIỆP</p>
            </div>
            <div class="relative hover-arrow">
                <div class="row row-10">
                    <div class="col-md-4 col-6 padding-10">
                        <a class="servicehome-normal text-decoration-none w-clear "
                            href="tan-trang-xe-may-cu-nhu-moi-su-lua-chon-hoan-hao-tai-sua-xe-thanh-dat"
                            title="Tân Trang Xe Máy Cũ Như Mới - Sự Lựa Chọn Hoàn Hảo tại SỬA XE THÀNH ĐẠT">
                            <p class="pic-servicehome-normal scale-img">
                                <img src="assets/images/page/tan-trang-xe-may-2-3860-3458.jpg" alt="SỬA XE THÀNH ĐẠT">
                            </p>
                            <div class="info-servicehome-normal">
                                <h3 class="name-servicehome text-split">Tân Trang Xe Máy Cũ Như Mới - Sự Lựa Chọn
                                    Hoàn Hảo tại SỬA XE THÀNH ĐẠT</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-6 padding-10">
                        <a class="servicehome-normal text-decoration-none w-clear "
                            href="tan-trang-xe-may-cu-nhu-moi-su-lua-chon-hoan-hao-tai-sua-xe-thanh-dat"
                            title="Tân Trang Xe Máy Cũ Như Mới - Sự Lựa Chọn Hoàn Hảo tại SỬA XE THÀNH ĐẠT">
                            <p class="pic-servicehome-normal scale-img">
                                <img src="assets/images/page/tan-trang-xe-may-2-3860-3458.jpg" alt="SỬA XE THÀNH ĐẠT">
                            </p>
                            <div class="info-servicehome-normal">
                                <h3 class="name-servicehome text-split">Tân Trang Xe Máy Cũ Như Mới - Sự Lựa Chọn
                                    Hoàn Hảo tại SỬA XE THÀNH ĐẠT</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-6 padding-10">
                        <a class="servicehome-normal text-decoration-none w-clear "
                            href="tan-trang-xe-may-cu-nhu-moi-su-lua-chon-hoan-hao-tai-sua-xe-thanh-dat"
                            title="Tân Trang Xe Máy Cũ Như Mới - Sự Lựa Chọn Hoàn Hảo tại SỬA XE THÀNH ĐẠT">
                            <p class="pic-servicehome-normal scale-img">
                                <img src="assets/images/page/tan-trang-xe-may-2-3860-3458.jpg" alt="SỬA XE THÀNH ĐẠT">
                            </p>
                            <div class="info-servicehome-normal">
                                <h3 class="name-servicehome text-split">Tân Trang Xe Máy Cũ Như Mới - Sự Lựa Chọn
                                    Hoàn Hảo tại SỬA XE THÀNH ĐẠT</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-6 padding-10">
                        <a class="servicehome-normal text-decoration-none w-clear "
                            href="tan-trang-xe-may-cu-nhu-moi-su-lua-chon-hoan-hao-tai-sua-xe-thanh-dat"
                            title="Tân Trang Xe Máy Cũ Như Mới - Sự Lựa Chọn Hoàn Hảo tại SỬA XE THÀNH ĐẠT">
                            <p class="pic-servicehome-normal scale-img">
                                <img src="assets/images/page/tan-trang-xe-may-2-3860-3458.jpg" alt="SỬA XE THÀNH ĐẠT">
                            </p>
                            <div class="info-servicehome-normal">
                                <h3 class="name-servicehome text-split">Tân Trang Xe Máy Cũ Như Mới - Sự Lựa Chọn
                                    Hoàn Hảo tại SỬA XE THÀNH ĐẠT</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-6 padding-10">
                        <a class="servicehome-normal text-decoration-none w-clear "
                            href="tan-trang-xe-may-cu-nhu-moi-su-lua-chon-hoan-hao-tai-sua-xe-thanh-dat"
                            title="Tân Trang Xe Máy Cũ Như Mới - Sự Lựa Chọn Hoàn Hảo tại SỬA XE THÀNH ĐẠT">
                            <p class="pic-servicehome-normal scale-img">
                                <img src="assets/images/page/tan-trang-xe-may-2-3860-3458.jpg" alt="SỬA XE THÀNH ĐẠT">
                            </p>
                            <div class="info-servicehome-normal">
                                <h3 class="name-servicehome text-split">Tân Trang Xe Máy Cũ Như Mới - Sự Lựa Chọn
                                    Hoàn Hảo tại SỬA XE THÀNH ĐẠT</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-6 padding-10">
                        <a class="servicehome-normal text-decoration-none w-clear "
                            href="tan-trang-xe-may-cu-nhu-moi-su-lua-chon-hoan-hao-tai-sua-xe-thanh-dat"
                            title="Tân Trang Xe Máy Cũ Như Mới - Sự Lựa Chọn Hoàn Hảo tại SỬA XE THÀNH ĐẠT">
                            <p class="pic-servicehome-normal scale-img">
                                <img src="assets/images/page/tan-trang-xe-may-2-3860-3458.jpg" alt="SỬA XE THÀNH ĐẠT">
                            </p>
                            <div class="info-servicehome-normal">
                                <h3 class="name-servicehome text-split">Tân Trang Xe Máy Cũ Như Mới - Sự Lựa Chọn
                                    Hoàn Hảo tại SỬA XE THÀNH ĐẠT</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="why">
        <div class="maxwidth">
            <div class="title-main text-white">
                <img src="assets/images/page/space1.png" alt="SỬA XE THÀNH ĐẠT">
                <h2>Ý KIẾN KHÁCH HÀNG</h2>
                <p>SỬA XE CHUYÊN NGHIỆP</p>
            </div>
            <div class="slick-why">
                <div class="why-item">
                    <div class="why-item_img">
                        <img src="assets/images/page/gaidep.jpg" alt="SỬA XE THÀNH ĐẠT">
                    </div>
                    <div class="why-item_text">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <h3>Mr.Long</h3>
                        <p>Rất hài lòng về dịch vụ sửa chữa tại đây, quy trình thăm khám xe rất bài bản, kĩ lưỡng
                            chuyên nghiệp.</p>
                    </div>
                </div>
                <div class="why-item">
                    <div class="why-item_img">
                        <img src="assets/images/page/gaidep.jpg" alt="SỬA XE THÀNH ĐẠT">
                    </div>
                    <div class="why-item_text">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <h3>Thiên Kim</h3>
                        <p>Chủ tiệm vui tính, hòa đồng, tận tâm tư vấn để lựa chọn phương án phù hợp và rẻ tiền
                            nhất.</p>
                    </div>
                </div>
                <div class="why-item">
                    <div class="why-item_img">
                        <img src="assets/images/page/gaidep.jpg" alt="SỬA XE THÀNH ĐẠT">
                    </div>
                    <div class="why-item_text">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <h3>Mr.Hà Lan</h3>
                        <p>Sửa nhanh, chuẩn, tốt và đặc biệt là chi phí rất phù hợp.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="video-news">
        <div class="maxwidth">
            <div class="title-main">
                <img src="assets/images/page/space2.png" alt="SỬA XE THÀNH ĐẠT">
                <h2>TIN TỨC & VIDEO</h2>
                <p>SỬA XE CHUYÊN NGHIỆP</p>
            </div>
            <div class="row">
                <div class="col-md-7 col-sm-12 col-12">
                    <div class="newshome-intro w-clear">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <a class="newshome-best text-decoration-none"
                                    href="tiem-sua-xe-thanh-dat-tuyen-dung-tho-sua-xe"
                                    title="TIỆM SỬA XE THÀNH ĐẠT TUYỂN DỤNG THỢ SỬA XE">
                                    <p class="pic-newshome-best scale-img"> <img src="assets/images/page/tuyendung.jpg"
                                            alt="SỬA XE THÀNH ĐẠT"></p>
                                    <div class="info-news-home">
                                        <div class="number_first_news">
                                            <p>08</p>
                                            <span>12</span>
                                        </div>
                                        <div class="text-news-home">
                                            <h3 class="name-newshome text-split">TIỆM SỬA XE THÀNH ĐẠT TUYỂN DỤNG
                                                THỢ SỬA XE</h3>
                                            <p class="desc-newshome text-split">TIỆM SỬA XE THÀNH ĐẠT TUYỂN DỤNG THỢ
                                                SỬA XE</p>
                                        </div>
                                    </div>

                                </a>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="newshome-scroll">
                                    <ul>
                                        <li>
                                            <a class="news text-decoration-none w-clear"
                                                href="tiem-sua-xe-thanh-dat-tuyen-dung-tho-sua-xe"
                                                title="TIỆM SỬA XE THÀNH ĐẠT TUYỂN DỤNG THỢ SỬA XE">
                                                <p class="pic-news scale-img">
                                                    <img src="assets/images/page/tuyendung.jpg" alt="SỬA XE THÀNH ĐẠT">
                                                </p>
                                                <div class="info-news">
                                                    <h3 class="name-news">TIỆM SỬA XE THÀNH ĐẠT TUYỂN DỤNG THỢ SỬA
                                                        XE</h3>
                                                    <div class="desc-news text-split">TIỆM SỬA XE THÀNH ĐẠT TUYỂN
                                                        DỤNG THỢ SỬA XE</div>
                                                </div>
                                            </a>
                                            <a class="news text-decoration-none w-clear"
                                                href="tiem-sua-xe-thanh-dat-tuyen-dung-tho-sua-xe"
                                                title="TIỆM SỬA XE THÀNH ĐẠT TUYỂN DỤNG THỢ SỬA XE">
                                                <p class="pic-news scale-img">
                                                    <img src="assets/images/page/tuyendung.jpg" alt="SỬA XE THÀNH ĐẠT">
                                                </p>
                                                <div class="info-news">
                                                    <h3 class="name-news">TIỆM SỬA XE THÀNH ĐẠT TUYỂN DỤNG THỢ SỬA
                                                        XE</h3>
                                                    <div class="desc-news text-split">TIỆM SỬA XE THÀNH ĐẠT TUYỂN
                                                        DỤNG THỢ SỬA XE</div>
                                                </div>
                                            </a>
                                            <a class="news text-decoration-none w-clear"
                                                href="tiem-sua-xe-thanh-dat-tuyen-dung-tho-sua-xe"
                                                title="TIỆM SỬA XE THÀNH ĐẠT TUYỂN DỤNG THỢ SỬA XE">
                                                <p class="pic-news scale-img">
                                                    <img src="assets/images/page/tuyendung.jpg" alt="SỬA XE THÀNH ĐẠT">
                                                </p>
                                                <div class="info-news">
                                                    <h3 class="name-news">TIỆM SỬA XE THÀNH ĐẠT TUYỂN DỤNG THỢ SỬA
                                                        XE</h3>

                                                    <div class="desc-news text-split">TIỆM SỬA XE THÀNH ĐẠT TUYỂN
                                                        DỤNG THỢ SỬA XE</div>
                                                </div>
                                            </a>
                                            <a class="news text-decoration-none w-clear"
                                                href="tiem-sua-xe-thanh-dat-tuyen-dung-tho-sua-xe"
                                                title="TIỆM SỬA XE THÀNH ĐẠT TUYỂN DỤNG THỢ SỬA XE">
                                                <p class="pic-news scale-img">
                                                    <img src="assets/images/page/tuyendung.jpg" alt="SỬA XE THÀNH ĐẠT">
                                                </p>
                                                <div class="info-news">
                                                    <h3 class="name-news">TIỆM SỬA XE THÀNH ĐẠT TUYỂN DỤNG THỢ SỬA
                                                        XE</h3>
                                                    <div class="desc-news text-split">TIỆM SỬA XE THÀNH ĐẠT TUYỂN
                                                        DỤNG THỢ SỬA XE</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-12">
                    <div class="videohome-intro">
                        <div id="video-fotorama"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="newsletter">
        <div class="box_contact row">
            <div class="text_contact col-md-3 col-12">
                <div class="all_text_contact d-flex">
                    <div class="img_contact">
                        <img src="assets/images/page/thu2.png" alt="SỬA XE THÀNH ĐẠT">
                    </div>
                    <div class="text1_contact">
                        <p class="text1_contact1">Đăng ký nhận tin</p>
                        <p class="text1_contact2">Sự hài lòng cảu bạn là mục tiêu
                            phấn đấu của chúng tôi</p>
                    </div>
                </div>
            </div>
            <div class="all_contact col-md-9 col-12">
                <form class="validation-newsletter form-newsletter" novalidate="" method="post" action=""
                    enctype="multipart/form-data">
                    <div class="rw_form row">
                        <div class="newsletter-input col-md-5 col-12">
                            <input type="text" class="form-control text-sm" id="Fullname-newsletter"
                                name="dataNewsletter[Fullname]" placeholder="Họ tên" required="">
                            <div class="invalid-feedback">Vui lòng nhập họ và tên</div>
                        </div>
                        <div class="newsletter-input col-md-5 col-12">
                            <input type="number" class="form-control text-sm" id="phone-newsletter"
                                name="dataNewsletter[phone]" placeholder="Nhập số điện thoại" required="">
                            <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                        </div>
                        <div class="newsletter-button col-md-2 col-12">
                            <input type="submit" class="btn btn-sm" name="submit-newsletter" value="Gửi">
                            <input type="hidden" class="btn btn-sm" name="recaptcha_response_newsletter"
                                id="recaptchaResponseNewsletter">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>