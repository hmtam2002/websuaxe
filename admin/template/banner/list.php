<?php
$sql = 'SELECT * FROM images WHERE type = "banner"';
$listSlider = $db->getRaw($sql);
if (empty($listSlider))
{
    $smg = setFlashData('smg', 'Không có dữ liệu');
    $smg = setFlashData('smg_type', 'danger');
}
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
?>
<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <p class="text-center fs-4 fw-bold">Quản lý hình giới thiệu</p>
    <?php if (!empty($smg))
    {
        $func->getSmg($smg, $smg_type);
    } ?>

    <table class="table">
        <thead>
            <th>STT</th>
            <th>Hình</th>
            <th width="5%">Sửa</th>
        </thead>
        <tbody>
            <?php
            // foreach ($listBook as $item)
            $count = 0;
            foreach ($listSlider as $item)
            {
                ?>
            <tr>
                <td><?= $count += 1 ?></td>
                <td>
                    <a href="?com=banner&act=edit&id=<?= $item['id'] ?>">
                        <img style="max-width: 400px;" src="../assets/images/banner/<?= $item['image'] ?>"
                            alt="Ảnh xem trước">
                    </a>
                </td>
                <td>
                    <a href="?com=banner&act=edit&id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</main>


<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel">Xác nhận xoá</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Xoá ảnh này?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Xoá</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    var deleteUrl = '';

    $('.btn-delete').on('click', function(event) {
        event.preventDefault();
        deleteUrl = $(this).attr('href');
        $('#confirmDeleteModal').modal('show');
    });

    $('#confirmDeleteBtn').on('click', function() {
        window.location.href = deleteUrl;
    });
});
</script>