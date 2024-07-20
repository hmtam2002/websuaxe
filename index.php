<?php
session_start();

define('ASSET', 'assets/');
define('SOURCE', 'source/');
define('TEMPLATE', 'template/');
define('LAYOUT', 'layout/');

//thư viện php mailer
require_once './source/phpmailer/Exception.php';
require_once './source/phpmailer/PHPMailer.php';
require_once './source/phpmailer/SMTP.php';



// config
require_once 'config.php';

// Session
require_once "source/session.php";

// Database
require_once "source/database.php";

// Function
require_once "source/function.php";

// Khởi tạo
$func = new func();
$db = new Database();

// Router
require_once 'source/router.php';

// Template
require_once 'template/index.php';