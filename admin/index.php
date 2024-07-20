<?php
session_start();
define('LIBRARIES', '../libraries/');
define('TEMPLATE', '../templates/');
define('LAYOUT', 'layout/');
define('SOURCE', 'source/');

//thư viện php mailer
require_once '../source/phpmailer/Exception.php';
require_once '../source/phpmailer/PHPMailer.php';
require_once '../source/phpmailer/SMTP.php';

// Config
require_once "../config.php";

// Session
require_once "../source/session.php";

// Database
require_once "../source/database.php";

// Function
require_once "../source/function.php";

// Admin
require_once "source/admin.php";


$db = new Database();
$ad = new admin();
$func = new func();





if (!empty($_GET['com']))
{
    if (is_string($_GET['com']))
    {
        $com = trim($_GET['com']);
    }
}
if (!empty($_GET['act']))
{
    if (is_string($_GET['act']))
    {
        $act = trim($_GET['act']);
    }
}

if ($ad->isLogin())
{
    if ($com == "user" && $act == "login")
    {
        $func->redirect('index.php?com=home&act=dashboard');
    }
} else
{
    if ($com != "user" && $act != "login")
    {
        $func->redirect('index.php?com=user&act=login');
    }

}


?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/images/favicon.png?ver=2" rel="shortcut icon" type="image/x-icon" />
    <title>Administrator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- bootstrap-icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css"
        rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php require_once 'template/layout/css.php' ?>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <?php
    if ($com != "user" || $act != "login")
    {
        require_once 'template/page/header.php';
        require_once 'template/page/menu.php';
    }
    ?>
    <?php require_once 'template/' . $com . '/' . $act . '.php'; ?>

    <script src="source/ckeditor/ckeditor.js"></script>
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
    $(document).ready(function() {
        ClassicEditor.create($("#description")[0], {})
            .then((editor) => {
                window.editor = editor;
            })
            .catch((err) => {
                console.error(err.stack);
            });
    });
    </script>


    <!-- slug tự động -->
    <script>
    $(document).ready(function() {
        function createSlug(text) {
            const from =
                "ÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬÉÈẺẼẸÊẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢÚÙỦŨỤƯỨỪỬỮỰÝỲỶỸỴáàảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵđĐ";
            const to =
                "AAAAAAAAAAAAAAAAAEEEEEEEEEEEIIIIIOOOOOOOOOOOOOOOOOUUUUUUUUUUUYYYYYaaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyydD";

            const convertVietnamese = (str) => {
                let newStr = "";
                for (let i = 0; i < str.length; i++) {
                    const index = from.indexOf(str[i]);
                    if (index !== -1) {
                        newStr += to[index];
                    } else {
                        newStr += str[i];
                    }
                }
                return newStr;
            };

            let slug = convertVietnamese(text);
            slug = slug.toLowerCase();
            slug = slug
                .replace(/[^a-z0-9\s-]/g,
                    "") // Loại bỏ ký tự không phải là chữ cái, số, khoảng trắng và dấu gạch ngang
                .replace(/\s+/g, "-") // Thay thế khoảng trắng bằng dấu gạch ngang
                .replace(/-+/g, "-") // Thay thế nhiều dấu gạch ngang liên tiếp bằng một dấu gạch ngang
                .replace(/^-+|-+$/g, ""); // Loại bỏ dấu gạch ngang ở đầu và cuối chuỗi

            return slug;
        }

        const labelElement2 = $("#slugLabel");

        $("#title").on("input", function() {
            const title = $(this).val();
            const slug = createSlug(title);
            $("#slugInput").val(slug);
            labelElement2.text("Đường dẫn mẫu: localhost/" + slug);
        });

        // Lấy thẻ input và thẻ label bằng ID
        const inputElement = $("#slugInput");
        const labelElement = $("#slugLabel");

        // Thêm sự kiện lắng nghe khi có sự thay đổi trong thẻ input
        inputElement.on("input", function() {
            // Lấy giá trị hiện tại của thẻ input
            const inputValue = inputElement.val();

            // Cập nhật nội dung của thẻ label
            labelElement.text("Đường dẫn mẫui: localhost/mystore/" + inputValue);
        });
    });
    </script>
</body>


</html>