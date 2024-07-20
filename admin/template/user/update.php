<?php
if ($func->isPOST())
{
    $filterAll = $func->filter();
    $data_update = [
        'fullname' => $filterAll['fullname'],
        'email' => $filterAll['email']
    ];
    if (!empty($filterAll['password']))
    {
        if (strlen($filterAll['password']) < 6)
        {
            $error = 'Mật khẩu phải có từ 6 ký tự';
        } else
        {
            $data_update['password'] = password_hash($filterAll['password'], PASSWORD_DEFAULT);
            if ($db->update('admin', $data_update))
            {
                setFlashData('msg', 'Cập nhật thành công');
                setFlashData('msg_type', 'success');
            }
        }
    } else
    {
        if ($db->update('admin', $data_update))
        {
            setFlashData('msg', 'Cập nhật thành công');
            setFlashData('msg_type', 'success');
        }
    }
}

$msg = getFlashData('msg');
$msg_type = getFlashData('msg_type');

$admin_info = $db->oneRaw('SELECT * FROM admin');
?>

<main id="content" class="col-md-9 ms-auto col-lg-10 px-md-4 py-4">
    <div class="container">
        <div class="row">
            <p class="text-center fw-bold fs-4 mb-5">Thông tin admin</p>
            <?php
            if (!empty($msg))
            {
                $func->getSmg($msg, $msg_type);
            }
            ?>
            <form method="post">
                <div class="row">
                    <div class="col-lg-3 mb-3">
                        <label for="fullname" class="fw-bold form-label">Họ và tên:</label>
                        <input type="text" name="fullname" id="fullname" value="<?= $admin_info['fullname'] ?>"
                            class="form-control">
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label for="email" class="fw-bold form-label">Email:</label>
                        <input type="email" value="<?= $admin_info['email'] ?>" id="email" name="email"
                            class="form-control">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label for="password" class="fw-bold form-label">Mật khẩu:</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon2"><i class="bi bi-key-fill"></i></span>
                            <input name="password" type="password" class="form-control" id="password"
                                placeholder="Mật khẩu mới *">
                            <button type="button" class="input-group-text" id="toggle-password"><i
                                    class="bi bi-eye-fill"></i></button>
                        </div>
                        <span class="fst-italic text-danger">
                            <?= !empty($error) ? $error : '' ?>
                        </span>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $admin_info['id'] ?>">
                <button type="submit" class="btn btn-primary">
                    Cập nhật
                </button>
            </form>
        </div>
    </div>
</main>

<script>
$(document).ready(function() {
    $('#toggle-password').click(function() {
        var passwordField = $('#password');
        var passwordFieldType = passwordField.attr('type');
        var icon = $(this).find('i');

        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
            icon.removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
        } else {
            passwordField.attr('type', 'password');
            icon.removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
        }
    });
});
</script>