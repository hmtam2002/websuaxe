<!-- header -->
<div class="wrap-home">
    <!-- header -->
    <div id="top-bar" class="hidden-xs hidden-sm hidden-md hidden-lg">
        <div class="maxwidth">
            <div class="bg-top_bar">
                <p><i class="fas fa-phone-alt"></i></i><span><?= $setting_info[1]['setting_value'] ?></span></p>
                <p><i class="fas fa-envelope"></i><span><?= $setting_info[7]['setting_value'] ?></span></p>
                <div class="follow-us_top">
                    <div>
                        <a href="https://zalo.me/<?= $setting_info[4]['setting_value'] ?>" target="_blank" title=""><img
                                src="assets/images/page/zalo.png" alt="<?= $setting_info[4]['setting_value'] ?>" /></a>
                    </div>
                    <div>
                        <a href="<?= $setting_info[2]['setting_value'] ?>" target="_blank">
                            <img src="assets/images/page/fb_icon.svg" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header" class="">
        <div class="maxwidth">
            <?php $logo = $db->oneRaw("SELECT * FROM images WHERE type = 'logo'")['image'] ?>
            <a id="logo" href="./">
                <img src="<?= ASSET . 'images/logo/' . $logo ?>" />
            </a>
            <a id="banner" href="./">
                <img src="<?= ASSET . 'images/page/banner.png' ?>" />
            </a>
            <div class="hotline_header">
                <div class="box_hotline d-flex">
                    <div class="img_hotline">
                        <img src="<?= ASSET . 'images/page/hotline.png' ?>" alt="">
                    </div>
                    <div class="text_hotline">
                        <p class="text_hotline1">Hotline</p>
                        <p class="text_hotline2"><?= $setting_info[1]['setting_value'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- menu -->
<div class="menu hidden-lg hidden-md hidden-sm hidden-xs">
    <div class="maxwidth">
        <div class="flex-memu">
            <ul class="primary-menu">
                <li><a class="transition text-menu active" href="./" title="Trang chủ">Trang
                        chủ</a></li>
                <li><a class="transition text-menu " href="gioi-thieu" title="Giới thiệu">Giới thiệu</a></li>

                <li><a class="transition text-menu " href="dich-vu" title="Dịch vụ">Dịch vụ </a></li>
                <li><a class="transition text-menu " href="tin-tuc" title="Tin tức & Sự kiện">Tin tức & Sự kiện</a>
                </li>
                <li><a class="transition text-menu " href="tuyen-dung" title="Tuyển dụng">Tuyển dụng</a>
                </li>
                <li><a class="transition text-menu " href="#" title="Thư viện ảnh">Thư viện ảnh</a>
                </li>
                <li><a class="transition text-menu " href="#" title="Video">Video</a>
                </li>

                <li><a class="transition text-menu " href="#" title="Liên hệ">Liên hệ</a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>