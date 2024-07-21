<?php

$id = $new_cat['id'];
$new_list = $db->getRaw("SELECT * FROM new WHERE type_id ='$id'");

if (empty($new_list))
{
    $func->getSmg('Nội dung chưa cập nhật', 'warning');
} else
{
    ?>
<div class="maxwidth">
    <div class="content-main w-clear">
        <div class="title-main">
            <h2><?= $new_cat['title'] ?></h2>
        </div>
        <?php
            foreach ($new_list as $item):
                ?>

        <div class="row">
            <div class="col-md-6 col-12 col-sm-6">
                <a class="news text-decoration-none w-clear" href="<?= $item['slug'] ?>" title="<?= $item['title'] ?>">
                    <p class="pic-news scale-img"><img
                            src=" thumbs/320x250x1/upload/news/tan-trang-xe-may-2-3860-3458.jpg"
                            alt="<?= $item['slug'] ?>"></p>
                    <div class="info-news">
                        <h3 class="name-news"><?= $item['slug'] ?>
                        </h3>
                        <p class="time-news">Ngày đăng: <?= $item['create_at'] ?></p>
                        <div class="desc-news text-split">Tân Trang Xe Máy Cũ Như Mới - Sự Lựa Chọn Hoàn Hảo tại SỬA XE
                            THÀNH ĐẠT</div>
                    </div>
                </a>
            </div>

            <?php endforeach; ?>

        </div>
        <div class="clear"></div>
        <div class="pagination-home"></div>
    </div>
</div>

<?php
}