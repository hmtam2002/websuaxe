<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    //xử lý insert
    $dataInsert = [
        'image' => $func->upload('imageUpload', 'slider'),
        'type' => 'slider',
    ];
    $insertStatus = $db->insert('images', $dataInsert);
    if ($insertStatus)
    {
        setFlashData('smg', 'Thêm ảnh thành công');
        setFlashData('smg_type', 'success');
        $func->redirect('?com=slider&act=list');
    } else
    {
        setFlashData('smg', 'Lỗi cơ sở dữ liệu');
        setFlashData('smg_type', 'danger');
        $func->redirect('?com=slider&act=add');
    }
}



$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');
$slider_data = getFlashData('slider_detail');
if (!empty($slider_data))
{
    $old = $slider_data;
}
?>

<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <p class="fw-bold fs-4 text-center">Thêm hình</p>
    <div class="container">
        <div class="row">
            <?php if (!empty($smg))
            {
                $f->getSmg($smg, $smg_type);
            } ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group col-lg-5 col-md-8">
                    <label class="fw-bold form-label">Hình ảnh:</label>
                    <input type="file" class="form-control" name="imageUpload" id="imageUpload" accept="image/*"
                        required>
                </div>
                <div class="col">
                    <div class="form-group">
                        <img id="previewImage" src="../assets/images/noimage/noimage.png" alt="Ảnh xem trước"
                            style="max-width: 100%; max-height: 100%;  margin-top: 20px;">
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $sliderId ?>">
                <button type="submit" class="btn btn-primary btn-block mg-btn" style="margin-top: 40px">
                    Cập nhật
                </button>
            </form>
        </div>
    </div>
</main>