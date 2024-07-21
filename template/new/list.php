<div class="maxwidth mt-3">
    <?php

    $id = $new_cat['id'];
    $new_list = $db->getRaw("SELECT * FROM new WHERE type_id ='$id'");

    if (empty($new_list))
    {
        $func->getSmg('Nội dung chưa cập nhật', 'warning');
    } else
    {
        ?>

    <div class="content-main w-clear">
        <div class="title-main">
            <h2><?= $new_cat['title'] ?></h2>
        </div>
        <div class="row">
            <?php
                foreach ($new_list as $item):
                    ?>


            <div class="col-md-6 col-12 col-sm-6">
                <a class="news text-decoration-none w-clear" href="<?= $item['slug'] ?>" title="<?= $item['title'] ?>">
                    <p class="pic-news scale-img "><img style="width: 150px;height: 110px;object-fit: cover;"
                            src="assets/images/news/<?= $item['image'] ?>" alt="<?= $item['slug'] ?>"></p>
                    <div class="info-news">
                        <h3 class="name-news"><?= $item['slug'] ?>
                        </h3>
                        <p class="time-news">Ngày đăng: <?= $item['create_at'] ?></p>
                        <div class="desc-news text-split"><?= $item['description'] ?></div>
                    </div>
                </a>
            </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>
<?php
    } ?>
</div>