<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    $diachi = $filterAll['diachi'];
    $sodienthoai = $filterAll['sodienthoai'];
    $fanpage = $_POST['fanpage'];
    $email = $filterAll['email'];
    $zalo = $filterAll['zalo'];
    $iframe = $_POST['iframe'];
    $ggmaplink = $_POST['linkggmap'];
    $messenger = $_POST['messenger'];
    $company_name = $filterAll['company_name'];
    $db->query("UPDATE setting SET setting_value ='$diachi' WHERE setting_name = 'diachi'");
    $db->query("UPDATE setting SET setting_value = '$sodienthoai' WHERE setting_name = 'sodienthoai'");
    $db->query("UPDATE setting SET setting_value = '$fanpage' WHERE setting_name = 'fanpage'");
    $db->query("UPDATE setting SET setting_value = '$messenger' WHERE setting_name = 'messenger'");
    $db->query("UPDATE setting SET setting_value = '$zalo' WHERE setting_name = 'zalo'");
    $db->query("UPDATE setting SET setting_value = '$iframe' WHERE setting_name = 'google map iframe'");
    $db->query("UPDATE setting SET setting_value = '$ggmaplink' WHERE setting_name = 'google map link'");
    $db->query("UPDATE setting SET setting_value = '$email' WHERE setting_name = 'email'");
    $db->query("UPDATE setting SET setting_value = '$company_name' WHERE setting_name = 'company_name'");

}
$setting = $db->getRaw('SELECT * FROM setting');


$diachi = $setting[0]['setting_value'];
$sodienthoai = $setting[1]['setting_value'];
$fanpage = $setting[2]['setting_value'];
$messenger = $setting[3]['setting_value'];
$zalo = $setting[4]['setting_value'];
$iframe = $setting[5]['setting_value'];
$ggmaplink = $setting[6]['setting_value'];
$email = $setting[7]['setting_value'];
$company_name = $setting[8]['setting_value'];
?>

<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4 overflow-auto">
    <?php
    ?>
    <p class="fw-bold fs-4 text-center mb-5">Thông tin website</p>
    <form method="post">
        <div class="row">
            <div class="mb-3 col-6 col-lg-3">
                <label for="sodienthoai" class="form-label fw-bold">Số điện thoại:</label>
                <input type="text" name="sodienthoai" class="form-control" value="<?= $sodienthoai ?>">
            </div>
            <div class="mb-3 col-6 col-lg-3">
                <label for="zalo" class="form-label fw-bold">Zalo:</label>
                <input type="text" name="zalo" class="form-control" value="<?= $zalo ?>">
            </div>
            <div class="mb-3 col-12 col-lg-6">
                <label for="email" class="form-label fw-bold">Email:</label>
                <input type="email" name="email" class="form-control" value="<?= $email ?>">
            </div>
            <div class="mb-3 col-12 col-lg-6">
                <label for="diachi" class="form-label fw-bold">Messenger:</label>
                <input placeholder="Ví dụ: m.me/linkfanpage" type="text" name="messenger" class="form-control"
                    value="<?= $messenger ?>">
            </div>
            <div class="mb-3 col-12 col-lg-6">
                <label for="diachi" class="form-label fw-bold">Link fanpage:</label>
                <input placeholder="Ví dụ: https://www.facebook.com/linkfanpage" type="text" name="fanpage"
                    class="form-control" value="<?= $fanpage ?>">
            </div>
            <div class="mb-3 col-12">
                <label for="diachi" class="form-label fw-bold">Địa chỉ:</label>
                <input type="text" name="diachi" class="form-control" value="<?= $diachi ?>">
            </div>
            <div class="mb-3 col-12">
                <label for="company_name" class="form-label fw-bold">Tên công ty:</label>
                <input type="text" name="company_name" class="form-control" value="<?= $company_name ?>">
            </div>
            <div class="mb-3 col-12">
                <label for="linkggmap" class="form-label fw-bold">Link google map:</label>
                <input type="text" name="linkggmap" class="form-control" value="<?= $ggmaplink ?>">
            </div>
            <div class="mb-3 col-md-12">
                <label for="iframe" class="form-label fw-bold">Mã nhúng google map (set thuộc tính width =
                    "100%"):</label>
                <textarea type="text" name="iframe" class="form-control"
                    style="height: 150px;"><?= $iframe ?></textarea>
            </div>
        </div>
        <button class="btn btn-success">Lưu</button>
    </form>
</main>