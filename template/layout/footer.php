<div id="footer">
    <div class="footer-article">
        <div class="maxwidth">
            <div class="row">
                <div class="col-md-5">
                    <div class="footer-news">
                        <h2 class="title-footer-contact">SỬA XE THÀNH ĐẠT</h2>
                        <div class="info-footer">
                            <p><span style="font-size:16px;"><strong>Địa chỉ:
                                        <?= $setting_info[0]['setting_value'] ?></strong></span></p>

                            <p><span style="font-size:16px;"><strong>Email:
                                        <?= $setting_info[7]['setting_value'] ?></strong></span></p>

                            <p><span style="font-size:16px;"><strong>Tel: <span
                                            style="color:#ff0000;"><?= $setting_info[1]['setting_value'] ?></span></strong></span>
                            </p>

                            <p><span style="font-size:16px;"><strong>Zalo: <a
                                            href="https://zalo.me/<?= $setting_info[4]['setting_value'] ?>"
                                            target="_blank"><span
                                                style="color:#ff0000;"><?= $setting_info[4]['setting_value'] ?></span></a></strong></span>
                            </p>

                            <p><span style="font-size:16px;"><strong>Website:<a href="https://suaxethanhdat.com/"
                                            target="_blank"><span style="color:#ffffff;"><?= $_SERVER['HTTP_HOST'] ?>
                                            </span></a></strong></span></p>

                            <p> </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-news">
                        <h2 class="title-footer">Chính sách bán hàng</h2>
                        <ul class="footer-ul">
                            <?php
                            $policy_list = $db->getRaw("SELECT * FROM new WHERE type = 'policy'");
                            foreach ($policy_list as $item):
                                ?>
                            <li><a class="text-decoration-none" href="<?= $item['slug'] ?>"
                                    title="<?= $item['title'] ?>"><?= $item['title'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="footer-news">
                        <h2 class="title-footer">Fanpage Facebook</h2>
                        <div id="fanpage-facebook"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-powered">
        <div class="maxwidth">
            <p class="copyright">Copyright © 2024 <?= $setting_info[8]['setting_value'] ?></a></p>
        </div>
    </div>

</div>
<?= $setting_info[5]['setting_value'] ?>
<div id="messages-facebook"></div><a class="btn-zalo btn-frame text-decoration-none" target="_blank"
    href="https://zalo.me/<?= $setting_info[4]['setting_value'] ?>">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><img src="assets/images/page/zalo_icon.png" alt="Zalo"></i>
</a>
<a class="btn-phone btn-frame text-decoration-none" href="tel:<?= $setting_info[1]['setting_value'] ?>">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><img src="assets/images/page/call_icon.png" alt="Hotline"></i>
</a>
</div>