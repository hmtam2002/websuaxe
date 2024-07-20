<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    //xử lý insert
    $data_insert = [
        'slug' => $filterAll['slug'],
        'title' => $filterAll['title'],
        'content' => $_POST['description'],
        'type' => 'policy',
        'create_at' => date('Y-m-d H:i:s')
    ];

    $insertStatus = $db->insert('new', $data_insert);
    if ($insertStatus)
    {
        setFlashData('smg', 'Thêm mục thành công');
        setFlashData('smg_type', 'success');
        $func->redirect('?com=policy&act=list');
    } else
    {
        setFlashData('smg', 'Thêm mục không thành công');
        setFlashData('smg_type', 'danger');
    }
}


$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
?>
<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <p class="text-center fs-4 fw-bold">Chính sách</p>
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
                                localhost/</label>
                            <input name="slug" id="slugInput" class="form-control" placeholder="Đường dẫn">
                        </div>
                        <div class="form-group mg-form mb-3">
                            <label for="title" class="form-label fw-bold">Tiêu đề:</label>
                            <input id="title" name="title" class="form-control" placeholder="Tiêu đề">
                        </div>
                        <div class="form-group mg-form">
                            <label class="form-label fw-bold">Nội dung:</label>
                            <textarea name="description" id="description" class="form-control"
                                placeholder="Mô tả"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">
                    Lưu
                </button>
            </form>
        </div>
    </div>
</main>