<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class func
{
    public function isPOST()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    public function isGET()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
    public function filter()
    {
        $filterArr = [];

        // Lọc các tham số từ phương thức GET
        if ($this->isGET())
        {
            $filterArr += filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        // Lọc các tham số từ phương thức POST
        if ($this->isPOST())
        {
            $filterArr += filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $filterArr;
    }

    public function redirect($path = 'index.php')
    {
        if (!headers_sent())
        {
            header("location: $path");
            exit;
        } else
        {
            echo "<script>window.location.href='$path';</script>";
            exit;
        }

    }

    public function getSmg($smg, $type = 'success')
    {
        echo '<div class="alert alert-' . $type . '">';
        echo $smg;
        echo '</div>';
    }
    public function old($filename, $oldData, $default = null)
    {
        return (!empty($oldData[$filename])) ? $oldData[$filename] : $default;
    }
    public function sendMail($to, $subject, $content)
    {

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try
        {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = _username;                     //SMTP username
            // $mail->Username = 'thevyshop.contact@gmail.com';                     //SMTP username
            $mail->Password = _password;                               //SMTP password
            // $mail->Password = 'tlan nljd syxr nkrg';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('from@example.com', 'Muasach.vn');
            $mail->addAddress($to);     //Add a recipient 


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $content;
            $mail->CharSet = 'UTF-8'; // Set charset to UTF-8
            $mail->send();
            return true;
        } catch (Exception $e)
        {
            // echo "Gửi mail thất bại. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
    public function formError($filename, $beforeHtml = '', $afterHtml = '', $errors)
    {
        return (!empty($errors[$filename])) ? $beforeHtml . reset($errors[$filename]) . $afterHtml : null;
    }
    //Hàm kiểm tra số nguyên
    public function isNumberInt($number)
    {
        return filter_var($number, FILTER_VALIDATE_INT);
    }
    //Hàm kiểm tra số thực
    public function isNumberFloat($number)
    {
        return filter_var($number, FILTER_VALIDATE_FLOAT);
    }
    //Hàm kiểm tra số điện thoại
    public function isPhone($phone)
    {
        // Kiểm tra xem độ dài của chuỗi có bằng 10 không
        if (strlen($phone) != 10)
        {
            return false;
        }

        // Kiểm tra xem ký tự đầu tiên có phải là số 0 không
        if ($phone[0] != '0')
        {
            return false;
        }

        // Kiểm tra xem các ký tự còn lại có phải là số không
        for ($i = 1; $i < 10; $i++)
        {
            if (!is_numeric($phone[$i]))
            {
                return false;
            }
        }

        return true;
    }
    public function upload($filenameupload, $path = '')
    {
        $check = true;

        // Đảm bảo đường dẫn tùy chỉnh bắt đầu bằng dấu gạch chéo và kết thúc bằng dấu gạch chéo
        $target_dir = rtrim(_PATH_ASSETS, '/') . '/images/' . trim($path, '/') . '/';

        // Kiểm tra và thay đổi quyền nếu cần thiết
        if (!is_writable($target_dir))
        {
            // Cố gắng thay đổi quyền thư mục thành writable (0775)
            if (!chmod($target_dir, 0775))
            {
                // $this->getSmg('Không thể thay đổi quyền thư mục. Vui lòng kiểm tra lại.', 'danger');
                return "noimage.jpg";
            }
        }

        $target_file = $target_dir . basename($_FILES[$filenameupload]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $new_filename = time() . '.' . $imageFileType;
        $allow_file_upload = ["jpg", "jpeg", "png", "gif", "jfif", "webp"];

        // Kiểm tra nếu không có file được chọn
        if (!isset($_FILES[$filenameupload]) || $_FILES[$filenameupload]['error'] == UPLOAD_ERR_NO_FILE)
        {
            // $this->getSmg('Không có file nào được chọn.', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra nếu file có phải là hình ảnh thật hay không
        $checkImage = getimagesize($_FILES[$filenameupload]["tmp_name"]);
        if ($checkImage === false)
        {
            // $this->getSmg('File upload không phải là hình ảnh!', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra định dạng file
        if (!in_array($imageFileType, $allow_file_upload))
        {
            // $this->getSmg('Định dạng file không hợp lệ! Chỉ chấp nhận JPG, JPEG, PNG, GIF, JFIF.', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra kích thước file (ví dụ: giới hạn 5MB)
        if ($_FILES[$filenameupload]["size"] > 5000000)
        {
            // $this->getSmg('File upload quá lớn! Giới hạn 5MB.', 'danger');
            return "noimage.jpg";
        }

        // Kiểm tra nếu file đã tồn tại (tránh ghi đè file)
        if (file_exists($target_dir . $new_filename))
        {
            // $this->getSmg('File đã tồn tại.', 'danger');
            return "noimage.jpg";
        }

        // In ra đường dẫn và tên file để kiểm tra
        // echo "Đường dẫn file tạm: " . $_FILES[$filenameupload]["tmp_name"] . "<br>";
        // echo "Đường dẫn đích: " . $target_dir . $new_filename . "<br>";

        // Thực hiện upload file
        if (move_uploaded_file($_FILES[$filenameupload]["tmp_name"], $target_dir . $new_filename))
        {
            return $new_filename;
        } else
        {
            // In ra lỗi cụ thể nếu có
            $error = error_get_last();
            echo "Error: " . $error['message'] . "<br>";
            // $this->getSmg('Có lỗi xảy ra khi upload file của bạn.', 'danger');
            return "noimage.jpg";
        }
    }

    public function image_exists($filename, $path = '')
    {
        $defaultImage = '../assets/images/noimage/noimage.png'; // Đường dẫn tới ảnh mặc định
        if (empty($filename))
        {
            return $defaultImage;
        }
        $imagePath = _PATH_ASSETS . '/images/' . $path . '/' . $filename; // Đường dẫn tới ảnh cần kiểm tra

        if (file_exists($imagePath))
        {
            return 'assets/images/' . $path . '/' . $filename;
        } else
        {
            return $defaultImage;
        }
    }

    // Hàm lấy đường dẫn

    public function generateOrderId($length = 6)
    {
        // Các ký tự có thể được sử dụng trong mã đơn hàng
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        // Tạo mã đơn hàng ngẫu nhiên
        for ($i = 0; $i < $length; $i++)
        {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }
    public function trangthai($trangthai)
    {
        switch ($trangthai)
        {
            case 1:
                return 'Mới đặt';
            case 2:
                return 'Đã xác nhận';
            case 3:
                return 'Bàn giao vận chuyển';
            case 4:
                return 'Đã giao hàng';
            case 5:
                return 'Đã huỷ';
        }
    }
}