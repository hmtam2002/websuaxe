<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    //xử lý insert
    $data_update = [
        'title' => $filterAll['title'],
        'content' => $_POST['content'],
        'description' => $filterAll['description']
    ];
    $insertStatus = $db->update('new', $data_update, "type = 'gioi-thieu'");
    if ($insertStatus)
    {
        setFlashData('smg', 'Chỉnh sửa thành công');
        setFlashData('smg_type', 'success');
    } else
    {
        setFlashData('smg', 'Chỉnh sửa không thành công');
        setFlashData('smg_type', 'danger');
    }
}

$gioithieu = $db->oneRaw("SELECT * FROM new WHERE type = 'gioi-thieu'");


$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
?>
<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <p class="text-center fs-4 fw-bold">Giới thiệu</p>

    <div class="container">
        <div class="row">
            <?php if (!empty($smg))
            {
                $func->getSmg($smg, $smg_type);
            } ?>
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group mg-form mb-3">
                            <label for="title" class="form-label fw-bold">Tiêu đề:</label>
                            <input id=" title" name="title" class="form-control" placeholder="Tiêu đề"
                                value="<?= $gioithieu['title'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="mota" class="form-label fw-bold">Mô tả</label>
                            <textarea class="form-control" id="mota" name="description"
                                rows="3"><?= $gioithieu['description'] ?></textarea>
                        </div>
                        <div class="form-group mg-form">
                            <label class="form-label fw-bold">Nội dung:</label>
                            <textarea name="content" id="description" class="form-control" placeholder="Mô tả">
                                <?= $gioithieu['content']; ?>
                                </textarea>
                        </div>
                    </div>
                    <!-- <div class="col-sm-4">
                        <div class="form-group">
                            <label class="form-label fw-bold">Hình ảnh:</label>
                            <input type="file" class="form-control" name="imageUpload" id="imageUpload"
                                accept="image/*">
                        </div>
                        <div class="form-group">
                            <img id="previewImage" src="asset/images/news/<?= $gioithieu['image'] ?>"
                                alt="Ảnh xem trước" style="max-width: 100%; max-height: 100%; margin-top: 20px;">
                        </div>
                    </div> -->
                </div>
                <button type="submit" class="btn btn-primary mt-2">
                    Lưu
                </button>
            </form>
        </div>
    </div>
</main>