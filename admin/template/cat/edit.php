<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    $id = $filterAll['id'];
    $data_update = [
        'slug' => $filterAll['slug'],
        'title' => $filterAll['title']
    ];
    if ($db->update('new_cat', $data_update, "id = '$id'"))
    {
        setFlashData('smg', 'Cập nhật thành công');
        setFlashData('smg_type', 'success');
    } else
    {
        setFlashData('smg', 'Cập nhật thất bại ');
        setFlashData('smg_type', 'danger');
    }
}


$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');


$filterAll = $func->filter();
$id = $filterAll['id'];
$cat_info = $db->oneRaw("SELECT * FROM new_cat WHERE id = '$id'");
?>


<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <p class="text-center fs-4 fw-bold">Danh mục cấp 1</p>
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
                            <input required name="slug" id="slugInput" class="form-control" placeholder="Đường dẫn"
                                value="<?= $cat_info['slug'] ?>">
                        </div>
                        <div class="form-group mg-form mb-3">
                            <label for="title" class="form-label fw-bold">Tiêu đề:</label>
                            <input required id="title" name="title" class="form-control" placeholder="Tiêu đề"
                                value="<?= $cat_info['title'] ?>">
                        </div>
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