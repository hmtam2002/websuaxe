<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    //xử lý insert
    $dataInsert = [
        'image' => $func->upload('imageUpload', 'logo'),
    ];
    $insertStatus = $db->update('images', $dataInsert, "type = 'logo'");
    if ($insertStatus)
    {
        setFlashData('smg', 'Cập nhật thành công');
        setFlashData('smg_type', 'success');
    } else
    {
        setFlashData('smg', 'Lỗi cơ sở dữ liệu');
        setFlashData('smg_type', 'danger');
    }
}

$logo = $db->oneRaw("SELECT * FROM images WHERE type = 'logo'")['image'];


$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
?>

<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <p class="fw-bold fs-4 text-center">Logo</p>
    <div class="container">
        <div class="row">
            <?php if (!empty($smg))
            {
                $func->getSmg($smg, $smg_type);
            } ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group col-lg-4 col-md-8">
                    <label class="form-label fw-bold">Hình ảnh:</label>
                    <input type="file" class="form-control" name="imageUpload" id="imageUpload" accept="image/*"
                        required>
                </div>
                <div class="col">
                    <div class="form-group">
                        <img id="previewImage" src="../assets/images/logo/<?= $logo ?>" alt="Ảnh xem trước"
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

<script>
$(document).ready(function() {
    // Lắng nghe sự kiện change trên input file
    $("#imageUpload").on("change", function(event) {
        // Kiểm tra xem có file được chọn hay không
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // Cập nhật nguồn ảnh cho thẻ img
                $("#previewImage").attr("src", e.target.result);
                // Hiển thị thẻ img
                // $('#previewImage').css('display', 'block');
            };
            // Đọc dữ liệu của file được chọn
            reader.readAsDataURL(this.files[0]);
        }
    });
});
</script>