<?php
$listNews = $db->getRaw("SELECT new.*, new_cat.title AS new_cat_title
                         FROM new
                         JOIN new_cat 
                         ON new.type_id = new_cat.id");
if (empty($listNews))
{
    $smg = setFlashData('smg', 'Không có dữ liệu');
    $smg = setFlashData('smg_type', 'danger');
}

$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
?>
<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4">
    <a href="?com=news&act=add" class="btn btn-success mb-4">Thêm bài viết</a>
    <?php if (!empty($smg))
    {
        $func->getSmg($smg, $smg_type);
    } ?>
    <table class="table <?= empty($listNews) ? 'd-none' : '' ?>">
        <thead>
            <th>STT</th>
            <!-- <th>Hình ảnh</th> -->
            <th>Danh mục</th>
            <th>Tiêu đề</th>
            <th width="10%">Trạng thái</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xoá</th>
        </thead>
        <tbody>
            <?php
            $dem = 1;
            foreach ($listNews as $item)
            {
                ?>
            <tr>
                <td>
                    <?= $dem++ ?>
                </td>
                <td><?= $item['new_cat_title'] ?></td>
                <td>
                    <a href="?com=news&act=edit&id=<?= $item['id'] ?>" class="text-decoration-none text-dark">
                        <?= $item['title'] ?>
                    </a>
                </td>

                <td>
                    <a href="?com=news&act=status&id=<?= $item['id'] ?>&status=<?= $item['status'] ?>">
                        <?= $item['status'] == 1 ? '<button class="btn btn-success btn-sm">Hiện</button>' : '<button class="btn btn-danger btn-sm">Ẩn</button>' ?>
                    </a>
                </td>
                <td>
                    <a href="?com=news&act=edit&id=<?= $item['id'] ?>" class=" btn btn-success btn-sm"
                        class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <td>
                    <a href="?com=news&act=delete&id=<?= $item['id'] ?>" data_id=" <?= $item['id'] ?>"
                        class="btn btn-danger btn-sm btn-delete">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
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
                Bạn chắc chắn muốn xoá bài viết này?
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