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
        $sql = "SELECT products.*, authors.author_name
            FROM products
            INNER JOIN authors ON products.author_id = authors.id
            WHERE products.slug = '$slug'";
        $product_detail = $db->oneRaw($sql);
        if (!empty($product_detail))
        {
            if (file_exists(_PATH . '/module/book/detail.php'))
            {
                require_once _PATH . '/module/book/detail.php';
                $title_page = $product_detail['title'];
                $noidung = ob_get_clean();
                break;
            }
        }
        $sql = "SELECT products.*, origins.country_name, brands.brand_name
                FROM products
                INNER JOIN origins ON products.origin_id = origins.id
                INNER JOIN brands ON products.brand_id = brands.id
                WHERE products.slug = '$slug'";
        $sanpham_detail = $db->oneRaw($sql);

        if (!empty($sanpham_detail))
        {
            if (file_exists(_PATH . '/module/stationery/detail.php'))
            {
                require_once _PATH . '/module/stationery/detail.php';
                $title_page = $sanpham_detail['product_name'];
                $noidung = ob_get_clean();
                break;
            }
        }
        $new_detail = $db->oneRaw("SELECT * FROM news WHERE slug = '$slug'");
        if (!empty($new_detail))
        {
            if (file_exists(_PATH . '/module/new/detail.php'))
            {
                require_once _PATH . '/module/new/detail.php';
                $title_page = $new_detail['title'];
                $noidung = ob_get_clean();
                break;
            }
        }
        $noidung = '<span>Đường dẫn rỗng ' . $url . '</span>';
        break;
}