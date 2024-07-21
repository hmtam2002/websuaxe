<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    //xử lý insert
    $data_insert = [
        'slug' => $filterAll['slug'],
        'title' => $filterAll['title'],
        'content' => $_POST['content'],
        'description' => $_POST['description'],
        'type_id' => $filterAll['cat_id'],
        'create_at' => date('Y-m-d H:i:s')
    ];
    // $image = $func->upload('imageUpload', 'news');

    // if ($data_insert['image'] === 'noimage.jpg')
    // {
    //     $data_insert['image'] = $image;
    // }
    // echo '<pre>';
    // print_r($data_insert);
    // echo '</pre>';
    // exit();
    $insertStatus = $db->insert('new', $data_insert);
    if ($insertStatus)
    {
        setFlashData('smg', 'Thêm bài thành công');
        setFlashData('smg_type', 'success');
        $func->redirect("?com=news&act=list");
    } else
    {
        setFlashData('smg', 'Thêm bài không thành công');
        setFlashData('smg_type', 'danger');
    }
}


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
                            <input name="slug" id="slugInput" class="form-control" placeholder="Đường dẫn">
                            <?php
                            //echo $f->formError('slug', '<span class="error">', '</span>', $errors);
                            ?>
                        </div>
                        <div class="form-group mg-form mb-3">
                            <label for="title" class="form-label fw-bold">Tiêu đề:</label>
                            <input id="title" name="title" class="form-control" placeholder="Tiêu đề">
                        </div>
                        <div class="mb-3">
                            <label for="mota" class="form-label fw-bold">Mô tả</label>
                            <textarea class="form-control" id="mota" name="description"
                                rows="3"><?= $gioithieu['description'] ?></textarea>
                        </div>
                        <div class="form-group mg-form">
                            <label class="form-label fw-bold">Nội dung:</label>
                            <textarea name="content" id="description" class="form-control"
                                placeholder="Mô tả"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Danh mục cấp 1:</label>
                            <select class="form-select" name="cat_id">
                                <?php
                                $cat_list = $db->getRaw('SELECT * FROM new_cat');
                                foreach ($cat_list as $item):
                                    ?>
                                <option value="<?= $item['id'] ?>"><?= $item['title'] ?></option>
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
                <button type="submit" class="btn btn-primary mt-2">Lưu</button>
            </form>
        </div>
    </div>
</main>