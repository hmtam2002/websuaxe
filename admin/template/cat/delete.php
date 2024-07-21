<?php
$filterAll = $func->filter();
$id = $filterAll['id'];
if ($db->delete('new_cat', "id = '$id'"))
{
    setFlashData('smg', 'Xoá thành công');
    setFlashData('smg_type', 'danger');
} else
{
    setFlashData('smg', 'Mục này đang được sử dụng');
    setFlashData('smg_type', 'danger');
}
$func->redirect('?com=cat&act=list');