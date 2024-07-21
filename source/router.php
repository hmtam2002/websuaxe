<?php

$setting_info = $db->getRaw('SELECT * FROM setting');
// echo $setting_info[8]['setting_value'];
// echo '<pre>';
// print_r($setting_info);
// echo '</pre>';

// Lấy đường dẫn URL hiện tại và loại bỏ phần query string
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);



// Xác định base path dựa trên tên project
$base_path = '/' . URL;

// Loại bỏ base path khỏi URL
if (strpos($url, $base_path) === 0)
{
    $url = substr($url, strlen($base_path));
}

// Loại bỏ dấu gạch chéo cuối cùng nếu có
$url = rtrim($url, '/');



ob_start();




switch ($url)
{
    case '':
        require_once TEMPLATE . '/index/index.php';
        $title = $setting_info[8]['setting_value'];
        $noidung = ob_get_clean();
        break;
    case '/gioi-thieu':
        $new = $db->oneRaw("SELECT * FROM new WHERE type = 'gioi-thieu'");
        $title = $new['title'];
        require_once TEMPLATE . '/new/new.php';
        $noidung = ob_get_clean();
        break;
    case '/lien-he':
        require_once TEMPLATE . '/new/new.php';
        $noidung = ob_get_clean();
        break;
    case '/thu-vien-anh':
        require_once TEMPLATE . '/thuvienanh/thuvienanh.php';
        $noidung = ob_get_clean();
        break;
    case '/video':
        require_once TEMPLATE . '/video/video.php';
        $noidung = ob_get_clean();
        break;
    default:
        $slug = ltrim($url, '/');

        $new = $db->oneRaw("SELECT * FROM new WHERE slug = '$slug'");
        if (!empty($new))
        {
            $title = $new['title'];
            require_once TEMPLATE . '/new/new.php';
            $noidung = ob_get_clean();
            break;
        }

        $new_cat = $db->oneRaw("SELECT * FROM new_cat WHERE slug = '$slug'");
        if (!empty($new_cat))
        {
            $title = $new_cat['title'];
            require_once TEMPLATE . '/new/list.php';
            $noidung = ob_get_clean();
            break;
        }



        $noidung = '<span>Đường dẫn rỗng ' . $url . '</span>';
        break;
}