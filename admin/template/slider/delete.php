<?php
$filterAll = $func->filter();
if (!empty($filterAll['id']))
{
    $sliderId = $filterAll['id'];
    $slider_detail = $db->getRows("SELECT * FROM images WHERE id=$sliderId");
    if ($slider_detail > 0)
    {
        //thực hiện xoá
        $deleteSlider = $db->delete("images", "id = $sliderId");
        if ($deleteSlider)
        {
            setFlashData("smg", "Đã xoá thành công");
            setFlashData("smg_type", "danger");
        }
    } else
    {
        setFlashData("smg", "Slider không tồn tại trong hệ thống");
        setFlashData("smg_type", "danger");
    }

} else
{
    setFlashData("smg", "Liên kết không tồn tại");
    setFlashData("smg_type", "danger");
}
$func->redirect("?com=slider&act=list");