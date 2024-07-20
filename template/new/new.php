<div class="maxwidth py-3">
    <?php if (empty($new))
    {
        $func->getSmg('Nội dung chưa được cập nhật', 'warning');
    } else
    { ?>
    <h2 class="text-center fw-bold fs-1 mb-3"><?= $new['title'] ?></h2>
    <?= $new['content'] ?>
    <?php
    } ?>
</div>