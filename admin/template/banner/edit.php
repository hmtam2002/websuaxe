<?php

$filterAll = $func->filter();
$id = $filterAll['id'];

if ($func->isPOST())
{
    $filterAll = $func->filter();
    //xử lý insert
    $dataInsert = [
        'image' => $func->upload('imageUpload', 'banner'),
    ];
    $insertStatus = $db->update('images', $dataInsert, "id = '$id'");
    if ($insertStatus)
    {
        setFlashData('smg', 'Chỉnh sửa thành công');
        setFlashData('smg_type', 'success');
        $func->redirect('?com=banner&act=list');
    } else
    {
        setFlashData('smg', 'Lỗi cơ sở dữ liệu');
        setFlashData('smg_type', 'danger');
        $func->redirect('?com=banner&act=add');
    }
}

$banner = $db->oneRaw("SELECT * FROM images WHERE id = '$id'");

$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
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
                    <label class="form-label fw-bold">Hình ảnh:</label>
                    <input type="file" class="form-control" name="imageUpload" id="imageUpload" accept="image/*"
                        required>
                </div>
                <div class="col">
                    <div class="form-group">
                        <img id="previewImage" src="../assets/images/banner/<?= $banner['image'] ?>" alt="Ảnh xem trước"
                            style="max-width: 100%; max-height: 100%;  margin-top: 20px;">
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <button type="submit" class="btn btn-primary btn-block mg-btn" style="margin-top: 40px">
                    Cập nhật
                </button>
            </form>
        </div>
    </div>
</main>