<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    $id = $filterAll['id'];
    $data_update = [
        'slug' => $filterAll['slug'],
        'title' => $filterAll['title'],
        'description' => $_POST['description'],
        'content' => $_POST['content'],
        'type_id' => $filterAll['type_id']
    ];
    if ($db->update('new', $data_update, "id = '$id'"))
    {
        setFlashData('smg', 'Cập nhật thành công');
        setFlashData('smg_type', 'success');
    } else
    {
        setFlashData('smg', 'Cập nhật thất bại ');
        setFlashData('smg_type', 'danger');
    }
}




$filterAll = $func->filter();
$id = $filterAll['id'];
$new_info = $db->oneRaw("SELECT * FROM new WHERE id = '$id'");
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
?>
<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <p class="text-center fs-4 fw-bold">Bài viết</p>
    <div class="container">
        <div class="row">
            <?php if (!empty($smg))
            {
                $func->getSmg($smg, $smg_type);
            } ?>
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group mb-3">
                            <label for="slugInput" id="slugLabel" class="fw-bold form-label">Đường dẫn mẫu:
                                localhost <span>êfè</span> </label>
                            <input name="slug" id="slugInput" class="form-control" placeholder="Đường dẫn"
                                value="<?= $new_info['slug'] ?>">
                        </div>
                        <div class="form-group mg-form mb-3">
                            <label for="title" class="form-label fw-bold">Tiêu đề:</label>
                            <input id="title" name="title" class="form-control" placeholder="Tiêu đề"
                                value="<?= $new_info['title'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="mota" class="form-label fw-bold">Mô tả</label>
                            <textarea class="form-control" id="mota" name="description"
                                rows="3"><?= $new_info['description'] ?></textarea>
                        </div>
                        <div class="form-group mg-form">
                            <label class="form-label fw-bold">Nội dung:</label>
                            <textarea name="content" id="description" class="form-control"
                                placeholder="Mô tả"><?= $new_info['content'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Danh mục cấp 1:</label>
                            <select class="form-select" name="type_id">
                                <?php
                                $cat_list = $db->getRaw('SELECT * FROM new_cat');
                                foreach ($cat_list as $item):
                                    ?>
                                <option value="<?= $item['id'] ?>"
                                    <?= $new_info['type_id'] == $item['id'] ? 'selected' : null ?>>
                                    <?= $item['title'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label class="form-label fw-bold">Hình ảnh:</label>
                            <input type="file" class="form-control" name="imageUpload" id="imageUpload"
                                accept="image/*">
                        </div>
                        <div class="form-group">
                            <img id="previewImage" src="asset/images/news/<?= $gioithieu['image'] ?>"
                                alt="Ảnh xem trước" style="max-width: 100%; max-height: 100%; margin-top: 20px;">
                        </div> -->
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $id ?>">
                <button type="submit" class="btn btn-primary mt-2">
                    Lưu
                </button>
            </form>
        </div>
    </div>
</main>